@extends('layouts.admin-layout')
@section('pageTitle') Edit Question @endsection

@section('subheaderTitle') Edit Question @endsection
@section('subheaderNav')
    <!--begin::Button-->
    <a href="#" onclick="app.store()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Submit</a>
    <!--end::Button-->

    <!--begin::Button-->
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('question.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
    <span class="svg-icon svg-icon-success svg-icon-lg">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Add-user.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <rect x="0" y="0" width="24" height="24"/>
                <path d="M8.42034438,20 L21,20 C22.1045695,20 23,19.1045695 23,18 L23,6 C23,4.8954305 22.1045695,4 21,4 L8.42034438,4 C8.15668432,4 7.90369297,4.10412727 7.71642146,4.28972363 L0.653241109,11.2897236 C0.260966303,11.6784895 0.25812177,12.3116481 0.646887666,12.7039229 C0.648995955,12.7060502 0.651113791,12.7081681 0.653241109,12.7102764 L7.71642146,19.7102764 C7.90369297,19.8958727 8.15668432,20 8.42034438,20 Z" fill="#000000" opacity="0.3"/>
                <path d="M12.5857864,12 L11.1715729,10.5857864 C10.7810486,10.1952621 10.7810486,9.56209717 11.1715729,9.17157288 C11.5620972,8.78104858 12.1952621,8.78104858 12.5857864,9.17157288 L14,10.5857864 L15.4142136,9.17157288 C15.8047379,8.78104858 16.4379028,8.78104858 16.8284271,9.17157288 C17.2189514,9.56209717 17.2189514,10.1952621 16.8284271,10.5857864 L15.4142136,12 L16.8284271,13.4142136 C17.2189514,13.8047379 17.2189514,14.4379028 16.8284271,14.8284271 C16.4379028,15.2189514 15.8047379,15.2189514 15.4142136,14.8284271 L14,13.4142136 L12.5857864,14.8284271 C12.1952621,15.2189514 11.5620972,15.2189514 11.1715729,14.8284271 C10.7810486,14.4379028 10.7810486,13.8047379 11.1715729,13.4142136 L12.5857864,12 Z" fill="#000000"/>
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>Cancel</a>
    <!--end::Button-->
@endsection
@section('content')
    <div class="card card-custom">
        <!--begin::Form-->
        <div id="questionAddForm" class="vueform">
            <div class="card-body">
                <h2>General</h2>
                <div class="form-group-lg py-5 row" v-if="includePassage">
                    <label class="col-2 col-form-label">Passage</label>
                    <div class="col-10">
                        <textarea class="form-control " id="passageEditor" placeholder="Question" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group-lg py-5 row">
                    <label class="col-2 col-form-label">Question</label>
                    <div class="col-10">
                        <label for="acceptArabicNumber" style="text-align:right; width: 100%;">
                            Arabic Numbers
                            <input type="checkbox" v-model="arabicNumbers" id="acceptArabicNumber">
                        </label>
                        <textarea class="form-control " id="questionEditor" placeholder="Question" rows="5"></textarea>
                    </div>
                </div>
                <h2>Answers</h2>
                <div class="form-group  row">
                    <label class="col-2 col-form-label">Answers :</label>
                    <div class="col-7">
                        <textarea class="form-control " id="answerEditor" placeholder="An Answer !" rows="5"></textarea>
                    </div>
                    <div class="col-1">
                        <label for="correct">Correct?</label>
                        <input type="checkbox" id="correct" v-model="is_correct">
                    </div>
                    <div class="col-1">
                        <button @click.prevent="addAnswer" class="btn btn-outline-success">Add</button>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>Answer</th>
                                <th>Correct?</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="i,index in answers_arr">
                                <td v-html="i.answer"></td>
                                <td v-if="i.is_correct">Correct</td>
                                <td v-if="!i.is_correct">Incorrect</td>
                                <td>
                                    <button @click.prevent="editAnswer(index)" class="btn btn-outline-warning">
                                        <i class="fa fa-edit"></i> Edit
                                    </button>
                                </td>
                                <td>
                                    <button @click.prevent="removeAnswer(index)" class="btn btn-outline-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </button>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h2>Distribution</h2>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">Course</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getCourses" v-model="path_id">
                            <option value=""></option>
                            <option v-for="i in paths" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">Level</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getParts" v-model="course_id">
                            <option value=""></option>
                            <option v-for="i in courses" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">Subject</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getChapters" v-model="part_id">
                            <option value=""></option>
                            <option v-for="i in parts" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">Topic</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getTopics" v-model="chapter_id">
                            <option value=""></option>
                            <option v-for="i in chapters" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">Sub-Topic</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getSkills" v-model="topic_id">
                            <option value=""></option>
                            <option v-for="i in topics" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.skill.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-model="skill_id">
                            <option value=""></option>
                            <option v-for="i in skills" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-11">
                    </div>
                    <div class="col-1">
                        <button type="submit" class="btn btn-success mr-2" @click.prevent="addDistribution">Attach</button>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-2"></div>
                    <div class="col-10">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>{{config('library.path.en')}}</th>
                                <th>{{config('library.course.en')}}</th>
                                <th>{{config('library.part.en')}}</th>
                                <th>{{config('library.chapter.en')}}</th>
                                <th>{{config('library.topic.en')}}</th>
                                <th>{{config('library.skill.en')}}</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="i,idx in question_distributions">
                                <td>@{{ i.path_title }}</td>
                                <td>@{{ i.course_title }}</td>
                                <td>@{{ i.part_title }}</td>
                                <td>@{{ i.chapter_title }}</td>
                                <td>@{{ i.topic_title }}</td>
                                <td>@{{ i.skill_title }}</td>
                                <td>
                                    <a href="#" @click.prevent="removeDistribution(idx)"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <h2>Additional</h2>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Image Upload</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="dropzone dropzone-default dropzone-primary" id="kt_dropzone_2">
                            <div class="dropzone-msg dz-message needsclick">
                                <h3 class="dropzone-msg-title">Drop file here or click to upload.</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group-lg py-5 row">
                    <label class="col-2 col-form-label">Feedback</label>
                    <div class="col-10">
                        <textarea name="feedback" id="feedbackEditor" class="form-control " placeholder="Feedback about the correct answer" rows="5"></textarea>
                    </div>
                </div>
                <div class="form-group row py-5">
                    <label class="col-2 col-form-label"></label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <label class="checkbox checkbox-outline checkbox-success">
                            <input type="checkbox" v-model="important" name="Checkboxes15">
                            <span></span>Is Important</label>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-9">
                        <button type="submit" class="btn btn-success mr-2" @click.prevent="store">Submit</button>
                        <a onclick="AVUtil().redirectionConfirmation('{{route('question.index')}}')" class="btn btn-secondary">Cancel</a>
                    </div>
                    <div class="col-1">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('jscode')
    <!--begin::Page Vendors(used by this page)-->
    <script src="{{asset('assets-admin/plugins/custom/fullcalendar/fullcalendar.bundle.js?v=7.0.4')}}"></script>
    <!--end::Page Vendors-->
    <!--begin::Page Scripts(used by this page)-->
    <script src="{{asset('assets-admin/js/pages/widgets.js?v=7.0.4')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.6/lib/darkmode-js.min.js"></script>
    <script src="{{asset('assets-admin/js/pages/crud/forms/widgets/select2.js?v=7.0.4')}}"></script>
{{--    <script src="https://cdn.ckeditor.com/4.15.1/basic/ckeditor.js"></script>--}}
    <script src="{{ asset('helper/js/ckeditor/ckeditor.js')}}"></script>

    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>
        var KTDropzoneDemo = function () {
            var uploadedDocumentMap = {};
            var uploadedDocumentArray = [];

            var demo1 = function () {

                $('#kt_dropzone_2').dropzone({
                    url: "{{route('dropzone.handler')}}", // Set the url for your upload script location
                    paramName: "file", // The name that will be used to transfer the file
                    maxFiles: 1,
                    maxFilesize: 10, // MB
                    addRemoveLinks: true,
                    acceptedFiles: "image/*",
                    headers: {
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    accept: function(file, done) {
                        done();
                    },
                    success: function (file, response) {
                        console.log(response);
                        $('.vueform').append('<input class="imageFile" type="hidden" name="file[]" value="' + response.name + '">')
                        uploadedDocumentMap[file.name] = response.name;
                        uploadedDocumentArray.push(
                            response.name
                        );
                    },
                    removedfile: function (file) {
                        file.previewElement.remove()
                        var name = ''
                        if (typeof file.file_name !== 'undefined') {
                            name = file.file_name
                        } else {
                            name = uploadedDocumentMap[file.name]
                        }
                        $('form').find('input[name="file[]"][value="' + name + '"]').remove()
                    },

                });
            };
            return {
                // public functions
                init: function() {
                    demo1();
                },
                uploadedDocumentMap,
                uploadedDocumentArray,
            };
        }();
        KTUtil.ready(function() {
            KTDropzoneDemo.init();
        });

        var app = new Vue({
            el: '.vueform',
            data:{
                arabicNumbers: false,
                includePassage: true,
                question_id: '{{$question_id}}',
                path_id: null,
                paths: [],
                course_id: null,
                courses: [],
                part_id: null,
                parts: [],
                chapter_id: null,
                chapters: [],
                topic_id: null,
                topics: [],
                skill_id: null,
                skills: [],


                is_correct: false,
                answers_arr: [],

                passageEditor: null,
                questionEditor: null,
                answerEditor: null,
                feedbackEditor: null,

                answer_editing_id: null,
                question_distributions: [],
                important: false,
            },
            async mounted(){


                /** init Wiris Plugin into CKEditor */
                this.initWirisPlugin();
                /** init required CKEditor */
                this.passageEditor = this.initEditor('passageEditor', 320);
                this.passageEditor.on('key', this.arabicCharHandler);
                
                this.questionEditor = this.initEditor('questionEditor', 280);
                this.questionEditor.on('key', this.arabicCharHandler);
                
                this.answerEditor = this.initEditor('answerEditor', 80);
                this.answerEditor.on('key', this.arabicCharHandler);
                
                this.feedbackEditor = this.initEditor('feedbackEditor', 150);
                this.feedbackEditor.on('key', this.arabicCharHandler);
                
                /** load question data */
                await this.loader(this.question_id);

                /** get current user paths */
                this.getPaths();

            },
            methods:{
                arabicCharHandler: function (e){
                    if(app.arabicNumbers) {
                        input_key = e.data.domEvent.$.key;
                        arabic_digits = ["١", "٢", "٣", "٤", "٥", "٦", "٧", "٨", "٩", "٠"];
                        digits = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9];
                        if (digits.includes(parseInt(input_key))) {
                            e.cancel();
                            if (input_key == 0) {
                                e.editor.insertText(arabic_digits[9]);
                            } else {
                                e.editor.insertText(arabic_digits[input_key - 1]);
                            }
                        }
                    }
                },
                addDistribution: function(){
                    // path_id, course_id, part_id, chapter_id, topic_id, skill_id
                    if(this.question_distributions.filter(i => {
                        return i.path_id == app.path_id &&
                            i.course_id == app.course_id &&
                            i.part_id == app.part_id &&
                            i.chapter_id == app.chapter_id &&
                            i.topic_id == app.topic_id &&
                            i.skill_id == app.skill_id
                    })?.length <= 0  && app.path_id)
                        this.question_distributions.push({
                            path_id: app.path_id,
                            path_title: app.path_id ? app.paths.filter(p => p.id == app.path_id)[0].title: null,
                            course_id: app.course_id,
                            course_title: app.course_id ? app.courses.filter(p => p.id == app.course_id)[0].title: null,
                            part_id: app.part_id,
                            part_title: app.part_id ? app.parts.filter(p => p.id == app.part_id)[0].title: null,
                            chapter_id: app.chapter_id,
                            chapter_title: app.chapter_id ? app.chapters.filter(p => p.id == app.chapter_id)[0].title: null,
                            topic_id: app.topic_id,
                            topic_title: app.topic_id ? app.topics.filter(p => p.id == app.topic_id)[0].title: null,
                            skill_id: app.skill_id,
                            skill_title: app.skill_id ? app.skills.filter(p => p.id == app.skill_id)[0].title: null,
                        });
                },
                removeDistribution: function(idx){
                    this.question_distributions.splice(idx, 1);
                },
                reRenderMathJax: function(){
                    app.$nextTick(function () {
                        MathJax.Hub.Typeset()
                    });
                },
                loader:async function(question_id){
                    KTApp.blockPage();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('question.loader')}}',
                        data: {
                            question_id,
                        },
                        success: function(res){
                            console.log(res);
                            setTimeout(function(){
                                app.includePassage = res.passage != null;
                                app.passageEditor.setData(res.passage);
                                app.answers_arr = res.answers;
                                app.questionEditor.setData(res.model.title);
                                app.feedbackEditor.setData(res.model.feedback);
                                app.question_distributions = res.question_distributions;
                                app.important = res.model.important == 1 ? true: false;
                                app.reRenderMathJax();
                                KTApp.unblockPage();
                            }, 2000);

                        },
                        error: function(err){
                            KTApp.unblockPage()
                            console.log(err);
                            app.showError(err);
                        }
                    });
                },
                addAnswer: function(){

                    this.answers_arr.push({
                        id: this.answer_editing_id ? this.answer_editing_id: null,
                        answer: this.answerEditor.getData(),
                        is_correct: this.is_correct ? 1: 0,
                    });
                    this.answer_editing_id = null;
                    this.is_correct = false;
                    this.reRenderMathJax();
                },
                removeAnswer: function(idx){
                    this.answers_arr.splice(idx, 1);
                    this.reRenderMathJax();
                },
                editAnswer: function(idx){
                    current_answer = this.answers_arr[idx];
                    this.answers_arr.splice(idx, 1);
                    this.answer_editing_id = current_answer.id;
                    this.answerEditor.setData(current_answer.answer);
                    this.is_correct = current_answer.is_correct;
                    this.reRenderMathJax();
                },
                store:async function(){
                    validation = this.validate();
                    if(validation.hasError){
                        this.showError(validation.error);
                        return;
                    }
                    KTApp.blockPage();
                    await this.storeRequest().then((res) => {
                        KTApp.unblockPage();
                        console.log(res);
                        swal({
                            text: 'Question Updated.',
                            type: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: "btn font-weight-bold btn-light"
                        }).then(function () {
                            window.location.href= '{{route('question.index')}}';
                        });
                    });
                },
                storeRequest: function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });
                    return $.ajax ({
                        type: 'PUT',
                        url: '{{ route('question.update', $question_id)}}',
                        data: {
                            passage: app.passageEditor && app.includePassage ? app.passageEditor.getData(): null,
                            question_title: app.questionEditor.getData(),
                            answers: app.answers_arr,
                            question_distributions: app.question_distributions,
                            images: KTDropzoneDemo.uploadedDocumentArray,
                            feedback: app.feedbackEditor.getData(),
                            important: app.important ? 1: 0,
                        },
                        error: function(err){
                            KTApp.unblockPage()
                            console.log(err);
                            app.showError(err);
                        }
                    });
                },
                validate: function(){
                    validation = {
                        hasError: true,
                        error: '',
                    };
                    /** Validate question field */
                    if(this.questionEditor.getData() == ''){
                        validation.error = 'Question Is required !';
                        return validation;
                    }

                    /** validate answers */
                    if(this.answers_arr.length <= 1){
                        validation.error = 'At least Two(2) Answers of which One(1) is correct are required !';
                        return validation;
                    }
                    correct_answer = this.answers_arr.filter(function(item){
                        return item.is_correct;
                    });
                    if(correct_answer.length != 1){
                        validation.error = 'One(1) correct answer is required !';
                        return validation;
                    }
                    validation.hasError = false;
                    return validation;
                },
                showError: function(err){
                    swal({
                        text: err,
                        type: "error",
                        buttonsStyling: false,
                        confirmButtonText: "Ok, got it!",
                        confirmButtonClass: "btn font-weight-bold btn-light"
                    }).then(function () {
                        KTUtil.scrollTop();
                    });
                },
                getPaths:async function(){
                    this.paths = await this.fetchLibrary(null, 'path');
                    this.path_id = null;
                    this.course_id = null;
                    this.part_id = null;
                    this.chapter_id = null;
                    this.topic_id = null;
                    this.skill_id = null;
                },
                getCourses:async function(){
                    this.courses = await this.fetchLibrary(this.path_id, 'course');
                    this.course_id = null;
                    this.part_id = null;
                    this.chapter_id = null;
                    this.topic_id = null;
                    this.skill_id = null;
                },
                getParts:async function(){
                    this.parts = await  this.fetchLibrary(this.course_id, 'part');
                    this.part_id = null;
                    this.chapter_id = null;
                    this.topic_id = null;
                    this.skill_id = null;
                },
                getChapters:async function(){
                    this.chapters = await  this.fetchLibrary(this.part_id, 'chapter');
                    this.chapter_id = null;
                    this.topic_id = null;
                    this.skill_id = null;
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
                initWirisPlugin: function(){
                    // CKEDITOR.plugins.addExternal('ckeditor_wiris', 'https://ckeditor.com/docs/ckeditor4/4.15.1/examples/assets/plugins/ckeditor_wiris/', 'plugin.js');
                },
                initEditor: function(element_id, height){
                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '{{route('ckeditor.upload', ['_token' => csrf_token()])}}',
                        filebrowserUploadMethod: 'form',
                        height,
                    });
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
                            app.exams = res;
                            KTApp.unblockPage();
                        },
                        error: function(err){console.log('Error:', err);}
                    });
                },
            }
        });



        // single file upload

    </script>
@endsection
