<?php

use App\Models\AddCart;
use Illuminate\Support\Facades\Auth;

if (!function_exists('is_product_in_cart')) {
    function is_product_in_cart($productId) {
        return AddCart::where('product_id', $productId)->exists();
    }
}


if (!function_exists('UserCartCount')) {
    function UserCartCount($userId) {
        return AddCart::where('user_id', $userId)->count();
    }
}

if (!function_exists('UserCartData')) {
    function UserCartData($userId) {
        return AddCart::with('product')->where('user_id', $userId)->get();
    }
}

if(!function_exists('usercartdata')){
    function usercartdata(){
        return AddCart::where('user_id', Auth::user()->id)->get();
    }
}
if(!function_exists('usercartcountnew')){
    function usercartcountnew(){
        return AddCart::where('user_id', Auth::user()->id)->count();
    }
}
if(!function_exists('usercartprice')){
    function usercartprice(){
        return AddCart::where('user_id', Auth::user()->id)->sum('price');
    }
}