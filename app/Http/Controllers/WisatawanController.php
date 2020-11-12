<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class WisatawanController extends Controller
{
  public function index(Request $request)
  {
    if($request->has('cari')){
      $data_wisatawan = \App\Wisatawan::where('nama_depan','LIKE','%'.$request->cari.'%')->get();
    }else{
      $data_wisatawan = \App\Wisatawan::all();
    }
    return view('wisatawan.index',['data_wisatawan' => $data_wisatawan]);
  }

  public function create(Request $request)
  {
    //insert ke tabel user
    $user = new \App\User;
    $user->role = 'wisatawan';
    $user->name = $request->nama_depan;
    $user->email= $request->email;
    $user->password = bcrypt('rahasia');
    $user->remember_token = Str::random(60);
    $user->save();
    //insert ke tabel wisatawan
    $request->request->add(['user_id' => $user->id]);
    $wisatawan = \App\Wisatawan::create($request->all());
    return redirect('/wisatawan')->with('sukses','Data Berhasil diinput');
  }

  public function edit($id)
  {
    $user = \App\User::find($id);
    $wisatawan = \App\Wisatawan::find($id);
    return view('wisatawan/edit',['wisatawan'=>$wisatawan],['user'=>$user]);
  }

  public function update(Request $request,$id)
  {
    // dd($request->all());
    $wisatawan = \App\Wisatawan::find($id);
    $wisatawan->update($request->all());
    if($request->hasFile('avatar')){
      $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
      $wisatawan->avatar=$request->file('avatar')->getClientOriginalName();
      $wisatawan->save();
    }
    if(auth()->user()->role == 'admin'){
      return redirect('/wisatawan')->with('sukses','Data Berhasil diupdate');
    }
    return redirect('/profilsaya')->with('sukses','Data Berhasil diupdate');
  }

  public function delete($id)
  {
    $wisatawan = \App\Wisatawan::find($id);
    $wisatawan->delete();
    return redirect('/wisatawan')->with('sukses','Data Berhasil dihapus');
  }

  public function Profile($id)
  {
    $wisatawan = \App\Wisatawan::find($id);
    return view('wisatawan.profile',['wisatawan'=>$wisatawan]);
  }

  public function profilsaya()
  {
    return view('wisatawan.profilsaya');
  }
}
