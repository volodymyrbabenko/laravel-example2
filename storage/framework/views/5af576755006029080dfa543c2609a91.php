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
	 <?php $__env->slot('title', null, []); ?> Оплата и доставка <?php $__env->endSlot(); ?>
	 <?php $__env->slot('description', null, []); ?> Оплата и доставка в Интернет-магазине. <?php $__env->endSlot(); ?>
	 <?php $__env->slot('keywords', null, []); ?> оплата, доставка, оплата доставка магазин <?php $__env->endSlot(); ?>

	 <?php $__env->slot('sort', null, []); ?> 
	 <?php $__env->endSlot(); ?>

	 <?php $__env->slot('main_part', null, []); ?> 
		<div id="article">
			<h2>Оплата и доставка</h2>
			<p>У нас есть 2 варианта доставки: доставка по почте наложенным платежом и самовывоз.</p>
			<p>Возможны и другие варианты оплаты и доставки, о которых можно договориться по телефону с менеджером после оформление заказа.</p>
			<p>А вообще это тестовый сайт, который был создан в обучащем курсе Михаила Русакова<br /><a href="https://srs.myrusakov.ru/im">Создание Интернет-магазина на PHP и MySQL</a></p>
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
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/delivery.blade.php ENDPATH**/ ?>