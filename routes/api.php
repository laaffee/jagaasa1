<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Data Statis
Route::get('/profil', [App\Http\Controllers\Api\DataStatisController::class, 'index']);
Route::get('/sambutan', [App\Http\Controllers\Api\DataStatisController::class, 'sambutan']);
Route::get('/kepala', [App\Http\Controllers\Api\DataStatisController::class, 'kepala']);
Route::get('/visimisi', [App\Http\Controllers\Api\DataStatisController::class, 'visimisi']);
Route::get('/datapejabat', [App\Http\Controllers\Api\DataStatisController::class, 'datapejabat']);
Route::get('/struktur', [App\Http\Controllers\Api\DataStatisController::class, 'struktur']);
Route::get('/tupoksi', [App\Http\Controllers\Api\DataStatisController::class, 'tupoksi']);
Route::get('/demografi', [App\Http\Controllers\Api\DataStatisController::class, 'demografi']);
Route::get('/pelaksana', [App\Http\Controllers\Api\DataStatisController::class, 'pelaksana']);
Route::get('/profilposyandu', [App\Http\Controllers\Api\DataStatisController::class, 'profilposyandu']);
Route::get('/dataposyandu', [App\Http\Controllers\Api\DataStatisController::class, 'dataposyandu']);

// Kontak
Route::get('/kontak', [App\Http\Controllers\Api\DataStatisController::class, 'kontak']);
Route::get('/whatsapp', [App\Http\Controllers\Api\DataStatisController::class, 'whatsapp']);
Route::get('/instagram', [App\Http\Controllers\Api\DataStatisController::class, 'instagram']);

// Pengaduan
Route::get('/eoffice', [App\Http\Controllers\Api\DataStatisController::class, 'eoffice']);
Route::get('/sibadra', [App\Http\Controllers\Api\DataStatisController::class, 'sibadra']);
Route::get('/span', [App\Http\Controllers\Api\DataStatisController::class, 'span']);

// Posts
Route::get('/post', [App\Http\Controllers\Api\PostController::class, 'index']);
Route::get('/post/{id?}', [App\Http\Controllers\Api\PostController::class, 'show']);
Route::get('/homepage/post', [App\Http\Controllers\Api\PostController::class, 'PostHomePage']);

// Berita
Route::get('/berita', [App\Http\Controllers\Api\BeritaController::class, 'index']);
Route::get('/berita/{slug?}', [App\Http\Controllers\Api\BeritaController::class, 'show']);
Route::get('/kategori/berita', [App\Http\Controllers\Api\BeritaController::class, 'kategori']);
Route::get('/beranda/berita', [App\Http\Controllers\Api\BeritaController::class, 'BeritaHomePage']);
Route::get('/beritakategori/{id?}', [App\Http\Controllers\Api\BeritaController::class, 'beritakategori']);

// Agenda
Route::get('/agenda', [App\Http\Controllers\Api\AgendaController::class, 'index']);
Route::get('/agenda/{slug?}', [App\Http\Controllers\Api\AgendaController::class, 'show']);
Route::get('/homepage/agenda', [App\Http\Controllers\Api\AgendaController::class, 'AgendaHomePage']);

// Slider
Route::get('/slider', [App\Http\Controllers\Api\SliderController::class, 'index']);

// Banner
Route::get('/bannerlink', [App\Http\Controllers\Api\BannerController::class, 'bannerlink']);
Route::get('/banneriklan', [App\Http\Controllers\Api\BannerController::class, 'banneriklan']);

// Album
Route::get('/album', [App\Http\Controllers\Api\AlbumController::class, 'index']);

// Tags
Route::get('/tag', [App\Http\Controllers\Api\TagController::class, 'index']);
Route::get('/tag/{slug?}', [App\Http\Controllers\Api\TagController::class, 'show']);

// Category
// Route::get('/category', [App\Http\Controllers\Api\CategoryController::class, 'index']);
Route::get('/category/{slug?}', [App\Http\Controllers\Api\CategoryController::class, 'show']);

// Dokumen
Route::get('/dokumen', [App\Http\Controllers\Api\DokumenController::class, 'index']);
Route::get('/dokumen/{id?}', [App\Http\Controllers\Api\DokumenController::class, 'show']);
Route::get('/kategoridokumen', [App\Http\Controllers\Api\DokumenController::class, 'kategoridokumen']);

// Foto
Route::get('/photo', [App\Http\Controllers\Api\FotoController::class, 'index']);
Route::get('/detailphoto/{id?}', [App\Http\Controllers\Api\FotoController::class, 'DetailPhoto']);
Route::get('/homepage/photo', [App\Http\Controllers\Api\FotoController::class, 'PhotoHomepage']);

// Video
Route::get('/video', [App\Http\Controllers\Api\VideoController::class, 'index']);
Route::get('/homepage/video', [App\Http\Controllers\Api\VideoController::class, 'VideoHomepage']);

// Visitor
Route::get('/visitor', [App\Http\Controllers\Api\VisitorController::class, 'index']);
Route::get('/addvisitor/{ip}', [App\Http\Controllers\Api\VisitorController::class, 'addvisitor']);

// Web Config
Route::get('/webconfig', [App\Http\Controllers\Api\WebConfigController::class, 'webconfig']);
