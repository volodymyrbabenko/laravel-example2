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
	 <?php $__env->slot('title', null, []); ?> Оформление заказа <?php $__env->endSlot(); ?>
	 <?php $__env->slot('description', null, []); ?> Оформление заказа на покупку фильмов. <?php $__env->endSlot(); ?>
	 <?php $__env->slot('keywords', null, []); ?> заказ, оформление заказа, оформление заказа фильмы <?php $__env->endSlot(); ?>

	 <?php $__env->slot('sort', null, []); ?> 
	 <?php $__env->endSlot(); ?>

	 <?php $__env->slot('main_part', null, []); ?> 
		<div id="order">
			<h2>Оформление заказа</h2>

			<?php if($errors->any()): ?>
				<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<p class="message"><?php echo e($message); ?></p>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php endif; ?>

			<form name="order" action="<?php echo e(url()->current()); ?>" method="post">
				<?php echo csrf_field(); ?>
				<table>
					<tr>
						<td class="w120">ФИО*:</td>
						<td>
							<input type="text" name="name" value="<?php echo e(old('name')); ?>"  />
						</td>
					</tr>
					<tr>
						<td>Телефон*:</td>
						<td>
							<input type="text" name="phone" value="<?php echo e(old('phone')); ?>"  />
						</td>
					</tr>
					<tr>
						<td>E-mail*:</td>
						<td>
							<input type="text" name="email" value="<?php echo e(old('email')); ?>"  />
						</td>
					</tr>
					<tr>
						<td>Доставка*:</td>
						<td>
							<select name="delivery" >
								<option value="Доставка" <?php if(old('delivery') == 'Доставка'): echo 'selected'; endif; ?>>Доставка</option>
								<option value="Самовывоз" <?php if(old('delivery') == 'Самовывоз'): echo 'selected'; endif; ?>>Самовывоз</option>
							</select>
						</td>
					</tr>
				</table>
				<table>
					<tr id="address">
						<td>
							<p>Полный адрес (Страна, город, индекс, улица, дом, квартира)*:</p>
							<textarea name="address" cols="80" rows="6" ><?php echo e(old('address')); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<p>Примечание к заказу:</p>
							<textarea name="notice" cols="80" rows="6"><?php echo e(old('notice')); ?></textarea>
						</td>
					</tr>
					<tr>
						<td>
							<?php echo NoCaptcha::display(); ?>

							<?php if($errors->has('g-recaptcha-response')): ?>
								<span class="text-danger"><?php echo e($errors->first('g-recaptcha-response')); ?></span>
							<?php endif; ?>
						<td>
					</tr>
					<tr>
						<td class="button">
							<button type="submit" name="order" value="Закончить оформление заказа" style="background: none; border: none; padding: 0;">
								<img src="<?php echo e(asset('images/order_end.png')); ?>" alt="Закончить оформление заказа" />
							</button>
						</td>
					</tr>
				</table>
			</form>
			<?php echo NoCaptcha::renderJs(); ?>

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
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/checkout.blade.php ENDPATH**/ ?>