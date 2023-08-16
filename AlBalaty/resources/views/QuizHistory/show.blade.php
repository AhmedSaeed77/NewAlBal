@extends('layouts.layoutV2')

@section('content')

    <div class="container">
        <p>
            {{__('User/quizHistory.note')}}
        </p>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <div class="portlet box blue">
            <div class="portlet-body" id="app-1">
                <div class="">
                    @php
                    $attempt = count(\App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get());
                    @endphp
                    @foreach(\App\Quiz::where('user_id', Auth::user()->id)->where('complete', 1)->orderBy('updated_at', 'desc')->get() as $quiz_z)
                    <div class="row" style="margin-top: 10px; margin-bottom: 10x; ">
                        <div class="container" id="view1{{$quiz_z->id}}" style="border:1px solid #ccc; width:80%; padding: 25px 0;box-shadow: 0px 9px 15px -4px rgba(0,0,0,0.14); ">
                            <div style="display:flex; justify-content: space-evenly; align-items:center; flex-wrap: wrap;" >
                                <div style="min-width:250px;">
                                    @if($quiz_z->topic_type == 'chapter')
                                        {{Transcode::evaluate(\App\Chapters::find($quiz_z->topic_id))['name'] }}
                                    @elseif($quiz_z->topic_type == 'process')
                                        {{Transcode::evaluate(\App\Process_group::find($quiz_z->topic_id))['name']}}
                                    @elseif($quiz_z->topic_type == 'mistake')
                                        @if($quiz_z->topic_id == 1)
                                            {{__('User/quizHistory.chapters-mistakes')}}
                                        @elseif($quiz_z->topic_id == 2)
                                            {{__('User/quizHistory.processes-mistakes')}}
                                        @elseif($quiz_z->topic_id == 3)
                                            {{__('User/quizHistory.exam-mistakes')}}
                                        @endif
                                    @else
                                        {{Transcode::evaluate(\App\Exam::find($quiz_z->topic_id))['name']}}
                                    @endif
                                </div>
                                <div class="">
                                    @if($quiz_z->score >= 75)
                                        <b style="color:darkgreen">{{__('User/quizHistory.success')}}</b>
                                    @else
                                        <b style="color:darkred">{{__('User/quizHistory.failed')}}</b>
                                    @endif

                                    
                                </div>
                                <div class="">
                                    <b>{{$quiz_z->score}}%</b> {{__('User/quizHistory.correct')}}
                                </div>
                                <div class="">
                                    @php
                                        $hours = 0;
                                        $mins = 0;
                                        $sec = 0;
                                        if($quiz_z->time_left != 0){
                                            $hours = floor($quiz_z->time_left/3600);
                                            $mins = floor( ($quiz_z->time_left%3600) / 60);
                                            $sec = floor(($quiz_z->time_left%3600) % 60);
                                        }

                                    @endphp
                                    {{$hours}} {{__('User/quizHistory.hour')}} {{$mins}} {{__('User/quizHistory.min')}} {{$sec}} {{__('User/quizHistory.sec')}}
                                </div>
                                <div class="">
                                    {{$quiz_z->updated_at->diffForHumans()}}
                                </div>
                                <div class="col-md-1">
                                    {{-- <i class="fa fa-arrow-down" style="font-size: 25px; color:#ccc; cursor: pointer;" v-on:click="slideMe('view2{{$quiz_z->id}}', 'view1{{$quiz_z->id}}')"></i> --}}
                                    <a href="{{route('QuizHistory.show', $quiz_z->id)}}" class="btn btn-primary">{{__('User/quizHistory.review')}}</a>
                                </div>
                            </div>
                        </div>

                        <div class="container" id="view2{{$quiz_z->id}}" style="border:1px solid #ccc; width:80%; padding: 25px 0;box-shadow: 0px 9px 15px -4px rgba(0,0,0,0.14);display:none;">
                            <div class="row" >
                                <div class="col-md-5"></div>     
                                <div class="col-md-6" style="display:flex; justify-content: space-evenly; align-items:flex-start; flex-direction:column; flex-wrap: wrap;">
                                    <div style="font-size: 20px; margin:5px;">
                                        

                                        @if($quiz_z->score >= 75)
                                            <i style="color: darkgreen;">Success (75% Required to pass)</i>
                                        @else
                                            <i style="color: darkred;">Faild (75% Required to pass)</i>
                                        @endif
                                    </div>
                                    <div style="margin:5px;">
                                        <b style="font-size: 25px;"> {{$quiz_z->score}}% </b><small>Correct</small>
                                    </div>
                                    <div style="color: #ccc;margin:5px;">
                                        {{$hours}} Hour {{$mins}} Min {{$sec}} Sec
                                    </div>
                                    <div style="color: #ccc;margin:5px;">
                                        {{$quiz_z->updated_at->diffForHumans()}}
                                    </div>
                                    <div style="margin:5px;">
                                        <a href="{{route('QuizHistory.show', $quiz_z->id)}}" class="btn green">Review Quiz</a>
                                    </div>

                                </div>
                                <div class="col-md-1">
                                    <i class="fa fa-arrow-up" style="font-size: 25px; color:#ccc; cursor: pointer;" v-on:click="slideMe('view1{{$quiz_z->id}}', 'view2{{$quiz_z->id}}')"></i>
                                </div>
                                                                                        
                            </div>
                        </div>
                    </div>

                    @php
                    $attempt--;
                    @endphp
                    @endforeach
                </div>
            </div>
        </div>

@endsection
