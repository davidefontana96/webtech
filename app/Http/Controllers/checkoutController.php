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
use Illuminate\Support\Facades\Input;
use View;

class checkoutController extends Controller
{
    public function initializePage()
    {
      $userid = auth()->user()->id;

      $items = DB::table('carts')
              ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
              ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
              ->select('carts.subtotal', 'shoes.name', 'carts.quantity', 'carts.id')
              ->where('id_user', '=', $userid)
              ->where('purchased', '=', 0)
              ->get();

      $itemsInCart = DB::table('carts')
              ->where('id_user', '=', $userid)
              ->where('purchased', '=', 0)
              ->count();


      $quantityNamePrice = DB::table('carts')
                  ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
                  ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
                  ->select('carts.quantity', 'carts.subtotal', 'shoes.name')
                  ->where('carts.id_user', '=', $userid)
                  ->where('carts.purchased', '=', 0)
                  ->get();

      $carttotal = DB::table('carts')
                  ->select('subtotal')
                  ->where('id_user', '=', $userid)
                  ->where('purchased', '=', 0)
                  ->sum('subtotal');

      $userName = auth()->user()->name;
      $userSurname = auth()->user()->surname;
      $userMail = auth()->user()->email;
      $userAddress = auth()->user()->address;


      return view('checkout', compact('items', 'itemsInCart', 'quantityNamePrice', 'carttotal',
    'userName', 'userSurname', 'userMail', 'userAddress'));
    }

    public function orderComplete(Request $request)
    {
      $userid = auth()->user()->id;
      $currdate = date("Y-m-d H:i:s");
      $varname = Input::post('name');
      $varsurname = Input::post('surname');
      $varaddress = Input::post('address');
      $varcity = Input::post('city');
      $varprovince = Input::post('province');
      $varpostal = Input::post('postalcode');
      $varphone = Input::post('phone');
      $varcountry = Input::post('country');
      $varcoupon = Input::post('coupon');

      $couponexists = DB::table('coupons')
                    ->where('code_coupon', '=', $varcoupon)
                    ->exists();


      $carttotal = DB::table('carts')
                  ->select('subtotal')
                  ->where('id_user', '=', $userid)
                  ->where('purchased', '=', 0)
                  ->sum('subtotal');

      $carts_ids = DB::table('carts')
                ->select('id')
                ->where('id_user', '=', $userid)
                ->where('purchased', '=', 0)
                ->pluck('id');

      $carts_numbers = DB::table('carts')
                ->select('id')
                ->where('id_user', '=', $userid)
                ->where('purchased', '=', 0)
                ->count();
                echo $carts_numbers;

      if($couponexists)
      {
        $varcoupon1 = DB::table('coupons')
                    ->select('id')
                    ->where('code_coupon', '=', $varcoupon)
                    ->pluck('id');

        $couponpercentage = DB::table('coupons')
                          ->select('percentage')
                          ->where('code_coupon', '=', $varcoupon)
                          ->pluck('percentage');
        $carttotal = (($carttotal * (100-$couponpercentage[0])))/100;

        DB::table('orders')->insert(['id_user' => $userid, 'created_at' => $currdate, 'total' => $carttotal,
                                  'phone_number'=> $varphone, 'country' => $varcountry, 'address' => $varaddress,
                                   'city' =>$varcity, 'province'=>$varprovince, 'id_coupon' => $varcoupon1[0],
                                  'postal_code' => $varpostal]);
      } else {

        DB::table('orders')->insert(['id_user' => $userid, 'created_at' => $currdate, 'total' => $carttotal,
                                  'phone_number'=> $varphone, 'country' => $varcountry, 'address' => $varaddress,
                                   'city' =>$varcity, 'province'=>$varprovince,
                                  'postal_code' => $varpostal]);
      }

      $id_order = DB::table('orders')
                ->select('id')
                ->where('id_user', '=', $userid)
                ->max('id');

      $i = 0;

      while($i < $carts_numbers)
      {
          if($couponexists){

          $couponpercentage = DB::table('coupons')
                            ->select('percentage')
                            ->where('code_coupon', '=', $varcoupon)
                            ->pluck('percentage');

          $oldSubtotal = DB::table('carts')->select('subtotal')->where('id', '=', $carts_ids[$i])->pluck('subtotal');
          $newcartSubtotal = (($oldSubtotal[0] * (100-$couponpercentage[0])))/100;
          DB::table('compositions')->insert(['created_at' => $currdate, 'id_cart' => $carts_ids[$i], 'id_order' => $id_order ]);


          DB::table('carts')->where('id', '=', $carts_ids[$i])->where('purchased', '=', 0)->update(['purchased' => 1 , 'subtotal' => $newcartSubtotal]);



          } else {

            DB::table('compositions')->insert(['created_at' => $currdate, 'id_cart' => $carts_ids[$i], 'id_order' => $id_order ]);

            DB::table('carts')->where('id_user', '=', $userid)->where('purchased', '=', 0)->update(['purchased' => 1]);

          }
          $i = $i + 1;
      }

      return view('order-complete', compact('varname', 'varsurname'));
    }
}
