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
	 <?php $__env->slot('title', null, []); ?> Контакты <?php $__env->endSlot(); ?>
	 <?php $__env->slot('description', null, []); ?> Контакты магазина. <?php $__env->endSlot(); ?>
	 <?php $__env->slot('keywords', null, []); ?> контакты, обратная связь, обратная связь администрация <?php $__env->endSlot(); ?>

	 <?php $__env->slot('sort', null, []); ?> 
	 <?php $__env->endSlot(); ?>

	 <?php $__env->slot('main_part', null, []); ?> 
		<div id="article">
			<h2>Контакты</h2>
			<p>Мы находимся по адресу г. Киев, ул. такая-то, д. такой-то.</p>
			<p>Мы работаем с 09:00 до 21:00 без перерыва и выходных.</p>
			<p>А вообще это тестовый сайт, который был создан с целью тестов</a></p>
			<p>В связи с этим, данный сайт ничего в реальности не продаёт. Поэтому, заказав какой-нибудь фильм, не стоит ждать, что он к Вам придёт.</p>
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
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/contacts.blade.php ENDPATH**/ ?>