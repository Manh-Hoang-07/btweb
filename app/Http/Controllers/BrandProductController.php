<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class BrandProductController extends Controller
{
    public function add_brand() {
    	return view('admin.categoryProduct.add_brand');
    }

    public function all_brand() {

        $all_brand = DB::table('brand')->get();
        $manager_brand = view('admin.categoryProduct.all_brand')->with('all_brand',$all_brand);

    	return view('admin.admin_layout')->with('admin.categoryProduct.all_brand',$manager_brand);
    }   

    public function save_brand(Request $request){
    	$data = array();
    	$data['brand_name'] = $request->brand_name;
    	$data['brand_desc'] = $request->brand_desc;
    	$data['brand_status'] = $request->brand_status;

    	DB::table('brand')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('all-brand');
    }

    public function edit_brand($id) {
        $edit_brand = DB::table('brand')->where('brand_id',$id)->get();
        $manager_brand = view('admin.categoryProduct.edit_brand')->with('edit_brand',$edit_brand);

        return view('admin.admin_layout')->with('admin.categoryProduct.edit_brand',$manager_brand);
    }

    public function update_brand(Request $request,$id) {
        $data = array();
        $data['brand_name'] = $request->brand_name;
        $data['brand_desc'] = $request->brand_desc;

        DB::table('brand')->where('brand_id',$id)->update($data);
        Session::put('message','Cap thuog hieu mục sản phẩm thành công');
        return Redirect::to('all-brand');
    }

    public function delete_brand($id) {
        $delete = DB::table('brand')->where('brand_id',$id);
        $delete->delete();
        Session::put('message','Xoa thuong hieu sản phẩm thành công');
        return Redirect::to('all-brand');
    }
}
