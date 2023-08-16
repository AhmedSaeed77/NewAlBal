@extends('layouts.admin-layout')
@section('pageTitle') Edit Package @endsection
@section('subheaderTitle')
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon svg-icon svg-icon-lg svg-icon-primary">
                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-4-blocks.svg-->
                <i class="text-primary flaticon2-box"></i>
                <!--end::Svg Icon-->
            </span>
        <h3 class="card-label pr-2 m-0">Packages</h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="{{route('admin.dashboard')}}" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">Edit Package</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <!--begin::Button-->
    <a href="#" onclick="app.store()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Submit</a>
    <!--end::Button-->

    <!--begin::Button-->
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('packages.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M8.42034438,20 L21,20 C22.1045695,20 23,19.1045695 23,18 L23,6 C23,4.8954305 22.1045695,4 21,4 L8.42034438,4 C8.15668432,4 7.90369297,4.10412727 7.71642146,4.28972363 L0.653241109,11.2897236 C0.260966303,11.6784895 0.25812177,12.3116481 0.646887666,12.7039229 C0.648995955,12.7060502 0.651113791,12.7081681 0.653241109,12.7102764 L7.71642146,19.7102764 C7.90369297,19.8958727 8.15668432,20 8.42034438,20 Z" fill="#000000" opacity="0.3"/>
                <path d="M12.5857864,12 L11.1715729,10.5857864 C10.7810486,10.1952621 10.7810486,9.56209717 11.1715729,9.17157288 C11.5620972,8.78104858 12.1952621,8.78104858 12.5857864,9.17157288 L14,10.5857864 L15.4142136,9.17157288 C15.8047379,8.78104858 16.4379028,8.78104858 16.8284271,9.17157288 C17.2189514,9.56209717 17.2189514,10.1952621 16.8284271,10.5857864 L15.4142136,12 L16.8284271,13.4142136 C17.2189514,13.8047379 17.2189514,14.4379028 16.8284271,14.8284271 C16.4379028,15.2189514 15.8047379,15.2189514 15.4142136,14.8284271 L14,13.4142136 L12.5857864,14.8284271 C12.1952621,15.2189514 11.5620972,15.2189514 11.1715729,14.8284271 C10.7810486,14.4379028 10.7810486,13.8047379 11.1715729,13.4142136 L12.5857864,12 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Cancel</a>
    <!--end::Button-->
@endsection
@section('content')
    <div class="card card-custom" id="app1">

        <!-- begin::General-Info -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-pen text-primary icon-2x"></i>
                        </span>
                        <h3 class="card-label">General Info</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Package Name</label>
                            <input type="text" v-model="package_name" class="form-control form-control-solid" placeholder="Package Name ..">
                        </div>
                        <div class="col-md-6">
                            <label>Arabic</label>
                            <input type="text" v-model="package_name_ar" class="form-control form-control-solid" placeholder="Package Name In Arabic ..">
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Package Language</label>
                        <select type="text" v-model="language" class="form-control form-control-solid">
                            <option value="English">English</option>
                            <option value="Arabic">Arabic</option>
                            <option value="English & Arabic">English & Arabic</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Telegram Link</label>
                        <input type="text" v-model="telegram_link" class="form-control form-control-solid" placeholder="https://...">
                    </div>
                    <div class="form-group">
                        <label>WhatsApp Link</label>
                        <input type="text" v-model="whatsapp_link" class="form-control form-control-solid" placeholder="https://...">
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Expire In (N days)</label>
                            <input type="text" v-model="expire_in_days" class="form-control form-control-solid" placeholder="60">
                        </div>
                        <div class="col-md-6">
                            <label>Extension Price ($)</label>
                            <input type="text" v-model="extension_price" class="form-control form-control-solid" placeholder="20">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Extension Period (N days)</label>
                            <input type="text" v-model="extension_period" class="form-control form-control-solid" placeholder="30">
                        </div>
                        <div class="col-md-6">
                            <label>Max No. of Extensions</label>
                            <input type="text" v-model="max_number_of_extensions" class="form-control form-control-solid" placeholder="3">
                        </div>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Package Cover Image</label>
                            <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_1">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Drop file here or click to upload.</h3>
                                </div>
                            </div>
                            <button href="#" class="btn btn-transparent-danger font-weight-bold my-1" style="width: 100%;" v-on:click.prevent="coverImage?.removeAllFiles()">Reset</button>
                        </div>
                        <div class="col-md-6">
                            <label>Package Preview Video</label>
                            <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title">Drop file here or click to upload.</h3>
                                </div>
                            </div>
                            <button href="#" class="btn btn-transparent-danger font-weight-bold my-1" style="width: 100%;" v-on:click.prevent="previewVideo?.removeAllFiles()">Reset</button>
                        </div>

                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::General-Info -->

        <!-- begin::Certification -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="card-icon">
                            <i class="flaticon2-paper text-primary icon-2x"></i>
                        </span>
                        <h3 class="card-label">Certification</h3>
                    </div>
                    <div class="card-toolbar">
                        <span class="switch switch-lg">
                            <label>
                                <input type="checkbox" checked="checked" v-model="includeCertification">
                                <span></span>
                            </label>
                        </span>
                    </div>
                </div>
                <div class="card-body pt-2" v-if="includeCertification">
                    <div class="form-group">
                        <label>Certification Title</label>
                        <input type="text" v-model="certification_title" class="form-control form-control-solid" placeholder="certification title">
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::Certification -->

        <!-- begin::Pricing -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo7/dist/../src/media/svg/icons/Shopping/Dollar.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <rect fill="#000000" opacity="0.3" x="11.5" y="2" width="2" height="4" rx="1"/>
                                <rect fill="#000000" opacity="0.3" x="11.5" y="16" width="2" height="5" rx="1"/>
                                <path d="M15.493,8.044 C15.2143319,7.68933156 14.8501689,7.40750104 14.4005,7.1985 C13.9508311,6.98949895 13.5170021,6.885 13.099,6.885 C12.8836656,6.885 12.6651678,6.90399981 12.4435,6.942 C12.2218322,6.98000019 12.0223342,7.05283279 11.845,7.1605 C11.6676658,7.2681672 11.5188339,7.40749914 11.3985,7.5785 C11.2781661,7.74950085 11.218,7.96799867 11.218,8.234 C11.218,8.46200114 11.2654995,8.65199924 11.3605,8.804 C11.4555005,8.95600076 11.5948324,9.08899943 11.7785,9.203 C11.9621676,9.31700057 12.1806654,9.42149952 12.434,9.5165 C12.6873346,9.61150047 12.9723317,9.70966616 13.289,9.811 C13.7450023,9.96300076 14.2199975,10.1308324 14.714,10.3145 C15.2080025,10.4981676 15.6576646,10.7419985 16.063,11.046 C16.4683354,11.3500015 16.8039987,11.7268311 17.07,12.1765 C17.3360013,12.6261689 17.469,13.1866633 17.469,13.858 C17.469,14.6306705 17.3265014,15.2988305 17.0415,15.8625 C16.7564986,16.4261695 16.3733357,16.8916648 15.892,17.259 C15.4106643,17.6263352 14.8596698,17.8986658 14.239,18.076 C13.6183302,18.2533342 12.97867,18.342 12.32,18.342 C11.3573285,18.342 10.4263378,18.1741683 9.527,17.8385 C8.62766217,17.5028317 7.88033631,17.0246698 7.285,16.404 L9.413,14.238 C9.74233498,14.6433354 10.176164,14.9821653 10.7145,15.2545 C11.252836,15.5268347 11.7879973,15.663 12.32,15.663 C12.5606679,15.663 12.7949989,15.6376669 13.023,15.587 C13.2510011,15.5363331 13.4504991,15.4540006 13.6215,15.34 C13.7925009,15.2259994 13.9286662,15.0740009 14.03,14.884 C14.1313338,14.693999 14.182,14.4660013 14.182,14.2 C14.182,13.9466654 14.1186673,13.7313342 13.992,13.554 C13.8653327,13.3766658 13.6848345,13.2151674 13.4505,13.0695 C13.2161655,12.9238326 12.9248351,12.7908339 12.5765,12.6705 C12.2281649,12.5501661 11.8323355,12.420334 11.389,12.281 C10.9583312,12.141666 10.5371687,11.9770009 10.1255,11.787 C9.71383127,11.596999 9.34650161,11.3531682 9.0235,11.0555 C8.70049838,10.7578318 8.44083431,10.3968355 8.2445,9.9725 C8.04816568,9.54816454 7.95,9.03200304 7.95,8.424 C7.95,7.67666293 8.10199848,7.03700266 8.406,6.505 C8.71000152,5.97299734 9.10899753,5.53600171 9.603,5.194 C10.0970025,4.85199829 10.6543302,4.60183412 11.275,4.4435 C11.8956698,4.28516587 12.5226635,4.206 13.156,4.206 C13.9160038,4.206 14.6918294,4.34533194 15.4835,4.624 C16.2751706,4.90266806 16.9686637,5.31433061 17.564,5.859 L15.493,8.044 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <h3 class="card-label">Pricing</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group row">
                        <div class="col-md-5">
                            <label>Fallback Price ($)</label>
                            <input type="text" v-model="fallback_price" class="form-control form-control-solid" id="price_zone_0" data-id="0" v-on:change="estimatePrices">
                        </div>
                        <div class="col-md-5">
                            <label>Fallback Discount (%)</label>
                            <input type="text" v-model="fallback_discount" class="form-control form-control-solid" id="discount_zone_0" data-id="0" v-on:change="estimatePrices">
                        </div>
                        <div class="col-md-2">
                            <label>Estimated Price</label>
                            <input class="form-control form-control-solid" type="text" id="final_price_zone_0" disabled/>
                        </div>
                    </div>

                    <div class="form-group row" v-for="i in zones">
                        <div class="col-md-5">
                            <label><b>@{{i.name}}</b> Price ($)</label>
                            <input class="form-control form-control-solid" type="text" :id="'price_zone_'+i.id" :data-id="i.id" v-on:change="estimatePrices"/>
                        </div>
                        <div class="col-md-5">
                            <label><b>@{{i.name}}</b> Discount (%) </label>
                            <input class="form-control form-control-solid" type="text" :id="'discount_zone_'+i.id" :data-id="i.id" v-on:change="estimatePrices"/>
                        </div>
                        <div class="col-md-2">
                            <label>Estimated Price</label>
                            <input class="form-control form-control-solid" type="text" :id="'final_price_zone_'+i.id" disabled/>
                        </div>
                    </div>

                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::Pricing -->

        <!-- begin::Teachers -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:assets/media/svg/icons/Home/Library.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24"/>
                                    <path d="M14.1124454,7.00625159 C14.0755336,7.00212117 14.0380145,7 14,7 L10,7 C9.96198549,7 9.92446641,7.00212117 9.88755465,7.00625159 L7.34761705,4.55799196 C6.95060373,4.17530866 6.9382927,3.54346816 7.32009765,3.14561006 L8.41948359,2 L15.5805164,2 L16.6799023,3.14561006 C17.0617073,3.54346816 17.0493963,4.17530866 16.6523829,4.55799196 L14.1124454,7.00625159 Z" fill="#000000"/>
                                    <path d="M13.7640285,9 L15.4853424,18.1494183 C15.5450675,18.4668794 15.4477627,18.7936387 15.2240963,19.0267093 L12.7215131,21.6345146 C12.7120098,21.6444174 12.7023037,21.6541236 12.6924008,21.6636269 C12.2939201,22.0460293 11.6608893,22.0329953 11.2784869,21.6345146 L8.77590372,19.0267093 C8.55223728,18.7936387 8.45493249,18.4668794 8.5146576,18.1494183 L10.2359715,9 L13.7640285,9 Z" fill="#000000" opacity="0.3"/>
                                </g>
                            </svg>
                            <!--end::Svg Icon--></span>
                        <h3 class="card-label">Courses</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-grop">
                        <label for="">Courses</label>
                        <select id="courses_select2" style="width: 100%;" multiple>
                            @foreach(\App\Course::all() as $course)
                                <option value="{{$course->id}}">{{$course->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::Teachers -->

        <!-- begin::Exams-Content -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo7/dist/../src/media/svg/icons/Home/Bulb2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5.11245763,2.03825554 C7.06198789,1.34608518 9.35774462,1 11.9997278,1 C14.6417901,1 16.9376995,1.34610591 18.8874558,2.03831773 L18.8874591,2.0383083 C19.9283802,2.40786109 20.4726317,3.55127609 20.103079,4.59219718 C20.0677743,4.69163999 20.0246549,4.78813275 19.9741245,4.88077171 L15,14 L9,14 L4.02583562,4.88068072 C3.49691243,3.91098821 3.85422657,2.69612015 4.82391908,2.16719696 C4.91654682,2.11667273 5.01302748,2.07355769 5.11245763,2.03825554 Z" fill="#000000" opacity="0.3"/>
                                <path d="M10,20 L14,20 L14,20 C14,21.1045695 13.1045695,22 12,22 L12,22 C10.8954305,22 10,21.1045695 10,20 Z" fill="#000000" opacity="0.3"/>
                                <path d="M13,10 L13,18 C13,18.5522847 12.5522847,19 12,19 C11.4477153,19 11,18.5522847 11,18 L11,10 L10.5,10 C10.2238576,10 10,9.77614237 10,9.5 C10,9.22385763 10.2238576,9 10.5,9 L13.5,9 C13.7761424,9 14,9.22385763 14,9.5 C14,9.77614237 13.7761424,10 13.5,10 L13,10 Z" fill="#000000" opacity="0.3"/>
                                <path d="M9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L15,14 C15.5522847,14 16,14.4477153 16,15 C16,15.5522847 15.5522847,16 15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 L9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <h3 class="card-label">Chapter Content</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group">
                        <label><strong>Chapter</strong></label>
                        <select id="chapters_list" class="dual-listbox mx-auto" multiple></select>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::Exams-Content -->

        <!-- begin::Process-Content -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo7/dist/../src/media/svg/icons/Home/Bulb2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5.11245763,2.03825554 C7.06198789,1.34608518 9.35774462,1 11.9997278,1 C14.6417901,1 16.9376995,1.34610591 18.8874558,2.03831773 L18.8874591,2.0383083 C19.9283802,2.40786109 20.4726317,3.55127609 20.103079,4.59219718 C20.0677743,4.69163999 20.0246549,4.78813275 19.9741245,4.88077171 L15,14 L9,14 L4.02583562,4.88068072 C3.49691243,3.91098821 3.85422657,2.69612015 4.82391908,2.16719696 C4.91654682,2.11667273 5.01302748,2.07355769 5.11245763,2.03825554 Z" fill="#000000" opacity="0.3"/>
                                <path d="M10,20 L14,20 L14,20 C14,21.1045695 13.1045695,22 12,22 L12,22 C10.8954305,22 10,21.1045695 10,20 Z" fill="#000000" opacity="0.3"/>
                                <path d="M13,10 L13,18 C13,18.5522847 12.5522847,19 12,19 C11.4477153,19 11,18.5522847 11,18 L11,10 L10.5,10 C10.2238576,10 10,9.77614237 10,9.5 C10,9.22385763 10.2238576,9 10.5,9 L13.5,9 C13.7761424,9 14,9.22385763 14,9.5 C14,9.77614237 13.7761424,10 13.5,10 L13,10 Z" fill="#000000" opacity="0.3"/>
                                <path d="M9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L15,14 C15.5522847,14 16,14.4477153 16,15 C16,15.5522847 15.5522847,16 15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 L9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <h3 class="card-label">{{config('library.domain.en')}} Content</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group">
                        <label><strong>{{config('library.domain.en')}}</strong></label>
                        <select id="domains_list" class="dual-listbox mx-auto" multiple></select>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::Process-Content -->

        <!-- begin::Video-Content -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo7/dist/../src/media/svg/icons/Home/Bulb2.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <path d="M5.11245763,2.03825554 C7.06198789,1.34608518 9.35774462,1 11.9997278,1 C14.6417901,1 16.9376995,1.34610591 18.8874558,2.03831773 L18.8874591,2.0383083 C19.9283802,2.40786109 20.4726317,3.55127609 20.103079,4.59219718 C20.0677743,4.69163999 20.0246549,4.78813275 19.9741245,4.88077171 L15,14 L9,14 L4.02583562,4.88068072 C3.49691243,3.91098821 3.85422657,2.69612015 4.82391908,2.16719696 C4.91654682,2.11667273 5.01302748,2.07355769 5.11245763,2.03825554 Z" fill="#000000" opacity="0.3"/>
                                <path d="M10,20 L14,20 L14,20 C14,21.1045695 13.1045695,22 12,22 L12,22 C10.8954305,22 10,21.1045695 10,20 Z" fill="#000000" opacity="0.3"/>
                                <path d="M13,10 L13,18 C13,18.5522847 12.5522847,19 12,19 C11.4477153,19 11,18.5522847 11,18 L11,10 L10.5,10 C10.2238576,10 10,9.77614237 10,9.5 C10,9.22385763 10.2238576,9 10.5,9 L13.5,9 C13.7761424,9 14,9.22385763 14,9.5 C14,9.77614237 13.7761424,10 13.5,10 L13,10 Z" fill="#000000" opacity="0.3"/>
                                <path d="M9,18 C8.44771525,18 8,17.5522847 8,17 C8,16.4477153 8.44771525,16 9,16 C8.44771525,16 8,15.5522847 8,15 C8,14.4477153 8.44771525,14 9,14 L15,14 C15.5522847,14 16,14.4477153 16,15 C16,15.5522847 15.5522847,16 15,16 C15.5522847,16 16,16.4477153 16,17 C16,17.5522847 15.5522847,18 15,18 C15.5522847,18 16,18.4477153 16,19 C16,19.5522847 15.5522847,20 15,20 L9,20 C8.44771525,20 8,19.5522847 8,19 C8,18.4477153 8.44771525,18 9,18 Z" fill="#000000"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <h3 class="card-label">Exam Content</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group">
                        <label><strong>Exams</strong></label>
                        <select id="exams_list" class="dual-listbox mx-auto" multiple></select>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::Video-Content -->

        <!-- begin::About-Package -->
        <div class="bg-white rounded p-10">
            <!--begin::Card-->
            <div class="card card-custom card-fit card-border">
                <div class="card-header">
                    <div class="card-title">
                        <span class="svg-icon svg-icon-primary svg-icon-3x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2021-04-03-014522/theme/html/demo7/dist/../src/media/svg/icons/Code/Info-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <rect x="0" y="0" width="24" height="24"/>
                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                <rect fill="#000000" x="11" y="10" width="2" height="7" rx="1"/>
                                <rect fill="#000000" x="11" y="7" width="2" height="2" rx="1"/>
                            </g>
                        </svg><!--end::Svg Icon--></span>
                        <h3 class="card-label">About Package</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Description</label>
                            <textarea id="descriptionEditor" ></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Arabic</label>
                            <textarea id="descriptionEditorAr" ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>What You'll Learn</label>
                            <textarea id="whatYouLearnEditor" ></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Arabic</label>
                            <textarea id="whatYouLearnEditorAr" ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Requirements</label>
                            <textarea id="requirementEditor" ></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Arabic</label>
                            <textarea id="requirementEditorAr" ></textarea>
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Who Course For</label>
                            <textarea id="whoCourseForEditor" ></textarea>
                        </div>
                        <div class="col-md-6">
                            <label>Arabic</label>
                            <textarea id="whoCourseForEditorAr" ></textarea>
                        </div>

                    </div>
                    <div class="form-group">
                        <label>Enroll Confirmation Email</label>
                        <textarea id="enrollConfirmationEditor" ></textarea>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::About-Package -->

    </div>
@endsection
@section('jscode')
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>

        let uploadedDocumentArray = [];
        let uploadedVideoArray = [];
        var app = new Vue({
            el: '#app1',
            data:{

                /** General Info */
                package_name: '',
                package_name_ar: '',
                language: '',
                telegram_link: '',
                whatsapp_link: '',
                courses: [],
                course_id: '',
                chapters: [],
                chapter_id: '',
                expire_in_days: '',
                extension_price: '',
                extension_period: '',
                max_number_of_extensions: '',
                coverImage: null,
                previewVideo: null,

                /** Certification */
                includeCertification: false,
                certification_title: '',

                /** Pricing */
                zones: [],
                fallback_price: '',
                fallback_discount: '',

                /** Content , Videos & Exams */
                includeExams: false,
                includeVideos: false,
                chapterDuelList: null,
                examDuelList: null,
                domainDuelList: null,
                selectedChaptersList: [],
                selectedExamsList: [],
                selectedDomainList: [],

                /** Description */
                descriptionEditor: null,
                whatYouLearnEditor: null,
                requirementEditor: null,
                whoCourseForEditor: null,
                descriptionEditorAr: null,
                whatYouLearnEditorAr: null,
                requirementEditorAr: null,
                whoCourseForEditorAr: null,
                enrollConfirmationEditor: null,


            },
            mounted(){
                KTApp.blockPage();
                this.descriptionEditor = this.initEditor('descriptionEditor', 280);
                this.whatYouLearnEditor = this.initEditor('whatYouLearnEditor', 280);
                this.requirementEditor = this.initEditor('requirementEditor', 280);
                this.whoCourseForEditor = this.initEditor('whoCourseForEditor', 280);
                this.descriptionEditorAr = this.initEditor('descriptionEditorAr', 280);
                this.whatYouLearnEditorAr = this.initEditor('whatYouLearnEditorAr', 280);
                this.requirementEditorAr = this.initEditor('requirementEditorAr', 280);
                this.whoCourseForEditorAr = this.initEditor('whoCourseForEditorAr', 280);
                this.enrollConfirmationEditor = this.initEditor('enrollConfirmationEditor', 280);

                this.loader().then(res => {

                    app.getExams().then(exams => {
                        let exams_ = exams.map((i) => {
                            return {
                                value: i.id,
                                text: `${i.name}`,
                                selected: app.selectedExamsList.findIndex(x => x == i.id) != -1? true: false,
                            }
                        });
                        app.examDuelList = this.initDuelListSelector('exams_list', exams_);
                    });

                    app.getDomains().then(domains => {
                        let domains_ = domains.map((i) => {
                            return {
                                value: i.id,
                                text: `${i.title}`,
                                selected: app.selectedDomainList.findIndex(x => x == i.id) != -1? true: false,
                            }
                        });
                        app.domainDuelList = this.initDuelListSelector('domains_list', domains_);
                    });

                });
                this.loadCourses();
                this.loadZones();
                this.initDropZone();

                this.initSelect2('courses_select2', async function(){
                    await app.fetchLibrary(
                        app.getSelect2Selected('courses_select2').map(o => o['id']), 'chapter'
                    ).then((chapters) => {
                        let chapters_ = chapters.map((i) => {
                            return {
                                value: i.id,
                                text: `${i.title}`,
                                selected: app.selectedChaptersList.findIndex(x => x == i.id) != -1? true: false,
                            }
                        });
                        app.chapterDuelList = app.initDuelListSelector('chapters_list', chapters_);
                    });


                });

                this.chapterDuelList = this.initDuelListSelector('chapters_list');

            },
            methods: {
                loader: async function(){

                    await new Promise(res => setTimeout(res, 3000));
                    const res = await this.loaderRequest();
                    this.package_name = res.general.name;
                    this.package_name_ar = res.translation.name;
                    this.language = res.general.lang;
                    this.expire_in_days = res.general.expire_in_days;
                    this.extension_period = res.general.extension_in_days;
                    this.extension_price = res.general.extension_price;
                    this.max_number_of_extensions = Math.round(res.general.max_extension_in_days/res.general.extension_in_days);
                    this.includeCertification = res.general.certification ? true: false;
                    this.certification_title = res.general.certification_title;
                    this.telegram_link = res.general.telegram_link;

                    // Pricing and Zones
                    this.fallback_discount = res.general.discount;
                    this.fallback_price = res.general.original_price;
                    console.log(this.zones);
                    for(i=0; i<this.zones.length; i++){
                        const zone_id = this.zones[i].id;
                        const data = res.pricing.find(x => x.zone_id == zone_id);
                        this._('price_zone_'+zone_id).value = data? data.original_price: '';
                        this._('discount_zone_'+zone_id).value = data? data.discount: '';
                    }

                    // order here is important
                    this.selectedChaptersList = res.chapters;
                    this.selectedExamsList = res.exams;
                    this.selectedDomainList = res.domains;
                    this.select2Select('courses_select2', res.courses);

                    this.descriptionEditor.setData(res.general.description); this.descriptionEditorAr.setData(res.translation.description);
                    this.whatYouLearnEditor.setData(res.general.what_you_learn); this.whatYouLearnEditorAr.setData(res.translation.what_you_learn);
                    this.requirementEditor.setData(res.general.requirement); this.requirementEditorAr.setData(res.translation.requirement);
                    this.whoCourseForEditor.setData(res.general.who_course_for); this.whoCourseForEditorAr.setData(res.translation.who_course_for);
                    this.enrollConfirmationEditor.setData(res.general.enroll_msg);
                    KTApp.unblockPage();
                },
                loaderRequest: async function(){
                    $.ajaxSetup({
                        headers: {'X-CSRF-TOKEN': '{{csrf_token()}}'}
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('package.loader')}}',
                        data: {package_id: '{{$package_id}}'},
                        error: function(err){
                            KTApp.unblockPage();
                            console.log(err);
                        }
                    });
                },
                storeRequest: async function(data){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'PUT',
                        url: '{{ route('packages.update', $package_id)}}',
                        data,
                        error: function(err){
                            KTApp.unblockPage();
                            console.log(err);
                        }
                    });
                },
                store: async function(){
                    if(!this.validation()){
                        return;
                    }

                    const data = {
                        package_name            : app.package_name,
                        package_name_ar         : app.package_name_ar,
                        language                : app.language,
                        telegram_link           : app.telegram_link,
                        whatsapp_link           : app.whatsapp_link,

                        expire_in_days          : app.expire_in_days,
                        extension_price         : app.extension_price,
                        extension_period        : app.extension_period,
                        max_number_of_extensions: app.max_number_of_extensions,

                        coverImageName          : app.coverImage.files.length > 0 ? app.coverImage.files[0].name: null,
                        previewVideoName        : app.previewVideo.files.length > 0 ? app.previewVideo.files[0].name: null,

                        includeCertification    : app.includeCertification,
                        certification_title     : app.includeCertification ? app.certification_title: null,

                        fallback_price          : app.fallback_price,
                        fallback_discount       : app.fallback_discount,
                        zones                   : app.getZonesPricing(),

                        courses                 : app.getSelect2Selected('courses_select2'),
                        exams                   : app.getDuelListSelected(app.examDuelList),
                        chapters                : app.getDuelListSelected(app.chapterDuelList),
                        domains                 : app.getDuelListSelected(app.domainDuelList),

                        descriptionEditor       : app.descriptionEditor.getData(),
                        whatYouLearnEditor      : app.whatYouLearnEditor.getData(),
                        requirementEditor       : app.requirementEditor.getData(),
                        whoCourseForEditor      : app.whoCourseForEditor.getData(),
                        descriptionEditor_ar    : app.descriptionEditorAr.getData(),
                        whatYouLearnEditor_ar   : app.whatYouLearnEditorAr.getData(),
                        requirementEditor_ar    : app.requirementEditorAr.getData(),
                        whoCourseForEditor_ar   : app.whoCourseForEditorAr.getData(),
                        enrollConfirmationEditor: app.enrollConfirmationEditor.getData(),
                    };

                    await app.storeRequest(data).then((res) => {
                        console.log(res);
                        swal({
                            title: 'Package Updated.',
                            type: 'success',
                            //   confirmButtonColor: '#DD6B55',
                            cancelButtonText: 'Ok'
                        }).then(()=>{
                            window.location.replace('{{route('packages.index')}}');
                        });
                    });
                },
                validation: function(){
                    /** General Info */
                    if(this.package_name == ''){
                        this.displayMessage('Package Name Is required !');
                        return false;
                    }
                    if(this.language === ''){
                        this.displayMessage('Language Is required !');
                        return false;
                    }
                    if(this.expire_in_days === '' || this.expire_in_days <= 0){
                        this.displayMessage('Expire In, Is required !');
                        return false;
                    }
                    if(this.extension_price === '' || this.extension_price < 0){
                        this.displayMessage('Extension Price, Is required !');
                        return false;
                    }
                    if(this.extension_period === '' || this.extension_period < 0){
                        this.displayMessage('Extension Period, Is required !');
                        return false;
                    }
                    if(this.max_number_of_extensions === '' || this.max_number_of_extensions < 0){
                        this.displayMessage('Max No. of Extensions, Is required !');
                        return false;
                    }
                    // if(!(this.coverImage?.files.length > 0 && this.coverImage.files[0].upload.progress == 100)){
                    //     this.displayMessage('Package Cover Image, Is required !');
                    //     return false;
                    // }
                    /** Certification */
                    if((this.includeCertification ? null: false) ?? this.certification_title == ''){
                        this.displayMessage('Certification Title, Is required !');
                        return false;
                    }

                    /** Pricing */
                    if(this.fallback_price == '' || parseFloat(this.fallback_price) <= 0){
                        this.displayMessage('Fallback price, Is required !');
                        return false;
                    }
                    const wrongPricing = this.getZonesPricing().find(function(zone){
                        // zones with empty price
                        return zone.price == '' || parseFloat(zone.price) <= 0;
                    });
                    if(wrongPricing){
                        this.displayMessage('Price of Zone " '+wrongPricing.zone_name+' ", Is required !');
                        return false;
                    }

                    /** Teachers */
                    if(!this.getSelect2Selected('courses_select2').length){
                        this.displayMessage('Please At least One Course !');
                        return false;
                    }


                    return true;

                },
                displayMessage: function(err, type = 'warning'){
                    swal({
                        title: ''+err+'',
                        type: type,
                        //   confirmButtonColor: '#DD6B55',
                        cancelButtonText: 'Ok'
                    });
                },

                getFallbackDiscount: function(input = null){
                    value = input ?? this.fallback_discount;
                    return (value == ''? null: parseFloat(value)) ?? 0;
                },
                getZonesPricing: function(){
                    return this.zones.map(function(zone){
                        return {
                            zone_id: zone.id,
                            zone_name: zone.name,
                            price: app._('price_zone_'+zone.id).value,
                            discount: app.getFallbackDiscount(app._('discount_zone_'+zone.id).value),
                        };
                    });
                },
                select2Select: function(ele, values){
                    $("#"+ele).select2().val(values).trigger("change");
                },
                getSelect2Selected: function(ele){
                    return $('#'+ele).select2('data').filter(function(item){
                        return item.selected;
                    }).map(function(item){
                        return {
                            id: item.id,
                            name: item.text,
                        }
                    });
                },
                initSelect2: function(ele, changeCallback){
                    $('#'+ele).select2({
                        placeholder: 'Select Courses',
                        allowClear: true
                    });
                    $(document.body).on("change","#"+ele,changeCallback);
                },
                getDuelListSelected: function(listObj){
                    return listObj.selected.map(function(i){
                        return {
                            id: i.dataset.id,
                            title: i.innerText,
                        };
                    });
                },
                /**
                 * @param ele
                 * @param items array [ { text:'' , value: '',} ...]
                 * @returns {DualListbox}
                 */
                initDuelListSelector: function(ele, options){
                    var $this = $('#'+ele);
                    const removeOldItems = document.getElementsByClassName(ele);
                    Array.from(removeOldItems).map((i) => {
                        i.remove();
                    });

                    // init dual listbox
                    return new DualListbox($this.get(0), {
                        availableTitle: 'Available options',
                        selectedTitle: 'Selected options',
                        addButtonText: 'Add',
                        removeButtonText: 'Remove',
                        addAllButtonText: 'Add All',
                        removeAllButtonText: 'Remove All',
                        options,
                    });

                },
                initEditor: function(element_id, height){
                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
                        filebrowserUploadMethod: 'form',
                        height,
                    });
                },
                _: function(ele){
                    return document.getElementById(ele);
                },
                estimatePrices: function(e){
                    const zone_id = e.target.dataset.id;
                    const price = this._('price_zone_'+zone_id).value;
                    const discount = this._('discount_zone_'+zone_id).value;
                    this._('final_price_zone_'+zone_id).value = (Math.round(price * (1 - discount / 100) * 100) / 100 )+' $';
                },
                loadZones: async function(){
                    this.zones = await this.fetchZones();
                },
                fetchZones: function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('zone.fetch')}}',
                    });
                },
                initDropZone: async function(){
                    this.coverImage = new Dropzone('#kt_dropzone_1', {
                        url: "{{route('dropzone.handler')}}",
                        paramName: "file", // The name that will be used to transfer the file
                        maxFiles: 1,
                        maxFilesize: 10, // MB
                        addRemoveLinks: true,
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        acceptedFiles: "image/*",
                        success: function (file, response) {
                            console.log(response);
                            // $('.vueform').append('<input class="imageFile" type="hidden" name="file[]" value="' + response.name + '">')
                            uploadedDocumentArray.push(
                                response.name
                            );
                        }
                    });
                    this.previewVideo = new Dropzone('#kt_dropzone_2', {
                        url: "{{route('dropzone.handler')}}",
                        paramName: "file", // The name that will be used to transfer the file
                        maxFiles: 1,
                        maxFilesize: 200, // MB
                        addRemoveLinks: true,
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        },
                        acceptedFiles: "video/*",
                    });
                },
                loadCourses:async function(){
                    this.courses = await this.fetchLibrary('', 'all-courses');
                    console.log(this.courses);
                },
                getChapters:async function(){
                    return await  this.fetchLibrary(this.course_id, 'chapter');
                },
                getExams: async function(){
                    return await  this.fetchLibrary(null, 'exams');
                },
                getDomains: async function(){
                    return await  this.fetchLibrary(null, 'domains');
                },
                fetchLibrary: function(parent_topic_id, topic_required){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('library.fetch')}}',
                        data: {
                            parent_topic_id,
                            topic_required,
                        },
                    });
                },
            },
            watch: {

            }
        });

    </script>
@endsection
