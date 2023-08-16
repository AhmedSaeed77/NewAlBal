@extends('layouts.admin-layout')
@section('pageTitle') All {{config('library.explanation.en')}}s @endsection
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
        <h3 class="card-label pr-2">{{config('library.explanation.en')}} </h3>
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
            <a href="#" class="text-muted">{{config('library.explanation.en')}}</a>
        </li>
    </ul>
    <!--end::Breadcrumb-->
@endsection
@section('subheaderNav')
    <a href="{{route('explanation.create')}}" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo5\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
            <rect x="0" y="0" width="24" height="24"/>
            <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
            <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
        </g>
    </svg><!--end::Svg Icon--></span>Add New {{config('library.explanation.en')}}</a>
@endsection
@section('content')

    <div class="row">
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
                    {!! Form::open(['action'=>'\App\Http\Controllers\Admin\ExplanationController@index', 'method'=>'GET', 'class'=>'', 'style'=>'margin: 10px 0 20px 0;']) !!}
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
                                    <select name="path_id" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Models\Library\Path::all() as $i)
                                            <option value="{{$i->id}}" {{ $i->id == request()->path_id ? 'selected': '' }} >{{$i->title}}</option>
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
                                    <select name="course_id" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Models\Library\PathCourse::all() as $i)
                                            <option value="{{$i->id}}" {{ $i->id == request()->course_id ? 'selected': '' }} >{{$i->title}}</option>
                                        @endforeach
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
                                    <select name="part_id" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Models\Library\CoursePart::all() as $i)
                                            <option value="{{$i->id}}" {{ $i->id == request()->part_id ? 'selected': '' }} >{{$i->title}}</option>
                                        @endforeach
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
                                    <select name="chapter_id" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Models\Library\PartChapter::all() as $i)
                                            <option value="{{$i->id}}" {{ $i->id == request()->chapter_id ? 'selected': '' }} >{{$i->title}}</option>
                                        @endforeach
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
                                    <select name="topic_id" id="" class="form-control">
                                        <option value=""></option>
                                        @foreach(\App\Models\Library\ChapterTopic::all() as $i)
                                            <option value="{{$i->id}}" {{ $i->id == request()->topic_id ? 'selected': '' }} >{{$i->title}}</option>
                                        @endforeach
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

            <div class="col-md-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <td>#</td>
                            <td>Title</td>
                            <td>{{config('library.path.en')}}</td>
                            <td>{{config('library.course.en')}}</td>
                            <td>{{config('library.part.en')}}</td>
                            <td>{{config('library.chapter.en')}}</td>
                            <td>{{config('library.topic.en')}}</td>
                            <td>Created At</td>
                            <td>Last update</td>
                            <td>--</td>
                            <td>--</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($explanations as $exp)
                            <tr>
                                <td>{{$exp->id}}</td>
                                <td>{{$exp->explanation_title}}</td>
                                <td>{{$exp->path_title}}</td>
                                <td>{{$exp->course_title}}</td>
                                <td>{{$exp->part_title}}</td>
                                <td>{{$exp->chapter_title}}</td>
                                <td>{{$exp->topic_title}}</td>
                                <td>{{$exp->created_at}}</td>
                                <td>{{\Carbon\Carbon::parse($exp->updated_at)->diffForHumans() }}</td>
                                <td>
                                    <a href="{{route('explanation.edit' ,$exp->id)}}">
                                        <i class="fa fa-edit text-warning"></i>
                                    </a>
                                </td>
                                <td>
                                    <a href="#" onclick="AVUtil().deleteConfirmation('{{route('explanation.destroy', $exp->id)}}', function(url){window.location.href = url;})">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!--begin::Pagination-->
            <div class="card card-custom">
                <div class="card-body">
                    <!--begin::Pagination-->
                    <div class="d-flex justify-content-between align-items-center flex-wrap">
                        <div class="d-flex flex-wrap mr-3">
                            <!-- Pagination here -->
                            {{$explanations->appends(request()->all())->links() }}
                        </div>
                        <form class="d-flex align-items-center" method="GET" action="{{route('explanation.index')}}">
                            <select class="form-control form-control-sm text-primary font-weight-bold mr-4 border-0 bg-light-primary" style="width: 75px;" name="pagination" onchange="this.form.submit()">
                                <option value="10" {{request()->pagination == 10 ? 'selected': ''}}>10</option>
                                <option value="20" {{request()->pagination == 20 ? 'selected': ''}}>20</option>
                                <option value="30" {{request()->pagination == 30 ? 'selected': ''}}>30</option>
                                <option value="50" {{request()->pagination == 50 ? 'selected': ''}}>50</option>
                                <option value="100" {{request()->pagination == 100 ? 'selected': ''}}>100</option>
                            </select>
                            <span class="text-muted">Displaying {{count($explanations)}} of {{$explanations->total()}} records</span>
                        </form>
                    </div>
                    <!--end:: Pagination-->
                </div>
            </div>
            <!--end::Pagination-->

        </div>
    </div>


@endsection

@section('jscode')
@endsection

