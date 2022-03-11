<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    protected $redirectTo;
    public function redirectTo(){


        switch(Auth::user()->role_id){
            case 1:
            if(is_null(Auth::user()->last_login_at)){
            $this->redirectTo = '/admin/profile';
        }else{
            $this->redirectTo = '/admin/dashboard';
        }
            return $this->redirectTo;
                break;
            case 2:
                $this->redirectTo = '/teacher/dashboard';
                return $this->redirectTo;
                break;
            case 3:
                if(is_null(Auth::user()->last_login_at)){
                $this->redirectTo = '/student/profile';
            }else{
                $this->redirectTo = '/student/dashboard';
            }
                return $this->redirectTo;
                break;
            default:
                $this->redirectTo = '/login';
                return $this->redirectTo;
        }
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
