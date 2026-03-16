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
	 <?php $__env->slot('title', null, []); ?> Поиск: <?php echo e($search_query); ?> <?php $__env->endSlot(); ?>
	 <?php $__env->slot('description', null, []); ?> Поиск <?php echo e($search_query); ?> <?php $__env->endSlot(); ?>
	 <?php $__env->slot('keywords', null, []); ?> поиск, поиск <?php echo e(mb_strtolower($search_query)); ?> <?php $__env->endSlot(); ?>

	 <?php $__env->slot('sort', null, []); ?> 
	 <?php $__env->endSlot(); ?>

	 <?php $__env->slot('main_part', null, []); ?> 
		<div id="search_result">
			<h2>Результаты поиска: <?php echo e($search_query); ?></h2>
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
				<?php if(!count($posts)): ?>
					<div id="other">
						<div id="pm">
							<p>Ничего не найдено!</p>
							<p>
								<a href="<?php echo e(route('index')); ?>">Вернуться на главную</a>
							</p>
						</div>
					</div>
				<?php else: ?>
					<tr>
						<?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $good): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<td>
								<div class="intro_product">
									<p class="img">
										<img src="<?php echo e(asset('images/products/' . $good->alias . '.jpg')); ?>" alt="<?php echo e($good->title); ?>" />
									</p>
									<p class="title">
										<a href="<?php echo e(route('good', ['id' => $good->id])); ?>"><?php echo e($good->title); ?></a>
									</p>
									<p class="price"><?php echo e($good->price); ?> Euro</p>
									<p>
										<!-- <a class="link_cart" href="add_to_cart"></a> -->
										<a class="link_cart" href="<?php echo e(route('add_to_cart', ['id' => $good->id])); ?>"></a>
									</p>
								</div>
							</td>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tr>
				<?php endif; ?>
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
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/search.blade.php ENDPATH**/ ?>