<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Wisata;
use App\Pengelola;

class WisataController extends Controller
{
    public function index(Request $request)
    {
    if($request->has('cari')){
      $data_wisata = \App\Wisata::where('nama_wisata','LIKE','%'.$request->cari.'%')->get();
    }else{
      $data_wisata = \App\Wisata::all();
    }
    return view('wisata.datawisata',['data_wisata' => $data_wisata]);
    }

    public function wisatatersedia(Request $request)
    {
    if($request->has('cari')){
      $data_wisata = \App\Wisata::where('nama_wisata','LIKE','%'.$request->cari.'%')->get();
    }else{
      $data_wisata = \App\Wisata::all();
    }
    return view('wisata.wisatatersedia',['data_wisata' => $data_wisata]);
    }

    public function  daftarwisata()
    {
      return view('wisata.daftarwisata');
    }

    public function  datawisata()
    {
      $wisata = Wisata::all();
      $pengelola = Pengelola::all();
      return view('wisata.index',compact(['wisata','pengelola']));
    }

    public function data($id)
    {
      $wisata = \App\Wisata::find($id);
      return view('wisata.data',['wisata'=>$wisata]);
    }

    public function data2($id)
    {
      $wisata = \App\Wisata::find($id);
      return view('wisata.data2',['wisata'=>$wisata]);
    }

    public function editstatus($id)
    {
      $wisata = \App\Wisata::find($id);
      return view('wisata.editstatus',['wisata'=>$wisata]);
    }

    public function edit($id)
    {
      $wisata = \App\Wisata::find($id);
      return view('wisata.edit',['wisata'=>$wisata]);
    }

    public function update(Request $request,$id)
    {

      $wisata = \App\Wisata::find($id);
      $wisata->status=$request->status;
      $wisata->save();
      return redirect('/wisata')->with('sukses','Status Berhasil diupdate');
    }

    public function update2(Request $request,$id)
    {
      $wisata = \App\Wisata::find($id);
      $wisata->update($request->all());
          if($request->hasFile('surat_desa')){
            $request->file('surat_desa')->move('surat_desa/',$request->file('surat_desa')->getClientOriginalName());
            $wisata->surat_desa=$request->file('surat_desa')->getClientOriginalName();
            $wisata->save();
        }
        if($request->hasFile('foto_wisata')){
          $request->file('foto_wisata')->move('foto_wisata/',$request->file('foto_wisata')->getClientOriginalName());
          $wisata->foto_wisata=$request->file('foto_wisata')->getClientOriginalName();
          $wisata->save();
      }
      return redirect('/datawisata')->with('sukses','Status Berhasil diupdate');
    }

    public function postwisata(Request $request)
    {
      // dd($request->all());
      // $messages = [
      //   'required' => ' Maaf Data jangan sampai kosong',
      //   'min' => ':attribute harus diisi minimal :min karakter',
      //   'max' => ':attribute harus diisi maksimal :max karakter',
      //   'numeric' => ':attribute harus diisi dengan angka',
      //   'same' => 'konfirmasi password tidak cocok ',
      //   'mimes' => 'format yang didukung hanya jpg, png, dan jpeg',
      // ];
      // $this->validate($request,[
      //   'nama_wisata' => 'required',
      //   'alamat_wisata' => 'required',
      //   'jenis_wisata' => 'required',
      //   'jam_operasional' => 'required',
      //   'jenis_kelamin' => 'required',
      //   'deskripsi_wisata' => 'required',
      //   'surat_desa' => 'required|mimes:jpg,png,jpeg',
      //   'foto_wisata'=> 'required|mimes:jpg,png,jpeg'
      // ],$messages);
      //insert ke tabel wisata

      // $wisata = Wisata::create([
      //   'nama_wisata' => $request->nama_wisata,
      //   'alamat_wisata' => $request->alamat_wisata,
      //   'jenis_wisata' => $request->jenis_wisata,
      //   'jam_operasional' => $request->jam_operasional,
      //   'deskripsi_wisata' => $request->deskripsi_wisata,
      //   'user_id' => auth()->user()->id,
      //   'surat_desa' =>$request->surat_desa,
      //   'foto_wisata' => $request->foto_wisata
      // ]);
      $request->request->add(['user_id' => auth()->user()->id]);
      $wisata = \App\Wisata::create($request->all());
          if($request->hasFile('surat_desa')){
            $request->file('surat_desa')->move('surat_desa/',$request->file('surat_desa')->getClientOriginalName());
            $wisata->surat_desa=$request->file('surat_desa')->getClientOriginalName();
            $wisata->save();
        }
        if($request->hasFile('foto_wisata')){
          $request->file('foto_wisata')->move('foto_wisata/',$request->file('foto_wisata')->getClientOriginalName());
          $wisata->foto_wisata=$request->file('foto_wisata')->getClientOriginalName();
          $wisata->save();
      }
  return redirect('/dashboard')->with('sukses','Input Berhasil');
  }
}
