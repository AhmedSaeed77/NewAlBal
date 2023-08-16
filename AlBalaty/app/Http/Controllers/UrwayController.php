<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use \App\Payment\Payment as PaymentHelper;
use \App\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UrwayController extends Controller
{
    use PaymentHelper;

    private $basePath   = 'https://payments.urway-tech.com';
    private $endpoint   = 'URWAYPGService/transaction/jsonProcess/JSONrequest';
    private $method     = 'POST';

    private $attributes = [];
    private $response   = null;


    public function callBack(){


        if(request()->Result != 'Successful'){
            return \Redirect::to(route('user.dashboard'))->with('error', 'Your Payment Could Not Be Processed.');
        }


        $user_id = request()->TrackId;
        $item_type = request()->UserField3;
        $item_id = request()->UserField4;
        $coupon_code = request()->UserField5;

        $user = \App\Models\Auth\User::find($user_id);


        // add item to user
        $pd = new Payments;
        $pd->user_id            = $user->id;
        $pd->buyerID            = request()->TranId;
        $pd->paymentID          = request()->PaymentId;
        $pd->cartID             = '';
        $pd->totalPaid          = request()->amount;
        $pd->currency           = 'SAR';
        $pd->paypalEmail        = $user->email;
        $pd->countryCode        = '';
        $pd->paymentMethod      = 'UrWay';
        $pd->complete           = 1;
        $coupon = \App\Coupon::where('code', '=', $coupon_code)->get()->first();
        if($coupon){
            /**
             * check expiration
             */
            if(\Carbon\Carbon::parse($coupon->expire_date)->gt(\Carbon\Carbon::now()) && ($coupon->no_use) > 0){
                /**
                 * not expired
                 */
                $pd->coupon_code = $coupon->code;
                $coupon->no_use -= 1;
                $coupon->save();

            }
        }
        $pd->save();

        if($item_type == 'package'){
            // update payment_approves table
            $approve = new \App\PaymentApproveHistory;
            $approve->user_id = $user->id;
            $approve->package_id = $item_id; // package id from parameters
            $approve->payment_id = $pd->id;
            $approve->save();

            $up = new \App\UserPackages;
            $up->package_id = $item_id;
            $up->user_id = $user->id;
            $up->save();

            $package = \App\Models\Package\Packages::find($item_id);
            /**
             * update notification table
             */
            $noti = new \App\Notification;
            $noti->description = 'MyFatoorah Payment: Requested by User: '.$user->email.'and Accepted, '.$package->name;
            $noti->save();

            try{
                Mail::to($user->email)->send(new \App\Mail\EnrollConfirmationMail($package->enroll_msg));
            }catch(\Exception $e){
                /**
                 * do nothing !
                 */
            }

        }

        if($item_type == 'event'){
            $newEvent = new \App\EventUser;
            $newEvent->user_id = $user->id;
            $newEvent->event_id = $item_id;
            $newEvent->payment_id = $pd->id;
            $newEvent->save();

            $event_details = \App\Event::find($item_id);

            $noti = new \App\Notification;
            $noti->description = 'MyFatoorah Payment: Requested by User: '.$user->email.'and Accepted, '.$event_details->name;
            $noti->save();

            try{

                Mail::to($user->email)->send(new \App\Mail\EnrollConfirmationMail($event_details->enroll_msg));
            }catch(\Exception $e){
                /**
                 * do nothing !
                 */
            }

            // attach additional package if included ..
            if($event_details){
                $free_packages = \App\EventFreePackage::where('event_id', $event_details->id)->get();

                if(count($free_packages)){
                    foreach($free_packages as $package){

                        $approve = new \App\PaymentApproveHistory;
                        $approve->user_id = $user->id;
                        $approve->package_id = $package->package_id; // package id from parameters
                        $approve->payment_id = null;
                        $approve->save();

                        $up = new \App\UserPackages;
                        $up->package_id = $package->package_id;
                        $up->user_id = $user->id;
                        $up->save();
                    }


                }

            }
        }

        return redirect()->route('my.package.view')->with('success', 'Payment complete.');
    }

    public function pay(Request $request)
    {

        $coupon         = $request->coupon? $request->coupon: '';
        $product_type   = $request->product_type;
        $product_id     = $request->product_id;
        $thisUser = Auth::user();


        if(!$thisUser){
            return \Redirect::to(route('login'));
        }

        $item = $this->CheckItem($product_id, $product_type);
        if(!$item){
            return \Redirect::to(route('user.dashboard'))->with('error', 'This Product is not available for you!');
        }

        $price = 0;
        $price_details = $this->PriceDetails($coupon, $product_id, $product_type);
        
       

        if($price_details['price'] > $price_details['discount']){
            $price = $price_details['price'] - $price_details['discount'];
        }

        if($price > 0){
            // According to documentation we have to send the `terminal_id`, and `password` now.
            $this->setAuthAttributes();
            $this->setUdf1($item->name);
            $this->setUdf3($product_type);
            $this->setUdf4($product_id);
            $this->setUdf5($coupon);
            $this->setAmount($price);
            $this->setCountry($thisUser->country);
            $this->setCurrency('SAR');
            $this->setCustomerEmail($thisUser->email);
            $this->setCustomerIp($this->get_client_id());
            $this->setTrackId($thisUser->id);
            $this->setRedirectUrl(route('urway.callback'));
            // We have to generate request
            $this->generateRequestHash();
            
            try {
                $response = (new Client())->request(
                    $this->method,
                    $this->getEndPointPath(),
                    [
                        'json' => $this->attributes,
                    ]
                );

                $this->response = ( json_decode($response->getBody()) );
                
             

                return view('urway.processing')
                    ->with('payUrl', $this->getPaymentUrl());

            } catch (\Throwable $e) {
                throw new \Exception($e->getMessage());
            }
        }


    }

    public function getPaymentUrl()
    {
        if (! empty($this->response->payid) && ! empty($this->response->targetUrl)) {
            return $this->response->targetUrl . '?paymentid=' . $this->response->payid;
        }

        return false;
    }


    public function getEndPointPath(){
        return $this->basePath . '/' . $this->endpoint;
    }

    public function generateRequestHash()
    {
        $requestHash = $this->attributes['trackid'] . '|' . config('urway.auth.terminal_id') . '|' . config('urway.auth.password') . '|' . config('urway.auth.merchant_key') . '|' . $this->attributes['amount'] . '|' . $this->attributes['currency'];
        $this->attributes['requestHash'] = hash('sha256', $requestHash);
        $this->attributes['action'] = '1'; // I don't know why.
    }

    protected function setAuthAttributes()
    {
        $this->attributes['terminalId'] = config('urway.auth.terminal_id');
        $this->attributes['password'] = config('urway.auth.password');
    }

//    protected function generateFindRequestHash()
//    {
//        $requestHash = $this->attributes['trackid'] . '|' . config('urway.auth.terminal_id') . '|' . config('urway.auth.password') . '|' . config('urway.auth.merchant_key') . '|' . $this->attributes['amount']  . '|' . $this->attributes['currency'];
//        $this->attributes['requestHash'] = hash('sha256', $requestHash);
//        $this->attributes['action'] = '10'; // I don't know why.
//    }



    /**
     * @param array $attributes
     */
    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;
    }

    /**
     * @param string $udf1
     */
    public function setUdf1(string $udf1){
        $this->attributes['udf1'] = $udf1;
    }

    /**
     * @param string $udf3
     */
    public function setUdf3(string $udf3){
        $this->attributes['udf3'] = $udf3;
    }

    /**
     * @param string $udf4
     */
    public function setUdf4(string $udf4){
        $this->attributes['udf4'] = $udf4;
    }

    /**
     * @param string $udf5
     */
    public function setUdf5(string $udf5){
        $this->attributes['udf5'] = $udf5;
    }



    public function setTrackId(string $trackId)
    {
        $this->attributes['trackid'] = $trackId;
    }

    /**
     * @param string $email
     */
    public function setCustomerEmail(string $email)
    {
        $this->attributes['customerEmail'] = $email;
    }

    /**
     * @param $ip
     */
    public function setCustomerIp($ip)
    {
        $this->attributes['merchantIp'] = $ip;
    }

    /**
     * @param string $currency
     */
    public function setCurrency(string $currency)
    {
        $this->attributes['currency'] = $currency;
    }

    /**
     * @return $this
     */
    public function setCountry(string $country)
    {
        $this->attributes['country'] = $country;
    }

    /**
     * @param $amount
     */
    public function setAmount($amount)
    {
        $this->attributes['amount'] = $amount;
    }

    /**
     * @param $url
     */
    public function setRedirectUrl($url)
    {
        $this->attributes['udf2'] = $url;
    }

    function get_client_id() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }



}
