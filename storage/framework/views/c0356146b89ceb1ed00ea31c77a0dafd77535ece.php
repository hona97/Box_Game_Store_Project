<div class="deal">    
    <?php if(Auth::check()): ?>
        <?php if(in_array($gameId, $gameIds)): ?>
            <button type="button" class="addtocart">purchased</button>
        <?php else: ?>
            <?php if(Cart::content()->where('id', $gameId)->count()): ?>
                <button type="button" class="buy" wire:click.prevent="checkout('<?php echo e($gameId); ?>')" onclick="showCheckOut()">buy now</button>
                <a href="<?php echo e(route('cart')); ?>">
                    <button type="button" class="addtocart">view in cart</button>
                </a>
            <?php else: ?>    
                <button type="button" class="buy" wire:click.prevent="checkout('<?php echo e($gameId); ?>')" onclick="showCheckOut()">buy now</button>
                <button type="button" class="addtocart" wire:click.prevent="addToCart('<?php echo e($gameId); ?>')">Add To Cart</button>
            <?php endif; ?>
        <?php endif; ?>    
    <?php else: ?>
        <a href="<?php echo e(route('login')); ?>">
            <button type="button" class="buy">buy now</button>
        </a>    
        <a href="<?php echo e(route('login')); ?>">
            <button type="button" class="addtocart">Add To Cart</button>
        </a>
    <?php endif; ?>
</div>

<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/livewire/details-add-cart.blade.php ENDPATH**/ ?>