<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class AdminController extends Controller
{
    public function index() {
    	return view('admin.login');
    }

    public function show_dashboard() {
    	return view('admin.dashboard');
    }

    public function dashboard(Request $request) {
    	$email = $request->email;
    	$password = md5($request->password);

    	$result = DB::table('admin')->where('admin_email',$email)->where('admin_password',$password)->first();
    	if ($result) {
    		Session::put('name',$result->name);
    		Session::put('id',$result->id);
    		return Redirect::to('/dashboard');
    	}
    	else {
    		Session::put('message','Mat khau hoac tai khoan khong chinh xac');
    		return Redirect::to('/admin');
    	}
    	return view('admin.dashboard');
    }

    public function logout() {
    	Session::put('name',null);
    	Session::put('id',null);
    	return Redirect::to('/admin');
    }
}
