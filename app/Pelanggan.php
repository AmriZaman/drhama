<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wisatawan extends Model
{
  protected $table = 'wisatawan';
  protected $fillable = ['nama_depan','nama_belakang','email','tanggal_lahir','jenis_kelamin','alamat','no_hp','avatar','user_id'];

  public function getAvatar()
  {
    if(!$this->avatar){
      return asset('images/default.jpg');
    }
      return asset('images/'.$this->avatar);
  }

  public function User()
  {
    return $this->belongsTo('App\User');
  }
}
