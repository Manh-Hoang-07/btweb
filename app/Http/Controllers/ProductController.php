<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    public function add_product() {
        $category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();

        return view('admin.product.add_product')->with('category',$category)->with('brand',$brand);
    }

    public function all_product() {

        $all_product = DB::table('product')
        ->join('category_product','product.category_id','category_product.category_id')
        ->join('brand','product.brand_id','brand.brand_id')->orderby('product.product_id')->get();
        $manager_product = view('admin.product.all_product')->with('all_product',$all_product);

        return view('admin.admin_layout')->with('admin.product.all_product',$manager_product);
    }   

    public function save_product(Request $request){
        $data = array();
        $data['category_id'] = $request->product_cate;
        $data['brand_id'] = $request->product_brand;
        $data['product_name'] = $request->product_name;
        $data['product_desc'] = $request->product_desc;
        $data['product_price'] = $request->product_price;
        $data['product_status'] = $request->product_status;

        $get_image = $request->file('product_image');
        if($get_image) {
            $get_name = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('public/images/uploads/product',$new_image);
            $data['product_image'] = $new_image;

            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');
        }

        DB::table('product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }

    public function edit_product($id) {
        $category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();
        $edit_product = DB::table('product')->where('product_id',$id)->get();
        $manager_product = view('admin.product.edit_product')->with('edit_product',$edit_product)->with('category',$category)->with('brand',$brand);

        return view('admin.admin_layout')->with('admin.product.edit_product',$manager_product);
    }

    public function update_brand(Request $request,$id) {
        $data = array();
        $data['product_name'] = $request->brand_name;
        $data['product_desc'] = $request->brand_desc;

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

    public function show_details($id) {
        $category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();
        $details_product = DB::table('product')
        ->join('category_product','product.category_id','category_product.category_id')
        ->join('brand','product.brand_id','brand.brand_id')->where('product.product_id',$id)->get();
        return view('pages.product.show_details')->with('category',$category)->with('brand',$brand)->with('details_product',$details_product);
    }
}
