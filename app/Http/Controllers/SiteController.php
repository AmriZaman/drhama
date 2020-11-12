<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SiteController extends Controller
{
    public function home()
    {
      return view('sites.home');
    }

    public function register()
    {
      return view('sites.register');
    }

    public function registerwisata()
    {
      return view('sites.regwisata');
    }

    public function postregister(Request $request)
    {
      $messages = [
        'required' => ' Maaf Data jangan sampai kosong',
        'min' => ':attribute harus diisi minimal :min karakter',
        'max' => ':attribute harus diisi maksimal :max karakter',
        'numeric' => ':attribute harus diisi dengan angka',
        'same' => 'konfirmasi password tidak cocok ',
        'mimes' => 'format yang didukung hanya jpg, png, dan jpeg',
      ];
      $this->validate($request,[
        'nik' => 'required|min:16',
        'nama_depan' => 'required|min:3',
        'nama_belakang' => 'required',
        'email' => 'required|email|unique:users',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required|min:11|numeric',
        'password'=> 'required',
        'confirmation'=> 'required|same:password',
        'ktp' => 'mimes:jpg,png,jpeg',
      ],$messages);
      //insert ke tabel user
      $user = new \App\User;
      $user->role = 'pengelola';
      $user->name = $request->nama_depan;
      $user->email= $request->email;
      $user->password = bcrypt($request->password);
      $user->remember_token = Str::random(60);
      $user->save();
      //insert ke tabel pengelola
      $request->request->add(['user_id' => $user->id]);
      $pengelola = \App\Pengelola::create($request->all());
      if($request->hasFile('ktp')){
        $request->file('ktp')->move('ktp/',$request->file('ktp')->getClientOriginalName());
        $pengelola->ktp=$request->file('ktp')->getClientOriginalName();
        $pengelola->save();
      //insert ke tabel wisata
      }
      return redirect('/login')->with('sukses','Pendaftaran Berhasil');
    }

    public function postregister2(Request $request)
    {
      {
        $this->validate($request,[
          'nama_depan' => 'required|min:3',
          'nama_belakang' => 'required',
          'email' => 'required|email|unique:users',
          'jenis_kelamin' => 'required',
          'alamat' => 'required',
          'no_hp' => 'required|min:11',
          'password'=> 'required',
          'confirmation' => 'required|same:password',
        ]);
      //insert ke tabel user
      $user = new \App\User;
      $user->role = 'wisatawan';
      $user->name = $request->nama_depan;
      $user->email= $request->email;
      $user->password = bcrypt($request->password);
      $user->remember_token = Str::random(60);
      $user->save();
      //insert ke tabel wisatawan
      $request->request->add(['user_id' => $user->id]);
      $wisatawan = \App\Wisatawan::create($request->all());
      return redirect('/login')->with('sukses','Pendaftaran Berhasil');
    }
}
}
