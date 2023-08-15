<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'ShowLoginForm']);
Route::get('/reload', [App\Http\Controllers\Auth\LoginController::class, 'reloadCaptcha'])->name('reload');

Auth::routes(['verify' => true]);

Route::prefix('admin')->group(function () {

    Route::group(['middleware' => ['auth', 'verified']], function () {

        // MAIN MENU
        // Dashboard
        Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard.index');
        Route::get('/logactivity/clear', [App\Http\Controllers\Admin\DashboardController::class, 'clear_log'])->name(('admin.logactivity.clear'));

        /* MASTER */
        // Kategori
        Route::resource('/kategori', App\Http\Controllers\Admin\KategoriController::class, ['except' => 'show', 'as' => 'admin']);

        // Donatur
        Route::resource('/donatur', App\Http\Controllers\Admin\DonaturController::class, ['except' => 'show', 'as' => 'admin']);

        // Jenis Bantuan
        Route::resource('/jenisbantuan', App\Http\Controllers\Admin\JenisBantuanController::class, ['except' => 'show', 'as' => 'admin']);

        // Users
        Route::resource('/users', App\Http\Controllers\Admin\UsersController::class, ['except' => ['show'], 'as' => 'admin']);

        // User
        Route::resource('/user', App\Http\Controllers\Admin\UserController::class, ['except' => ['show'], 'as' => 'admin']);

        // Stunting
        Route::group(['prefix' => 'stunting'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\StuntingController::class, 'index'])->name('admin.stunting.index');
            Route::post('/verifikasi', [\App\Http\Controllers\Admin\StuntingController::class, 'verifikasi'])->name('admin.stunting.verifikasi');
            Route::get('/cetak/{nik}', [\App\Http\Controllers\Admin\StuntingController::class, 'cetak'])->name('admin.stunting.cetak');
        });


        /* TRANSAKSI */
        // Sasaran
        Route::resource('/sasaran', App\Http\Controllers\Admin\SasaranController::class, ['except' => 'show', 'as' => 'admin']);

        // Donasi
        Route::resource('/donasi', App\Http\Controllers\Admin\DonasiController::class, ['except' => 'show', 'as' => 'admin']);

        //Bantuan
        Route::resource('/bantuan', App\Http\Controllers\Admin\BantuanController::class, ['except' => 'show', 'as' => 'admin']);
        Route::group(['prefix' => 'bantuan'], function () {
            Route::get('/donasi/{id}', [\App\Http\Controllers\Admin\BantuanController::class, 'bantuan'])->name('admin.bantuan.donasi');
        });

        // Permissions
        // Route::resource('/permission', App\Http\Controllers\Admin\PermissionController::class, ['except' => ['show', 'create', 'edit', 'update', 'delete'] ,'as' => 'admin']);

        // Roles
        // Route::resource('/role', App\Http\Controllers\Admin\RoleController::class, ['except' => ['show'] ,'as' => 'admin']);

        // Tags
        // Route::resource('/tag', App\Http\Controllers\Admin\TagController::class, ['except' => 'show' ,'as' => 'admin']);

        // Categories
        // Route::resource('/category', App\Http\Controllers\Admin\CategoryController::class, ['except' => 'show' ,'as' => 'admin']);

        // Posts
        // Route::resource('/post', App\Http\Controllers\Admin\PostController::class, ['except' => 'show' ,'as' => 'admin']);

        // Event
        // Route::resource('/event', App\Http\Controllers\Admin\EventController::class, ['except' => 'show' ,'as' => 'admin']);

        // Agenda
        // Route::resource('/agenda', App\Http\Controllers\Admin\AgendaController::class, ['except' => 'show', 'as' => 'admin']);

        // Dokumen
        // Route::resource('/dokumen', App\Http\Controllers\Admin\DokumenController::class, ['except' => 'show', 'as' => 'admin']);

        // Banner
        // Route::resource('/banner', App\Http\Controllers\Admin\BannerController::class, ['except' => 'show', 'as' => 'admin']);

        // Berita
        // Route::resource('/berita', App\Http\Controllers\Admin\BeritaController::class, ['except' => 'show', 'as' => 'admin']);

        // Konten Statis
        // Route::resource('/datastatis', App\Http\Controllers\Admin\DataStatisController::class, ['except' => 'show', 'as' => 'admin']);
        // Route::post('/datastatis/imgupload', [\App\Http\Controllers\Admin\DataStatisController::class, 'imgUpload']);

        // Kategori Berita
        // Route::resource('/kategoriberita', App\Http\Controllers\Admin\KategoriBeritaController::class, ['except' => 'show', 'as' => 'admin']);

        // Kategori Data
        // Route::resource('/kategoridata', App\Http\Controllers\Admin\KategoriDataController::class, ['except' => 'show' ,'as' => 'admin']);

        // Album
        // Route::resource('/album', App\Http\Controllers\Admin\AlbumController::class, ['except' => 'show', 'as' => 'admin']);

        // Foto
        // Route::resource('/foto', App\Http\Controllers\Admin\FotoController::class, ['except' => 'show', 'as' => 'admin']);

        // Photo
        // Route::resource('/photo', App\Http\Controllers\Admin\PhotoController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);

        // Video
        // Route::resource('/video', App\Http\Controllers\Admin\VideoController::class, ['except' => 'show', 'as' => 'admin']);

        // Slider
        // Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class, ['except' => ['show', 'create', 'edit', 'update'] ,'as' => 'admin']);
        // Route::resource('/slider', App\Http\Controllers\Admin\SliderController::class, ['except' => 'show', 'as' => 'admin']);

        // PENGATURAN
        // Template
        // Route::resource('/template', App\Http\Controllers\Admin\TemplateController::class, ['except' => 'show', 'as' => 'admin']);

        // Web Config
        // Route::resource('/webconfig', App\Http\Controllers\Admin\WebConfigController::class, ['except' => 'show', 'as' => 'admin']);

        // Route::group(['prefix' => 'tags'], function () {
        //     Route::get('/', [\App\Http\Controllers\Admin\TagsController::class, 'index'])->name('admin.tags.index');
        //     Route::get('/create', [App\Http\Controllers\Admin\TagsController::class, 'create'])->name('admin.tags.create');
        //     Route::post('/store', [App\Http\Controllers\Admin\TagsController::class, 'store'])->name('admin.tags.store');
        //     Route::get('/edit/{id}', [App\Http\Controllers\Admin\TagsController::class, 'edit'])->name('admin.tags.edit');
        //     Route::put('/update/{id}', [App\Http\Controllers\Admin\TagsController::class, 'update'])->name('admin.tags.update');
        //     Route::delete('/{id}', [App\Http\Controllers\Admin\TagsController::class, 'destroy'])->name(('admin.tags.destroy'));
        // });
    });
});
