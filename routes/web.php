<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'admin'], function () {
    //Kategori
    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/tambah-kategori', 'AdminController@tambahKategori')->name('tambahKategori');
    Route::post('post-kategori', 'AdminController@postKategori')->name('postKategori');
    Route::get('/edit-kategori/{slug}', 'AdminController@editKategori')->name('editKategori');
    Route::put('/put-kategori/{slug}', 'AdminController@updateKategori')->name('putKategori');
    Route::get('/delete-kategori/{slug}', 'AdminController@deleteKategori')->name('deleteKategori');
    Route::get('/read-kategori/{slug}', 'AdminController@readKategori')->name('readKategori');

    //Artikel
    Route::get('/artikel', 'AdminController@artikel')->name('artikel');
    Route::get('/tambah-artikel', 'AdminController@tambahArtikel')->name('tambahArtikel');
    Route::post('post-artikel', 'AdminController@postArtikel')->name('postArtikel');
    Route::get('/edit-artikel/{slug}', 'AdminController@editArtikel')->name('editArtikel');
    Route::put('/put-artikel/{slug}', 'AdminController@updateArtikel')->name('putArtikel');
    Route::get('/delete-artikel/{slug}', 'AdminController@deleteArtikel')->name('deleteArtikel');
    Route::get('/read-artikel/{slug}', 'AdminController@readArtikel')->name('readArtikel');

    //User
    Route::get('/user', 'AdminController@user')->name('user');
    Route::get('/tambah-user', 'AdminController@tambahUser')->name('tambahUser');
    Route::post('post-user', 'AdminController@postUser')->name('postUser');
    Route::get('/edit-user/{id}', 'AdminController@editUser')->name('editUser');
    Route::put('edit-user/put-user/{id}', 'AdminController@updateUser')->name('putUser');
    Route::get('/delete-user/{id}', 'AdminController@deleteUser')->name('deleteUser');
    Route::get('/read-user/{id}', 'AdminController@readUser')->name('readUser');
});

Route::group(['middleware' => 'author'], function () {
    //Kategori
    Route::get('author', 'AuthorController@index')->name('author');
    Route::get('author/tambah-kategori', 'AuthorController@tambahKategori')->name('author-tambahKategori');
    Route::post('author/post-kategori', 'AuthorController@postKategori')->name('author-postKategori');
    Route::get('author/edit-kategori/{slug}', 'AuthorController@editKategori')->name('author-editKategori');
    Route::put('author/put-kategori/{slug}', 'AuthorController@updateKategori')->name('author-putKategori');
    Route::get('author/delete-kategori/{slug}', 'AuthorController@deleteKategori')->name('author-deleteKategori');
    Route::get('author/read-kategori/{slug}', 'AuthorController@readKategori')->name('author-readKategori');

    //Artikel
    Route::get('author/artikel', 'AuthorController@artikel')->name('author-artikel');
    Route::get('author/tambah-artikel', 'AuthorController@tambahArtikel')->name('author-tambahArtikel');
    Route::post('author/post-artikel', 'AuthorController@postArtikel')->name('author-postArtikel');
    Route::get('author/edit-artikel/{slug}', 'AuthorController@editArtikel')->name('author-editArtikel');
    Route::put('author/put-artikel/{slug}', 'AuthorController@updateArtikel')->name('author-putArtikel');
    Route::get('author/delete-artikel/{slug}', 'AuthorController@deleteArtikel')->name('author-deleteArtikel');
    Route::get('author/read-artikel/{slug}', 'AuthorController@readArtikel')->name('author-readArtikel');

    //Profile
    Route::get('/profile/{id}', 'AuthorController@profile')->name('profile');
    Route::get('/change-password/{id}', 'AuthorController@changePassword')->name('changePassword');
    Route::put('/put-user/{id}', 'AuthorController@updatePassword')->name('putPassword');
});
