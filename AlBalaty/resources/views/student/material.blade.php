@extends('layouts.student-layout')

@section('content')


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
      <div class="container-full">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="d-flex align-items-center">
            <div class="me-auto">
              <h2 class="page-title p-2"><a href="#"><i class="mdi mdi-home-outline"></i></a>الموارد الدراسية</h2>
              <div class="d-inline-block align-items-center">
                <nav>
                  <!-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"></li>
                  </ol> -->
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- Main content -->
        <section class="content">


    @foreach($materialsByPart as $materials)
        <!-- START Card BOOKs -->
        <div class="card  container">
            <div class="card-header align-item-center">
                <h2 class="card-title ">{{$materials->first()->part_title}}</h2>
            </div>
            @foreach($materials->groupBy('chapter_id') as $material)
                <h4>{{$material->first()->chapter_title}}</h4>
                <div class="row fx-element-overlay ms-2 mt-2 ">
                    @foreach($material as $m)
                    <div class="col-12 col-lg-6 col-xl-3 mt-10">
                        <div class="box pull-up">
                            <div class="fx-card-item">
                                <div class="fx-card-avatar fx-overlay-1">
                                    <img src="{{$m->cover_url}}" alt="user" class="bbsr-0 bber-0 h-250">
                                    <div class="fx-overlay scrl-up">
                                        <ul class="fx-info">
                                        <li><a class="btn btn-outline" target="_blank" href="{{route('student.material.preview', $m->id)}}"><i class="fa fa-download"></i></a>
                                        </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="fx-card-content text-start ">
                                    <div class="product-text">
                                        <h2 class="pro-price text-blue"></h2>
                                        <h4 class="box-title mb-0">{{$m->title}}</h4>
                                        <small class="text-muted db"></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box -->
                    </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endforeach




          <!-- END Card BOOKS -->
{{--          <!-- START Card Articals -->--}}
{{--          <div class="card container">--}}
{{--            <div class="card-header">--}}
{{--              <h2 class="card-title">المقالات</h2>--}}
{{--            </div>--}}
{{--            <div class="row ms-2 mt-2">--}}
{{--              <div class="col-xl-4 col-12 mt-10">--}}
{{--                <div class="box box-slided-up ">--}}
{{--                  <div class="box-header with-border  pull-up">--}}
{{--                    <h4 class="box-title">المشروعات <strong> التنموية والجامعية</strong></h4>--}}
{{--                    <ul class="box-controls pull-right">--}}
{{--                      <a href="https://www.w3schools.com" data-bs-toggle="tooltip" title=""--}}
{{--                        data-bs-original-title="تحميل">--}}
{{--                        <i class="fa fa-download"> </i>--}}
{{--                      </a>--}}

{{--                      <li><a class="box-btn-fullscreen" data-bs-toggle="tooltip" title=""--}}
{{--                          data-bs-original-title="شاشة كاملة" href="#"></a></li>--}}
{{--                      <li><a class="box-btn-slide" data-bs-toggle="tooltip" title=""--}}
{{--                          data-bs-original-title="عرض المحتوي" href="#"></a></li>--}}
{{--                      <li><a></a></li>--}}
{{--                    </ul>--}}
{{--                  </div>--}}

{{--                  <div class="box-body h-250 " style="overflow: hidden;">--}}
{{--                    <div class="card-text  ">--}}
{{--                      <p>الزيارة أتت لتبعث رسائل واضحة للمواطنين في المحافظة أنها محلُ عناية المسؤولين، وأن العمل--}}
{{--                        الجماعي والتعاون بين المؤسسات الحكومية والأهلية والشركات والتجار والكفاءات العلمية والمهنية، هو--}}
{{--                        ما يمكنه أن يطور الأداء، ويجترح أفكاراً خلاقة جديدة من خارج الصندوق، ويوفر فرص عمل للفتيات--}}
{{--                        والشباب.--}}

{{--                        العديد من المقترحات وصلتني من أصدقاء كرام، حول مقالي السابق، وأكثر من واحد منها استفسر مستفهماً--}}
{{--                        عن عدم إشارتي لحاجة محافظة القطيف لوجود جامعة، تحتضن أبناء المنطقة، وتكون رافداً تعليمياً، وهي--}}
{{--                        الفكرة التي طرحت منذ سنوات طويلة خلت، وما تزال تراود الكثيرين.--}}

