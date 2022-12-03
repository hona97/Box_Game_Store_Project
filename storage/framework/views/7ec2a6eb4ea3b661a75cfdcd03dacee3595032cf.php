<div class="container">

    <?php
        $content = Cart::content();
        $totalPrice = 0;
        $discount = 0;
    ?>
    
    <?php if(Cart::count() != 0): ?>


    <div class="cart-container">

        <div class="cart-left">

            <?php $__currentLoopData = $content; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v_content): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <?php 
            $totalPrice += $v_content->price;
            $discount += $v_content->price * (int)$v_content->options->sale / 100;
            $imageLink = $v_content->options->image;
            ?>

            
            <div class="cart-item-container">

                <div class="cart-item">
                    <div class="item-img">
                        <img src="<?php echo e(asset("$imageLink")); ?>"
                            alt="">
                    </div>

                    <div class="item-info">
                        <div class="info-top">
                            <div class="info-type">
                                <span class="type">BASE GAME</span>
                            </div>

                            <div class="item-info-price">
                                <?php if((int)$v_content->options->sale != 0): ?>
                                <span class="badge">-<?php echo e($v_content->options->sale); ?>%</span>

                                <del class="del">$<?php echo e($v_content->price); ?></del>
                                <?php endif; ?>

                                <span class="price">$<?php echo e(number_format($v_content->price * (1 - (int)$v_content->options->sale / 100), 2, '.', '')); ?></span>
                            </div>
                        </div>

                        <div class="item-title">
                            <a href="/game/<?php echo e($v_content->id); ?>" class="item-name"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $v_content->id))); ?></a>
                        </div>

                        <div class="refund">
                            <span class="self-rf">Self-Refundable <ion-icon name="help-circle-outline">
                                </ion-icon></span>
                        </div>

                        <div class="info-bottom">
                            <span class="item-platform">
                                <ion-icon name="logo-windows"></ion-icon>
                            </span>

                            <div class="item-action">
                                <a href="" class="wishlist">
                                    <ion-icon name="add-circle-outline"></ion-icon>Move to wishlist
                                </a>

                                <button wire:click.prevent="removeCart('<?php echo e($v_content->rowId); ?>')" class="remove">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
        </div>

        

        <div class="cart-right">

            <h2 class="h2">Games And Apps Summary</h2>

            <div class="right-price">

                <span class="price-title">Price</span>

                <span class="price-and-sale">$<?php echo e($totalPrice); ?></span>

            </div>

            <div class="right-price">

                <span class="price-title">Sale Discount</span>

                <span class="price-and-sale">-$<?php echo e(number_format($discount, 2, '.', '')); ?></span>

            </div>

            <div class="taxes">

                <span class="taxes-title">Taxes</span>

                <span class="taxes-right">Calculated at Checkout</span>

            </div>

            <div class="subtotal">

                <span class="subtotal-title">Subtotal</span>

                <span class="total-price">$<?php echo e(number_format($totalPrice - $discount, 2, '.', '')); ?></span>

            </div>

            <button class="btn-checkout" onclick="showCheckOut()" wire:click.prevent="checkout(<?php echo e($totalPrice - $discount); ?>)">CHECK OUT</button>
            <?php
                \Session::put('total_after', $totalPrice - $discount);
            ?>

            <?php if(\Session::has('error')): ?>
                <div class="invalid-feedback1"><?php echo e(\Session::get('error')); ?></div>
                <?php echo e(\Session::forget('error')); ?>

            <?php endif; ?>

        </div>

    </div>

    <?php else: ?>
        <?php if(\Session::has('error')): ?>
            <div class="invalid-feedback1"><?php echo e(\Session::get('error')); ?></div>
            <?php echo e(\Session::forget('error')); ?>

        <?php elseif(\Session::has('success')): ?>
            <div class="valid-feedback1"><?php echo e(\Session::get('success')); ?></div>
            <?php echo e(\Session::forget('success')); ?>

        <?php else: ?>
            <div class="cart-empty">
                <svg xmlns="http://www.w3.org/2000/svg" class="svg css-uwwqev" viewBox="0 0 45 52"><g fill="none" fill-rule="evenodd">
                    <path d="M4.058 0C1.094 0 0 1.098 0 4.075v35.922c0 .338.013.65.043.94.068.65-.043 1.934 2.285 2.96 1.553.683 7.62 3.208 18.203 7.573 1.024.428 1.313.529 2.081.529.685.013 1.137-.099 2.072-.53 10.59-4.227 16.66-6.752 18.213-7.573 2.327-1.23 2.097-3.561 2.097-3.899V4.075C44.994 1.098 44.13 0 41.166 0H4.058z" fill="currentColor"></path><path stroke="#FFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M14 18l4.91 2.545-2.455 4M25.544 28.705c-1.056-.131-1.806-.14-2.25-.025-.444.115-1.209.514-2.294 1.197M29.09 21.727L25 19.5l2.045-3.5"></path></g></svg>
                <h2 class="h2">Your cart is empty</h2>   
                <a href="<?php echo e(route('homeuser')); ?>">Shop for Game & Apps</a>
            </div>
        <?php endif; ?>
    <?php endif; ?>

</div>
        





    



<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/livewire/check-out-cart.blade.php ENDPATH**/ ?>