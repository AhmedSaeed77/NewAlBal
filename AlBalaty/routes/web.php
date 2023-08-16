<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Models\Auth\Admin;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Jenssegers\Agent\Agent;


// Route::get('/test', function(){
//     dd(
//         DB::table('package_stages')->where('package_id', 6)
//             ->groupBy('question_id')
//             ->join('stage_exams', 'package_stages.stage_id', '=', 'stage_exams.stage_id')
//             ->join('exam_sections', 'exam_sections.exam_id', '=', 'stage_exams.exam_id')
//             ->join('section_questions', 'section_questions.section_id', '=', 'exam_sections.id')
//             ->get()->count()
//     );
// });


Route::post('/teacher-register', function(Request $request){
    if(strlen($request->password) < 8 || ($request->password != $request->password_conf)){
        return back()->withInput()->with('error', 'Choose Good Password');
    }

    $admin = Admin::where('email', $request->email)->first();
    if($admin){
        return back()->withInput()->with('error', 'Email Already Exists');
    }
    $admin = Admin::where('phone', $request->phone)->first();
    if($admin){
        return back()->withInput()->with('error', 'Phone Number Already Exists.');
    }

    $admin = Admin::create([
        'name'          => $request->name,
        'email'         => $request->email,
        'password'      => Hash::make($request->password),
        'country'       => $request->country,
        'phone'         => $request->phone,
        'gender'        => $request->gender,
        'description'   => $request->description,
        'teachingLang'   => $request->teachingLang,
    ]);
    return redirect()->route('admin.login')->with('success', 'Account Created, Please Login.');
})->name('public.admin.register');


/** Urway Payment Gateway */
Route::post('Urway/pay', 'UrwayController@pay')->name('urway.pay')->middleware('auth');
Route::get('Urway/callback', 'UrwayController@callback')->name('urway.callback');


/** MyFatoorah Payment Gateway */
Route::post('/MyFatoorah/package-payment/price-details', 'MyFatoorahController@price_details')->name('myfatoorah.price.details');
Route::post('MyFatoorah/charge', 'MyFatoorahController@charge')->name('myfatoorah.charge');
Route::get('MyFatoorah/callback', 'MyFatoorahController@callBack')->name('myfatoorah.callback');
Route::get('MyFatoorah/error/callback', 'MyFatoorahController@errorCallBack')->name('myfatoorah.error.callback');
Route::post('MyFatoorah/init-session', 'MyFatoorahController@init_session')->middleware('auth')->name('myfatoorah.init.session');

/**
 * Setup Localization
 */
Route::get('/locale/{lang}', function($lang){
    \Session(['locale'=>$lang]);
    return back();
})->name('set.localization');
/**
 * Country Code
 */
Route::get('/locale-country/{code}', function($country_code){
    \Session(['country_code' => $country_code]);
    return back();
})->name('set.country-code');

Route::view('/calculator', 'user/calculator')->middleware('auth')->name('calculator');

Route::post('dropzone/upload', 'DropzoneController@handler')->name('dropzone.handler');

Route::post('TAP/charge', 'TapController@TAP_Charge')->name('charge');
Route::get('TAP/redirect', 'TapController@TAP_ChargeRedirect')->name('chargeRedirect');

Route::get('/', 'HomeController@index')->name('index');
//Route::get('/', function(){
//
//    return view('index');
//
//})->name('index');

Route::get('/confirm/account/i/{id}/code', 'HomeController@activateAccount')->name('activateAccount')->middleware('guest');

//Route::get('/about-us', 'HomeController@aboutUs')->name('aboutUs');


Route::get('delete/comment/review/{id}', function($id){
    $c = \App\Comment::find($id);
    if($c){
        $c->delete();
    }
    return back()->with('success', 'comment deleted !');
})->middleware('auth:admin')->name('delete.comment.on.review');

Route::get('delete/package/review/{id}', function($id){
    $rate = \App\Rating::find($id);
    $rate->delete();
    return back()->with('success', 'Review has been deleted.');
})->middleware('auth:admin')->name('delete.package.review');

/**
 * Social Login
 */
Route::post('login/step/setup', 'Auth\LoginController@setupAccount')->name('socialite.setup.account');
Route::post('login/password/step', 'Auth\LoginController@SocialLogin')->name('socialite.login.account');
Route::get('login/{provider}', 'Auth\SocialController@redirect')->name('social.login');
Route::get('login/{provider}/callback','Auth\SocialController@Callback');




