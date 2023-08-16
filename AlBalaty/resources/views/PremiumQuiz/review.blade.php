@extends('layouts.layoutV2')

@section('head')
<style>
    
    /* .fa-star {
        font-size: 120px;
        color: black;
    }
    .checked ,.fa-star:hover{
        color: orange;
    } */
    .radio {
        display: block;
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
    font-size:120px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
    
}
.rate > input:checked ~ label {
    color: #ffc700;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #deb217;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #c59b08;
}


    
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content')

<div class="page-content-wrapper">
    
    <!-- BEGIN CONTENT BODY -->
    <div class="page-content" id="app-1">
        <nav class="responsive-tab style-5 style-ma-2">
            <ul uk-switcher="connect: #mainTaps ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                <li><a href="#">{{__('User/quiz.review')}}</a></li>
                <li><a href="#">{{__('User/quiz.view-score-report')}}</a></li>
            </ul>
        </nav>
        <hr style="margin-top: 0; padding-top:0;">
        <ul id="mainTaps" class="uk-switcher style-ma-2 style-ma-3">
            <li class="uk-active">
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-12 form-1" id="quiz_app_container" style="">



                            {{-- Quiz View --}}
                            {{--
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                *******************************
                                --}}

                            <div id="loading1">
                                {{__('User/quiz.please-wait')}}
                            </div>
                            <div id="quiz" style="display:none;">
                                <div class="row">
                                    <div class="col-md-9"></div>
                                    <div class="col-md-3 ">
                                        <select class="uk-input" v-model="toggle_value" style="margin:10px 0; width:100%;" v-on:change="toggle_answers" id = "toggle_answers">
                                            <option value="3">{{__('User/quiz.all')}}</option>
                                            <option value="0">{{__('User/quiz.incorrect')}}</option>
                                            <option value="1">{{__('User/quiz.correct')}}</option>
                                            <option value="2">{{__('User/quiz.skipped')}}</option>
                                            <option value="4">{{__('User/quiz.flaged')}}</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="container-fluid primeQuizViewWM"   id="quiz" style="min-height: 50px; margin:20px 0; ">
                                    Question: @{{CQ[8]}}

                                    <b v-if=" CQ[6] == 1" style="color: green;">Correct</b>
                                    <b v-if=" CQ[6] == 0 && CQ[5] != ''" style="color: red;">{{__('User/quiz.incorrect')}}</b>
                                    <b v-if=" CQ[6] == 0 && CQ[5] == ''" style="color: gray;">{{__('User/quiz.skipped')}}</b>
                                    <b v-if=" CQ[10] == 1" style="color: orange;">| {{__('User/quiz.flaged')}}</b>



                                    <div class=" uk-grid-small uk-grid-match" uk-grid style="font-size: 21px; border-radius: 10px !important; font-weight:bold; margin: 10px 0 20px 0;">
                                        <div class="uk-card uk-card-defualt uk-card-body" style="width: 100%; background-color:#ccc;">
                                            <p>
                                                @{{CQ[0]}}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="fig" id="fig" style=" margin: 0 0 10px 50px;" v-if="CQ[7]">
                                            <img class="img-responsive" v-bind:src="CQ[7]" width="550" alt="fig0-0">
                                        </div>
                                    </div>

                                    <div class="container-fluid row options" style="font-size: 18px;  min-height: 50px; width: 100%; display:block;">
                                        <div class="radio" id="radio1" style="border-radius: 9px !important; border: 2px solid green; min-height: 40px; padding: 10px; margin-bottom: 10px;" >
                                            <label style="margin:0;">@{{CQ[1]}}</label>
                                        </div>
                                        <div class="radio" id="radio2" style="border-radius: 9px !important; min-height: 40px; padding: 10px; margin-bottom: 10px;" v-bind:style = "[CQ[12] == CQ[5] ? {'border': '2px solid red'} : {'border': '1px solid rgb(204, 204, 204)'}]">
                                            <label style="margin:0;">@{{CQ[2]}}</label>
                                        </div>
                                        <div class="radio" id="radio3" style="border-radius: 9px !important;  min-height: 40px; padding: 10px; margin-bottom: 10px;" v-bind:style = "[CQ[13] == CQ[5] ? {'border': '2px solid red'} : {'border': '1px solid rgb(204, 204, 204)'}]">
                                            <label style="margin:0;">@{{CQ[3]}}</label>
                                        </div>
                                        <div class="radio" id="radio4" style="border-radius: 9px !important;  min-height: 40px; padding: 10px;" v-bind:style = "[CQ[14] == CQ[5] ? {'border': '2px solid red'} : {'border': '1px solid rgb(204, 204, 204)'}]">
                                            <label style="margin:0;">@{{CQ[4]}}</label>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="container-fluid">

                                            <p>
                                                <b>{{__('User/quiz.explanation')}}</b> <br>
                                                <b> @{{CQ[9]}}</b>
                                            </p>
                                        </div>
                                    </div>

                                    <hr>
                                    <div class="row">
                                        <div class="col-md-2 {{app()->getLocale() == 'ar' ? 'offset-md-8': ''}}" style="  min-height: 30px; font-size: 18px;">
                                            <a id="prev" v-on:click="back">
                                                <b>  <i class="fa fa-angle-{{app()->getLocale() == 'en' ? 'left': 'right'}}" style="font-weight: bold; font-size: 21px; padding-right:5px;"></i> {{__('User/quiz.back')}}</b>
                                            </a>
                                        </div>


                                        <div class="col-md-2 {{app()->getLocale() == 'en' ? 'offset-md-8': ''}}" style="  min-height: 30px; text-align: right; font-size: 18px;margin-bottom: 15px;">
                                            <a id="next" v-on:click="next">
                                                <b> {{__('User/quiz.next')}} <i class="fa fa-angle-{{app()->getLocale() == 'en' ? 'right': 'left'}}" style="font-weight: bold; font-size: 21px; padding-left:5px;"></i></b>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li>
                <nav class="responsive-tab style-5 style-ma-2">
                    <ul uk-switcher="connect: #results-marked ;animation: uk-animation-slide-right-medium, uk-animation-slide-left-medium">
                        <li><a href="#">{{__('User/quiz.result-break-down')}}</a></li>
                    </ul>
                </nav>
                <hr style="margin-top: 0; padding-top:0;">
                <ul id="results-marked" class="uk-switcher style-ma-2 style-ma-3">
                    <li id="menu1">
                        <center>
                            <h3>{{__('User/quiz.score-analysis')}}</h3>
                        </center>
                        <div class="container">
                            <h4>{{__('User/quiz.knowledge-area')}}: </h4>
                            <table class="table table-bordered score-table">
                                <thead>
                                <th>{{__('User/quiz.knowledge-area')}}</th>
                                <th>{{__('User/quiz.no-questions')}}</th>
                                <th>{{__('User/quiz.correct-answers')}}</th>
                                <th>%{{__('User/quiz.correct')}}</th>
                                </thead>
                                <tbody id ="scoreAnalysisTable">
                                    <tr v-for="value in chapterAnalysisExpanded">
                                        <td>@{{ value.chapter }}</td>
                                        <td>@{{ value.question_num }}</td>
                                        <td>@{{ value.score }}</td>
                                        <td>@{{ value.percentage }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <br>
                            <h4>{{__('User/quiz.process-group')}}: </h4>
                            <table class="table table-bordered score-table">
                                <thead>
                                    <th>{{__('User/quiz.question')}}</th>
                                    <th>{{__('User/quiz.process-group')}}</th>
                                    <th>{{__('User/quiz.knowledge-area')}}</th>
                                    <th>{{__('User/quiz.score')}}</th>
                                </thead>
                                <tbody id ="scoreAnalysisTable">
                                <tr v-for="value in processAnalysisExpanded">
                                    <td>@{{ value.title }}</td>
                                    <td>@{{ value.process }}</td>
                                    <td>@{{ value.chapter }}</td>
                                    <td>@{{ value.score }}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>


                    </li>
                </ul>
            </li>
        </ul>



    </div>
</div>

@endsection

@section('jscode')




<script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>

	<script type="text/javascript">

        $(document).ready(function(){
            app.start();
            document.addEventListener('contextmenu', event => event.preventDefault());

            $(window).keyup(function(e){
                if(e.keyCode == 44){
                    $(".page-content").hide();
                    $(".prsc-msg").show();
    
    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
    
                    $.ajax ({
                        type: 'GET',
                        url: '{{ route('ScreenShot') }}',
                        success: function(res){
    
                        },
                        error: function(res){
                            console.log('Error:', res);
                        }
                    });
    
                }
            });
            // app.markExam();
        });

        var app = new Vue({
		    el: '#app-1',
	        data:
            {

                questions: [],
                answers: [],
                toggle_value: 3,
                ScoreMsg: '',
                score: 0,
                process_group_analysis: [],
                chapter_analysis: [],
                current_question_index: 0,
                data: [],
                CQ: [],
                language: '{{\Session('locale')}}',
            },
            computed:{
		        processAnalysisExpanded: function(){
		            process = [];
		            for( const [key, value] of Object.entries(this.process_group_analysis)){
		                value.forEach(function(record){
		                    process.push({
                                title       : record.title,
                                chapter     : record.chapter,
                                score       : record.q_score,
                                process     : key,
                            });
                        });
                    }
		            return process;
                },
		        chapterAnalysisExpanded: function(){
                    chapters = [];
                    for (const[key, value] of Object.entries(this.chapter_analysis)){
                        score = 0;
		                value.forEach(function(record){
		                    if(record.q_score){
		                        score++;
                            }
                        });
		                chapters.push({
                            chapter         : key,
                            question_num    : value.length,
                            score           : score,
                            percentage      : Math.round(score/ value.length * 100),
                        });
                    }
                    return chapters;
                },
                performanceByDomain: function(){
                    pbd = [];


                    for (const [key, value] of Object.entries(this.process_group_analysis)) {
                        pbd[key] = 0;
                        value.forEach(function(record){
                            if(record.q_score){
                                pbd[key]++;
                            }
                        });
                        pbd[key] = Math.round(pbd[key] / value.length * 100);
                        if(pbd[key] <= 64){
                            pbd[key] = '<i style="color: red;">Need Improvment</i>';
                        }else if(pbd[key] > 65 && pbd[key] <= 74){
                            pbd[key] = '<i style="color: red;">below target</i>';
                        }else if(pbd[key] >= 75 && pbd[key] <= 84){
                            pbd[key] = '<i style="color: #999900;">target</i>';
                        }else if(pbd[key] >= 85){
                            pbd[key] = '<i style="color:green;">above target</i>';
                        }
                    }

                    return pbd;

                }
            },
            methods:{
                toggle_answers: function(){
                    this.data = [];

                    if(this.toggle_value == 3)
                    {
                        this.toggle_all();
                    }
                    else if(this.toggle_value == 0) // incorrect
                    {
                        this.toggle_incorrect();
                    }
                    else if(this.toggle_value == 1) // correct
                    {
                        this.toggle_correct();
                    }
                    else if(this.toggle_value == 2) // skipped
                    {
                        this.toggle_skipped();
                    }
                    else if(this.toggle_value == 4)
                    {
                        this.toggle_flaged();
                    }

                    this.current_question_index = 0;
                    this.CQ = app.data[0];
                },
                toggle_skipped: function(){
                    i = 0;
                    app.questions.forEach(function(question){
                        
                        find = 0;

                        if(question.img){
                            link = '{{url('')}}/storage/questions/'+app.basename(question.img);
                        }else{
                            link = null;
                        }


                        app.answers.forEach(function(answer){
                            if(question.id == answer.question_id){
                                find = 1;
                            }
                        });


                        if(!find){
                            i++;
                            list = [
                                app.language == 'en' ? question.title : question.transcodes['title'],
                                app.language == 'en' ? question.correct_answer : question.transcodes['correct_answer'],
                                app.language == 'en' ? question.a : question.transcodes['a'],
                                app.language == 'en' ? question.b : question.transcodes['b'],
                                app.language == 'en' ? question.c : question.transcodes['c'],
                                answer.user_answer,
                                correct,
                                link,
                                index+1,
                                app.language == 'en' ? question.feedback : question.transcodes['feedback'],
                                answer.flaged,
                                question.correct_answer,
                                question.a,
                                question.b,
                                question.c,
                            ];
                            app.data.push(list);
                        }
                    });
                },
                toggle_correct: function(){
                    i =0;
                    app.answers.forEach(function(answer, index){
                        app.questions.forEach(function(question){
                            if(question.img){
                                link = '{{url('')}}/storage/questions/'+app.basename(question.img);
                            }else{
                                link = null;
                            }
                            if(answer.question_id == question.id){
                                if(answer.user_answer == question.correct_answer){
                                    i++;
                                    list = [
                                        app.language == 'en' ? question.title : question.transcodes['title'],
                                        app.language == 'en' ? question.correct_answer : question.transcodes['correct_answer'],
                                        app.language == 'en' ? question.a : question.transcodes['a'],
                                        app.language == 'en' ? question.b : question.transcodes['b'],
                                        app.language == 'en' ? question.c : question.transcodes['c'],
                                        answer.user_answer,
                                        correct,
                                        link,
                                        index+1,
                                        app.language == 'en' ? question.feedback : question.transcodes['feedback'],
                                        answer.flaged,
                                        question.correct_answer,
                                        question.a,
                                        question.b,
                                        question.c,
                                    ];
                                    app.data.push(list);                                    
                                }
                            }
                        });
                    });
                },
                toggle_incorrect: function(){
                    i =0;


                    app.answers.forEach(function(answer, index){
                        app.questions.forEach(function(question){
                            if(question.img){
                                link = '{{url('')}}/storage/questions/'+app.basename(question.img);
                            }else{
                                link = null;
                            }
                            if(answer.question_id == question.id){
                                if(answer.user_answer != question.correct_answer){
                                    i++;
                                    list = [
                                        app.language == 'en' ? question.title : question.transcodes['title'],
                                        app.language == 'en' ? question.correct_answer : question.transcodes['correct_answer'],
                                        app.language == 'en' ? question.a : question.transcodes['a'],
                                        app.language == 'en' ? question.b : question.transcodes['b'],
                                        app.language == 'en' ? question.c : question.transcodes['c'],
                                        answer.user_answer,
                                        correct,
                                        link,
                                        index+1,
                                        app.language == 'en' ? question.feedback : question.transcodes['feedback'],
                                        answer.flaged,
                                        question.correct_answer,
                                        question.a,
                                        question.b,
                                        question.c,
                                    ];
                                    app.data.push(list);                                    
                                }
                            }
                        });
                    });
                },
                toggle_flaged: function(){
                    i =0;


                    app.answers.forEach(function(answer, index){
                        app.questions.forEach(function(question){
                            if(question.img){
                                link = '{{url('')}}/storage/questions/'+app.basename(question.img);
                            }else{
                                link = null;
                            }
                            if(answer.question_id == question.id){
                                if(answer.flaged){
                                    i++;
                                    list = [
                                        app.language == 'en' ? question.title : question.transcodes['title'],
                                        app.language == 'en' ? question.correct_answer : question.transcodes['correct_answer'],
                                        app.language == 'en' ? question.a : question.transcodes['a'],
                                        app.language == 'en' ? question.b : question.transcodes['b'],
                                        app.language == 'en' ? question.c : question.transcodes['c'],
                                        answer.user_answer,
                                        correct,
                                        link,
                                        index+1,
                                        app.language == 'en' ? question.feedback : question.transcodes['feedback'],
                                        answer.flaged,
                                        question.correct_answer,
                                        question.a,
                                        question.b,
                                        question.c,
                                    ];
                                    app.data.push(list);
                                }
                            }
                        });
                    });
                },
                toggle_all: function(){
                    app.questions.forEach(function(question, index){
                        if(question.img){
                            link = '{{url('')}}/storage/questions/'+app.basename(question.img);
                        }else{
                            link = null;
                        }
                        find = 0;
                        app.answers.forEach(function(answer){
                            if(answer.question_id == question.id){
                                if(answer.user_answer == question.correct_answer){
                                    correct = 1;
                                }else{
                                    correct = 0;
                                }
                                list = [
                                    app.language == 'en' ? question.title : question.transcodes['title'],
                                    app.language == 'en' ? question.correct_answer : question.transcodes['correct_answer'],
                                    app.language == 'en' ? question.a : question.transcodes['a'],
                                    app.language == 'en' ? question.b : question.transcodes['b'],
                                    app.language == 'en' ? question.c : question.transcodes['c'],
                                    answer.user_answer,
                                    correct,
                                    link,
                                    index+1,
                                    app.language == 'en' ? question.feedback : question.transcodes['feedback'],
                                    answer.flaged,
                                    question.correct_answer,
                                    question.a,
                                    question.b,
                                    question.c,
                                    
                                ];
                                app.data.push(list);
                                find = 1;
                                
                            }
                        });
                        

                        if(!find){
                            
                            list = [
                                question.title,
                                question.correct_answer,
                                question.a,
                                question.b,
                                question.c,
                                '',
                                0,
                                link,
                                index+1,
                                question.feedback,
                                0
                            ];
                            app.data.push(list);    
                        }

                    });
                },
                start: function(){
                    Data = {
                        'quiz_id': {{$quiz->id}}
                    };
                    
                    
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    
                    $.ajax ({
                        type: 'POST',
                        url: '{{ route('QuizHistory.load')}}', 
                        data: Data,
                        success: function(res){

                            console.log(res);
                            app.questions = res.questions;
                            app.answers = res.answers;
                            app.process_group_analysis = JSON.parse(res.process_group_analysis);
                            app.chapter_analysis = JSON.parse(res.chapter_analysis);
                        
                            app.toggle_all();
                            
                            $("#loading1").hide();
                            $("#quiz").show();
                            app.CQ = app.data[0];

                        },

                        error: function(res){
                            console.log('Error:', res);    
                        }
                    });
                                
                    
                },
                basename: function(str){
                    var base = new String(str).substring(str.lastIndexOf('/') + 1); 
                   return base;
                },
                next: function(){
                    if(this.current_question_index < this.data.length - 1){
                        this.current_question_index++;
                        this.CQ = app.data[this.current_question_index];
                    }
                },
                back: function(){
                    if(this.current_question_index > 0){
                        this.current_question_index--;
                        this.CQ = app.data[this.current_question_index];
                    }
                },
            } 
    	});
    
	</script>
    
@endsection


