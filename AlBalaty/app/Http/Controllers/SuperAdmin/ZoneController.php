<?php

namespace App\Http\Controllers\SuperAdmin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ZoneController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:super-admin')->except(['fetchZone']);
        $this->middleware('auth:super-admin,admin')->only('fetchZone');
    }

    public function fetchZone(){
        return (
            DB::table('zones')
                ->select('id', 'name')
                ->get()
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zones = DB::table('zones')->get();
        return view('super-admin.zone.index')
            ->with('zones', $zones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = DB::table('countries')
            // OuterJoin
            ->leftJoin('zone_countries', 'countries.id', '=', 'zone_countries.country_id')
            ->whereNull('zone_countries.id')
            ->select('countries.*')
            ->get();

        return view('super-admin.zone.create')
            ->with('countries', $countries);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name'          => 'required',
            'countries'     => 'required',
        ]);

        $check = DB::table('zone_countries')
            ->whereIn('country_id', $request->input('countries'))
            ->count();
        if($check != 0){
            return back()->with('error', 'One Country cant be in multiple zones !');
        }

        // create the zone
        $zone_id = DB::table('zones')
            ->insertGetId([
                'name'  => $request->input('name'),
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);

        $query_array = [];
        foreach($request->input('countries') as $country_id){
            array_push($query_array, [
                'country_id'    => $country_id,
                'zone_id'       => $zone_id,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }

        // add zone_countries records
        DB::table('zone_countries')->insert($query_array);
        return \Redirect::to(route('zone.index'))->with('success', 'New Zone created Successfully');
    }

    /**
     * @param $id
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $countries = DB::table('countries')
            // OuterJoin
            ->leftJoin('zone_countries', 'countries.id', '=', 'zone_countries.country_id')
            ->whereNull('zone_countries.id')
            ->select('countries.*')
            ->get();
        $zone = DB::table('zones')
            ->where('id', $id)
            ->first();
        $thisZoneCountries = DB::table('countries')
            ->join(DB::raw('(SELECT * FROM zone_countries WHERE zone_id=\''.$id.'\') AS zone_countries'),
                'countries.id', '=', 'zone_countries.country_id')
            ->select('countries.*')
            ->get();
        return view('super-admin.zone.edit')
            ->with('countries', $countries)
            ->with('zone', $zone)
            ->with('thisZoneCountries', $thisZoneCountries);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'          => 'required',
            'countries'     => 'required',
        ]);

        $check = DB::table('zone_countries')
            ->whereIn('country_id', $request->input('countries'))
            ->where('zone_id', '!=', $id)
            ->count();
        if($check != 0){
            return back()->with('error', 'One Country cant be in multiple zones !');
        }

        // create the zone
        $zone_id = DB::table('zones')
            ->where('id', $id)
            ->update([
                'name'  => $request->input('name'),
                'updated_at'    => Carbon::now(),
            ]);

        $query_array = [];
        foreach($request->input('countries') as $country_id){
            array_push($query_array, [
                'country_id'    => (int)$country_id,
                'zone_id'       => $id,
                'created_at'    => Carbon::now(),
                'updated_at'    => Carbon::now(),
            ]);
        }


        // remove all
        DB::table('zone_countries')->where('zone_id', $id)->delete();
        // add zone_countries records
        DB::table('zone_countries')->insert($query_array);
        return \Redirect::to(route('zone.index'))->with('success', 'Zone updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('zones')->where('id', $id)->delete();
    }
}
