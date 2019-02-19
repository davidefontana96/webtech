<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Niw;
use App\Style;
use App\Brand;
use App\Category;
use App\Shoe;
use Illuminate\Support\Facades\DB;
use View;
use Illuminate\Pagination\LengthAwarePaginator;

class pastOrdersController extends Controller
{
    public function initializePage()
    {
      $userid = auth()->user()->id;

      $products = DB::table('carts')
                  ->join('measurements', 'carts.id_measure', '=', 'measurements.id')
                  ->join('shoes', 'shoes.id','=', 'measurements.id_shoe')
                  ->join('compositions', 'compositions.id_cart', '=', 'carts.id')
                  ->join('orders', 'orders.id', '=', 'compositions.id_order')
                  ->join('coupons', 'coupons.id', '=', 'orders.id_coupon')
                  ->select('carts.price', 'carts.quantity', 'carts.subtotal', 'shoes.name', 'orders.created_at', 'orders.id_coupon')
                  ->where('carts.id_user', '=', $userid)
                  ->where('carts.purchased', '=', 1)
                  ->orderBy('carts.created_at')
                  ->get();

      return view('historicalpurchase', compact('products'));

    }
}
