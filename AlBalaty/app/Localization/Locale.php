<?php


namespace App\Localization;


use Carbon\Carbon;
use Illuminate\Session\SessionManager;
use Illuminate\Session\Store;
use Illuminate\Support\Facades\App;

class Locale
{
    /**
     * @var SessionManager|Store|mixed
     */
    public $locale;


    /**
     * Localization constructor.
     * @param string $default
     */
    public function __construct($default = 'en')
    {
        $this->locale = \Session('locale');
        $this->country_code = \Session('country_code');

        if(\Session('locale') != ''){
            App::setLocale(\Session('locale'));
        }else{
            if(!($default == 'en' || $default == 'ar')){
                $default = 'en';
            }
            \Session(['locale' => $default]);
            App::setLocale($default);
            $this->locale = \Session('locale');
        }

        Carbon::setLocale($this->locale);
        if($this->locale == 'ar'){
            setlocale(LC_TIME, 'ar_eg');
        }

    }




}
