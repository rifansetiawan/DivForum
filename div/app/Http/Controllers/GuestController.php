<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon;
use User;
use Auth;
use Thread;
use Posting;

class GuestController extends Controller
{
    //
     function thread_kategori($id_kategori){
        $list = Thread::list_thread("","",$id_kategori);
        return view("guest_view/home")->with("list",$list);
    }

    function home(Request $request){
        $list = Thread::list_thread("",$request->cari);
    	return view('guest_view/home')->with("list",$list);
    }

    function detail_user($id_user){
        $data = User::tampil_user($id_user);
        return view("guest_view/detail_user")->with("data",$data);
    }

    function detail_thread($id_thread){
        $data = Thread::tampil_thread($id_thread);
        $list = Posting::list_posting($id_thread);
        return view("guest_view/detail_thread")
        ->with("data",$data)
        ->with("list",$list);
    }

    function vote($status,$id_user){
        User::vote($id_user,$status);
        return back();
    }

    function logout(){
        Auth::logout();
        return redirect("/");
    }

    function login(){
    	return view("guest_view/login");
    }

    function do_login(Request $request){
    	$email=$request->txt_email;
    	$password=$request->txt_password;
    	$cek = User::login_user($email,$password);
    	if($cek){
    		$posisi = Auth::user()->posisi;
    		switch ($posisi) {
    			case 'Admin':
    				return redirect("/admin");
    				break;
    			
    			case 'Member':
    				return redirect("/member");
    				break;
    		}
    	}else{
    		return back()->with("error","Email dan Password salah");
    	}
    }

    function register(){
    	return view('guest_view/register');
    }

    function do_register(Request $request){
    	$dt = new Carbon\Carbon();
		$before = $dt->subYears(12)->format('Y-m-d');

    	$rules = [
    		"txt_nama" => "required|max:255",
    		"txt_email" => "required|email|unique:users,email",
    		"txt_password" => "required|min:6",
    		"txt_konfirmasi" => "required|same:txt_password",
    		"txt_telp" => "required|numeric",
    		"rdo_kelamin" => "required",
    		"txt_alamat" => "required",
    		"file_foto" => "required|image|mimes:jpeg,png",
    		"txt_tanggal" => "required|before:".$before,
    		"chk_setuju" => "required"
    	];
    	$attribute = [
    		"txt_nama" => "Nama",
    		"txt_email" => "Email",
    		"txt_password" => "Password",
    		"txt_konfirmasi" => "Konfirmasi Password",
    		"txt_telp" => "Telp",
    		"rdo_kelamin" => "Jenis Kelamin",
    		"txt_alamat" => "Alamat",
    		"file_foto" => "File Foto",
    		"txt_tanggal" => "Tanggal Lahir",
    		"chk_setuju" => "Persetujuan"
    	];
    	$message = [
    		"required" => ":attribute wajib diisi",
    		"email" => ":attribute wajib diisi dengan format email yang valid",
    		"max" => ":attribute wajib diisi maksimal :max",
    		"unique"=>":attribute sudah digunakan",
    		"min" => ":attribute wajib diisi minimal :min",
    		"same" => ":attribute wajib diisi sama dengan :other",
    		"numeric" => ":attribute wajib diisi dengan angka",
    		"image" => ":attribute wajib diisi dengan gambar",
    		"mimes" => ":attribute wajib diisi dengan tipe :values",
    		"before" => ":attribute wajib diisi sebelum tanggal ".Carbon::parse($before)->format("d-m-Y")
    	];

    	$this->validate($request,$rules,$message,$attribute);

    	$nama=$request->txt_nama;
    	$email=$request->txt_email;
    	$password=$request->txt_password;
    	$telp=$request->txt_telp;
    	$alamat=$request->txt_alamat;
    	$jenis_kelamin=$request->rdo_kelamin;
    	$tanggal_lahir=$request->txt_tanggal;
    	 $file = $request->file_foto;
        $foto=$file->getClientOriginalName();
        $file->move("img/",$foto);
    	$posisi="Member";
    	User::tambah_user($nama,$email,$password,$telp,$alamat,$jenis_kelamin,$tanggal_lahir,$foto,$posisi);
    	return back()->with("sukses","Data Anda Berhasil terdaftar");
    }
}
