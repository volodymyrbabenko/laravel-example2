<?php if($paginator->hasPages()): ?>
	<div id="pagination">
		<span>Страница <?php echo e($paginator->currentPage()); ?> из <?php echo e($paginator->lastPage()); ?></span>
		<div id="pages">
			<?php if($paginator->onFirstPage()): ?>
				В начало&nbsp; &laquo;&nbsp;
			<?php else: ?>
				<a href="<?php echo e(Request::url()); ?>">В начало</a>&nbsp;
				<a href="<?php echo e($paginator->previousPageUrl()); ?>">&laquo;</a>&nbsp;
			<?php endif; ?>
			<?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(is_array($element)): ?>
					<?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<?php if($page == $paginator->currentPage()): ?>
							<?php echo e($page); ?>&nbsp;
						<?php else: ?>
							<a href="<?php echo e($url); ?>"><?php echo e($page); ?></a>&nbsp;
						<?php endif; ?>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			<?php if($paginator->onLastPage()): ?>
				&raquo;&nbsp; В конец
			<?php else: ?>
				<a href="<?php echo e($paginator->nextPageUrl()); ?>">&raquo;</a>&nbsp;
				<a href="<?php echo e(Request::url(). '?page=' . $paginator->lastPage()); ?>">В конец</a>
			<?php endif; ?>
		</div>
		<div class="clear"></div>
	</div>
<?php endif; ?><?php /**PATH E:\xampp_\htdocs\laraveldz2\resources\views/pagination.blade.php ENDPATH**/ ?>