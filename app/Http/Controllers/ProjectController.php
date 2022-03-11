<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Combination;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
class ProjectController extends Controller
{
    
    public function index()
    {
        //$get_project = Project::find($id);
        $user = Auth::user()->id;
        $projects = Project::join('users','projects.user_id','=','users.id')
                            ->join('profiles','users.id','=','profiles.user_id')
                            //->where('users.id','=', $user)
                            ->get(['users.*','profiles.*','projects.*']);
       /* $members = Profile::join('users','users.id','=','profiles.user_id')
                            ->where('users.role_id','=',3)
                            ->get();*/

        $members = DB::table('member_to_register')->get();

        return view('admin.projects',compact('projects','members'));
    }
  
    public function create()
    {
        return view('student.add_project');
    }

    public function store(Request $request)
    {
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

    public function show($id)
    {
        $projects = Project::find($id);
        $members = Project::join('members','projects.id','=','members.project_id')
                    ->join('users','users.id','=','members.member_id')
                    ->join('profiles','users.id','=','profiles.user_id')
                    ->join('combinations','combinations.id','=','profiles.combination_id')
                    ->get(['members.*','users.*','profiles.*','combinations.*']);
        
        $users = Combination::join('profiles','profiles.combination_id','=','combinations.id')
                    ->join('users','users.id','=','profiles.user_id')
                    ->where('users.role_id','=',3)->get();
        return view('student.view_project',compact('projects','members','users'));
    }

    public function edit(Project $project)
    {
        //
    }

    public function update(Request $request, Project $project)
    {
        //
    }

    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects')->with('success','Project has been deleted successfully');
    }
}