Route::get('user/Inboxv2', 'MessageController@user_inbox_show')->middleware('auth')->name('user.inboxv2');
Route::post('user/Inboxv2', 'MessageController@user_inbox_send')->middleware('auth')->name('user.inboxv2.send');

Route::post('sendEmail/Customer', 'HomeController@sendEmailCustomer')->name('send.mail.customer');

Route::get('/load/first/topic/{package_id}', 'Users\PremiumQuizController@attachThePackageContent')->middleware('auth')->name('attach.package');


Route::post('certification/Course/img', 'CertificationController@generate')->middleware('auth')->name('generate.certification');
Route::get('certification/download/{id}', 'CertificationController@sendCertification')->middleware('auth')->name('download.certification');


Route::get('/Video/Secure/{id}/{package_id}', 'VideoStreamController@stream_video')->middleware('auth')->name('tv');


Route::get('QuizHistory/review/{id}', 'Users\PremiumQuizController@QuizHistory_show')->middleware('auth')->name('QuizHistory.show');
Route::post('QuizHistory/review/load', 'Users\PremiumQuizController@QuizHistory_load')->middleware('auth')->name('QuizHistory.load');


/**
 * Public Views
 */
Route::get('FreeResource/demo/videos', 'HomeController@freeResourceDemoVideos')->name('FreeVideo');
Route::get('about', 'HomeController@reviews')->name('reviews');

//Route::get('PublicFAQ', function(){
//    return view('faq');
//})->name("public.faq");



Route::get('user/dashboard', 'HomeController@user_board')->name('user.dashboard');

Route::get('/PackageByCourse', 'SuperAdmin\packageController@packageByCourse')->name('package.by.course');


Route::get('/mobileVersion', function(){
    return view('indexNoLogin');
});


Route::get('/package/{slug_or_id}', 'HomeController@package_view')->name('public.package.view');

Auth::routes();

Route::post('login/withstateResponse', 'Auth\LoginController@loginWithStateResponse')->name('loginWithStateResponse');

Route::get('/home', function(){
    return \Redirect::to(route('student.dashboard'));
})->name('home');


Route::post('/makeallasreadnotifications', function(){
    $all= \App\Notification::where('sight','=','0')->get();
    foreach($all as $i){
        $i->sight = 1;
        $i->save();
    }
})->name('MakeRead');

Route::post('/makeallasreadmessages', function(){
    $all= \App\Message::where('sight','=','0')->where('to_user_id','=',Auth::user()->id)->get();
    foreach($all as $i){
        $i->sight = 1;
        $i->save();
    }
})->name('MakeReadMsg');
Route::post('/admin/makeallasreadmessages', function(){
    $all= \App\Message::where('sight','=','0')->where('to_user_type','=','admin')->get();
    foreach($all as $i){
        $i->sight = 1;
        $i->save();
    }
})->name('MakeReadMsg.admin');



/**
 * Free Quiz
 */


Route::get('/allPackages/course/{id}','HomeController@showAllPackages')->name('showAllPackages');


Route::get('/quiz', 'Users\QuizController@index')->name('FreeQuiz');
Route::post('/quiz/generate', 'Users\QuizController@generate')->name('quiz.generate');
Route::post('/quiz/reloadQuestionsNumber', 'Users\QuizController@reloadQuestionsNumber')->name('quiz.reloadQuestionsNumber');
Route::get('/quiz/feedback/{id}', 'Users\QuizController@showFeedback')->name('feedback');

Route::get('/Free/Video', 'Users\QuizController@videoIndex')->name('video.index.free');
Route::get('/Free/Video/{video_id}', 'Users\QuizController@videoShow')->name('video.show.free');

Route::get('/contactAdmin', 'MessageController@userIndex')->name('user.index')->middleware('auth');
Route::post('/contactAdmin/post', 'MessageController@userSend')->name('user.send')->middleware('auth');

/**
 * Premium Quiz
 */

Route::get('/rest-videos-progress/{package_id}', 'Users\PremiumQuizController@restVideosProgress')->middleware('auth')->name('restVideosProgress');
Route::get('/complete-videos-progress/{package_id}', 'Users\PremiumQuizController@completeVideosProgress')->middleware('auth')->name('completeVideosProgress');

