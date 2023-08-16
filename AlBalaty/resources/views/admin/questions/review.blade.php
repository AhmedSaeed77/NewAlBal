
<html>
    <head>
        <script type="text/x-mathjax-config">
        MathJax.Hub.Config({tex2jax: {inlineMath: [['$','$'], ['\\(','\\)']]}});
        </script>
        <script type="text/javascript"
                src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.1/MathJax.js?config=TeX-AMS-MML_HTMLorMML">
        </script>
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="dns-prefetch" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">  
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">

    </head>

    <body>
        <div class="container" id="app-1" style="margin-top: 40px;">
                <div class="row">
                    <div class="col-md-10 mx-auto form-1" >
                        <div class="container" id="quiz" >
                                {{-- style="display:none;" --}}
                            <div class="row st-row">
                                <div class="col-md-3 justify-content-center align-self-center">questions <strong>#</strong> of <strong>#</strong></div>
                                <div class="col-md-3 justify-content-center align-self-center"> Answerd <strong> # </strong></div>
                                <div class="col-md-3 justify-content-center align-self-center" id="timer">00:00:00</div>
                                <div class="col-md-2 justify-content-center align-self-center" id="timer">
                                    <a href="" @click.prevent="markAsReviewed" class="btn btn-outline-success p-2" data-toggle="tooltip" data-placement="top" title="check as reviewed">
                                        Mark Reviewed
                                    </a>
                                </div>
                                <div class="col-md-1 justify-content-center align-self-center" id="timer">
                                    <a href="{{route('question.edit', $question_id)}}" class="btn btn-outline-success p-2" data-toggle="tooltip" data-placement="top" title="Edit this question">
                                        Edit
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 question-text" style="background-color: #e8ebef;" v-html="passage" v-if="passage">
                                </div>

                                <div class="col-lg-12 question-text" style="background-color: #e8ebef;" v-html="question_title">
                                </div>
                                
                                <div class="fig" id="fig" style = "margin: 0 0 10px 50px;">
                                    <img v-if="img != ''" :src="img" style="max-width: 80%;">
                                </div>
                            </div>
                            <div class="container" >
                                <div class="radio" id="radio1" v-for="i in answers">
                                    <label ><input type="radio" name="optradio"> <span v-html="i.answer"></span></label> <span v-if="i.is_correct" style="color:green;">Correct</span>
                                </div>
                            </div>

                        </div>       
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <h3>Feedback</h3>
                        <p v-html="feedback">

                        </p>
                    </div>
                </div>

            </div>
        </div>
        <script src="{{asset('helper/js/sweetalert2.all.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
        <script>

            var app = new Vue({
                el: '#app-1',
                data: {
                    question_id: '{{$question_id}}',
                    img: '',
                    question_title: '',
                    answers: [],
                    feedback: '',
                    passage: '',
                    test: '',
                },
                async mounted(){
                    await this.loader();
                    this.$nextTick(function () {
                        MathJax.Hub.Typeset()
                    });
                },
                methods: {
                    loader:async function(){
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });

                        return $.ajax ({
                            type: 'POST',
                            url: '{{ route('question.preview.loader')}}',
                            data: {
                                question_id : '{{$question_id}}',
                            },
                            success: function(res){
                                app.question_title = res['title'];
                                app.answers = res['answers'];
                                app.img = res['img'];
                                app.feedback = res['feedback'];
                                app.passage = res['passage'];
                                console.log(res);
                            },
                            error: function(err){console.log('Error: ', err);},
                        });
                    },
                    markAsReviewed: function(){
                        // KTApp.blockPage();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '{{csrf_token()}}'
                            }
                        });

                        $.ajax ({
                            type: 'POST',
                            url: '{{ route('question.mark.as.reviewed')}}',
                            data: {
                                question_id: app.question_id,
                            },
                            success: function(res){
                                // KTApp.unblockPage();
                                swal({
                                    title: 'Success',
                                    text: 'Question has been updated.',
                                    icon: 'success',
                                    showConfirmButton: false,
                                    timer: 1500,
                                }).then(()=>{
                                    window.location.href = '{{route('question.create')}}';
                                });
                            },error: function(err){ console.log('Error:', err);}
                        });
                    },
                },
            });
        </script>
    </body>
</html>
