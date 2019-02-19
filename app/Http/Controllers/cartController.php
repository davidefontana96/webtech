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
                ->join('images', 'images.id_shoe', '=', 'shoes.id')
                ->select('shoes.name', 'carts.price', 'carts.quantity', 'carts.subtotal', 'carts.id', 'images.path')
                ->groupby('shoes.id', 'images.id_shoe')
                ->where('carts.id_user', '=', $user->id)
                ->where('purchased', '=', 0)
                ->get();

      $total = DB::table('carts')
              ->where('id_user', '=', $user->id)
              ->where('purchased', '=', 0)
              ->sum('subtotal');

      $newtotal = DB::table('carts')
              ->where('id_user', '=', $user->id)
              ->where('purchased', '=', 0)
              ->sum('subtotal');

      $relatedProductCategoryIdC = DB::table('carts')
          ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
          ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
          ->join('categories', 'categories.id', '=', 'shoes.id_category')
          ->select('categories.id')
          ->where('carts.id_user', '=', auth()->user()->id)
          ->pluck('categories.id');

      $relatedProductStyleIdC = DB::table('carts')
          ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
          ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
          ->join('styles', 'styles.id', '=', 'shoes.id_style')
          ->select('styles.id')
          ->where('carts.id_user', '=', auth()->user()->id)
          ->pluck('styles.id');

      $relatedProductBrandIdC = DB::table('carts')
          ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
          ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
          ->join('brands', 'brands.id', '=', 'shoes.id_brand')
          ->select('brands.id')
          ->where('carts.id_user', '=', auth()->user()->id)
          ->pluck('brands.id');


      $relatedProductCategoryIdL = DB::table('likes')
      		->join('shoes', 'shoes.id', '=', 'likes.id_shoe')
      		->join('categories', 'categories.id', '=', 'shoes.id_category')
      		->select('categories.id')
      		->where('likes.id_user', '=', auth()->user()->id)
      		->pluck('categories.id');

      $relatedProductStyleIdL = DB::table('likes')
      		->join('shoes', 'shoes.id', '=', 'likes.id_shoe')
      		->join('styles', 'styles.id', '=', 'shoes.id_style')
      		->select('styles.id')
      		->where('likes.id_user', '=', auth()->user()->id)
      		->pluck('styles.id');

      $relatedProductBrandIdL = DB::table('likes')
      		->join('shoes', 'shoes.id', '=', 'likes.id_shoe')
      		->join('brands', 'brands.id', '=', 'shoes.id_brand')
      		->select('brands.id')
      		->where('likes.id_user', '=', auth()->user()->id)
      		->pluck('brands.id');

      $relatedProduct = DB::table('shoes')
          ->join('images', 'images.id_shoe', '=', 'shoes.id')
          ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id')
          ->select('shoes.name', 'images.path', 'shoes.id')
          ->selectRaw('min(measurements.price) as price')
          ->groupBy('shoes.id', 'images.id_shoe')
          ->groupBy('shoes.id', 'measurements.id_shoe')
          ->whereIn('shoes.id_category', $relatedProductCategoryIdL)
          ->orWhereIn('shoes.id_style', $relatedProductStyleIdL)
          ->orWhereIn('shoes.id_brand', $relatedProductBrandIdL)
          ->orWhereIn('shoes.id_style', $relatedProductStyleIdC)
          ->orWhereIn('shoes.id_brand', $relatedProductBrandIdC)
          ->orWhereIn('shoes.id_brand', $relatedProductBrandIdC)
          ->orderBy('measurements.price')
          ->limit(4)
          ->get();

      if($relatedProduct->count() == 0 || $relatedProduct->count() < 4)
      {
        $relatedProduct = DB::table('shoes')
                    ->join('images', 'images.id_shoe', '=', 'shoes.id')
                    ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id')
                    ->select('shoes.name', 'images.path', 'shoes.id')
                    ->selectRaw('min(measurements.price) as price')
                    ->groupBy('shoes.id', 'images.id_shoe')
                    ->groupBy('shoes.id', 'measurements.id_shoe')
                    ->orderBy('measurements.price')
                    ->limit(4)
                    ->get();

      return view('cart', compact('elements', 'total', 'discount', 'newtotal','relatedProduct'));
      }

      $discount = 0;

      return view('cart', compact('elements', 'total', 'discount', 'newtotal','relatedProduct'));
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
              ->where('purchased', '=', 0)
              ->sum('subtotal');

      $discount = 0;
      $newtotal = 0;

      $elements = DB::table('carts')
                ->join('measurements', 'carts.id_measure', '=', 'measurements.id')
                ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
                ->select('shoes.name', 'carts.price', 'carts.quantity', 'carts.subtotal', 'carts.id')
                ->where('carts.id_user', '=', $user)
                ->where('purchased', '=', 0)
                ->get();

      if($codeexists)
      {
          $percentage = DB::table('coupons')
                        ->select('percentage')
                        ->where('code_coupon', '=', $code)
                        ->pluck('percentage');

          $discount = ($total * $percentage[0])/100;

          $newtotal = $total - $discount;

          return view('cartviewpage', compact('elements', 'discount', 'newtotal', 'total'));
      }
      else
      {
          $discount = 0;
          $newtotal = $total;
          return view('cartviewpage', compact('elements', 'discount', 'newtotal', 'total'));
      }
    }

    public function removeProduct(Request $request)
    {
      $iduser = auth()->user()->id;
      $idcart = $request->input('idcart');

      $idmeasure = DB::table('carts')
                  ->select('id_measure')
                  ->where('id', '=', $idcart)
                  ->pluck('id_measure');

      $quantityCurr = DB::table('measurements')
                  ->select('element')
                  ->where('id', '=', $idmeasure[0])
                  ->pluck('element');

      $quantityToAdd = DB::table('carts')
                  ->select('quantity')
                  ->where('id', '=', $idcart)
                  ->pluck('quantity');

      $finalQuantity = $quantityCurr[0] + $quantityToAdd[0];

      DB::table('carts')->where('id', '=', $idcart)->where('purchased', '=', 0)->delete();

      DB::table('measurements')
          ->where('id', '=', $idmeasure[0])
          ->update(['element' => $finalQuantity]);

      $elements = DB::table('carts')
                ->join('measurements', 'carts.id_measure', '=', 'measurements.id')
                ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
                ->select('shoes.name', 'carts.price', 'carts.quantity', 'carts.subtotal', 'carts.id')
                ->where('carts.id_user', '=', $iduser)
                ->where('purchased', '=', 0)
                ->get();

      $total = DB::table('carts')
              ->where('id_user', '=', $iduser)
              ->where('purchased', '=', 0)
              ->sum('subtotal');

      $newtotal = DB::table('carts')
              ->where('id_user', '=', $iduser)
              ->where('purchased', '=', 0)
              ->sum('subtotal');

      $discount = 0;

     return view('cartviewpage', compact('elements', 'discount', 'newtotal', 'total'));

    }

}
