<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Goods;
use App\Models\Cart;
use App\Models\Coupons;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class MainController extends Controller
{
    public function index() {
		$goods = Goods::orderByDesc('id')->paginate(env('USER_COUNT_ON_PAGE')); //фильмы
		// $goods = Goods->orderByDesc('created_at')->get();
		// $comments = DB::table('comments')->get();
		// $goods = Goods::table('comments')->orderBy('created_at')->get();
			// ->paginate(env('USER_COUNT_ON_PAGE'));
		return view('index', ['goods' => $goods]);
	}

	public function sort($type, $up) {
		// echo "type: " . $type . "<br />";
		// echo "up: " . $up . "<br />";
		// return 15;
		
		if($type == 'price' AND $up == 1) $goods = Goods::orderBy('price')->paginate(env('USER_COUNT_ON_PAGE'));
		else if($type == 'price' AND $up == 0) $goods = Goods::orderByDesc('price')->paginate(env('USER_COUNT_ON_PAGE'));
		else if($type == 'name' AND $up == 1) $goods = Goods::orderBy('title')->paginate(env('USER_COUNT_ON_PAGE'));
		else if($type == 'name' AND $up == 0) $goods = Goods::orderByDesc('title')->paginate(env('USER_COUNT_ON_PAGE'));

		return view('index', ['goods' => $goods]);
	}

	public function delivery() {
		return view('delivery');
	}

	public function contacts() {
		return view('contacts');
	}

	public function show($name)
	{
		//в таблице genres найти id жанра по названию
		// echo "name: " . $name . "<br />";
		$genre = DB::table('genres')->where('title', $name)->first();
		// print_r($genre_row); echo "<br />";
		// echo "id_genre: " . $genre->id . "<br />";

		$goods = Goods::orderByDesc('id')->where('genre_id', $genre->id)->paginate(env('USER_COUNT_ON_PAGE')); //фильмы
		// print_r($goods);
		return view('section', ['goods' => $goods, 'genre' => $genre]);
	}

	public function sortSection($type, $up, $name) {
		$genre = DB::table('genres')->where('title', $name)->first();

		if($type == 'price' AND $up == 1) 		$goods = Goods::orderBy('price')->where('genre_id', $genre->id)->paginate(env('USER_COUNT_ON_PAGE'));
		else if($type == 'price' AND $up == 0) 	$goods = Goods::orderByDesc('price')->where('genre_id', $genre->id)->paginate(env('USER_COUNT_ON_PAGE'));
		else if($type == 'name' AND $up == 1) 	$goods = Goods::orderBy('title')->where('genre_id', $genre->id)->paginate(env('USER_COUNT_ON_PAGE'));
		else if($type == 'name' AND $up == 0) 	$goods = Goods::orderByDesc('title')->where('genre_id', $genre->id)->paginate(env('USER_COUNT_ON_PAGE'));

		return view('section', ['goods' => $goods, 'genre' => $genre]);
	}

	public function addToCart($id) {
		$cart_before = DB::table('carts')
			->where('session_id',  Session::getId())
			->where('good_id', $id)->get();

		$cart = new Cart();

		if($cart_before->isEmpty()) {	
			$cart->good_id = $id;
			$cart->quantity = 1;
			$cart->discount = 0;
			$cart->session_id = Session::getId();
			$cart->save();
		}
		else {
			$existingCart = $cart_before->first();
			// print_r($existingCart);
			$newQuantity = $existingCart->quantity + 1;
			// echo "newQuantity: " . $newQuantity . "<br />";
			DB::table('carts')->where('id', $existingCart->id)->update(['quantity' => $newQuantity]);
		}

		// return "id: " . $id;
		// return back();
		return back()->with('success', 'Товар успешно добавлен в корзину!');
	}

	public function cart() {
		// $carts = Cart::where('session_id', Session::getId())->get();
		$carts = Cart::with('good')->where('session_id', Session::getId())->get();
		// print_r($carts);

		return view('cart', ['carts' => $carts]);
	}

	public function cartDelete($id) {
		Cart::find($id)->delete();

		// return "id: " . $id;
		return back()->with('success', 'Товар успешно удален из корзины!');
	}

	public function updateCart(Request $request) {
		if ($request->has('cart_discount')) {
			// echo "coupon_code: " . $request->coupon_code . "<br />";
			$check_coupon = Coupons::where('coupon_code', $request->coupon_code)->first();
			// print_r($check_coupon);
			// echo "was_used: " . $check_coupon->was_used . "<br />";
			// echo "discount: " . $check_coupon->percents . "<br />";
			if(isset($check_coupon->was_used) && $check_coupon->was_used == 0) {
				// echo "true" . "<br />";
				Cart::where('session_id', Session::getId())->update(['discount' => $check_coupon->percents]);
				Coupons::where('coupon_code', $request->coupon_code)->update(['was_used' => 1]);
			}
			elseif(isset($check_coupon->was_used) && $check_coupon->was_used == 1) {
				// echo "was_used: " . $check_coupon->was_used . "<br />";
				return back()->with('success', 'Купон был использован ранее! Повторное использование невозможно');
			}
			elseif(!isset($check_coupon->was_used)) {
				// echo "was_used: " . $check_coupon->was_used . "<br />";
				return back()->with('success', 'Купон с данным кодом не найден!');
			}
		} 
		elseif ($request->has('recalc')) {
			// Пересчёт количества
			foreach ($request->all() as $key => $value) {
				if (str_starts_with($key, 'count_')) {
					$cartId = (int)str_replace('count_', '', $key);
					$quantity = (int)$value;
					// echo "quantity: " . $quantity . "<br />";
					if($quantity < 0) $quantity = 1;
					// $quantity = max(0, (int)$value);

					if($quantity != 0) {
						$cart = Cart::find($cartId);
						if ($cart) {
							$cart->quantity = $quantity;
							$cart->save();
						}
					}
					else Cart::find($cartId)->delete();
				}
			}
		} 
		// elseif ($request->has('checkout')) {
			// Переход к оформлению заказа
			// echo "true" . "<br />";
		// }

		return redirect()->route('cart');
	}

	public function checkout(Request $request) {
		// dd($request->all());
		if($request->order) {
			$validated = $request->validate([
				'name' => 'required|min:5|max:255',
				'phone' => ['required', 'regex:/^\+?[0-9]{10,15}$/'],
				'email' => 'required|email|min:6',
				'delivery' => 'required',
				'address' => 'required|min:10|max:1000',
				'notice' => '',
				'g-recaptcha-response' => 'required|captcha', //капча
			]);
			$order = new Order();
			$order->session_id = Session::getId();
			$order->customer_name = $validated['name'];
			$order->customer_email = $validated['email'];
			$order->customer_phone = $validated['phone'];
			$order->delivery_type = $validated['delivery'];
			$order->address = $validated['address'];
			$order->note = $validated['notice'];
			
			$order->save();
			$request->session()->regenerate();

			return redirect()->route('addorder');
		}
		else return view('checkout');
	}

	public function addOrderView() {
		return view('addorder');
	}

	public function good($alias) {
		$good = Goods::where('alias', $alias)->first();

		if (!$good) {
			abort(404);
		}

		$products_that_are_also_ordered = Goods::where('genre_id', $good->genre_id)
			->limit(env('PRODUCTS_THAT_ARE_ALSO_ORDERED'))->get();

		return view('good', [
			'good' => $good,
			'products_that_are_also_ordered' => $products_that_are_also_ordered
		]);
	}

	public function search(Request $request) {
		if($request->search_query) {
			$validated = $request->validate([
				'search_query' => 'required|string|min:3|max:200'
			]);
			$search_query = $validated['search_query'];
			$posts = Goods::where('title', 'LIKE', "%$search_query%")
				->orWhere('description', 'LIKE', "%$search_query%")
				->orWhere('price', 'LIKE', "%$search_query%")
				->paginate(4);
		}
		else return redirect()->route('index');
		return view('search', ['search_query' => $search_query, 'posts' => $posts]);
	}
}
