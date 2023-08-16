@extends('layouts.admin-layout')

@section('header')
    <style>
        .dual-listbox__title , .dual-listbox__available,
        .dual-listbox__selected, .dual-listbox__title
        {
            width: 300px !important;
        }
        .dual-listbox__container {
            margin: auto;
        }

    </style>
@endsection

@section('pageTitle') Add Package @endsection
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
            <a href="#" class="text-muted">Create New Package</a>
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
                        <div class="col-md-12">
                            <label>Package Name</label>
                            <input type="text" v-model="package_name" class="form-control form-control-solid" placeholder="Package Name ..">
                        </div>
{{--                        <div class="col-md-6">--}}
{{--                            <label>Arabic</label>--}}
{{--                            <input type="text" v-model="package_name_ar" class="form-control form-control-solid" placeholder="Package Name In Arabic ..">--}}
{{--                        </div>--}}

                    </div>
                    <div class="form-group row">
                        <div class="col-md-6">
                            <label>Package Language</label>
                            <select type="text" v-model="language" class="form-control form-control-solid">
                                <option value="English">English</option>
                                <option value="Arabic">Arabic</option>
                                <option value="English & Arabic">English & Arabic</option>
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label>Renewal Period (empty for one time payment)</label>
                            <input type="text" v-model="renew_period_in_days" class="form-control form-control-solid" placeholder="30">
                        </div>

                    </div>
{{--                    <div class="form-group">--}}
{{--                        <label>Telegram Link</label>--}}
{{--                        <input type="text" v-model="telegram_link" class="form-control form-control-solid" placeholder="https://...">--}}
{{--                    </div>--}}
{{--                    <div class="form-group">--}}
{{--                        <label>WhatsApp Link</label>--}}
{{--                        <input type="text" v-model="whatsapp_link" class="form-control form-control-solid" placeholder="https://...">--}}
{{--                    </div>--}}
                </div>
{{--                <div class="card-body pt-2">--}}
{{--                    <div class="form-group row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>Renewal Period (empty for one time payment)</label>--}}
{{--                            <input type="text" v-model="expire_in_days" class="form-control form-control-solid" placeholder="60">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>Extension Price ($)</label>--}}
{{--                            <input type="text" v-model="extension_price" class="form-control form-control-solid" placeholder="20">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="form-group row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>Extension Period (N days)</label>--}}
{{--                            <input type="text" v-model="extension_period" class="form-control form-control-solid" placeholder="30">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <label>Max No. of Extensions</label>--}}
{{--                            <input type="text" v-model="max_number_of_extensions" class="form-control form-control-solid" placeholder="3">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
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
{{--        <div class="bg-white rounded p-10">--}}
{{--            <!--begin::Card-->--}}
{{--            <div class="card card-custom card-fit card-border">--}}
{{--                <div class="card-header">--}}
{{--                    <div class="card-title">--}}
{{--                        <span class="card-icon">--}}
{{--                            <i class="flaticon2-paper text-primary icon-2x"></i>--}}
{{--                        </span>--}}
{{--                        <h3 class="card-label">Certification</h3>--}}
{{--                    </div>--}}
{{--                    <div class="card-toolbar">--}}
{{--                        <span class="switch switch-lg">--}}
{{--                            <label>--}}
{{--                                <input type="checkbox" checked="checked" v-model="includeCertification">--}}
{{--                                <span></span>--}}
{{--                            </label>--}}
{{--                        </span>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="card-body pt-2" v-if="includeCertification">--}}
{{--                    <div class="form-group">--}}
{{--                        <label>Certification Title</label>--}}
{{--                        <input type="text" v-model="certification_title" class="form-control form-control-solid" placeholder="certification title">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <!--end::Card-->--}}
{{--        </div>--}}
        <!-- end::Certification -->
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
                        <h3 class="card-label">{{config('library.path.en')}}</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-grop">
                        <label for="">{{config('library.path.en')}}</label>
                        <select id="paths_list" style="width: 100%;"></select>
                    </div>
                    <div class="form-grop">
                        <label for="">{{config('library.course.en')}}</label>
                        <select id="courses_list" style="width: 100%;"></select>
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
                        <h3 class="card-label">{{config('library.part.en')}} Content</h3>
                    </div>
                </div>
                <div class="card-body pt-2">
                    <div class="form-group">
                        <label><strong>{{config('library.part.en')}}</strong></label>
                        <select id="parts_list" class="dual-listbox mx-auto" multiple></select>
                    </div>
                </div>
            </div>
            <!--end::Card-->
        </div>
        <!-- end::Exams-Content -->

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
                        <div class="col-md-12">
                            <label>Description</label>
                            <textarea id="descriptionEditor" ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>What You'll Learn</label>
                            <textarea id="whatYouLearnEditor" ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Requirements</label>
                            <textarea id="requirementEditor" ></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label>Who Course For</label>
                            <textarea id="whoCourseForEditor" ></textarea>
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
                telegram_link: '',
                whatsapp_link: '',
                language: '',
                renew_period_in_days: '',
                courses: [],
                paths: [],
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


                /** Content , Videos & Exams */
                includeExams: false,
                includeVideos: false,
                courses_list: null,
                partDuelList: null,
                examDuelList: null,
                domainDuelList: null,


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

                this.initDropZone();

                this.getPaths().then(function(paths){
                    /** Init Path Select2 */
                    app.initSelect2('paths_list', async function(){
                        await app.fetchLibrary(
                            app.getSelect2Selected('paths_list').map(o => o['id']), 'course'
                        ).then((courses) => {
                            app.emptySelect2('courses_list');
                            app.appendOptionSelect2('courses_list', courses).trigger('change');
                        });
                    });
                    app.appendOptionSelect2('paths_list', paths).trigger('change');
                });

                this.initSelect2('courses_list', async function(){
                    await app.fetchLibrary(
                        app.getSelect2Selected('courses_list').map(o => o['id']), 'part'
                    ).then((parts) => {
                        let parts_ = parts.map((i) => {
                            return {
                                value: i.id,
                                text: `${i.title}`,
                            }
                        });

                        app.partDuelList = app.initDuelListSelector('parts_list', parts_);
                    });
                });


                this.getExams().then(exams => {
                    let exams_ = exams.map((i) => {
                        return {
                            value: i.id,
                            text: `${i.name}`,
                        }
                    });
                    app.examDuelList = this.initDuelListSelector('exams_list', exams_);
                });
                //
                this.partDuelList = this.initDuelListSelector('parts_list');

                this.descriptionEditor = this.initEditor('descriptionEditor', 280);
                this.whatYouLearnEditor = this.initEditor('whatYouLearnEditor', 280);
                this.requirementEditor = this.initEditor('requirementEditor', 280);
                this.whoCourseForEditor = this.initEditor('whoCourseForEditor', 280);
                this.enrollConfirmationEditor = this.initEditor('enrollConfirmationEditor', 280);
                KTApp.unblockPage();
            },
            methods: {
                storeRequest: async function(data){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('packages.store')}}',
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

                        language                : app.language,
                        renew_period_in_days    : app.renew_period_in_days,

                        expire_in_days          : app.expire_in_days,
                        extension_price         : app.extension_price,
                        extension_period        : app.extension_period,
                        max_number_of_extensions: app.max_number_of_extensions,

                        coverImageName          : app.coverImage.files[0].name,
                        previewVideoName        : app.previewVideo.files.length > 0 ? app.previewVideo.files[0].name: null,

                        includeCertification    : app.includeCertification,
                        certification_title     : app.includeCertification ? app.certification_title: null,

                        exams                   : app.getDuelListSelected(app.examDuelList),
                        parts                   : app.getDuelListSelected(app.partDuelList),

                        descriptionEditor       : app.descriptionEditor.getData(),
                        whatYouLearnEditor      : app.whatYouLearnEditor.getData(),
                        requirementEditor       : app.requirementEditor.getData(),
                        whoCourseForEditor      : app.whoCourseForEditor.getData(),

                        enrollConfirmationEditor: app.enrollConfirmationEditor.getData(),
                    };



                    await app.storeRequest(data).then((res) => {
                        swal({
                            title: 'Package Created.',
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
                    // if(this.expire_in_days === '' || this.expire_in_days <= 0){
                    //     this.displayMessage('Expire In, Is required !');
                    //     return false;
                    // }
                    // if(this.extension_price === '' || this.extension_price < 0){
                    //     this.displayMessage('Extension Price, Is required !');
                    //     return false;
                    // }
                    // if(this.extension_period === '' || this.extension_period < 0){
                    //     this.displayMessage('Extension Period, Is required !');
                    //     return false;
                    // }
                    // if(this.max_number_of_extensions === '' || this.max_number_of_extensions < 0){
                    //     this.displayMessage('Max No. of Extensions, Is required !');
                    //     return false;
                    // }
                    if(!(this.coverImage?.files.length > 0 && this.coverImage.files[0].upload.progress == 100)){
                        this.displayMessage('Package Cover Image, Is required !');
                        return false;
                    }
                    /** Certification */
                    if((this.includeCertification ? null: false) ?? this.certification_title == ''){
                        this.displayMessage('Certification Title, Is required !');
                        return false;
                    }


                    /** Teachers */
                    if(!app.getDuelListSelected(app.examDuelList)?.length && !app.getDuelListSelected(app.partDuelList)?.length ){
                        this.displayMessage('Please At least One Exam or one {{config('library.part.en')}}!');
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

                appendOptionSelect2: function(ele, options){
                    const optimizeOptions = options.map(options => {
                        return {
                            id: options.id,
                            text: options.title,
                        };
                    });
                    for(let i = 0; i<options.length; i++){
                        const newOption = new Option(optimizeOptions[i].text, optimizeOptions[i].id, false, false);
                        $('#'+ele).append(newOption);
                    }
                    app.clearSelectionSelect2(ele);
                    return $('#'+ele);
                },
                emptySelect2: function(ele){
                    return $("#"+ele).empty();
                },
                clearSelectionSelect2: function(ele){
                    return $('#'+ele).val(null);
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
                getPaths:async function(){
                    return await this.fetchLibrary('', 'path');
                },
                getChapters:async function(){
                    return await this.fetchLibrary(this.course_id, 'chapter');
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
