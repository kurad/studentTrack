<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Member;
use App\Models\Combination;
use App\Models\Material;
use Auth;

use DB;
class StudentController extends Controller
{
    public function dashboard(){
        $user_id = Auth::user()->id;

        $data = [];
        $data['totalProjects'] = Project::where('user_id','=',$user_id)->count();
        $projects = Project::where('user_id','=',$user_id)->get();
        $projects1 = Project::join('users','projects.user_id','=','users.id')
                            ->join('profiles','users.id','=','profiles.user_id')
                            ->join('members','members.project_id','=', 'projects.id')
                            ->get(['users.*','profiles.*','projects.*']);
        return view('student.dashboard',$data,compact('projects','projects1'));
    }
    public function profile(){
        $users = Auth::user()->email;
        $combinations = DB::table("combinations")->get();
        $school_year = DB::table("school_years")->get();
        //$user_info = User::where('email','=',$user)->get();
        return view('student.student_profile',compact('users','combinations','school_year'));
    }
    public function save_profile(Request $request){

        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'school_year_id'=>'required',
            'combination_id'=>'required'
        ]);
        $user = User::find(Auth::user()->id);

        $newP=new Profile();
        $newP->first_name = $request->first_name;
        $newP->last_name = $request->last_name;
        $newP->user_id = Auth::user()->id;
        $newP->combination_id = $request->combination_id;
        $newP->school_year_id = $request->school_year_id;
        $save = $newP->save();

        $user->last_login_at = now();
        $user->update();

        if($save){
            return redirect('student/dashboard')->with('success','Profile saved successfully');

        }else{
            return redirect()->back()->with('fail','Something went wrong');
        }   
    }
    public function new_project(){
        return view('student.add_project');
    }
    public function projects(){
        //$user_id = Auth::user()->id;

        //$projects = Project::where('user_id','=',$user_id)->get();

        $user = Auth::user()->id;
        $projects = Project::join('users','projects.user_id','=','users.id')
                            ->join('profiles','users.id','=','profiles.user_id')
                            ->where('users.id','=', $user)
                            ->get(['users.*','profiles.*','projects.*']);
       /* $members = Profile::join('users','users.id','=','profiles.user_id')
                            ->where('users.role_id','=',3)
                            ->get();*/

        $members = DB::table('member_to_register')->get();

        return view('student.projects',compact('projects','members'));
    }
    public function save_project(Request $request){
        
        $request->validate([
            'project_title'=>'required',
            'problem_statement'=>'required',
            'suggested_solution'=>'required',
            'domain'=>'required'
        ]);

        $newPr=new Project();
        $newPr->project_title = $request->project_title;
        $newPr->domain = $request->domain;
        $newPr->problem_statement = $request->problem_statement;
        $newPr->suggested_solution = $request->suggested_solution;
        $newPr->user_id = Auth::id();
        
        $save = $newPr->save();

        if($save){
            return redirect('student/projects')->with('success','Project added successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong');
        }
        
    }

    public function edit_project($id){

        //$projects = Project::where('projects.id','=',$id)->get();
        $projects = Project::find($id);

        return view('student.edit_project',compact('projects'));
    }

    public function update_project(Request $request, $id){
        
        $project = Project::find($id);

        $project->project_title = $request->project_title;
        $project->domain = $request->domain;
        $project->problem_statement = $request->problem_statement;
        $project->suggested_solution = $request->suggested_solution;
        $project->user_id = Auth::id();
        
        $update = $project->update();

        if($update){
            return redirect('student/projects')->with('success','Project updated successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong');
        }
        
    }

    public function view_project($id){
        $projects = Project::where('id','=', $id)->first();

        $members = Member::join('projects','projects.id','=','members.project_id')
                    ->join('users','users.id','=','members.member_id')
                    ->join('profiles','users.id','=','profiles.user_id')
                    ->get(['profiles.first_name','profiles.last_name','profiles.class','profiles.year','users.email']);

        $users = Combination::join('profiles','profiles.combination_id','=','combinations.id')
                    ->join('users','users.id','=','profiles.user_id')
                    ->where('users.role_id','=',3)->get();
        $materials = Project::join('materials', 'materials.project_id', '=', 'projects.id')
                    //->where('materials.project_id','=',$projects)
                    ->get();     

        return view('student.view_project',compact('members','users','projects','materials'));
    }

    public function add_member($id){
        $projects = Project::find($id);
        $members = Project::join('members','projects.id','=','members.project_id')
                    ->join('users','users.id','=','members.user_id')
                    ->join('profiles','users.id','=','profiles.user_id')
                    ->join('combinations','combinations.id','=','profiles.combination_id')
                    ->get(['members.*','users.*','profiles.*','combinations.*']);

        $users = Combination::join('profiles','profiles.combination_id','=','combinations.id')
                    ->join('users','users.id','=','profiles.user_id')
                    ->where('users.role_id','=',3)->get();
        return view('student.add_member',compact('members','projects','users'));
    }
    public function save_member(Request $request){
        if(Member::find($request->member)){
            session()->flash('warning','You cannot be on more than one project');
            return redirect()->back();
        }
        $m=new Member();
        $m->project_id = $request->id;
        $m->user_id  = $request->member;

        $m->save();

        return redirect()->back();


    }
}