{{--                        التعليم العالي حق لجميع المواطنين، ومن المهم توفر مقاعد أكاديمية كافية للخريجين المؤهلين ممن--}}
{{--                        تنطبق عليهم الشروط. من هنا، فإن مقترح وجود جامعة في القطيف، يعتبر فكرة راجحة، شريطة أن يوفر هذا--}}
{{--                        الصرح الأكاديمي مستوى رفيعاً من التعليم والتدريب، وأن يضم خبرات مختصة، وتخصصات مستقبلية تخدم--}}
{{--                        توجهات "رؤية المملكة 2030"، وفي ذات الوقت، من المهم أن تكون أبواب الجامعة مفتوحة أمام الطلاب--}}
{{--                        المؤهلين من مختلف مدن وقرى المملكة، ولا تقتصر على طلاب المنطقة الشرقية فقط، وإن أعطتهم أولوية--}}
{{--                        محددة؛ لأن الاختلاط بين الشباب القادمين من مناطق متنوعة، يكسبهم معرفة ببعضهم البعض، ويجعلهم--}}
{{--                        منصهرين وطنياً، ويوفر لهم تجارب جديدة، ويساهم في التنوع الثقافي بين الجيل الجديد، ويقارب بين--}}
{{--                        الأفكار والأحلام. فضلاً عن أن قدوم الطلاب من خارج المنطقة الشرقية، سيدفع نحو وجود دورة اقتصادية--}}
{{--                        ترفد سوق التجزئة والعقار المحلي.--}}
{{--                      </p>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="col-xl-4 col-12 mt-10">--}}
{{--                <div class="box box-slided-up ">--}}
{{--                  <div class="box-header with-border  pull-up">--}}
{{--                    <h4 class="box-title">المشروعات  <strong> التنموية والجامعية</strong></h4>--}}
{{--                    <ul class="box-controls pull-right">--}}
{{--                      <a href="https://www.w3schools.com" data-bs-toggle="tooltip" title=""--}}
{{--                        data-bs-original-title="تحميل">--}}
{{--                        <i class="fa fa-download"> </i>--}}
{{--                      </a>--}}

{{--                      <li><a class="box-btn-fullscreen" data-bs-toggle="tooltip" title=""--}}
{{--                          data-bs-original-title="شاشة كاملة" href="#"></a></li>--}}
{{--                      <li><a class="box-btn-slide" data-bs-toggle="tooltip" title=""--}}
{{--                          data-bs-original-title="عرض المحتوي" href="#"></a></li>--}}
{{--                      <li><a></a></li>--}}
{{--                    </ul>--}}
{{--                  </div>--}}

{{--                  <div class="box-body h-250 " style="overflow: hidden;">--}}
{{--                    <div class="card-text  ">--}}
{{--                      <p>الزيارة أتت لتبعث رسائل واضحة للمواطنين في المحافظة أنها محلُ عناية المسؤولين، وأن العمل--}}
{{--                        الجماعي والتعاون بين المؤسسات الحكومية والأهلية والشركات والتجار والكفاءات العلمية والمهنية، هو--}}
{{--                        ما يمكنه أن يطور الأداء، ويجترح أفكاراً خلاقة جديدة من خارج الصندوق، ويوفر فرص عمل للفتيات--}}
{{--                        والشباب.--}}

{{--                        العديد من المقترحات وصلتني من أصدقاء كرام، حول مقالي السابق، وأكثر من واحد منها استفسر مستفهماً--}}
{{--                        عن عدم إشارتي لحاجة محافظة القطيف لوجود جامعة، تحتضن أبناء المنطقة، وتكون رافداً تعليمياً، وهي--}}
{{--                        الفكرة التي طرحت منذ سنوات طويلة خلت، وما تزال تراود الكثيرين.--}}

{{--                        التعليم العالي حق لجميع المواطنين، ومن المهم توفر مقاعد أكاديمية كافية للخريجين المؤهلين ممن--}}
{{--                        تنطبق عليهم الشروط. من هنا، فإن مقترح وجود جامعة في القطيف، يعتبر فكرة راجحة، شريطة أن يوفر هذا--}}
{{--                        الصرح الأكاديمي مستوى رفيعاً من التعليم والتدريب، وأن يضم خبرات مختصة، وتخصصات مستقبلية تخدم--}}
{{--                        توجهات "رؤية المملكة 2030"، وفي ذات الوقت، من المهم أن تكون أبواب الجامعة مفتوحة أمام الطلاب--}}
{{--                        المؤهلين من مختلف مدن وقرى المملكة، ولا تقتصر على طلاب المنطقة الشرقية فقط، وإن أعطتهم أولوية--}}
{{--                        محددة؛ لأن الاختلاط بين الشباب القادمين من مناطق متنوعة، يكسبهم معرفة ببعضهم البعض، ويجعلهم--}}
{{--                        منصهرين وطنياً، ويوفر لهم تجارب جديدة، ويساهم في التنوع الثقافي بين الجيل الجديد، ويقارب بين--}}
{{--                        الأفكار والأحلام. فضلاً عن أن قدوم الطلاب من خارج المنطقة الشرقية--}}
{{--                        ، سيدفع نحو وجود دورة اقتصادية ترفد سوق التجزئة والعقار المحلي.--}}
{{--                      </p>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="col-xl-4 col-12 mt-10">--}}
{{--                <div class="box box-slided-up ">--}}
{{--                  <div class="box-header with-border  pull-up">--}}
{{--                    <h4 class="box-title">المشروعات  <strong> التنموية والجامعية</strong></h4>--}}
{{--                    <ul class="box-controls pull-right">--}}
{{--                      <a href="https://www.w3schools.com" data-bs-toggle="tooltip" title=""--}}
{{--                        data-bs-original-title="تحميل">--}}
{{--                        <i class="fa fa-download"> </i>--}}
{{--                      </a>--}}

