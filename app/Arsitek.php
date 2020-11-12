<?php

namespace App;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Wisata extends Model
{
    use Sluggable;
    protected $table = 'wisata';
    protected $fillable = ['nama_wisata','alamat_wisata','jenis_wisata','jam_operasional',
    'deskripsi_wisata','surat_desa','foto_wisata','user_id'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'nama_wisata'
            ]
        ];
    }
    public function User()
    {
      return $this->belongsTo('App\User');
    }

    public function getSurat()
    {
      if(!$this->surat_desa){
        return asset('surat_desa/default.png');
      }
        return asset('surat_desa/'.$this->surat_desa);
    }

    public function getfoto()
    {
      if(!$this->foto_wisata){
        return asset('foto_wisata/default.jpg');
      }
        return asset('foto_wisata/'.$this->foto_wisata);
    }
}
