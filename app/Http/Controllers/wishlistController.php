<?php

namespace App\Http\Controllers;
use DB;
use App\Shoe;
use Illuminate\Http\Request;

class wishlistController extends Controller
{
    public function initializePage()
    {
      $userid = auth()->user()->id;


      $products = DB::table('wishes_lists')
                ->join('shoes', 'shoes.id', '=', 'id_shoe')
                ->select('wishes_lists.price', 'shoes.name', 'wishes_lists.id')
                ->where('id_user', '=', $userid)
                ->get('price');


      $likesAuth = DB::table('likes')
                  ->where('id_user', '=', auth()->user()->id)
                  ->count();

      $cartsAuth = DB::table('carts')
                  ->where('id_user', '=', auth()->user()->id)
                  ->count();

      $items = DB::table('carts')
              ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
              ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
              ->join('images', 'images.id_shoe', '=', 'shoes.id')
              ->select('carts.subtotal','carts.price', 'shoes.name', 'carts.quantity', 'carts.id', 'images.path')
              ->groupBy('measurements.id_shoe', 'carts.id')
              ->groupby('shoes.id', 'images.id_shoe')
              ->where('carts.id_user', '=', $userid)
              ->where('carts.purchased', '=', 0)
              ->get();

      $itemsInCart = DB::table('carts')
              ->where('id_user', '=', $userid)
              ->where('purchased', '=', 0)
              ->count();

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

        return view('add-to-wishlist', compact('products', 'relatedProduct', 'items', 'itemsInCart'));
      }


      return view('add-to-wishlist', compact('products', 'relatedProduct', 'items', 'itemsInCart'));

    }


    public function removeWish(Request $request)
    {
      $idwish = $request->input('idwish');

      $userid = auth()->user()->id;

      DB::table('wishes_lists')->where('id', '=', $idwish)->delete();

      $products = DB::table('wishes_lists')
                ->join('shoes', 'shoes.id', '=', 'id_shoe')
                ->select('wishes_lists.price', 'shoes.name', 'wishes_lists.id')
                ->where('id_user', '=', $userid)
                ->get('price');

      return view('wishview', compact('products'));
    }
}
