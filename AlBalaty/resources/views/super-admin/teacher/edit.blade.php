@extends('layouts.super-admin-layout')
@section('header')
    <link href="{{asset('assets-admin/css/pages/wizard/wizard-1.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('pageTitle') Teacher @endsection
@section('subheaderTitle')
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="card-icon">
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <path d="M6.182345,4.09500888 C6.73256296,3.42637697 7.56648864,3 8.5,3 L15.5,3 C16.4330994,3 17.266701,3.42600075 17.8169264,4.09412386 C17.8385143,4.10460774 17.8598828,4.11593789 17.8809917,4.1281251 L22.5900048,6.8468751 C23.0682974,7.12301748 23.2321726,7.73460788 22.9560302,8.21290051 L21.2997802,11.0816097 C21.0236378,11.5599023 20.4120474,11.7237774 19.9337548,11.4476351 L18.5,10.6198563 L18.5,19 C18.5,19.5522847 18.0522847,20 17.5,20 L6.5,20 C5.94771525,20 5.5,19.5522847 5.5,19 L5.5,10.6204852 L4.0673344,11.4476351 C3.58904177,11.7237774 2.97745137,11.5599023 2.70130899,11.0816097 L1.04505899,8.21290051 C0.768916618,7.73460788 0.932791773,7.12301748 1.4110844,6.8468751 L6.12009753,4.1281251 C6.14061376,4.11628005 6.16137525,4.10524462 6.182345,4.09500888 Z" fill="#000000" opacity="0.3"/>
                    <path d="M9.85156673,3.2226499 L9.26236944,4.10644584 C9.11517039,4.32724441 9.1661011,4.62457583 9.37839459,4.78379594 L11,6 L10.0353553,12.7525126 C10.0130986,12.9083095 10.0654932,13.0654932 10.1767767,13.1767767 L11.6464466,14.6464466 C11.8417088,14.8417088 12.1582912,14.8417088 12.3535534,14.6464466 L13.8232233,13.1767767 C13.9345068,13.0654932 13.9869014,12.9083095 13.9646447,12.7525126 L13,6 L14.6216054,4.78379594 C14.8338989,4.62457583 14.8848296,4.32724441 14.7376306,4.10644584 L14.1484333,3.2226499 C14.0557004,3.08355057 13.8995847,3 13.7324081,3 L10.2675919,3 C10.1004153,3 9.94429962,3.08355057 9.85156673,3.2226499 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
        <h3 class="card-label pr-2">Teacher Manager </h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="{{route('super-admin.dashboard')}}" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">Edit Teacher</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('teacher.create')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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
    </span>Add New Teacher</a>
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('teacher.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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
    </span>All Teachers</a>
@endsection

@section('content')
    <div class="row" id="app-1">
        <div class="col-md-12">
            <div class="card card-custom">
                <div class="card-body p-0">
                    <!--begin::Wizard-->
                    <div class="wizard wizard-1" id="kt_wizard" data-wizard-state="first" data-wizard-clickable="false">
                        <!--begin::Wizard Nav-->
                        <div class="wizard-nav border-bottom">
                            <div class="wizard-steps p-8 p-lg-10">
                                <!--begin::Wizard Step 1 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                    <div class="wizard-label">
                                        <i class="wizard-icon flaticon-list"></i>
                                        <h3 class="wizard-title">1. General</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Wizard Step 1 Nav-->
                                <!--begin::Wizard Step 2 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-label">
                                        <i class="wizard-icon flaticon-user"></i>
                                        <h3 class="wizard-title">2. Permissions</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Wizard Step 2 Nav-->
                                <!--begin::Wizard Step 3 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-label">
                                        <i class="wizard-icon flaticon-book"></i>
                                        <h3 class="wizard-title">3. Scoop</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Wizard Step 3 Nav-->
                                <!--begin::Wizard Step 4 Nav-->
                                <div class="wizard-step" data-wizard-type="step" data-wizard-state="pending">
                                    <div class="wizard-label">
                                        <i class="wizard-icon flaticon-list"></i>
                                        <h3 class="wizard-title">4. Review</h3>
                                    </div>
                                    <span class="svg-icon svg-icon-xl wizard-arrow">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                                <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1"></rect>
                                                <path d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)"></path>
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>
                                </div>
                                <!--end::Wizard Step 4 Nav-->
                            </div>
                        </div>
                        <!--end::Wizard Nav-->
                        <!--begin::Wizard Body-->
                        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin::Wizard Form-->
                                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_form" method="POST" action="{{route('teacher.update', $admin_id)}}">

                                    <!--begin::Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h3 class="mb-10 font-weight-bold text-dark">Setup Teacher Information</h3>
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>Full Name</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" name="name" placeholder="Teacher Full Name" v-model="name">
                                            <span class="form-text text-muted">Please enter Full Name.</span>
                                            <div class="fv-plugins-message-container"></div></div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group fv-plugins-icon-container">
                                            <label>E-Mail</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" name="email" placeholder="email" v-model="email">
                                            <span class="form-text text-muted">Please enter Email</span>
                                            <div class="fv-plugins-message-container"></div></div>
                                        <!--end::Input-->
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Phone No.</label>
                                            <input type="text" class="form-control form-control-solid form-control-lg" name="phone" placeholder="Phone Number" v-model="phone">
                                            <span class="form-text text-muted">Please phone number.</span>
                                        </div>
                                        <!--end::Input-->
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Gender</label>
                                                    <select name="gender" class="form-control form-control-solid form-control-lg" placeholder="Gender" v-model="gender">
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                    <span class="form-text text-muted">Please select gender</span>
                                                    <div class="fv-plugins-message-container"></div></div>
                                            </div>
                                            <div class="col-xl-6">
                                                <!--begin::Select-->
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Country</label>
                                                    <select name="country" class="form-control form-control-solid form-control-lg" v-model="country">
                                                        <option value="">Select</option>
                                                        @foreach(\App\Country::all() as $country)
                                                            <option value="{{$country->code}}">{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <div class="fv-plugins-message-container"></div></div>
                                                <!--end::Select-->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <div class="form-group fv-plugins-icon-container">
                                                    <label>Change Account Password</label>
                                                    <input type="password" class="form-control form-control-solid form-control-lg" name="password" placeholder="Change Password">
                                                    <span class="form-text text-muted">You Can Change Password by entering new password here.</span>
                                                    <div class="fv-plugins-message-container"></div></div>
                                            </div>
                                        </div>

                                    </div>
                                    <!--end::Wizard Step 1-->

                                    <!--begin::Wizard Step 2-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Setup Permissions</h4>
                                        <div class="form-group">
                                            <label>@lang('NewUser.Management')</label>
                                            <select class="form-control" v-on:change="UpdatePermissionTable" v-model="current_management">
                                                <option value="0" selected >Select Role</option>
                                                <option v-for="i in management_arr" v-bind:value="i.id">@{{ i.name }}</option>
                                            </select>
                                            <span class="form-text text-muted">Please enter your Management.</span>
                                        </div>
                                        <hr>
                                        <div class="kt-portlet__body">

                                            <!--begin: Datatable -->
                                            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                                                <thead>
                                                <tr>
                                                    <th>Management</th>
                                                    <th>Page</th>
                                                    <th>Permission</th>
                                                </tr>
                                                </thead>
                                                <tbody id="PagesTableBody">
                                                </tbody>
                                            </table>

                                            <!--end: Datatable -->
                                        </div>
                                    </div>
                                    <!--end::Wizard Step 2-->

                                    <!--begin::Wizard Step 3-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Scoop of work</h4>
                                        <!--begin::Select-->
                                        <div class="kt-wizard-v4__review-item">
                                            <div class="kt-wizard-v4__review-content">
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.path.en')}}</label>
                                                    <div class="col-10">
                                                        <select class="form-control" id="exampleSelectd1" v-on:change="getCourses" v-model="path_id">
                                                            <option v-for="i in paths" :value="i.id">@{{ i.title }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.course.en')}}</label>
                                                    <div class="col-10">
                                                        <select class="form-control" v-on:change="getParts" id="exampleSelectd1" v-model="course_id">
                                                            <option v-for="i in courses" :value="i.id">@{{ i.title }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.part.en')}}</label>
                                                    <div class="col-10">
                                                        <select class="form-control" id="exampleSelectd1" v-model="part_id">
                                                            <option v-for="i in parts" :value="i.id">@{{ i.title }}</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-1 offset-11">
                                                        <button class="btn btn-primary" @click.prevent="attachScoop">Add</button>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <table class="table">
                                                        <thead>
                                                        <tr>
                                                            <td>{{config('library.path.en')}}</td>
                                                            <td>{{config('library.course.en')}}</td>
                                                            <td>{{config('library.part.en')}}</td>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr v-for="i, idx in teacher_courses">
                                                            <td>@{{ i.path_title }}</td>
                                                            <td>@{{ i.course_title }}</td>
                                                            <td>@{{ i.part_title }}</td>
                                                            <td>
                                                                <a href="#" @click.prevent="removeScoop(idx)">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>

                                        </div>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Wizard Step 3-->

                                    <!--begin::Wizard Step 4-->
                                    <div class="pb-5" data-wizard-type="step-content">
                                        <h4 class="mb-10 font-weight-bold text-dark">Review Permissions & Submit</h4>
                                        <!--begin::Select-->
                                        <div class="kt-wizard-v4__review-item" v-for="i in Permissions">
                                            <div class="kt-wizard-v4__review-title">
                                                @{{ i.management }}
                                            </div>
                                            <div class="kt-wizard-v4__review-content">
                                                <ul>
                                                    <li><strong>Page</strong>: @{{ i.page }}</li>
                                                    <li><strong>Permission</strong>: @{{ Permission[i.permission-1] }}</li>
                                                </ul>
                                            </div>

                                        </div>
                                        <!--end::Select-->
                                    </div>
                                    <!--end::Wizard Step 4-->

                                    <!--begin::Wizard Actions-->
                                    <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                        <div class="mr-2">
                                            <button type="button" class="btn btn-light-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                        </div>
                                        <div>
                                            <button type="button" class="btn btn-success font-weight-bolder text-uppercase px-9 py-4" id="submitForm" data-wizard-type="action-submit">Submit</button>
                                            <button type="button" class="btn btn-primary font-weight-bolder text-uppercase px-9 py-4" data-wizard-type="action-next">Next</button>
                                        </div>
                                    </div>
                                    <!--end::Wizard Actions-->

                                    <div></div><div></div><div></div><div></div></form>
                                <!--end::Wizard Form-->
                            </div>
                        </div>
                        <!--end::Wizard Body-->
                    </div>
                    <!--end::Wizard-->
                </div>
                <!--end::Wizard-->
            </div>
        </div>
    </div>
@endsection


@section('jscode')
    <script src="{{asset('helper/js/jquery.form.js')}}"></script>
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>
        // Class definition
        var KTWizard1 = function () {
            // Base elements
            var _wizardEl;
            var _formEl;
            var _wizardObj;
            var _validations = [];

            var app = new Vue({
                el: '#app-1',
                data: {
                    name: '{{$teacher->name}}',
                    phone: '{{$teacher->phone}}',
                    email: '{{$teacher->email}}',
                    country: '{{$teacher->country}}',
                    gender: '{{$teacher->gender}}',

                    management_id: 0,
                    management_arr: [], // use to display in step 2

                    // hold current selected management data to display in table
                    current_management: 0,
                    current_management_pages: [],
                    // hold data about pages permissions
                    // Permissions: [
                    //     {
                    //         'page': '',
                    //         'page_id': '',
                    //         management_id: '',
                    //         permission: '',
                    //
                    //     },
                    // ],
                    Permission:[
                        @foreach(\App\Models\Auth\Permission::all() as $p)
                            '{{$p->title}}',
                        @endforeach
                    ],
                    Permissions: [],
                    paths: [],
                    path_id: '',
                    courses: [],
                    course_id: '',
                    parts: [],
                    part_id: '',
                    teacher_courses: [],
                },
                created(){
                    $('.bootstrap-select').selectpicker();
                },
                async mounted(){
                    KTApp.blockPage();
                    await this.getManagements();
                    await this.loaderPermissions();
                    this.getPaths();
                    KTApp.unblockPage();
                },
                methods: {
                    loaderPermissions:async function(){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });
                        return $.ajax ({
                            type: 'POST',
                            url: '{{ route('get.teacher.permissions')}}',
                            data: {
                                teacher_id: '{{$admin_id}}',
                            },
                            success: function(res){
                                console.log(res);
                                app.Permissions = res.permissions;
                                app.teacher_courses = res.teacher_scoops;
                            },
                            error: function(res){
                                console.log('Error:', res);

                            }
                        });
                    },
                    GenerateTableElement: function(management, management_id, page, page_id, selectedPermission){
                        selected_item0 = '';
                        selected_item1 = '';
                        selected_item2 = '';
                        selected_item3 = '';
                        selected_item4 = '';
                        // console.log(selectedPermission);
                        switch (selectedPermission) {
                            case 0:
                                selected_item0 = 'selected';
                                // console.log('selected 0');
                                break;

                            case '1':
                                selected_item1 = 'selected';
                                // console.log('selected 1');

                                break;

                            case '2':
                                selected_item2 = 'selected';
                                // console.log('selected 2');

                                break;

                            case '3':
                                selected_item3 = 'selected';
                                // console.log('selected 3');

                                break;
                            case '4':
                                selected_item4 = 'selected';
                                // console.log('selected 4');

                                break;


                        }




                        newEle = '<tr>' +
                            '<td>'+management+'</td>' +
                            '<td>'+page+'</td>' +
                            '<td>' +
                            '<select onchange="KTWizard1.add_page(\''+page_id+'\', \''+management_id+'\', \'permission'+page_id+'\', \''+page+'\', \''+management+'\')" id="permission'+page_id+'" name="permission'+page_id+'">' +
                            '<option value="0" '+selected_item0+'>None</option>' +
                            '<option value="1" '+selected_item1+'>Read</option>' +
                            '<option value="2" '+selected_item2+'>Add</option>' +
                            '<option value="3" '+selected_item3+'>Edit</option>' +
                            '<option value="4" '+selected_item4+'>Delete</option>' +
                            '</select>' +
                            '</td>' +
                            '</tr>';

                        return newEle;
                    },
                    UpdatePermissionTable: function(){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });
                        $.ajax ({
                            type: 'POST',
                            url: '{{ route('get.role.pages')}}',
                            data: {role_id: app.current_management},
                            success: function(res){
                                // console.log(app.Permissions);
                                app.current_management_pages = res;
                                tableBodyElement = $("#PagesTableBody");
                                /**
                                 *
                                 * Show User selected permission !
                                 *
                                 */
                                tableBodyElement.empty();
                                $.each(app.current_management_pages, function(index, val){
                                    permission = 0;
                                    $.each(app.Permissions, function(i, v){
                                        if(v.page_id == val.page_id){
                                            permission = v.permission;
                                        }
                                    });

                                    tableBodyElement.append(app.GenerateTableElement(val.management, val.management_id, val.page, val.page_id, permission));
                                });

                            },
                            error: function(res){
                                console.log('Error:', res);

                            }
                        });



                    },
                    UpdateCurrentManagement_title: function(){


                        $.each(app.management_arr, function(index, val){
                            if(val.id == app.management_id){
                                app.selected_management_title = val.name;
                            }
                        });

                    },
                    getManagements:async function(){

                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });
                        return $.ajax ({
                            type: 'POST',
                            url: '{{ route('get.roles')}}',
                            success: function(res) {
                                app.management_arr = res;
                            },
                            error: function(res){
                                console.log('Error:', res);
                            }
                        });

                    },
                    attachScoop: function(){
                        if(this.part_id){
                            if(!this.teacher_courses.filter(i => i.part_id == app.part_id)?.length)
                                this.teacher_courses.push({
                                    path_title: this.paths.filter(i => i.id == app.path_id)[0].title,
                                    path_id : this.path_id,
                                    course_title: this.courses.filter(i => i.id == app.course_id)[0].title,
                                    course_id: this.course_id,
                                    part_title: this.parts.filter(i => i.id == app.part_id)[0].title,
                                    part_id: this.part_id,
                                });
                        }
                    },
                    removeScoop: function(idx){
                        this.teacher_courses.splice(idx, 1);
                    },
                    getPaths:async function(){
                        this.paths = await this.fetchLibrary(null, 'path');
                    },
                    getCourses:async function(){
                        this.courses = await this.fetchLibrary(this.path_id, 'course');
                    },
                    getParts:async function(){
                        this.parts = await this.fetchLibrary(this.course_id, 'part');
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
                }
            });

            // Private functions
            var _initValidation = function () {
                // Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
                // Step 1
                _validations.push(FormValidation.formValidation(
                    _formEl,
                    {
                        fields: {
                            name: {
                                validators: {
                                    notEmpty: {
                                        message: 'Full Name is required'
                                    }
                                }
                            },
                            email: {
                                validators: {
                                    notEmpty: {
                                        message: 'Email is required'
                                    },
                                    emailAddress: {
                                        message: 'Not Valid Email !',
                                    }
                                }
                            },
                            phone: {
                                validators: {
                                    notEmpty: {
                                        message: 'Phone Number is required'
                                    },
                                    digits: {
                                        message: 'The value added is not valid'
                                    }
                                }
                            },
                            gender: {
                                validators: {
                                    notEmpty: {
                                        message: 'Gender is required'
                                    },
                                }
                            },
                            country: {
                                validators: {
                                    notEmpty: {
                                        message: 'Country is required'
                                    },
                                }
                            },
                        },
                        plugins: {
                            trigger: new FormValidation.plugins.Trigger(),
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
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
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
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
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
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
                            // Bootstrap Framework Integration
                            bootstrap: new FormValidation.plugins.Bootstrap({
                                //eleInvalidClass: '',
                                eleValidClass: '',
                            })
                        }
                    }
                ));
            }

            var _initWizard = function () {
                // Initialize form wizard
                _wizardObj = new KTWizard(_wizardEl, {
                    startStep: 1, // initial active step number
                    clickableSteps: true  // allow step clicking
                });

                _wizardObj.on('beforeNext', function (wizard) {
                    _validations[wizard.getStep() - 1].validate().then(function (status) {
                        if (status == 'Valid') {
                            _wizardObj.goNext();
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

                    _wizardObj.stop();  // Don't go to the next step
                });

                // Change event
                _wizardObj.on('changed', function (wizard) {
                    KTUtil.scrollTop();
                });

                _wizardObj.on('change', function(wizard){
                    if(wizard.currentStep == 3){
                    }
                });

            }

            var initSubmit = function() {
                var btn = $('#submitForm');
                var form = $('#kt_form');

                btn.on('click', function(e) {
                    e.preventDefault();
                    KTApp.blockPage();

                    form.ajaxSubmit({
                        success: function(res) {
                            console.log(res);

                            if(res.error != ''){
                                swal({
                                    text: res.error,
                                    type: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    confirmButtonClass: "btn font-weight-bold btn-light"
                                }).then(function () {
                                    KTUtil.scrollTop();
                                });
                                KTApp.unblockPage();
                                return;
                            }

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                                }
                            });
                            $.ajax({
                                url: "{{route('teacher.update', $admin_id)}}" ,
                                type: "POST",
                                data: {
                                    'permissions': app.Permissions,
                                    'StorePermissionFlag': 1,
                                    'teacher_id' : res.teacher_id,
                                    'teacher_courses' : app.teacher_courses,
                                },
                                success: function( res ) {
                                    console.log(res);
                                    KTApp.unblockPage();
                                    swal({
                                        title: 'Teacher Updated successfully.',
                                        type: 'success',
                                        confirmButtonText: 'Ok',
                                    }).then(function(){
                                        window.location.href = '{{route('teacher.index')}}';
                                    });

                                },
                                error: function(res){
                                    KTApp.unblockPage();
                                    console.log('Error:', res);
                                }
                            });

                        },
                        error: function(res){
                            KTApp.unblockPage();
                            console.log(res);
                        }
                    });


                });
            }

            return {
                // public functions
                init: function () {
                    _wizardEl = KTUtil.getById('kt_wizard');
                    _formEl = KTUtil.getById('kt_form');

                    _initValidation();
                    _initWizard();
                    initSubmit();
                },
                add_page: function(page_id, management_id, ele , page_name, management_name) {

                    selct = document.getElementById(ele);



                    // search Permission arr
                    indx = -1;
                    $.each(app.Permissions, function (index, value) {
                        if (value.page_id == page_id) {
                            indx = index;
                        }

                    });
                    if (indx == -1) {
                        // not exists
                        if(selct.value != 0){
                            var page = {
                                'page_id': page_id,
                                'management_id': management_id,
                                'element_id': ele,
                                'permission': selct.value,
                                'page': page_name,
                                'management': management_name,
                            };
                            app.Permissions.push(page);
                        }
                        // console.log('add: ' + page_id + 'permission: ' + page.permission);
                    } else {
                        // exists

                        // console.log('update: ' + page_id + 'permission: ' + app.Permissions[indx].permission);
                        if(selct.value != 0){
                            app.Permissions[indx].permission = selct.value;
                        }else{
                            app.Permissions.splice(indx, 1);
                        }
                    }
                },
                getApp: function(){
                    return app;
                }
            };
        }();

        jQuery(document).ready(function () {
            KTWizard1.init();
        });

    </script>
@endsection
