<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        // $ss = 'Folagbade';
        $users = [
            'name'=>'John', 
            'email'=> 'jfix@gmail.com',
            'password' => '1234'
        ];

        $arr = ['John', 'jfix@gmail.com'];
        // return view('home', compact('username'));
        return view('home')->with('insert', false);
    }

    public function register(Request $request) {
        // return $request->all();
        $check = DB::table('users')->where('email', $request->email)->first();
        if (!$check) {
                $insert = DB::table('users')->insert([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => password_hash($request->password, PASSWORD_DEFAULT),
                    'created_at' => now(),
                    'updated_at' => now()
            ]);
        // return $insert;
            if ($insert) {
                // return view('home')->with('message', 'Registration successful')->with('insert', $insert);
                return view('login');
            }else {
                return view('home')->with('message', 'Registration failed, please try again')->with('insert', false);
        
            }
        }else {
            return view('home')->with('message', 'Email already exist')->with('insert', false);
        }

    }

    public function login(Request $request) {
        // return $request->all();
        $email = $request->email;
        $password = $request->password;
        $check = DB::table('users')->where('email', $email)->first();
        // return $check;
        if ($check) {
            if (password_verify($password, $check->password)) {
                return redirect('/jobs');
                // return view('login')->with('message', 'Login Successful')->with('check', true);
            }else {
                return view('login')->with('message', 'Incorrect Password')->with('check', false);
            }
        }else {
            return view('login')->with('message', 'User does not exist')->with('check', false);
        }
    }
}
