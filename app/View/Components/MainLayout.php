<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Genres;
use App\Models\Goods;


class MainLayout extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
		$genres = Genres::orderByDesc('id')->limit(5)->get(); //жанры
		// $goods = Goods::orderByDesc('id')->limit(10)->get(); //фильмы
        // return view('layouts.main-layout', ['genres' => $genres, 'goods' => $goods]);
        return view('layouts.main-layout', ['genres' => $genres]);
    }
}
