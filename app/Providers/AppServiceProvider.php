<?php

namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      view()->composer(
        ['about', 'add-to-wishlist', 'cart', 'checkout', 'contact', 'historicalpurchase', 'index', 'index2', 'men', 'newsDetail', 'newsIndex', 'order-complete', 'product-detail', 'userProfile', 'women'],
       function ($view)
          {
            $items = DB::table('carts')
                    ->join('measurements', 'measurements.id', '=', 'carts.id_measure')
                    ->join('shoes', 'shoes.id', '=', 'measurements.id_shoe')
                    ->join('images', 'images.id_shoe', '=', 'shoes.id')
                    ->select('carts.subtotal','carts.price', 'shoes.name', 'carts.quantity', 'carts.id', 'images.path')
                    ->groupby('measurements.id', 'images.id_shoe')
                    ->where('carts.id_user', '=', Auth::id())
                    ->where('carts.purchased', '=', 0)
                    ->get();

                    $itemsInCart = DB::table('carts')
                            ->where('id_user', '=', Auth::id())
                            ->where('purchased', '=', 0)
                            ->count();
              //...with this variable
              $view->with('items', $items );
              $view->with('itemsInCart', $itemsInCart );

          });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
    }
}
