<x-main-layout>
	<x-slot name="title">{{ $good->title }}</x-slot>
	<x-slot name="description">Описание и покупка фильма {{ $good->title }}</x-slot>
	<x-slot name="keywords">описание фильм {{ $good->title }}, купить фильм {{ $good->title }}</x-slot>

	<x-slot name="sort">
	</x-slot>

	<x-slot name="main_part">
		<table id="hornav">
			<tr>
				<td>
					<a href="index.html">Главная</a>
				</td>
				<td>
					<img src="/images/hornav_arrow.png" alt="" />
				</td>
				<td>
					<a href="{{ route('genre.show', ['name' => $good->genre->title ]) }}">{{ $good->genre->title }}</a>
				</td>
				<td>
					<img src="/images/hornav_arrow.png" alt="" />
				</td>
				<td>{{ $good->title }}</td>
			</tr>
		</table>

		<table id="product">
			<tr>
				<td class="product_img">
					<img src="{{ asset('images/products/' . $good->alias . '.jpg') }}" alt="{{ $good->title }}" />
				</td>
				<td class="product_desc">
					<p>Название: <span class="title">{{ $good->title }}</span></p>
					<p>Год выхода: <span>{{ $good->year }}</span></p>
					<p>Жанр: <span>{{ $good->genre->title }}</span></p>
					<p>Страна-производитель: <span>{{ $good->country }}</span></p>
					<p>Режиссёр: <span>{{ $good->director }}</span></p>
					<p>Продолжительность: <span>{{ $good->duration }}</span></p>
					<p>В ролях: <span>{{ $good->starring }}</span></p>
					<table>
						<tr>
							<td>
								<p class="price">{{ $good->price }} €</p>
							</td>
							<td>
								<p>
									<a class="link_cart" href="{{ route('add_to_cart', ['id' => $good->id]) }}"></a>
								</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p class="desc_title">Описание:</p>
					<p class="desc">{{ $good->description }}</p>
				</td>
			</tr>
		</table>

		<div id="others">
			<h3>С этим товаром также заказывают:</h3>
			<table class="products">
				<tr>
					@foreach ($products_that_are_also_ordered as $related_good)
						@if (is_string($related_good->alias) && strlen($related_good->alias) > 0)
							<td>
								<div class="intro_product">
									<p class="img">
										<img src="{{ asset('images/products/' . $related_good->alias . '.jpg') }}" alt="{{ $related_good->title }}" />
									</p>
									<p class="title">
										<a href="{{ route('good', ['alias' => $related_good->alias]) }}">{{ $related_good->title }}</a>
									</p>
									<p class="price">{{ $related_good->price }} Euro</p>
									<p>
										<a class="link_cart" href="{{ route('add_to_cart', ['id' => $related_good->id]) }}"></a>
									</p>
								</div>
							</td>
						@endif
					@endforeach
				</tr>
			</table>
		</div>
		<div class="clear"></div>
	</x-slot>

</x-main-layout>