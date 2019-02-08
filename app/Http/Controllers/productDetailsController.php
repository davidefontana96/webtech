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
use Illuminate\Pagination\LengthAwarePaginator;

class productDetailsController extends Controller
{
  public function detailShoe($id, Request $request){
    $shoes = DB::table('shoes')
      ->select('shoes.name', 'shoes.details', 'shoes.sex', 'shoes.id_category','shoes.id_brand','shoes.id_style', 'shoes.id')
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

    $reviews_counter = DB::table('shoes')
      ->join('reviews', 'shoes.id' ,'=', 'reviews.id_shoe')
      ->where('reviews.id_shoe', '=', $id)
      ->count();

    $reviews = DB::table('shoes')
      ->join('reviews', 'shoes.id' ,'=', 'reviews.id_shoe')
      ->join('users', 'reviews.id_user', '=', 'users.id')
      ->select('reviews.text', 'users.name', 'users.surname', 'reviews.created_at', 'reviews.star', 'reviews.id')
      ->where('reviews.id_shoe', '=', $id)
      ->paginate(2);

     $fivestars = DB::table('shoes')
      ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
      ->where([['reviews.id_shoe', '=', $id],
              ['reviews.star', '=', '5'],
              ])
      ->count();

      $fourstars = DB::table('shoes')
       ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
       ->where([['reviews.id_shoe', '=', $id],
               ['reviews.star', '=', '4'],
               ])
       ->count();

       $threestars = DB::table('shoes')
        ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
        ->where([['reviews.id_shoe', '=', $id],
                ['reviews.star', '=', '3'],
                ])
        ->count();

      $twostars = DB::table('shoes')
       ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
       ->where([['reviews.id_shoe', '=', $id],
               ['reviews.star', '=', '2'],
               ])
       ->count();

       $onestars = DB::table('shoes')
        ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
        ->where([['reviews.id_shoe', '=', $id],
                ['reviews.star', '=', '1'],
                ])
        ->count();

        $medium = (($onestars) + ($twostars*2) + ($threestars*3) + ($fourstars*4) + ($fivestars*5))/$reviews_counter;

        if(($reviews_counter!=0) && ($fivestars!=0)){
            $fivepercentage = ($fivestars/$reviews_counter)*100;
          } else { $fivepercentage = 0;}

        if(($reviews_counter!=0) && ($fourstars!=0)){
            $fourpercentage = ($fourstars/$reviews_counter)*100;
          } else { $fourpercentage = 0;}

        if(($reviews_counter!=0) && ($threestars!=0)){
            $threepercentage = ($threestars/$reviews_counter)*100;
            } else { $threepercentage = 0;}

        if(($reviews_counter!=0) && ($twostars!=0)){
            $twopercentage = ($twostars/$reviews_counter)*100;
            } else { $twopercentage = 0;}

        if(($reviews_counter!=0) && ($onestars!=0)){
            $onepercentage = ($onestars/$reviews_counter)*100;
            } else { $onepercentage = 0;}
        $userid = null;
        $user = auth()->user();
        if($user=='')
        {

        } else {
          $userid = $user->id;
        }

        $alreadyReviewed = DB::table('reviews')
                          ->where([['id_user', '=', $userid],
                                  ['id_shoe', '=', $id],])
                          ->count();


        $items = DB::table('carts')
                ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
                ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
                ->select('carts.subtotal', 'shoes.name', 'carts.quantity', 'carts.id')
                ->where('id_user', '=', $userid)
                ->get();

        $itemsInCart = DB::table('carts')
                ->where('id_user', '=', $userid)
                ->count();

        $likedBy = DB::table('likes')
                ->where('id_shoe', '=', $id)
                ->count();

        $alreadyLiked = DB::table('likes')
                      ->where('id_user', '=', $userid)
                      ->where('id_shoe', '=', $id)
                      ->count();

      if ($request->ajax())
      {
        return view( 'reviewview', compact('reviews', 'reviews_counter', 'fivestars', 'fourstars',
                                            'threestars', 'twostars', 'onestars', 'fivepercentage',
                                            'fourpercentage', 'threepercentage', 'twopercentage',
                                            'onepercentage', 'alreadyReviewed'));
      } else

      return view('product-detail', compact('shoes', 'images', 'measures', 'reviews', 'reviews_counter',
                                            'fivestars', 'fourstars', 'threestars', 'twostars', 'onestars',
                                            'fivepercentage', 'fourpercentage', 'threepercentage', 'twopercentage',
                                            'onepercentage', 'alreadyReviewed', 'medium', 'items', 'itemsInCart', 'likedBy', 'alreadyLiked'));
    }

