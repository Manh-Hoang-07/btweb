<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class CheckoutController extends Controller
{
    public function login_checkout() {
    	$category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();

        return view('pages.checkout.login_checkout')->with('category',$category)->with('brand',$brand);
    }

    public function add_customor(Request $request) {
    	$data = array();
    	$data['customor_name'] = $request->customor_name;
    	$data['customor_email'] = $request->customor_email;
    	$data['customor_password'] = md5($request->customor_password);
    	$data['customor_phone'] = $request->customor_phone;

    	$customor_id = DB::table('customor')->insertGetId($data);
    	Session::put('customor_id',$customor_id);
    	Session::put('customor_name',$request->customor_name);
    	return Redirect::to('/checkout');
    }

    public function checkout() {
    	$category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();

        return view('pages.checkout.show_checkout')->with('category',$category)->with('brand',$brand);
    }

    public function save_order(Request $request) {
    	$data = array();
    	$data['shipping_name'] = $request->shipping_name;
    	$data['shipping_address'] = $request->shipping_address;
    	$data['shipping_phone'] = $request->shipping_phone;
    	$data['shipping_email'] = $request->shipping_email;

    	$shipping_id = DB::table('shipping')->insertGetId($data);
    	Session::put('shipping_id',$shipping_id);
    	return Redirect::to('/payment');
    }

    public function logout() {
    	Session::flush();
    	return Redirect::to('/login_customor');
    }

    public function login_customor(Request $request) {
    	$email = $request->login_email;
    	$password = md5($request->login_password);
    	$result = DB::table('customor')->where('customor_email',$email)->where('customor_password',$password)->first();
    	if($result) {
    		Session::put('customor_id',$result->customor_id);
    		return Redirect::to('/checkout');
    	} else {
    		return Redirect::to('/login_customor');
    	}
    }

    public function order_place(Request $request) {
    	
    }
}
