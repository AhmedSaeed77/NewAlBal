

<?php $__env->startSection('content'); ?>
    <div class="edu-breadcrumb-area breadcrumb-style-3">
        <div class="container">
            <div class="breadcrumb-inner">
                <ul class="edu-breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">الرئيسية</a></li>
                    <li class="separator"><i class="icon-angle-left"></i></li>
                    <li class="breadcrumb-item"><a href="<?php echo e(route('index')); ?>">الكورسات</a></li>
                    <li class="separator"><i class="icon-angle-left"></i></li>
                    <li class="breadcrumb-item active" aria-current="page">عرض التفاصيل</li>
                </ul>
                <div class="page-title">
                    <h1 class="title"><?php echo e($package->package_name); ?></h1>
                </div>
                <ul class="course-meta">
                    <li><i class="icon-58"></i>بواسطة <?php echo e($package->teacher_name); ?></li>
                    <li><i class="icon-59"></i><?php echo e($package->lang); ?></li>

                </ul>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1">
                <span></span>
            </li>
            <li class="shape-2 scene"><img data-depth="2" src="<?php echo e(asset('assets-public/images/about/shape-13.png')); ?>" alt="shape"></li>
            <li class="shape-3 scene"><img data-depth="-2" src="<?php echo e(asset('assets-public/images/about/shape-15.png')); ?>" alt="shape"></li>
            <li class="shape-4">
                <span></span>
            </li>
            <li class="shape-5 scene"><img data-depth="2" src="<?php echo e(asset('assets-public/images/about/shape-07.png')); ?>" alt="shape"></li>
        </ul>
    </div>

    <!--=====================================-->
    <!--=     Courses Details Area Start    =-->
    <!--=====================================-->
    <section class="edu-section-gap course-details-area" id="app-1">
        <div class="container">
            <div class="row row--30">
                <div class="col-lg-8">
                    <div class="course-details-content course-details-2">
                        <div class="course-overview">
                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">حول هذه الباقة</h3>
                            <p data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                <?php echo $package->description; ?>

                            </p>

                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">المتطلبات</h3>
                            <p class="mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                <?php echo $package->requirement; ?>

                            </p>
                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">ماذا ستتعلم</h3>
                            <p class="mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                <?php echo $package->what_you_learn; ?>

                            </p>

                            <h3 class="heading-title" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">لمن هذه الباقة</h3>
                            <p class="mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800" style="padding: 0;">
                                <?php echo $package->who_course_for; ?>

                            </p>
                        </div>













































































































































































                        <div class="course-instructor-wrap mb--90" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <h3 class="heading-title">أساتذتك</h3>
                            <div class="course-instructor">
                                <div class="thumbnail">
                                    <img src="<?php echo e(asset('assets-public/images/course/author-01.png')); ?>" alt="Author Images">
                                </div>
                                <div class="author-content">
                                    <h6 class="title"><?php echo e($package->teacher_name); ?></h6>
                                    <p>Consectetur adipisicing elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua enim minim veniam quis nostrud exercitation ulla mco laboris nisi ut aliquip ex ea commodo consequat. duis aute irure dolor in reprehenderit in voluptate.</p>
                                    <ul class="social-share">
                                        <li><a href="#"><i class="icon-facebook"></i></a></li>
                                        <li><a href="#"><i class="icon-twitter"></i></a></li>
                                        <li><a href="#"><i class="icon-linkedin2"></i></a></li>
                                        <li><a href="#"><i class="icon-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="course-review" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <h3 class="heading-title">اراء الطلاب</h3>
                            <p>5.00 average rating based on 7 rating</p>
                            <div class="border-box">

                                <!-- Start Comment Area  -->
                                <div class="comment-area">
                                    <div class="comment-list-wrapper">
                                        <!-- Start Single Comment  -->
                                        <div class="comment">
                                            <div class="thumbnail">
                                                <img src="<?php echo e(asset('assets-public/images/blog/comment-01.jpg')); ?>" alt="Comment Images">
                                            </div>
                                            <div class="comment-content">
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <h5 class="title">Haley Bennet</h5>
                                                <span class="date">Oct 10, 2021</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Comment  -->
                                        <!-- Start Single Comment  -->
                                        <div class="comment">
                                            <div class="thumbnail">
                                                <img src="<?php echo e(asset('assets-public/images/blog/comment-02.jpg')); ?>" alt="Comment Images">
                                            </div>
                                            <div class="comment-content">
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <h5 class="title">Simon Baker</h5>
                                                <span class="date">Oct 10, 2021</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Comment  -->
                                        <!-- Start Single Comment  -->
                                        <div class="comment">
                                            <div class="thumbnail">
                                                <img src="<?php echo e(asset('assets-public/images/blog/comment-03.jpg')); ?>" alt="Comment Images">
                                            </div>
                                            <div class="comment-content">
                                                <div class="rating">
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                    <i class="icon-23"></i>
                                                </div>
                                                <h6 class="title">Richard Gere</h6>
                                                <span class="date">Oct 10, 2021</span>
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                            </div>
                                        </div>
                                        <!-- End Single Comment  -->
                                    </div>
                                </div>
                                <!-- End Comment Area  -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="course-sidebar-3">
                        <div class="edu-course-widget widget-course-summery">
                            <div class="inner">
                                <div class="thumbnail">
                                    <img src="<?php echo e($package->img_url); ?>" alt="Courses">
                                    <a href="javascript:;" class="play-btn"><i class="icon-18"></i></a>
                                </div>
                                <div class="content">
                                    <h4 class="widget-title">تفاصيل الباقة</h4>
                                    <ul class="course-item">
                                        <li>
                                            <span class="label"><i class="icon-60"></i>السعر</span>
                                            <span class="value price">
                                                <?php echo e(max($package->pricing['localized_price'] - $package->pricing['localized_coupon_discount'], 0)); ?> <?php echo e($package->pricing['currency_code']); ?>

                                            </span>
                                        </li>
                                        <?php if($package->pricing['localized_coupon_discount']): ?>
                                            <li>
                                                <span class="label"><i class="icon-60"></i>قيمة الخصم</span>
                                                <span class="value">
                                                <?php echo e($package->pricing['localized_coupon_discount']); ?> <?php echo e($package->pricing['currency_code']); ?>

                                            </span>
                                            </li>
                                        <?php endif; ?>
                                        <?php if($package->pricing['renew_period_in_days']): ?>
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value"><?php echo e($package->pricing['renew_period_in_days']); ?> يوم </span>
                                        </li>
                                        <?php else: ?>
                                        <li>
                                            <span class="label"><i class="icon-37"></i>فترة الاشتراك</span>
                                            <span class="value">مدا الحياة</span>
                                        </li>
                                        <?php endif; ?>
                                        <li>
                                            <span class="label"><i class="icon-62"></i>المُعلم</span>
                                            <span class="value"><?php echo e($package->teacher_name); ?></span>
                                        </li>








                                        <li>
                                            <span class="label"><i class="icon-63"></i>عدد الطلبة</span>
                                            <span class="value"><?php echo e($package->students_count); ?> طلاب</span>
                                        </li>
                                        <li>
                                            <span class="label"><i class="icon-59"></i>اللغة</span>
                                            <span class="value"><?php echo e($package->lang); ?></span>
                                        </li>




                                    </ul>
                                    <input type="text" class="form-control" style="border: 1px solid #ced4da;" placeholder="Coupon Code" v-model="coupon">
                                    <div class="read-more-btn">

                                        <a href="#" class="edu-btn" data-bs-toggle="modal" data-bs-target="#paymentModel" @click="regenerate_price">ابدا الان <i class="icon-4"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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
    </section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscode'); ?>

    <?php if(env('APP_ENV') == 'local'): ?>
        <script src="https://demo.myfatoorah.com/cardview/v1/session.js"></script>
    <?php else: ?>
        <?php if($package->pricing['country_code'] == 'sa'): ?>
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
                package_id: <?php echo e($package->id); ?>,
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
                            item_type: 'package',
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