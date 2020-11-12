<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Auth;
use Hash;
use Validator;
use App\User;

class AkunController extends Controller
{
  public function index(Request $request)
  {
    if($request->has('cari')){
      $data_akun = \App\User::where('name','LIKE','%'.$request->cari.'%')->get();
    }else{
      $data_akun = \App\User::all();
    }
    return view('akun.index',['data_akun' => $data_akun]);
  }

  public function delete($id)
  {
    $user = \App\User::find($id);
    $user->delete();
    return redirect('/akun')->with('sukses','Data Berhasil dihapus');
  }

  public function profiladmin()
  {
    return view('akun.profiladmin');
  }

  public function edit($id)
  {
    $user = \App\User::find($id);
    return view('akun/edit',['user'=>$user]);
  }

  public function update(Request $request,$id)
  {
    // dd($request->all());
    $user = \App\User::find($id);
    $user->update($request->all());
    if($request->hasFile('avatar')){
      $request->file('avatar')->move('images/',$request->file('avatar')->getClientOriginalName());
      $user->avatar=$request->file('avatar')->getClientOriginalName();
      $user->save();
    }
      return redirect('/profiladmin')->with('sukses','Data Berhasil diupdate');
  }

  public function change()
    {
        return view('auths.ganti');
    }

    public function updatepass()
    {
        // custom validator
        Validator::extend('password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, \Auth::user()->password);
        });

        // message for custom validation
        $messages = [
            'password' => 'Password anda salah.',
            'required' => 'Data Harus diisi.',
            'confirmed' => 'Konfirmasi Password Salah',
            'same' => 'Konfirmasi Password Salah',
        ];

        // validate form
        $validator = Validator::make(request()->all(), [
            'current_password'      => 'required|password',
            'password'              => 'required|min:6|confirmed',
            'password_confirmation' => 'required|same:password',

        ], $messages);

        // if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        // update password
        $user = User::find(Auth::id());

        $user->password = bcrypt(request('password'));
        $user->save();

        return redirect()
            ->route('password.change')
            ->withSuccess('Password berhasil diganti.');
    }
}
