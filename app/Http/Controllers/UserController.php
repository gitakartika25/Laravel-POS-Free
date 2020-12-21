<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use App\User;
use PDF;

class UserController extends Controller
{
   public function __construct()
{
 $this->middleware('auth');
 $this->middleware(function($request, $next){
 if(Gate::allows('admin-display')) return $next($request);
 abort(403, 'Anda tidak memiliki cukup hak akses');
 });

}

 public function usersView() {
        $user = User::all();
        return view('user.manageusers', ['user' => $user]);
    }

    // user registration
    public function register() {
        return view('user.addUser');
    }

    public function create(Request $request) {

         // validasidata

        $validatedData = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password',
            'profile_image' => 'mimes:jpeg,bmp,png',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.min' => 'Minimal 2 karakter untuk nama',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Kata sandi dibutuhkan',
            'password.min' => 'Kata sandi minimal 8 karakter',
            'password_confirmation.min' => 'Isi konfirmasi sandi minimal 8 karakter',
            'password_confirmation.same' => 'Kata sandi anda berbeda dari sebelumnya',
        ]);

        if ($request->file('profile_image')) {
            $image_name = $request->file('profile_image')->store('images/profile', 'public');
        }

        if($request->hasFile('profile_image')) {
            if ($request->file('profile_image')) {
                $image_name = $request->file('profile_image')->store('images/profile', 'public');
            }
        } else {
            $image_name = 'empty';
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => \Hash::make($request->password),
            'roles' => 'User',
            'profile_image' => $image_name
        ]);
        
        return redirect('/manageusers');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('user.editUser', ['user' => $user]);
    }

    public function update(Request $request, $id) {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        

        if($request->has('roles')) {
            $user->roles = $request->roles;
        }

        if($request->hasFile('profile_image')) {
            if ($user->profile_image && file_exists(storage_path('app/public/'.$user->profile_image)))
            {
                \Storage::delete('public/'.$user->profile_image);
            }
            $image_name = $request->file('profile_image')->store('images/profile', 'public');
            $user->profile_image = $image_name;
        }

        $user->save();

        return redirect('/manageusers');
    }

    public function drop($id) {
        $user = User::find($id);
        $user->delete();

        return redirect('/manageusers');
    }
     public function cetak_pdf() {
        $user = User::all();
        $pdf = PDF::loadview('user.users_pdf', ['user'=>$user]);
        return $pdf->stream();
       
    }
}
