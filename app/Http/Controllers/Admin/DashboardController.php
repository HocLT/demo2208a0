<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() 
    {
        /*
        // tạo tk test
        $credentials = [
            'email'    => 'admin@gmail.com',
            'password' => '123',
        ];
        
        $user = \Sentinel::register($credentials);
        
        ///////////
        $role = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'admin',
            'slug' => 'admin',
        ]);

        $role = \Sentinel::getRoleRepository()->createModel()->create([
            'name' => 'user',
            'slug' => 'user',
        ]);
        

        // gắn role admin to user: admin@gmail.com
        $user = \Sentinel::findById(1);
        
        $role = \Sentinel::findRoleByName('admin');

        $role->users()->attach($user);
        

        // activation user
        $user = \Sentinel::findById(1);
        $activation = \Activation::create($user);
        */

        return view('admin.home.index');
    }

    public function login() 
    {
        return view('admin.login');
    }

    public function processLogin(Request $request)
    {
        $email = $request->email;
        $pass = $request->password;

        $credentials = [
            'email'    => $email,
            'password' => $pass,
        ];

        // $credentials = [
        //     'email'    => 'admin@gmail.com',
        //     'password' => '123',
        // ];
        
        $user = \Sentinel::authenticate($credentials);

        //dd($user->roles);
        return redirect('/admin');
        // return redirect()->route('home');
    }

    public function logout()
    {
        \Sentinel::logout();
        return redirect('/login');
    }
}
