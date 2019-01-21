<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use App\Niw;
use App\Style;
use App\Brand;
use App\Category;
use App\Shoe;
use Illuminate\Support\Facades\DB;
use View;

class shoesController extends Controller
{

    public function womenShoes(){
     $styles = DB::select('select name, id from styles');
     $brands= DB::select('select id,name from brands');
    $categories = DB::select('select * from categories');
     $shoes = DB::table('shoes')
        ->join('images', 'shoes.id', '=', 'images.id_shoe')
        ->groupBy('shoes.id', 'images.id')
        ->where('shoes.sex', '=', 'F')
        ->select('images.path', 'shoes.name')
        ->get();

    //  return view('womenExtends', ['results' => $results]);
    // return view('women');
  //  $styles = Style::all();

    return view('women', compact('categories', 'styles', 'brands', 'shoes' ));
    // return View::make('women', compact('styles', 'shoes' ));
    }

    public function menShoes(){
     $styles = DB::select('select name, id from styles');
     $brands= DB::select('select id,name from brands');
    $categories = DB::select('select * from categories');
     $shoes = DB::table('shoes')
        ->join('images', 'shoes.id', '=', 'images.id_shoe')
        ->groupBy('shoes.id', 'images.id')
        ->select('images.path', 'shoes.name', 'shoes.id_brand','shoes.sex','shoes.id')
        ->where('shoes.sex', '=', 'M' )
        ->get();

    //  return view('womenExtends', ['results' => $results]);
    // return view('women');
    //  $styles = Style::all();

    return view('men', compact('categories', 'styles', 'brands', 'shoes' ));
    // return View::make('women', compact('styles', 'shoes' ));
    }
  /*  public function brands($id){
      $shoes = DB::table('shoes')
         ->join('images', 'shoes.id', '=', 'images.id_shoe')
         ->select('images.path', 'shoes.name')->get();
          return $shoes;
          $html = View::make("shoesviews", compact('shoes'))->render();

    } */

    public function brandShoes($id, $sex){
      $shoes = DB::table('shoes')
         ->join('images', 'shoes.id', '=', 'images.id_shoe')
         ->groupBy('shoes.id', 'images.id')
         ->select('images.path', 'shoes.name', 'shoes.id_brand')
         ->where([
           ['shoes.id_brand', '=', $id],
            ['shoes.sex', '=', $sex]])
         ->get();
        // return View::make('shoesviews', compact('shoes'))->render();
        return view('shoesviews', compact('shoes'));
      //  $html = View::make('shoesviews', compact('shoes'))->render();
      //  return $html;

    }

    public function categoryShoes($id, $sex){
      $shoes = DB::table('shoes')
         ->join('images', 'shoes.id', '=', 'images.id_shoe')
         ->groupBy('shoes.id', 'images.id')
         ->select('images.path', 'shoes.name', 'shoes.id_category', 'shoes.sex')
         ->where([
           ['shoes.id_category', '=', $id],
           ['shoes.sex', '=', $sex]])
         ->get();
        // return View::make('shoesviews', compact('shoes'))->render();
        return view('shoesviews', compact('shoes'));
      //  $html = View::make('shoesviews', compact('shoes'))->render();
      //  return $html;

    }

    public function styleShoes($id, $sex){
      $shoes = DB::table('shoes')
         ->join('images', 'shoes.id', '=', 'images.id_shoe')
         ->groupBy('shoes.id', 'images.id')
         ->select('images.path', 'shoes.name', 'shoes.id_style', 'shoes.sex')
         ->where([
            ['shoes.id_style', '=', $id],
            ['shoes.sex', '=', $sex]])
            ->get();
        // return View::make('shoesviews', compact('shoes'))->render();
        return view('shoesviews', compact('shoes'));
      //  $html = View::make('shoesviews', compact('shoes'))->render();
      //  return $html;

    }

    public function colorShoes($id, $sex){
      $shoes = DB::table('shoes')
         ->join('images', 'shoes.id', '=', 'images.id_shoe')
         ->groupBy('shoes.id', 'images.id')
         ->select('images.path', 'shoes.name', 'shoes.id_style', 'shoes.sex')
         ->where([
            ['shoes.color', '=', $id],
            ['shoes.sex', '=', $sex]])
            ->get();
        // return View::make('shoesviews', compact('shoes'))->render();
        return view('shoesviews', compact('shoes'));
    }

    public function detailShoe($id){
      $shoes = DB::table('shoes')
        ->join('measurements', 'shoes.id','=', 'measurements.id_shoe')
        ->select('shoes.name', 'shoes.details', 'shoes.sex', 'shoes.id_category','shoes.id_brand','shoes.id_style', 'measurements.element')
        ->where('shoes.id', '=', $id)
        ->get();

      $images = DB::table('shoes')
        ->join('images', 'shoes.id', '=', 'images.id_shoe')
        ->select('images.path')
        ->where('images.id_shoe', '=', $id )
        ->get();

      $measures = DB::table('shoes')
        ->join('measurements', 'shoes.id','=', 'measurements.id_shoe')
        ->select('measurements.size_shoe', 'measurements.element')
        ->where('measurements.id_shoe', '=', $id)
        ->get();


        return view('product-detail', compact('shoes', 'images', 'measures'));
    }


}
