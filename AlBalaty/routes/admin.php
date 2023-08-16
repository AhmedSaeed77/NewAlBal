<?php


use Vimeo\Vimeo;

Route::prefix('teacher')->group(function(){

    Route::get('vimeo', function(){
        $vimeo = new Vimeo('2e94b7eb60965c3c67f62ffafeec17ab029bcf71',
            'fyy/7O3vfza0x0bwvNsOcid39aVtOGCStWrHm+qZXI7Rdjmm2hSBDJAiX6Q98LVbiRHFgHBWVai8EDlWgF7pKze+OliruqmQnu3ox1rL1EjojmybDHay2VrNKQkgJHLa',
            'cc6295ea765692befd91c8e727618ea0');
        dd(
            $vimeo
        );
    });


    /** Auth Routes */
    Route::post('/register', 'SuperAdmin\TeacherManagerController@register_teacher')->name('teacher.register.post');
    Route::get('/get-path-courses', 'SuperAdmin\TeacherManagerController@getPathCourses')->name('get.path-courses');
    Route::get('/get-paths', 'SuperAdmin\TeacherManagerController@getPaths')->name('get.paths');
    Route::get('/get-course-part', 'SuperAdmin\TeacherManagerController@getCourseParts')->name('get.course-parts');
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    Route::get('', 'Admin\AdminController@index')->name('admin.dashboard');


    Route::prefix('library')->group(function(){
        Route::get('/', 'Admin\LibraryController@index')->name('library.index.teacher');
        // Exams
        Route::post('/exam/store', 'Admin\LibraryController@storeExam')->name('library.exam.store');
        Route::post('/exam/index', 'Admin\LibraryController@indexExam')->name('library.exam.index');
        Route::get('/exam/destroy/{id}', 'Admin\LibraryController@destroyExam')->name('library.exam.destroy');
        Route::POST('/exam/update/{id}', 'Admin\LibraryController@updateExam')->name('library.exam.update');
        // Tags
        Route::post('/tag/store', 'Admin\LibraryController@storeTag')->name('library.tag.store');
        Route::post('/tag/index', 'Admin\LibraryController@indexTag')->name('library.tag.index');
        Route::get('/tag/destroy/{id}', 'Admin\LibraryController@destroyTag')->name('library.tag.destroy');
        Route::POST('/tag/update/{id}', 'Admin\LibraryController@updateTag')->name('library.tag.update');
    });


    // question management
    Route::prefix('question')->group(function(){
        Route::get('/create', 'Admin\QuestionsController@create')->name('question.create');
        Route::get('/show', 'Admin\QuestionsController@show')->name('question.show');
        Route::get('/review/{id}', 'Admin\QuestionsController@review')->name('question.review');
        Route::post('/review_error/{id}', 'Admin\QuestionsController@review_error')->name('question.review_error');
        Route::get('/index', 'Admin\QuestionsController@index')->name('question.index');
        Route::post('/create', 'Admin\QuestionsController@store')->name('question.store');
        Route::put('/update/{id}', 'Admin\QuestionsController@update')->name('question.update');
        Route::get('/edit/{id}', 'Admin\QuestionsController@edit')->name('question.edit');
        Route::delete('/destroy/{id}', 'Admin\QuestionsController@destroy')->name('question.destroy');
        Route::get('/translate/{id}', 'Admin\QuestionsController@translate')->name('question.translate');
        Route::get('/preview/{id}', 'Admin\QuestionsController@preview')->name('question.preview');
        Route::post('/preview', 'Admin\QuestionsController@preview_loader')->name('question.preview.loader');
        Route::post('/mark-as-reviewed', 'Admin\QuestionsController@markAsReviewed')->name('question.mark.as.reviewed');
        Route::post('/loader', 'Admin\QuestionsController@loader')->name('question.loader');
    });

    /** CKEditor Image Upload */
    Route::post('/ckeditor/images/upload', 'Admin\CKEditorController@uploadFile')->name('ckeditor.upload');

    /** Explanations */
    Route::prefix('explanation')->group(function(){
        Route::get('/index', 'Admin\ExplanationController@index')->name('explanation.index');
        Route::get('/create', 'Admin\ExplanationController@create')->name('explanation.create');
        Route::post('/store', 'Admin\ExplanationController@store')->name('explanation.store');
        Route::get('/edit/{id}', 'Admin\ExplanationController@edit')->name('explanation.edit');
        Route::post('/edit-loader', 'Admin\ExplanationController@editLoader')->name('explanation.edit-loader');
        Route::post('/update/{id}', 'Admin\ExplanationController@update')->name('explanation.update');
        Route::get('/destroy/{id}', 'Admin\ExplanationController@destroy')->name('explanation.destroy');
    });

    /**
     * Events
    //  */
    Route::prefix('event')->group(function(){
        Route::get('/create', 'Admin\EventController@create')->name('event.create');
        Route::post('/store', 'Admin\EventController@store')->name('event.store');
        Route::get('/', 'Admin\EventController@index')->name('event.index');
        Route::get('/edit/{id}', 'Admin\EventController@edit')->name('event.edit');
        Route::post('/update', 'Admin\EventController@update')->name('event.update');
        Route::post('/add/to/user', 'Admin\EventController@add_manual')->name('event.add.manual');
        Route::get('/delete/{id}', 'Admin\EventController@delete')->name('event.delete');
    });

    Route::prefix('video')->group(function(){
        Route::post('/vimeo/fetch', 'Admin\VideoController@fetchVimeo')->name('video.vimeo.fetch');
        Route::get('/create', 'Admin\VimeoController@create')->name('video.create');
        Route::get('/index', 'Admin\VimeoController@index')->name('video.index');
        Route::post('/upload-attachment', 'Admin\VimeoController@uploadAttachment')->name('upload.video.attachment.request');
        Route::post('/get-unlinked-attachments', 'Admin\VimeoController@unlinkedAttachmentLoader')->name('video.get.unlinked.attachment');
        Route::post('/delete-unlinked-attachments', 'Admin\VimeoController@deleteAttachment')->name('video.delete.unlinked.attachment');
        Route::delete('/destroy/{id}', 'Admin\VimeoController@destroy')->name('video.destroy');
        Route::post('/store-request', 'Admin\VimeoController@Upload2VimeoAndStore')->name('video.store');

        /** TO be moved to VimeoController */
        Route::get('/{id}/edit', 'Admin\VideoController@edit')->name('video.edit');
        Route::post('/{id}', 'Admin\VideoController@update')->name('video.update');
        Route::post('/render/data', 'Admin\VideoController@render')->name('render.video.data');



    });
    Route::get('/videos','Admin\VideoController@search')->name('video.search');

    Route::prefix('vimeo-manager')->group(function(){
        Route::post('upload', 'Admin\VimeoController@upload')->name('vimeo.chunk.upload');
        Route::post('delete', 'Admin\VimeoController@delete')->name('vimeo.chunk.delete');
        Route::post('load-history', 'Admin\VimeoController@loadHistory')->name('vimeo.load.history');
    });


//    Route::get('/chapter_pgroup', 'ChapterManagerController@index')->name('chapterManager.show');
//    Route::post('/load/chapter_pgroup', 'ChapterManagerController@load')->name('chapterManager.load');
//    Route::post('/chapter_pgroup', 'ChapterManagerController@add')->name('chapterManager.add');
//    Route::delete('/chapter_pgroup', 'ChapterManagerController@delete')->name('chapterManager.delete');
//    Route::put('/chapter_pgroup', 'ChapterManagerController@update')->name('chapterManager.update');


    Route::prefix('package')->group(function(){
        Route::post('/package-loader', 'Admin\PackageController@packageLoader')->name('package.loader');
        Route::post('/store', 'Admin\PackageController@store')->name('packages.store');
        Route::get('/{id}/edit', 'Admin\PackageController@edit')->name('packages.edit');
        Route::put('/update/{id}', 'Admin\PackageController@update')->name('packages.update');
        Route::get('/create', 'Admin\PackageController@create')->name('packages.create');
        Route::get('/index', 'Admin\PackageController@index')->name('packages.index');
        Route::delete('/destroy/{id}', 'Admin\PackageController@destroy')->name('packages.destroy');
    });


    Route::get('paypal/config', 'PayPalController@index')->name('paypal.config.index');
    Route::post('paypal/config', 'PayPalController@update')->name('paypal.config.store');

    Route::get('/inbox','MessageController@adminIndex')->middleware('auth:admin')->name('admin.inbox');
    Route::post('/inbox', 'MessageController@adminSend')->middleware('auth:admin')->name('admin.sendMessage');



    Route::get('/payment_approve', 'Admin\AdminController@payment_approve_index')->name('payment.approve.index');
    Route::get('/payment_approve/approve/{approve_id}', 'Admin\AdminController@payment_approve')->name('payment.approve.approve');
    Route::get('/payment_approve/cancel/{approve_id}', 'Admin\AdminController@payment_cancel')->name('payment.approve.cancel');

    Route::get('/extension_payment_approve', 'Admin\AdminController@extension_payment_approve_index')->name('extension.payment.approve.index');
    Route::get('/extension_payment_approve/approve/{approve_id}', 'Admin\AdminController@extension_payment_approve')->name('extension.payment.approve');
    Route::get('/extension_payment_appprove/cancel/{approve_id}', 'Admin\AdminController@extension_payment_cancel')->name('extension.payment.cancel');



    /*
        Screen shot
    */
    Route::get('/ScreenShot', 'Admin\AdminController@ScreenShotView')->name('ScreenShotAttempts');


    /**
     * add material
     */
    Route::get('/material/create', 'Admin\AdminController@material_show')->middleware('auth:admin')->name('material.show.admin');
    Route::post('/material/store', 'Admin\AdminController@material_add')->middleware('auth:admin')->name('material.add');
    Route::post('/material/update', 'Admin\AdminController@material_update')->middleware('auth:admin')->name('material.update');
    Route::get('/material/delete/{id}', 'Admin\AdminController@material_delete')->middleware('auth:admin')->name('material.delete');

    /**
     * study plan
     */
    Route::get('/StudyPlan/add', 'Admin\AdminController@studyPlan_show')->middleware('auth:admin')->name('studyPlan.show.admin');
    Route::post('/StudyPlan/store', 'Admin\AdminController@studyPlan_add')->middleware('auth:admin')->name('studyPlan.add');
    Route::get('/StudyPlan/delete/{id}', 'Admin\AdminController@studyPlan_delete')->middleware('auth:admin')->name('studyPlan.delete');
    /**
     * Flash Card
     */
    Route::get('/FlashCard/add', 'Admin\AdminController@flashCard_show')->middleware('auth:admin')->name('flashCard.show.admin');
    Route::post('/FlashCard/store', 'Admin\AdminController@flashCard_add')->middleware('auth:admin')->name('flashCard.add');
    Route::get('/FlashCard/delete/{id}', 'Admin\AdminController@FlashCard_delete')->middleware('auth:admin')->name('flashCard.delete');
    Route::get('/FlashCard/edit/{id}', 'Admin\AdminController@FlashCard_edit')->middleware('auth:admin')->name('flashCard.edit');
    Route::post('/FlashCard/edit/{id}', 'Admin\AdminController@FlashCard_update')->middleware('auth:admin')->name('flashCard.update');

    /**
     * FAQs
     */
    Route::get('/FAQ/add','Admin\AdminController@faq_show')->middleware('auth:admin')->name('faq.show.admin');
    Route::post('/FAQ/store','Admin\AdminController@faq_add')->middleware('auth:admin')->name('faq.add');
    Route::get('/FAQ/delete/{id}', 'Admin\AdminController@faq_delete')->middleware('auth:admin')->name('faq.delete');
    Route::get('/FAQ/edit/{id}', 'Admin\AdminController@faq_edit')->middleware('auth:admin')->name('faq.edit');
    Route::post('/FAQ/edit/{id}', 'Admin\AdminController@faq_update')->middleware('auth:admin')->name('faq.update');

    Route::get('/users/FeedBack', 'Admin\AdminController@FeedbackView')->name('users.feedback.view');
    Route::get('/users/feedback/disable/{id}', 'Admin\AdminController@toggle_feedback')->name('users.feedback.disable.toggle');

    /**
     * Promotion Email
     */
    Route::get('/promotion/email', 'Admin\AdminController@promotion_view')->middleware('auth:admin')->name('promotion.index');
    Route::post('/promotion/email/send', 'Admin\AdminController@promotion_send')->middleware('auth:admin')->name('promotion.send');

    /**
     * Rearrange
     */
    Route::get('/videos/rearrange/index/{course_id}', 'Admin\AdminController@rearrange_index')->middleware('auth:admin')->name('rearrange.index');
    Route::post('/videos/getChapterVideos', 'Admin\AdminController@getChapterVideos')->middleware('auth:admin')->name('getChapterVideos');
    Route::post('/videos/videoReplace', 'Admin\AdminController@videoReplace')->middleware('auth:admin')->name('videoReplace');

    /**
     * admin manage comments replies
     */
    Route::get('/comments/{page}', 'Admin\AdminController@comments_show')->middleware('auth:admin')->name('admin.comments.show');
    Route::get('/RatingComments/{page}', 'Admin\AdminController@RatingComments_show')->middleware('auth:admin')->name('admin.Rating.comment.show');

    /**
     * admin inbox
     */
    Route::get('/inboxV2', 'MessageController@inbox_show')->middleware('auth:admin')->name('admin.inboxv2');
    Route::post('/inboxV2', 'MessageController@inbox_send')->middleware('auth:admin')->name('admin.inboxv2.send');

    /**
     * Terms Of Service
     */
    Route::get('/termsOfService', 'HomeController@index_termsOfSevice')->middleware('auth:admin')->name('admin.terms.index');
    Route::post('/termsOfService', 'HomeController@store_termsOfSevice')->middleware('auth:admin')->name('admin.terms.store');



    Route::get('activation-group/create', 'ActivationGroupController@create')->name('activation.group.create');
    Route::post('activation-group/store', 'ActivationGroupController@store')->name('activation.group.store');
});
