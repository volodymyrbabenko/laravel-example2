<x-main-layout>
	<x-slot name="title">Поиск: {{ $search_query }}</x-slot>
	<x-slot name="description">Поиск {{ $search_query }}</x-slot>
	<x-slot name="keywords">поиск, поиск {{ mb_strtolower($search_query) }}</x-slot>

	<x-slot name="sort">
	</x-slot>

	<x-slot name="main_part">
		<div id="search_result">
			<h2>Результаты поиска: {{ $search_query }}</h2>
			<table>
				<tr>
					<td rowspan="2">
						<div class="header">
							<h3>Поиск</h3>
						</div>
					</td>
					<td class="section_bg"></td>
					<td class="section_right"></td>
				</tr>
			</table>		
			<table class="products">
				@if (!count($posts))
					<div id="other">
						<div id="pm">
							<p>Ничего не найдено!</p>
							<p>
								<a href="{{ route('index') }}">Вернуться на главную</a>
							</p>
						</div>
					</div>
				@else
					<tr>
						@foreach ($posts as $good)
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
						@endforeach
					</tr>
				@endif
			</table>	
		</div>
		<div class="clear"></div>
	</x-slot>

</x-main-layout>