Route::post('/PremiumQuiz/generate', 'Users\PremiumQuizController@generate')->name('PremiumQuiz.generate');
Route::post('/PremiumQuiz/generateCX', 'Users\PremiumQuizController@generateCX')->name('PremiumQuiz.generateCX');
Route::get('/PremiumQuiz/{package_id}/{topic}/{topic_id}/preview/{quiz_id}', 'Users\PremiumQuizController@reloadQuestionsNumber')->name('PremiumQuiz-st3');
Route::post('PremiumQuiz/load/topic', 'Users\PremiumQuizController@generatePackageContent')->name('load.topic');
Route::post('/PremiumQuiz/score/store', 'Users\PremiumQuizController@scoreStore')->name('PremiumQuiz.scoreStore');
Route::get('/PremiumQuiz/score/history', 'Users\PremiumQuizController@scoreHistory')->name('scoreHistory');
Route::get('/PremiumQuiz/feedback/{id}', 'Users\PremiumQuizController@showFeedback')->name('feedback')->middleware('auth');
Route::post('/PremiumQuiz/store/answers','Users\PremiumQuizController@SaveAnswersForLaterOn')->name('saveForLaterOn');
Route::get('/PremiumQuiz/reset_package/{package_id}', 'Users\PremiumQuizController@reset_package')->middleware('auth')->name('reset.package');
Route::get('/Quiz_hisory', 'Users\PremiumQuizController@QuizHistoryShow')->middleware('auth')->name('QuizHistoryShow');
Route::get('/material/show/{course_id}', 'Users\PremiumQuizController@material_show')->middleware('auth')->name('material.show');
Route::get('/material/download/{id}', 'Users\PremiumQuizController@download_material')->middleware('auth')->name('download.material');
Route::get('/studyPlan/show/{course_id}', 'Users\PremiumQuizController@studyPlan_show')->middleware('auth')->name('studyPlan.show');

Route::get('/flashCard', 'Users\PremiumQuizController@flashCard_index')->middleware('auth')->name('flashCard.index');
Route::get('/flashCard/{id}', 'Users\PremiumQuizController@flashCard_show')->middleware('auth')->name('flashCard.show');
Route::get('/FAQ', 'Users\PremiumQuizController@faq_index')->middleware('auth')->name('faq.index');
Route::get('/user/feedback', 'Users\PremiumQuizController@feedback_index')->middleware('auth')->name('user.feedback.index');
Route::post('/user/store', 'Users\PremiumQuizController@feedback_store')->middleware('auth')->name('user.feedback.store');
Route::get('/user/delete/{id}', 'Users\PremiumQuizController@feedback_delete')->middleware('auth')->name('user.feedback.delete');
Route::post('/PremiumQuiz/VideoComplete', 'Users\PremiumQuizController@VideoComplete')->middleware('auth')->name('PremiumQuiz.VideoComplete');
Route::get('/PremiumQuiz/Event/VideoComplete/{event_id}/{video_id}', 'Users\PremiumQuizController@EventVideoComplete')->middleware('auth')->name('Event.PremiumQuiz.VideoComplete');

/** Rating System */
Route::post('/user/rate', 'Users\PremiumQuizController@rate')->name('user.rate');
Route::post('/user/review', 'Users\PremiumQuizController@storeReview')->middleware('auth')->name('user.review');


/**
 * Event Page
 */
Route::get('/event/view/{event_id}', 'HomeController@eventPage')->name('public.event.view');


Route::get('/PremiumQuiz/vid/{package_id}/{topic}/{topic_id}', 'Users\PremiumQuizController@st3_vid')->name('st3_vid');
Route::get('/PremiumQuiz/vid/{package_id}/{topic}/{topic_id}/{video_id}', 'Users\PremiumQuizController@st4_vid')->name('st4_vid');
Route::get('/Event/vid/{event_id}/{topic}/{topic_id}/{video_id}', 'Users\PremiumQuizController@event_vid')->name('event_vid');
Route::get('/Event/{event_id}/whatsapp/join', function($event_id){
    $event = DB::table('event_user')
        ->where([
            'event_id'  => $event_id,
            'user_id'   => Auth::user()->id,
            'show_whatsapp_link'    => 1,
        ])
        ->join('events', 'event_user.event_id', '=', 'events.id')
        ->select('show_whatsapp_link', 'whatsapp')
        ->first();
    if($event){
        DB::table('event_user')
            ->where([
                'event_id'  => $event_id,
                'user_id'   => Auth::user()->id,
            ])->update(['show_whatsapp_link' => 0]);

        return \Redirect::to($event->whatsapp);
    }
    return back()->with('error', 'WhatsApp Link is only available One Time');
})->middleware('auth')->name('open.whatsapp');
/* 
    Payment Routes
*/

