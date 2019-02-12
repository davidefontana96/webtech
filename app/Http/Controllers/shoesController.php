<?php

namespace App\Http\Controllers;
use App\Cart;
use Illuminate\Http\Request;
use App\Niw;
use App\Style;
use App\Brand;
use App\Category;
use App\Shoe;
use App\Measurement;
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
         ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id' )
         ->groupby('shoes.id', 'images.id_shoe')
         ->groupby('shoes.id', 'measurements.id_shoe')
         ->select('images.path', 'shoes.name', 'shoes.id_brand','shoes.sex','shoes.id', 'measurements.price')
         ->where('shoes.sex', '=', 'F' )
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
        ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id' )
        ->join('images', 'shoes.id', '=', 'images.id_shoe')
        ->groupby('shoes.id', 'images.id_shoe')
         ->groupby('shoes.id', 'measurements.id_shoe')
         ->select('images.path', 'shoes.name', 'shoes.id_brand','shoes.sex','shoes.id', 'measurements.price')
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

    public function brandShoes($sex, Request $request){
        $selected = $request->input('brands');
      //  $selected = array("1");
        $categories = $request->input('categories');
        $styles = $request->input('styles');
          // modificare html + js


      /*  if(!is_null($selected)) {
          $shoes = DB::table('shoes')
          ->join('images', 'shoes.id', '=', 'images.id_shoe')
          ->select('shoes.id','images.path', 'shoes.name')
          ->where('shoes.sex', '=', $sex)
          ->groupby('shoes.id', 'images.id_shoe')
          ->get();
      }
*/
      /*   foreach ($selected as $selected)
         {
           echo $selected;
         } */
      /*  $shoes = DB::table('shoes')
           ->join('images', 'shoes.id', '=', 'images.id_shoe')
           ->groupBy('shoes.id', 'images.id')
           ->select('images.path', 'shoes.name', 'shoes.id_brand')
           ->wherein('shoes.id_brand', '=', $selected)
           ->get();
           */
           // funziona ma è un po' da migliorare

           $shoes = DB::table('shoes')
               ->join('images', 'shoes.id', '=', 'images.id_shoe')
               ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id' )

               ->select('images.path', 'shoes.name', 'shoes.id_brand','shoes.sex','shoes.id', 'measurements.price')
               ->where('shoes.sex', '=', $sex)
               ->where(function($query) use($selected)
                {
                  if(!is_null($selected)) $query->whereIn('shoes.id_brand',$selected);

                })
               ->where(function($query) use ($categories)
               {

               if(!is_null($categories))  $query->whereIn('shoes.id_category',$categories);

              })
               ->where(function($query) use($styles)
              {

              if(!is_null($styles)) $query->whereIn('shoes.id_style', $styles);

              })
               ->groupby('shoes.id', 'images.id_shoe')
               ->groupby('shoes.id', 'measurements.id_shoe')
               ->get();






          // return View::make('shoesviews', compact('shoes'))->render();
            return view('shoesviews', compact('shoes'));
      //  return View::make('shoesviews', compact('shoes'))->render();
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




}
