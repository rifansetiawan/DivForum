<?php

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


Route::group(["as" => "guest"],function(){
	Route::get('/', "GuestController@home");
	Route::get('/thread/kategori/{id}', "GuestController@thread_kategori");
	Route::get('/thread/detail/{id}', "GuestController@detail_thread");

	Route::get('/user/detail/{id}', "GuestController@detail_user");
	
	Route::get('/register', "GuestController@register");
	Route::post('/register', "GuestController@do_register");

	Route::get('/login', "GuestController@login");
	Route::post('/login', "GuestController@do_login");

	Route::get('/logout', "GuestController@logout");

	Route::get('/vote/{status}/{id}', "GuestController@vote");
});

Route::group(["middleware" => "admin","prefix" => "admin"],function(){
	Route::get('/', "AdminController@thread");
	Route::get('/thread/kategori/{id}', "AdminController@thread_kategori");
	Route::get('/thread/tambah', "AdminController@tambah_thread");
	Route::post('/thread/tambah', "AdminController@do_tambah_thread");
	Route::get('/thread-saya', "AdminController@thread_saya");
	Route::get('/thread/hapus/{id}', "AdminController@hapus_thread");
	Route::get('/thread/ubah/{id}', "AdminController@ubah_thread");
	Route::post('/thread/ubah/{id}', "AdminController@do_ubah_thread");
	Route::get('/thread/status/{status}/{id}', "AdminController@ubah_status_thread");
	Route::get('/thread/detail/{id}', "AdminController@detail_thread");

	Route::post("/posting/tambah/{id}","AdminController@do_tambah_posting");
	Route::get("/posting/hapus/{id}","AdminController@hapus_posting");
	Route::get("/posting/ubah/{id}","AdminController@ubah_posting");
	Route::post("/posting/ubah/{id}/{idt}","AdminController@do_ubah_posting");

	Route::get('/kategori', "AdminController@kategori");
	Route::get('/kategori/tambah', "AdminController@tambah_kategori");
	Route::post('/kategori/tambah', "AdminController@do_tambah_kategori");
	Route::get('/kategori/hapus/{id}', "AdminController@hapus_kategori");
	Route::get('/kategori/ubah/{id}', "AdminController@ubah_kategori");
	Route::post('/kategori/ubah/{id}', "AdminController@do_ubah_kategori");

	Route::get('/member', "AdminController@member");
	Route::get('/member/hapus/{id}', "AdminController@hapus_member");

	Route::get('/user/detail/{id}', "AdminController@detail_user");

	Route::post('/inbox/tambah/{id}', "AdminController@tambah_pesan");

	Route::get('/profil', "AdminController@profil");
	Route::post('/profil', "AdminController@do_profil");

	Route::get('/member/tambah', "AdminController@tambah_member");
	Route::post('/member/tambah', "AdminController@do_register");

	Route::get('/member/ubah/{id}', "AdminController@ubah_member");
	Route::post('/member/ubah/{id}', "AdminController@do_ubah_member");

	Route::get('/inbox', "AdminController@inbox");
	Route::get('/inbox/hapus/{id}', "AdminController@hapus_pesan");

});

Route::group(["middleware" => "member","prefix" => "member"],function(){
	Route::get('/', "MemberController@thread");
	Route::get('/thread/kategori/{id}', "MemberController@thread_kategori");
	Route::get('/thread/tambah', "MemberController@tambah_thread");
	Route::post('/thread/tambah', "MemberController@do_tambah_thread");
	Route::get('/thread-saya', "MemberController@thread_saya");
	Route::get('/thread/hapus/{id}', "MemberController@hapus_thread");
	Route::get('/thread/ubah/{id}', "MemberController@ubah_thread");
	Route::post('/thread/ubah/{id}', "MemberController@do_ubah_thread");
	Route::get('/thread/detail/{id}', "MemberController@detail_thread");

	Route::post("/posting/tambah/{id}","MemberController@do_tambah_posting");
	Route::get("/posting/hapus/{id}","MemberController@hapus_posting");
	Route::get("/posting/ubah/{id}","MemberController@ubah_posting");
	Route::post("/posting/ubah/{id}/{idt}","MemberController@do_ubah_posting");

	Route::get('/user/detail/{id}', "MemberController@detail_user");

	Route::post('/inbox/tambah/{id}', "MemberController@tambah_pesan");

	Route::get('/profil', "MemberController@profil");
	Route::post('/profil', "MemberController@do_profil");

	Route::get('/inbox', "MemberController@inbox");
	Route::get('/inbox/hapus/{id}', "MemberController@hapus_pesan");

	
	
});
