<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class UserController extends Controller
{
    public function RegisterPage(){
        return view('register');
    }

    public function register(Request $request){
        $data = $request ->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email') ],
            'password' => ['required', 'min:8', 'confirmed']

        ]);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);
        auth()->login($user);


        return redirect('/home')->with('success', 'Registered Sucessfully');
    }

    public function login(Request $request){

        $incomingdata = $request->validate(
            ['loginusername'=> 'required',
            'loginpassword'=> 'required'

            ]);

            if (auth()->attempt(['username'=> $incomingdata['loginusername'], 'password'=> $incomingdata['loginpassword']])){
                $request->session()->regenerate();

                return redirect('dashboard')->with('success', 'Login was successful');


            } else{
                return redirect('register')->with('failed', 'invalid user details');
            }

    }

    public function logout(){
        auth()->logout();

        return redirect('register')->with('success', 'Logout successfull');

    }



    public function loggedin(){
        if(auth()->check()){
            return redirect('home');
        }else{
            return redirect('register');
        }
    }
}
