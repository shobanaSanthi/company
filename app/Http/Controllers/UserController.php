<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\skills;

class UserController extends Controller
{
    //
    public function index(){

        $count['user']=User::where('role_id','=',2)->count();
        $count['skills']=Skills::count();
        return view('admin/empCount')->with(['count'=>$count]);

    }
    
    public function create(){
        
    }
}
