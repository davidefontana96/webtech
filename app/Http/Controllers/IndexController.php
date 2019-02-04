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
        return view('index', compact('shoes'));
      }
    }



   public function initializePage2(Request $request){
     $styles = DB::select('select name, id from styles');
     $brands= DB::select('select id,name from brands');
     $categories = DB::select('select * from categories');
     $shoes = DB::table('shoes')
           ->join('images', 'images.id_shoe', '=', 'shoes.id')
           ->select('shoes.id','images.path', 'shoes.name', 'shoes.sex')
           ->groupby('shoes.id', 'images.id_shoe')
           ->paginate(6);
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
              ->join('images', 'shoes.id', '=', 'images.id_shoe')
              ->select('shoes.id','images.path', 'shoes.name', 'shoes.sex')
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
              ->paginate(6);






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

    public function action(Request $request)
    {
        if($request->ajax())
        {
          $query = $request->get('query');
          if($query != '')
          {
            $data = DB::table('shoes')
                    ->join('brands', 'shoes.id_brand', '=', 'brands.id')
                    ->join('styles', 'shoes.id_style', '=', 'styles.id')
                    ->join('categories', 'shoes.id_category', '=', 'category.id')
                    ->where('shoes.name', 'like', '%'.$query.'%')
                    ->orWhere('brands.name', 'like', '%'.$query.'%')
                    ->orWhere('styles.name', 'like', '%'.$query.'%')
                    ->orWhere('category.name', 'like', '%'.$query.'%')
                    ->get();
          }
          else
          {
            $data = DB::table('shoes')
                    ->orderBy('id', 'desc')
                    ->get();
          }
          $total_row = $data->count();
          if($total_row > 0)
          {
            foreach($datas as $dat)
            {
              $output .= '
              <div class="product-entry border">
                <a href="#" class="prod-img">
                  <img src="#" class="img-fluid" alt="Free html5 bootstrap 4 template">
                </a>
                <div class="desc">
                  <h2><a href="#">{{$data->name}}</a></h2>
                  <span class="price">$139.00</span>
                </div>
              </div>
              ';
            }
          }
          else
          {
            $output = '
            <div class="product-entry border">
              <a href="#" class="prod-img">
                <img src="#" class="img-fluid" alt="Free html5 bootstrap 4 template">
              </a>
              <div class="desc">
                <h2><a href="#">NESSUN PRODOTTO TROVATO</a></h2>
                <span class="price">nnessun prodotto trovato</span>
              </div>
            </div>
            ';
          }
            $data = array('table_data' => $output, 'total_data' => $total_data);

            echo json_encode($data);
            return view('provalog', $data);
          }
            return view('provalog');
        }
    }
