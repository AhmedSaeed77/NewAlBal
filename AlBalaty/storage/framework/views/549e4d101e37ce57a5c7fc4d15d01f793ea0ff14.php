
<?php $__env->startSection('pageTitle'); ?> Add Video <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderTitle'); ?> Add Video <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderNav'); ?>
    <!--begin::Button-->
    <a href="#" onclick="app.submit()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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
    <a href="#" onclick="AVUtil().redirectionConfirmation('<?php echo e(route('video.index')); ?>')" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card card-custom p-6">

        <!--begin::Form-->
        <p class="details" style="display:none;"></p>
        <div class="progress" id="progress1" style="display:none">
            <div class="progress-bar progress-bar-striped" id="progress_bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
        </div>

        <div class="note note-danger" style="display:none;">
            <p id="note_text" style="font-size: 15px; font-weight: bold; color: crimson;"></p>

        </div>

        <form class="vueform">

            <div class="card-body" v-if="!fileUploaded">
                <div class="form-group row">
                    <label class="col-2 col-form-label">Video Upload</label>
                    <div class="col-lg-4 col-md-9 col-sm-12">
                        <div class="dropzone dropzone-default dropzone-primary" id="fileUploaderDropZone">
                            <div class="dropzone-msg dz-message needsclick">
                                <h3 class="dropzone-msg-title">Drop file here or click to upload.</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body" v-if="fileUploaded">

                <h2>General</h2>
                <div class="form-group-lg py-5 row">
                    <label class="col-2 col-form-label">Video Title </label>
                    <div class="col-10">
                        <input class="form-control" type="text" placeholder="Title" name="title" v-model="title"/>
                    </div>
                </div>

                <div class="form-group  row">
                    <label class="col-2 col-form-label">Description :</label>
                    <div class="col-10">
                        <textarea id="descriptionEditor"></textarea>
                    </div>
                </div>

                <h2>Distribution</h2>
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-form-label" for="exampleSelectd1"><?php echo e(config('library.path.en')); ?></label>
                        <select class="form-control" id="exampleSelectd1" v-on:change="getCourses" v-model="path_id">
                            <option value=""></option>
                            <option v-for="i in paths" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label" for="exampleSelectd1"><?php echo e(config('library.course.en')); ?></label>
                        <select class="form-control" id="exampleSelectd1" v-on:change="getParts" v-model="course_id">
                            <option value=""></option>
                            <option v-for="i in courses" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class=" col-md-6">
                        <label class="col-form-label" for="exampleSelectd1"><?php echo e(config('library.part.en')); ?></label>
                        <select class="form-control" id="exampleSelectd1" v-on:change="getChapters" v-model="part_id">
                            <option value=""></option>
                            <option v-for="i in parts" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="col-form-label" for="exampleSelectd1"><?php echo e(config('library.chapter.en')); ?></label>
                        <select class="form-control" id="exampleSelectd1" v-on:change="getTopics" v-model="chapter_id">
                            <option value=""></option>
                            <option v-for="i in chapters" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col-md-6">
                        <label class="col-form-label" for="exampleSelectd1"><?php echo e(config('library.topic.en')); ?></label>
                        <select class="form-control" id="exampleSelectd1" v-on:change="getSkills" v-model="topic_id">
                            <option value=""></option>
                            <option v-for="i in topics" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="col-2 col-form-label" for="exampleSelectd1"><?php echo e(config('library.skill.en')); ?></label>
                        <select class="form-control" id="exampleSelectd1" v-model="skill_id">
                            <option value=""></option>
                            <option v-for="i in skills" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                </div>


                <h2>Attachments</h2>
                <div class="form-group-lg py-5 row">
                    <label class="col-md-2 col-form-label" for="attachmentTitle">File Title</label>
                    <div class="col-md-4">
                        <input class="form-control" type="text" placeholder="Title" id="attachmentTitle" v-model="attachment_title"/>
                    </div>
                    <div class="col-md-4">
                        <input type="file" class="form-control" id="attachmentFile">
                    </div>
                    <div class="col-md-2">
                        <a href="javascript:;" class="btn btn-primary" @click.prevent="addAttachment">Add</a>
                    </div>
                </div>
                <div class="my-5">
                    <h4>All Attachments</h4>
                    <div class="progress" id="progress2" style="display:none">
                        <div class="progress-bar progress-bar-striped" id="progress_bar2" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100">60%</div>
                    </div>
                    <div class="row">
                        <table class="table table-hover table-bordered table-striped">
                            <thead>
                            <tr>
                                <td>Title</td>
                                <td>Preview</td>
                                <td>Uploaded At</td>
                                <td>--</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr v-for="i,idx in attachments">
                                <td>{{ i.title }}</td>
                                <td>
                                    <a :href="i.public_url" target="_blank">Open</a>
                                </td>
                                <td>{{ i.created_at }}</td>
                                <td>
                                    <a href="javascript:;" @click="deleteAttachment(idx)">
                                        <i class="fa fa-trash text-danger"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <div class="row" v-if="fileUploaded">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button v-on:click.prevent="submit" class="btn btn-success mr-2">Submit</button>
                        <a onclick="AVUtil().redirectionConfirmation('<?php echo e(route('video.index')); ?>')" class="btn btn-secondary">Cancel</a>
                    </div>
                </div>
            </div>
        </form>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jscode'); ?>

    <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.5.16/dist/vue.js"></script>
    <script>
        var app = new Vue({
            el: '.vueform',
            data:{
                title: '',          // ###
                descriptionEditor: '',     // ###
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
                dropZone: null,
                fileUploaded: false,

                attachment_title: '',
                attachments: [],

            },
            mounted(){
                this.init();

            },
            computed: {

            },
            methods:{
                init: async function(){
                    const res = await this.loadVideoFromHistory();
                    app.attachments = await this.loadUnlinkedAttachment();
                    if(res && res.file_name != ''){
                        app.title = res.file_name;
                        app.fileUploaded = true;
                        setTimeout(function(){
                            app.descriptionEditor = app.initEditor('descriptionEditor', 280);
                            app.getPaths();
                        }, 1000);
                    }else{
                        this.dropZoneInit();
                    }
                },
                dropZoneInit: function(){
                    this.dropZone = $('#fileUploaderDropZone').dropzone({
                        parallelUploads: 1,  // since we're using a global 'currentFile', we could have issues if parallelUploads > 1, so we'll make it = 1
                        // maxFilesize: 1024,   // max individual file size 1024 MB
                        chunking: true,      // enable chunking
                        forceChunking: true, // forces chunking when file.size < chunkSize
                        parallelChunkUploads: true, // allows chunks to be uploaded in parallel (this is independent of the parallelUploads option)
                        chunkSize: 2000000,  // chunk size 2,000,000 bytes (~2MB)
                        retryChunks: true,   // retry chunks on failure
                        retryChunksLimit: 10, // retry maximum of 3 times (default is 3)
                        renameFile: function(file) {
                            var dt = new Date();
                            var time = dt.getTime();
                            return time+"_"+file.name;
                        },
                        acceptedFiles: "video/*",
                        // addRemoveLinks: true,
                        url: "<?php echo e(route('vimeo.chunk.upload')); ?>", // Set the url for your upload script location
                        paramName: "file", // The name that will be used to transfer the file
                        maxFiles: 1,
                        headers: {
                            'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                        },
                        success: function(file, response)
                        {
                            console.log(response);
                            app.loadVideoFromHistory().then(function(res){
                                app.fileUploaded = true;
                                app.title = res.file_name;
                                setTimeout(function(){
                                    app.descriptionEditor = app.initEditor('descriptionEditor', 280);
                                    app.getPaths();
                                }, 1000);
                            });

                        },
                        init: function () {
                            this.on("complete", function (file, res){
                                console.log(res);
                            });

                            this.on('error', function(file, errorMessage) {
                                console.error(file);
                                app.fileUploaded = false;
                                var name = file.upload.filename;
                                $.ajax({
                                    headers: {
                                        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
                                    },
                                    type: 'POST',
                                    url: '<?php echo e(route('vimeo.chunk.delete')); ?>',
                                    data: {
                                        filename: name,
                                    },
                                    success: function (data){
                                        window.location.reload();
                                    },
                                    error: function(e) {
                                        console.log(e);
                                    }});
                                var fileRef;
                                return (fileRef = file.previewElement) != null ?
                                    fileRef.parentNode.removeChild(file.previewElement) : void 0;
                            });
                        }
                    });
                },
                reRenderMathJax: function(){
                    app.$nextTick(function () {
                        MathJax.Hub.Typeset()
                    });
                },
                initEditor: function(element_id, height){
                    return CKEDITOR.replace(element_id, {
                        filebrowserUploadUrl: '<?php echo e(route('ckeditor.upload', ['_token' => csrf_token()])); ?>',
                        filebrowserUploadMethod: 'form',
                        height,
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
                getSkills:async function(){
                    this.skills = await this.fetchLibrary(this.topic_id, 'skill');
                },
                fetchLibrary: function(parent_topic_id, topic_required){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '<?php echo e(route('library.fetch')); ?>',
                        data: {
                            parent_topic_id,
                            topic_required,
                        },
                    });
                },
                loadUnlinkedAttachment: async function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });
                    return $.ajax({
                        type: 'POST',
                        url: '<?php echo e(route('video.get.unlinked.attachment')); ?>',
                    });
                },
                loadVideoFromHistory:async function(){
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '<?php echo e(route('vimeo.load.history')); ?>',
                    });
                },

                /** Video Attachment */
                addAttachment: function(){
                    if(this.attachment_title == ''){
                        swal('Title Is required', 'Please Enter File Title', 'warning');
                        return;
                    }
                    const attachmentFile = this._("attachmentFile").files[0];
                    if(!attachmentFile){
                        swal('File is required', 'Please Select a file!', 'warning');
                    }

                    const formdata = new FormData();
                    formdata.append('_token', '<?php echo e(csrf_token()); ?>');
                    formdata.append('title', this.attachment_title);
                    formdata.append('file', attachmentFile);
                    formdata.append('attachments', app.attachments);

                    const ajax = new XMLHttpRequest();
                    ajax.upload.addEventListener("progress", function(event){
                        const percent = (event.loaded / event.total) * 100;
                        $('#progress_bar2').attr('aria-valuenow', percent);
                        $('#progress_bar2').attr('style', 'width: '+percent+'%');
                        app._('progress_bar2').innerHTML = percent.toString().substr(0,5)+' %';
                    }, false); // progress handler
                    ajax.addEventListener('load', async function(event){
                        const res = JSON.parse(event.target.responseText)
                        app.attachments = await app.loadUnlinkedAttachment();
                        console.log(res);
                        if(res.error){
                            swal(res.error);
                        }
                        $('#progress2').hide();
                        app.attachment_title = '';
                        app._('attachmentFile').value = null;

                    }, false); // complete event
                    ajax.open("POST" ,"<?php echo e(route('upload.video.attachment.request')); ?>");
                    ajax.send(formdata);
                    $("#progress2").show();

                },
                deleteAttachment: function(idx){

                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>'
                        }
                    });
                    return $.ajax ({
                        type: 'POST',
                        url: '<?php echo e(route('video.delete.unlinked.attachment')); ?>',
                        data:{
                            id: app.attachments[idx].id,
                        },
                        success: function(res){
                            app.attachments.splice(idx, 1);
                        },
                    });
                },
                _: function(el){
                    return document.getElementById(el);
                },
                submit: function(){

                    error = 0;
                    var video = null;
                    if(this.title == ''){
                        $('.note').show();
                        this._('note_text').innerHTML = 'Title is required !';
                        error =1;
                    }


                    if(!error){
                        $(".note").hide();
                        $("#progress1").show();
                        $('.vueform').hide();
                        $('.details').show();
                        if(video){
                            $('.details').html('Title: '+this.title+'</br>Total Upload Size: '+Math.round(cover_image.size/1000000)+' MB');
                        }else{
                            $('.details').html('Title: '+this.title+'</br>');
                        }

                        var formdata = new FormData();
                        formdata.append('_token', '<?php echo e(csrf_token()); ?>');
                        formdata.append('title', this.title);
                        formdata.append('description', this.descriptionEditor.getData());
                        formdata.append('path_id', this.path_id ?? '');
                        formdata.append('course_id', this.course_id ?? '');
                        formdata.append('part_id', this.part_id ?? '');
                        formdata.append('chapter_id', this.chapter_id ?? '');
                        formdata.append('topic_id', this.topic_id ?? '');
                        formdata.append('skill_id', this.skill_id ?? '');

                        var ajax = new XMLHttpRequest();
                        ajax.upload.addEventListener("progress", this.progressHandler, false); // progress handler
                        ajax.addEventListener('load', this.completeHandler, false); // complete event
                        ajax.addEventListener('error', this.errorHandler, false);
                        ajax.addEventListener('abort', this.abortHandler, false);

                        ajax.open("POST" ,"<?php echo e(route('video.store')); ?>");
                        ajax.send(formdata);
                    }else{
                        KTUtil.scrollTop();
                    }
                },
                progressHandler: function(event){
                    // this._('progress_bar').innerHTML = "Uploaded "+event.loaded+" bytes of "+event.total;
                    var percent = (event.loaded / event.total) * 100;
                    // this._('progressBar').value = Math.round(percent);
                    $('#progress_bar').attr('aria-valuenow', percent);
                    $('#progress_bar').attr('style', 'width: '+percent+'%');
                    this._('progress_bar').innerHTML = percent.toString().substr(0,5)+' %';
                    if(percent == 100){
                        $('#progress_bar').addClass('progress-bar-animated progress-bar-info');
                        this._('progress_bar').innerHTML = 'Sending to Servers ...';

                    }

                },
                completeHandler: function(event){
                    const res = JSON.parse(event.target.responseText);
                    if(res.error == ''){
                        window.location.href = "<?php echo e(route('video.index')); ?>";
                    }else{
                        $('#progress1').hide();
                        $('.vueform').show();
                        this._('note_text').innerHTML = res.error;
                        $('.note').show();
                    }
                },
                errorHandler: function(){
                    alert('error ! contact to customer services');
                },
                abortHandler: function(){
                    alert('error !');
                },
            }
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>