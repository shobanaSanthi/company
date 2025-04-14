<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class LoginController extends Controller
{
    //
    public function index(){
        return view('login');
    }
    public function login(Request $request){
        $data['success']=true;
        $data['message']="";
        $request->validate([
            'email' => 'required|string|email|max:255',
          'password' => 'required|string|min:5|max:8',
          'role_id'=>'required'
        ]);

        $user = User::where('email', $request->email)->where('role_id',$request->role_id)->first();        
       
        if (!empty($user)){
            
            if(Hash::check(request('password'), $user->password)){
                if($user->role_id==2){
                    $request->session()->put('User_id',$user->id);
                    $request->session()->put('User','Employee');
                }
                elseif($user->role_id==1){
                    $request->session()->put('User','Manager');
                }
                // $success=true;
                $data['role']=$user->role_id==1?'Manager':'Employee';
                $data['success']=true;
                echo json_encode($data);
                // return redirect('/registeremp');
            }else{
                $data['success']=false;
                $data['message']="Oops! you have entered invalid credentials";
                echo json_encode($data);
            }
            

        }else{
            $data['success']=false;
            $data['message']="Your Username or Password is incorrect";
            echo json_encode($data);

        }
    }
    public function logout(Request $request){
        $request->session()->forget('User');
        return redirect('/');

    }
        

}
          
    

