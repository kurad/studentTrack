<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use Auth;
class TeacherController extends Controller
{
    public function dashboard(){
        $user_id = Auth::user()->id;

        $data = [];
        $data['totalProjects'] = Project::where('user_id','=',$user_id)->count();
        return view('teacher.dashboard',$data);
    }
}
