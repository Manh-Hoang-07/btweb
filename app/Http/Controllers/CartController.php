<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();


class CartController extends Controller
{
    public function save_cart(Request $request) {
    	$product_id = $request->product_id_hidden;
    	$qty = $request->qty;
    	$product_info = DB::table('product')->where('product.product_id',$product_id)->first();

    	$data['id'] = $product_info->product_id;
    	$data['qty'] = $qty;
    	$data['name'] = $product_info->product_name;
    	$data['price'] = $product_info->product_price;
    	$data['weight'] = $product_info->product_price;
    	$data['options']['image'] = $product_info->product_image;

    	Cart::add($data);
    	// Cart::destroy();
    	return Redirect::to('/show-cart');
    }

    public function show_cart() {
    	$category = DB::table('category_product')->orderby('category_id','desc')->get();
        $brand = DB::table('brand')->orderby('brand_id','desc')->get();
    	return view('pages.cart.show_cart_aj')->with('category',$category)->with('brand',$brand);
    }

    public function delete_cart($id) {
    	Cart::update($id,0);
    	return Redirect::to('/show-cart');
    }

    public function add_cart(Request $request) {
        $data = $request->all();
        $session_id = substr(md5(microtime()),rand(0,26),5);
        $cart = Session::get('cart');
        if($cart==true){
            $is_avaiable = 0;
            foreach($cart as $key => $val){
                if($val['product_id']==$data['cart_product_id']){
                    $is_avaiable++;
                }
            }
            if($is_avaiable == 0){
                $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],
                );
                Session::put('cart',$cart);
            }
        }else{
            $cart[] = array(
                'session_id' => $session_id,
                'product_name' => $data['cart_product_name'],
                'product_id' => $data['cart_product_id'],
                'product_image' => $data['cart_product_image'],
                'product_qty' => $data['cart_product_qty'],
                'product_price' => $data['cart_product_price'],

            );
            Session::put('cart',$cart);
        }
       
        Session::save();
    }
}
