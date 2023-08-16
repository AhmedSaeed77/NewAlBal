<?php

namespace App\Http\Controllers;

use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use \Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Auth;



class CertificationController extends Controller
{
    
    
    public $error_msg = '';
    
    public function generate(Request $req){
        $this->validate($req, [
            'product_type'  => 'required|string',
            'product_id'    => 'required|numeric',
            'name'          => 'required'
        ]);



        $cert = \App\Certification::where('user_id', Auth::user()->id)
            ->where(function($query)use($req){
                if($req->product_type == 'package'){
                    $query->where('package_id', $req->product_id);
                }elseif($req->product_type == 'event'){
                    $query->where('event_id', $req->product_id);
                }
            })
            ->first();

//        if($cert){
//            return $this->sendCertification($cert->id);
//        }

        if(!$this->secure($req->product_type, $req->product_id) ){
            return back()->with('error', $this->error_msg);
        }


        
        
        // get image path
        $img_path = 'public/certifications/cert2.png';

        // pass it to certification1 function
        $cert_id = $this->certification1($req->input('name'), $req->product_type, $req->product_id, $img_path);

        return $this->sendCertification($cert_id);
    }


    public function certification1($name, $product_type, $product_id, $img_path){
        // __DIR__ => /home/pmtricks/PMtricks/app/Http/Controllers
        
        $save_path = 'storage/userCertifications/'; /** save folder */
        if($product_type == 'package'){
            $product = \App\Models\Package\Packages::find($product_id);
        }elseif($product_type == 'event'){
            $product = \App\Event::find($product_id);
        }

        
        
        if(!Storage::exists($img_path)){
            return 'Certification file not exist !';
        }
        
        $c_num = $this->generate_5digit();
        while(\App\Certification::where('c_num', $c_num)->first()){
            $c_num = $this->generate_5digit();
        }
        
        $time = \Carbon\Carbon::now()->format('jS F Y');
        
        $img_file = Storage::get($img_path);
        $img = Image::make($img_file);
        
        /** Add User Name */

        $img->text(trim($name), 1300,1200, function($font) {
//             $font->file('X:\xampp\htdocs\PM-Tricks-V2\public\fonts\o.ttf');
            // online /home/pmtricks/public_html/fonts/o.ttf
            $font->file('/home/pmtricks/public_html/fonts/o.ttf');
            $font->size(70);
            $font->align('left');
            $font->color('#333');
        });
        
        /** Add Certification Number */
        $img->text($c_num, 690,1980, function($font) {
//            $font->file('X:\xampp\htdocs\PM-Tricks-V2\public\fonts\o.ttf');
            $font->file('/home/pmtricks/public_html/fonts/o.ttf');
            $font->size(70);
            $font->align('left');
            $font->color('#333');
        });
        
        /** Add Time */
        $img->text($time, 2420,1980, function($font) {
//            $font->file('X:\xampp\htdocs\PM-Tricks-V2\public\fonts\o.ttf');
            $font->file('/home/pmtricks/public_html/fonts/o.ttf');
            $font->size(70);
            $font->align('left');
            $font->color('#333');
        });
        
        $img->text($product->certification_title, 1020,1380, function($font) {
//            $font->file('X:\xampp\htdocs\PM-Tricks-V2\public\fonts\o.ttf');
            $font->file('/home/pmtricks/public_html/fonts/o.ttf');
            $font->size(70);
            $font->align('left');
            $font->color('#333');
        });
        
        $save_path .= Auth::user()->id.$c_num.'.jpg';
        
        $img->save($save_path);
        
        $cert = new \App\Certification;
        $cert->user_id = Auth::user()->id;
        if($product_type == 'package'){
            $cert->package_id = $product_id;
        }elseif($product_type == 'event'){
            $cert->event_id = $product_id;
        }
        $cert->c_num = $c_num;
        $cert->c_url = $save_path;
        $cert->save();
        
        
        return $cert->id;
    }
    
    
    public function sendCertification($id){
        
        $path = 'public/userCertifications/';
        $c = \App\Certification::find($id);
        if(!$c){
            return 'Error: 404';    
        }
        $path .= Auth::user()->id.$c->c_num.'.jpg';
        if(!Storage::exists($path)){
            return 'Error: not found!';
        }
        return response()->download(storage_path('app/public/userCertifications/'.Auth::user()->id.$c->c_num.'.jpg'));
    }
    
    public function secure($product_type, $product_id){

        if($product_type == 'package'){
            $package = DB::table('user_packages')
                ->where('user_packages.package_id', $product_id)
                ->where('user_packages.user_id', Auth::user()->id)
                ->join('packages', 'user_packages.package_id', '=', 'packages.id')
                ->first();
            if(!$package){
                $this->error_msg = 'Package not exist !';
                return 0;
                if($package->certification == 0){
                    $this->error_msg = 'Error 500 Bad Request !';
                    return 0;
                }
            }
        }elseif($product_type == 'event'){
            $event = DB::table('event_user')
                ->where([
                    'event_id'  => $product_id,
                    'user_id'   => Auth::user()->id
                ])
                ->join('events', 'event_user.event_id', '=', 'events.id')
                ->first();
            if(!$event){
                $this->error_msg = 'Package not exist !';
                return 0;
                if($event->certification == 0){
                    $this->error_msg = 'Error 500 Bad Request !';
                    return 0;
                }
            }
        }
                
        return 1;
        
    }
    
    public function generate_5digit(){
        return rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
    }
    
}
