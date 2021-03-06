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
            ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id' )
            ->join('images', 'images.id_shoe', '=', 'shoes.id')
            ->select('images.path', 'shoes.name', 'shoes.id_brand','shoes.sex','shoes.id', 'measurements.price')
            ->groupby('shoes.id', 'images.id_shoe')
            ->groupby('shoes.id', 'measurements.id_shoe')
            ->get();
      if(empty($shoes))
      {
        return view('index');
      }
      else
      {
        return view('index', compact('shoes'));
      }
    }



   public function initializePage2(Request $request){
     $styles = DB::select('select name, id from styles');
     $brands= DB::select('select id,name from brands');
     $categories = DB::select('select * from categories');
     $shoes = DB::table('shoes')
           ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id' )
           ->join('images', 'images.id_shoe', '=', 'shoes.id')
           ->select('images.path', 'shoes.name', 'shoes.id_brand','shoes.sex','shoes.id', 'measurements.price')
           ->groupby('shoes.id', 'images.id_shoe')
           ->groupby('shoes.id', 'measurements.id_shoe')
           ->paginate(12);
           if($request->ajax()){

            return view('shoesviews',compact('shoes'))->render();

           }

           return view('index2',compact('shoes', 'styles', 'brands', 'categories') );
   }

   public function indexFilter(Request $request){
     $sex = $request->input('sex');
       $selected = $request->input('brands');
      $categories = $request->input('categories');
       $styles = $request->input('styles');
          $shoes = DB::table('shoes')
              ->join('measurements', 'measurements.id_shoe', '=', 'shoes.id' )
              ->join('images', 'shoes.id', '=', 'images.id_shoe')
              ->select('images.path', 'shoes.name', 'shoes.id_brand','shoes.sex','shoes.id', 'measurements.price')
              ->where(function($query) use($sex){
               if(!is_null($sex)) $query->whereIn('shoes.sex', $sex);
              })
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

              ->paginate(12);






         // return View::make('shoesviews', compact('shoes'))->render();
           return view('shoesviews', compact('shoes'));
     //  return View::make('shoesviews', compact('shoes'))->render();
       //  return $html;

     }


  /*  public function searchBar(){
        $shoes = DB::table('shoes')
              ->select('name')
              ->get();

        return view('index', ['shoes' => $shoes]);
    }*/
    public function autocomplete(Request $request)
    {
       $term = $request->term;

       $queries = DB::table('shoes') //Your table name
           ->where('name', 'like', '%'.$term.'%') //Your selected row
           ->join('images', 'shoes.id', '=', 'images.id_shoe')
           ->select('shoes.name', 'shoes.id', 'images.path')
           ->take(6)->get();

        $news = DB::table('news')
                     ->where('title', 'like', '%'.$term.'%') //Your selected row
                     ->join('shoes', 'news.id', '=', 'shoes.id_news')
                     ->join('images', 'shoes.id', '=', 'images.id_shoe')
                     ->select('images.path', 'news.title', 'news.id')
                     ->groupBy('news.id', 'shoes.id_news')
                     ->get();



       foreach ($queries as $query)
       {
           $results[] = ['id' => $query->id, 'value' => $query->name,'path' => $query->path, 'type' => 'shoes']; //you can take custom values as you want
       }
       foreach ($news as $new)
       {
           $results[] = ['id' => $new->id, 'value' => $new->title, 'path' => $new->path, 'type' => 'news/detail']; //you can take custom values as you want
       }
    return response()->json($results);
    }

}
