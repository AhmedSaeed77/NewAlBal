@extends('layouts.admin-layout')
@section('pageTitle') All Questions @endsection
@section('subheaderTitle')
    <!--begin::Page Title-->
    <h2 class="subheader-title text-dark font-weight-bold my-2 mr-3">
            <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Code\Question-circle.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                    <rect x="0" y="0" width="24" height="24"/>
                    <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                    <path d="M12,16 C12.5522847,16 13,16.4477153 13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 C11,16.4477153 11.4477153,16 12,16 Z M10.591,14.868 L10.591,13.209 L11.851,13.209 C13.447,13.209 14.602,11.991 14.602,10.395 C14.602,8.799 13.447,7.581 11.851,7.581 C10.234,7.581 9.121,8.799 9.121,10.395 L7.336,10.395 C7.336,7.875 9.31,5.922 11.851,5.922 C14.392,5.922 16.387,7.875 16.387,10.395 C16.387,12.915 14.392,14.868 11.851,14.868 L10.591,14.868 Z" fill="#000000"/>
                </g>
            </svg><!--end::Svg Icon--></span>
        <h3 class="card-label pr-2">Questions </h3>
    </h2>
    <!--end::Page Title-->
    <!--begin::Breadcrumb-->
    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold my-2 p-0">
        <li class="breadcrumb-item">
            <a href="{{route('admin.dashboard')}}" class="text-muted">Dashboard</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">Material</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#" class="text-muted">Questions</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <a href="{{route('question.create')}}" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
        </g>
    </svg><!--end::Svg Icon--></span>Add New Question</a>
