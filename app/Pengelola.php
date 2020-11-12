<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengelola extends Model
{
    protected $table = 'pengelola';
    protected $fillable = ['nik','nama_depan','nama_belakang','email',
    'tanggal_lahir','jenis_kelamin','alamat','no_hp','avatar','ktp','user_id'];

    public function getAvatar()
    {
      if(!$this->avatar){
        return asset('images/default.jpg');
      }
        return asset('images/'.$this->avatar);
    }

    public function getKtp()
    {
      if(!$this->ktp){
        return asset('ktp/default.jpg');
      }
        return asset('ktp/'.$this->ktp);
    }

    public function User()
    {
      return $this->belongsTo('App\User'); 
    }
}
