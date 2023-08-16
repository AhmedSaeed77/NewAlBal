<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\TransactionPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{

    public function show(){
        return view('super-admin.transactions.show');
    }
    public function accept(TransactionPayment $pay){
        $pay->status = 'done';
        $pay->save();
        DB::insert('insert into user_packages(user_id, package_id) values ('.$pay->user_id.','.$pay->package_id.')');
        return redirect()->back();
    }
    public function refuse(TransactionPayment $pay){
        $pay->status = 'declined';
        $pay->save();
        return redirect()->back();
    }

}
