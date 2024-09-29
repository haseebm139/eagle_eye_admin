<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Mail;
use Carbon\Carbon;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }
    public function register()
    {
        return view('auth.register');
    }

    public function loginProcess(Request $request)
    {
        // refyv@mailinator.com

        $validator = Validator::make($request->all(), [
            'email' => 'required|email', // Email is required, must be a valid email format, and must be unique in the users table
            'password' => 'required|string|min:5', // Password is required and must be at least 5 characters

        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(array('message'=>$validator->errors()->first(),'type'=>'error'));
        }
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password)))
        {

           if(auth()->user()->type == 'admin')
            {
                return redirect()->route('dashboard')->with(array('message'=>'Login success','type'=>'success'));
            }else if(auth()->user()->type == 'user')
            {
                return redirect()->route('welcome')->with(array('message'=>'Login success','type'=>'success'));

            }
            else{
                Auth::logout();
                return redirect()->route('welcome');
            }
        }else{
            return redirect()->back()->with(array('message'=>'Invalid email or Password','type'=>'error'));
        }
    }
    public function registerProcess(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Name is required and must be a string
            'last_name' => 'required|string|max:255', // Last name is required and must be a string
            'email' => 'required|email|unique:users,email', // Email is required, must be a valid email format, and must be unique in the users table
            'phone' => 'required|string', // Phone is required and must be a string
            'password' => 'required|string|min:5', // Password is required and must be at least 5 characters
            'confirm_password' => 'required|string|same:password',
            'checkbox' => 'required|in:on', // Checkbox must be checked (value 'on')
        ]);
        if ($validator->fails()) {
            return redirect()->back()->with(array('message'=>$validator->errors()->first(),'type'=>'error'));
        }

        $users = $request->except(['password','password_confirmation'],$request->all());


        $users['password'] = Hash::make($request->password);


        $user = User::create($users);
        if($user)
        {
            return redirect()->route('login')->with(array('message'=>'Register Successfully','type'=>'success'));
        }else{
            return redirect()->with(array('message'=>'Something went wrong please try again','type'=>'error'));
        }

    }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
