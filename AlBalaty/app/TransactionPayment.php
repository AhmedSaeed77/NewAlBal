<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class TransactionPayment extends Model
{
    public $table = 'transaction_payments';
    protected $fillable= ['user_id','package_id','from_bank','to_bank','account_number',
    'account_name','translate_amount','image','status','used_coupon','wanted_amount'];

    static function frombanks(){
        $arr=[
            'blaad' => 'بنك البلاد',
            'ahly' => 'بنك الأهلي',
            'stc' => 'STC PAY',
            'other' => 'بنك أخر',
        ];
        return $arr;
    }
    static function tobanks(){
        $arr=[
            'blaad' => 'بنك البلاد',
            'stc' => 'STC PAY',
        ];
        return $arr;
    }
    static function statuss(){
        $arr=[
            'waiting' => 'انتظار',
            'declined' => 'رفضت',
            'done' => 'تمت',
        ];
        return $arr;
    }
}
