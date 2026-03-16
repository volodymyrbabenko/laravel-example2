<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>{{ $title }}</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="{{ $description }}" />
	<meta name="keywords" content="{{ $keywords }}" />
	<link rel="stylesheet" href="styles/main.css" type="text/css" />
	<script type="text/javascript" src="js/functions.js"></script>
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="{{ asset('styles/main.css') }}" type="text/css" />
	<script type="text/javascript" src="{{ asset('js/functions.js') }}"></script>
	<link href="{{ asset('favicon.ico') }}" rel="shortcut icon" type="image/x-icon" />
</head>
<body>
	<div id="container">
		<div id="header">
			<img src="{{ asset('images/header.png') }}" alt="Шапка" />
			<div>
				<p class="red">8-800-123-45-67</p>
				<p class="blue">Время работы с 09:00 до 21:00<br />без перерыва и выходных</p>
			</div>
			<div class="cart">
				<p class="cart_title">Корзина</p>
				<p class="blue">Текущий заказ</p>
				<p>В корзине <span>{{ $cartTotalQuantity }}</span> товаров<br />на сумму <span>{{ $cartTotalAmount }}</span> €</p>
				<a href="{{ route('cart') }}">Перейти в корзину</a>
			</div>
		</div>
		<div id="topmenu">
			<ul>
				<li>
					<a href="{{ route('index') }}">ГЛАВНАЯ</a>
				</li>
				<li>
					<img src="{{ asset('images/topmenu_border.png') }}" alt="" />
				</li>
				<li>
					<a href="{{ route('delivery') }}">ОПЛАТА И ДОСТАВКА</a>
				</li>
				<li>
					<img src="{{ asset('images/topmenu_border.png') }}" alt="" />
				</li>
				<li>
					<a href="{{ route('contacts') }}">КОНТАКТЫ</a>
				</li>
			</ul>
			<div id="search">
				<form name="search" method="get" action="{{ route('search') }}">
					@csrf
					<table>
						<tr>
							<td class="input_left"></td>
							<td>
								<input type="text" name="search_query" placeholder="Поиск" />
							</td>
							<td class="input_right"></td>
						</tr>
					</table>
				</form>
			</div>
		</div>
		<div id="content">
			<div id="left">
				<div id="menu">
					<div class="header">
						<h3>Разделы</h3>
					</div>
					<div id="items">
						@foreach ($genres as $genre)
							<p>
								<a href="{{ route('genre.show', ['name' => $genre->title]) }}">{{ $genre->title }}</a>
							</p>
						@endforeach
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div id="right">
				{{ $sort }}
				{{ $main_part }}				
			</div>
			<div class="clear"></div>
			<div id="footer">
				<div id="pm">
					<table>
						<tr>
							<td>Способы оплаты:</td>
							<td>
								<img src="{{ asset('images/pm.png') }}" alt="Способы оплаты" />
							</td>
						</tr>
					</table>
				</div>
				<div id="copy">
					<p>Copyright &copy; website.eu. Все права защищены.</p>
				</div>
			</div>
		</div>
	</div>
</body>
</html>