    public function availability(Request $request)
    {
      $numshoe = $request->input('toPass');
      $idShoe = $request->input('idShoe');

      $availability = DB::table('measurements')
                      ->select('element')
                      ->where('size_shoe', '=', $numshoe)
                      ->where('id_shoe', '=', $idShoe)
                      ->pluck('element');

      $price = DB::table('measurements')
                      ->select('price')
                      ->where('size_shoe', '=', $numshoe)
                      ->where('id_shoe', '=', $idShoe)
                      ->pluck('price');

      $toreturn = Array($availability, $price);
      return $toreturn;
    }



    public function review(Request $request)
    {
    $testo = $request->input('testo');
    $stars = $request->input('full');
    $iduser = $request->input('iduser');
    $shoeid = $request->input('idshoe');
    $currdate = date("Y-m-d");


    DB::table('reviews')->insert([
      ['id_user' => $iduser, 'star' => $stars, 'text' => $testo, 'id_shoe' => $shoeid, 'created_at' => $currdate]
    ]);

    $reviews_counter = DB::table('shoes')
      ->join('reviews', 'shoes.id' ,'=', 'reviews.id_shoe')
      ->where('reviews.id_shoe', '=', $shoeid)
      ->count();

    $reviews = DB::table('shoes')
      ->join('reviews', 'shoes.id' ,'=', 'reviews.id_shoe')
      ->join('users', 'reviews.id_user', '=', 'users.id')
      ->select('reviews.text', 'users.name', 'users.surname', 'reviews.created_at', 'reviews.star', 'reviews.id')
      ->where('reviews.id_shoe', '=', $shoeid)
      ->paginate(2);

     $fivestars = DB::table('shoes')
      ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
      ->where([['reviews.id_shoe', '=', $shoeid],
              ['reviews.star', '=', '5'],
              ])
      ->count();

      $fourstars = DB::table('shoes')
       ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
       ->where([['reviews.id_shoe', '=', $shoeid],
               ['reviews.star', '=', '4'],
               ])
       ->count();

       $threestars = DB::table('shoes')
        ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
        ->where([['reviews.id_shoe', '=', $shoeid],
                ['reviews.star', '=', '3'],
                ])
        ->count();

      $twostars = DB::table('shoes')
       ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
       ->where([['reviews.id_shoe', '=', $shoeid],
               ['reviews.star', '=', '2'],
               ])
       ->count();

       $onestars = DB::table('shoes')
        ->join('reviews', 'shoes.id', '=', 'reviews.id_shoe')
        ->where([['reviews.id_shoe', '=', $shoeid],
                ['reviews.star', '=', '1'],
                ])
        ->count();

        if(($reviews_counter!=0) && ($fivestars!=0)){
            $fivepercentage = ($fivestars/$reviews_counter)*100;
          } else { $fivepercentage = 0;}

        if(($reviews_counter!=0) && ($fourstars!=0)){
            $fourpercentage = ($fourstars/$reviews_counter)*100;
          } else { $fourpercentage = 0;}

        if(($reviews_counter!=0) && ($threestars!=0)){
            $threepercentage = ($threestars/$reviews_counter)*100;
            } else { $threepercentage = 0;}

        if(($reviews_counter!=0) && ($twostars!=0)){
            $twopercentage = ($twostars/$reviews_counter)*100;
            } else { $twopercentage = 0;}

        if(($reviews_counter!=0) && ($onestars!=0)){
            $onepercentage = ($onestars/$reviews_counter)*100;
            } else { $onepercentage = 0;}
        $userid = null;
        $user = auth()->user();
        if($user=='')
        {

        } else {
          $userid = $user->id;
        }

        $alreadyReviewed = DB::table('reviews')
                          ->where([['id_user', '=', $userid],
                                  ['id_shoe', '=', $shoeid],])
                          ->count();


        $name = DB::table('users')
                ->select('name')
                ->where('id', '=', $iduser)
                ->pluck('name');

        $surname = DB::table('users')
                ->select('surname')
                ->where('id', '=', $iduser)
                ->pluck('surname');




        return view( 'reviewview', compact('reviews', 'reviews_counter', 'fivestars', 'fourstars',
                                            'threestars', 'twostars', 'onestars', 'fivepercentage',
                                            'fourpercentage', 'threepercentage', 'twopercentage',
                                            'onepercentage', 'alreadyReviewed'));

    }

