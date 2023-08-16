

<?php $__env->startSection('pageTitle'); ?> Add Material <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderTitle'); ?> Material <?php $__env->stopSection(); ?>
<?php $__env->startSection('subheaderNav'); ?>
    <!--begin::Button-->
    <a href="#" onclick="document.getElementById('materialForm').submit()" class="btn btn-fh btn-white btn-hover-primary font-weight-bold px-2 px-lg-5 mr-2">
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

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="card card-custom">

        <form action="<?php echo e(route('material.add')); ?>" method="post" id="materialForm" class="form-horizontal form-bordered" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="card-body">
                <div class="card-header">
                    <h3>Add Material</h3>
                </div>
                <div class="form-group-lg py-5 row">
                    <label class="col-md-2 col-form-label">Title</label>
                    <div class="col-md-5">
                        <input class="form-control" type="text" placeholder="Title" name="title"/>
                    </div>


                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1"><?php echo e(config('library.part.en')); ?></label>
                    <div class="col-10">
                        <select name="part_id" id="part_id" class="form-control" v-on:change="getChapters" v-model="part_id">
                            <?php $__currentLoopData = $teacherParts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $part): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($part->part_id); ?>"><?php echo e($part->course_title.' - '.$part->part_title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1"><?php echo e(config('library.chapter.en')); ?></label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getTopics" v-model="chapter_id" name="chapter_id">
                            <option value=""></option>
                            <option v-for="i in chapters" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1"><?php echo e(config('library.topic.en')); ?></label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getSkills" v-model="topic_id" name="topic_id">
                            <option value=""></option>
                            <option v-for="i in topics" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1"><?php echo e(config('library.skill.en')); ?></label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-on:change="getLevels" v-model="skill_id" name="skill_id">
                            <option value=""></option>
                            <option v-for="i in skills" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label" for="exampleSelectd1"><?php echo e(config('library.level.en')); ?></label>
                    <div class="col-10">
                        <select class="form-control" id="exampleSelectd1" v-model="level_id" name="level_id">
                            <option value=""></option>
                            <option v-for="i in levels" :value="i.id">{{ i.title }}</option>
                        </select>
                    </div>
                </div>

                <div class="form-group-lg py-5 row">
                    <label class="col-md-1 col-form-label">Material File</label>
                    <div class="col-md-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="file">
                            <label class="custom-file-label" for="img_medium">Choose file</label>
                        </div>
                    </div>

                    <label class="col-md-1 col-form-label">Cover Img</label>
                    <div class="col-md-5">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="cover">
                            <label class="custom-file-label" for="img_medium">Choose file</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-2">
                    </div>
                    <div class="col-10">
                        <button type="submit" class="btn btn-success mr-2">Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="card card-custom mt-5">


        <div class="card-body">
            <div class="card-header">
                <h3>Materials</h3>
            </div>
            <div class="form-horizontal form-md-line-input" style="background: white; padding: 30px 15px; margin-top:20px;">
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                    <th>#</th>
                    <th>Title</th>
                    <th>Preview</th>
                    <th>Date</th>
                    <th>update cover</th>
                    <td>Action</td>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $teacherMaterials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $q): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td></td>
                            <td><?php echo e($q->title); ?></td>
                            <td>
                                <a target="_blank" href="<?php echo e(asset('storage/material/'.basename($q->file_url))); ?>" class=" text-center">
                                    <i class="fa fa-eye text-primary  text-center"></i>
                                </a>
                            </td>
                            <td><?php echo e($q->created_at); ?></td>
                            <td>
                                <form action="<?php echo e(route('material.update')); ?>" enctype="multipart/form-data" style="display:inline-block;" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="cover" onchange="this.form.submit()">
                                        <label class="custom-file-label" for="img_medium">Choose file</label>
                                    </div>
                                    <input type="hidden" name="material_id" value="<?php echo e($q->id); ?>" style="display:inline-block;">
                                </form>
                            </td>
                            <td>
                                <a href="<?php echo e(route('material.delete', $q->id)); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>

        </div>

    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jscode'); ?>
    <script src="<?php echo e(asset('assets/plugins/custom/datatables/datatables.bundle.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/js/pages/crud/datatables/data-sources/html.js')); ?>"></script>

    <?php if(env('APP_ENV') == 'local'): ?>
        <script src="<?php echo e(asset('helper/js/vue-dev.js')); ?>"></script>
    <?php else: ?>
        <script src="<?php echo e(asset('helper/js/vue-prod.min.js')); ?>"></script>
    <?php endif; ?>
    <script>
        var app = new Vue({
            el: '#materialForm',
            data:{

                part_id: null,
                parts: [],
                chapter_id: null,
                chapters: [],
                topic_id: null,
                topics: [],
                skill_id: null,
                skills: [],
                level_id: null,
                levels: [],

            },
            methods:{
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
                getLevels: async function(){
                    this.levels = await  this.fetchLibrary(this.skill_id, 'level');
                    this.level_id = null;
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

            },
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>