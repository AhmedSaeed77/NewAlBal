<?php


Route::prefix('super-admin')->group(function(){
    /**
     * Auth Routes
     */
    Route::get('/login', 'Auth\SuperAdminLoginController@showLoginForm')->name('super-admin.login');
    Route::post('/login', 'Auth\SuperAdminLoginController@login')->name('super-admin.login.submit');
    Route::get('/', 'SuperAdmin\SuperAdminController@index')->name('super-admin.dashboard');

    /**
     * System Library
     */
    Route::prefix('library')->group(function(){
        Route::get('/index', 'SuperAdmin\LibraryController@index')->name('library.index');
        Route::get('/create', 'SuperAdmin\LibraryController@create')->name('library.create');
        Route::post('/store/single/{topic_type}', 'SuperAdmin\LibraryController@singleStore')->name('library.single.store');
        Route::post('/store', 'SuperAdmin\LibraryController@store')->name('library.store');
        Route::get('/edit/{id}', 'SuperAdmin\LibraryController@edit')->name('library.edit');
        Route::post('/loader/{id}', 'SuperAdmin\LibraryController@loader')->name('library.loader');
        Route::post('/update/single/{topic_type}', 'SuperAdmin\LibraryController@singleUpdate')->name('library.single.update');
        Route::put('/update/{id}', 'SuperAdmin\LibraryController@update')->name('library.update');
        Route::post('/show/{id}', 'SuperAdmin\LibraryController@show')->name('library.show');
        Route::post('/destroy/single/{topic_type}', 'SuperAdmin\LibraryController@singleDestroy')->name('library.single.destroy');
        Route::get('/destroy/{id}', 'SuperAdmin\LibraryController@destroy')->name('library.destroy');
        Route::post('/fetch', 'SuperAdmin\LibraryController@fetchLibrary')->name('library.fetch');
    });

    Route::prefix('package-manager')->group(function(){
        Route::get('/index', 'SuperAdmin\PackageManagerController@index')->name('super-admin.package-manager.index');
        Route::get('/edit/{id}', 'SuperAdmin\PackageManagerController@edit')->name('super-admin.package-manager.edit');
        Route::post('/update/{id}', 'SuperAdmin\PackageManagerController@update')->name('super-admin.package-manager.update');

    });

    /**
     * Teacher Manager
     */
    Route::prefix('teacher')->group(function(){
        Route::get('/create', 'SuperAdmin\TeacherManagerController@create')->name('teacher.create');
        Route::post('/get/roles', 'SuperAdmin\TeacherManagerController@getRoles')->name('get.roles');
        Route::post('/get/role/pages', 'SuperAdmin\TeacherManagerController@getRolePages')->name('get.role.pages');
        Route::post('/store', 'SuperAdmin\TeacherManagerController@store')->name('teacher.store');
        Route::post('/get/permissions', 'SuperAdmin\TeacherManagerController@getAdminPermissions')->name('get.teacher.permissions');
        Route::get('/edit/{id}', 'SuperAdmin\TeacherManagerController@edit')->name('teacher.edit');
        Route::post('/update/{id}', 'SuperAdmin\TeacherManagerController@update')->name('teacher.update');
        Route::get('/index', 'SuperAdmin\TeacherManagerController@index')->name('teacher.index');
        Route::post('/exams', 'SuperAdmin\TeacherManagerController@getTeacherExams')->name('teacher.exams');
    });

    /**
     * Zones
     */
    Route::prefix('zone')->group(function(){
        Route::get('/create', 'SuperAdmin\ZoneController@create')->name('zone.create');
        Route::post('/store', 'SuperAdmin\ZoneController@store')->name('zone.store');
        Route::get('/edit/{id}', 'SuperAdmin\ZoneController@edit')->name('zone.edit');
        Route::put('/update/{id}', 'SuperAdmin\ZoneController@update')->name('zone.update');
        Route::get('/', 'SuperAdmin\ZoneController@index')->name('zone.index');
        Route::post('/fetch', 'SuperAdmin\ZoneController@fetchZone')->name('zone.fetch');
        Route::delete('/destroy/{id}', 'SuperAdmin\ZoneController@destroy')->name('zone.destroy');
    });


    Route::prefix('student')->group(function(){

        Route::get('/', 'SuperAdmin\SuperAdminController@allUsersIndex')->name('showAllUsers');
        Route::get('/search/', 'SuperAdmin\SuperAdminController@searchByEMail')->name('search.user.by.email');
        Route::get('/search/package', 'SuperAdmin\SuperAdminController@searchByPackage')->name('search.user.by.package');
        Route::post('/update/email', 'SuperAdmin\SuperAdminController@updateEmail')->name('update.email');
        Route::get('/{user_id}/delete/{package_id}/package', 'SuperAdmin\SuperAdminController@removeUserPackage')->name('remove.user.package');
        Route::get('/{user_id}/delete/{package_id}/event', 'SuperAdmin\SuperAdminController@removeUserEvent')->name('remove.user.event');
        Route::get('/disabled','SuperAdmin\SuperAdminController@disabled_users_view')->name('disabled.user.view');

        Route::get('/disable/{user_id}', 'SuperAdmin\SuperAdminController@user_disable')->name('admin.user.disable');
        Route::get('/enable/{user_id}', 'SuperAdmin\SuperAdminController@user_enable')->name('admin.user.enable');
        Route::get('/add_package/{user_id}', 'SuperAdmin\SuperAdminController@manual_add_package')->name('admin.user.manual.add.package');
        Route::post('/add_package/', 'SuperAdmin\SuperAdminController@manual_add_package_post')->name('admin.user.manual.add.package.post');
        Route::post('/manual/time/extends', 'SuperAdmin\SuperAdminController@manual_time_extends')->name('admin.user.manual.time.extends');
    });
    
    
    // events
    
        Route::prefix('event')->group(function(){
             Route::get('/', 'Admin\EventController@indexSuperAdmin')->name('super-admin.event.index');
             Route::get('/edit/{id}', 'Admin\EventController@editSuperAdmin')->name('super-admin.event.edit');
             Route::post('/update', 'Admin\EventController@update')->name('super-admin.event.update');
        });

    /*
        Coupons
    */
    Route::get('/coupons/create', 'CouponController@create_coupons')->middleware('auth:super-admin')->name('coupon.create');
    Route::post('/coupons/generate','CouponController@generate')->middleware('auth:super-admin')->name('coupon.generate');
    Route::get('/coupons', 'CouponController@show')->middleware('auth:super-admin')->name('coupon.show');
    Route::get('/coupons/delete/{id}', 'CouponController@destroy')->middleware('auth:super-admin')->name('coupon.destroy');
    Route::get('/coupons/promote/{id}', 'CouponController@promote')->middleware('auth:super-admin')->name('coupon.promote');
    Route::get('/coupons/demote/{id}', 'CouponController@demote')->middleware('auth:super-admin')->name('coupon.demote');

    /**
    * Statistics
    */
    Route::get('/statics/path/{id}', 'SuperAdmin\SuperAdminController@statics_index')->middleware('auth:super-admin')->name('statics.index');
    Route::post('/statics/query', 'SuperAdmin\SuperAdminController@statics_query')->middleware('auth:super-admin')->name('statics.query');


    /*
        transactions
    */
   Route::get('/transactions', 'TransactionController@show')->middleware('auth:super-admin')->name('transactions.show');
   Route::get('/transactions/accept/{pay}', 'TransactionController@accept')
        ->middleware('auth:super-admin')->name('transactions.accept');
    Route::get('/transactions/refuse/{pay}', 'TransactionController@refuse')
    ->middleware('auth:super-admin')->name('transactions.refuse');
});
