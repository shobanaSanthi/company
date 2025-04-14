<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class RegisterController extends Controller
{
  public function register()
  {

    return view('register');
  }

  public function store(Request $request)
  {
      
    $validator=$request->validate([
          'name' => 'required|string|max:255',
          'email' => 'required|string|email|max:255|unique:users',
          'password' => 'required|string|min:5|max:8',
         
      ]);
      
      User::create([
          'name' => $request->name,
          'email' => $request->email,
          'password' => Hash::make($request->password),
          'role_id'=>'2'
      ]);

      return redirect('/');
  }

}
