<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title><?php echo e($title); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content="<?php echo e($description); ?>" />
	<meta name="keywords" content="<?php echo e($keywords); ?>" />
	<link rel="stylesheet" href="styles/main.css" type="text/css" />
	<script type="text/javascript" src="js/functions.js"></script>
	<link href="favicon.ico" rel="shortcut icon" type="image/x-icon" />
	<link rel="stylesheet" href="<?php echo e(asset('styles/main.css')); ?>" type="text/css" />
	<script type="text/javascript" src="<?php echo e(asset('js/functions.js')); ?>"></script>
	<link href="<?php echo e(asset('favicon.ico')); ?>" rel="shortcut icon" type="image/x-icon" />
</head>
<body>
	<div id="container">
		<div id="header">
			<img src="<?php echo e(asset('images/header.png')); ?>" alt="Шапка" />
			<div>
				<p class="red">8-800-123-45-67</p>
				<p class="blue">Время работы с 09:00 до 21:00<br />без перерыва и выходных</p>
			</div>
			<div class="cart">
				<p class="cart_title">Корзина</p>
				<p class="blue">Текущий заказ</p>
				<p>В корзине <span><?php echo e($cartTotalQuantity); ?></span> товаров<br />на сумму <span><?php echo e($cartTotalAmount); ?></span> €</p>
				<a href="<?php echo e(route('cart')); ?>">Перейти в корзину</a>
			</div>
		</div>
		<div id="topmenu">
			<ul>
				<li>
					<a href="<?php echo e(route('index')); ?>">ГЛАВНАЯ</a>
				</li>
				<li>
					<img src="<?php echo e(asset('images/topmenu_border.png')); ?>" alt="" />
				</li>
				<li>
					<a href="<?php echo e(route('delivery')); ?>">ОПЛАТА И ДОСТАВКА</a>
				</li>
				<li>
					<img src="<?php echo e(asset('images/topmenu_border.png')); ?>" alt="" />
				</li>
				<li>
					<a href="<?php echo e(route('contacts')); ?>">КОНТАКТЫ</a>
				</li>
			</ul>
			<div id="search">
				<form name="search" method="get" action="<?php echo e(route('search')); ?>">
					<?php echo csrf_field(); ?>
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
						<?php $__currentLoopData = $genres; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<p>
								<a href="<?php echo e(route('genre.show', ['name' => $genre->title])); ?>"><?php echo e($genre->title); ?></a>
							</p>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
					<div class="bottom"></div>
				</div>
			</div>
			<div id="right">
				<?php echo e($sort); ?>

				<?php echo e($main_part); ?>				
			</div>
			<div class="clear"></div>
			<div id="footer">
				<div id="pm">
					<table>
						<tr>
							<td>Способы оплаты:</td>
							<td>
								<img src="<?php echo e(asset('images/pm.png')); ?>" alt="Способы оплаты" />
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
</html><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/layouts/main-layout.blade.php ENDPATH**/ ?>