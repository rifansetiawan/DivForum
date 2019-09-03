<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $primaryKey = "id_user";
    protected $fillable = [
        'nama', 'email', 'password','telp','alamat','jenis_kelamin','foto','posisi','tanggal_lahir','baik','buruk'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    static function tambah_user($nama,$email,$password,$telp,$alamat,$jenis_kelamin,$tanggal_lahir,$foto,$posisi){
        User::create([
            "nama" => $nama,
            "email" => $email,
            "password" => bcrypt($password),
            "telp" => $telp,
            "alamat" => $alamat,
            "jenis_kelamin" => $jenis_kelamin,
            "foto" => $foto,
            "posisi" => $posisi,
            "baik" => 0,
            "buruk" => 0,
            "tanggal_lahir" => Carbon::parse($tanggal_lahir)
        ]);
    }

    static function ubah_user($id_user,$nama,$telp,$alamat,$jenis_kelamin,$tanggal_lahir,$foto=""){
        $data = User::where("id_user",$id_user)->first();
        $data->tanggal_lahir = Carbon::parse($tanggal_lahir);
        $data->nama = $nama;
        $data->telp = $telp;
        $data->alamat = $alamat;
        $data->jenis_kelamin = $jenis_kelamin;
        if($foto!=""){
            $data->foto = $foto;
        }
        $data->save();
    }

    static function list_user(){
        //$data = User::where("posisi","Member")->get();
        $data = User::all();
        return $data;
    }

    static function tampil_user($id_user){
         $data = User::where("id_user",$id_user)->first();
         return $data;
    }

    static function hapus_user($id_user){
         $data = User::where("id_user",$id_user)->first();
         $data->delete();
    }

    static function login_user($email,$password){
        $data= Auth::attempt([
            "email" => $email,
            "password" => $password
        ],true);

        return $data;
    }

    static function vote($id_user,$status){
         $data = User::where("id_user",$id_user)->first();
        switch($status){
            case "baik":
                $data->baik = $data->baik +1;
                break;
            case "buruk":
                 $data->buruk = $data->buruk +1;
                break;
        
        }
         $data->save();
    }
}
