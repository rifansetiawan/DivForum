<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Posting extends Model
{
    //
    protected $primaryKey = "id_posting";
    protected $table = "posting";
    protected $fillable = [
        'id_thread','id_user','isi_posting'
    ];

    static function tambah_posting($id_thread,$id_user,$isi_posting){
    	Posting::create([
    		"id_thread" => $id_thread,
    		"id_user" => $id_user,
    		"isi_posting" => $isi_posting
    	]);
    }

    static function ubah_posting($id_posting,$isi_posting){
    	$data = Posting::where("id_posting",$id_posting)->first();
    	$data->isi_posting = $isi_posting;
    	$data->save();
    }

    static function hapus_posting($id_posting){
    	$data = Posting::where("id_posting",$id_posting)->first();
    	$data->delete();
    }

    static function list_posting($id_thread){
    	$data = DB::table("posting as p")->join("users as u","u.id_user","=","p.id_user")->where("id_thread",$id_thread)->paginate(5);

    	return $data;
    }

    static function tampil_posting($id_posting){
    	$data = Posting::where("id_posting",$id_posting)->first();
       
    	return $data;
    }


}
