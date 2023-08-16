@extends('layouts.super-admin-layout')
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
                <a href="#" class="text-muted">All Course</a>
            </li>
        </ul>
        <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <a href="{{route('library.create')}}" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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
    </span>Add New Course</a>
@endsection

@section('content')
    <div class="row" id="app-1">
        @foreach($CountryPaths as $paths)
        <div class="col-12">
            <div class="card card-custom mt-5">
                <div class="card-body">
                    <h2>{{ $paths->first()->country ?? '--' }}</h2>
                    <table class="table table-bordered table-hover table-checkable" id="kt_datatable1" style="margin-top: 13px !important">

                        <thead>
                        <tr>
                            <td>#</td>
                            <td>Course Title</td>
                            <td>Show</td>
                            <td>Edit</td>
                            <td>Delete</td>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($paths as $path)
                                <tr>
                                    <td>{{$path->id}}</td>
                                    <td>{{$path->title}}</td>
                                    <td>
                                        <button class="btn btn-outline-info" @click="getPath('{{$path->id}}')">
                                            <i class="fa fa-eye"></i> Show
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-warning" onclick="window.location.href='{{route('library.edit', $path->id)}}'">
                                            <i class="fa fa-edit"></i> Edit
                                        </button>
                                    </td>
                                    <td>
                                        <button class="btn btn-outline-danger" onclick="AVUtil().deleteConfirmation('{{route('library.destroy', $path->id)}}', function(url){window.location.href = url;})">
                                            <i class="fa fa-trash"></i> Delete
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
        <div class="modal fade" id="pathView" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{config('library.path.en')}}: @{{ path_title }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i aria-hidden="true" class="ki ki-close"></i>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 300px;">
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
                                                                <ul>
                                                                    <li v-for="(level, level_idx) in skill.levels">
                                                                        @{{ level.title }}
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
                            </li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
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
        app = new Vue({
            el: '#app-1',
            data: {
                path_title: '',
                courses: [],
            },
            mounted() {
                //
            },
            methods: {
                getPath: function(path_id){
                    KTApp.blockPage();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        }
                    });

                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('library.show', '')}}/' + path_id,
                        success: function (res) {
                            app.courses = res.courses;
                            app.path_title = res.title;
                            $('#pathView').modal('show');
                            console.log(res);
                            KTApp.unblockPage();
                        },
                        error: function(err){console.log('Error:', err);}
                    });

                },

            }
        });
    </script>
@endsection
