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


class SkillsController extends Controller
{
    public function view($id){
        $skills=DB::table('employee_skill')->join('skills','skills.id',"=",'employee_skill.skill_id')->select('employee_skill.*','skills.*')->where('employee_skill.user_id',$id)->get();
        echo json_encode($skills);
    }
    public function destroy($id){
        DB::table('employee_skill')->where('id','=',$id)->delete();
        return redirect("viewEmp");
    }
    public function store(Request $request){
        $skill=new employee_skill;
        $skill->user_id=$request->user_id;
        $skill->skill_id=$request->skill_id;
        $skill->skill_percentage=$request->skill_percentage;
        if($skill->save()){
            Session::flash('message', 'Employee Skills added Successfully'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect("viewEmp"); 
        }
    }
    public function create(){
        $users=User::where('role_id','=',2)->get();
        $skills=Skills::all();
        return view('admin.addSkill')->with(['users'=>$users])->with(['skills'=>$skills]);
    }
    public function empSkill(){
        $skills=Skills::all();
        return view('addEmpskill')->with(['skills'=>$skills]);
    }
    public function empStore(Request $request){
        $skill=new employee_skill;
        $skill->user_id=$request->session()->get('User_id');
        $skill->skill_id=$request->skill_id;
        $skill->skill_percentage=$request->skill_percentage;
        if($skill->save()){
            Session::flash('message', 'Employee Skills added Successfully'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect("viewSkills"); 
        }
    }
    public function viewSkills(Request $request){
        $skills= DB::table('employee_skill')->join('skills','skills.id','=','employee_skill.skill_id')->select('employee_skill.*','skills.skill_name','employee_skill.id')->where('user_id','=',$request->session()->get('User_id'))->get();
        return view('viewSkills')->with(['skills'=>$skills]);
    }
    public function deleteSkill($id){
        employee_skill::destroy($id);
        Session::flash('message', 'Skill deleted Successfully'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect("viewSkills"); 

    }

}