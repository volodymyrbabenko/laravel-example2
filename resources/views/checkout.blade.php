<x-main-layout>
	<x-slot name="title">Оформление заказа</x-slot>
	<x-slot name="description">Оформление заказа на покупку фильмов.</x-slot>
	<x-slot name="keywords">заказ, оформление заказа, оформление заказа фильмы</x-slot>

	<x-slot name="sort">
	</x-slot>

	<x-slot name="main_part">
		<div id="order">
			<h2>Оформление заказа</h2>

			@if($errors->any())
				@foreach ($errors->all() as $message)
					<p class="message">{{ $message }}</p>
				@endforeach
			@endif

			<form name="order" action="{{ url()->current() }}" method="post">
				@csrf
				<table>
					<tr>
						<td class="w120">ФИО*:</td>
						<td>
							<input type="text" name="name" value="{{ old('name') }}"  />
						</td>
					</tr>
					<tr>
						<td>Телефон*:</td>
						<td>
							<input type="text" name="phone" value="{{ old('phone') }}"  />
						</td>
					</tr>
					<tr>
						<td>E-mail*:</td>
						<td>
							<input type="text" name="email" value="{{ old('email') }}"  />
						</td>
					</tr>
					<tr>
						<td>Доставка*:</td>
						<td>
							<select name="delivery" >
								<option value="Доставка" @selected(old('delivery') == 'Доставка')>Доставка</option>
								<option value="Самовывоз" @selected(old('delivery') == 'Самовывоз')>Самовывоз</option>
							</select>
						</td>
					</tr>
				</table>
				<table>
					<tr id="address">
						<td>
							<p>Полный адрес (Страна, город, индекс, улица, дом, квартира)*:</p>
							<textarea name="address" cols="80" rows="6" >{{ old('address') }}</textarea>
						</td>
					</tr>
					<tr>
						<td>
							<p>Примечание к заказу:</p>
							<textarea name="notice" cols="80" rows="6">{{ old('notice') }}</textarea>
						</td>
					</tr>
					<tr>
						<td>
							{!! NoCaptcha::display() !!}
							@if ($errors->has('g-recaptcha-response'))
								<span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
							@endif
						<td>
					</tr>
					<tr>
						<td class="button">
							<button type="submit" name="order" value="Закончить оформление заказа" style="background: none; border: none; padding: 0;">
								<img src="{{ asset('images/order_end.png') }}" alt="Закончить оформление заказа" />
							</button>
						</td>
					</tr>
				</table>
			</form>
			{!! NoCaptcha::renderJs() !!}
		</div>

		<div class="clear"></div>
	</x-slot>

</x-main-layout>