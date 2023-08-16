<?php


namespace App\Http\Controllers\SuperAdmin;




use App\Models\Auth\Admin;
use App\Models\Package\Packages;
use App\Repository\Admin\PackageRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PackageManagerController extends \App\Http\Controllers\Controller
{

    private $packageRepository;

    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        $this->middleware('auth:super-admin');
        $this->packageRepository = $packageRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request, $package_id){

        try{
            DB::beginTransaction();
            $packageModel = Packages::find($package_id);
            /**
             *    Calculate the price after discount
             */
            $fallback_discount = min($request->fallback_discount, 99);
            $price = $this->price_after_discount($request->input('fallback_price'), $fallback_discount);

            $packageModel->price = $price;
            $packageModel->original_price = $request->input('fallback_price');
            $packageModel->discount = $fallback_discount;
            $packageModel->approved = $request->input('approved') == 'true' ? 1: 0;
            $packageModel->save();


            /**
             * Store Prices
             */
            DB::table('zone_prices')->where(['item_type' => 'package', 'item_id' => $packageModel->id])->delete();
            if(is_iterable($request->zones)){
                if(count($request->zones)){
                    foreach($request->zones as $zone){
                        $original_price = $zone['price'];
                        $discount = min($zone['discount'], 99);
                        $price = $this->price_after_discount($original_price, $discount);
                        DB::table('zone_prices')
                            ->insert([
                                'zone_id'           => $zone['zone_id'],
                                'item_type'         => 'package',
                                'item_id'           => $packageModel->id,
                                'original_price'    => $original_price,
                                'price'             => $price,
                                'discount'          => $discount,
                                'created_at'        => Carbon::now(),
                                'updated_at'        => Carbon::now(),
                            ]);
                    }
                }
            }
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json([
                'message' => $e->getMessage(),
                'code' => "The exception code is: " . $e->getCode(),
                'file'  => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTrace(),
            ], 500);
        }
        DB::commit();

        return response()->json([
            'data'  => $packageModel
        ], 201);
    }

    public function edit($package_id){
        $package = $this->packageRepository->batchPackage([$package_id], null, false)->first();

        return view('super-admin.package-manager.edit')
            ->with('package_id', $package_id)
            ->with('package', $package);
    }


    public function index(){

        $teachers = Admin::all();
        $packages = Packages::query()
            ->join('admins', 'packages.admin_id', 'admins.id')
            ->where(function($query){
                if(\request()->teacher_id){
                    $query->where('admin_id', \request()->teacher_id);
                }

                if(\request()->name){
                    $query->where('packages.name', 'LIKE', '%'.\request()->name.'%');
                }
            })
            ->select(['packages.*', 'admins.name AS teacher_name'])
            ->paginate(\request()->pagination ?? 20);
        return view('super-admin.package-manager.index')
            ->with('teachers', $teachers)
            ->with('packages', $packages);

    }


    /**
     * @param $original_price
     * @param $discount
     * @return float
     */
    public function price_after_discount($original_price, $discount){
        $take_off = ($discount/100) * $original_price;
        $new_price = $original_price - $take_off;
        return round($new_price, 2);
    }
    
    public function ev(){
         return 'test';
    }
}