@endsection
@section('content')

    <div class="row" id="app-1">
        <div class="col-md-12">

            <div class="card card-custom">
                <div class="card-header">
                    <div class="card-title">
                    <span class="card-icon">
                        <i class="icon-2x  text-primary flaticon-search"></i>
                    </span>
                        <h3 class="card-label">Search</h3>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['action'=>'\App\Http\Controllers\Admin\QuestionsController@index', 'method'=>'GET', 'class'=>'', 'style'=>'margin: 10px 0 20px 0;']) !!}
                    <div class="row">
                        <div class="form-group col-md-12" style="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>{{Form::label('word','Search :')}}</strong>
                                </div>
                                <div class="col-sm-10">
                                    {{Form::text('word', '', ['class' => 'form-control', 'placeholder'=>'Search'])}}
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>{{config('library.path.en')}}</strong>
                                </div>
                                <div class="col-sm-10">
                                    <select name="path_id" id="" class="form-control" v-on:change="getCourses" v-model="path_id">
                                        <option value=""></option>
                                        @foreach(\App\Models\Library\Path::all() as $i)
                                            <option value="{{$i->id}}">{{$i->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>{{config('library.course.en')}}</strong>
                                </div>
                                <div class="col-sm-10">
                                    <select name="course_id" id="" class="form-control" v-on:change="getParts" v-model="course_id">
                                        <option value=""></option>
                                        <option v-for="i in courses" :value="i.id">@{{ i.title }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>{{config('library.part.en')}}</strong>
                                </div>
                                <div class="col-sm-10">
                                    <select name="part_id" id="" class="form-control" v-on:change="getChapters" v-model="part_id">
                                        <option value=""></option>
                                        <option v-for="i in parts" :value="i.id">@{{ i.title }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>{{config('library.chapter.en')}}</strong>
                                </div>
                                <div class="col-sm-10">
                                    <select name="chapter_id" id="" class="form-control" v-on:change="getTopics" v-model="chapter_id">
                                        <option value=""></option>
                                        <option v-for="i in chapters" :value="i.id">@{{ i.title }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>{{config('library.topic.en')}}</strong>
                                </div>
                                <div class="col-sm-10">
                                    <select name="topic_id" id="" class="form-control" v-on:change="getSkills" v-model="topic_id">
                                        <option value=""></option>
                                        <option v-for="i in topics" :value="i.id">@{{ i.title }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-12" style="">
                            <div class="row">
                                <div class="col-sm-2">
                                    <strong>{{config('library.skill.en')}}</strong>
                                </div>
                                <div class="col-sm-10">
                                    <select name="skill_id" id="" class="form-control" v-model="skill_id">
                                        <option value=""></option>
                                        <option v-for="i in skills" :value="i.id">@{{ i.title }}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-1 offset-md-11">
                            {{Form::submit('search', ['class'=>'btn btn-success float-right', 'style'=>''])}}
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>

            @foreach($questions as $q)
            <div class="card card-custom gutter-b my-5">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="flex-shrink-0 mr-7">
                            <div class="symbol symbol-50 symbol-lg-120 symbol-light-danger"><span
                            class="font-size-h3 symbol-label font-weight-boldest" style="line-height: normal;">{{$q->path_title}}</span></div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="d-flex align-items-center justify-content-between flex-wrap mt-2">
                                <div class="mr-3">
                                    <div class="d-flex flex-wrap my-2">
                                        @if($q->path_title)
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect> <path
                                                d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"></path> <path
                                                d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
                                                fill="#000000" opacity="0.3"></path></g></svg></span>
                                            {{$q->path_title}}
                                        </a>
                                        @endif
                                        @if($q->course_title)
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon> <rect fill="#000000" opacity="0.3" transform="translate(14.000000, 12.000000) rotate(-90.000000) translate(-14.000000, -12.000000) "
                                                x="13" y="5" width="2" height="14" rx="1"></rect> <rect fill="#000000" opacity="0.3" x="3" y="3" width="2" height="18" rx="1"></rect> <path
                                                d="M11.7071032,15.7071045 C11.3165789,16.0976288 10.6834139,16.0976288 10.2928896,15.7071045 C9.90236532,15.3165802 9.90236532,14.6834152 10.2928896,14.2928909 L16.2928896,8.29289093 C16.6714686,7.914312 17.281055,7.90106637 17.675721,8.26284357 L23.675721,13.7628436 C24.08284,14.136036 24.1103429,14.7686034 23.7371505,15.1757223 C23.3639581,15.5828413 22.7313908,15.6103443 22.3242718,15.2371519 L17.0300721,10.3841355 L11.7071032,15.7071045 Z" fill="#000000" fill-rule="nonzero" transform="translate(16.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-16.999999, -11.999997) "></path></g></svg></span>
                                            {{$q->course_title}}
                                        </a>
                                        @endif
                                        @if($q->part_title)
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                    height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon> <rect fill="#000000" opacity="0.3"
                                                    transform="translate(14.000000, 12.000000) rotate(-90.000000) translate(-14.000000, -12.000000) " x="13" y="5" width="2" height="14" rx="1"></rect> <rect fill="#000000" opacity="0.3" x="3" y="3" width="2" height="18" rx="1"></rect> <path
                                                    d="M11.7071032,15.7071045 C11.3165789,16.0976288 10.6834139,16.0976288 10.2928896,15.7071045 C9.90236532,15.3165802 9.90236532,14.6834152 10.2928896,14.2928909 L16.2928896,8.29289093 C16.6714686,7.914312 17.281055,7.90106637 17.675721,8.26284357 L23.675721,13.7628436 C24.08284,14.136036 24.1103429,14.7686034 23.7371505,15.1757223 C23.3639581,15.5828413 22.7313908,15.6103443 22.3242718,15.2371519 L17.0300721,10.3841355 L11.7071032,15.7071045 Z" fill="#000000" fill-rule="nonzero"
                                                    transform="translate(16.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-16.999999, -11.999997) "></path></g></svg></span>
                                            {{$q->part_title}}
                                        </a>
                                        @endif
                                        @if($q->chapter_title)
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon> <rect fill="#000000" opacity="0.3"
                                                                                                                                                                                                                              transform="translate(14.000000, 12.000000) rotate(-90.000000) translate(-14.000000, -12.000000) " x="13" y="5" width="2" height="14" rx="1"></rect> <rect fill="#000000" opacity="0.3" x="3" y="3" width="2" height="18" rx="1"></rect> <path
                                                                d="M11.7071032,15.7071045 C11.3165789,16.0976288 10.6834139,16.0976288 10.2928896,15.7071045 C9.90236532,15.3165802 9.90236532,14.6834152 10.2928896,14.2928909 L16.2928896,8.29289093 C16.6714686,7.914312 17.281055,7.90106637 17.675721,8.26284357 L23.675721,13.7628436 C24.08284,14.136036 24.1103429,14.7686034 23.7371505,15.1757223 C23.3639581,15.5828413 22.7313908,15.6103443 22.3242718,15.2371519 L17.0300721,10.3841355 L11.7071032,15.7071045 Z" fill="#000000" fill-rule="nonzero"
                                                                transform="translate(16.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-16.999999, -11.999997) "></path></g></svg></span>
                                            {{$q->chapter_title}}
                                        </a>
                                        @endif
                                        @if($q->topic_title)
                                        <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                            <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                     height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><polygon points="0 0 24 0 24 24 0 24"></polygon> <rect fill="#000000" opacity="0.3"
                                                                                                                                                                                                                              transform="translate(14.000000, 12.000000) rotate(-90.000000) translate(-14.000000, -12.000000) " x="13" y="5" width="2" height="14" rx="1"></rect> <rect fill="#000000" opacity="0.3" x="3" y="3" width="2" height="18" rx="1"></rect> <path
                                                        d="M11.7071032,15.7071045 C11.3165789,16.0976288 10.6834139,16.0976288 10.2928896,15.7071045 C9.90236532,15.3165802 9.90236532,14.6834152 10.2928896,14.2928909 L16.2928896,8.29289093 C16.6714686,7.914312 17.281055,7.90106637 17.675721,8.26284357 L23.675721,13.7628436 C24.08284,14.136036 24.1103429,14.7686034 23.7371505,15.1757223 C23.3639581,15.5828413 22.7313908,15.6103443 22.3242718,15.2371519 L17.0300721,10.3841355 L11.7071032,15.7071045 Z" fill="#000000" fill-rule="nonzero"
                                                        transform="translate(16.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-16.999999, -11.999997) "></path></g></svg></span>
                                            {{$q->topic_title}}
                                        </a>
                                        @endif

                                    </div>

                                </div>
                                <div class="my-lg-0 my-1">
                                    <div class="d-flex align-items-center">
                                        <a href="#"></a>
                                        <div data-toggle="tooltip" title="" data-placement="left" data-original-title="Created At" class="dropdown dropdown-inline ml-2">
                                            <a href="#" class="text-primary" style="border-right: 1px solid lightgray; padding-right: 5px;">
                                                {{\Carbon\Carbon::parse($q->created_at)->diffForHumans()}}
                                            </a>
                                        </div>
                                        <div data-toggle="tooltip" title="" data-placement="left" data-original-title="Last Updated At" class="dropdown dropdown-inline ml-2">
                                            <a href="#" class="text-primary" style="border-right: 1px solid lightgray; padding-right: 5px;">
                                                {{\Carbon\Carbon::parse($q->updated_at)->diffForHumans() }}
                                            </a>
                                        </div>
                                        <div data-toggle="tooltip" title="" data-placement="left"
                                            data-original-title="
                                            @if($q->important == 1)
                                            Important
                                            @else
                                            Not Important
                                            @endif
                                            " class="dropdown dropdown-inline ml-2">
                                            <a href="#" class="btn btn-icon">
                                                <span class="svg-icon svg-icon-success svg-icon-2x">
                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                        <i class="fa fa-check-double" style="
                                                        @if($q->important == 1)
                                                        color:#1CB841
                                                        @endif
                                                        ;text-align:center;"></i>
                                                    </span>
                                                </span>
                                            </a>
                                        </div>
                                        {{-- <div data-toggle="tooltip" title="" data-placement="top"
                                            data-original-title=" {{($q->reviewed==1)? 'reviewed done': 'mark as reviewed'}}" 
                                            class="dropdown dropdown-inline ml-2">
                                            <a href="#" class="btn btn-icon" data-review="{{$q->id}}">
                                                <span class="svg-icon svg-icon-success svg-icon-2x">
                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                        <i class="fa fa-check-circle review_span{{$q->id}}" style="
                                                        {{($q->reviewed==1)? 'color:green': ''}}
                                                        ;text-align:center;"></i>
                                                    </span>
                                                </span>
                                            </a>
                                        </div> --}}
{{--                                        <div data-toggle="tooltip" title="" data-placement="top"--}}
{{--                                            data-original-title=" {{($q->reviewed==1)? 'reviewed done': 'incorret question'}}" --}}
{{--                                            class="dropdown dropdown-inline ml-2">--}}
{{--                                            @if ($q->reviewed==1)--}}
{{--                                                <a href="#" class="btn btn-icon">--}}
{{--                                                    <span class="svg-icon svg-icon-success svg-icon-2x">--}}
{{--                                                        <span class="svg-icon svg-icon-success svg-icon-2x">--}}
{{--                                                            <i class="fa fa-check-circle" style="color:green;text-align:center;"></i>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                                </a>--}}
{{--                                            @elseif ($q->reviewed==2)--}}
{{--                                                <a href="#" class="btn btn-icon" data-incorrect="{{$q->id}}"--}}
{{--                                                    data-reason="{{$q->reason}}">--}}
{{--                                                    <span class="svg-icon svg-icon-success svg-icon-2x">--}}
{{--                                                        <span class="svg-icon svg-icon-success svg-icon-2x">--}}
{{--                                                            <i class="fa fa-times-circle" style="color:red;text-align:center;"></i>--}}
{{--                                                        </span>--}}
{{--                                                    </span>--}}
{{--                                                </a>--}}
{{--                                            @endif--}}
{{--                                            --}}
{{--                                        </div>--}}
                                        <div data-toggle="tooltip" title="" data-placement="left"
                                             data-original-title="Quick Actions">
                                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn btn-icon">
                                                <span class="svg-icon svg-icon-success svg-icon-2x">
                                                    <span class="svg-icon svg-icon-success svg-icon-2x">
                                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g
                                                            stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect> <rect fill="#000000" x="4" y="5" width="16" height="3" rx="1.5"></rect>
                                                            <path d="M5.5,15 L18.5,15 C19.3284271,15 20,15.6715729 20,16.5 C20,17.3284271 19.3284271,18 18.5,18 L5.5,18 C4.67157288,18 4,17.3284271 4,16.5 C4,15.6715729 4.67157288,15 5.5,15 Z M5.5,10 L18.5,10 C19.3284271,10 20,10.6715729 20,11.5 C20,12.3284271 19.3284271,13 18.5,13 L5.5,13 C4.67157288,13 4,12.3284271 4,11.5 C4,10.6715729 4.67157288,10 5.5,10 Z" fill="#000000" opacity="0.3"></path></g>
                                                        </svg>
                                                    </span>
                                                </span>
                                            </a>
                                            <div class="dropdown-menu p-0 m-0 dropdown-menu-md dropdown-menu-right" style="">
                                                <ul class="navi">
                                                    <li class="navi-header font-weight-bold py-5"><span
                                                                class="font-size-lg">Quick Actions:</span></li>
                                                    <li class="navi-separator mb-3 opacity-70"></li>

                                                    <li class="navi-item"><a
                                                                href="javascript:;" @click.prevent="loader('{{$q->id}}')"
                                                                class="navi-link"><span class="navi-icon"><i
                                                                        class="fa fa-eye"></i></span> <span
                                                                    class="navi-text">View</span></a></li>
{{--                                                    <li class="navi-item"><a--}}
{{--                                                                href="{{route('question.edit', $q->id)}}"--}}
{{--                                                                class="navi-link"><span class="navi-icon"><i--}}
{{--                                                                        class="fa fa-edit"></i></span> <span--}}
{{--                                                                    class="navi-text">Edit</span></a></li>--}}
                                                    <li class="navi-item">
                                                        <a href="#" data-toggle="modal" data-target="#DeleteModal-{{$q->id}}" class="navi-link">
                                                            <span class="navi-icon"><i class="fa fa-trash"></i></span>
                                                            <span class="navi-text">Delete</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="modal fade" id="DeleteModal-{{$q->id}}" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header" style="text-align: left;">
                                                            <h4 class="modal-title">Are You Sure ?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{!!  strip_tags($q->title) !!}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                            {!! Form::open(['action'=>['\App\Http\Controllers\Admin\QuestionsController@destroy', $q->id], 'method'=>'POST']) !!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                            {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                                            {!! Form::close() !!}
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="d-flex align-items-center flex-wrap justify-content-between">
                                <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5"
                                     style="width: 100%;"><small
                                            style="color: black; font-weight: bold;">Question</small>
                                    <div class="row">
                                        <div class="col-md-12 scroll scroll-pull my-2" data-scroll="true" style="max-height: 200px">
                                            {!! strip_tags($q->title) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!--begin::Pagination-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin::Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap mr-3">
                            <!-- Pagination here -->
                            {{$questions->appends(request()->all())->links() }}
                        </div>
                        <form class="d-flex align-items-center" method="GET" action="{{route('question.index')}}">
                            <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;" name="pagination" onchange="this.form.submit()">
                                <option value="10" {{request()->pagination == 10 ? 'selected': ''}}>10</option>
                                <option value="20" {{request()->pagination == 20 ? 'selected': ''}}>20</option>
                                <option value="30" {{request()->pagination == 30 ? 'selected': ''}}>30</option>
                                <option value="50" {{request()->pagination == 50 ? 'selected': ''}}>50</option>
                                <option value="100" {{request()->pagination == 100 ? 'selected': ''}}>100</option>
                            </select>
                            <span class="text-muted">Displaying {{$current_page_count}} of {{$questions->total()}} records</span>
                        </form>
                    </div>
                    <!--end:: Pagination-->
                </div>
            </div>
            <!--end::Pagination-->

        </div>
        <div class="modal fade" id="questionDetails" role="dialog">
            <div class="modal-dialog modal-lg">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div v-if="question_passage" class="flex-grow-1 p-5 card-rounded flex-grow-1 bgi-no-repeat" style="background-color: #1B283F; background-position: calc(100% + 0.5rem) bottom; background-size: 50% auto;">
                            <p class="text-white my-5 font-size-xl font-weight-bold" v-html="question_passage">

                            </p>
                        </div>
                        <p>
                            <div class="flex-grow-1 p-20 pb-10 card-rounded flex-grow-1 bgi-no-repeat" style="background-color: #1B283F; background-position: calc(100% + 0.5rem) bottom; background-size: 50% auto;">
                                <h4 class="text-primary font-weight-bolder m-0" style="width: 100%;">
                                    <div class="row">
                                        <small class="col-3" > Question</small>
                                    </div>
                                </h4>
                        <p class="text-white my-5 font-size-xl font-weight-bold" v-html="question_title"></p>

{{--                        <a :href="edit_link" class="btn btn-success font-weight-bold py-2 px-6">--}}
                        <a href="#" class="btn btn-success font-weight-bold py-2 px-6">
                            Edit (coming soon)
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
{{--                    <div class="p-5">--}}
{{--                        <a :href="review_done" class="btn btn-primary font-weight-bold py-2 px-6">--}}
{{--                            Correct--}}
{{--                        </a>--}}
{{--                        <a href="javascript:;" @click.prevent="incorr()" class="btn btn-danger font-weight-bold py-2 px-6">--}}
{{--                            IN Correct--}}
{{--                        </a>--}}
{{--                    </div>--}}
                    <h3 class="text-black font-weight-bolder mb-3 mt-3">Answers</h3>
                    <table class="table table-hover table-bordered table-striped my-4" v-if="!isMatchingToRight && !isMatchingToCenter">
                        <thead>
                        <tr>
                            <th>Answer</th>
                            <th>Correct ?</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="i,index in answers_arr">
                            <td v-html="i.answer"></td>
                            <td v-if="i.is_correct">Correct</td>
                            <td v-if="!i.is_correct">Incorrect</td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover table-bordered table-striped my-4" v-if="isMatchingToRight">
                        <thead>
                        <tr>
                            <th>Left Item</th>
                            <th>Right Item</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="i,index in drags_arr">
                            <td v-html="i.left_sentence"></td>
                            <td v-html="i.right_sentence"></td>
                        </tr>
                        </tbody>
                    </table>

                    <table class="table table-hover table-bordered table-striped my-4" v-if="isMatchingToCenter">
                        <thead>
                        <tr>
                            <th>Correct Sentence</th>
                            <th>Center Sentence</th>
                            <th>Wrong Sentence</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="i,index in dragsCenter_arr">
                            <td v-html="i.correct_sentence"></td>
                            <td v-html="i.center_sentence"></td>
                            <td v-html="i.wrong_sentence"></td>
                        </tr>
                        </tbody>
                    </table>

                    <h3 class="text-black font-weight-bolder mb-3 pt-3">Related To</h3>
                    <div class="form-group row">
                        <div class="col-12">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>{{config('library.path.en')}}</th>
                                    <th>{{config('library.course.en')}}</th>
                                    <th>{{config('library.part.en')}}</th>
                                    <th>{{config('library.chapter.en')}}</th>
                                    <th>{{config('library.topic.en')}}</th>
                                    <th>{{config('library.skill.en')}}</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="i, index in structures">
                                    <td>@{{ i.path.title }}</td>
                                    <td>@{{ i.course.title }}</td>
                                    <td>@{{ i.part.title }}</td>
                                    <td>@{{ i.chapter.title }}</td>
                                    <td>@{{ i.topic.title }}</td>
                                    <td>@{{ i.skill.title }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>



                    <div class="flex-grow-1 p-20 pb-10 card-rounded flex-grow-1 bgi-no-repeat" style="background-position: calc(100% + 0.5rem) bottom; background-size: 50% auto;">
                        <!--begin::Body-->
                        <div class="card-body d-flex align-items-center">
                            <div class="py-2">
                                <h3 class="text-black font-weight-bolder mb-3">Feedback</h3>
                                <p class="text-black font-size-lg">
                                        <span v-html="feedback">

                                        </span>
                                </p>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>

                    </p>
                </div>
            </div>

        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Reason for incorrect</h5>
                    </div>
                    <div class="modal-body">
                        <form :action="review_error" id="formModalPost" 
                            method="POST"   enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('POST') }}
                        <div class="form-group text-right">
                            <div class="iq-card-body">
                                <label for="message-text" class="col-form-label">Reason:</label>
                                <br>
                                <input name="reason" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>



@endsection

@section('jscode')
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '#app-1',
            data:{
                
                path_id: '{{request()->path_id}}',
                paths: [],
                course_id: '{{request()->course_id}}',
                courses: [],
                part_id: '{{request()->part_id}}',
                parts: [],
                chapter_id: '{{request()->chapter_id}}',
                chapters: [],
                topic_id: '{{request()->topic_id}}',
                topics: [],
                skill_id: '{{request()->skill_id}}',
                skills: [],
                exams: [],
                tags: [],
                exam_id: [],
                tag_id: '',
                
                
                // Multiple Choice || Multiple Response || Fill in the blank
                answers_arr: [],
                answer: '',
                is_correct: false,
                // Drag to Right
                drags_arr: [],
                left_sentence: '',
                right_sentence: '',
                // Drag to Center
                dragsCenter_arr: [],
                center_sentence: '',
                correct_sentence: '',
                wrong_sentence: '',


                Institute:'',
                course:'',
                chapter:'',
                lesson:'',
                part:'',
                id_reason:'',
                error_reason:'',
                course_data: [],
                part_data: [],
                lesson_data: [],
                chapter_data: [],
                created_by: '',
                question_title: '',
                question_type_id: 1,
                correct_answers_required: 1,
                review:'',

                process_group: '',
                demo: '',
                exam_num: [],
                feedback: '',
                edit_link: '',
                review_done: '',
                review_error: '',
                correct_link: '',
                incorrect_link: '',
                question_passage: '',

                structures: [],
            },
            mounted(){
                if(this.path_id){
                    this.getCourses();
                    if(this.course_id){
                        this.getParts();
                        if(this.part_id)
                            this.getChapters();
                    }
                        
                }
            },
            computed:{
                isMatchingToCenter: function(){
                    return this.question_type_id == 5;
                },
                isFillInTheBlank: function(){
                    return this.question_type_id == 4;
                },
                isMatchingToRight: function(){
                    return this.question_type_id == 3;
                },
                isMultipleResponses: function(){
                    return this.question_type_id == 2;
                },
                isMultipleChoice: function(){
                    return this.question_type_id == 1;
                },
            },
            methods:{
                reRenderMathJax: function(){
                    app.$nextTick(function () {
                        MathJax.Hub.Typeset()
                    });
                },
                getPaths:async function(){
                    this.paths = await this.fetchLibrary(null, 'path');
                    // this.path_id = null;
                    // this.course_id = null;
                    // this.part_id = null;
                    // this.chapter_id = null;
                    // this.topic_id = null;
                    // this.skill_id = null;
                },
                getCourses:async function(){
                    this.courses = await this.fetchLibrary(this.path_id, 'course');
                    // this.course_id = null;
                    // this.part_id = null;
                    // this.chapter_id = null;
                    // this.topic_id = null;
                    // this.skill_id = null;
                },
                getParts:async function(){
                    this.parts = await  this.fetchLibrary(this.course_id, 'part');
                    // this.part_id = null;
                    // this.chapter_id = null;
                    // this.topic_id = null;
                    // this.skill_id = null;
                },
                getChapters:async function(){
                    this.chapters = await  this.fetchLibrary(this.part_id, 'chapter');
                    // this.chapter_id = null;
                    // this.topic_id = null;
                    // this.skill_id = null;
                },
                getTopics:async function(){
                    this.topics = await  this.fetchLibrary(this.chapter_id, 'topic');
                    this.topic_id = null;
                    this.skill_id = null;
                },
                getSkills: async function(){
                    this.skills = await  this.fetchLibrary(this.topic_id, 'skill');
                    this.skill_id = null;
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

                loader: function(question_id){
                    KTApp.blockPage();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('question.loader')}}',
                        data: {
                            question_id,
                            strip_tags: 1,
                        },
                        success: function(res){
                            console.log(res);
                            question = res['question'];

                            app.structures = res['question_distributions'];
                            app.question_title = question['question_title'];
                            app.question_passage = res['passage'];
                            app.question_type_id = question['question_type_id'];
                            app.correct_answers_required = question['correct_answers_required'];
                            {{--app.review=question['review'];--}}
                            if(app.isMultipleChoice || app.isMultipleResponses || app.isFillInTheBlank){
                                app.answers_arr = [];
                                if(question['answers']){
                                    question['answers'].forEach(ele => {
                                        app.answers_arr.push({
                                            id: ele['id'],
                                            answer: ele['answer'],
                                            is_correct: ele['is_correct'],
                                        });
                                    });
                                }
                            }else if(app.isMatchingToRight){
                                app.drags_arr = [];
                                question['drag_right'].forEach(ele => {
                                    app.drags_arr.push({
                                        id: ele['id'],
                                        left_sentence: ele['left_sentence'],
                                        right_sentence: ele['right_sentence'],
                                    });
                                });
                            }else if(app.isMatchingToCenter){
                                app.dragsCenter_arr = [];
                                question['drag_center'].forEach(ele => {
                                    app.dragsCenter_arr.push({
                                        id: ele['id'],
                                        correct_sentence: ele['correct_sentence'],
                                        wrong_sentence: ele['wrong_sentence'],
                                        center_sentence: ele['center_sentence'],
                                    });
                                });
                            }

                            app.demo = question['demo'];
                            app.feedback = question['feedback'];

                            KTApp.unblockPage();
                            $("#questionDetails").modal('show');
                            app.edit_link = '{{route('question.edit', '')}}/'+question['id'];
                            {{--app.review_done = '{{route('question.review', '')}}/'+question['id'];--}}
                            {{--app.review_error =  '{{route('question.review_error', '')}}/'+question['id'];--}}

                            app.reRenderMathJax();
                        },
                        error: function(err){
                            console.log(err);
                        }
                    });
                },
                incorr: function(){
                    $("#exampleModal").modal('show');
                    
                }
            }
        });
    </script>
    <script>
        $("[data-review]").on('click', function(e){
            e.preventDefault();
            var question = $(this).data("review");
            $.ajax({
                //url: { route('question.review')}}',
                data : {'question_id':question},
                method: 'get',
                success:function(json) {
                    if(json.data == 'done'){
                        $('.review_span'+question).css('color', 'green');
                        Swal.fire({
                            position:'top-end',
                            icon: 'success',
                            title: 'تم مراجعة السؤال بنجاح',
                            showConfirmButton: false,
                            timer: 1000
                        });
                    }
                }
            });
        });
        $("[data-incorrect]").on('click', function(e){
            e.preventDefault();
            var reason = $(this).data("reason");
            Swal.fire({
                position:'top',
                icon: 'error',
                title: reason,
                showConfirmButton: true,
                timer: 8000
            });
        });
    </script>
@endsection