{{--                      <li><a class="box-btn-fullscreen" data-bs-toggle="tooltip" title=""--}}
{{--                          data-bs-original-title="شاشة كاملة" href="#"></a></li>--}}
{{--                      <li><a class="box-btn-slide" data-bs-toggle="tooltip" title=""--}}
{{--                          data-bs-original-title="عرض المحتوي" href="#"></a></li>--}}
{{--                      <li><a></a></li>--}}
{{--                    </ul>--}}
{{--                  </div>--}}

{{--                  <div class="box-body h-250 " style="overflow: hidden;">--}}
{{--                    <div class="card-text  ">--}}
{{--                      <p>الزيارة أتت لتبعث رسائل واضحة للمواطنين في المحافظة أنها محلُ عناية المسؤولين، وأن العمل--}}
{{--                        الجماعي والتعاون بين المؤسسات الحكومية والأهلية والشركات والتجار والكفاءات العلمية والمهنية، هو--}}
{{--                        ما يمكنه أن يطور الأداء، ويجترح أفكاراً خلاقة جديدة من خارج الصندوق، ويوفر فرص عمل للفتيات--}}
{{--                        والشباب.--}}

{{--                        العديد من المقترحات وصلتني من أصدقاء كرام، حول مقالي السابق، وأكثر من واحد منها استفسر مستفهماً--}}
{{--                        عن عدم إشارتي لحاجة محافظة القطيف لوجود جامعة، تحتضن أبناء المنطقة، وتكون رافداً تعليمياً، وهي--}}
{{--                        الفكرة التي طرحت منذ سنوات طويلة خلت، وما تزال تراود الكثيرين.--}}

