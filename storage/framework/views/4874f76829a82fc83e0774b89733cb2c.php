<?php if (isset($component)) { $__componentOriginal66d7cfd03cd343304d81fe1e21646540 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal66d7cfd03cd343304d81fe1e21646540 = $attributes; } ?>
<?php $component = App\View\Components\MainLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('main-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\MainLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
	 <?php $__env->slot('title', null, []); ?> Корзина <?php $__env->endSlot(); ?>
	 <?php $__env->slot('description', null, []); ?> Содержимое корзины <?php $__env->endSlot(); ?>
	 <?php $__env->slot('keywords', null, []); ?> корзина, содержимое корзины <?php $__env->endSlot(); ?>

	 <?php $__env->slot('sort', null, []); ?> 
	 <?php $__env->endSlot(); ?>

	 <?php $__env->slot('main_part', null, []); ?> 
		<?php if(session('success')): ?>
			<script>
				alert("<?php echo e(session('success')); ?>");
			</script>
		<?php endif; ?>

		<div id="cart">
			<h2>Корзина</h2>
			<form name="cart" action="<?php echo e(url()->current()); ?>" method="post">
				<?php echo csrf_field(); ?>
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
					
					<?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
								<img src="images/products/<?php echo e($cart->good->alias); ?>.jpg" alt="<?php echo e($cart->good->title); ?>" />
							</td>
							<td class="title"><?php echo e($cart->good->title); ?></td>
							<td>
							    <?php if($cart->discount > 0): ?>
									<?php echo e($cart->good->price * (1 - $cart->discount / 100)); ?> €
									<small>(скидка <?php echo e($cart->discount); ?>%)</small>
								<?php else: ?>
									<?php echo e($cart->good->price); ?> €
								<?php endif; ?>
								 
							</td>
							<td>
								<table class="count">
									<tr>
										<td>
											<input type="number" name="count_<?php echo e($cart->id); ?>" value="<?php echo e($cart->quantity); ?>" />
										</td>
										<td>шт.</td>
									</tr>
								</table>
							</td>
							<td class="bold">
							    <?php if($cart->discount > 0): ?>
									<?php echo e($cart->good->price * $cart->quantity * (1 - $cart->discount / 100)); ?> €
								<?php else: ?>
									<?php echo e($cart->good->price * $cart->quantity); ?> €
								<?php endif; ?>
								 
							</td>
							<td>
								<a href="<?php echo e(route('cart_delete', ['id' => $cart->id])); ?>" class="link_delete">x удалить</a>
							</td>
							<td class="cart_right"></td>
						</tr>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
												<img src="<?php echo e(asset('images/cart_discount.png')); ?>" alt="Получить скидку"/>
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
							<p>Итого : <span><?php echo e($cartTotalAmount); ?> €</span></p>
						</td>
						<td class="cart_right"></td>
					</tr>
					<tr>
						<td class="cart_left"></td>
						<td colspan="2">
							<div class="left">
								<button type="submit" name="recalc" style="background: none; border: none; padding: 0;">
									<img src="<?php echo e(asset('images/cart_recalc.png')); ?>" alt="Пересчитать"/>
								</button>
							</div>
						</td>
						<td colspan="4">
							<div class="right">
								<input type="hidden" name="func" value="cart" />
								<a href="<?php echo e(route('checkout')); ?>">
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
	 <?php $__env->endSlot(); ?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal66d7cfd03cd343304d81fe1e21646540)): ?>
<?php $attributes = $__attributesOriginal66d7cfd03cd343304d81fe1e21646540; ?>
<?php unset($__attributesOriginal66d7cfd03cd343304d81fe1e21646540); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal66d7cfd03cd343304d81fe1e21646540)): ?>
<?php $component = $__componentOriginal66d7cfd03cd343304d81fe1e21646540; ?>
<?php unset($__componentOriginal66d7cfd03cd343304d81fe1e21646540); ?>
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/cart.blade.php ENDPATH**/ ?>