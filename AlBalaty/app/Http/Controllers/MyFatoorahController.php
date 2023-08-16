<?php

namespace App\Http\Controllers;

use App\PaymentApproveHistory;
use App\Repository\Admin\PackageRepositoryInterface;
use Illuminate\Http\Request;
use \App\Payment\Payment as PaymentHelper;
use \App\Payments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class MyFatoorahController extends Controller
{
    /**
     * Payment Helper Functions
     */
    use PaymentHelper;

    /**
     * MyFatoorah API Variables
     * @var string
     */
    private $baseURL            = "https://api.myfatoorah.com";
    private $currency           = 'USD';
    private $token              = 'pg7bssx143fZn0FiTUcAGd-st62SuX-y0EV41mU4dHXtxOJZrX1Pg9-MZG7q_VJEF55IxAQrk53Gik_H5gqIAwsUiVObvTW7zWsWSNOzW48eK1bmDh6vTy2vCZXD-dRVuxD9i1qGguKmKrGhhrU9k12eAcW0LNnwnmtLcD0vcTtgmUkqTooThY4BDUQjnMsM8dnILQy_W7jZJqtjc9cwkooOcl2yda850X1TePq9u_wlruM9ZB4JU98QhF6aLFD1p3wXZ3B5qiriZgw9pjDKTX4JjAot9us99XuHwYITY0dtIlxOjqGEbaBN7ozY_O0KylOBZv-2Q2L24GQrvP6n97zPmGIjG4dwB0Gtgwxk7xHfzphHUVlWB0zbIAbPVChzVWJrgWmJEU32rtCqNov4o7QwWvSnv3dUAxiCQLgtSA7XeIqaax1hoTSNhsnS0mnGSN-BXYmAgQoi4QQYjS8XPfOs1c8JR2cDwLDFFRjvzlps-cWDMjDw7xCyvu5UD1Nv2QoCvDhjXQivl0gh0iZwMc9ie40mFLh981c0DINoTjMNeVb117Z4HV2682dINb8SfsFZ1bCP9RszwFxs1udWSxP9q-9WV27AZoHBEDZvKvSrTaiUN7AYG1OZtVwGq108_mRKETqYz4mlM0PD2XehyBN7joBvKTzXrLdPZaI49u6982iN_cMDuXHcfE9jyclcTEw_cLszIBNy7ytNYR2wCHUpC09RhOXosdTIitcFjw_R7REG';
    // private $token              = 'kr_ueeMc8VHD5YlCeGlIQVWlc-AJ_nS8aayvoHFKPR4x78n0V1GPDnA5iW7QS08JwpvyqEGyttTtTljDSvEL1vv7wbjiB0cEMNQGcmjk_NsdXfGisL32dqa-SY2eBM5XBuk44hH8MeJ4C2sQXzfQXdfbp5M4WFJp5PxqNPeFv3CMmjD6g6Va56LEzDtJwUjI-RDZGOAuUKvHI9LiW08IeVePR63guIZ2YAa1_WpD1a8wsO5PJtKGLkPgXnDp_IUQqVWS6Qi5x3C3dps1BTId4zgiW9apkyDjPLcC-9PaayjVXcWmOYoZSOHTbGrp798dEOOJtXy0KX51FyUtq8Xe_atHzazib4YlP5fVu3bdLqakXirh3GpfUdbHi1tnKqWzhS7d-xGK3jI9OzZCrUU4f9OqxSUgyQRFRKZ2_6HXY_Nrm7Hzzag-4BBI2PAHrVcxHwwODnw6f3VGzwSMqgBM2AgIrcwnNr1GIWlGzIn1BRsfY7MaSuwBXtCpt9h_jWyS_PyW5n-YjsNtsqi8FXPEG1xqQ-m3B2-qBVq6zXPDvLoNNirD26zcNn74nT8tqrMTpV7WBanlCrVKBAzD21Q348JLk38DKjNvadw2B5412wLkEX-sa1CqL_dn-2vZXXn2s_WlavVExHYTDG-Rp_efzpbUtY5YB8gc5_1Q8PIy4YR5dyEXMKveVGXNmve9-UDJIZlmJg';


    /**
     * Only Authenticated Users.
     */
    public function __construct(PackageRepositoryInterface $packageRepository)
    {
        if(env('APP_ENV') == 'local'){
            $this->baseURL = 'https://apitest.myfatoorah.com';
            $this->token = 'rLtt6JWvbUHDDhsZnfpAhpYk4dxYDQkbcPTyGaKp2TYqQgG7FGZ5Th_WD53Oq8Ebz6A53njUoo1w3pjU1D4vs_ZMqFiz_j0urb_BH9Oq9VZoKFoJEDAbRZepGcQanImyYrry7Kt6MnMdgfG5jn4HngWoRdKduNNyP4kzcp3mRv7x00ahkm9LAK7ZRieg7k1PDAnBIOG3EyVSJ5kK4WLMvYr7sCwHbHcu4A5WwelxYK0GMJy37bNAarSJDFQsJ2ZvJjvMDmfWwDVFEVe_5tOomfVNt6bOg9mexbGjMrnHBnKnZR1vQbBtQieDlQepzTZMuQrSuKn-t5XZM7V6fCW7oP-uXGX-sMOajeX65JOf6XVpk29DP6ro8WTAflCDANC193yof8-f5_EYY-3hXhJj7RBXmizDpneEQDSaSz5sFk0sV5qPcARJ9zGG73vuGFyenjPPmtDtXtpx35A-BVcOSBYVIWe9kndG3nclfefjKEuZ3m4jL9Gg1h2JBvmXSMYiZtp9MR5I6pvbvylU_PP5xJFSjVTIz7IQSjcVGO41npnwIxRXNRxFOdIUHn0tjQ-7LwvEcTXyPsHXcMD8WtgBh-wxR8aKX7WPSsT1O8d8reb2aR7K3rkV3K82K_0OgawImEpwSvp9MNKynEAJQS6ZHe_J_l77652xwPNxMRTMASk1ZsJL';
        }
        $this->packageRepository = $packageRepository;
    }

    /**
     * check item is available and active and user do not have it
     * @param $item_id
     * @param $item_type
     * @return int
     */
    public function MyFatoorah_CheckItem($item_id, $item_type){
        return $this->CheckItem($item_id, $item_type);
    }

    /**
     *
     * @param $coupon
     * @param $item_id
     * @param $item_type
     * @return array|object
     */
    public function MyFatoorah_PriceDetails($coupon, $item_id, $item_type){
        return $this->PriceDetails($coupon, $item_id, $item_type);
    }

    /**
     * used before charge Execution to display the pricing and to attach free packages to students
     * @param Request $req
     * @return array
     */
    public function price_details(Request $req){
        $check = $this->CheckItem($req->package_id, 'package');
        if(!$check){
            return [
                'error' => 'This Item is not available .',
            ];
        }

        $priceDetails = $this->PriceDetails($req->coupon_code, $req->package_id, 'package');

        $priceDetails['paid'] = false;

        /** If item is free */
        if(max($priceDetails['localized_price'] - $priceDetails['localized_coupon_discount'], 0) == 0){

            if($this->packageRepository->renewPackageSubscription(Auth::user()->id, $req->package_id)){
                $pd = new Payments;
                $pd->user_id            = Auth::user()->id;
                $pd->buyerID            = '--';
                $pd->paymentID          = '--';
                $pd->cartID             = '--';
                $pd->totalPaid          = '0';
                $pd->paypalEmail        = Auth::user()->email;
                $pd->countryCode        = '';
                $pd->paymentMethod      = 'Free Item';
                $pd->complete           = 1;
                $coupon = \App\Coupon::where('code', '=', request()->coupon_code)->get()->first();
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

                $approveHistory = new PaymentApproveHistory;
                $approveHistory->payment_id = $pd->id;
                $approveHistory->package_id = $req->package_id;
                $approveHistory->user_id = Auth::user()->id;
                $approveHistory->save();

                $priceDetails['paid'] = true;
            }

        }

        return $priceDetails;
    }

    public function init_payment($total_price){
        ####### Initiate Payment ######
        $body = [
            'InvoiceAmount'     => $total_price,
            'CurrencyIso'       => $this->currency,
        ];
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseURL."/v2/InitiatePayment",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array("Authorization: Bearer $this->token","Content-Type: application/json"),
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        if($response->Message == 'Initiated Successfully!'){
            return ($response);
        }
        return null;
    }

    public function init_session(){

        $body = [
            'CustomerIdentifier'    => Auth::user()->email,
        ];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseURL."/v2/InitiateSession",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array("Authorization: Bearer $this->token","Content-Type: application/json"),
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);

        if(property_exists($response, 'IsSuccess') && $response->IsSuccess == true){
            return response()->json([
                'SessionId'     => $response->Data->SessionId,
                'CountryCode'   => $response->Data->CountryCode,
            ], 200);
        }

        return response()->json(null, 500);

    }

    public function exec_payment($product_name, $total_price, $product_ref, $sessionId){
        ####### Execute Payment ######
        $user = Auth::user();

        $curl = curl_init();
        $body = [
            'CustomerName'      => $user->name,
            'DisplayCurrencyIso'=> $this->currency,
            'MobileCountryCode' => '',
            'CustomerMobile'    => '',
            'CustomerEmail'     => $user->email,
            'InvoiceValue'      => $total_price,
            'CallBackUrl'       => route('myfatoorah.callback'),
            'ErrorUrl'          => route('myfatoorah.error.callback'),
            'Language'          => 'en',
            'CustomerReference' => "$user->id",
            'CustomerCivilId'   => '',
            'UserDefinedField'  => "$product_ref",
            'ExpireDate'        => '',
            'CustomerAddress'   => [
                'Block'                 => '',
                'Street'                => '',
                'HouseBuildingNo'       => '',
                'Address'               => '',
                'AddressInstructions'   => '',
            ],
            'InvoiceItems'      => [
                [
                    'ItemName'  => $product_name,
                    'Quantity'  => 1,
                    'UnitPrice' => $total_price,
                ],
            ],
        ];

        if($sessionId != false && $sessionId != 'false'){
            $body['SessionId'] = $sessionId;
        }else{
            $body['PaymentMethodId'] = '2';
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->baseURL."/v2/ExecutePayment",
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => json_encode($body),
            CURLOPT_HTTPHEADER => array("Authorization: Bearer $this->token","Content-Type: application/json"),
        ));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = json_decode(curl_exec($curl));
        curl_close($curl);
        return ($response);
    }

    public function get_payment_status($payment_id){


        //####### Prepare Data ######
        $url    = $this->baseURL."/v2/getPaymentStatus";
        $data   = array(
            'KeyType' => 'paymentId',
            'Key'     => "$payment_id" //the callback paymentID
        );
        $fields = json_encode($data);

        //####### Call API ######
        $curl = curl_init($url);

        curl_setopt_array($curl, array(
            CURLOPT_CUSTOMREQUEST  => 'POST',
            CURLOPT_POSTFIELDS     => $fields,
            CURLOPT_HTTPHEADER     => array("Authorization: Bearer $this->token", 'Content-Type: application/json'),
            CURLOPT_RETURNTRANSFER => true,
        ));

        $res = json_decode(curl_exec($curl));
        $err = curl_error($curl);

        curl_close($curl);
        return ($res);
    }

    public function charge(Request $req){

        $item_type = $req->item_type;
        $item_id = $req->item_id;
        $coupon_code = $req->coupon_code;
        $sessionId = $req->sessionId;

        $thisUser = Auth::user();


        if(!$thisUser){
            return response()->json([
                'error'     => 'Something Went Wrong',
                'url'       => ''
            ], 200);
        }

        $item = $this->MyFatoorah_CheckItem($item_id, $item_type);
        if(!$item){
            return response()->json([
                'error'     => 'This Item is not Available.',
                'url'       => ''
            ], 200);
        }

        $price = 0;
        $price_details = $this->MyFatoorah_PriceDetails($coupon_code, $item_id, $item_type);


        if($price_details['price'] > $price_details['discount']){
            $price = $price_details['price'] - $price_details['discount'];
        }

        $price = ceil($price);

        /**
         * Init Payment
         */
        $init = $this->init_payment($price); // USD
        /**
         * Execute Payment
         */
        $exec = $this->exec_payment($item->name, $price, $item_type.','.$item_id.','.$coupon_code, $sessionId);
        if($exec->IsSuccess){

            return response()->json([
                'error'     => '',
                'url'       => $exec->Data->PaymentURL
            ], 200);

        }


        return response()->json([
            'error'     => 'payment could not be executed.',
            'url'       => '',
            'dump'      => $exec,
            'price'     => $price,
        ], 200);

    }

    public function callBack(){
        $thisUser = Auth::user();


        $status = $this->get_payment_status(request()->paymentId);

        if(!$status->IsSuccess || $status->ValidationErrors){
            if($thisUser){
                return \Redirect::to(route('user.dashboard'))->with('error', 'Your Payment was Declined. Please choose another payment method.');
            }else{
                return 'Your Payment was Declined. Please choose another payment method.';
            }

        }

        if($status->Data->InvoiceStatus != 'Paid'){
            if($thisUser){
                return \Redirect::to(route('user.dashboard'))->with('error', 'Your Payment was Declined. Please choose another payment method.');
            }else{
                return 'Your Payment was Declined. Please choose another payment method.';
            }
        }

        $user_id = (int)$status->Data->CustomerReference;
        $product = explode(',', $status->Data->UserDefinedField);
        $item_type = $product[0];
        $item_id = (int)$product[1];
        $coupon_code = $product[2];

        $user = \App\User::find($user_id);


        // add item to user
        $pd = new Payments;
        $pd->user_id            = $user->id;
        $pd->buyerID            = $status->Data->InvoiceReference;
        $pd->paymentID          = request()->paymentId;
        $pd->cartID             = '';
        $pd->totalPaid          = $status->Data->InvoiceTransactions[0]->PaidCurrencyValue;
        $pd->currency           = $status->Data->InvoiceTransactions[0]->PaidCurrency;
        $pd->paypalEmail        = $user->email;
        $pd->countryCode        = '';
        $pd->paymentMethod      = 'MyFatoorah';
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

            if($this->packageRepository->renewPackageSubscription($user->id, $item_id)){
                $approveHistory = new PaymentApproveHistory;
                $approveHistory->payment_id = $pd->id;
                $approveHistory->package_id = $item_id;
                $approveHistory->user_id = $user->id;
                $approveHistory->save();

                $package = \App\Packages::find($item_id);
                try{
                    Mail::to($user->email)->send(new \App\Mail\EnrollConfirmationMail($package->enroll_msg));
                }catch(\Exception $e){
                    /**
                     * do nothing !
                     */
                }
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

        $invoiceData = [
            'name'  =>  $user->name,
            'email' =>  $user->email,
            'price' => $pd->totalPaid,
            'currency'  => $pd->currency,
            'payment_id'    => $pd->paymentID,
            'product_name'  => $item_type == 'package' ? $package->name: $event_details->name,
            'date'  => $pd->created_at

        ];
        $this->invoiceEmail($invoiceData, 'MyFatoorah');

        return redirect()->route('student.dashboard')->with('success', 'Payment complete.');
    }

    public function errorCallBack(){
        $status = $this->get_payment_status(request()->paymentId);
        return \Redirect::to(route('student.dashboard'))->with('error', 'Your Payment was Declined. Please choose another payment method.');
    }

    public function test()
    {

        $invoiceData = [
            'name'  =>  'mohamed',
            'email' =>  'mrgeek.mohamed@gmail.com',
            'price' => '10',
            'currency'  => '$',
            'payment_id'    => '234234234',
            'product_name'  => 'good item',
            'date'  => 'date'

        ];
        $this->invoiceEmail($invoiceData);
        return 'done';
        /**
         * Get Payment Status
         */
        $status = $this->get_payment_status('060628430019582161');
        dd($status);

        /**
         * Init Payment
         */
        $init = $this->init_payment(100); // USD
        /**
         * Execute Payment
         */
        $exec = $this->exec_payment('Product 1', 100);

        dd($exec);
    }

}
