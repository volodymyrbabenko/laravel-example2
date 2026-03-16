<x-main-layout>
	<x-slot name="title">Интернет-магазин по продаже дисков</x-slot>
	<x-slot name="description">Интернет-магазин по продаже DVD-дисков.</x-slot>
	<x-slot name="keywords">интернет магазин, интернет магазин dvd, интернет магазин dvd диски</x-slot>

	<x-slot name="sort">
		<table>
			<tr>
				<td rowspan="2">
					<div class="header">
						<h3>Новинки</h3>
					</div>
				</td>
				<td class="section_bg"></td>
				<td class="section_right"></td>
			</tr>
			<tr>
				<td colspan="2">
					<table class="sort">
						<tr>
							<td>Сортировать по:</td>
							<td>цене (<a href="{{ route('sort', ['type' => 'price', 'up' => 1]) }}">возр.</a> | <a href="{{ route('sort', ['type' => 'price', 'up' => 0]) }}">убыв.</a>)
							<td>названию (<a href="{{ route('sort', ['type' => 'name', 'up' => 1]) }}">возр.</a> | <a href="{{ route('sort', ['type' => 'name', 'up' => 0]) }}">убыв.</a>)
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</x-slot>

	<x-slot name="main_part">
		@if (session('success'))
			<script>
				alert("{{ session('success') }}");
			</script>
		@endif

		<table class="products">
			<tr>
				@foreach ($goods as $index => $good)
					<td>
						<div class="intro_product">
							<p class="img">
								<img src="{{ asset('images/products/' . $good->alias . '.jpg') }}" alt="{{ $good->title }}" />
							</p>
							<p class="title">
								<a href="{{ route('good', ['alias' => $good->alias]) }}">{{ $good->title }}</a>
							</p>
							<p class="price">{{ $good->price }} Euro</p>
							<p>
								<!-- <a class="link_cart" href="add_to_cart"></a> -->
								<a class="link_cart" href="{{ route('add_to_cart', ['id' => $good->id]) }}"></a>
							</p>
						</div>
					</td>

					@if (($index + 1) % 4 == 0)
						</tr><tr>
					@endif
				@endforeach
			</tr>
		</table>
		{{ $goods->links('pagination') }}
	</x-slot>

</x-main-layout>