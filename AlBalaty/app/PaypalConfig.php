<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaypalConfig extends Model
{
    protected $table = 'paypal_configs';
    public $primaryKey = 'id';
    public $timestamps = true;
}
