<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Combination;
use App\Models\Project;
use App\Models\User;
use DB;
use Auth;
use PDF;
class AdminController extends Controller
{
    public function dashboard(){
        $user_id = Auth::user()->id;

        $data = [];
        $data['totalProjects'] = Project::where('user_id','=',$user_id)->count();
        return view('admin.dashboard', $data);
    }
    public function projects(){
        //$user_id = Auth::user()->id;

        $projects = Project::all();

        return view('admin.projects',compact('projects'));
    }
    /*public function createPDF() {
      // retreive all records from db
      $data = Project::all();
      // share data to view
      view()->share('projects',$data);
      $pdf = PDF::loadView('pdf_view', $data);
      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }*/

    public function createPDF(){

        $data = Project::all();
           
        $pdf = PDF::loadView('admin.projects', compact('data'));
     
        return $pdf->download('projects.pdf');
    }

    public function show_project($id)
    {
        $projects = Project::find($id);
        return view('admin.view_project',compact('projects'));
    }

    public function combinations(){
        return view('admin.combinations');
    }
    public function save_combination(Request $request){
        $request->validate([
            'combination'=>'required'
        ]);

        $newC=new Combination();
        $newC->combination = $request->combination;
        
        $save = $newC->save();

        if($save){
            return redirect('admin/all_combination')->with('success','User added successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong');
        }   
    }
    public function all_combination(){
        $combinations = DB::table("combinations")->get();

        return view('admin.all_combinations',compact('combinations'));
    }
    public function users(){
        $students = DB::table("users")->where('role_id','=',3)->get();
        $teachers = DB::table("users")->where('role_id','=',2)->get();
        $admins = DB::table("users")->where('role_id','=',1)->get();

        return view('admin.the_users',compact('students','teachers','admins'));
    }
    public function create_user(){
        return view('admin.create_user');
    }

    public function create_staff(Request $data)
    {

        $user = new User();
        $user->email=$data->email;
        $user->role_id=$data->role_id;
        $user->password=Hash::make($data->email);
        
        $save = $user->save();

        if($save){
            return redirect()->back()->with('success','Staff added successfully');
        }else{
            return redirect()->back()->with('fail','Something went wrong');
        }   
    }
}
