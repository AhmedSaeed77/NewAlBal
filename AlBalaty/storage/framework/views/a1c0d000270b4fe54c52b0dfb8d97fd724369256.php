

<?php $__env->startSection('content'); ?>
    <section class="inner-banner">
        <div class="container">
            <ul class="list-unstyled thm-breadcrumb">
                <li><a href="#">Home</a></li>
                <li class="active"><a href="#">About</a></li>
            </ul><!-- /.list-unstyled -->
            <h2 class="inner-banner__title">About</h2><!-- /.inner-banner__title -->
        </div><!-- /.container -->
    </section><!-- /.inner-banner -->
    <section class="about-one about-one__about-page">
        <img src="<?php echo e(asset('public_assets/images/circle-stripe.png')); ?>" class="about-one__circle" alt="">
        <div class="container text-center">
            <div class="block-title text-center">
                <h2 class="block-title__title">Let’s do study with <br>
                    expert teachers</h2><!-- /.block-title__title -->
            </div><!-- /.block-title -->
            <div class="about-one__img">
                <div class="row">
                    <div class="col-lg-6">
                        <img src="<?php echo e(asset('public_assets/images/about-2-1.jpg')); ?>" alt="">
                    </div><!-- /.col-lg-6 -->
                    <div class="col-lg-6">
                        <img src="<?php echo e(asset('public_assets/images/about-2-2.jpg')); ?>" alt="">
                    </div><!-- /.col-lg-6 -->
                </div><!-- /.row -->
                <div class="about-one__review">
                    <p class="about-one__review-count counter"><?php echo e(Cache::remember('userCount', 1440, function(){ return \App\Models\Auth\User::all()->count();})); ?></p><!-- /.about-one__review-count -->
                    <div class="about-one__review-stars">
                        <i class="fas fa-star"></i><!-- /.fa fa-star -->
                        <i class="fas fa-star"></i><!-- /.fa fa-star -->
                        <i class="fas fa-star"></i><!-- /.fa fa-star -->
                        <i class="fas fa-star"></i><!-- /.fa fa-star -->
                        <i class="fas fa-star"></i><!-- /.fa fa-star -->
                    </div><!-- /.about-one__stars -->
                    <p class="about-one__review-text">students loved us</p><!-- /.about-one__review-text -->
                </div><!-- /.about-one__review -->
            </div><!-- /.about-one__img -->
            <p class="about-one__text">There are many variations of passages of lorem ipsum available, but the majority have
                <br>
                suffered alteration in some form, by injected humour words which don't look even slightly <br> believable.
                Lorem
                Ipsn gravida nibh vel velit auctor aliquetn auci elit cons.</p><!-- /.about-one__text -->
            <a href="<?php echo e(route('index')); ?>" class="thm-btn about-one__btn">Start Learning Now</a><!-- /.thm-btn -->
        </div><!-- /.container -->
    </section><!-- /.about-one about-one__about-page -->
    <section class="team-one  ">
        <div class="container">
            <div class="block-title text-center">
                <h2 class="block-title__title">Meet the best <br>
                    teachers</h2><!-- /.block-title__title -->
            </div><!-- /.block-title -->
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12"></div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12">
                    <div class="team-one__single">
                        <div class="team-one__image">
                            <img src="<?php echo e(asset('public_assets/images/team-1-1.jpg')); ?>" alt="">
                        </div><!-- /.team-one__image -->
                        <div class="team-one__content">
                            <h2 class="team-one__name"><a href="team-details.html">Adelaide Hunter</a></h2>
                            <!-- /.team-one__name -->
                            <p class="team-one__designation">Teacher</p><!-- /.team-one__designation -->
                            <p class="team-one__text">There are many varia of passages of lorem.</p>
                            <!-- /.team-one__text -->
                        </div><!-- /.team-one__content -->
                        <div class="team-one__social">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-square"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div><!-- /.team-one__social -->
                    </div><!-- /.team-one__single -->
                </div><!-- /.col-lg-3 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.team-one team-page -->
    <section class="video-one">
        <div class="container">
            <img src="<?php echo e(asset('public_assets/images/scratch-1-1.png')); ?>" class="video-one__scratch" alt="">
            <div class="row">
                <div class="col-lg-6 d-flex align-items-end">
                    <div class="video-one__content">
                        <h2 class="video-one__title">Ali Naser<br>
                            sit amet, consect <br>
                            etur elit</h2><!-- /.video-one__title -->
                        <a href="#" class="thm-btn video-one__btn">Learn More</a><!-- /.thm-btn -->
                    </div><!-- /.video-one__content -->
                </div><!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="video-one__img">
                        <img src="<?php echo e(asset('public_assets/images/video-1-1.jpg')); ?>" alt="">
                        <a href="#" class="video-one__popup"><i class="fas fa-play"></i><!-- /.fas fa-play --></a>
                    </div><!-- /.video-one__img -->
                </div><!-- /.col-lg-6 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </section><!-- /.video-one -->
    <section class="brand-one  ">
        <div class="container">
            <div class="brand-one__carousel owl-carousel owl-theme">
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
                <div class="item">
                    <img src="<?php echo e(asset('public_assets/images/brand-1-1.png')); ?>" alt="">
                </div><!-- /.item -->
            </div><!-- /.brand-one__carousel owl-carousel owl-theme -->
        </div><!-- /.container -->
    </section><!-- /.brand-one -->
    <section class="testimonials-one  ">
        <div class="container">
            <div class="block-title text-center">
                <h2 class="block-title__title">What our students <br>
                    have to say</h2><!-- /.block-title__title -->
            </div><!-- /.block-title -->
            <div class="testimonials-one__carousel owl-carousel owl-theme">
                <?php
                    $feedback = \App\Feedback::where('disable', 0)->orderBy('created_at', 'desc')->paginate(20);

                ?>
                <?php $__currentLoopData = $feedback; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feed): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $fuser = \App\Models\Auth\User::find($feed->user_id); ?>
                    <?php if($fuser): ?>
                    <div class="item">
                        <div class="testimonials-one__single">
                            <div class="testimonials-one__qoute">
                                <img src="<?php echo e(asset('public_assets/images/qoute-1-1.png')); ?>" alt="">
                            </div><!-- /.testimonials-one__qoute -->
                            <p class="testimonials-one__text"><?php echo e($feed->feedback); ?></p><!-- /.testimonials-one__text -->
                            <img src="<?php echo e(asset('public_assets/images/team-1-1.jpg')); ?>" alt="" class="testimonials-one__img">
                            <h3 class="testimonials-one__name"><?php echo e(\App\Models\Auth\User::find($feed->user_id)->name); ?></h3><!-- /.testimonials-one__name -->
                            <p class="testimonials-one__designation">Student</p><!-- /.testimonials-one__designation -->
                            <p class="testimonials-one__designation"><?php echo e($feed->created_at->diffForHumans()); ?></p><!-- /.testimonials-one__designation -->
                        </div><!-- /.testimonials-one__single -->
                    </div><!-- /.item -->
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div><!-- /.testimonials-one__carousel owl-carousel owl-theme -->
        </div><!-- /.container -->
    </section><!-- /.testimonials-one -->
    <section class="cta-one cta-one__home-one" style="background-image: url(<?php echo e(asset('public_assets/images/cta-bg-1-1.jpg')); ?>);">
        <div class="container">
            <h2 class="cta-one__title">Kipso one & only <br>
                mission is to extend <br>
                your knowledge base</h2><!-- /.cta-one__title -->
            <div class="cta-one__btn-block">
                <a href="#" class="thm-btn cta-one__btn">Learn More</a><!-- /.thm-btn -->
            </div><!-- /.cta-one__btn-block -->
        </div><!-- /.container -->
    </section><!-- /.cta-one -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.public', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>