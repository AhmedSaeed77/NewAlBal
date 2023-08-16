
<?php $__env->startSection('head'); ?>
<style>
    .about-style-3 .about-content .nav-tabs .nav-link:hover, .about-style-3 .about-content .nav-tabs .nav-link.active {
    color: #e4b100 !important;
}
.about-style-3 .about-content .nav-tabs .nav-link:hover:after, .about-style-3 .about-content .nav-tabs .nav-link.active:after {
    width: 0%; 
    opacity: 0;
}
</style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!--=====================================-->
    <!--=       Hero Banner Area Start      =-->
    <!--=====================================-->
    <div class="hero-banner hero-style-1">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="banner-content">
                        <h1 class="title" data-sal-delay="100" data-sal="slide-up" data-sal-duration="1000">منصة<span style="color:#e4b100"> البلاطى</span> <br>متعة التعلم</h1>
                        
                        <div class="banner-btn" data-sal-delay="400" data-sal="slide-up" data-sal-duration="1000">
                            <a href="<?php echo e(route('register')); ?>" class="edu-btn">سجل الأن</a>
                        </div>
                        <ul class="shape-group">
                            <li class="shape-1 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="2" src="<?php echo e(asset('assets-public/images/about/shape-13.png')); ?>" alt="Shape">
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="banner-thumbnail">
                        <div style="height:500px" class="thumbnail" data-sal-delay="500" data-sal="slide-left" data-sal-duration="1000">
                            <img style="height:100% !important" src="<?php echo e(asset('assets-public/images/banner/girl-1.png')); ?>" alt="Girl Image">
                        </div>

                        <ul class="shape-group">
                            <li class="shape-1" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="1.5" src="<?php echo e(asset('assets-public/images/about/shape-15.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-2 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="-1.5" src="<?php echo e(asset('assets-public/images/about/shape-16.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-3 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <span data-depth="3" class="circle-shape"></span>
                            </li>
                            <li class="shape-4" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="-1" src="<?php echo e(asset('assets-public/images/counterup/shape-02.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-5 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="1.5" src="<?php echo e(asset('assets-public/images/about/shape-13.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-6 scene" data-sal-delay="1000" data-sal="fade" data-sal-duration="1000">
                                <img data-depth="-2" src="<?php echo e(asset('assets-public/images/about/shape-18.png')); ?>" alt="Shape">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="shape-7">
            <img src="<?php echo e(asset('assets-public/images/about/h-1-shape-01.png')); ?>" alt="Shape">
        </div>
    </div>
    <!--=====================================-->
    <!--=       Features Area Start      =-->
    <!--=====================================-->
    <!-- Start Categories Area  -->
    <div class="features-area-2">
        <div class="container">
            <div class="features-grid-wrap">
                <div class="features-box features-style-2 edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject" src="<?php echo e(asset('assets-public/images/animated-svg-icons/online-class.svg')); ?>" alt="animated icon">
                    </div>
                    <div class="content">
                        <h5 class="title"><span><?php echo e($webSiteStatistics->package_no); ?></span> باقات اونلاين</h5>
                    </div>
                </div>
                <div class="features-box features-style-2 edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject" src="<?php echo e(asset('assets-public/images/animated-svg-icons/instructor.svg')); ?>" alt="animated icon">
                    </div>
                    <div class="content">
                        <h5 class="title"><span> <?php echo e($webSiteStatistics->teacher_no.' '); ?>من افضل</span>المعلمين</h5>
                    </div>
                </div>
                <div class="features-box features-style-2 edublink-svg-animate">
                    <div class="icon certificate">
                        <img class="svgInject" src="<?php echo e(asset('assets-public/images/animated-svg-icons/certificate.svg')); ?>" alt="animated icon">
                    </div>
                    <div class="content">
                        <h5 class="title"><span>تعلم</span>من المنزل</h5>
                    </div>
                </div>
                <div class="features-box features-style-2 edublink-svg-animate">
                    <div class="icon">
                        <img class="svgInject" src="<?php echo e(asset('assets-public/images/animated-svg-icons/user.svg')); ?>" alt="animated icon">
                    </div>
                    <div class="content">
                        <h5 class="title"><span><?php echo e($webSiteStatistics->student_no); ?></span>اعضاء</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories Area  -->
    <!--=====================================-->
    <!--=       Categories Area Start      =-->
    <!--=====================================-->
    <!-- Start Categories Area  -->
    <?php
                use App\Models\Library\Path;
                $pathsByCountry = Path::query()->join('countries', 'countries.id', 'paths.country_id')
                    ->select(['paths.*', 'countries.name AS country_name'])
                    ->orderBy('paths.z_index')
                    ->where(function($query){
                        if(\Session('country_code')){
                            $query->where('code', \Session('country_code'));
                        }
                    })->get()->groupBy('country_id');
                ?>
    <div class="edu-categorie-area categorie-area-2 edu-section-gap">
        <div class="container">
            <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <h2 class="title"> المراحل </h2>
                <span class="shape-line"><i class="icon-19"></i></span>
                <p>Consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore et dolore</p>
            </div>

            <div class="row g-5">

                <?php $__currentLoopData = $pathsByCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paths): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <?php $__currentLoopData = $paths; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-md-6" data-sal-delay="<?php echo e((($loop->index+1) % 3) * 50); ?>" data-sal="slide-up" data-sal-duration="800">
                        <a href="<?php echo e(route('packages-catalog', $path->id)); ?>" class="w-100">
                            <div class="categorie-grid categorie-style-2 <?php echo e($loop->index % 2 ? 'color-tertiary-style': 'color-extra02-style'); ?>" >
                                <div class="content">
                                    <h5 class="title">
                                        <?php echo e($path->title); ?>

                                        
                                    </h5>
                                </div>
                            </div>
                        </a>
                    </div>
                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



            </div>
        </div>
    </div>
    <!-- End Categories Area  -->
    <!--=====================================-->
    <!--=       About Area Start      		=-->
    <!--=====================================-->
    <div class="edu-about-area about-style-3">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                    <div class="about-content">
                        <div class="section-title section-left">
                            <span class="pre-title">من نحن</span>
                            <h2 style="color: #282b62;" class="title">منصة<span class="color-primary"> البلاطى </span>تقدم افضل الخدمات التعليمية </h2>
                            <span class="shape-line"><i class="icon-19"></i></span>
                        </div>
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#about-edu" type="button" role="tab" aria-selected="true">من نحن ؟</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#about-mission" type="button" role="tab" aria-selected="false">الرسالة</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#about-vision" type="button" role="tab" aria-selected="false">الرؤيه</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#about-rules" type="button" role="tab" aria-selected="false">القيم</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#target" type="button" role="tab" aria-selected="false">الأهداف</button>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="about-edu" role="tabpanel">
                                <p style="color:#282b62">منصة <span style="color:#e4b100">البلاطي</span> التعليمية، المنصة الأقوي في الوطن العربي والشرق الأوسط، وشعارنا معاً نصنع عصر جديد للتعليم.</p>
                            </div>
                            <div class="tab-pane fade" id="about-mission" role="tabpanel">
                                <p style="color:#282b62">تكمن رسالة منصة <span style="color:#e4b100">البلاطي</span> التعليمية في توفير أفضل الأدوات والوسائل التعليمية من ملفات وفيديوهات تعليمية وبث مباشر لكافة الطلبة, وتقديم كافة الخدمات التعليمية , ومساعدة الطلبة على التفوق في دراستهم وفي حياتهم , وذلك إيماناً منا بأهمية التدريب والتعليم للبشر كافة، ومساعدتهم بشتى الطرق للنجاح والتفوق، وأن يحصلوا على ما يتمنوا من الدراسة في كل دول العالم حتى يلتحقوا بوظائف أحلامهم.</p>
                                <ul class="features-list">
                                    <li style="color:#282b62">النجاح هو طريقنا والتفوق سبيلنا</li>
                                </ul>
                            </div>
                            <div style="color:#282b62" class="tab-pane fade" id="about-vision" role="tabpanel">
                                <p style="color:#282b62">تمتلك منصة <span style="color:#e4b100">البلاطي</span> التعليمية رؤية واضحة وشاملة , وتسعى بكل الطرق الممكنة لتحقيق هذه الرؤية , وتتمثل الرؤية بأن تقدم أفضل الخدمات التعليمية بجودة عالية وأسعار مناسبة لكافة العملاء حتى تحصل على رضاهم التام على كافة الخدمات التعليمية المقدمة من المنصة , وتعمل المنصة على أن تصبح مكان ذو ثقة يلبي كافة تطلعات ورغبات العملاء , وتسعى المنصة بكل الطرق الممكنة لإعداد الأجيال إعداداً ممتازاً حتى يصبحوا قادة في حياتهم وفي دراستهم.</p>
                                <ul class="features-list">
                                    <li style="color:#282b62">كن مطمئنا أولادك بأمان معنا</li>
                                </ul>
                            </div>
                            <div style="color:#282b62" class="tab-pane fade" id="about-rules" role="tabpanel">
                                <p style="color:#282b62">تتبع منصة <span style="color:#e4b100">البلاطي</span> التعليمية عدة قيم مثل الثقة والأمانة والصدق في التعامل, وذلك من أجل الحصول على ثقة كافة العملاء من الخدمات التعليمية التي تقدمها المنصة , وتوفر المنصة أفضل الخدمات التعليمية وتبحث المنصة عن كل شيء جديد وحديث يواكب سوق العمل في وقتنا الحالي يساعد الطلبة على النجاح في دراستهم وفي حياتهم وتضيفه للمنصة.</p>
                               
                            </div>
                            
                            <div class="tab-pane fade" id="target" role="tabpanel">
                            <p style="color:#282b62">تتبع منصة <span style="color:#e4b100">البلاطي</span> التعليمية مجموعة من الأهداف وتسعى بكل الطرق لتحقيقها, وهذه الأهداف متمثلة في عدة نقاط كالآتي:-</p>
                                <ul class="features-list">
                                    <li style="color:#282b62"> أن تحصل منصة البلاطي التعليمية على ثقة كافة العملاء ورضاهم التام عن الخدمات المقدمة منها.</li>
                                    <li style="color:#282b62">أن تحوذ كافة الخدمات التعليمية المقدمة من قبل المنصة على ثقة جميع العملاء.</li>
                                    <li style="color:#282b62">توفير أكثر من معلم للمادة الواحدة لمراحل التعليم الأساسي؛ حيث يختار الطالب المعلم المناسب له.</li>
                                    <li style="color:#282b62">توفير أهم الكورسات بأكثر من أسلوب لطلاب التعليم الجامعي والدراسات العليا وسوق العمل.</li>
                                    <li style="color:#282b62">توفير مذكرة شرح وافية لكل درس ومذكرة أسئلة غير مجابة ومجابة وإمتحان أيضاً غير مجاب ومجاب وڤيديو مسجل بالإضافة للبث المباشر لكل درس في مراحل التعليم المختلفة.</li>
                                    <li style="color:#282b62">توفير مراجعات نهائية شاملة قبل نهاية الفصل الدراسي الأول والثاني بالإضافة إلي أسئلة امتحانات الأعوام السابقة مع الحل النموذجي لها.</li>
                                    <li style="color:#282b62"> توفير توقعات ليلة الامتحان قبل موعد الامتحان.</li>
                                    <li style="color:#282b62">تأهيل وتدريب كافة الطلبة عن طريق تقديم أفضل الخدمات التعليمية لهم.</li>
                                    <li style="color:#282b62">أن تصبح منصة البلاطي التعليمية المكان الأول الذي يلجأ إليه كافة العملاء في الوطن العربي والشرق الأوسط.</li>
                                    <li style="color:#282b62"> الإسهام بصورة حقيقية وفعالة في رفع مستوى تحصيل الطلبة من خلال توفير أفضل الخدمات والمواد العلمية من ملفات وفيديوهات تعليمية وبث مباشر لكافة الطلبة.</li>
                                    <li style="color:#282b62"> السعي الدائم لإكتشاف أفضل الخدمات التعليمية المناسبة وتقديمها للعملاء.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-image-gallery">
                        <img class="main-img-1" data-sal-delay="100" data-sal="slide-up" data-sal-duration="800" src="<?php echo e(asset('assets-public/images/course/course-05.jpg')); ?>" alt="About Image">
                        <img class="main-img-2" data-sal-delay="100" data-sal="slide-left" data-sal-duration="800" src="<?php echo e(asset('assets-public/images/about/about-05.png')); ?>" alt="About Image">
                        <ul class="shape-group">
                            <li class="shape-1 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                                <img data-depth="2" src="<?php echo e(asset('assets-public/images/about/shape-13.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-2 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                                <img data-depth="-2" src="<?php echo e(asset('assets-public/images/about/shape-39.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-3 scene" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                                <img data-depth="2" src="<?php echo e(asset('assets-public/images/about/shape-07.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-4" data-sal-delay="500" data-sal="fade" data-sal-duration="200">
                                <span></span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <ul class="shape-group">
            <li class="shape-1">
                <img class="rotateit" src="<?php echo e(asset('assets-public/images/about/shape-13.png')); ?>" alt="Shape">
            </li>
            <li class="shape-2">
                <span></span>
            </li>
        </ul>
    </div>
    <!--=====================================-->
    <!--=       CounterUp Area Start      	=-->
    <!--=       Course Area Start      		=-->
    <!--=====================================-->
    <!-- Start Course Area  -->
    <div class="edu-course-area course-area-1 edu-section-gap bg-lighten01">
        <div class="container">
            <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <span class="pre-title">الباقات الاكثر شيوعا</span>
                <h2 class="title">إختر باقتك الأن للبدء</h2>
                <span class="shape-line"><i class="icon-19"></i></span>
            </div>
            <div class="row g-5">
                <?php $__currentLoopData = $recentPackages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Start Single Course  -->
                <div class="col-md-6 col-xl-3" data-sal-delay="<?php echo e(150 + ($loop->index*50)); ?>" data-sal="slide-up" data-sal-duration="800">
                    <div class="edu-course course-style-1 hover-button-bg-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="<?php echo e(route('public.package.view', $package->slug)); ?>">
                                    <img src="<?php echo e($package->img_url); ?>" alt="<?php echo e($package->package_name); ?>" style="height: 300px;">
                                </a>
                                <div class="time-top">
                                    <span class="duration bg-danger"><i class="icon-50"></i> <?php echo e($package->teacher_name); ?></span>
                                </div>
                            </div>
                            <div class="content">
                                <span class="course-level"><?php echo e($package->lang); ?></span>
                                <h6 class="title">
                                    <a href="<?php echo e(route('public.package.view', $package->slug)); ?>"><?php echo e($package->package_name); ?></a>
                                </h6>
                                
                                <div class="course-price"><?php echo e($package->pricing['localized_price']); ?> <?php echo e($package->pricing['currency_code']); ?></div>
                                <ul class="course-meta d-flex">
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-24"></i>
                                        <?php echo e($package->videos_count); ?>

                                        فيديو
                                    </li>
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-25"></i>
                                        <?php echo e($package->students_count); ?>

                                        طالب
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="course-hover-content-wrapper">
                            <button class="wishlist-btn"><i class="icon-22"></i></button>
                        </div>
                        <div class="course-hover-content">
                            <div class="content">

                                <span class="course-level"><?php echo e($package->lang); ?></span>
                                <h6 class="title">
                                    <a href="<?php echo e(route('public.package.view', $package->slug)); ?>"><?php echo e($package->package_name); ?></a>
                                </h6>
                                <div class="course-price"><?php echo e($package->pricing['localized_price']); ?> <?php echo e($package->pricing['currency_code']); ?></div>
                                <p><?php echo e($package->description_notags); ?></p>
                                <ul class="course-meta d-flex">
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-24"></i>
                                        <?php echo e($package->videos_count); ?>

                                        فيديو
                                    </li>
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-25"></i>
                                        <?php echo e($package->students_count); ?>

                                        طالب
                                    </li>
                                </ul>
                                <a href="<?php echo e(route('public.package.view', $package->slug)); ?>" class="edu-btn btn-secondary btn-small">اشترك الان <i class="icon-4"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Single Course  -->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            
            
        </div>
    </div>
    <!-- End Course Area -->
    <!--=====================================-->
    <!--=       CounterUp Area Start      	=-->
    <!--=====================================-->
    <div class="counterup-area-2">
        <div class="container">
            <div class="row g-5 justify-content-center">
                <div class="col-lg-8">
                    <div class="counterup-box-wrap">
                        <div class="counterup-box">
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number primary-color">
                                    <span class="odometer" data-odometer-final="45.2">.</span><span>K</span>
                                </h2>
                                <h6 class="title">طالب</h6>
                            </div>
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number secondary-color">
                                    <span class="odometer" data-odometer-final="32.4">.</span><span>K</span>
                                </h2>
                                <h6 class="title">محاضرات</h6>
                            </div>
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number extra05-color">
                                    <span class="odometer" data-odometer-final="354">.</span><span>+</span>
                                </h2>
                                <h6 class="title">افضل الالمعلمين</h6>
                            </div>
                            <div class="edu-counterup counterup-style-2">
                                <h2 class="counter-item count-number extra02-color">
                                    <span class="odometer" data-odometer-final="99.9">.</span><span>%</span>
                                </h2>
                                <h6 class="title">افضل التقيمات</h6>
                            </div>
                        </div>
                        <ul class="shape-group">
                            <li class="shape-1 scene">
                                <img data-depth="-2" src="<?php echo e(asset('assets-public/images/about/shape-13.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-2">
                                <img class="rotateit" src="<?php echo e(asset('assets-public/images/counterup/shape-02.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-3 scene">
                                <img data-depth="1.6" src="<?php echo e(asset('assets-public/images/counterup/shape-04.png')); ?>" alt="Shape">
                            </li>
                            <li class="shape-4 scene">
                                <img data-depth="-1.6" src="<?php echo e(asset('assets-public/images/counterup/shape-05.png')); ?>" alt="Shape">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--=====================================-->
    <!--=       Testimonial Area Start      =-->
    <!--=====================================-->
    <!-- Start Testimonial Area  -->
    <div class="testimonial-area-1 section-gap-equal">
        <div class="container">
            <div class="row g-lg-5">
                <div class="col-lg-5">
                    <div class="testimonial-heading-area">
                        <div class="section-title section-left" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">
                            <span class="pre-title">اراء المستخدمين</span>
                            <h2 class="title">ماذا يقول الطلاب عن منصة البلاطي</h2>
                            <span class="shape-line"><i class="icon-19"></i></span>
                            <p>Lorem ipsum dolor sit amet consectur adipiscing elit sed eiusmod tempor incididunt labore dolore magna aliquaenim ad minim.</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="home-one-testimonial-activator swiper ">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-grid">
                                    <div class="thumbnail">
                                        <img src="<?php echo e(asset('assets-public/images/testimonial/testimonial-01.png')); ?>" alt="Testimonial">
                                        <span class="qoute-icon"><i class="icon-26"></i></span>

                                    </div>
                                    <div class="content">
                                        <p>Lorem ipsum dolor amet consec tur elit adicing sed do usmod zx tempor enim minim veniam quis nostrud exer citation.</p>
                                        <div class="rating-icon">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <h5 class="title">Ray Sanchez</h5>
                                        <span class="subtitle">Student</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-grid">
                                    <div class="thumbnail">
                                        <img src="<?php echo e(asset('assets-public/images/testimonial/testimonial-02.png')); ?>" alt="Testimonial">
                                        <span class="qoute-icon"><i class="icon-26"></i></span>

                                    </div>
                                    <div class="content">
                                        <p>Lorem ipsum dolor amet consec tur elit adicing sed do usmod zx tempor enim minim veniam quis nostrud exer citation.</p>
                                        <div class="rating-icon">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <h5 class="title">Thomas Lopez</h5>
                                        <span class="subtitle">Designer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-grid">
                                    <div class="thumbnail">
                                        <img src="<?php echo e(asset('assets-public/images/testimonial/testimonial-03.png')); ?>" alt="Testimonial">
                                        <span class="qoute-icon"><i class="icon-26"></i></span>

                                    </div>
                                    <div class="content">
                                        <p>Lorem ipsum dolor amet consec tur elit adicing sed do usmod zx tempor enim minim veniam quis nostrud exer citation.</p>
                                        <div class="rating-icon">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <h5 class="title">Amber Page</h5>
                                        <span class="subtitle">Developer</span>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-grid">
                                    <div class="thumbnail">
                                        <img src="<?php echo e(asset('assets-public/images/testimonial/testimonial-04.png')); ?>" alt="Testimonial">
                                        <span class="qoute-icon"><i class="icon-26"></i></span>

                                    </div>
                                    <div class="content">
                                        <p>Lorem ipsum dolor amet consec tur elit adicing sed do usmod zx tempor enim minim veniam quis nostrud exer citation.</p>
                                        <div class="rating-icon">
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                            <i class="icon-23"></i>
                                        </div>
                                        <h5 class="title">Robert Tapp</h5>
                                        <span class="subtitle">Content Creator</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Testimonial Area  -->
    <!--=====================================-->
    <!--=      Call To Action Area Start   	=-->
  <div class="edu-course-area course-area-1 edu-section-gap bg-lighten01">
        <div class="container">
            <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                <span class="pre-title"> المراجعات  </span>
                <h2 class="title">..........   </h2>
                <span class="shape-line"><i class="icon-19"></i></span>
            </div>
            <div class="row g-5">
             <?php $__currentLoopData = \App\Event::where('active',1 )->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 Start Single Course  
                <div class="col-md-6 col-xl-3" data-sal-delay="<?php echo e(150 + ($loop->index*50)); ?>" data-sal="slide-up" data-sal-duration="800">
                    <div class="edu-course course-style-1 hover-button-bg-white">
                        <div class="inner">
                            <div class="thumbnail">
                                <a href="">
                                    <img src="<?php echo e($event->img); ?>" alt="<?php echo e($event->name); ?>" style="height: 300px;">
                                </a>
                                <div class="time-top">
                                    <span class="duration bg-danger"><i class="icon-50"></i> <?php echo e($event->teacher->name ?? ''); ?></span>
                                </div>
                            </div>
                            <div class="content">
                                <span class="course-level"><?php echo e($event->lang); ?></span>
                                <h6 class="title">
                                    <a href="<?php echo e(route('public.event.view', $event->id)); ?>"><?php echo e($event->name); ?></a>
                                </h6>
                                
                                <div class="course-price"><?php echo e($event->price); ?> </div>
                                <ul class="course-meta d-flex">
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-24"></i>
                                        
                                        فيديو
                                    </li>
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-25"></i>
                                        
                                        طالب
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="course-hover-content-wrapper">
                            <button class="wishlist-btn"><i class="icon-22"></i></button>
                        </div>
                        <div class="course-hover-content">
                            <div class="content">

                                <span class="course-level"><?php echo e($event->lang); ?></span>
                                <h6 class="title">
                                    
                                </h6>
                                
                                
                                <ul class="course-meta d-flex">
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-24"></i>
                                        
                                        فيديو
                                    </li>
                                    <li class="d-flex flex-row-reverse flex-row">
                                        <i class="icon-25"></i>
                                        
                                        طالب
                                    </li>
                                </ul>
                                <a href="<?php echo e(route('public.event.view', $event->id)); ?>" class="edu-btn btn-secondary btn-small">اشترك الان <i class="icon-4"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                End Single Course  
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            
            
        </div>
    </div>
    <!--=====================================-->
    <!-- Start CTA Area  -->
    <div class="home-one-cta-two cta-area-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8">
                    <div class="home-one-cta edu-cta-box bg-image">
                        <div class="inner">
                            <div class="content text-md-end">
                                <span class="subtitle">تواصل عبر البريد:</span>
                                <h3 class="title"><a href="mailto:info@albalaty.com">info@albalaty.com</a></h3>
                            </div>
                            <div class="sparator">
                                <span>or</span>
                            </div>
                            <div class="content">
                                <span class="subtitle">تواصل عبر الجوال:</span>
                                <h3 class="title" style="direction: ltr;"><a href="tel:+201121331340">+201121331340</a></h3>
                            </div>
                        </div>
                        <ul class="shape-group">
                            <li class="shape-01 scene">
                                <img data-depth="2" src="<?php echo e(asset('assets-public/images/cta/shape-06.png')); ?>" alt="shape">
                            </li>
                            <li class="shape-02 scene">
                                <img data-depth="-2" src="<?php echo e(asset('assets-public/images/cta/shape-12.png')); ?>" alt="shape">
                            </li>
                            <li class="shape-03 scene">
                                <img data-depth="-3" src="<?php echo e(asset('assets-public/images/cta/shape-04.png')); ?>" alt="shape">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End CTA Area  -->
    <!--=====================================-->
    <!--=      		Team Area Start   		=-->
    <!--=====================================-->
    <!-- Start Team Area  -->
    <div class="edu-team-area team-area-1 gap-tb-text">
        <!--<div class="container">-->
        <!--    <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">-->
        <!--        <h2 class="title">المؤسسين</h2>-->
        <!--        <span class="shape-line"><i class="icon-19"></i></span>-->
        <!--    </div>-->
        <!--    <div class="row g-5">-->
                
                 
               
        <!--    <?php $__currentLoopData = \App\Models\Auth\Admin::orderBy('created_at', 'desc')->get()->take(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>-->
        <!--         Start Instructor Grid  -->
        <!--            <div class="col-lg-3 col-sm-6 col-12" data-sal-delay="50" data-sal="slide-up" data-sal-duration="800">-->
        <!--                <div class="edu-team-grid team-style-1">-->
        <!--                    <div class="inner">-->
        <!--                        <div class="thumbnail-wrap">-->
        <!--                            <div class="thumbnail">-->
        <!--                                <a href="team-details.html">-->
        <!--                                    <img src="<?php echo e(asset('assets-public/images/team/team-01.jpg')); ?>" alt="team images">-->
        <!--                                </a>-->
        <!--                            </div>-->
        <!--                            <ul class="team-share-info">-->
        <!--                                <li><a href="#"><i class="icon-share-alt"></i></a></li>-->
        <!--                                <li><a href="#"><i class="icon-facebook"></i></a></li>-->
        <!--                                <li><a href="#"><i class="icon-twitter"></i></a></li>-->
        <!--                                <li><a href="#"><i class="icon-linkedin2"></i></a></li>-->
        <!--                            </ul>-->
        <!--                        </div>-->
        <!--                        <div class="content">-->
        <!--                            <h5 class="title"><a href="#"><?php echo e($admin->name); ?></a></h5>-->
        <!--                            <span class="designation"><?php echo e($admin->country); ?></span>-->
        <!--                        </div>-->
        <!--                    </div>-->
        <!--                </div>-->
        <!--            </div>-->
        <!--             End Instructor Grid  -->
        <!--        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>-->

        <!--    </div>-->
        <!--</div>-->
    </div>
    <!-- End Team Area  -->
    <!--=====================================-->
    <!--=      CTA Banner Area Start   		=-->
    <!--=====================================-->
    <!-- Start Ad Banner Area  -->
    <div class="edu-cta-banner-area home-one-cta-wrapper bg-image">
        <div class="container">
            <div class="edu-cta-banner">
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <div class="section-title section-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                            <h2 class="title" style="color: #282b62;">احصل علي افضل <span style="color: #e4b100;" class="color-secondary">الدورات التدريبية</span> عبر منصة البلاطي</h2>
                            <a href="<?php echo e(route('register')); ?>" class="edu-btn">ابدا الان <i class="icon-4"></i></a>
                        </div>
                    </div>
                </div>
                <ul class="shape-group">
                    <li class="shape-01 scene">
                        <img data-depth="2.5" src="<?php echo e(asset('assets-public/images/cta/shape-10.png')); ?>" alt="shape">
                    </li>
                    <li class="shape-02 scene">
                        <img data-depth="-2.5" src="<?php echo e(asset('assets-public/images/cta/shape-09.png')); ?>" alt="shape">
                    </li>
                    <li class="shape-03 scene">
                        <img data-depth="-2" src="<?php echo e(asset('assets-public/images/cta/shape-08.png')); ?>" alt="shape">
                    </li>
                    <li class="shape-04 scene">
                        <img data-depth="2" src="<?php echo e(asset('assets-public/images/about/shape-13.png')); ?>" alt="shape">
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- End Ad Banner Area  -->
    <!--=====================================-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>