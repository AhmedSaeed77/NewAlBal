@extends('layouts.layoutV2')

@section('head')
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="{{asset('assetsV2/css/icons.css')}}">
    <style>

        .radio:hover {
            background-color: #3e416d1f;
        }

        @media print { body { display:none } }

        body, html{
            /* Prevent selection */
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -khtml-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }
        @media only screen and (max-width: 770px) {
            .go-when-less-770 { display: none !important;}
            .remove-position-when-less-770 { position: relative !important;}
        }
        .style-ma-1 {
            min-height: 300px; background-color: white; min-width: 1024px; margin: 20px auto 0 auto; padding-top:30px;
        }
        .style-ma-2 {
            width: 1024px    ; margin:auto;
        }
        .style-ma-3 {
            padding: 20px;
        }
        .dont-hover {color: white !important; }
        .dont-hover:hover {
            color: white !important;
            text-decoration: none;
        }
        .rate {
            display: flex;
            justify-content: center;
            flex-direction: row-reverse;

        }
        .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        }
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:100px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            font-family: "Font Awesome 5 Duotone";
            content: '★';
        }
        .rate > input:checked ~ label {
            color: gold;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: gold;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: gold;
        }

        /* circular progress bar */
        .progress {
            width: 42px;
            height: 42px;
            background: none;
            position: relative;
        }

        .progress::after {
            content: "";
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px solid #eee;
            position: absolute;
            top: 0;
            left: 0;
        }

        .progress>span {
            width: 50%;
            height: 100%;
            overflow: hidden;
            position: absolute;
            top: 0;
            z-index: 1;
        }

        .progress .progress-left {
            left: 0;
        }

        .progress .progress-bar {
            width: 100%;
            height: 100%;
            background: none;
            border-width: 3px;
            border-style: solid;
            border-color: #07fc03 !important;
            position: absolute;
            top: 0;
        }

        .progress .progress-left .progress-bar {
            left: 100%;
            border-top-right-radius: 80px;
            border-bottom-right-radius: 80px;
            border-left: 0;
            -webkit-transform-origin: center left;
            transform-origin: center left;
        }

        .progress .progress-right {
            right: 0;
        }

        .progress .progress-right .progress-bar {
            left: -100%;
            border-top-left-radius: 80px;
            border-bottom-left-radius: 80px;
            border-right: 0;
            -webkit-transform-origin: center right;
            transform-origin: center right;
        }

        .progress-value {
            position: absolute;
            top: 0;
            left: 0;
        }
        .progress {

            display: inline-block;
            margin-left: 20px;
            margin-right: 10px;
        }




    </style>
@endsection


@section('content')
    <!-- Wrapper -->
    <div id="app-1" class="fluid-container">
        <div id="wrapper">
            <div class="course-content bg-light" style="order: 1;">
                <div class="course-header" style=" @if(app()->getLocale() == 'ar') padding-left: 0 !important; @endif border-bottom: 1px solid #ccc;" >

                    <h4>
                        @if($topic == 'mistake')
                            @if($topic_id == 1)
                                {{__('User/quiz.chapters-mistakes')}}
                            @elseif($topic_id == 2)
                                {{__('User/quiz.processes-mistakes')}}
                            @elseif($topic_id == 3)
                                {{__('User/quiz.exam-mistakes')}}
                            @endif
                        @else
                            @if(isset($currentTopic))
                                {{ \Session('locale') == 'en' ? $currentTopic->name_en : $currentTopic->name_ar}}
                            @endif
                        @endif
                    </h4>

                    <div style="display: flex; align-items: center; justify-content:center;">
                        <a class="dont-hover" href="#rating-form" style="display:flex;" uk-toggle>
                            <i class="icon-line-awesome-star-o btns" @if($package->userRatePackage) style="color:gold;" @endif > </i>
                            @if(!$package->userRatePackage)
                                <h6 class="pt-2">{{__('User/quiz.leave-rating')}}</h6>
                            @else
                                <h6 class="pt-2">{{__('User/quiz.update-rating')}}</h6>
                            @endif
                        </a>
                        <div id="rating-form" uk-modal>
                            <div class="uk-modal-dialog uk-modal-body"  @if(app()->getLocale() == 'ar') style="text-align: right !important;" @endif>
                                <h2 class="uk-modal-title">{{__('User/video.rating-question')}}</h2>
                                <p>
                                    <center>
                                <p style="color:#333; font-size: 20px; font-weight: 10; min-height: 30px;">
                                    @{{rate_sentance}}
                                </p>

                                <div class="row rate" style=" min-height: 50px; margin: 0px 0 15px 0;">

                                    <input type="radio"  id="star5" v-model="rate_value" v-on:change="rate"  name="rate" value="5" />
                                    <label for="star5" title="text" @mouseover="rate_state('{{__('User/quiz.rate-statement-5')}}')"></label>


                                    <input type="radio"  id="star4" v-model="rate_value" v-on:change="rate"  name="rate" value="4" />
                                    <label for="star4" title="text" @mouseover="rate_state('{{__('User/quiz.rate-statement-4')}}')"></label>


                                    <input type="radio" id="star3"  v-model="rate_value" v-on:change="rate"  name="rate" value="3" />
                                    <label for="star3" title="text" @mouseover="rate_state('{{__('User/quiz.rate-statement-3')}}')"></label>


                                    <input type="radio"  id="star2" v-model="rate_value" v-on:change="rate"  name="rate" value="2" />
                                    <label for="star2" title="text" @mouseover="rate_state('{{__('User/quiz.rate-statement-2')}}')"></label>


                                    <input type="radio" id="star1" v-model="rate_value" v-on:change="rate"  name="rate" value="1" />
                                    <label for="star1" title="text" @mouseover="rate_state('{{__('User/quiz.rate-statement-1')}}')"></label>

                                </div>

                                <div class="row">
                                    <div class="col-md-12" id="rateTextBox" @if(!$package->userRatePackage) style="display:none;" @endif >
                                        <div class="form-group">
                                            <textarea v-model="user_review" placeholder="{{__('User/quiz.tell-us-something')}}" cols="30" rows="10" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                </center>
                                </p>
                                <p class="uk-text-right">
                                    <button class="uk-button uk-button-default uk-modal-close" type="button">{{__('User/quiz.cancel')}}</button>
                                    <a v-on:click="post_review" class="uk-modal-close uk-button uk-button-default" type="button">{{__('User/quiz.submit')}}</a>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="course-content-inner bg-light" style="overflow:scroll; min-width: 100%;">
                    <div class="course-content-inner" style="@if(app()->getLocale() == 'en') max-width:95% !important; @else min-width: 95% !important; @endif min-height: auto; height: auto !important; ">

                        <!--
                        **************************
                        **************************
                        -->
                        <div class="form-1 bg-light" id="quiz_app_container">
                            {{-- optimize Quiz Questions Form --}}
                            {{--
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                --}}
                            <form @submit.prevent="optimizeQuiz" id="optimizeForm"  style="display:block;">
                                <div class="optimization_form" style="padding-top: 16px; padding-left: 50px; width:100%; ">

                                    <div>
                                        <div class="row">

                                            <div class="uk-child-width-1-3@m uk-grid-small uk-grid-match" uk-grid style="margin-bottom: 20px;">
                                                <div style="min-width:15vw;">
                                                    <div class="uk-card uk-card-primary uk-card-body flex-center-i" style="background-color: #6f42c1;">
                                                        <h4 class="uk-card-title">@{{Math.round(max_questions_num*72/60)}}</h4>
                                                        <p class="white-color">{{__('User/quiz.min')}}</p>
                                                    </div>
                                                </div>
                                                <div style="min-width:15vw; " >
                                                    <div class="uk-card uk-card-primary uk-card-body flex-center-i" style="background-color: #6f42c1;">
                                                        <h4 class="uk-card-title">@{{max_questions_num}}</h4>
                                                        <p class="white-color">{{__('User/quiz.questions')}}</p>
                                                    </div>
                                                </div>
                                                <div style="min-width:15vw; ">
                                                    <div class="uk-card uk-card-primary uk-card-body flex-center-i" style="background-color: #6f42c1;">
                                                        <h4 class="uk-card-title">75%</h4>
                                                        <p class="white-color">{{__('User/quiz.score-required')}}</p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

