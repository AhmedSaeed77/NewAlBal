@extends('layouts.super-admin-layout')
@section('header')
    <link href="{{asset('assets-admin/css/pages/wizard/wizard-2.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('pageTitle') Library @endsection
@section('subheaderTitle')
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <rect x="0" y="0" width="24" height="24"></rect>
                        <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#F64E60"></path>
                        <rect fill="#F64E60" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
                    </g>
                </svg>
            </span>
        <h3 class="card-label pr-2">Library </h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="{{route('super-admin.dashboard')}}" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">Create</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('library.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"></rect>
                <path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z" fill="#F64E60"></path>
                <rect fill="#F64E60" opacity="0.3" transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)" x="16.3255682" y="2.94551858" width="3" height="18" rx="1"></rect>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Library</a>
@endsection

@section('content')
    <div class="card card-custom" id="app-1">
        <div class="card-body p-0">
            <!--begin: Wizard-->
            <div class="wizard wizard-2" id="kt_wizard_v2" data-wizard-state="first" data-wizard-clickable="false">
                <!--begin: Wizard Nav-->
                <div class="wizard-nav border-right py-8 px-8 py-lg-20 px-lg-10">
                    <!--begin::Wizard Step 1 Nav-->
                    <div class="wizard-steps">
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Setup a {{config('library.path.en')}}</h3>
                                    <div class="wizard-desc">enter {{config('library.path.en')}} titles</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 1 Nav-->
                        <!--begin::Wizard Step 2 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Compass.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M12,21 C7.02943725,21 3,16.9705627 3,12 C3,7.02943725 7.02943725,3 12,3 C16.9705627,3 21,7.02943725 21,12 C21,16.9705627 16.9705627,21 12,21 Z M14.1654881,7.35483745 L9.61055177,10.3622525 C9.47921741,10.4489666 9.39637436,10.592455 9.38694497,10.7495509 L9.05991526,16.197949 C9.04337012,16.4735952 9.25341309,16.7104632 9.52905936,16.7270083 C9.63705011,16.7334903 9.74423017,16.7047714 9.83451193,16.6451626 L14.3894482,13.6377475 C14.5207826,13.5510334 14.6036256,13.407545 14.613055,13.2504491 L14.9400847,7.80205104 C14.9566299,7.52640477 14.7465869,7.28953682 14.4709406,7.27299168 C14.3629499,7.26650974 14.2557698,7.29522855 14.1654881,7.35483745 Z" fill="#000000"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Define {{config('library.course.en')}}</h3>
                                    <div class="wizard-desc">attach {{config('library.course.en')}} to courses</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 2 Nav-->
                        <!--begin::Wizard Step 3 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Thunder-move.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M16.3740377,19.9389434 L22.2226499,11.1660251 C22.4524142,10.8213786 22.3592838,10.3557266 22.0146373,10.1259623 C21.8914367,10.0438285 21.7466809,10 21.5986122,10 L17,10 L17,4.47708173 C17,4.06286817 16.6642136,3.72708173 16.25,3.72708173 C15.9992351,3.72708173 15.7650616,3.85240758 15.6259623,4.06105658 L9.7773501,12.8339749 C9.54758575,13.1786214 9.64071616,13.6442734 9.98536267,13.8740377 C10.1085633,13.9561715 10.2533191,14 10.4013878,14 L15,14 L15,19.5229183 C15,19.9371318 15.3357864,20.2729183 15.75,20.2729183 C16.0007649,20.2729183 16.2349384,20.1475924 16.3740377,19.9389434 Z" fill="#000000"></path>
                                                <path d="M4.5,5 L9.5,5 C10.3284271,5 11,5.67157288 11,6.5 C11,7.32842712 10.3284271,8 9.5,8 L4.5,8 C3.67157288,8 3,7.32842712 3,6.5 C3,5.67157288 3.67157288,5 4.5,5 Z M4.5,17 L9.5,17 C10.3284271,17 11,17.6715729 11,18.5 C11,19.3284271 10.3284271,20 9.5,20 L4.5,20 C3.67157288,20 3,19.3284271 3,18.5 C3,17.6715729 3.67157288,17 4.5,17 Z M2.5,11 L6.5,11 C7.32842712,11 8,11.6715729 8,12.5 C8,13.3284271 7.32842712,14 6.5,14 L2.5,14 C1.67157288,14 1,13.3284271 1,12.5 C1,11.6715729 1.67157288,11 2.5,11 Z" fill="#000000" opacity="0.3"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Define {{config('library.part.en')}}</h3>
                                    <div class="wizard-desc">attach {{config('library.path.en')}} to {{config('library.course.en')}}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 3 Nav-->
                        <!--begin::Wizard Step 4 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Position.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M19,11 L21,11 C21.5522847,11 22,11.4477153 22,12 C22,12.5522847 21.5522847,13 21,13 L19,13 C18.4477153,13 18,12.5522847 18,12 C18,11.4477153 18.4477153,11 19,11 Z M3,11 L5,11 C5.55228475,11 6,11.4477153 6,12 C6,12.5522847 5.55228475,13 5,13 L3,13 C2.44771525,13 2,12.5522847 2,12 C2,11.4477153 2.44771525,11 3,11 Z M12,2 C12.5522847,2 13,2.44771525 13,3 L13,5 C13,5.55228475 12.5522847,6 12,6 C11.4477153,6 11,5.55228475 11,5 L11,3 C11,2.44771525 11.4477153,2 12,2 Z M12,18 C12.5522847,18 13,18.4477153 13,19 L13,21 C13,21.5522847 12.5522847,22 12,22 C11.4477153,22 11,21.5522847 11,21 L11,19 C11,18.4477153 11.4477153,18 12,18 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="2"></circle>
                                                <path d="M12,17 C14.7614237,17 17,14.7614237 17,12 C17,9.23857625 14.7614237,7 12,7 C9.23857625,7 7,9.23857625 7,12 C7,14.7614237 9.23857625,17 12,17 Z M12,19 C8.13400675,19 5,15.8659932 5,12 C5,8.13400675 8.13400675,5 12,5 C15.8659932,5 19,8.13400675 19,12 C19,15.8659932 15.8659932,19 12,19 Z" fill="#000000" fill-rule="nonzero"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Define {{config('library.chapter.en')}}</h3>
                                    <div class="wizard-desc">attach {{config('library.chapter.en')}} to {{config('library.part.en')}}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 4 Nav-->
                        <!--begin::Wizard Step 5 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Credit-card.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"></rect>
                                                <rect fill="#000000" x="2" y="8" width="20" height="3"></rect>
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"></rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Define {{config('library.topic.en')}}</h3>
                                    <div class="wizard-desc">attach {{config('library.topic.en')}} to {{config('library.chapter.en')}}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 5 Nav-->
                        <!--begin::Wizard Step 6 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Credit-card.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <rect fill="#000000" opacity="0.3" x="2" y="5" width="20" height="14" rx="2"></rect>
                                                <rect fill="#000000" x="2" y="8" width="20" height="3"></rect>
                                                <rect fill="#000000" opacity="0.3" x="16" y="14" width="4" height="2" rx="1"></rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Define {{config('library.skill.en')}}</h3>
                                    <div class="wizard-desc">attach {{config('library.skill.en')}} to {{config('library.topic.en')}}</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 6 Nav-->
                        <!--begin::Wizard Step 7 Nav-->
                        <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                            <div class="wizard-wrapper">
                                <div class="wizard-icon">
                                    <span class="svg-icon svg-icon-2x">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/General/Like.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"></rect>
                                                <path d="M9,10 L9,19 L10.1525987,19.3841996 C11.3761964,19.7920655 12.6575468,20 13.9473319,20 L17.5405883,20 C18.9706314,20 20.2018758,18.990621 20.4823303,17.5883484 L21.231529,13.8423552 C21.5564648,12.217676 20.5028146,10.6372006 18.8781353,10.3122648 C18.6189212,10.260422 18.353992,10.2430672 18.0902299,10.2606513 L14.5,10.5 L14.8641964,6.49383981 C14.9326895,5.74041495 14.3774427,5.07411874 13.6240179,5.00562558 C13.5827848,5.00187712 13.5414031,5 13.5,5 L13.5,5 C12.5694044,5 11.7070439,5.48826024 11.2282564,6.28623939 L9,10 Z" fill="#000000"></path>
                                                <rect fill="#000000" opacity="0.3" x="2" y="9" width="5" height="11" rx="1"></rect>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <div class="wizard-label">
                                    <h3 class="wizard-title">Completed!</h3>
                                    <div class="wizard-desc">Review and Submit</div>
                                </div>
                            </div>
                        </div>
                        <!--end::Wizard Step 7 Nav-->
                    </div>
                </div>
                <!--end: Wizard Nav-->
                <!--begin: Wizard Body-->
                <div class="wizard-body py-8 px-8 py-lg-20 px-lg-10">
                    <!--begin: Wizard Form-->
                    <div class="row">
                        <div class="offset-xxl-2 col-xxl-8">
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form">
                                <!--begin: Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <h4 class="mb-10 font-weight-bold text-dark">Setup a {{config('library.path.en')}}</h4>
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>{{config('library.path.en')}} Title</label>
                                        <input type="text" class="form-control form-control-solid form-control-lg" name="path_title" v-model="path_title" placeholder="{{config('library.path.en')}} Title" value="">
                                        <span class="form-text text-muted">Please enter {{config('library.path.en')}} title.</span>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <!--end::Input-->
                                    <!--begin::Input-->
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Country</label>
                                        <select name="country" id="country" class="form-control form-control-solid form-control-lg" v-model="country_id">
                                            <option value=""></option>
                                            @foreach(\App\Country::all() as $country)
                                                <option value="{{$country->id}}">{{$country->name}}</option>
                                            @endforeach
                                        </select>
                                        <span class="form-text text-muted">Please select the related country</span>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                    <!-- end:Input-->
                                </div>
                                <!--end: Wizard Step 1-->
                                <!--begin: Wizard Step 2-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Define {{config('library.course.en')}}</h4>
                                    <div class="from-group row">
                                        <div class="col-xl-12">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.course.en')}} Title</label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" v-model="course_title" placeholder="{{config('library.course.en')}} ..">
                                                <span class="form-text text-muted">Please enter {{config('library.course.en')}} title.</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <button @click.prevent="addCourse" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 float-right">Attach</button>
                                            </div>
                                            <!--end::Input-->

                                            <table class="table table-hover table-striped">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Title</th>
                                                    <th>Delete</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(i,index) in courses">
                                                        <td>@{{ index + 1 }}</td>
                                                        <td>@{{ i.title }}</td>
                                                        <td>
                                                            <a href="#" @click.prevent="removeCourse(index)">
                                                                <i class="la la-trash" style="color: #9d223c;"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>

                                </div>
                                <!--end: Wizard Step 2-->
                                <!--begin: Wizard Step 3-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Define {{config('library.part.en')}}</h4>
                                    <div class="from-group row">
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.course.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-model="course_index">
                                                    <option v-for="(i,index) in courses" :value="index">@{{ i.title }}</option>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.course.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.part.en')}} Title</label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" v-model="part_title" placeholder="{{config('library.part.en')}} ..">
                                                <span class="form-text text-muted">Please enter {{config('library.part.en')}} title.</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <button @click.prevent="addPart" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 float-right">Attach</button>
                                            </div>
                                            <!--end::Input-->

                                            <ul>
                                                <li v-for="(course, course_idx) in courses">
                                                    @{{ course.title }}
                                                    <ul v-for="(part, part_idx) in course.parts">
                                                        <li>
                                                            @{{ part.title }} |
                                                            <a href="#" @click.prevent="removePart(course_idx, part_idx)">
                                                                <i class="la la-trash" style="color: #9d223c;"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!--end: Wizard Step 3-->
                                <!--begin: Wizard Step 4-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Define {{config('library.chapter.en')}}</h4>
                                    <div class="from-group row">
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.course.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-model="course_index">
                                                    <option v-for="(i,index) in courses" :value="index">@{{ i.title }}</option>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.course.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.part.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-model="part_index">
                                                    <optgroup v-if="course_index == course_idx" v-for="(course, course_idx) in courses" :label="course.title">
                                                        <option v-for="(part, part_idx) in course.parts" :value="part_idx">@{{ part.title }}</option>
                                                    </optgroup>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.part.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.chapter.en')}} Title</label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" v-model="chapter_title" placeholder="{{config('library.chapter.en')}}">
                                                <span class="form-text text-muted">Please enter {{config('library.chapter.en')}} title.</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <button @click.prevent="addChapter" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 float-right">Attach</button>
                                            </div>
                                            <!--end::Input-->

                                            <ul>
                                                <li v-for="(course, course_idx) in courses">
                                                    @{{ course.title }}
                                                    <ul v-for="(part, part_idx) in course.parts">
                                                        @{{ part.title }}
                                                        <ul v-for="(chapter, chapter_idx) in part.chapters">
                                                            <li>@{{ chapter.title }} |
                                                                <a href="#" @click.prevent="removeChapter(course_idx, part_idx, chapter_idx)">
                                                                    <i class="la la-trash" style="color: #9d223c;"></i>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!--end: Wizard Step 4-->
                                <!--begin: Wizard Step 5-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Define {{config('library.topic.en')}}</h4>
                                    <div class="from-group row">
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.course.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-model="course_index">
                                                    <option v-for="(i,index) in courses" :value="index">@{{ i.title }}</option>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.course.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.part.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-model="part_index">
                                                    <optgroup v-if="course_index == course_idx" v-for="(course, course_idx) in courses" :label="course.title">
                                                        <option v-for="(part, part_idx) in course.parts" :value="part_idx">@{{ part.title }}</option>
                                                    </optgroup>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.part.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.chapter.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-if="course_index == course_idx"  v-for="(course, course_idx) in courses" v-model="chapter_index">
                                                    <optgroup v-if="part_index == part_idx" v-for="(part, part_idx) in course.parts" :label="part.title">
                                                            <option v-for="(chapter, chapter_idx) in part.chapters" :value="chapter_idx">@{{ chapter.title }}</option>
                                                    </optgroup>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.chapter.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.topic.en')}} Title</label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" v-model="topic_title" placeholder="{{config('library.topic.en')}} ..">
                                                <span class="form-text text-muted">Please enter {{config('library.topic.en')}} title.</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <button @click.prevent="addTopic" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 float-right">Attach</button>
                                            </div>
                                            <!--end::Input-->

                                            <ul>
                                                <li v-for="course, course_idx in courses">
                                                    @{{ course.title }}
                                                    <ul>
                                                        <li v-for="(part, part_idx) in course.parts">
                                                            @{{ part.title }}
                                                            <ul>
                                                                <li v-for="(chapter, chapter_idx) in part.chapters">
                                                                    @{{ chapter.title }}
                                                                    <ul>
                                                                        <li v-for="topic,topic_idx in chapter.topics">
                                                                            @{{ topic.title }} |
                                                                            <a href="#" @click.prevent="removeTopic(course_idx, part_idx, chapter_idx, topic_idx)">
                                                                                <i class="la la-trash" style="color: #9d223c;"></i>
                                                                            </a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!--end: Wizard Step 5-->
                                <!--begin: Wizard Step 6-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <h4 class="mb-10 font-weight-bold text-dark">Define {{config('library.skill.en')}}</h4>
                                    <div class="from-group row">
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.course.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-model="course_index">
                                                    <option v-for="(i,index) in courses" :value="index">@{{ i.title }}</option>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.course.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.part.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-model="part_index">
                                                    <optgroup v-if="course_index == course_idx" v-for="(course, course_idx) in courses" :label="course.title">
                                                        <option v-for="(part, part_idx) in course.parts" :value="part_idx">@{{ part.title }}</option>
                                                    </optgroup>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.part.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.chapter.en')}}</label>
                                                <select class="form-control form-control-solid form-control-lg" v-if="course_index == course_idx"  v-for="(course, course_idx) in courses" v-model="chapter_index">
                                                    <optgroup v-if="part_index == part_idx" v-for="(part, part_idx) in course.parts" :label="part.title">
                                                        <option v-for="(chapter, chapter_idx) in part.chapters" :value="chapter_idx">@{{ chapter.title }}</option>
                                                    </optgroup>
                                                </select>
                                                <span class="form-text text-muted">Please select {{config('library.chapter.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.topic.en')}}</label>
                                                <div v-for="(course, course_idx) in courses" v-if="course_index == course_idx">
                                                    <select class="form-control form-control-solid form-control-lg" v-if="part_index == part_idx" v-for="(part, part_idx) in course.parts" v-model="topic_index">
                                                        <optgroup v-for="(chapter, chapter_idx) in part.chapters" v-if="chapter_idx == chapter_index" :label="chapter.title">
                                                            <option v-for="(topic, topic_idx) in chapter.topics" :value="topic_idx">@{{ topic.title }}</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <span class="form-text text-muted">Please select {{config('library.chapter.en')}}.</span>
                                                <div class="fv-plugins-message-container"></div>
                                            </div>
                                        </div>

                                        <div class="col-xl-12">
                                            <!--begin::Input-->
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>{{config('library.skill.en')}} Title</label>
                                                <input type="text" class="form-control form-control-solid form-control-lg" v-model="skill_title" placeholder="{{config('library.skill.en')}} ..">
                                                <span class="form-text text-muted">Please enter {{config('library.skill.en')}} title.</span>
                                                <div class="fv-plugins-message-container"></div>
                                                <button @click.prevent="addSkill" class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4 float-right">Attach</button>
                                            </div>
                                            <!--end::Input-->

                                            <ul>
                                                <li v-for="course, course_idx in courses">
                                                    @{{ course.title }}
                                                    <ul>
                                                        <li v-for="(part, part_idx) in course.parts">
                                                            @{{ part.title }}
                                                            <ul>
                                                                <li v-for="(chapter, chapter_idx) in part.chapters">
                                                                    @{{ chapter.title }}
                                                                    <ul>
                                                                        <li v-for="topic,topic_idx in chapter.topics">
                                                                            @{{ topic.title }}
                                                                            <ul>
                                                                                <li v-for="(skill, skill_idx) in topic.skills">
                                                                                    @{{ skill.title }} |
                                                                                    <a href="#" @click.prevent="removeSkill(course_idx, part_idx, chapter_idx, topic_idx, skill_idx)">
                                                                                        <i class="la la-trash" style="color: #9d223c;"></i>
                                                                                    </a>
                                                                                </li>
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <!--end: Wizard Step 6-->
                                <!--begin: Wizard Step 7-->
                                <div class="pb-5" data-wizard-type="step-content">
                                    <!--begin::Section-->
                                    <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                                    <ul>
                                        <li v-for="course, course_idx in courses">
                                            @{{ course.title }}
                                            <ul>
                                                <li v-for="(part, part_idx) in course.parts">
                                                    @{{ part.title }}
                                                    <ul>
                                                        <li v-for="(chapter, chapter_idx) in part.chapters">
                                                            @{{ chapter.title }}
                                                            <ul>
                                                                <li v-for="topic,topic_idx in chapter.topics">
                                                                    @{{ topic.title }}
                                                                    <ul>
                                                                        <li v-for="(skill, skill_idx) in topic.skills">
                                                                            @{{ skill.title }}
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!--end: Wizard Step 7-->

                                <!--begin: Wizard Actions-->
                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" @click.prevent="store" data-wizard-type="action-submit">Submit</button>
                                        <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Next Step</button>
                                    </div>
                                </div>
                                <!--end: Wizard Actions-->
                                <div></div><div></div><div></div><div></div><div></div></form>
                        </div>
                        <!--end: Wizard-->
                    </div>
                </div>
                <!--end: Wizard Body-->
            </div>
            <!--end: Wizard-->
        </div>
    </div>
