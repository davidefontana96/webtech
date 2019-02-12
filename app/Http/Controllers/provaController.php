<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class provaController extends Controller
{
    //for create controller - php artisan make:controller AutocompleteController

    public function scroll(Request $request){
      {
        $news = DB::table('news')
                  ->join('shoes', 'news.id', '=', 'shoes.id_news')
                  ->join('images', 'shoes.id', '=', 'images.id_shoe')
                  ->select('images.path', 'news.title', 'news.id')
                  ->groupBy('news.id', 'shoes.id_news')
                  ->paginate(1);


      	if ($request->ajax()) {
      		$view = view('news',compact('news'))->render();
              return response()->json(['html'=>$view]);
          }


      	return view('newsIndex',compact('news'));
      }
    }

}