{{--                                            <h4>{{__('User/quiz.instructions')}}: </h4>--}}
{{--                                            <ul type="circle" style="overflow: auto; max-width: 800px; text-align: {{\Session('locale') == 'en'? 'left': 'right'}};">--}}
{{--                                                <li>{{__('User/quiz.instructions-1')}}</li>--}}
{{--                                                <li>{{__('User/quiz.instructions-2')}}</li>--}}
{{--                                                <li>{{__('User/quiz.instructions-3')}}</li>--}}
{{--                                                <li>{{__('User/quiz.instructions-4')}}</li>--}}
{{--                                                <li>{{__('User/quiz.instructions-5')}}</li>--}}
{{--                                                <li>{{__('User/quiz.instructions-6')}}</li>--}}
{{--                                            </ul>--}}
                                        </div>
                                    </div>








                                    <div class="row">
                                        <div class="form-group" style="display:flex; justify-content: center; align-items: center;">
                                            @if($quiz)
                                                @if($quiz->complete == 1)
                                                    <a v-on:click="optimizeQuiz" class="btn btn-primary" style="background-color: #6f42c1; color:white;" id="startQuiz">{{__('User/quiz.review')}}</a>
                                                @else
                                                    <a v-on:click="optimizeQuiz" class="btn btn-primary" style="background-color: #6f42c1; color:white;" id="startQuiz">{{__('User/quiz.continue')}}</a>
                                                @endif
                                            @else

                                                <a v-on:click="optimizeQuiz" class="btn white-color" style="background-color: #6f42c1; color:white;" id="startQuiz">{{__('User/quiz.start-test')}}</a>
                                            @endif
                                            <a  class="btn btn-warning" style="display:none;" id="continueQuiz" v-on:click="continueQuize" >{{__('User/quiz.continue')}}</a>
                                            {{-- <a  class="btn btn-success" style="display:none;" id="saveforlateron" v-on:click="saveForLaterOn"  style="margin-top:23px;" >Save</a> --}}


                                        </div>
                                    </div>
                                </div>

                                <div class="row saving_form" style="display:none; margin: 40px 0;">
                                    {{__('User/quiz.answers-being-saved')}}
                                </div>
                            </form>

                            <div id="quizLoading" style="width:100%; height: 100%; display:none; align-items: center; justify-content: center;">{{__('User/quiz.loading')}}</div>
                            {{-- Quiz View --}}
                            {{--
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                --}}

                            <div class="container-fluid primeQuizViewWM" id="quiz" style="min-height: 50px; margin:20px 0; display:none;">

                                <div class="row" style=" ">
                                    <div class="col-md-3" style="">
                                        <div style="display:flex;">
                                            <strong>@{{current_question_number}} </strong> <div style="margin: 0 5px;">{{__('User/quiz.of')}}</div>  @{{q_number}}
                                        </div>
                                        <div style="display:flex;">
                                            <i class="fa fa-flag" style="color: gray; cursor:pointer;" v-on:click = "flagMe" id="flag"> {{__('User/quiz.flag-for-review')}}</i>
                                        </div>

                                    </div>

                                    <div class="col-md-7" style="display:flex; justify-content: center; flex-direction: column; align-items: center;">
{{--                                        <a class="btn" type="button" style="background-color: #ccc; max-width: 150px; margin-bottom: 10px;" id="toggleCorrectAnswer" v-on:click="openWhiteBoard">--}}
{{--                                            <i class="fa fa-edit"></i> {{__('User/quiz.white-board')}}--}}
{{--                                        </a>--}}

                                        <div style="display:flex;">
                                            <i class="fa fa-hourglass-end"></i>
                                            <div style="margin: 0 5px;">{{__('User/quiz.time-remaining')}}</div>
                                            <div style="color: #333;  font-weight: lighter; padding: 0 5px;" id="timer">00:00</div>
                                        </div>

                                        <div class="uk-progress" style="background-color:white;">
                                            <div class="uk-progress-bar" id="progress_bar" style="width: 20%; background-color: #6f42c1; color:transparent; min-height:30px;"></div>
                                        </div>

                                    </div>


                                    <div class="col-md-2" style="text-align: center; padding:0 !important;">
{{--                                        <a class="btn" type="button" style="background-color: #ccc; margin-bottom: 10px;" id="toggleCorrectAnswer" v-on:click="openCalc">--}}
{{--                                            <i class="fa fa-calculator"></i> {{__('User/quiz.calculator')}}--}}
{{--                                        </a>--}}
                                        <div style="display: flex;justify-content: center;gap: 30px;">
                                            <a class="aElement" id="pause" v-on:click="stopTimer_pause" style="margin-right:15px;">
                                                <i class="fa fa-pause" style=""></i>
                                            </a>
                                            <a class="aElement" v-on:click="Confirmation">
                                                <i class="fa fa-stop" style=""></i>
                                            </a>
                                        </div>

                                    </div>

                                </div>


                                <hr style="margin-top:0">
                                <!-- Rating  -->

                                <div class="row" style=" font-size: 21px; border-radius: 10px !important; text-align:center; background-color: #e8ebef; font-weight:bold; margin: 10px 0 20px 0;">
                                    <p class="col-md-12" style="margin: 8px 0; padding: 0 10px;">
                                        @{{question_title}}
                                    </p>
                                </div>

                                <div class="row">
                                    <div class="fig" id="fig" style="display:none; margin: 0 0 10px 50px;">
                                        <img class="img-responsive" v-bind:src="img_link" width="550" alt="fig0-0">
                                    </div>
                                </div>

                                <div class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">
                                    <div class="radio" id="radio1" style="padding-right: 0; padding-left: 0;">
                                        <label style="display:flex;"><input style=" margin: 5px 15px auto 15px; flex: 0 0 17px;" class="uk-radio" v-on:click="answerd_counter" type="radio" name="optradio" v-model="rad" v-bind:value='opt1'>@{{opt1View}}</label>
                                    </div>
                                    <div class="radio" id="radio2" style="padding-right: 0; padding-left: 0;">
                                        <label style="display:flex;"><input style=" margin: 5px 15px auto 15px; flex: 0 0 17px;" class="uk-radio" v-on:click="answerd_counter" type="radio" name="optradio"  v-model="rad" v-bind:value='opt2'>@{{opt2View}}</label>
                                    </div>
                                    <div class="radio" id="radio3" style="padding-right: 0; padding-left: 0;">
                                        <label style="display:flex;"><input style="margin: 5px 15px auto 15px; flex: 0 0 17px;" class="uk-radio" v-on:click="answerd_counter" type="radio" name="optradio" v-model="rad" v-bind:value='opt3'>@{{opt3View}}</label>
                                    </div>
                                    <div class="radio" id="radio4" style="padding-right: 0; padding-left: 0;">
                                        <label style="display:flex;"><input style="margin: 5px 15px auto 15px;flex: 0 0 17px;" class="uk-radio" v-on:click="answerd_counter" type="radio" name="optradio" v-model="rad" v-bind:value='opt4'>@{{opt4View}}</label>
                                    </div>

                                </div>
                                <hr>
                                <div class="row">
                                    <div class="modal" id="flagedQuestion">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">{{__('User/quiz.marked-questions')}}: </h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body flaged_body">
                                                    <div class="flagedItem" data-dismiss="modal" v-on:click="push_question_and_store_last_answer(i)" v-for='i in flaged'>@{{i}}</div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-md-1" style="  min-height: 30px; font-size: 18px; text-align: {{app()->getLocale() == 'en' ? 'left': 'right'}};">
                                        <a id="prev" v-on:click="prev">
                                            <b>  <i class="fa fa-angle-{{app()->getLocale() == 'en' ? 'left': 'right'}}" style="font-weight: bold; font-size: 21px; padding-right:5px; "></i> {{__('User/quiz.back')}}</b>
                                        </a>
                                    </div>
                                    <div class="btn-group col-md-4" style="min-height: 30px; font-size: 18px; margin-bottom: 15px;" role="group">




                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-list"></i> {{__('User/quiz.see-all-questions')}}
                                        </button>