    public function addCart(Request $request)
    {
      $size = (int)$request->input('size');
      $quantity = (int)$request->input('quantity');
      $idshoe = (int)$request->input('idshoe');
      $iduser = (int)$request->input('iduser');
      $currdate = date("Y-m-d");

      $nameShoe = DB::table('shoes')
                ->select('name')
                ->where('id', '=', $idshoe)
                ->pluck('name');


      $price = DB::table('measurements')
              ->select('price')
              ->where('size_shoe', '=', $size)
              ->where('id_shoe', '=', $idshoe)
              ->pluck('price');

      $idmeasure = DB::table('measurements')
              ->select('id')
              ->where('size_shoe', '=', $size)
              ->where('id_shoe', '=', $idshoe)
              ->pluck('id');


      $currDisp = DB::table('measurements')
                ->select('element')
                ->where('id', '=', $idmeasure[0])
                ->pluck('element');

      $price1 = $price[0];

      $subtotal = $price1 * $quantity;

      $dispAfterCartAdd = $currDisp[0] - $quantity;

      DB::table('carts')->insert([
        ['id_user' => $iduser, 'id_measure' => $idmeasure[0], 'price' => $price1,  'quantity' => $quantity, 'subtotal' => $subtotal]
      ]);


      DB::table('measurements')
          ->where('id', '=', $idmeasure[0])
          ->update(['element' => $dispAfterCartAdd]);

      $idcarts = DB::table('carts')
      ->select('id')
      ->where('id_user', '=', $iduser)
      ->where('id_measure', '=', $idmeasure[0])
      ->where('price', '=', $price1)
      ->where('quantity', '=', $quantity)
      ->where('subtotal', '=', $subtotal)
      ->pluck('id');

      $items = DB::table('carts')
              ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
              ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
              ->select('carts.subtotal', 'shoes.name', 'carts.quantity', 'carts.id')
              ->where('id_user', '=', $iduser)
              ->get();

      $itemsInCart = DB::table('carts')
              ->where('id_user', '=', $iduser)
              ->count();

      $toreturn = Array($quantity, $price1, $size, $subtotal, $nameShoe,$idcarts);

      return view('cartviews', compact('items', 'itemsInCart','dispAfterCartAdd'));
    }

    public function removeFromCart(Request $request)
    {
      $idcart = $request->input('idtopass');
      $iduser = (int)$request->input('iduser');

      $idmeasure = DB::table('carts')
                      ->select('id_measure')
                      ->where('id', '=', $idcart)
                      ->pluck('id_measure');

      $quantity = DB::table('carts')
                      ->select('quantity')
                      ->where('id', '=', $idcart)
                      ->pluck('quantity');

      $takecurrquantity = DB::table('measurements')
                      ->select('element')
                      ->where('id', '=', $idmeasure[0])
                      ->pluck('element');



      $torefresh = $takecurrquantity[0] + $quantity[0];

      DB::table('measurements')->where('id', '=', $idmeasure[0])->update(['element' => $torefresh]);

      DB::table('carts')->where('id', '=', $idcart)->delete();

      $items = DB::table('carts')
              ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
              ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
              ->select('carts.subtotal', 'shoes.name', 'carts.quantity', 'carts.id')
              ->where('id_user', '=', $iduser)
              ->get();

      $itemsInCart = DB::table('carts')
              ->where('id_user', '=', $iduser)
              ->count();

      return view('cartviews', compact('items', 'itemsInCart'));
    }

    public function addLike(Request $request)
    {
        $iduser = $request->input('iduser');
        $idshoe = $request->input('idshoe');
        $currdate = date("Y-m-d");

        $alreadyLiked = DB::table('likes')
                      ->where('id_user', '=', $iduser)
                      ->where('id_shoe', '=', $idshoe)
                      ->count();


        if($alreadyLiked == 1)
        {

          $likedBy = DB::table('likes')
                      ->where('id_shoe', '=', $idshoe)
                      ->count();

          return view('likeview', compact('likedBy', 'alreadyLiked'));

        }
        else
        {
            DB::table('likes')->insert([
              ['created_at' => $currdate,  'id_shoe' => $idshoe, 'id_user' => $iduser ]
              ]);

            $likedBy = DB::table('likes')
                        ->where('id_shoe', '=', $idshoe)
                        ->count();

            return view('likeview', compact('likedBy', 'alreadyLiked'));
        }
    }

    public function removeLike(Request $request)
    {
        $iduser = $request->input('iduser');
        $idshoe = $request->input('idshoe');

        DB::table('likes')
          ->where('id_shoe', '=', $idshoe)
          ->where('id_user', '=', $iduser)
          ->delete();

        $likedBy = DB::table('likes')
                    ->where('id_shoe', '=', $idshoe)
                    ->count();

        $alreadyLiked = DB::table('likes')
                      ->where('id_user', '=', $iduser)
                      ->where('id_shoe', '=', $idshoe)
                      ->count();

        return view('likeview', compact('likedBy', 'alreadyLiked'));
      }

}
