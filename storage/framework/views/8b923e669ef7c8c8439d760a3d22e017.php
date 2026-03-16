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
	 <?php $__env->slot('title', null, []); ?> <?php echo e($good->title); ?> <?php $__env->endSlot(); ?>
	 <?php $__env->slot('description', null, []); ?> Описание и покупка фильма <?php echo e($good->title); ?> <?php $__env->endSlot(); ?>
	 <?php $__env->slot('keywords', null, []); ?> описание фильм <?php echo e($good->title); ?>, купить фильм <?php echo e($good->title); ?> <?php $__env->endSlot(); ?>

	 <?php $__env->slot('sort', null, []); ?> 
	 <?php $__env->endSlot(); ?>

	 <?php $__env->slot('main_part', null, []); ?> 
		<table id="hornav">
			<tr>
				<td>
					<a href="index.html">Главная</a>
				</td>
				<td>
					<img src="/images/hornav_arrow.png" alt="" />
				</td>
				<td>
					<a href="<?php echo e(route('genre.show', ['name' => $good->genre->title ])); ?>"><?php echo e($good->genre->title); ?></a>
				</td>
				<td>
					<img src="/images/hornav_arrow.png" alt="" />
				</td>
				<td><?php echo e($good->title); ?></td>
			</tr>
		</table>

		<table id="product">
			<tr>
				<td class="product_img">
					<img src="<?php echo e(asset('images/products/' . $good->alias . '.jpg')); ?>" alt="<?php echo e($good->title); ?>" />
				</td>
				<td class="product_desc">
					<p>Название: <span class="title"><?php echo e($good->title); ?></span></p>
					<p>Год выхода: <span><?php echo e($good->year); ?></span></p>
					<p>Жанр: <span><?php echo e($good->genre->title); ?></span></p>
					<p>Страна-производитель: <span><?php echo e($good->country); ?></span></p>
					<p>Режиссёр: <span><?php echo e($good->director); ?></span></p>
					<p>Продолжительность: <span><?php echo e($good->duration); ?></span></p>
					<p>В ролях: <span><?php echo e($good->starring); ?></span></p>
					<table>
						<tr>
							<td>
								<p class="price"><?php echo e($good->price); ?> €</p>
							</td>
							<td>
								<p>
									<a class="link_cart" href="<?php echo e(route('add_to_cart', ['id' => $good->id])); ?>"></a>
								</p>
							</td>
						</tr>
					</table>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<p class="desc_title">Описание:</p>
					<p class="desc"><?php echo e($good->description); ?></p>
				</td>
			</tr>
		</table>

		<div id="others">
			<h3>С этим товаром также заказывают:</h3>
			<table class="products">
				<tr>
					<?php $__currentLoopData = $products_that_are_also_ordered; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if(is_string($related_good->alias) && strlen($related_good->alias) > 0): ?>
							<td>
								<div class="intro_product">
									<p class="img">
										<img src="<?php echo e(asset('images/products/' . $related_good->alias . '.jpg')); ?>" alt="<?php echo e($related_good->title); ?>" />
									</p>
									<p class="title">
										<a href="<?php echo e(route('good', ['alias' => $related_good->alias])); ?>"><?php echo e($related_good->title); ?></a>
									</p>
									<p class="price"><?php echo e($related_good->price); ?> Euro</p>
									<p>
										<a class="link_cart" href="<?php echo e(route('add_to_cart', ['id' => $related_good->id])); ?>"></a>
									</p>
								</div>
							</td>
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</tr>
			</table>
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
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/good.blade.php ENDPATH**/ ?>