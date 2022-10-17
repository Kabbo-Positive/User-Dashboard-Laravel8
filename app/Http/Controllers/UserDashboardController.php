<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard');
    }

    public function billing()
    {
        return view('billing');
    }

    public function profile()
    {
        return view('profile');
    }

    public function userManagement()
    {
        return view('laravel-examples.user-management');
    }

    public function tables()
    {
        return view('tables');
    }

    public function staticSignIn()
    {
        return view('static-sign-in');
    }

    public function staticSignUp()
    {
        return view('static-sign-up');
    }
}
