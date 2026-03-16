<x-main-layout>
	<x-slot name="title">Корзина</x-slot>
	<x-slot name="description">Содержимое корзины</x-slot>
	<x-slot name="keywords">корзина, содержимое корзины</x-slot>

	<x-slot name="sort">
	</x-slot>

	<x-slot name="main_part">
		@if (session('success'))
			<script>
				alert("{{ session('success') }}");
			</script>
		@endif

		<div id="cart">
			<h2>Корзина</h2>
			<form name="cart" action="{{ url()->current() }}" method="post">
				@csrf
				<table>
					<tr>
						<td colspan="8" id="cart_top"></td>
					</tr>
					<tr>
						<td class="cart_left"></td>
						<td colspan="2">Товар</td>
						<td>Цена за 1 шт.</td>
						<td>Количество</td>
						<td>Стоимость</td>
						<td></td>
						<td class="cart_right"></td>
					</tr>
					
					@foreach ($carts as $cart)
						<tr>
							<td class="cart_left"></td>
							<td colspan="6">
								<hr />
							</td>
							<td class="cart_right"></td>
						</tr>
						<tr class="cart_row">
							<td class="cart_left"></td>
							<td class="img">
								<img src="images/products/{{ $cart->good->alias }}.jpg" alt="{{ $cart->good->title }}" />
							</td>
							<td class="title">{{ $cart->good->title }}</td>
							<td>
							    @if($cart->discount > 0)
									{{ $cart->good->price * (1 - $cart->discount / 100) }} €
									<small>(скидка {{ $cart->discount }}%)</small>
								@else
									{{ $cart->good->price }} €
								@endif
								{{-- $cart->good->price € --}} 
							</td>
							<td>
								<table class="count">
									<tr>
										<td>
											<input type="number" name="count_{{ $cart->id }}" value="{{ $cart->quantity }}" />
										</td>
										<td>шт.</td>
									</tr>
								</table>
							</td>
							<td class="bold">
							    @if($cart->discount > 0)
									{{ $cart->good->price * $cart->quantity * (1 - $cart->discount / 100) }} €
								@else
									{{ $cart->good->price * $cart->quantity }} €
								@endif
								{{-- $cart->good->price * $cart->quantity € --}} 
							</td>
							<td>
								<a href="{{ route('cart_delete', ['id' => $cart->id]) }}" class="link_delete">x удалить</a>
							</td>
							<td class="cart_right"></td>
						</tr>
					@endforeach

					<tr id="discount">
						<td class="cart_left"></td>
						<td colspan="6">
							<!-- <form name="discount" action="cart.html" method="post"> -->
								<table>
									<tr>
										<td>Введите номер купона со скидкой<br /><span>(если есть)</span></td>
										<td>
											<input type="text" name="coupon_code" value="" />
										</td>
										<td>
											<button type="submit" name="cart_discount" style="background: none; border: none; padding: 0;">
												<img src="{{ asset('images/cart_discount.png') }}" alt="Получить скидку"/>
											</button>
										</td>
									</tr>
								</table>
							<!--</form>-->
						</td>
						<td class="cart_right"></td>
					</tr>
					<tr id="summa">
						<td class="cart_left"></td>
						<td colspan="6">
							<p>Итого : <span>{{ $cartTotalAmount }} €</span></p>
						</td>
						<td class="cart_right"></td>
					</tr>
					<tr>
						<td class="cart_left"></td>
						<td colspan="2">
							<div class="left">
								<button type="submit" name="recalc" style="background: none; border: none; padding: 0;">
									<img src="{{ asset('images/cart_recalc.png') }}" alt="Пересчитать"/>
								</button>
							</div>
						</td>
						<td colspan="4">
							<div class="right">
								<input type="hidden" name="func" value="cart" />
								<a href="{{ route('checkout') }}">
									<img src="images/cart_order.png" alt="Оформить заказ" onmouseover="this.src='images/cart_order_active.png'" onmouseout="this.src='images/cart_order.png'" />
								</a>
							</div>
						</td>
						<td class="cart_right"></td>
					</tr>
					<tr>
						<td colspan="8" id="cart_bottom"></td>
					</tr>
				</table>
			</form>
		</div>

		<div class="clear"></div>
	</x-slot>

</x-main-layout>