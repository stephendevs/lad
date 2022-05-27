<?php
use Illuminate\Support\Facades\Route;


use Stephendevs\Lad\Http\Controllers\DashboardController;
use Stephendevs\Lad\Http\Controllers\Auth\AuthController;
use Stephendevs\Lad\Http\Controllers\Auth\ForgotPasswordController;
use Stephendevs\Lad\Http\Controllers\Auth\ResetPasswordController;

use Stephendevs\Lad\Http\Controllers\Admin\AdminController;
use Stephendevs\Lad\Http\Controllers\Admin\AdminPermissionContproller;
use Stephendevs\Lad\Http\Controllers\Admin\AdminQuickCreateController;
use Stephendevs\Lad\Http\Controllers\Admin\AdminStatusController;
use Stephendevs\Lad\Http\Controllers\Admin\AdminActivityLogController;

use Stephendevs\Lad\Http\Controllers\UserController;


use Stephendevs\Lad\Http\Controllers\Account\AccountController;
use Stephendevs\Lad\Http\Controllers\Account\AccountStatusController;
use Stephendevs\Lad\Http\Controllers\Account\AccountSettingController;
use Stephendevs\Lad\Http\Controllers\Account\AccountNotificationController;
use Stephendevs\Lad\Http\Controllers\Cli\CliController;
use Stephendevs\Lad\Http\Controllers\Artisan\ArtisanController;


use Stephendevs\Lad\Http\Controllers\Setting\SettingController;


use Stephendevs\Lad\Http\Controllers\Mailer\MailerController;
use Stephendevs\Lad\Http\Controllers\Mailer\ContactFormController;
use Stephendevs\Lad\Http\Controllers\Mailer\MailTemplatesController;
use Stephendevs\Lad\Http\Controllers\Mailer\TestContactFormController;

Route::group(['prefix' => config('lad.route_prefix', 'dashboard')], function(){

    Route::group(['middleware' => ['web','guest:auth']], function(){
        Route::get('/login', [AuthController::class, 'index'])->name('lad.login');
        Route::post('/login', [AuthController::class, 'login'])->name('lad.login');
    });

    Route::group(['middleware' => ['web','auth']], function(){
        Route::post('/logout', [AuthController::class, 'logout'])->name('lad.logout');

        Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('lad.password.resetEmailForm');
        Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('lad.password.reset.link');

        Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('lad.password.resetForm');
        Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('lad.password.reset');

        Route::get('/', [DashboardController::class, 'index'])->name('lad.dashboard');

        Route::get('/account', [AccountController::class, 'index'])->name('lad.account');
        Route::get('/account/activitylog', [AccountController::class, 'activityLog'])->name('lad.account.activitylog');

        Route::post('/account/change/password', [AccountController::class, 'changePassword'])->name('lad.account.change.password');

        Route::get('/account/settings', [AccountSettingController::class, 'index'])->name('lad.account.settings');
        
        Route::get('/account/notifications', [AccountNotificationController::class, 'index'])->name('lad.account.notifications');

       Route::get('/account/status/alert', [AccountStatusController::class, 'index'])->name('ldashboardAccountBlockedAlert');
        /**
         * Managing admins routes
         */
        Route::get('/admins', [AdminController::class, 'index'])->name('lad.admins');
        Route::get('/admins/create', [AdminController::class, 'create'])->name('lad.admins.create');
        Route::post('/admins/store', [AdminController::class, 'store'])->name('lad.admins.store');
        Route::get('/admins/{username}/{id}', [AdminController::class, 'show'])->name('lad.admins.show');
        Route::get('/admins/edit/{username}/{id}', [AdminController::class, 'edit'])->name('lad.admins.edit');
        Route::post('/admins/update/{id}', [AdminController::class, 'update'])->name('lad.admins.update');
        Route::get('/admins/trash/{id}', [AdminController::class, 'destroy'])->name('lad.admins.destroy');

        Route::post('/admins/change/password/{id}', [AdminController::class, 'changePassword'])->name('lad.admins.change.password');

        Route::get('/admins/{username}/activitylog', [AdminController::class, 'index'])->name('lad.admins.activitylog');


        Route::get('/admins/blocked', [AdminStatusController::class, 'index'])->name('ldashboardAdminsBlocked')->middleware('issuperadmin');
        Route::get('/admin/blocked/{id}', [AdminStatusController::class, 'show'])->name('ldashboardAdminBlocked')->middleware('issuperadmin');
        Route::post('/admin/block/{id}', [AdminStatusController::class, 'block'])->name('ldashboardAdminBlock')->middleware('issuperadmin');
        Route::post('/admin/unblock/{id}', [AdminStatusController::class, 'unblock'])->name('ldashboardAdminUnblock')->middleware('issuperadmin');

        Route::get('/ajax/admins/table', [AdminController::class, 'table'])->name('lad.admins.table')->middleware('issuperadmin');

        Route::get('/admins/{username}/permissions/{id}', [AdminPermissionController::class, 'index'])->middleware(['permission:manage_user_permissions'])->name('lad.admins.permissions');

        Route::post('/admins/permissions/add/{id}', [AdminPermissionController::class, 'store'])->middleware(['permission:manage_user_permissions'])->name('lad.admins.permissions.add');


        Route::get('/users', [UserController::class, 'index'])->name('lad.users');
        Route::post('/users/create', [UserController::class, 'store'])->name('lad.users.store');


        Route::get('/artisans', [ArtisanController::class, 'index'])->name('lad.artisans');
        Route::post('/artisans/run', [ArtisanController::class, 'run'])->name('lad.artisans.run');
        Route::get('/artisans/common/run/{command}/{options?}', [ArtisanController::class, 'runCommon'])->name('lad.artisans.run.common');

        Route::get('/cli', [CliController::class, 'index'])->middleware('permission:cmd')->name('lad.cli');
        Route::post('/cli', [CliController::class, 'run'])->middleware('permission:cmd')->name('lad.cli');




        /**
         * Dashboard Settings
         */
        Route::get('/system-settings', [SettingController::class, 'index'])->middleware(['permission:configure_system_settings'])->name('lad.settings');
        Route::post('/system-settings/change', [SettingController::class, 'store'])->middleware(['permission:configure_system_settings'])->name('lad.settings.change');


        //Mail module for sending emails.
        Route::get('/mailer', [MailerController::class, 'index'])->name('lad.mailer');
        Route::get('/mailer/templates', [MailTemplatesController::class, 'index'])->name('lad.mailer.templates');

        Route::get('/mailer/contact-form', [ContactFormController::class, 'index'])->name('lad.mailer.contactform');
        Route::post('/mailer/contact-form/test', [TestContactFormController::class, 'send'])->name('lad.mailer.contactform.test');

        Route::post('/contact-us/sendmail', [TestController::class, 'send'])->name('lad.test');

        Route::get('/contact-us/render', [TestController::class, 'render']);
    });
});

