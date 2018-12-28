<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Controllers\DB;
use DB;
use App\Shoe;
class IndexController extends Controller
{
    public function initializePage()
    {

      $shoes = DB::table('shoes')
            ->join('images', 'images.id_shoe', '=', 'shoes.id')
            ->select('shoes.name', 'images.path')
            ->get();
      if(empty($shoes))
      {
        return view('index');
      }
      else
      {
        return view('index', ['shoes' => $shoes]);
      }
    }

    public function searchBar(){
        $shoes = DB::table('shoes')
              ->select('name')
              ->get();

        return view('index', ['shoes' => $shoes]);
    }
}
