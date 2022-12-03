
<?php $__env->startSection('title', 'Browse'); ?>
<?php $__env->startSection('content'); ?>


<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('browse-add-cart')->html();
} elseif ($_instance->childHasBeenRendered('Y8JqEQA')) {
    $componentId = $_instance->getRenderedChildComponentId('Y8JqEQA');
    $componentTag = $_instance->getRenderedChildComponentTagName('Y8JqEQA');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Y8JqEQA');
} else {
    $response = \Livewire\Livewire::mount('browse-add-cart');
    $html = $response->html();
    $_instance->logRenderedChild('Y8JqEQA', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

                    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-script'); ?>
    <script src="<?php echo e(asset('assets_home/js/browse.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/home/browse/index.blade.php ENDPATH**/ ?>