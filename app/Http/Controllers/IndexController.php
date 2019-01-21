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
