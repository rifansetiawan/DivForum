<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Thread extends Model
{
    //
     protected $primaryKey = "id_thread";
    protected $table = "thread";
    protected $fillable = [
        'nama_thread','id_kategori','id_user','deskripsi','status_thread'
    ];

    static function tambah_thread($nama_thread,$id_kategori,$deskripsi,$status_thread,$id_user){
    	Thread::create([
    		"nama_thread" => $nama_thread,
    		"id_kategori" => $id_kategori,
    		"deskripsi" => $deskripsi,
    		"status_thread" => $status_thread,
            "id_user" => $id_user,
    	]);
    }

    static function ubah_thread($id_thread,$nama_thread,$id_kategori,$deskripsi){
    	$data = Thread::where("id_thread",$id_thread)->first();
    	$data->nama_thread = $nama_thread;
    	$data->id_kategori = $id_kategori;
    	$data->deskripsi = $deskripsi;
    	$data->save();
    }

    static function ubah_status_thread($id_thread,$status_thread){
    	$data = Thread::where("id_thread",$id_thread)->first();
    	$data->status_thread = $status_thread;
    	$data->save();
    }

    static function hapus_thread($id_thread){
    	$data = Thread::where("id_thread",$id_thread)->first();
    	$data->delete();
    }

    static function list_thread($id_user="",$deskripsi="",$id_kategori=""){
    	$data = DB::table("thread as t")->join("users as u","u.id_user","=","t.id_user")->join("kategori as k","k.id_kategori","=","t.id_kategori");

    	if($id_user!=""){
    		$data->where("t.id_user",$id_user);
    	}
    	if($deskripsi!=""){
    		$data->where("deskripsi","LIKE","%".$deskripsi."%")->orWhere("nama_thread","LIKE","%".$deskripsi."%");
    	}

        if($id_kategori!=""){
            $data->where("t.id_kategori",$id_kategori);
        }

    	return $data->paginate(5);

    	
    }

    static function tampil_thread($id_thread){
    	$data = DB::table("thread as t")->join("users as u","u.id_user","=","t.id_user")->join("kategori as k","k.id_kategori","=","t.id_kategori")->where("id_thread",$id_thread)->first();
    	return $data;
    }


}
