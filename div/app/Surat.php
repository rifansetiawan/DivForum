<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Surat extends Model
{
    //
    protected $primaryKey = "id_surat";
    protected $table = "surat";
    protected $fillable = [
        'id_pengirim','id_penerima','isi_surat'
    ];

    static function tambah_surat($id_pengirim,$id_penerima,$isi_surat){
    	Surat::create([
    		"id_pengirim" => $id_pengirim,
    		"id_penerima" => $id_penerima,
    		"isi_surat" => $isi_surat,
    	]);
    }

    static function list_surat($id_penerima){
    	$data = DB::table("surat as s")->join("users as u","u.id_user","=","s.id_pengirim")->where("id_penerima",$id_penerima)->paginate(10);

    	return $data;
    }

    static function hapus_surat($id_surat){
    	$data = Surat::where("id_surat",$id_surat)->first();
    	$data->delete();
    }



}