{{--                                        <button type="button" class="btn" style="background-color: #ccc;" data-toggle="modal" data-target="#translatedQuestion">--}}
{{--                                            <i class="fa fa-language"></i> {{__('User/quiz.translate')}}--}}
{{--                                        </button>--}}

                                    </div>
                                    <div class="col-md-1" style="  min-height: 30px; font-size: 18px; text-align: {{app()->getLocale() == 'en' ? 'left': 'right'}};"></div>
                                    <div class="btn-group col-md-2" style="min-height: 30px; font-size: 18px; margin-bottom: 15px;" role="group">
                                        <a class="btn btn-warning" id="feedback_btn" style="color:white;" v-on:click="feedMeBack">
                                            <i class="fa fa-check"></i> {{__('User/quiz.see-answer')}}
                                        </a>
                                    </div>
                                    <div class="col-md-1" style="  min-height: 30px; font-size: 18px; text-align: {{app()->getLocale() == 'en' ? 'left': 'right'}};"></div>
                                    {{--                            <div class="col-md-1" style="  min-height: 30px; font-size: 18px; text-align: {{app()->getLocale() == 'en' ? 'left': 'right'}};"></div>--}}

                                    <div class="col-md-2" style="  min-height: 30px; font-size: 18px; text-align: center;">
                                        <a data-toggle="modal" data-target="#flagedQuestion" style="color:white; width:100%;" class="btn btn-danger" type="button">
                                            <i class="fa fa-flag"></i> {{__('User/quiz.marked')}}
                                        </a>
                                    </div>
                                    <div class="col-md-1" style="  min-height: 30px; text-align: {{app()->getLocale() == 'en' ? 'right': 'left'}}; font-size: 18px;margin-bottom: 15px;">
                                        <a id="next" v-on:click="next"  > <b> {{__('User/quiz.next')}} <i class="fa fa-angle-{{app()->getLocale() == 'en' ? 'right': 'left'}}" style="font-weight: bold; font-size: 21px; padding-left:5px;"></i></b>

                                        </a>
                                        <a id="finish_btn" v-on:click="Confirmation" style="display:none;" >
                                            <b>{{__('User/quiz.finish-test')}} <i class="fa fa-angle-{{app()->getLocale() == 'en' ? 'right': 'left'}}" style="font-weight: bold; font-size: 21px; padding-left:5px;"></i></b>
                                        </a>


                                    </div>

                                    <div class="modal" id="translatedQuestion" @if(app()->getLocale() == 'en') dir="rtl" style="text-align:right;" @else dir="ltr" style="text-align:left;" @endif>
                                        <div class="modal-dialog tqmd" style="min-width: 720px;">
                                            <div class="modal-content ">

                                                <!-- Modal Header -->
                                            {{--                                        <div class="modal-header">--}}
                                            {{--                                            <h4 class="modal-title">{{__('User/quiz.translated-question')}}: </h4>--}}
                                            {{--                                            <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                                            {{--                                        </div>--}}

                                            <!-- Modal body -->
                                                <div class="modal-body translatedQuestionDrag">
                                                    <div class="row" style=" font-size: 21px; border-radius: 10px !important; text-align:center; background-color: #e8ebef; font-weight:bold; margin: 10px 0 20px 0;">
                                                        <p class="col-md-12" style="margin: 8px 0; padding: 0 10px;">
                                                            @{{translatedTitle}}
                                                        </p>
                                                    </div>

                                                    <div class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%;">
                                                        <div class="radio" id="radio1" style="padding-right: 10px; padding-left: 10px;">
                                                            <label style="display:flex;">@{{translatedA}}</label>
                                                        </div>
                                                        <div class="radio" id="radio2" style="padding-right: 10px; padding-left: 10px;">
                                                            <label style="display:flex;">@{{translatedB}}</label>
                                                        </div>
                                                        <div class="radio" id="radio3" style="padding-right: 10px; padding-left: 10px;">
                                                            <label style="display:flex;">@{{translatedC}}</label>
                                                        </div>
                                                        <div class="radio" id="radio4" style="padding-right: 10px; padding-left: 10px;">
                                                            <label style="display:flex;">@{{translatedD}}</label>
                                                        </div>

                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                    </div>

                                </div>



                            </div>


                            <div class="modal" id="myModal">
                                <div class="modal-dialog" style="max-width: 80%;">
                                    <div class="modal-content">
                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">{{__('User/quiz.question-list')}}: </h4>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <table class="table table-striped table-borderless" >
                                                <thead>
                                                <tr>
                                                    <th>{{__('User/quiz.title')}}</th>
                                                    <th>{{__('User/quiz.points')}}</th>
                                                    <th>{{__('User/quiz.score')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <tr v-for="i in question_title_list">
                                                    <td data-dismiss="modal" v-on:click="push_question_and_store_last_answer(i.id)" style="cursor: pointer;">@{{i.title}}</td>
                                                    <td>1</td>
                                                    <td v-html="i.score"></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            {{--
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                            --}}

                            <div class="container-fluid result"  style="display:none;" >


                                <nav class="responsive-tab style-5 style-ma-2">
                                    <ul uk-switcher="connect: #results-marked ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                                        <li><a href="#">{{__('User/quiz.result-break-down')}}</a></li>
                                    </ul>
                                </nav>
                                <hr style="margin-top: 0; padding-top:0;">
                                <ul id="results-marked" class="uk-switcher style-ma-2 style-ma-3" @if(app()->getLocale() == 'ar') style="text-align: right;" @endif>

                                    <li id="menu1">
                                        <center>
                                            <h3>{{__('User/quiz.score-analysis')}}</h3>
                                        </center>

                                        {{-- <h4>Planning: </h4>
                                        <table class="table table-bordered score-table">
                                            <thead>
                                                <th>Question No.</th>
                                                <th>Score</th>
                                            </thead>
                                            <tbody id ="scoreAnalysisTable">
                                                <tr>
                                                    <td>10</td>
                                                    <td>1</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <h5>Need Improvment</h5> --}}

                                        <center>
                                            {{--
                                            <a v-on:click="toggle_answers(1)" class="btn red-meadow">Correct Answers</a>
                                            <a v-on:click="toggle_answers(0)" class="btn red-meadow">inCorrect Answers</a>
                                            <a v-on:click="toggle_answers(2)" class="btn red-meadow">all Answers</a>
                                            --}}
                                            <div class="row">
                                                <div class="col-md-5"></div>
                                                <div class="col-md-2">
                                                    @if($quiz)
                                                        <a class="btn btn-primary" style="color:white;" href="{{route('QuizHistory.show', $quiz->id)}}">{{__('User/quiz.review')}} </a>
                                                    @else
                                                        <a class="btn btn-primary" style="color:white;" v-if="saved_quiz_id != 0" v-on:click = "showReview">{{__('User/quiz.review')}}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </center>
                                    </li>
                                </ul>

                            </div>

                        </div>
                        <!--
                        **************************
                        **************************
                        -->
                    </div>
                </div>


                <div class="style-ma-1 bg-light">
                    <nav class="responsive-tab style-5">
                        <ul uk-switcher="connect: #course-footer ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                            <li><a >{{__('User/quiz.table-content')}}</a></li>
                            <li><a >{{__('User/quiz.test-history')}}</a></li>
                            <li><a >{{__('User/quiz.q-and-a')}}</a></li>
                        </ul>
                    </nav>
                    <hr style="margin-top: 0; padding-top:0;">
                    <ul id="course-footer" class="uk-switcher style-ma-2 style-ma-3">
                        <!-- course description -->
                        <li class="uk-open">
                            <ul class="course-path-level uk-accordion px-3" uk-accordion="">

                                <li class="@if(count(json_decode($chapters_inc))) uk-open @endif">
                                    <a class="uk-accordion-title" href="#" @click="loadTopic('chapter')" @if(app()->getLocale() == 'ar') style="text-align: right;" @endif>{{__('User/quiz.chapters')}}</a>
                                    <div class="uk-accordion-content" aria-hidden="false">
                                        <div class="path-wrap">

                                            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">

                                                <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-5@m uk-grid-match uk-grid" style="transform: translate3d(0px, 0px, 0px);">

                                                    <li tabindex="-1" class="uk-active" style="min-width: 300px;" v-for="i in chapters_inc" v-if="i.questions_number > 0">
                                                        <div class="course-card completed">
                                                            <div class="course-card-thumbnail">
                                                                <a :href="topicURL(i.key, i.id)" class="play-button-trigger show" style="background-color:gray;"> </a>
                                                                <span v-if="i.savedQuizNumber > 0" class="duration" style="background-color: #c6112d; color:white; @if(app()->getLocale() == 'ar') right:auto; left:7px; @endif" >{{__('User/quiz.saved')}}</span>
                                                            </div>
                                                            <div class="course-card-body" :style="[ i.completedQuizNumber ? {}:{border:'0'}]">
                                                                <span class="completed-text" v-if="i.completedQuizNumber"> Completed </span>
                                                                <h4 style="margin-top:0; text-overflow:unset; white-space: normal;"> @{{ language == 'en' ? i.name_en: i.name_ar }} </h4>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>

                                                <a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev uk-invisible" href="#" uk-slider-item="previous"></a>
                                                <a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next" href="#" uk-slider-item="next"></a>

                                            </div>

                                        </div>

                                    </div>
                                </li>

                                <li class="@if(count(json_decode($process_inc))) uk-open @endif">
                                    <a class="uk-accordion-title" href="#" @click="loadTopic('process')" @if(app()->getLocale() == 'ar') style="text-align: right;" @endif>{{__('User/quiz.process-groups')}}</a>
                                    <div class="uk-accordion-content" aria-hidden="false">
                                        <div class="path-wrap">

                                            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">

                                                <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-5@m uk-grid-match uk-grid" style="transform: translate3d(0px, 0px, 0px);">

                                                    <li tabindex="-1" class="uk-active" style="min-width: 300px;" v-for="i in process_inc" v-if="i.questions_number > 0">
                                                        <div class="course-card completed">
                                                            <div class="course-card-thumbnail">
                                                                <a :href="topicURL(i.key, i.id)" class="play-button-trigger show" style="background-color:gray;"> </a>
                                                                <span v-if="i.savedQuizNumber > 0" class="duration" style="background-color: #c6112d; color:white;" >{{__('User/quiz.saved')}}</span>
                                                            </div>
                                                            <div class="course-card-body" :style="[ i.completedQuizNumber ? {}:{border:'0'}]">
                                                                <span class="completed-text" v-if="i.completedQuizNumber"> Completed </span>
                                                                <h4 style="margin-top:0; text-overflow:unset; white-space: normal;"> @{{ language == 'en' ? i.name_en: i.name_ar }} </h4>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>

                                                <a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev uk-invisible" href="#" uk-slider-item="previous"></a>
                                                <a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next" href="#" uk-slider-item="next"></a>

                                            </div>

                                        </div>

                                    </div>
                                </li>

                                <li class="@if(count(json_decode($exams_inc))) uk-open @endif">
                                    <a class="uk-accordion-title" href="#" @click="loadTopic('exam')" @if(app()->getLocale() == 'ar') style="text-align: right;" @endif>{{__('User/quiz.exams')}}</a>
                                    <div class="uk-accordion-content" aria-hidden="false">
                                        <div class="path-wrap">

                                            <div class="course-grid-slider uk-slider uk-slider-container" uk-slider="finite: true">

                                                <ul class="uk-slider-items uk-child-width-1-3@m uk-child-width-1-5@m uk-grid-match uk-grid" style="transform: translate3d(0px, 0px, 0px);">

                                                    <li tabindex="-1" class="uk-active" style="min-width: 300px;" v-for="i in exams_inc" v-if="i.questions_number > 0">
                                                        <div class="course-card completed">
                                                            <div class="course-card-thumbnail">
                                                                <a :href="topicURL(i.key, i.id)" class="play-button-trigger show" style="background-color:gray;"> </a>
                                                                <span v-if="i.savedQuizNumber > 0" class="duration" style="background-color: #c6112d; color:white;" >{{__('User/quiz.saved')}}</span>
                                                            </div>
                                                            <div class="course-card-body" :style="[ i.completedQuizNumber ? {}:{border:'0'}]">
                                                                <span class="completed-text" v-if="i.completedQuizNumber"> Completed </span>
                                                                <h4 style="margin-top:0; text-overflow:unset; white-space: normal;"> @{{ language == 'en' ? i.name_en: i.name_ar }} </h4>
                                                            </div>
                                                        </div>
                                                    </li>

                                                </ul>

                                                <a class="uk-position-center-left uk-position-small uk-hidden-hover slidenav-prev uk-invisible" href="#" uk-slider-item="previous"></a>
                                                <a class="uk-position-center-right uk-position-small uk-hidden-hover slidenav-next" href="#" uk-slider-item="next"></a>

                                            </div>

                                        </div>

                                    </div>
                                </li>

                            </ul>
                        </li>
                        <li>
                            @if($package_id != 'question')
                                @php
                                    $attempt = count($quiz_history_arr);
                                @endphp
                                @foreach($quiz_history_arr as $quiz_z)

                                    <div class="row" style="margin-top: 10px; margin-bottom: 10x;">
                                        <div class="container" id="view1{{$quiz_z->quiz->id}}" style="border:1px solid #ccc; width:80%; padding: 25px 0;box-shadow: 0px 9px 15px -4px rgba(0,0,0,0.14); ">
                                            <div style="display:flex; justify-content: space-evenly; align-items:center; flex-wrap: wrap;" >
                                                <div class=""></div>
                                                <div class="">
                                                    @if($quiz_z->quiz->score >= 75)
                                                        <b style="color:darkgreen">{{__('User/quiz.success')}}</b>
                                                    @else
                                                        <b style="color:darkred">{{__('User/quiz.failed')}}</b>
                                                    @endif


                                                </div>
                                                <div class="">
                                                    <b>{{$quiz_z->quiz->score}}%</b> {{__('User/quiz.correct')}}
                                                </div>
                                                <div class="">

                                                    {{$quiz_z->hours}} {{__('User/quiz.hour')}} {{$quiz_z->mins}} {{__('User/quiz.min')}} {{$quiz_z->sec}} {{__('User/quiz.sec')}}
                                                </div>
                                                <div class="">
                                                    {{\Carbon\Carbon::parse($quiz_z->quiz->updated_at)->diffForHumans()}}
                                                </div>
                                                <div class="col-md-1">
                                                    <i class="fa fa-arrow-down" style="font-size: 25px; color:#ccc; cursor: pointer;" v-on:click="slideMe('view2{{$quiz_z->quiz->id}}', 'view1{{$quiz_z->quiz->id}}')"></i>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container" id="view2{{$quiz_z->quiz->id}}" style="border:1px solid #ccc; width:80%; padding: 25px 0;box-shadow: 0px 9px 15px -4px rgba(0,0,0,0.14);display:none;">
                                            <div class="row" >
                                                <div class="col-md-5"></div>
                                                <div class="col-md-6" style="display:flex; justify-content: space-evenly; align-items:flex-start; flex-direction:column; flex-wrap: wrap;">
                                                    <div style="font-size: 20px; margin:5px;">
                                                        Attempt {{$attempt}} :

                                                        @if($quiz_z->quiz->score >= 75)
                                                            <i style="color: darkgreen;">{{__('User/quiz.success-required')}}</i>
                                                        @else
                                                            <i style="color: darkred;">{{__('User/quiz.failed-required')}}</i>
                                                        @endif
                                                    </div>
                                                    <div style="margin:5px;">
                                                        <b style="font-size: 25px;"> {{$quiz_z->quiz->score}}% </b><small>{{__('User/quiz.correct')}}</small>
                                                    </div>
                                                    <div style="color: #ccc;margin:5px;">
                                                        {{$quiz_z->hours}} {{__('User/quiz.hour')}} {{$quiz_z->mins}} {{__('User/quiz.min')}} {{$quiz_z->sec}} {{__('User/quiz.sec')}}
                                                    </div>
                                                    <div style="color: #ccc;margin:5px;">
                                                        {{\Carbon\Carbon::parse($quiz_z->quiz->updated_at)->diffForHumans() }}
                                                    </div>
                                                    <div style="margin:5px;">
                                                        <a href="{{route('QuizHistory.show', $quiz_z->quiz->id)}}" class="btn btn-primary">{{__('User/quiz.review-questions')}}</a>
                                                    </div>

                                                </div>
                                                <div class="col-md-1">
                                                    <i class="fa fa-arrow-up" style="font-size: 25px; color:#ccc; cursor: pointer;" v-on:click="slideMe('view1{{$quiz_z->quiz->id}}', 'view2{{$quiz_z->quiz->id}}')"></i>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    @php
                                        $attempt--;
                                    @endphp
                                @endforeach
                            @endif
                        </li>
                        <li>
                            <div class="comments">
                                <ul>
                                    @foreach($comments as $fullComment)

                                        <li>
                                            @php
                                                $profile_pic = asset('assets/layouts/layout/img/avatar3_small.jpg');
                                                $comment = $fullComment->first()
                                            @endphp

                                            <div class="comments-avatar">
                                                <img src="@if($comment->profile_pic) {{asset('storage/profile_picture/'.basename($comment->profile_pic))}} @else {{$profile_pic}} @endif" alt="">
                                            </div>
                                            <div class="comment-content">
                                                <div class="comment-by">{{$comment->name}} <span>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans()}}</span>
                                                    <a @click.prevent="ShowReplyForm({{$comment->comment_id}})" class="reply"><i class="icon-line-awesome-undo"></i> {{__('User/quiz.reply')}}</a>
                                                </div>
                                                <p> {{$comment->comment}} </p>
                                            </div>

                                            <ul>
                                                <li id="reply-form-{{$comment->comment_id}}"></li>
                                                @foreach($fullComment as $reply)
                                                    @if($reply->reply_id)
                                                        <li id="reply-form-{{$reply->reply_id}}">
                                                            <div class="comments-avatar">
                                                                <img src="@if($reply->reply_profile_pic) {{asset('storage/profile_picture/'.basename($reply->reply_profile_pic))}} @else {{$profile_pic}} @endif" alt="">
                                                            </div>
                                                            <div class="comment-content">
                                                                <div class="comment-by">{{$reply->reply_name}}<span>{{\Carbon\Carbon::parse($reply->reply_created_at)->diffForHumans()}}</span>

                                                                </div>
                                                                <p> {{$reply->reply_comment}} </p>
                                                            </div>
                                                        </li>
                                                    @endif
                                                @endforeach

                                            </ul>

                                        </li>
                                    @endforeach


                                </ul>


                                <h3>{{__('User/quiz.submit-review')}}</h3>
                                <ul>
                                    <li>
                                        @php

                                            $profile_pic = '';
                                            if(Auth::check()){
                                                if(\App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first() ){
                                                    if(\App\UserDetail::where('user_id', '=', Auth::user()->id)->get()->first()->profile_pic){
                                                        $profile_pic =url('storage/profile_picture/'.basename(\App\UserDetail::where('user_id','=',Auth::user()->id)->get()->first()->profile_pic));
                                                    }else{
                                                        $profile_pic =asset('assets/layouts/layout/img/avatar3_small.jpg');
                                                    }
                                                }else{
                                                    $profile_pic =asset('assets/layouts/layout/img/avatar3_small.jpg');
                                                }
                                            }

                                        @endphp
                                        <div class="comments-avatar">
                                            <img src="{{$profile_pic}}" alt="">
                                        </div>
                                        <div class="comment-content">
                                            <form class="uk-grid-small" action="{{route('comment.store')}}" method="post" uk-grid>
                                                @csrf
                                                <input type="hidden" name="page" value="{{$topic}}">
                                                <input type="hidden" name="item_id" value="{{$topic_id}}">
                                                <div class="uk-width-1-1@s">
                                                    <label class="uk-form-label">{{__('User/quiz.comment')}}</label>
                                                    <textarea class="uk-textarea"
                                                              name="contant"
                                                              placeholder="{{__('User/quiz.enter-comment-here')}}"
                                                              style=" height:160px" required></textarea>
                                                </div>
                                                <div class="uk-grid-margin">
                                                    <input type="submit" value="{{__('User/quiz.submit')}}" class="btn btn-default">
                                                </div>
                                            </form>

                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>

            </div>

        </div>
    </div>
@endsection

@section('jscode')

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>

    <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
    <script src="https://unpkg.com/sweetalert2@7.8.2/dist/sweetalert2.all.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script src="{{asset('js/easyTimer.min.js')}}"></script>

    <script>
        var app = new Vue({
            el: '#app-1',
            data: {
                feedback: '',
                current_question_answer: '',
                rad:'',

                questions: [],
                all_questions: [],
                correct_questions: [],
                incorrect_questions: [],

                question_title_list: [],
                current_question_number: 0,
                q_number: 0,
                question_title: '',
                opt1: '',
                opt2: '',
                opt3: '',
                opt4: '',
                question_title_view: '',
                opt1View: '',
                opt2View: '',
                opt3View: '',
                opt4View: '',
                q_answerd: 0,
                q_answerd_list: [],
                user_answers:[],
                timer: new Timer(),
                timeTaken: '',
                score: 0,
                topics: null, // original response from the server [{id: , name: }, ]

                package_id: '{{$package_id}}',
                topic_type: '{{$topic}}',
                topic_id: {{$topic_id}},

                package: '{{$package_name}}',
                question_num: {{$questionNum}},
                max_questions_num: {{$questionNum}},
                img_link: '',
                make_exam: {
                    taken: 0,
                    text: 'Submit Exam'
                }, // exam has been taken or not
                ScoreMsg: '',
                scoreAnalysis: {
                    @if(count($process))
                            @foreach($process as $type)
                    '{{$type}}': {msg: '',count: 0 , data: [], score: 0},
                    @endforeach
                    @endif
                },
                scoreAnalysisByChapter: {
                    @php
                        $loaded = [];
                    @endphp
                            @if(count(\App\Chapters::where('course_id', \App\Packages::find($package_id)->course_id)->get()))

                            @foreach(\App\Chapters::all() as $type)
                            @if(!in_array($type->name, $loaded))
                    '{{$type->name}}': {msg: '',count: 0 , data: [], score: 0},
                    @endif
                    @php
                        array_push($loaded, $type->name);
                    @endphp
                    @endforeach
                    @endif
                },
                flaged: [],
                time_left: 0,
                answer_cat: 2,
                toggle_list: 0,
                rate_value: 0,
                rate_sentance: '',
                user_review: '',
                base_question_number: 0,
                last_q_answer_time_taken: 0,
                time_taken: 0,
                saved_quiz_id: 0,
                feed1: '',
                feed2: '',
                feed3: '',
                feed4: '',
                topics_included_arr: JSON.parse('{!! $topics_included_arr !!}'),
                // cx => custom exams
                cx_topic: 0,
                cx_checkedItems: [],
                cx_quiz: false,
                start_from_: 1,
                language: '{{\Session('locale')}}',

                chapters_inc: JSON.parse('{!! $chapters_inc !!}'),
                process_inc: JSON.parse('{!! $process_inc !!}'),
                exams_inc: JSON.parse('{!! $exams_inc !!}'),

            },
            created(){
                // this.cx_topic = this.topics_included_arr[0].key;
            },
            computed: {

                translatedTitle: function(){
                    if(this.questions.length > 0){
                        return this.questions[this.current_question_number-1]['title'][app.language == 'en' ? 'ar': 'en'];
                    }
                    return '';
                },
                translatedA: function(){
                    if(this.questions.length > 0){
                        return this.questions[this.current_question_number-1]['answers'][0][app.language == 'en' ? 'ar': 'en'];
                    }
                    return '';
                },
                translatedB: function(){
                    if(this.questions.length > 0){
                        return this.questions[this.current_question_number-1]['answers'][1][app.language == 'en' ? 'ar': 'en'];
                    }
                    return '';
                },
                translatedC: function(){
                    if(this.questions.length > 0){
                        return this.questions[this.current_question_number-1]['answers'][2][app.language == 'en' ? 'ar': 'en'];
                    }
                    return '';
                },
                translatedD: function(){
                    if(this.questions.length > 0){
                        return this.questions[this.current_question_number-1]['answers'][3][app.language == 'en' ? 'ar': 'en'];
                    }
                    return '';
                },
                translatedFeedback: function(){
                    if(this.questions.length > 0){
                        return this.questions[this.current_question_number-1]['feedback'][app.language == 'en' ? 'ar': 'en'];
                    }
                    return '';
                },

                selectedTopic: function(){
                    if(this.cx_topic != ''){
                        return (app.topics_included_arr.filter(function(ele) {return ele.key == app.cx_topic})[0].name);
                    }else{
                        return '';
                    }

                },
                selectedTopicContent: function(){
                    if(this.selectedTopic != ''){
                        return (app.topics_included_arr.filter(function(ele) {return ele.key == app.cx_topic})[0].content);
                    }else{
                        return [];
                    }
                }
            },
            methods: {
                loadTopic: function(topic_key){

                    exec_request = true;
                    if(topic_key == 'chapter'){
                        if(this.chapters_inc.length > 0 ) exec_request = false;
                    }else if(topic_key == 'process'){
                        if(this.process_inc.length > 0 ) exec_request = false;
                    }else if(topic_key == 'exam'){
                        if(this.exams_inc.length > 0 ) exec_request = false;
                    }

                    if(exec_request){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}',
                            }
                        });

                        $.ajax ({
                            type: 'POST',
                            url: '{{ route('load.topic')}}',
                            data: {
                                'package_id'    : app.package_id,
                                'topic'         : topic_key,
                            },
                            success: function(res){
                                if(topic_key == 'chapter'){
                                    app.chapters_inc = res;
                                }else if(topic_key == 'process'){
                                    app.process_inc = res;
                                }else if(topic_key == 'exam'){
                                    app.exams_inc = res;
                                }
                            },
                            error: function(err){console.log('error', err);}
                        });

                    }

                },
                topicURL: function(topic_key, topic_id){
                    return '{{url('')}}'+'/PremiumQuiz/'+this.package_id+'/'+topic_key+'/'+topic_id+'/preview/realtime';
                },
                isWatched: function(i_count){
                    return i_count > 0 ? 'watched':'';
                },
                openCalc: function(){
                    window.open("{{route('calculator')}}",'_blank','resizable,height=280,width=600');
                },
                openWhiteBoard: function(){
                    // window.open("https://bord-link.herokuapp.com/",'_blank','resizable,height=700,width=750');
                },
                Generate_CX: function(){
                    // this function scoop..
                    const topic = this.cx_topic;
                    const items_arr = this.cx_checkedItems.map(function(ele) { return parseInt(ele);}); // convert items from string to intager..

                    done = 0;
                    $("#ExamGenerator").hide();
                    $("#optimizeForm").hide();
                    $("#quiz").hide();
                    $("#quizLoading").show();

                    // send request to generate the questions
                    Data = {
                        topic: topic,
                        items_arr: items_arr,
                        package: this.package_id,
                    };
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log('[+] Send Request : '+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds());

                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('PremiumQuiz.generateCX')}}',
                        data: Data,
                        success: function(res){
                            if(res == '500' || res == '404'){
                                location.reload();

                            }else{

                                // console.log(res);
                                app.cx_quiz = true;

                                console.log('[+] Request Recived : '+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds());
                                console.log('[+] Start processing');

                                app.q_number = res[0].length;
                                app.question_num = res[0].length;

                                app.current_question_number = 1;
                                app.questions = res[0];
                                if(res[2]){
                                    app.q_answerd = res[2];
                                }else{
                                    app.q_answerd = 0;
                                }

                                app.all_questions = res[0];

                                app.all_questions.forEach(ele => {
                                    if( ele['correct_answer'] == ele['user_saved_answer']){
                                        app.correct_questions.push(ele);
                                    }else{
                                        app.incorrect_questions.push(ele);
                                    }
                                });




                                counter = 1;
                                res[0].forEach(ele => {
                                    if(ele) {
                                        app.question_title_list.push({
                                            id: counter,
                                            title: counter + '. ' + ele['title'][app.language].substring(0, 80) + '..',
                                            score: 0,
                                        });
                                        counter++;
                                    }
                                });






                                c = 1;
                                start_question_no = 1;

                                app.questions.forEach(q => {
                                    if(q['user_saved_answer'] != ''){
                                        start_question_no = c;
                                    }
                                    app.user_answers.push({
                                        question_num: c,
                                        question_id: q['id'],
                                        user_answer: q['user_saved_answer'],
                                        correct_answer: q['correct_answer'],
                                        process_group: q['process_group'],
                                        chapter: q['chapter'],
                                        flaged: false,
                                    });
                                    c++;
                                });
                                app.current_question_number = start_question_no;
                                app.push_question(app.current_question_number);

                                app.base_question_number = app.question_num - app.q_answerd;
                                app.selectUserAnswer();
                                app.timer.start({countdown: true, startValues: {seconds: (app.base_question_number) * 72 } });
                                app.timer.addEventListener('secondsUpdated', function (e) {
                                    $('#timer').html((app.timer.getTimeValues().hours * 60 + app.timer.getTimeValues().minutes) + ':'+app.timer.getTimeValues().seconds);

                                    app.time_taken = (app.base_question_number * 72) - ((app.timer.getTimeValues().days * 24 * 3600 ) + (app.timer.getTimeValues().hours * 3600) + (app.timer.getTimeValues().minutes * 60) +(app.timer.getTimeValues().seconds));
                                });

                                app.timer.addEventListener('targetAchieved', function(e){
                                    app.markExam({ value: 1});
                                });



                                done = 1;



                                while(1){
                                    if(done == 1){

                                        console.log('[+] Respond is Ready : '+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds());

                                        @if($quiz != null)
                                        @if($quiz->complete == 1)
                                        app.markExam();
                                        @else
                                        app.update_progress();
                                        @endif

                                        @else

                                        app.update_progress();
                                        @endif

                                            break;
                                    }
                                }

                            }
                        },
                        error: function(res){
                            console.log('Error:', res);
                        }
                    });

                    // show the quiz form and fire the timer on

                    $("#quiz").show();
                    $("#quizLoading").hide();
                    $("#prev").hide();
                    if(app.question_num <= 1){
                        $("#next").hide();
                    }


                },
                clearCheckedItems: function(){
                    this.cx_checkedItems = [];
                },
                toggleCorrectAnswer: function(){
                    $("#radio1");
                    $("#radio2");
                    $("#radio3");
                    $("#radio4");

                    switch (this.questions[this.current_question_number-1].correct_answer) {
                        case this.opt1:
                            $("#radio1").css('border', '3px solid green');
                            break;
                        case this.opt2:
                            $("#radio2").css('border', '3px solid green');
                            break;
                        case this.opt3:
                            $("#radio3").css('border', '3px solid green');
                            break;
                        case this.opt4:
                            $("#radio4").css('border', '3px solid green');
                            break;
                    }

                    // setTimeout(function () {
                    //     $("#radio1").css('border', '1px solid gray');
                    //     $("#radio2").css('border', '1px solid gray');
                    //     $("#radio3").css('border', '1px solid gray');
                    //     $("#radio4").css('border', '1px solid gray');
                    // }, 3000);

                },
                showReview: function(){
                    uri = '{{route('QuizHistory.show', '')}}/'+this.saved_quiz_id;
                    window.location.href = uri;
                },
                slideMe: function(show, hide){
                    $('#'+show).slideDown();
                    $('#'+hide).slideUp();
                },
                _: function (ele) {
                    return document.getElementById(ele);
                },
                post_review: function () {
                    Data = {
                        user_review: this.user_review,
                        package_id: this.package_id
                    };


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('user.review')}}',
                        data: Data,
                        success: function (res) {
                        },
                        error: function (res) {
                            console.log('Error:', res);
                        }


                    });

                },
                rate_state: function (r_s) {
                    this.rate_sentance = r_s;
                },
                rate: function () {

                    Data = {
                        rate: this.rate_value,
                        package_id: this.package_id
                    };


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}',
                        }
                    });

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('user.rate')}}',
                        data: Data,
                        success: function (res) {
                            $("#rateTextBox").slideDown();
                        },
                        error: function (res) {
                            console.log('Error:', res);
                        }


                    });


                },
                ShowReplyForm: function (comment_id) {
                    if (this._('reply-form-' + comment_id).innerHTML == '') {
                        this._('reply-form-' + comment_id).innerHTML = '<div class="row"><div class="col-md-10 col-md-offset-2"><form action="{{route("comment.reply")}}" method="post">@csrf<input type="hidden" name="reply_to_id" value="'+comment_id+'"><div class="form-group col-md-8" style="padding-left: 0 !important;"><textarea rows="1" name="contant" placeholder="Write comment here ..." class="form-control c-square" required></textarea></div><div class="form-group col-md-4"><div class="row"><button type="submit" class="btn blue uppercase btn-md col-md-6 sbold">Reply</button></div></div></form></div></div>';
                    } else {
                        this._('reply-form-' + comment_id).innerHTML = '';
                    }
                },
                removeReplyForm: function (comment_id) {
                    this._('reply-form-' + comment_id).innerHTML = '';
                },
                toggle_right_list: function(){
                    $(".right_list").slideToggle();
                    if(this.toggle_list == 0){
                        $("#arrow").addClass('fa-arrow-left');
                        $("#arrow").removeClass('fa-arrow-right');
                        $("#quiz_app_container").addClass('col-md-12');
                        $("#quiz_app_container").removeClass('col-md-8');
                        this.toggle_list = 1;
                    }else{
                        $("#quiz_app_container").removeClass('col-md-12');
                        $("#quiz_app_container").addClass('col-md-8');
                        $("#arrow").removeClass('fa-arrow-left');
                        $("#arrow").addClass('fa-arrow-right');

                        this.toggle_list = 0;
                    }
                },
                _:function(ele){
                    return document.getElementById(ele);
                },
                update_progress: function(add){
                    if(app.make_exam.taken == 0){
                        percent = Math.round((app.q_answerd)/app.q_number*100);
                        // $('.progress-bar').attr('aria-valuenow', percent);
                        this._('progress_bar').style.width = percent+'%';
                        console.log(percent);
                        this._('progress_bar').innerHTML = percent.toString().substr(0,5)+' %';
                    }
                },
                toggle_answers: function(){



                    if(this.answer_cat == 1){
                        // correct answers
                        if(app.correct_questions.length != 0){
                            questions_list = app.correct_questions;
                        }else{
                            alert("All answers are false !");
                            questions_list = app.all_questions;
                        }


                    }else if (this.answer_cat == 2){
                        // all questions
                        questions_list = app.all_questions;
                    }else{
                        // incorrect questions
                        if(app.incorrect_questions.length != 0){
                            questions_list = app.incorrect_questions;
                        }else{
                            alert("All answers are correct !");
                            questions_list = app.all_questions;
                        }
                    }




                    app.q_number = questions_list.length;
                    app.current_question_number = 1;
                    app.questions = questions_list;

                    app.q_answerd = questions_list.length;

                    counter = 1;
                    app.question_title_list = [];

                    questions_list.forEach(ele => {
                        if(ele) {
                            app.question_title_list.push({
                                id: counter,
                                title: counter + '. ' + ele['title'][app.language].substring(0, 80) + '..',
                                score: 0,
                            });
                            counter++;
                        }
                    });

                    app.push_question(app.current_question_number);

                    done=0;

                    c = 1;
                    app.user_answers = [];
                    app.questions.forEach(q => {
                        app.user_answers.push({
                            question_num: c,
                            question_id: q['id'],
                            user_answer: q['user_saved_answer'],
                            correct_answer: q['correct_answer'],
                            process_group: q['process_group'],
                            chapter: q['chapter']
                        });
                        c++;
                    });

                    done = 1;
                    $("#prev").hide();
                    while(1){
                        if(done){
                            app.selectUserAnswer();
                            app.selectCorrectAnswer();
                            break;
                        }
                    }


                    this.return_to_quiz();



                },
                continueQuize: function(){
                    this.timer.start();
                    $("#quiz").show();
                    $('#optimizeForm').hide();
                    $('#startQuiz').show();
                    $('#continueQuiz').hide();
                    // $('#saveforlateron').hide();
                },
                stopTimer_pause: function(){
                    this.timer.pause();
                    this.storeAnswers();
                    $("#quiz").hide();
                    $('#optimizeForm').show();
                    $('#startQuiz').hide();
                    $('#continueQuiz').show();
                    // $('#saveforlateron').show();

                    // if(this.package == 'test'){
                    //     $('#saveforlateron').hide();
                    // }
                },
                storeAnswers:function(){
                    this.user_answers.forEach(ele => {
                        if(ele.question_num == this.current_question_number){
                            nextFlageValue = false;
                            this.flaged.forEach(ele => {
                                if(ele == this.current_question_number)
                                {
                                    nextFlageValue = true;
                                }
                            });
                            if(ele.user_answer != this.rad || ele.flaged != nextFlageValue){

                                // store answer
                                ele.user_answer = this.rad;
                                // store flage value
                                ele.flaged = nextFlageValue;
                                // store in database !
                                // (id, answer)

                                this.storeToDB(ele);

                            }
                        }
                    });
                },
                answerd_counter: function(){
                    if(!this.q_answerd_list.includes(this.current_question_number)){
                        this.q_answerd_list.push(this.current_question_number);
                        this.q_answerd++;
                    }
                },
                optimizeQuiz: function(){

                    done = 0;

                    $("#optimizeForm").hide();
                    $("#quiz").hide();

                    $("#quizLoading").show();

                    // send request to generate the questions
                    Data = {
                        num: this.question_num,
                        topic: this.topic_type,
                        topic_id: this.topic_id,
                        package: this.package_id,
                        quiz_id: @if($quiz) {{$quiz->id}} @else 'realtime' @endif
                    };


                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    console.log('[+] Send Request : '+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds());

                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('PremiumQuiz.generate')}}',
                        data: Data,
                        success: function(res){
                            $("#quiz").show();
                            $("#quizLoading").hide();

                            if(res == '500' || res == '404'){
                                location.reload();

                            }else{
                                console.log(res);
                                console.log(res[3]);
                                console.log('[+] Request Recived : '+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds());
                                console.log('[+] Start processing');

                                app.start_from_ = res[3];

                                app.q_number = res[0].length;
                                app.current_question_number = 1;
                                app.questions = res[0];
                                if(res[2]){
                                    app.q_answerd = res[2];
                                }else{
                                    app.q_answerd = 0;
                                }

                                app.all_questions = res[0];

                                app.all_questions.forEach(ele => {
                                    if( ele['correct_answer'] == ele['user_saved_answer']){
                                        app.correct_questions.push(ele);
                                    }else{
                                        app.incorrect_questions.push(ele);
                                    }
                                });




                                counter = 1;
                                res[0].forEach(ele => {
                                    app.question_title_list.push({
                                        id: counter,
                                        title: counter+'. '+ele['title']['en'].substring(0,80)+'..',
                                        score: 0,
                                    });
                                    counter++;
                                });






                                c = 1;
                                start_question_no = 1;



                                app.questions.forEach(q => {
                                    if(q['user_saved_answer'] != ''){
                                        start_question_no = c;
                                    }
                                    app.user_answers.push({
                                        question_num: c,
                                        question_id: q['id'],
                                        user_answer: q['user_saved_answer'] ? q['user_saved_answer']: '',
                                        correct_answer: q['correct_answer'],
                                        process_group: q['process_group'],
                                        chapter: q['chapter'],
                                        flaged: q['flaged'],
                                    });
                                    if(q['flaged']){
                                        app.flaged.push(c);
                                    }
                                    c++;
                                });
                                app.current_question_number = start_question_no;
                                app.push_question(app.current_question_number);

                                app.base_question_number = app.question_num - app.q_answerd;
                                app.selectUserAnswer();
                                app.timer.start({countdown: true, startValues: {seconds: (app.base_question_number) * 72 } });
                                app.timer.addEventListener('secondsUpdated', function (e) {
                                    $('#timer').html((app.timer.getTimeValues().hours * 60 + app.timer.getTimeValues().minutes) + ':'+app.timer.getTimeValues().seconds);
                                    app.time_taken = (app.base_question_number * 72) - ((app.timer.getTimeValues().days * 24 * 3600 ) + (app.timer.getTimeValues().hours * 3600) + (app.timer.getTimeValues().minutes * 60) +(app.timer.getTimeValues().seconds));
                                });
                                // app.timer.addEventListener('targetAchieved', function(e){
                                //     app.markExam({ value: 1});
                                // });


                                //check the question number to adjustfy the next and prev btns
                                if(app.current_question_number == app.q_number && app.q_number > 1){
                                    $("#prev").show();
                                    $("#next").hide();
                                }else if(app.current_question_number == 1 && app.q_number > 1){
                                    $("#next").show();
                                    $("#prev").hide();
                                }else if(app.current_question_number == app.q_number && app.q_number == 1){
                                    $("#prev").hide();
                                    $("#next").hide();
                                }else {
                                    $("#next").show();
                                    $("#prev").show();
                                }

                                done = 1;



                                while(1){
                                    if(done == 1){

                                        console.log('[+] Respond is Ready : '+new Date().getHours()+':'+new Date().getMinutes()+':'+new Date().getSeconds());

                                        @if($quiz != null)
                                        @if($quiz->complete == 1)

                                        @else
                                        app.update_progress();
                                        @endif

                                        @else

                                        app.update_progress();
                                        @endif

                                            break;
                                    }
                                }

                            }
                        },
                        error: function(res){
                            console.log('Error:', res);
                        }
                    });

                    // show the quiz form and fire the timer on




                    $("#prev").hide();
                    if(app.question_num <= 1){
                        $("#next").hide();
                    }






                },
                push_question: function(CQN/* Current question Number */){
                    this.question_title = this.questions[CQN-1]['title'][this.language];

                    this.opt1 = this.questions[CQN-1]['answers'][0]['en'];
                    this.opt2 = this.questions[CQN-1]['answers'][1]['en'];
                    this.opt3 = this.questions[CQN-1]['answers'][2]['en'];
                    this.opt4 = this.questions[CQN-1]['answers'][3]['en'];

                    this.opt1View = this.questions[CQN-1]['answers'][0][this.language];
                    this.opt2View = this.questions[CQN-1]['answers'][1][this.language];
                    this.opt3View = this.questions[CQN-1]['answers'][2][this.language];
                    this.opt4View = this.questions[CQN-1]['answers'][3][this.language];

                    this.feedback = this.questions[CQN-1]['feedback'][this.language];
                    this.question_id = this.questions[CQN-1]['id'];
                    this.current_question_answer = this.questions[CQN-1]['correct_answer'];
                    if(this.questions[CQN-1]['img'] != 'null'){
                        this.img_link = '{{url('')}}/storage/questions/'+this.questions[CQN-1]['img'];
                        $("#fig").show();
                    }else{
                        this.img_link = '';
                        $("#fig").hide();
                    }

                },
                push_question_and_store_last_answer: function(QN /* question number */){

                    if(!this.cx_quiz){
                        this.storeAnswers();
                    }

                    this.push_question(QN);
                    this.current_question_number = QN;
                    this.selectUserAnswer();


                    //check the question number to adjustfy the next and prev btns
                    if(this.current_question_number == this.q_number && this.q_number > 1){
                        $("#prev").show();
                        $("#next").hide();
                        if(app.make_exam.taken == 0){
                            $("#finish_btn").show();
                        }
                    }else if(this.current_question_number == 1 && this.q_number > 1){
                        $("#next").show();
                        $("#prev").hide();
                    }else if(this.current_question_number == this.q_number && this.q_number == 1){
                        $("#prev").hide();
                        $("#next").hide();
                        if(app.make_exam.taken == 0){
                            $("#finish_btn").hide();
                        }
                    }else {
                        $("#next").show();
                        $("#prev").show();
                    }
                    if(this.make_exam.taken == 1){
                        this.selectCorrectAnswer();
                    }
                    this.colorMyflag();
                },
                next: function(){
                    // store the answer if exist
                    @if($quiz)

                            @if($quiz->complete == 0)
                        this.update_progress();
                    @endif
                            @else

                        this.update_progress();
                    @endif

                        this.storeAnswers();

                    //show the next question
                    if((this.current_question_number+2) > this.q_number){
                        $("#next").hide();
                        if(app.make_exam.taken == 0){
                            $("#finish_btn").show();
                        }
                        $("#prev").show();
                    }else{
                        $("#prev").show();

                    }
                    this.current_question_number++;


                    this.push_question(this.current_question_number);

                    //select the answer if exits
                    this.selectUserAnswer();
                    if(this.make_exam.taken == 1){
                        this.selectCorrectAnswer();
                    }
                    this.colorMyflag();

                    $("#radio1").css('border', '1px solid gray');
                    $("#radio2").css('border', '1px solid gray');
                    $("#radio3").css('border', '1px solid gray');
                    $("#radio4").css('border', '1px solid gray');

                },
                prev: function(){
                    // store the answer if exist
                    @if($quiz)

                            @if($quiz->complete == 0)
                        this.update_progress();
                    @endif
                            @else

                        this.update_progress();
                    @endif

                        this.storeAnswers();


                    //show the previous question
                    if((this.current_question_number - 2) < 1){
                        $("#prev").hide();
                        $("#next").show();

                    }else{
                        $("#next").show();
                        if(app.make_exam.taken == 0){
                            $("#finish_btn").hide();
                        }
                    }
                    this.current_question_number--;
                    this.push_question(this.current_question_number);
                    //select the answer if exits
                    this.selectUserAnswer();
                    if(this.make_exam.taken == 1){
                        this.selectCorrectAnswer();
                    }
                    this.colorMyflag();

                    $("#radio1").css('border', '1px solid gray');
                    $("#radio2").css('border', '1px solid gray');
                    $("#radio3").css('border', '1px solid gray');
                    $("#radio4").css('border', '1px solid gray');
                },
                unselectRadio: function(){
                    this.rad = '';
                },
                selectUserAnswer: function(){

                    found = 0;
                    this.user_answers.forEach(ele => {
                        if(ele.question_num == this.current_question_number){
                            this.rad = ele.user_answer;
                            found = 1;
                        }
                    });
                    if (!found){
                        this.unselectRadio();

                    }
                },
                selectCorrectAnswer: function(){
                    $("#radio1").find('.fa').remove();
                    $("#radio2").find('.fa').remove();
                    $("#radio3").find('.fa').remove();
                    $("#radio4").find('.fa').remove();

                    switch (this.questions[this.current_question_number-1].correct_answer) {
                        case this.opt1:
                            $("#radio1").prepend('<i class="fa fa-check" style="margin: 8px 0 0 -35px; color: green; position: absolute;"></i>');
                            break;
                        case this.opt2:
                            $("#radio2").prepend('<i class="fa fa-check" style="margin: 8px 0 0 -35px; color: green; position: absolute;"></i>');
                            break;
                        case this.opt3:
                            $("#radio3").prepend('<i class="fa fa-check" style="margin: 8px 0 0 -35px; color: green; position: absolute;"></i>');
                            break;
                        case this.opt4:
                            $("#radio4").prepend('<i class="fa fa-check" style="margin: 8px 0 0 -35px; color: green; position: absolute;"></i>');
                            break;
                    }
                },

                Confirmation: function(){

                    swal({
                        title: 'Are you sure you want to end the exam ?',
                        type: 'warning',
                        showCancelButton: true,
                        //   confirmButtonColor: '#DD6B55',
                        confirmButtonText: 'Yes',
                        cancelButtonText: 'No'
                    }).then(app.markExam);


                },
                markExam: function(confirmation){



                    if(app.make_exam.taken == 0){
                        @if($quiz)
                                @if($quiz->complete == 0)
                        if(confirmation.value == 1){
                            conf = 1;
                        }else{
                            conf= 0;
                        }

                        @else
                            conf = 1;
                        @endif
                                @else
                        if(confirmation.value == 1){
                            conf = 1;
                        }else{
                            conf= 0;
                        }
                        @endif

                        if(conf){

                            // stop the timer and stor the time .
                            if(this.package_id != 'question' && !app.cx_quiz) {
                                this.storeAnswers();
                            }



                            app.timer.pause();
                            // this.timeTaken = $("#timer").html();
                            @if($quiz)
                            @if($quiz->complete == 0)
                            $("#quiz").hide();
                            @endif
                            @else
                            $("#quiz").hide();
                            @endif

                                counter = 0;
                            this.user_answers.forEach(ele => {
                                if(ele.user_answer == ele.correct_answer){
                                    this.score++;
                                    this.question_title_list[counter].score = '1  <i class="fa fa-check" style="color:green"></i>';


                                }else{
                                    this.question_title_list[counter].score = '0 <i class="fa fa-times" style="color: red"></i>';
                                }

                                counter++;
                            });


                            this.score /= this.q_number;
                            this.score *= 100;
                            this.score = Math.round(this.score);

                            if(this.score > 75){
                                this.ScoreMsg = '<h4 style="font-weight:bold">{{__('User/quiz.overall-performance')}}: <b style="color:springgreen;">{{__('User/quiz.passed')}}</b></h4>You have passed the exam, congratulations.';
                            }else{
                                this.ScoreMsg = '<h4 style="font-weight:bold">{{__('User/quiz.overall-performance')}}: <b style="color:#DC143C;">{{__('User/quiz.failed')}}</b></h4>You have failed your exam, you must improve to get certified.';
                            }

                            // score analysis..

                            this.user_answers.forEach(answer => {
                                score = 0;
                                if(answer.user_answer == answer.correct_answer){
                                    score = 1;
                                }
                                this.scoreAnalysis[answer.process_group].data.push({
                                    q_num: answer.question_num,
                                    q_score: score,
                                    chapter: answer.chapter
                                });
                                this.scoreAnalysisByChapter[answer.chapter].data.push({
                                    q_num: answer.question_num,
                                    q_score: score
                                });
                            });
                            // calculate number of question per process group..
                            for(i in this.scoreAnalysis){
                                this.scoreAnalysis[i].count = this.scoreAnalysis[i].data.length;
                            }

                            for(i in this.scoreAnalysisByChapter){
                                this.scoreAnalysisByChapter[i].count = this.scoreAnalysisByChapter[i].data.length;
                            }


                            // generate the massage
                            number_de_correct_answers = 0;
                            for(i in this.scoreAnalysis){
                                this.scoreAnalysis[i].data.forEach(ele => {
                                    if(ele.q_score == 1){
                                        number_de_correct_answers++;
                                    }
                                });
                                process_score = number_de_correct_answers / this.scoreAnalysis[i].count;
                                process_score *= 100;
                                process_score = Math.round(process_score);

                                if(process_score <= 64){
                                    this.scoreAnalysis[i].msg = '<i style="color: red;">{{__('User/quiz.need-improve')}}</i>';
                                }else if(process_score > 65 && process_score<=74){
                                    this.scoreAnalysis[i].msg = '<i style="color: red;">{{__('User/quiz.below-target')}}</i>';
                                }else if(process_score >= 75 && process_score < 84){
                                    this.scoreAnalysis[i].msg = '<i style="color: #999900;">{{__('User/quiz.target')}}</i>';
                                }else if(process_score >= 85){
                                    this.scoreAnalysis[i].msg = '<i style="color:green;">{{__('User/quiz.above-target')}}</i>';
                                }
                                number_de_correct_answers = 0;
                            }
                            // delete unused process groups from the object..
                            for(i in this.scoreAnalysis){
                                if(this.scoreAnalysis[i].count == 0){
                                    delete this.scoreAnalysis[i];
                                }

                            }



                            number_de_correct_answers = 0;
                            for(i in this.scoreAnalysisByChapter){
                                this.scoreAnalysisByChapter[i].data.forEach(ele => {
                                    if(ele.q_score == 1){
                                        number_de_correct_answers++;
                                    }
                                });
                                chapter_score = number_de_correct_answers / this.scoreAnalysisByChapter[i].count;
                                chapter_score *= 100;
                                chapter_score = Math.round(chapter_score);
                                this.scoreAnalysisByChapter[i].score = chapter_score;

                                if(chapter_score <= 64){
                                    this.scoreAnalysisByChapter[i].msg = '<i style="color: red;">{{__('User/quiz.need-improve')}}</i>';
                                }else if(chapter_score > 65 && chapter_score<=74){
                                    this.scoreAnalysisByChapter[i].msg = '<i style="color: red;">{{__('User/quiz.below-target')}}</i>';
                                }else if(chapter_score >= 75 && chapter_score < 84){
                                    this.scoreAnalysisByChapter[i].msg = '<i style="color: #999900;">{{__('User/quiz.target')}}</i>';
                                }else if(chapter_score >= 85){
                                    this.scoreAnalysisByChapter[i].msg = '<i style="color:green;">{{__('User/quiz.above-target')}}</i>';
                                }
                                number_de_correct_answers = 0;
                            }
                            // delete unused chapters from the object..
                            for(i in this.scoreAnalysisByChapter){
                                if(this.scoreAnalysisByChapter[i].count == 0){
                                    console.log(i+': '+this.scoreAnalysisByChapter[i].count);
                                    delete this.scoreAnalysisByChapter[i];

                                }

                            }

                            // generate the analysis with jquery ..


                            table_head = $("#table_head");
                            head_html_ = '';

                            for(var k in this.scoreAnalysis){
                                if(this.scoreAnalysis.hasOwnProperty(k)){
                                    head_html_ += '<th style="text-align:center">'+k+'</th>';
                                }
                            }
                            table_head.append(head_html_);

                            table_head = $("#table_body");
                            head_html_ = '';

                            for(var k in this.scoreAnalysis){
                                if(this.scoreAnalysis.hasOwnProperty(k)){
                                    head_html_ += '<td style="text-align:center">'+this.scoreAnalysis[k].msg+'</td>';
                                }
                            }
                            table_head.append(head_html_);

                            r = $("#menu1");
                            html_ = '<h3 style="color:#5bbae3; text-decoration:underline;" >{{__('User/quiz.result-chapters')}}: </h3><table class="table table-bordered table-hover"><thead><th>{{__('User/quiz.knowledge-area')}}</th><th>{{__('User/quiz.no-questions')}}</th><th>{{__('User/quiz.correct-answers')}}</th><th>%{{__('User/quiz.correct')}}</th></thead><tbody>';
                            for(var k in this.scoreAnalysisByChapter){
                                if(this.scoreAnalysisByChapter.hasOwnProperty(k)){

                                    html_ += '<tr><td>'+k+'</td><td>'+this.scoreAnalysisByChapter[k].count+'</td><td>'+Math.round(this.scoreAnalysisByChapter[k].count * this.scoreAnalysisByChapter[k].score /100) +'</td><td>'+this.scoreAnalysisByChapter[k].score+'</td></tr>';

                                    // this.scoreAnalysisByChapter[k].data.forEach(x => {
                                    //     if(x.q_score == 1){
                                    //         html_ += '<tr><td>'+x.q_num+'</td><td><i class="fa fa-check" style="color:green"></i></td><td>'+k+'</td></tr>';
                                    //     }else{
                                    //         html_ += '<tr><td>'+x.q_num+'</td><td><i class="fa fa-times" style="color: red"></i></td><td>'+k+'</td></tr>';
                                    //     }
                                    // });


                                }
                            }
                            html_ += '</tbody></table>';
                            r.append(html_);
                            html_ = '';

                            r = $("#menu1");
                            html_ = '<h3 style="color:#5bbae3; text-decoration:underline;" >{{__('User/quiz.result-process')}}: </h3><table class="table table-bordered table-hover"><thead><th>{{__('User/quiz.question-no')}}</th><th>{{__('User/quiz.process-group')}}</th><th>{{__('User/quiz.knowledage-area')}}</th><th>{{__('User/quiz.score')}}</th></thead><tbody>';
                            for(var k in this.scoreAnalysis){
                                if(this.scoreAnalysis.hasOwnProperty(k)){
                                    this.scoreAnalysis[k].data.forEach(x => {
                                        if(x.q_score == 1){
                                            html_ += '<tr><td>'+x.q_num+'</td><td>'+k+'</td><td>'+x.chapter+'</td><td><i class="fa fa-check" style="color:green"></i></td></tr>';
                                        }else{
                                            html_ += '<tr><td>'+x.q_num+'</td><td>'+k+'</td><td>'+x.chapter+'</td><td><i class="fa fa-times" style="color: red"></i></td></tr>';
                                        }
                                    });


                                }
                            }
                            html_ += '</tbody></table>';
                            r.append(html_);
                            html_ = '';









                            this.make_exam.taken = 1;
                            this.make_exam.text = '{{__('User/quiz.your-score')}}';

                            this.selectCorrectAnswer();

                            $("#feedback_btn").show();
                            $(".result").show();
                            $("#pause").hide();

                            if(app.last_q_answer_time_taken != 0){
                                timeI = (app.time_taken - app.last_q_answer_time_taken);
                            }else{
                                timeI = app.time_taken;
                            }

                            app.last_q_answer_time_taken = app.time_taken;


                            console.log(timeI);

                            Data = {
                                totalScore: app.score,
                                question_num: app.q_number,
                                package: app.package,
                                package_id: app.package_id,
                                topic_type: app.topic_type,
                                topic_id: app.topic_id,
                                time_left: timeI,
                            };



                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            if(this.package_id != 'question' && !app.cx_quiz){
                                $.ajax ({
                                    type: 'POST',
                                    url: '{{ route('PremiumQuiz.scoreStore')}}',
                                    data: Data,
                                    success: function(res){
                                        console.log(res);
                                        console.log('done');
                                    },
                                    error: function(res){
                                        console.log('Error:', res);
                                    }
                                });
                            }

                            $("#toggle_answers").show();
                            $("#q_number").show();
                            $("#finish_btn").hide();

                            @if($quiz)
                            @if($quiz->complete == 1)
                            $(".result").hide();
                            @endif
                            @endif
                        }

                    }else{
                        $("#quiz").hide();
                        $(".result").show();
                    }

                },
                return_to_quiz: function(){
                    $(".result").hide();
                    $("#quiz").show();
                },
                flagMe: function(){
                    located = 0;
                    this.flaged.forEach(ele => {
                        if(ele == this.current_question_number)
                        {
                            //remove from array
                            this.flaged.splice(this.flaged.indexOf(this.current_question_number), 1);
                            located = 1;
                        }
                    });
                    if(located == 0 ){
                        // add it to array
                        this.flaged.push(this.current_question_number);
                    }
                    // add color,
                    this.colorMyflag();
                },
                colorMyflag:function(){
                    located = 0;
                    this.flaged.forEach(ele => {
                        if(ele == this.current_question_number){
                            //color to red
                            $("#flag").css('color','red');
                            located =1;
                        }
                    });
                    if(located ==  0)
                    {
                        $("#flag").css('color','gray');
                    }
                },
                feedMeBack: function(){
                    this.toggleCorrectAnswer();
                    window.open("{{url('PremiumQuiz/feedback')}}/"+this.question_id,'_blank','resizable,height=350,width=500');
                    return false;
                },
                translateMe: function(){
                    window.open("{{url('PremiumQuiz/question')}}/"+this.question_id+'?a='+this.opt1+'&b='+this.opt2+'&c='+this.opt3+'&d='+this.opt4,'_blank','resizable,height=500,width=700');
                    return false;
                },
                saveForLaterOn: function(e){



                    answers_arr = [];
                    app.user_answers.forEach(i => {
                        answers_arr.push([i.question_id, i.user_answer]);
                    });


                    answered_question_number = app.q_answerd;

                    if(answered_question_number < this.question_num){
                        $('.optimization_form').hide();
                        $('.saving_form').show();



                        Data = {
                            num: this.question_num,
                            topic: this.topic_type,
                            topic_id: this.topic_id,
                            package: this.package_id,
                            answers: answers_arr,
                            time_left: app.time_taken,
                            answered_number: answered_question_number
                        };

                        e.preventDefault();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        $.ajax ({
                            type: 'POST',
                            url: '{{ route('saveForLaterOn')}}',
                            data: Data,
                            success: function(res){
                                $('.saving_form').html('<b style="color:green"> Your answers have been saved, and you can access then any time .</b>');
                            },
                            error: function(res){
                                console.log('Error:', res);
                            }
                        });
                    }else{
                        alert('you already have done the exam, please submit the exam !');
                    }
                },
                storeToDB: function(answerObject /** [question_id, user_answer, flaged ]*/){

                    id = answerObject.question_id;
                    answer = answerObject.user_answer;
                    flaged = answerObject.flaged ? 1 : 0;

                    if(app.last_q_answer_time_taken != 0){
                        timeI = (app.time_taken - app.last_q_answer_time_taken);
                    }else{
                        timeI = app.time_taken;
                    }

                    app.last_q_answer_time_taken = app.time_taken;


                    Data = {
                        topic: this.topic_type,
                        topic_id: this.topic_id,
                        package: this.package_id,
                        questions_number: app.question_num,
                        question_id: id,
                        user_answer: answer,
                        time_left: timeI,
                        flaged: flaged,
                        start_from_: this.start_from_,
                    };

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    if(answer){
                        $.ajax ({
                            type: 'POST',
                            url: '{{ route('saveForLaterOn')}}',
                            data: Data,
                            success: function(res){
                                console.log('stored !');
                                // console.log(res);
                                app.saved_quiz_id = res;
                            },
                            error: function(res){
                                console.log('Error:', res);
                                location.reload();
                            }
                        });
                    }

                }

            }
        });
    </script>





@endsection


