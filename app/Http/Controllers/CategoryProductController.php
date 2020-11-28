<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProductController extends Controller
{
    public function add_category_product() {
    	return view('admin.categoryProduct.add_category_product');
    }

    public function all_category_product() {

        $all_category_product = DB::table('category_product')->get();
        $manager_category_product = view('admin.categoryProduct.all_category_product')->with('all_category_product',$all_category_product);

    	return view('admin.admin_layout')->with('admin.categoryProduct.all_category_product',$manager_category_product);
    }   

    public function save_category_product(Request $request){
    	$data = array();
    	$data['category_name'] = $request->product_name;
    	$data['category_desc'] = $request->product_desc;
    	$data['category_status'] = $request->product_status;

    	DB::table('category_product')->insert($data);
    	Session::put('message','Thêm danh mục sản phẩm thành công');
    	return Redirect::to('all-category-product');
    }

    public function edit_category_product($id) {
        $edit_category_product = DB::table('category_product')->where('category_id',$id)->get();
        $manager_category_product = view('admin.categoryProduct.edit_category_product')->with('edit_category_product',$edit_category_product);

        return view('admin.admin_layout')->with('admin.categoryProduct.edit_category_product',$manager_category_product);
    }

    public function update_category_product(Request $request,$id) {
        $data = array();
        $data['category_name'] = $request->product_name;
        $data['category_desc'] = $request->product_desc;

        DB::table('category_product')->where('category_id',$id)->update($data);
        Session::put('message','Cap nhat danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function delete_category_product($id) {
        $delete = DB::table('category_product')->where('category_id',$id);
        $delete->delete();
        Session::put('message','Xoa danh mục sản phẩm thành công');
        return Redirect::to('all-category-product');
    }

    public function show_category_home($id) {
        $category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();
        $category_by_id = DB::table('product')->join('category_product','product.category_id','=','category_product.category_id')->where('product.product_id',$id)->get();
        $category_name = DB::table('category_product')->where('category_id',$id)->limit(1)->get();
        return view('pages.category.show_category')->with('category_by_id',$category_by_id)->with('category',$category)->with('brand',$brand)->with('category_name',$category_name);
    }

    public function show_brand_home($id) {
        $category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();
        $brand_by_id = DB::table('product')->join('brand','product.brand_id','=','brand.brand_id')->where('product.product_id',$id)->get();
        $brand_name = DB::table('brand')->where('brand_id',$id)->limit(1)->get();

        return view('pages.category.show_brand')->with('brand_by_id',$brand_by_id)->with('category',$category)->with('brand',$brand)->with('brand_name',$brand_name);
    }
}
