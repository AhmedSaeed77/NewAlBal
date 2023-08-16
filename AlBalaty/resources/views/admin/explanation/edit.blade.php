@extends('layouts.admin-layout')
@section('pageTitle') Edit {{config('library.explanation.en')}} @endsection

@section('subheaderTitle') Edit {{config('library.explanation.en')}} @endsection
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
    <a href="#" onclick="AVUtil().redirectionConfirmation('{{route('explanation.index')}}')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.explanation.en')}} Title</label>
                    <div class="col-10">
                        <input type="text" name="title" id="title" v-model="explanation_title" class="form-control"/>
                    </div>
                </div>
                <div class="form-group-lg py-5 row">
                    <label class="col-2 col-form-label">{{config('library.explanation.en')}}</label>
                    <div class="col-10">
                        <textarea class="form-control " id="explanationEditor" @change="livePreview" placeholder="Question" rows="5">
                        </textarea>
                    </div>
                </div>
                <div class="form-group-lg py-5 row">
                    <div class="col-md-2"></div>
                    <p class="col-md-10" v-html="explanationLiveValue"></p>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.path.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getCourses" v-model="path_id">
                            <option value=""></option>
                            <option v-for="i in paths" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.course.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getParts" v-model="course_id">
                            <option value=""></option>
                            <option v-for="i in courses" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.part.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getChapters" v-model="part_id">
                            <option value=""></option>
                            <option v-for="i in parts" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.chapter.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getTopics" v-model="chapter_id">
                            <option value=""></option>
                            <option v-for="i in chapters" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1">{{config('library.topic.en')}}</label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getTopics" v-model="topic_id">
                            <option value=""></option>
                            <option v-for="i in topics" :value="i.id">@{{ i.title }}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2" @click.prevent="store">Submit</button>
                        <a onclick="AVUtil().redirectionConfirmation('{{route('explanation.index')}}')" class="btn btn-secondary">Cancel</a>
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
    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>



    @if(env('APP_ENV') == 'local')
        <script src="{{asset('helper/js/vue-dev.js')}}"></script>
    @else
        <script src="{{asset('helper/js/vue-prod.min.js')}}"></script>
    @endif
    <script>


        var app = new Vue({
            el: '.vueform',
            data:{
                explanation_title: '',
                path_id: '',
                paths: [],
                course_id: '',
                courses: [],
                part_id: '',
                parts: [],
                chapter_id: '',
                chapters: [],
                topic_id: '',
                topics: [],
                explanationEditor: null,
                explanationLiveValue: '',
            },
            async mounted(){
                /** init Wiris Plugin into CKEditor */
                this.initWirisPlugin();
                /** init required CKEditor */
                this.explanationEditor = this.initEditor('explanationEditor', 280);
                this.explanationEditor.on('change', this.livePreview);

                res = await this.loader();
                setTimeout(() => this.explanationEditor.setData(res.explanation.text), 500); // let CK-Editor be initiated.
                this.explanation_title = res.explanation.explanation_title;
                this.path_id = res.explanation.path_id;
                this.course_id = res.explanation.course_id;
                this.part_id = res.explanation.part_id;
                this.chapter_id = res.explanation.chapter_id;
                this.topic_id = res.explanation.topic_id;

                this.paths = res.paths;
                this.courses = res.courses;
                this.parts = res.parts;
                this.chapters = res.chapters;
                this.topics = res.topics;

                /** get current user paths */
                // this.getPaths();
            },
            methods:{
                loader:async function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '{{csrf_token()}}'
                        }
                    });

                    return $.ajax ({
                        type: 'POST',
                        url: '{{ route('explanation.edit-loader')}}',
                        data: {
                            explanation_id: '{{$explanation_id}}',
                        },
                        error: function(err){
                            KTApp.unblockPage()
                            console.log(err);
                            app.showError(err);
                        }
                    });
                },
                livePreview: function(){
                    this.explanationLiveValue = this.explanationEditor.getData();
                    this.reRenderMathJax();
                },
                reRenderMathJax: function(){
                    app.$nextTick(function () {
                        MathJax.Hub.Typeset()
                    });
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
                            text: 'Explanation Updated.',
                            type: "success",
                            buttonsStyling: false,
                            confirmButtonText: "Ok, got it!",
                            confirmButtonClass: "btn font-weight-bold btn-light"
                        }).then(function () {
                            window.location.href = '{{route('explanation.index')}}';
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
                        type: 'POST',
                        url: '{{ route('explanation.update', $explanation_id)}}',
                        data: {
                            explanation_title: app.explanation_title,
                            explanation_text: app.explanationEditor.getData(),
                            path_id: app.path_id,
                            course_id: app.course_id,
                            part_id: app.part_id,
                            chapter_id: app.chapter_id,
                            topic_id: app.topic_id,
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
                    if(this.explanationEditor.getData() == ''){
                        validation.error = 'Explanation Is required !';
                        return validation;
                    }

                    if(this.explanation_title == ''){
                        validation.error = 'Explanation Title is Required';
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
                getPaths :async function(){
                    this.paths = await this.fetchLibrary(null, 'path');
                },
                getCourses:async function(){
                    this.courses = await this.fetchLibrary(this.path_id, 'course');
                },
                getParts:async function(){
                    this.parts = await  this.fetchLibrary(this.course_id, 'part');
                },
                getChapters:async function(){
                    this.chapters = await  this.fetchLibrary(this.part_id, 'chapter');
                },
                getTopics:async function(){
                    this.topics = await  this.fetchLibrary(this.chapter_id, 'topic');
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
            },
        });



        // single file upload

    </script>
@endsection
