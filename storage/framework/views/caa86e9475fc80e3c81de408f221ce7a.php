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
	 <?php $__env->slot('title', null, []); ?> Интернет-магазин по продаже дисков <?php $__env->endSlot(); ?>
	 <?php $__env->slot('description', null, []); ?> Интернет-магазин по продаже DVD-дисков. <?php $__env->endSlot(); ?>
	 <?php $__env->slot('keywords', null, []); ?> интернет магазин, интернет магазин dvd, интернет магазин dvd диски <?php $__env->endSlot(); ?>

	 <?php $__env->slot('sort', null, []); ?> 
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
							<td>цене (<a href="<?php echo e(route('sort', ['type' => 'price', 'up' => 1])); ?>">возр.</a> | <a href="<?php echo e(route('sort', ['type' => 'price', 'up' => 0])); ?>">убыв.</a>)
							<td>названию (<a href="<?php echo e(route('sort', ['type' => 'name', 'up' => 1])); ?>">возр.</a> | <a href="<?php echo e(route('sort', ['type' => 'name', 'up' => 0])); ?>">убыв.</a>)
						</tr>
					</table>
				</td>
			</tr>
		</table>
	 <?php $__env->endSlot(); ?>

	 <?php $__env->slot('main_part', null, []); ?> 
		<?php if(session('success')): ?>
			<script>
				alert("<?php echo e(session('success')); ?>");
			</script>
		<?php endif; ?>

		<table class="products">
			<tr>
				<?php $__currentLoopData = $goods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<td>
						<div class="intro_product">
							<p class="img">
								<img src="<?php echo e(asset('images/products/' . $good->alias . '.jpg')); ?>" alt="<?php echo e($good->title); ?>" />
							</p>
							<p class="title">
								<a href="<?php echo e(route('good', ['alias' => $good->alias])); ?>"><?php echo e($good->title); ?></a>
							</p>
							<p class="price"><?php echo e($good->price); ?> Euro</p>
							<p>
								<!-- <a class="link_cart" href="add_to_cart"></a> -->
								<a class="link_cart" href="<?php echo e(route('add_to_cart', ['id' => $good->id])); ?>"></a>
							</p>
						</div>
					</td>

					<?php if(($index + 1) % 4 == 0): ?>
						</tr><tr>
					<?php endif; ?>
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</tr>
		</table>
		<?php echo e($goods->links('pagination')); ?>

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
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/index.blade.php ENDPATH**/ ?>