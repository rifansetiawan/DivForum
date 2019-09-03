<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kategori;
use User;
use Auth;
use Carbon;
use Thread;
use Surat;
use Posting;

class MemberController extends Controller
{
    //
    function inbox(){
        $id_penerima = Auth::user()->id_user;
        $list = Surat::list_surat($id_penerima);   
         return view("member_view/inbox")->with("list",$list); 
    }

     function hapus_pesan($id_surat){
        Surat::hapus_surat($id_surat);
        return back();
    }

    function tambah_pesan(Request $request,$id_user){
        $rules = [
            "txt_pesan" => "required",
            
        ];
        $attribute = [
            "txt_pesan" => "isi Pesan",
            
        ];
        $message = [
            "required" => ":attribute wajib diisi",
            
        ];

        $this->validate($request,$rules,$message,$attribute);
        $id_pengirim = Auth::user()->id_user;
        $id_penerima = $id_user;
        $isi_surat = $request->txt_pesan;
        Surat::tambah_surat($id_pengirim,$id_penerima,$isi_surat);
        return back()->with("sukses","Pesan Anda Berhasil terkirim");
    }

    function detail_user($id_user){
        $data = User::tampil_user($id_user);
        return view("member_view/detail_user")->with("data",$data);
    }

    function do_tambah_posting(Request $request,$id_thread){
        $rules = [
            "txt_pesan" => "required",
            
        ];
        $attribute = [
            "txt_pesan" => "isi Balasan",
            
        ];
        $message = [
            "required" => ":attribute wajib diisi",
            
        ];

        $this->validate($request,$rules,$message,$attribute);
        $id_user = Auth::user()->id_user;
        $isi_posting = $request->txt_pesan;
        Posting::tambah_posting($id_thread,$id_user,$isi_posting);
        return back();
    }

    function hapus_posting($id_posting){
        Posting::hapus_posting($id_posting);
        return back();
    }

    function do_ubah_posting(Request $request,$id_posting,$id_thread){
        $rules = [
            "txt_pesan" => "required",
            
        ];
        $attribute = [
            "txt_pesan" => "isi Balasan",
            
        ];
        $message = [
            "required" => ":attribute wajib diisi",
            
        ];

        $this->validate($request,$rules,$message,$attribute);
        $isi_posting = $request->txt_pesan;
        Posting:: ubah_posting($id_posting,$isi_posting);
        return redirect("member/thread/detail/".$id_thread);
    } 

    function ubah_posting($id_posting){
        $data = Posting::tampil_posting($id_posting);
        return view("member_view/ubah_posting")->with("data",$data);
    }

    function thread(Request $request){
        $list = Thread::list_thread("",$request->cari);
    	return view("member_view/thread")->with("list",$list);
    }

    function detail_thread($id_thread){
        $data = Thread::tampil_thread($id_thread);
        $list = Posting::list_posting($id_thread);
        return view("member_view/detail_thread")
        ->with("data",$data)
        ->with("list",$list);
    }

    function thread_saya(){
        $list = Thread::list_thread(Auth::user()->id_user);
        return view("member_view/thread")->with("list",$list);
    }

    function thread_kategori($id_kategori){
        $list = Thread::list_thread("","",$id_kategori);
        return view("member_view/thread")->with("list",$list);
    }

    function hapus_thread($id_thread){
        Thread::hapus_thread($id_thread);
        return redirect('member/');
    }

    function tambah_thread(){
        $kategori = Kategori::list_kategori();
        return view("member_view/tambah_thread")->with("kategori",$kategori); 
    }

    function do_tambah_thread(Request $request){
        $rules = [
            "txt_nama" => "required",
            "cbo_kategori" => "required",
            "txt_deskripsi" => "required"
            
        ];
        $attribute = [
            "txt_nama" => "Nama Thread",
            "txt_deskripsi" => "Deskripsi Thread",
            "cbo_kategori" => "Kategori"
        ];
        $message = [
            "required" => ":attribute wajib diisi",
            
        ];

        $this->validate($request,$rules,$message,$attribute);
        $nama_thread=$request->txt_nama;
        $id_kategori=$request->cbo_kategori;
        $deskripsi=$request->txt_deskripsi;
        $status_thread="Buka";
        $id_user = Auth::user()->id_user;
        Thread::tambah_thread($nama_thread,$id_kategori,$deskripsi,$status_thread,$id_user);
        return redirect('member/');
    }

    function ubah_thread($id_thread){
        $kategori = Kategori::list_kategori();
        $data = Thread::tampil_thread($id_thread);
        return view("member_view/ubah_thread")
        ->with("data",$data)
        ->with("kategori",$kategori); 
    }

    function do_ubah_thread(Request $request,$id_thread){
        $rules = [
            "txt_nama" => "required",
            "cbo_kategori" => "required",
            "txt_deskripsi" => "required"
            
        ];
        $attribute = [
            "txt_nama" => "Nama Thread",
            "txt_deskripsi" => "Deskripsi Thread",
            "cbo_kategori" => "Kategori"
        ];
        $message = [
            "required" => ":attribute wajib diisi",
            
        ];

        $this->validate($request,$rules,$message,$attribute);
        $nama_thread=$request->txt_nama;
        $id_kategori=$request->cbo_kategori;
        $deskripsi=$request->txt_deskripsi;
       
        Thread::ubah_thread($id_thread,$nama_thread,$id_kategori,$deskripsi);
        return redirect('member/');
    }

    function profil(){
        return view("member_view/profil");
    }

    function do_profil(Request $request){
        $dt = new Carbon\Carbon();
        $before = $dt->subYears(12)->format('Y-m-d');

        $rules = [
            "txt_nama" => "required|max:255",
            "txt_telp" => "required|numeric",
            "rdo_kelamin" => "required",
            "txt_alamat" => "required",
            "file_foto" => "image|mimes:jpeg,png",
            "txt_tanggal" => "required|before:".$before,
            
        ];
        $attribute = [
            "txt_nama" => "Nama",
            "txt_telp" => "Telp",
            "rdo_kelamin" => "Jenis Kelamin",
            "txt_alamat" => "Alamat",
            "file_foto" => "File Foto",
            "txt_tanggal" => "Tanggal Lahir",
            
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
        $id_user = Auth::user()->id_user;
        $nama=$request->txt_nama;
        $password=$request->txt_password;
        $telp=$request->txt_telp;
        $alamat=$request->txt_alamat;
        $jenis_kelamin=$request->rdo_kelamin;
        $tanggal_lahir=$request->txt_tanggal;
        $file = $request->file_foto;
        if(!empty($file)){
            $foto=$file->getClientOriginalName();
            $file->move("img/",$foto);
        }else{
            $foto="";
        }
       
        User::ubah_user($id_user,$nama,$telp,$alamat,$jenis_kelamin,$tanggal_lahir,$foto);
        return back()->with("sukses","Profil Anda Berhasil tersimpan");
    }

     
}
