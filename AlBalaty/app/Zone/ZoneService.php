<?php


namespace App\Zone;


use Illuminate\Support\Facades\Cache;

class ZoneService
{

    /**
     * @var string
     * ipapi.com access token
     */
    private $SERVICE_STATUS = 1; // switch to 1 to activate.
    private $IPAPI_TOKEN = '###############';
    private $IPAPI_endpoint = 'http://api.ipapi.com/api/';

    private $OPENEXCHANGE_TOKEN = '8df0c236862944e3ba360658e0cf3506';
    private $OPENEXCHANGE_endpoint = 'https://openexchangerates.org/api/latest.json?app_id=';


    /**
     *
     * @param $amount_toCurrency [ [10, 'AED'], ..]
     * @return mixed
     */
    public function currencyExchange($amount_toCurrency){
        // from US Dollar to any currency
        $amount_currency = [];

        if(env('APP_ENV') == 'local' || $this->SERVICE_STATUS == 0){ //disable on local env. OR on service off
            foreach($amount_toCurrency as $ex){
                array_push($amount_currency,
                    round(  $ex[0], 2)
                );
            }

            return $amount_currency;
        }

        // updated daily ..
        $data = Cache::remember('currencyExchange', 1440, function(){
            $x = $this->get($this->OPENEXCHANGE_endpoint.$this->OPENEXCHANGE_TOKEN);
            return json_decode($x['content']);
        });

        foreach($amount_toCurrency as $ex){
            array_push($amount_currency,
                round( ((array)$data->rates)[$ex[1]] * $ex[0], 2)
            );
        }

        return $amount_currency;
    }


    public function getLocation(){

        $default = (object)[
            'ip'                    => '72.229.28.185',
            'type'                  => 'ipv4',
            'continent_code'        => 'NA',
            'continent_name'        => 'North America',
            'country_code'          => 'US', // for USA currency
            'country_name'          => 'United States',
            'region_code'           => 'C',
            'region_name'           => 'Cairo',
            'city'                  => 'New York',
            'zip'                   => '10116',
            'latitude'              => 40.7828,
            'longitude'             => -73.9745,
            'location'              => (object)[
                'geoname_id'    => 360630,
                'capital'       => 'New York',
                'languages'     => [
                    (object)[
                        'code'      => 'en',
                        'name'      => 'english',
                        'native'    => 'english',
                        'rtl'       => 0
                    ],
                ],
                'country_flag'                  => 'http://assets.ipapi.com/flags/us.svg',
                'country_flag_emoji'            => "🇪🇬",
                'country_flag_emoji_unicode'    => 'U+1F1EA U+1F1EC',
                'calling_code'                  => '20',
                'is_eu'                         => false,
            ],
        ];



        if(env('APP_ENV') == 'local' || $this->SERVICE_STATUS == 0){ //disable on local env. OR on service off
            return $default;
        }

        $ipAddress = $this->getRealIpAddr();
        $data = $this->get($this->IPAPI_endpoint.$ipAddress.'?access_key='.$this->IPAPI_TOKEN);
        if($data['http_code'] == 200){

            $data = json_decode($data['content']);
            
            if(!property_exists($data, 'ip')){
                $data = $default;
            }elseif($data->ip == '::1'){
                $data = $default;
            }
        }else{
            $data = $default;
        }


        return $data;
    }


    function getRealIpAddr()
    {
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip=$_SERVER['HTTP_CLIENT_IP'];
        }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
            $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
        }else{
            $ip=$_SERVER['REMOTE_ADDR'];
        }
        return $ip;
        // return '45.9.249.75';
    }

    function get( $url )
    {
        $options = array(
            CURLOPT_RETURNTRANSFER => true,     // return web page
            CURLOPT_HEADER         => false,    // don't return headers
            CURLOPT_FOLLOWLOCATION => true,     // follow redirects
            CURLOPT_ENCODING       => "",       // handle all encodings
//            CURLOPT_USERAGENT      => "spider", // who am i
            CURLOPT_AUTOREFERER    => true,     // set referer on redirect
            CURLOPT_CONNECTTIMEOUT => 120,      // timeout on connect
            CURLOPT_TIMEOUT        => 120,      // timeout on response
            CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
            CURLOPT_SSL_VERIFYPEER => false     // Disabled SSL Cert checks
        );

        $ch      = curl_init( $url );
        curl_setopt_array( $ch, $options );
        $content = curl_exec( $ch );
        $err     = curl_errno( $ch );
        $errmsg  = curl_error( $ch );
        $header  = curl_getinfo( $ch );
        curl_close( $ch );

        $header['errno']   = $err;
        $header['errmsg']  = $errmsg;
        $header['content'] = $content;
        return $header;
    }

}
