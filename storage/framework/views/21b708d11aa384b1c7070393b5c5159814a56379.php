
<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>   
    
    
    <!-- 
    - #CART
    -->


    <h2 class="section h2-large mycart-title">My Cart</h2>

    <section class="section cart">

        
        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('check-out-cart')->html();
} elseif ($_instance->childHasBeenRendered('tmvWwGT')) {
    $componentId = $_instance->getRenderedChildComponentId('tmvWwGT');
    $componentTag = $_instance->getRenderedChildComponentTagName('tmvWwGT');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tmvWwGT');
} else {
    $response = \Livewire\Livewire::mount('check-out-cart');
    $html = $response->html();
    $_instance->logRenderedChild('tmvWwGT', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </section>

    <div class="checkout">
        <div class="checkout-container" data-checkout>
            
            
            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('check-out-form')->html();
} elseif ($_instance->childHasBeenRendered('qo6dYHW')) {
    $componentId = $_instance->getRenderedChildComponentId('qo6dYHW');
    $componentTag = $_instance->getRenderedChildComponentTagName('qo6dYHW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qo6dYHW');
} else {
    $response = \Livewire\Livewire::mount('check-out-form');
    $html = $response->html();
    $_instance->logRenderedChild('qo6dYHW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>

        

        <div class="overlay-checkout" data-overlay-checkout></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="<?php echo e(asset('assets_home/js/cart.js')); ?>" defer></script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/home/cart.blade.php ENDPATH**/ ?>