@endsection


@section('jscode')
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>

        var KTWizard2 = function () {
            // Base elements
            var _wizardEl;
            var _formEl;
            var _wizard;
            var _validations = [];

            var app = new Vue({
                el: '#app-1',
                data: {
                    path_title: '',
                    country_id: '',
                    course_title: '',
                    part_title: '',
                    chapter_title: '',
                    topic_title: '',
                    skill_title: '',

                    courses: [],
                    course_index: '',
                    part_index: '',
                    chapter_index: '',
                    topic_index: '',

                },
                methods: {
                    store: function(){
                        KTApp.blockPage();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}',
                            }
                        });

                        $.ajax ({
                            type: 'POST',
                            data: {
                                path_title: app.path_title,
                                courses: app.courses,
                                country_id: app.country_id,
                            },
                            url: '{{ route('library.store')}}',
                            success: function(res){

                                KTApp.unblockPage();

                                if(res.error){
                                    swal(res.error);
                                    return;
                                }

                                swal({
                                    text: '{{config('library.path.en')}} setup completed.',
                                    type: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, thank you",
                                    confirmButtonClass: "btn font-weight-bold btn-light"
                                }).then(function () {
                                    window.location.href = '{{route('library.index')}}';
                                });
                            },
                            error: function(err){
                                console.log(err);
                                KTApp.unblockPage();
                                swal({
                                    text: err,
                                    type: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    confirmButtonClass: "btn font-weight-bold btn-light"
                                }).then(function () {
                                    KTApp.scrollTop();
                                });
                            }
                        });

                    },
                    removeSkill: function(course_index, part_index, chapter_index, topic_index, skill_index){
                        this.courses[course_index]
                            .parts[part_index]
                            .chapters[chapter_index]
                            .topics[topic_index]
                            .skills.splice(skill_index, 1);
                    },
                    removeTopic: function(course_index, part_index, chapter_index, topic_index){
                        this.courses[course_index]
                            .parts[part_index]
                            .chapters[chapter_index]
                            .topics.splice(topic_index, 1);
                    },
                    removeChapter: function(course_index, part_index, chapter_index){
                        this.courses[course_index]
                            .parts[part_index]
                            .chapters.splice(chapter_index, 1);
                    },
                    removePart: function(course_index, part_index){
                        this.courses[course_index]
                            .parts.splice(part_index, 1);
                    },
                    removeCourse: function(course_index){
                        this.courses.splice(course_index, 1);
                    },
                    addSkill: function(){
                        if(this.is_empty(this.course_index, 'Course is required !')){
                            return;
                        }
                        if(this.is_empty(this.part_index, 'Part is required !')){
                            return;
                        }
                        if(this.is_empty(this.chapter_index, 'chapter is required !')){
                            return;
                        }
                        if(this.is_empty(this.topic_index, 'topic is required !')){
                            return;
                        }
                        if(this.is_empty(this.skill_title, 'skill title is required !')){
                            return;
                        }
                        this.courses[this.course_index].parts[this.part_index].chapters[this.chapter_index]
                            .topics[this.topic_index].skills.push({
                            title: this.skill_title,
                        });
                        this.skill_title = '';
                    },
                    addTopic: function(){
                        if(this.is_empty(this.course_index, 'Course is required !')){
                            return;
                        }
                        if(this.is_empty(this.part_index, 'Part is required !')){
                            return;
                        }
                        if(this.is_empty(this.chapter_index, 'chapter is required !')){
                            return;
                        }
                        if(this.is_empty(this.topic_title, 'topic title is required !')){
                            return;
                        }

                        this.courses[this.course_index].parts[this.part_index].chapters[this.chapter_index].topics.push({
                            title: this.topic_title,
                            skills: [],
                        });
                        this.topic_title = '';

                    },
                    addChapter: function(){
                        if(this.is_empty(this.course_index, 'Course is required !')){
                            return;
                        }
                        if(this.is_empty(this.part_index, 'Part is required !')){
                            return;
                        }
                        if(this.is_empty(this.chapter_title, 'chapter title is required !')){
                            return;
                        }

                        this.courses[this.course_index].parts[this.part_index].chapters.push({
                            title: this.chapter_title,
                            topics: []
                        });
                        this.chapter_title = '';
                    },
                    addPart: function(){
                        if(this.is_empty(this.course_index, 'Course is required !')){
                            return;
                        }
                        if(this.is_empty(this.part_title, 'Part title is required !')){
                            return;
                        }
                        this.courses[this.course_index].parts.push({
                            title: this.part_title,
                            chapters: [],
                        });
                        this.part_title = '';
                    },
                    addCourse: function(){
                        if(this.is_empty(this.course_title, 'Course title is required !')){
                            return;
                        }
                        this.courses.push({
                            title: this.course_title,
                            parts: [],
                        });
                        this.course_title = '';
                    },
                    is_empty: function(val, err){
                        if(val === '' || val === null){
                            swal({
                                text: err,
                                type: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            }).then(function () {
                                KTUtil.scrollTop();
                            });
                            return true;
                        }
                        return false;

                    },
                },
            });

            // Private functions
            var initWizard = function () {
                // Initialize form wizard
                _wizard = new KTWizard(_wizardEl, {
                    startStep: 1, // initial active step number
                    clickableSteps: true // to make steps clickable this set value true and add data-wizard-clickable="true" in HTML for class="wizard" element
                });

                // Validation before going to next page
                _wizard.on('beforeNext', function (wizard) {
                    console.log('lol');
                    _validations[wizard.getStep() - 1].validate().then(function (status) {
                        if (status == 'Valid') {
                            _wizard.goNext();
                            KTUtil.scrollTop();
                        } else {
                            swal({
                                text: "Sorry, looks like there are some errors detected, please try again.",
                                type: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            }).then(function () {
                                KTUtil.scrollTop();
                            });
                        }
                    });

                    _wizard.stop();  // Don't go to the next step
                });

                // Change event
                _wizard.on('change', function (wizard) {
                    KTUtil.scrollTop();
                });
            }

            var initValidation = function () {
                // Step 1
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {
                            /** Step 1 */
                            path_title: {
                                validators: {
                                    notEmpty: {
                                        message: '{{config('library.path.en')}} Title is required.'
                                    }
                                }
                            },
                            country: {
                                validators: {
                                    notEmpty: {
                                        message: 'Please Select a country !',
                                    }
                                }
                            }
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));

                // Step 2
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));

                // Step 3
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));

                // Step 4
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));

                // Step 5
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));

                // Step 6
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));
                // Step 7
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {

                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            bootstrap: new FormValidation.plugins.Bootstrap()
                        }
                    }
                ));
            }

            return {
                // public functions
                init: function () {
                    _wizardEl = KTUtil.getById('kt_wizard_v2');
                    _formEl = KTUtil.getById('kt_form');

                    initValidation();
                    initWizard();

                },
                app
            };
        }();

        jQuery(document).ready(function () {
            KTWizard2.init();
        });
    </script>
@endsection
