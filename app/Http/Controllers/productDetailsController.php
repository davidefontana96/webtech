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

class productDetailsController extends Controller
{

  public function detailShoe($id)
  {
    $shoes = DB::table('shoes')
      ->select('shoes.name', 'shoes.details', 'shoes.sex', 'shoes.id_category','shoes.id_brand','shoes.id_style')
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
