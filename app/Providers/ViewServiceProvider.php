<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Cart;
use Illuminate\Support\Facades\Session;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        View::composer('*', function ($view) {
            $sessionId = Session::getId();

            // Подгружаем связанные товары (goods) через Eager Loading
            $items = Cart::with('good')->where('session_id', $sessionId)->get();

            $totalQuantity = $items->sum('quantity');

            $totalAmount = $items->sum(function ($item) {
				if($item->discount > 0) return $item->quantity * optional($item->good)->price * (1 - $item->discount / 100);
				else 					return $item->quantity * optional($item->good)->price;
            });

            $view->with('cartTotalQuantity', $totalQuantity);
            $view->with('cartTotalAmount', $totalAmount);
        });
    }
}
