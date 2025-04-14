<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\User;
use Hash;
use Session;
use App\skills;
use App\employee_skill;


class EmployeeController extends Controller
{
    
    public function index(Request $request){
        $user=User::where('id',$request->session()->get('User_id'))->first();
        return view('employee')->with(['user' => $user]);
    }
    
    public function create(Request $request){
        $skill=Skills::all();
        return view('admin.addEmployee')->with(['skills'=>$skill]);
    }
    public function store(Request $request){
        $data['success']=false;
        $data['message']="";
        $employee=new User;       
        $employee->name = $request->name;
        $employee->email=$request->email;
        $employee->password=Hash::make($request->password);
        $employee->address=$request->address;
        $employee->phone=$request->phone;
        $employee->role_id=2;        
        if($employee->save()){            
            $data['success']=true;
            $data['message']="Employee Created Successfully";
            echo json_encode($data);
        }
        
        
    }
    public function update(Request $request){
        $employee_id=$request->id;
        $employee=User::find($employee_id);       
        $employee->name = $request->name;
        $employee->email=$request->email;       
        $employee->address=$request->address;
        $employee->phone=$request->phone;
        $employee->role_id=2; 
        if($employee->update()){  
            Session::flash('message', 'Employee Updated Successfully'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect("viewEmp"); 
        }   
    }
    
    public function delete($id){
        User::destroy($id);
        DB::table('employee_skill')->where('user_id','=',$id)->delete();
        Session::flash('message', 'Employee Deleted Successfully'); 
        Session::flash('alert-class', 'alert-success'); 
        return redirect("viewEmp");      
    }
    public function listall(Request $request){
        // $users=User::where('role_id',2)->get();
        $users=DB::table('users')->select('users.*')->where('role_id',2)->get();
        // print($users);
        return view('admin.viewEmployee')->with(['users' => $users]);
    }
    public function getUser($id){
        $user=User::find($id);
        // return view('admin.updateEmployee')->with(['users'=>$user]);
        echo json_encode($user);

    }
}