Route::post('generate/payment/link', function(\Illuminate\Http\Request $req){
    if($req->input('coupon_code') != ''){
        return route('pay', [$req->input('package_id'), $req->input('coupon_code')]);

    }else{
        // return \Redirect::to(route('public.package.view', $req->input('package_id')));
        return route('pay', [$req->input('package_id'), 'ignore']);
    }


})->name('generate.payment.link');

Route::get('generate/payment/coupon/{id}', function(\Illuminate\Http\Request $req, $id /** Coupon Code */){

    $coupon = \App\Coupon::where('code', '=', $id)->get()->first();
    if($coupon){
        if($coupon->package_id){
            return \Redirect::to(  route('public.package.view',  $coupon->package_id ).'?coupon='.$id);
        }else if($coupon->event_id){
            //
            return \Redirect::to(  route('public.event.view',  $coupon->event_id ).'?coupon='.$id);
        }
    }
    return back();

    // return \Redirect::to(route('pay', [\App\Coupon::where('code', '=', $id)->get()->first()->package_id , $id]));
})->name('generate.payment.with.coupon');

Route::get('/payment/package/{id}/{coupon}', 'PaymentController@pay')->name('pay');
Route::get('/payment/status/{payment_status}/{package_id}/{coupon_code}', 'PaymentController@paymentStatus')->name('payment.status');

Route::post('/payment/check','PaymentController@check')->name('pay.check');

Route::get('/payment/extend/package/{id}', 'PaymentController@extend')->name('extend');
Route::get('/payment/extend/status/{payment_status}/{package_id}', 'PaymentController@extendStatus')->name('extend.status');
Route::post('/payment/package/price/details', 'PaymentController@price_details')->name('price.details');
Route::post('/payment/event/price/details', 'PaymentController@event_price_details')->name('event.price.details');
Route::post('/payment/pay/method2', 'PaymentController@payV2')->name('confirmPaymentMethod2');
Route::post('/payment/event/pay/method2', 'PaymentController@payV2Event')->name('event.confirmPaymentMethod2');

/**
 * mobile redirect
 */

Route::get('/mobile/redirect/', function(){
    return view('layouts.app-mobile');
})->name('mobile.redirect');

/*
   User Routes
*/
Route::get('profile', 'HomeController@showProfile')->name('show.profile');
Route::post('user/change/password', 'HomeController@UserUpdatePasswordRequest')->name('user.update.password');
Route::post('user/update/profile', 'HomeController@UserUpdateProfileInfo')->name('user.update.profile');
Route::post('user/update/profile/pic','HomeController@UserUpdateProfilePic')->name('user.update.profile.pic');

/*
    Screen shot 
*/
Route::get('user/screenShot', 'Users\PremiumQuizController@ScreenShot')->middleware('auth')->name('ScreenShot');


/**
 * Comments
 */

Route::post('user/comment/store', 'CommentController@store')->name('comment.store')->middleware('auth');
Route::post('user/comment/reply', 'CommentController@reply')->name('comment.reply')->middleware('auth');
Route::post('user/comment/admin/reply','CommentController@AdminReply')->name('comment.admin.reply')->middleware('auth:admin');

Route::post('nested/rating', 'CommentController@nested_rate')->name('rate.store.nested')->middleware('auth:admin');



Route::get('/terms/Policy', function(){
    return view('terms');
})->name('terms.show.public');


/**
 * security check AUTH::check()
 */
//  Route::post('security/auth/check', 'HomeController@securityCheck')->name('security.check');

Route::group([ 'prefix' => 'student','middleware' => ['auth'] ], function() {
    Route::get('/dashboard','Users\HomeController@index')->name('student.dashboard');
    Route::get('/material','Users\MaterialController@index')->name('student.material');
    Route::get('/material/preview/{id}', 'Users\MaterialController@preview')->name('student.material.preview');
    Route::get('/course_details/{package_id}/part/{part_id}','Users\CourseDetailsController@show')->name('student.package.details');
    Route::get('/courses','Users\CoursesController@index')->name('student.courses');
    Route::get('/progress','Users\VideoProgressController@index')->name('student.progress');
    Route::get('/events','Admin\EventController@myevents')->name('student.events');
    Route::get('/event/{id}','Admin\EventController@eventPage')->name('student.event');
});

Route::post('/packages-catalog/get-filter-options', 'Visitor\PublicController@packageCatalogFilterOptions')->name('packages-catalog.filter-options');
Route::post('/packages-catalog/packages-query', 'Visitor\PublicController@packageQuery')->name('packages-catalog.query');
Route::get('/packages-catalog/{path_id}/path', 'Visitor\PublicController@packagesCatalog')->name('packages-catalog');




