<li class="cart-count-item">
<?php if($cart_count != 0): ?>
    <a href="<?php echo e(route('cart')); ?>" class="navbar-link" style="color: var(--text-white)">Cart</a>
    <div class="change-cart-item">
        <span class="cart-count">
            <?php echo e($cart_count); ?> 
        </span>
    </div>    
<?php else: ?>
    <a href="<?php echo e(route('cart')); ?>" class="navbar-link">Cart</a>
<?php endif; ?>
</li>    

<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/livewire/cart-counter.blade.php ENDPATH**/ ?>