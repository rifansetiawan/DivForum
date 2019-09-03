<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $primaryKey = "id_kategori";
    protected $table = "kategori";
    protected $fillable = [
        'nama_kategori',
    ];

    static function tambah_kategori($nama_kategori){
    	Kategori::create([
    		"nama_kategori" => $nama_kategori
    	]);
    }

    static function ubah_kategori($id_kategori,$nama_kategori){
    	$data = Kategori::where("id_kategori",$id_kategori)->first();
    	$data->nama_kategori = $nama_kategori;
    	$data->save();
    }

    static function hapus_kategori($id_kategori){
    	$data = Kategori::where("id_kategori",$id_kategori)->first();
    	$data->delete();
    }

    static function list_kategori(){
    	$data = Kategori::all();
    	return $data;
    }

    static function tampil_kategori($id_kategori){
    	$data = Kategori::where("id_kategori",$id_kategori)->first();
    	return $data;
    }
}
