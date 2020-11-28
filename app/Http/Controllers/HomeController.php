<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class HomeController extends Controller
{
    public function index() {
    	$category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();
        $all_product = DB::table('product')->orderby('product_id','desc')->limit(3)->get();
    	return view('pages.home')->with('all_product',$all_product)->with('category',$category)->with('brand',$brand);
    }
}
