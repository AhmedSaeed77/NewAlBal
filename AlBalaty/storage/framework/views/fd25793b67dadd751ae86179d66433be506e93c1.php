<?php $__env->startSection('content'); ?>
    <section class="inner-banner">
        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="<?php echo e(route('index')); ?>"> الرئيسيه </a></li>
                <li class="active"><a href="#"> تفاصيل المراجعه </a></li>
            </ul><!-- /.list-unstyled -->
            <h2 class="inner-banner__title">تفاصيل المراجعه  </h2><!-- /.inner-banner__title -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <section class="course-details" id='app-1'>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="course-details__content">
                        <div class="course-details__top">
                            <div class="course-details__top-left">
                                <h2 class="course-details__title">
                                    <?php echo e(Transcode::evaluate($i->event)['name']); ?>


                                </h2>
                                <small>
                                    <b>من:</b> <?php echo e($i->event->start); ?>  |  <b>إلى:</b> <?php echo e($i->event->end); ?>

                                </small>
                                <!-- /.course-details__title -->
                                <div class="course-one__stars">
                                        <span class="course-one__stars-wrap">
                                            <?php for($j=0; $j< round($i->total_rate); $j++): ?>
                                                <i class="fa fa-star"></i>
                                            <?php endfor; ?>
                                        </span><!-- /.course-one__stars-wrap -->
                                    <span class="course-one__count"><?php echo e(round($i->total_rate,1)); ?></span><!-- /.course-one__count -->
                                    <span class="course-one__stars-count"><?php echo e(\App\Rating::where('event_id', $i->event->id)->count()); ?></span><!-- /.course-one__stars-count -->
                                </div><!-- /.course-one__stars -->
                            </div><!-- /.course-details__top-left -->
                            <div class="course-details__top-right">
                           
                            </div><!-- /.course-details__top-right -->
                        </div><!-- /.course-details__top -->
                        <div class="course-one__image">
                            <img src="<?php echo e(url('storage/events/'.basename($i->event->img))); ?>" alt="">
                            <i class="far fa-heart"></i><!-- /.far fa-heart -->
                        </div><!-- /.course-one__image -->

                        <!--<ul class="course-details__tab-navs list-unstyled nav nav-tabs" role="tablist">-->
                        <!--    <li>-->
                        <!--        <a class="active" role="tab" data-toggle="tab" href="#overview">Overview</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a class="" role="tab" data-toggle="tab" href="#curriculum">Curriculum</a>-->
                        <!--    </li>-->
                        <!--    <li>-->
                        <!--        <a class="" role="tab" data-toggle="tab" href="#Schedule">Schedule</a>-->
                        <!--    </li>-->

                        <!--    <li>-->
                        <!--        <a class="" role="tab" data-toggle="tab" href="#review">Reviews</a>-->
                        <!--    </li>-->
                        <!--</ul><!-- /.course-details__tab-navs list-unstyled -->
                        <div class="tab-content course-details__tab-content ">
                            <div class="tab-pane show active  animated fadeInUp" role="tabpanel" id="overview">
                                <h4> حول هذه الباقة </h4>
                                <p class="course-details__tab-text"><?php echo Transcode::evaluate($i->event)['description']; ?></p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> ماذا ستتعلم </h4>
                                <p class="course-details__tab-text"><?php echo Transcode::evaluate($i->event)['what_you_learn']; ?></p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> المتطلبات </h4>
                                <p class="course-details__tab-text"><?php echo Transcode::evaluate($i->event)['requirement']; ?></p><!-- /.course-details__tab-text -->
                                <br>
                                <h4> لمن هذه الباقة </h4>
                                <p class="course-details__tab-text"><?php echo Transcode::evaluate($i->event)['who_course_for']; ?></p><!-- /.course-details__tab-text -->
                                <br>


                            </div><!-- /.course-details__tab-content -->
                            <div class="tab-pane  animated fadeInUp" role="tabpanel" id="curriculum">

                                <h3 class="course-details__tab-title">Video Content <small style="float:right;"><?php echo e($i->event->total_time); ?> | <?php echo e($i->event->total_lecture); ?> <?php echo e(__('Public/package.lectures')); ?></small> </h3>
                                <br>
                                <?php $__currentLoopData = \App\Chapters::where(['course_id' => $i->event->course_id])->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chapter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php if(count(\App\Video::where('chapter', $chapter->id)->get()) > 0 ): ?>
                                        <?php $demo = \App\Video::where(['chapter' => $chapter->id, 'event_id' => $i->event->id])->get(); ?>
                                        <?php if(count($demo)): ?>
                                        <h3 class="course-details__tab-title">
                                            <?php echo e(Transcode::evaluate($chapter)['name']); ?>

                                            <small style="float:right;">
                                                <?php echo e(count($demo)); ?> <?php echo e(__('Public/package.lecture')); ?>

                                            </small>
                                        </h3>
                                        <br>
                                        <ul class="course-details__curriculum-list list-unstyled">
                                            <?php $__currentLoopData = $demo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <li>
                                                    <div class="course-details__curriculum-list-left">
                                                        <div class="course-details__meta-icon video-icon">
                                                            <i class="fas fa-play"></i><!-- /.fas fa-play -->
                                                        </div><!-- /.course-details__icon -->
                                                        <a href="#"><?php echo e(Transcode::evaluate($video)['title']); ?></a>
                                                        
                                                    </div><!-- /.course-details__curriculum-list-left -->
                                                    <div class="course-details__curriculum-list-right"><?php echo e(\Carbon\Carbon::parse($video->duration)->format('i')); ?> <?php echo e(__('Public/package.min')); ?></div>
                                                    <!-- /.course-details__curriculum-list-right -->
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </ul><!-- /.course-details__curriculum-list -->
                                        <br>
                                        <?php endif; ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                            </div><!-- /.course-details__tab-content -->
                            <div class="tab-pane   animated fadeInUp" role="tabpanel" id="Schedule">
                                <div class="t-container ">

                                    <table style="width: 80%; ">
                                        <thead>
                                            <td>التاريخ</td>
                                            <td>من</td>
                                            <td>الي</td>
                                        </thead>
                                        <?php $__currentLoopData = \App\EventTime::where('event_id', $i->event->id)->orderBy('day')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($t->day); ?></td>
                                                <td><?php echo e($t->from); ?></td>
                                                <td><?php echo e($t->to); ?></td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                    </table>

                                </div>

                            </div><!-- /.course-details__tab-content -->
                            <div class="tab-pane  animated fadeInUp" role="tabpanel" id="review">
                                <div class="row">
                                    <div class="col-xl-7 d-flex">
                                        <div class="course-details__progress my-auto">
                                            <?php
                                                $star5percentage = 0;
                                                $star4percentage = 0;
                                                $star3percentage = 0;
                                                $star2percentage = 0;
                                                $star1percentage = 0;
                                                $reviews_count = count(\App\Rating::where('event_id', $i->event->id)->get());
                                                if( count(\App\Rating::where('event_id', $i->event->id)->get()) ){
                                                    $star5percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 5)->get()));
                                                    $star4percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 4)->get()));
                                                    $star3percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 3)->get()));
                                                    $star2percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 2)->get()));
                                                    $star1percentage = round(count(\App\Rating::where('package_id', $i->event->id)->where('rate', 1)->get()));
                                                }

                                            ?>
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Excellent</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: <?php echo e($reviews_count ? round($star5percentage/$reviews_count*100): 0); ?>%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count"><?php echo e($star5percentage); ?></p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Very Good</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: <?php echo e($reviews_count ? round($star4percentage/$reviews_count*100): 0); ?>%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count"><?php echo e($star4percentage); ?></p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Average</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: <?php echo e($reviews_count ? round($star3percentage/$reviews_count*100): 0); ?>%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count"><?php echo e($star3percentage); ?></p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Poor</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: <?php echo e($reviews_count ? round($star2percentage/$reviews_count*100): 0); ?>%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count"><?php echo e($star2percentage); ?></p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                            <div class="course-details__progress-item">
                                                <p class="course-details__progress-text">Terrible</p>
                                                <!-- /.course-details__progress-text -->
                                                <div class="course-details__progress-bar">
                                                    <span style="width: <?php echo e($reviews_count ? round($star1percentage/$reviews_count*100): 0); ?>%"></span>
                                                </div><!-- /.course-details__progress-bar -->
                                                <p class="course-details__progress-count"><?php echo e($star1percentage); ?></p>
                                                <!-- /.course-details__progress-count -->
                                            </div><!-- /.course-details__progress-item -->
                                        </div><!-- /.course-details__progress -->
                                    </div><!-- /.col-lg-8 -->
                                    <div class="col-xl-5 justify-content-xl-end justify-content-sm-center d-flex">
                                        <div class="course-details__review-box">
                                            <p class="course-details__review-count"><?php echo e(round($i->total_rate, 1)); ?></p>
                                            <!-- /.course-details__review-count -->
                                            <div class="course-details__review-stars">
                                                <?php for($j=0; $j<floor($i->total_rate); $j++): ?>
                                                    <i class="fas fa-star"></i><!-- /.fas fa-star -->
                                                <?php endfor; ?>
                                            </div><!-- /.course-details__review-stars -->
                                            <p class="course-details__review-text"><?php echo e($reviews_count); ?> reviews</p>
                                            <!-- /.course-details__review-text -->
                                        </div><!-- /.course-details__review-box -->
                                    </div><!-- /.col-lg-4 -->
                                </div><!-- /.row -->
                                <div class="course-details__comment">
                                    <?php $__currentLoopData = \App\Rating::where("event_id", $i->event->id)->orderBy('created_at', 'desc')->paginate(8); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $rate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if(\App\Models\Auth\User::find($rate->user_id)): ?>
                                            <?php
                                                $pic = asset('storage/icons/user/'.rand(1,3).'.png');
                                                if(\App\UserDetail::where('user_id', $rate->user_id)->first()){
                                                    if(\App\UserDetail::where('user_id', $rate->user_id)->get()->first()->profile_pic != null ){
                                                        $pic = url('storage/profile_picture/'.basename(\App\UserDetail::where('user_id', $rate->user_id)->get()->first()->profile_pic));
                                                    }
                                                }
                                            ?>
                                            <div class="course-details__comment-single">
                                                <div class="course-details__comment-top">
                                                    <div class="course-details__comment-img">
                                                        <img src="<?php echo e($pic); ?>" alt="">
                                                    </div><!-- /.course-details__comment-img -->
                                                    <div class="course-details__comment-right">
                                                        <h2 class="course-details__comment-name"><?php echo e(\App\Models\Auth\User::find($rate->user_id)->name); ?></h2>
                                                        <!-- /.course-details__comment-name -->
                                                        <div class="course-details__comment-meta">
                                                            <p class="course-details__comment-date"><?php echo e($rate->created_at->diffForHumans()); ?></p>
                                                            <!-- /.course-details__comment-date -->
                                                            <div class="course-details__comment-stars">
                                                                <?php for($j=0; $j< round($rate->rate); $j++): ?>
                                                                    <i class="fa fa-star"></i><!-- /.fa fa-star -->
                                                                <?php endfor; ?>
                                                            </div><!-- /.course-details__comment-stars -->
                                                        </div><!-- /.course-details__comment-meta -->
                                                    </div><!-- /.course-details__comment-right -->
                                                </div><!-- /.course-details__comment-top -->
                                                <p class="course-details__comment-text">
                                                    <?php echo e($rate->review); ?>

                                                </p>
                                                <!-- /.course-details__comment-text -->
                                            </div><!-- /.course-details__comment-single -->
                                        <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div><!-- /.course-details__comment -->
                            </div><!-- /.course-details__tab-content -->
                        </div><!-- /.tab-content -->
                    </div><!-- /.course-details__content -->
                </div><!-- /.col-lg-8 -->
               <div class="col-lg-4">
                    <div class="course-sidebar-3">
                        <div class="edu-course-widget widget-course-summery">
                            <div class="inner">
                                <div >
                                    <img src="<?php echo e($i->event->img); ?>" alt="Courses">
                                    <!--<a href="javascript:;" class="play-btn"><i class="icon-18"></i></a>-->
                                </div>
                                <div class="content">
                                    <h4 class="widget-title">تفاصي الباقة</h4>
                                    <ul class="course-item">
                                        <li>
                                            <span class="label"><i class="icon-60"></i>السعر</span>
                                            <span class="value price">
                                                <?php echo e($pricing['localized_price'] - $pricing['localized_coupon_discount']); ?> <?php echo e($pricing['currency_code']); ?>

                                            </span>
                                        </li>
                                        <?php if($pricing['localized_coupon_discount']): ?>
                                            <li>
                                                <span class="label"><i class="icon-60"></i>قيمة الخصم</span>
                                                <span class="value">
                                                <?php echo e($pricing['localized_coupon_discount']); ?> <?php echo e($pricing['currency_code']); ?>

                                            </span>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($pricing['renew_period_in_days']): ?>
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value"><?php echo e($i->event->expire_in_days); ?> يوم </span>
                                        </li>
                                        <?php else: ?>
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value">مدا الحياة</span>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <span class="label"><i class="icon-62"></i>المُعلم</span>
                                            <span class="value"><?php echo e($i->event->teacher->name); ?></span>
                                        </li>

                                        <li>
                                            <span class="label"><i class="icon-59"></i>اللغة</span>
                                            <span class="value"><?php echo e($i->event->lang); ?></span>
                                        </li>

                                    <input type="text" class="form-control" style="border: 1px solid #ced4da;" placeholder="Coupon Code" v-model="coupon">
                                    <div class="read-more-btn">
                                        <a href="#" class="edu-btn" data-bs-toggle="modal" data-bs-target="#paymentModel" @click="regenerate_price">ابدا الان <i class="icon-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                
            </div><!-- /.row -->
        </div><!-- /.container -->
        
        <div class="modal fade" id="paymentModel" tabindex="-1" role="dialog" aria-labelledby="modalExampleTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <!-- Close -->
                        <button type="button" class="close btn btn-danger" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>

                        <!-- Heading -->
                        <h2 class="fw-bold text-center mb-1" id="modalExampleTitle">
                            الدفع
                        </h2>

                        <!-- Text -->
                        <p class="font-size-lg text-center text-muted mb-6 mb-md-8">
                            ابدا عملية الدفع
                        </p>

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="profile-tab" data-bs-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Visa/Master Card</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">

                            <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <p class="alert alert-danger" v-if="error != ''">{{ error }}</p>
                                    <div>
                                        
                                        <div id="myfatoorah-card-element"></div>

                                        <button @click="myfatoorahSubmit()" class="btn btn-warning btn-lg">Pay Now</button>

                                    </div>

                                </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.course-details -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscode'); ?>

    <?php if(env('APP_ENV') == 'local'): ?>
        <script src="https://demo.myfatoorah.com/cardview/v1/session.js"></script>
    <?php else: ?>
        <?php if($i->event->pricing['country_code'] == 'sa'): ?>
            <script src="https://sa.myfatoorah.com/cardview/v1/session.js"></script>
        <?php else: ?>
            <script src="https://portal.myfatoorah.com/cardview/v1/session.js"></script>
        <?php endif; ?>
    <?php endif; ?>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        var app = new Vue({

            el: '#app-1',
            data: {
                error: '',
                package_id: <?php echo e($i->event->id); ?>,
                paymentMethod: 'null',
                coupon: '<?php echo e(Illuminate\Support\Facades\Input::get('coupon')); ?>',
                price: 0,
                discount: 0,
                newPrice: 0,
                visa_generated: 0,
                auth: <?php if(Auth::check()): ?> 1 <?php else: ?> 0 <?php endif; ?>,
                myfatoorah: {
                    SessionId: '',
                    CountryCode: '',
                },
            },
            mounted(){
                this.initSal();
            },
            methods: {
                initSal: function(){
                    sal({
                        threshold: 0.01,
                        once: true,
                    });
                },
                
                
                
                
                
                
                

                
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                regenerate_price: function(){


                    if(!this.auth){
                        window.location.replace('<?php echo e(route('login')); ?>');
                    }

                    Data = {
                        package_id: app.package_id,
                        coupon_code: app.coupon,
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });

                    $.ajax ({
                        type: 'POST',
                        url: '<?php echo e(route('myfatoorah.price.details')); ?>',
                        data: Data,
                        success: function(res) {
                            console.log(res);

                            if(res.error != ''){
                                app.error = res.error;
                                return;
                            }

                            if(res.paid == true){
                                window.location.replace('<?php echo e(route('student.courses')); ?>');
                                return;
                            }

                            app.price = Number(res.price);
                            app.discount = Number(res.discount);

                            if (app.price > app.discount) {
                                app.newPrice = app.price - app.discount;
                            } else {

                                app.newPrice = 0;
                            }

                            if(app.myfatoorah.SessionId == ''){
                                $.ajax ({
                                    type: 'POST',
                                    url: '<?php echo e(route('myfatoorah.init.session')); ?>',
                                    success: function (res) {
                                        app.myfatoorah.SessionId = res['SessionId'];
                                        app.myfatoorah.CountryCode = res['CountryCode'];
                                        var config = {
                                            countryCode: res['CountryCode'], // Here, add your Country Code you receive from InitiateSession Endpoint.
                                            sessionId: res['SessionId'], // Here you add the "SessionId" you receive from InitiateSession Endpoint.
                                            cardViewId: "myfatoorah-card-element",

                                            style: {
                                                direction: "ltr",
                                                cardHeight: 130,
                                                input: {
                                                    color: "black",
                                                    fontSize: "13px",
                                                    fontFamily: "sans-serif",
                                                    inputHeight: "32px",
                                                    inputMargin: "0px",
                                                    borderColor: "c7c7c7",
                                                    borderWidth: "1px",
                                                    borderRadius: "8px",
                                                    boxShadow: "",
                                                    placeHolder: {
                                                        holderName: "Name On Card",
                                                        cardNumber: "Number",
                                                        expiryDate: "MM / YY",
                                                        securityCode: "CVV",
                                                    }
                                                },
                                            },

                                            label: {
                                                display: false,
                                                color: "black",
                                                fontSize: "13px",
                                                fontWeight: "normal",
                                                fontFamily: "sans-serif",
                                                text: {
                                                    holderName: "Card Holder Name",
                                                    cardNumber: "Card Number",
                                                    expiryDate: "Expiry Date",
                                                    securityCode: "Security Code",
                                                },
                                            },

                                            error: {
                                                borderColor: "red",
                                                borderRadius: "8px",
                                                boxShadow: "0px",
                                            },
                                        };
                                        myFatoorah.init(config);
                                    }
                                });
                            }

                        },
                        error: function(res){
                            console.log('Error:', res);
                        }
                    });



                },
                myfatoorahSubmit: function(){
                    myFatoorah.submit()
                    // On success
                        .then(function (response) {
                            // Here you need to pass session id to you backend here
                            var sessionId = response.SessionId;
                            var cardBrand = response.CardBrand;
                            app.myfatoorah_charge(sessionId);
                        })
                        // In case of errors
                        .catch(function (error) {
                            console.log(error);
                        });
                },

                myfatoorah_charge: function(sessionId = 'false'){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });


                    $.ajax ({
                        type: 'POST',
                        url: '<?php echo e(route('myfatoorah.charge')); ?>',
                        data: {
                            item_id: app.package_id,
                            item_type: 'event',
                            coupon_code: app.coupon,
                            sessionId,
                            // user_id: '<?php echo e(Auth::user()? Auth::user()->id:''); ?>',
                        },
                        success: function (res) {
                            if(res.error == ''){
                                window.location.replace(res.url);
                            }else{
                                // console.log(res);
                                swal({
                                    title: res.error,
                                    type: 'error',
                                    //   confirmButtonColor: '#DD6B55',
                                    confirmButtonText: 'Ok',
                                });
                            }
                        },
                        error: function (error) {
                            console.log(error)
                        },
                    });
                },
            }
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>