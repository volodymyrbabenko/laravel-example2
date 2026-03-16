<x-main-layout>
	<x-slot name="title">Страница не найдена - 404</x-slot>
	<x-slot name="description">Запрошенная страница не существует</x-slot>
	<x-slot name="keywords">404, страница не найдена, страница не существует</x-slot>

	<x-slot name="sort">
	</x-slot>

	<x-slot name="main_part">
		<div id="message">
			<h2>Страница не найдена</h2>
			<p>К сожалению, запрошенная страница не существует. <br /> Проверьте, правильность введенного адреса</p>
			<p>
				<a href="{{ route('index') }}">Вернуться на главную страницу</a>
			</p>
		</div>

		<div class="clear"></div>
	</x-slot>

</x-main-layout>