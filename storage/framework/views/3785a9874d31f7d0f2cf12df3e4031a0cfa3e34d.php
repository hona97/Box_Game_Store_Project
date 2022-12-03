<div class="swiper-wrapper">
    <?php $count = 0; ?>
    <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if ($count == 7) {
            break;
        } ?>
        <?php if($value->sale > 0): ?>
            <div class="swiper-slide" wire:ignore.self>
                <div class="shop-card">

                    <div class="card-banner">

                        <a href="/game/<?php echo e($value->gameId); ?>"><img src="<?php echo e(asset("$value->icon")); ?>" class="img-cover" style="height: 282px"></a>

                        <span class="badge" aria-label="20% off">-<?php echo e($value->sale); ?>%</span>

                        
                        <div class="card-actions">

                            <div class="tooltip">
                                <?php if(Auth::check()): ?>
                                    <?php if(in_array($value->gameId, $gameIds)): ?>
                                        <button class="action-btn" type="button">
                                            <i class="fa-sharp fa-solid fa-check"></i>
                                        </button>
                                        <span class="tooltiptext">Purchased</span>
                                    <?php else: ?>
                                        <?php if(Cart::content()->where('id', $value->gameId)->count()): ?>
                                            <button class="action-btn" type="button" wire:click.prevent="removeCart('<?php echo e($value->gameId); ?>')">
                                                -
                                            </button>
                                            <span class="tooltiptext">Remove</span>
                                        <?php else: ?>    
                                            <button class="action-btn" type="button"
                                            wire:click.prevent="addToCart('<?php echo e($value->gameId); ?>')">
                                            +
                                            </button>
                                            <span class="tooltiptext">Add to Cart</span>
                                        <?php endif; ?>
                                    <?php endif; ?>    
                                <?php else: ?>
                                    <a href="<?php echo e(route('login')); ?>" class="action-btn-login" type="button">
                                        +
                                    </a>
                                    <span class="tooltiptext">Add to Cart</span>
                                <?php endif; ?>    


                            
                            

                            
                            </div>
                        </div>
                        

                    </div>

                    <div class="card-content">

                        <span class="card-type">BASE GAME</span>

                        <h3>
                            <a href="/game/<?php echo e($value->gameId); ?>"
                                class="card-title"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $value->gameId))); ?></a>
                        </h3>

                        <div class="price">
                            <del class="del">$<?php echo e($value->price); ?></del>

                            <span
                                class="span">$<?php echo e(number_format($value->price * (1 - $value->sale / 100), 2, '.', '')); ?></span>
                        </div>

                    </div>

                </div>

            </div>
            <?php $count++; ?>
        <?php endif; ?>

    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
</div>
<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/livewire/products-table.blade.php ENDPATH**/ ?>