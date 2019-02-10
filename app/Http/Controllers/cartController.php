<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Niw;
use App\Style;
use App\Brand;
use App\Category;
use App\Shoe;
use Illuminate\Support\Facades\DB;
use View;

class cartController extends Controller
{
    public function ShowProductInCart()
    {
      $user = auth()->user();


      $elements = DB::table('carts')
                ->join('measurements', 'carts.id_measure', '=', 'measurements.id')
                ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
                ->select('shoes.name', 'carts.price', 'carts.quantity', 'carts.subtotal', 'carts.id')
                ->where('carts.id_user', '=', $user->id)
                ->get();

      $total = DB::table('carts')
              ->where('id_user', '=', $user->id)
              ->sum('subtotal');

      $newtotal = DB::table('carts')
              ->where('id_user', '=', $user->id)
              ->sum('subtotal');

      $discount = 0;

      return view('cart', compact('elements', 'total', 'discount', 'newtotal'));
    }

    public function applyCoupon(Request $request)
    {
      $user = auth()->user()->id;
      $code = $request->input('coupon');

      $codeexists = DB::table('coupons')
                    ->where('code_coupon', $code)
                    ->exists();

      $total = DB::table('carts')
              ->where('id_user', '=', $user)
              ->sum('subtotal');

      $discount = 0;
      $newtotal = 0;

      if($codeexists)
      {
          $percentage = DB::table('coupons')
                        ->select('percentage')
                        ->where('code_coupon', '=', $code)
                        ->pluck('percentage');

          $discount = ($total * $percentage[0])/100;

          $newtotal = $total - $discount;

          return view('countview', compact('discount', 'newtotal', 'total'));
      }
      else
      {
          $discount = 0;
          $newtotal = $total;
          return view('countview', compact('discount', 'newtotal', 'total'));
      }
    }

    public function removeProduct(Request $request)
    {
      $iduser = auth()->user()->id;
      $idcart = $request->input('idcart');

      DB::table('carts')->where('id', '=', $idcart)->delete();

      $elements = DB::table('carts')
                ->join('measurements', 'carts.id_measure', '=', 'measurements.id')
                ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
                ->select('shoes.name', 'carts.price', 'carts.quantity', 'carts.subtotal', 'carts.id')
                ->where('carts.id_user', '=', $iduser)
                ->get();

     return view('cartviewpage', compact('elements'));

    }

}
