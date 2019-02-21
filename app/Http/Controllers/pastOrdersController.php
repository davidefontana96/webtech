<?php

namespace App\Http\Controllers;
use Auth;
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
                  ->join('images', 'images.id_shoe','=', 'shoes.id')
                  ->join('compositions', 'compositions.id_cart', '=', 'carts.id')
                  ->join('orders', 'orders.id', '=', 'compositions.id_order')
                  //->leftJoin('coupons', 'coupons.id', '=', 'orders.id_coupon')
                  ->select('carts.price', 'carts.quantity', 'carts.subtotal', 'shoes.name', 'orders.created_at', 'orders.id_coupon', 'images.path')
                  ->where('carts.id_user', '=', $userid)
                  ->where('carts.purchased', '=', 1)
                  ->groupBy('shoes.id', 'images.id_shoe')
                  ->orderBy('carts.created_at')
                  ->get();

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

                    return view('historicalpurchase', compact('products', 'relatedProduct'));

      }
      return view('historicalpurchase', compact('products', 'relatedProduct'));


    }
}
