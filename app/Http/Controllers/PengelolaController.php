<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengelolaController extends Controller
{
    public function index(Request $request)
    {
      if($request->has('cari')){
        $data_pengelola = \App\Pengelola::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
      }else{
        $data_pengelola = \App\Pengelola::all();
      }
      return view('pengelola.index',['data_pengelola' => $data_pengelola]);
    }

    public function create(Request $request)
    {
      // dd($request->all());
      $this->validate($request,[
        'nik' => 'required|min:16',
        'nama_depan' => 'required|min:3',
        'nama_belakang' => 'required',
        'email' => 'required|email|unique:users',
        'jenis_kelamin' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required|min:11',
        'ktp' => 'mimes:jpg,png,jpeg'
      ]);
      //insert ke tabel user
      $user = new \App\User;
      $user->role = 'pengelola';
      $user->name = $request->nama_depan;
      $user->email= $request->email;
      $user->password = bcrypt('rahasia');
      $user->remember_token = Str::random(60);
      $user->save();
      //insert ke tabel pengelola
      $request->request->add(['user_id' => $user->id]);
      $pengelola = \App\Pengelola::create($request->all());
      if($request->hasFile('ktp')){
        $request->file('ktp')->move('ktp/',$request->file('ktp')->getClientOriginalName());
        $pengelola->ktp=$request->file('ktp')->getClientOriginalName();
        $pengelola->save();
      }
      return redirect('/pengelola')->with('sukses','Data Berhasil diinput');
    }

    public function edit($id)
    {
      $pengelola = \App\Pengelola::find($id);
      return view('pengelola/edit',['pengelola'=>$pengelola]);
    }

    public function update(Request $request,$id)
    {
      // dd($request->all());
      $pengelola = \App\Pengelola::find($id);
      $pengelola->update($request->all());
      if($request->hasFile('avatar')){
        $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
        $pengelola->avatar=$request->file('avatar')->getClientOriginalName();
        $pengelola->save();
      }
      if(auth()->user()->role == 'admin'){
        return redirect('/pengelola')->with('sukses','Data Berhasil diupdate');
      }
        return redirect('/profilku')->with('sukses','Data Berhasil diupdate');
    }

    public function delete($id)
    {
      $pengelola = \App\Pengelola::find($id);
      $pengelola->delete();
      return redirect('/pengelola')->with('sukses','Data Berhasil dihapus');
    }

    public function Profile($id)
    {
      $pengelola = \App\Pengelola::find($id);
      return view('pengelola.profile',['pengelola'=>$pengelola]);
    }

    public function ktp($id)
    {
      $pengelola = \App\Pengelola::find($id);
      return view('pengelola.ktp',['pengelola'=>$pengelola]);
    }

    public function profilku()
    {
      return view('pengelola.profilsaya');
    }
}