{{--                        التعليم العالي حق لجميع المواطنين، ومن المهم توفر مقاعد أكاديمية كافية للخريجين المؤهلين ممن--}}
{{--                        تنطبق عليهم الشروط. من هنا، فإن مقترح وجود جامعة في القطيف، يعتبر فكرة راجحة، شريطة أن يوفر هذا--}}
{{--                        الصرح الأكاديمي مستوى رفيعاً من التعليم والتدريب، وأن يضم خبرات مختصة، وتخصصات مستقبلية تخدم--}}
{{--                        توجهات "رؤية المملكة 2030"، وفي ذات الوقت، من المهم أن تكون أبواب الجامعة مفتوحة أمام الطلاب--}}
{{--                        المؤهلين من مختلف مدن وقرى المملكة، ولا تقتصر على طلاب المنطقة الشرقية فقط، وإن أعطتهم أولوية--}}
{{--                        محددة؛ لأن الاختلاط بين الشباب القادمين من مناطق متنوعة، يكسبهم معرفة ببعضهم البعض، ويجعلهم--}}
{{--                        منصهرين وطنياً، ويوفر لهم تجارب جديدة، ويساهم في التنوع الثقافي بين الجيل الجديد، ويقارب بين--}}
{{--                        الأفكار والأحلام. فضلاً عن أن قدوم الطلاب من خارج المنطقة الشرقية--}}
{{--                        ، سيدفع نحو وجود دورة اقتصادية ترفد سوق التجزئة والعقار المحلي.--}}
{{--                      </p>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <!-- END Card Articals -->--}}
{{--          <!-- START Card VIDEOS -->--}}
{{--          <div class="card container ">--}}
{{--            <div class="card-header">--}}
{{--              <h2 class="card-title">الفيديوهات</h2>--}}
{{--            </div>--}}
{{--            <div class="row ms-2 mt-2 ">--}}
{{--              <div class="col-md-12 col-lg-3 mt-10">--}}
{{--                <div class="card pull-up">--}}
{{--                  <iframe class="card-img-top h-250" src="https://www.youtube.com/embed/kN9SZtwP1ys"--}}
{{--                    allowfullscreen=""></iframe>--}}
{{--                  <div class="card-body ">--}}
{{--                    <h4 class="card-title">المشروعات</h4>--}}
{{--                    <p class="card-text">محافظات السعودية المختلفة مراكز جذبٍ بما لديها من إمكانات متنوعة، سياحية كانت أو اقتصادية أو ثقافية أو تراثية أو صناعية</p>--}}
{{--                  </div>--}}
{{--                  <!-- <div class="card-footer justify-content-between d-flex">--}}
{{--                       <span class="text-muted">Last updated 3 mins ago</span>--}}
{{--                       <span>--}}
{{--                           <i class="fa fa-star text-warning"></i>--}}
{{--                           <i class="fa fa-star text-warning"></i>--}}
{{--                           <i class="fa fa-star text-warning"></i>--}}
{{--                           <i class="fa fa-star text-warning"></i>--}}
{{--                           <i class="fa fa-star-half text-warning"></i>--}}
{{--                           <span class="text-muted ms-2">(12)</span>--}}
{{--                       </span>--}}
{{--                     </div> -->--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="col-md-12 col-lg-3 mt-10">--}}
{{--                <div class="card pull-up">--}}
{{--                  <iframe class="card-img-top h-250" src="https://www.youtube.com/embed/kN9SZtwP1ys"--}}
{{--                    allowfullscreen=""></iframe>--}}
{{--                  <div class="card-body ">--}}
{{--                    <h4 class="card-title">المشروعات</h4>--}}
{{--                    <p class="card-text">محافظات السعودية المختلفة مراكز جذبٍ بما لديها من إمكانات متنوعة، سياحية كانت أو اقتصادية أو ثقافية أو تراثية أو صناعية.</p>--}}
{{--                  </div>--}}
{{--                  <!-- <div class="card-footer justify-content-between d-flex">--}}
{{--                     <span class="text-muted">Last updated 3 mins ago</span>--}}
{{--                     <span>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star-half text-warning"></i>--}}
{{--                         <span class="text-muted ms-2">(12)</span>--}}
{{--                     </span>--}}
{{--                   </div> -->--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="col-md-12 col-lg-3 mt-10">--}}
{{--                <div class="card pull-up">--}}
{{--                  <iframe class="card-img-top h-250" src="https://www.youtube.com/embed/kN9SZtwP1ys"--}}
{{--                    allowfullscreen=""></iframe>--}}
{{--                  <div class="card-body ">--}}
{{--                    <h4 class="card-title">المشروعات</h4>--}}
{{--                    <p class="card-text">محافظات السعودية المختلفة مراكز جذبٍ بما لديها من إمكانات متنوعة، سياحية كانت أو اقتصادية أو ثقافية أو تراثية أو صناعية.</p>--}}
{{--                  </div>--}}
{{--                  <!-- <div class="card-footer justify-content-between d-flex">--}}
{{--                     <span class="text-muted">Last updated 3 mins ago</span>--}}
{{--                     <span>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star-half text-warning"></i>--}}
{{--                         <span class="text-muted ms-2">(12)</span>--}}
{{--                     </span>--}}
{{--                   </div> -->--}}
{{--                </div>--}}
{{--              </div>--}}
{{--              <div class="col-md-12 col-lg-3 mt-10">--}}
{{--                <div class="card pull-up">--}}
{{--                  <iframe class="card-img-top h-250 " src="https://www.youtube.com/embed/kN9SZtwP1ys"--}}
{{--                    allowfullscreen=""></iframe>--}}
{{--                  <div class="card-body ">--}}
{{--                    <h4 class="card-title">المشروعات</h4>--}}
{{--                    <p class="card-text">محافظات السعودية المختلفة مراكز جذبٍ بما لديها من إمكانات متنوعة، سياحية كانت أو اقتصادية أو ثقافية أو تراثية أو صناعية.</p>--}}
{{--                  </div>--}}
{{--                  <!-- <div class="card-footer justify-content-between d-flex">--}}
{{--                     <span class="text-muted">Last updated 3 mins ago</span>--}}
{{--                     <span>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star text-warning"></i>--}}
{{--                         <i class="fa fa-star-half text-warning"></i>--}}
{{--                         <span class="text-muted ms-2">(12)</span>--}}
{{--                     </span>--}}
{{--                   </div> -->--}}
{{--                </div>--}}
{{--              </div>--}}
{{--            </div>--}}
{{--          </div>--}}
{{--          <!-- END Card VIDEOS -->--}}
          <!-- /.row -->
        </section>
        <!-- /.content -->
      </div>
    </div>
    <!-- /.content-wrapper -->
@endsection

@section('script')
    <script src="{{ asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/vendor_components/Magnific-Popup-master/dist/jquery.magnific-popup-init.js') }}"></script>
 @endsection
