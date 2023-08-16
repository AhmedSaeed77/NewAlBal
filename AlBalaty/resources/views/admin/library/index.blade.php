@extends('layouts.admin-layout')
@section('pageTitle') Library @endsection
@section('subheaderTitle')
        <!--begin::Page Title-->
        <h2 class="subheader-title text-dark font-weight-bold mr-3">
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
                <a href="{{route('admin.dashboard')}}" class="text-muted">Dashboard</a>
            </li>
            <li class="breadcrumb-item">
                <a href="#" class="text-muted">Library</a>
            </li>
        </ul>
        <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
{{--    <a href="#" onclick="app.AddTag()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">--}}
{{--    <span class="svg-icon svg-icon-success svg-icon-lg">--}}
{{--        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->--}}
{{--        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">--}}
{{--            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">--}}
{{--                <polygon points="0 0 24 0 24 24 0 24"></polygon>--}}
{{--                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>--}}
{{--                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>--}}
{{--            </g>--}}
{{--        </svg>--}}
{{--        <!--end::Svg Icon-->--}}
{{--    </span>Add New {{config('library.tag.en')}}</a>--}}
    <a href="#" onclick="app.AddExam()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24"></polygon>
                <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"></path>
                <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"></path>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Add New {{config('library.exam.en')}}</a>
@endsection

@section('content')
    <div class="row" id="app-1">

        <div class="col-12">
            <div class="card card-custom mt-5">
                <div class="card-body">
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Exam Name</td>
                            <td>Exam Duration</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        </thead>

                        <tbody>


                        <tr v-for="i in exams">
                            <td>@{{i.id}}</td>
                            <td>@{{i.name}}</td>
                            <td>@{{i.duration_minutes}} Mins</td>
                            <td>
                                <button class="btn btn-outline-warning" @click="EditExam(i.id)">
                                    <i class="fa fa-edit"></i> Edit
                                </button>
                            </td>
                            <td>
                                <button class="btn btn-outline-danger" @click="deleteExam(i.id)">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
                            </td>
                        </tr>



                        </tbody>

                    </table>
                </div>
            </div>
        </div>

{{--        <div class="col-12">--}}
{{--            <div class="card card-custom mt-5">--}}
{{--                <div class="card-body">--}}
{{--                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">--}}

{{--                        <thead>--}}
{{--                        <tr>--}}
{{--                            <td>#</td>--}}
{{--                            <td>{{config('library.tag.en')}} Title</td>--}}
{{--                            <td>Edit</td>--}}
{{--                            <td>Delete</td>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}

{{--                        <tbody>--}}


{{--                        <tr v-for="i in tags">--}}
{{--                            <td>@{{i.id}}</td>--}}
{{--                            <td>@{{i.title}}</td>--}}
{{--                            <td>--}}
{{--                                <button class="btn btn-outline-warning" @click="EditTag(i.id)">--}}
{{--                                    <i class="fa fa-edit"></i> Edit--}}
{{--                                </button>--}}
{{--                            </td>--}}
{{--                            <td>--}}
{{--                                <button class="btn btn-outline-danger" @click="deleteTag(i.id)">--}}
{{--                                    <i class="fa fa-trash"></i> Delete--}}
{{--                                </button>--}}
{{--                            </td>--}}
{{--                        </tr>--}}



{{--                        </tbody>--}}

{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>
@endsection


@section('jscode')
    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>
        app = new Vue({
            el: '#app-1',
            data: {
                exams: [],
                tags: [],
            },
            mounted() {
                this.getExams();
                this.getTags();
            },
            methods: {
                EditTag: function(id){
                    Swal.fire({
                        title: 'Enter New Tag Title',
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Update',
                        showLoaderOnConfirm: true,
                        preConfirm:(value) => {
                            return fetch('{{route('library.tag.update', '')}}/'+ id, {
                                method: 'POST',
                                headers: {
                                    "Content-Type": "application/json",
                                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                                },
                                body: JSON.stringify({
                                    value,
                                }),
                            })
                                .then(response => {
                                    if (!response.ok) {
                                        // make the promise be rejected if we didn't get a 2xx response
                                        console.log(response);
                                        throw new Error(`${response.statusText}`)
                                    } else {
                                        return response.json();
                                    }
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(
                                        `Request failed: ${error}`
                                    )
                                });

                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if(result.dismiss == 'cancel'){
                            swal({
                                text: "Cancelled.",
                                type: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            });
                        }else{
                            swal({
                                text: "Updated.",
                                type: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            }).then(() => {
                                app.getTags();
                            });
                        }
                    })
                },
                deleteTag: function(id){
                    AVUtil().deleteConfirmation('{{route('library.tag.destroy', '')}}'+'/'+id, function(url){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}',
                            }
                        });
                        $.ajax ({
                            type: 'GET',
                            url,
                            success: function(){
                                window.location.reload();
                            }
                        });
                    })
                },
                AddTag: function(){
                    Swal.fire({
                        title: 'Enter New {{config('library.tag.en')}} Title',
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Add',
                        showLoaderOnConfirm: true,
                        preConfirm:(value) => {
                            return fetch('{{route('library.tag.store')}}', {
                                method: 'POST',
                                headers: {
                                    "Content-Type": "application/json",
                                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                                },
                                body: JSON.stringify({
                                    value,
                                }),
                            })
                                .then(response => {
                                    if (!response.ok) {
                                        // make the promise be rejected if we didn't get a 2xx response
                                        console.log(response);
                                        throw new Error(`${response.statusText}`)
                                    } else {
                                        return response.json();
                                    }
                                })
                                .catch(error => {
                                    Swal.showValidationMessage(
                                        `Request failed: ${error}`
                                    )
                                });

                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if(result.dismiss == 'cancel'){
                            swal({
                                text: "Cancelled.",
                                type: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            });
                        }else{
                            swal({
                                text: "Added.",
                                type: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            }).then(() => {
                                app.getTags();
                            });
                        }
                    })
                },
                getTags: function(){
                    KTApp.blockPage();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        }
                    });
                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('library.tag.index')}}',
                        success: function (res) {
                            app.tags = res;
                            KTApp.unblockPage();
                        },
                        error: function(err){console.log('Error:', err);}
                    });
                },
                EditExam: function(id){
                    Swal.fire({
                        title: 'Enter New Exam Title',
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Continue',
                        showLoaderOnConfirm: true,
                        preConfirm:(ExamTitle) => {
                            Swal.fire({
                                title: 'Enter Exam Time in Minutes',
                                input: 'text',
                                inputAttributes: {
                                    autocapitalize: 'off'
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Update',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: () => !Swal.isLoading(),
                                preConfirm: (examDuration) => {
                                    return fetch('{{route('library.exam.update', '')}}/'+ id, {
                                        method: 'POST',
                                        headers: {
                                            "Content-Type": "application/json",
                                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                                        },
                                        body: JSON.stringify({
                                            exam_title: ExamTitle,
                                            duration_minutes: examDuration,
                                        }),
                                    })
                                        .then(response => {
                                            if (!response.ok) {
                                                // make the promise be rejected if we didn't get a 2xx response
                                                console.log(response);
                                                throw new Error(`${response.statusText}`)
                                            } else {
                                                return response.json();
                                            }
                                        })
                                        .catch(error => {
                                            Swal.showValidationMessage(
                                                `Request failed: ${error}`
                                            )
                                        });
                                }
                            }).then((result) => {
                                if(result.dismiss == 'cancel'){
                                    swal({
                                        text: "Cancelled.",
                                        type: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        confirmButtonClass: "btn font-weight-bold btn-light"
                                    });
                                }else{
                                    swal({
                                        text: "Updated.",
                                        type: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        confirmButtonClass: "btn font-weight-bold btn-light"
                                    }).then(() => {
                                        app.getExams();
                                    });
                                }
                            });


                        },
                        allowOutsideClick: () => !Swal.isLoading()
                    }).then((result) => {
                        if(result.dismiss == 'cancel'){
                            swal({
                                text: "Cancelled.",
                                type: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            });
                        }
                    })
                },
                deleteExam: function(id){
                    AVUtil().deleteConfirmation('{{route('library.exam.destroy', '')}}'+'/'+id, function(url){
                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': '{{csrf_token()}}',
                                }
                            });
                            $.ajax ({
                                type: 'GET',
                                url,
                                success: function(){
                                    window.location.reload();
                                }
                            });
                    })
                },
                AddExam: function(){
                    Swal.fire({
                        title: 'Enter New Exam Title',
                        input: 'text',
                        inputAttributes: {
                            autocapitalize: 'off'
                        },
                        showCancelButton: true,
                        confirmButtonText: 'Continue',
                        showLoaderOnConfirm: true,
                        allowOutsideClick: () => !Swal.isLoading(),
                        preConfirm:(ExamTitle) => {
                            Swal.fire({
                                title: 'Enter Exam Time in Minutes',
                                input: 'text',
                                inputAttributes: {
                                    autocapitalize: 'off'
                                },
                                showCancelButton: true,
                                confirmButtonText: 'Create',
                                showLoaderOnConfirm: true,
                                allowOutsideClick: () => !Swal.isLoading(),
                                preConfirm: (examDuration) => {
                                    return fetch('{{route('library.exam.store')}}', {
                                        method: 'POST',
                                        headers: {
                                            "Content-Type": "application/json",
                                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                                        },
                                        body: JSON.stringify({
                                            exam_title: ExamTitle,
                                            duration_minutes: examDuration,
                                        }),
                                    })
                                        .then(response => {
                                            if (!response.ok) {
                                                // make the promise be rejected if we didn't get a 2xx response
                                                console.log(response);
                                                throw new Error(`${response.statusText}`)
                                            } else {
                                                return response.json();

                                            }
                                        })
                                        .catch(error => {
                                            Swal.showValidationMessage(
                                                `Request failed: ${error}`
                                            )
                                        });

                                }
                            }).then((result) => {
                                if(result.dismiss == 'cancel'){
                                    swal({
                                        text: "Cancelled.",
                                        type: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        confirmButtonClass: "btn font-weight-bold btn-light"
                                    });
                                }else{
                                    swal({
                                        text: "Added.",
                                        type: "success",
                                        buttonsStyling: false,
                                        confirmButtonText: "Ok, got it!",
                                        confirmButtonClass: "btn font-weight-bold btn-light"
                                    }).then(() => {
                                        app.getExams();
                                    });
                                }
                            });

                        },
                    }).then((result) => {
                        if(result.dismiss == 'cancel'){
                            swal({
                                text: "Cancelled.",
                                type: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                confirmButtonClass: "btn font-weight-bold btn-light"
                            });
                        }
                    })
                },
                getExams: function(){
                    KTApp.blockPage();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        }
                    });
                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('library.exam.index')}}',
                        success: function (res) {
                            console.log(res);
                            app.exams = res;
                            KTApp.unblockPage();
                        },
                        error: function(err){console.log('Error:', err);}
                    });
                },

            }
        });
    </script>
@endsection
