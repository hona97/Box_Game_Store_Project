<div class="payment_container">
    <div class="checkout-method">
        <div class="checkout-title">
            <span class="title">CHECKOUT</span>
            <div class="title-user">
                <i class="fa-solid fa-user"></i>
                <span><?php echo e(Auth::user()->userID); ?></span>
            </div>
        </div>
        <?php
            $i = 0;
            $paypal = 0;
            $visa = 0;
            $master = 0;
            $vnpay = 0;
            $momo = 0;       
        ?>
        <div class="checkout_content">
            <div class="cart_payment">
                <span class="title">your payment methods</span>
                <ul>
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($payment->userID == Auth::user()->userID): ?>
                            <?php
                                $i++;
                                $function = 'showcartpayment' . $i . '()';
                                $data = 'data-cart-payment' . $i;
                                $checkbox = 'checkbox' . $i;
                            ?>
                            <?php if($payment->card_name == 'paypal'): ?>
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" onclick="<?php echo e($function); ?>">
                                        <input type="radio" id="check6" name="payment">
                                        <img src="<?php echo e(asset($payment->image)); ?>" alt="">
                                        <label for=""><?php echo e($payment->card_name); ?></label>
                                    </div>
                                            
                                    <div class="content_cart_payment" <?php echo e($data); ?>>
                                        <span>You will be directed to PayPal to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                        <a href="<?php echo e(route('processTransaction1')); ?>" class="btn_payment">pay</a>                                                   
                                    </div>
                                </li>
                            <?php elseif($payment->card_name == 'vnpay'): ?>
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" onclick="<?php echo e($function); ?>">
                                        <input type="radio" name="payment">
                                        <img src="<?php echo e(asset($payment->image)); ?>" alt="">
                                        <label for=""><?php echo e($payment->card_name); ?></label>
                                    </div>
                                            
                                    <div class="content_cart_payment" <?php echo e($data); ?>>
                                        <span>You will be directed to VNPay to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                        <form action="<?php echo e(route('vnpayPayment1')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" name="redirect" class="btn_payment">pay</button>
                                        </form>                                                   
                                    </div>
                                </li>
                            <?php elseif($payment->card_name == 'momo'): ?>
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" onclick="<?php echo e($function); ?>">
                                        <input type="radio" name="payment">
                                        <img src="<?php echo e(asset($payment->image)); ?>" alt="">
                                        <label for=""><?php echo e($payment->card_name); ?></label>
                                    </div>
                                            
                                    <div class="content_cart_payment" <?php echo e($data); ?>>
                                        <span>You will be directed to Momo to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                        <form action="<?php echo e(route('momoPayment1')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" name="payUrl" class="btn_payment">pay</button>
                                        </form>                                                   
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="cart_payment1">
                                    <div class="title_cart_payment" id="btn1">
                                        <input type="radio" oninput="document.getElementById('btn-po').disabled = document.getElementById('<?php echo e($checkbox); ?>').checked ? false : true" id="<?php echo e($checkbox); ?>" name="payment"  class="cdc">
                                        <img src="<?php echo e(asset($payment->image)); ?>" alt="">
                                        <label for=""><?php echo e($payment->card_name); ?></label>
                                    </div>
                                            
                                    <!-- <div class="content_cart_payment" <?php echo e($data); ?>>
                                        <div class="card_details1">card details</div>
                                        <form class="detailspayment1" action="<?php echo e(url("payment/{$payment->cardId}")); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="payment-form-item1 card_number1">
                                                <label for="card_number"><?php echo e(__('Card Number *')); ?></label>
                                                <input type="text" name="card_number" id="card_number" value="<?php echo e($payment->card_number); ?>">        
                                            </div>
                                            <div class="payment-form-item1 card_expi1">
                                                <label for="expiration"><?php echo e(__('Expiration *')); ?></label>
                                                <input type="date" name="expiration" id="expiration" value="<?php echo e($payment->payment_date); ?>">
                                            </div>
                                            <div class="payment-form-item1 card_cvv1">
                                                <label for="cvv"><?php echo e(__('CVV *')); ?></label>
                                                <input type="text" name="cvv" id="cvv" value="<?php echo e($payment->cvv); ?>">
                                            </div>
                                            <div class="payment_btn">
                                                <a href="<?php echo e(url("paymentdelete/{$payment->cardId}")); ?>">delete</a>
                                                <input type="submit" class="submit1" value="<?php echo e(__('update')); ?>">
                                            </div>                                  
                                        </form>                        
                                    </div> -->
                                </li>
                            <?php endif; ?>
                            <?php if($payment->card_name == 'paypal'): ?>
                                <?php
                                    $paypal++;
                                ?>
                            <?php endif; ?>
                            <?php if($payment->card_name == 'visa'): ?>
                                <?php
                                    $visa++;
                                ?>
                            <?php endif; ?>
                            <?php if($payment->card_name == 'master'): ?>
                                <?php
                                    $master++;
                                ?>
                            <?php endif; ?>
                            <?php if($payment->card_name == 'vnpay'): ?>
                                <?php
                                    $vnpay++;
                                ?>
                            <?php endif; ?>
                            <?php if($payment->card_name == 'momo'): ?>
                                <?php
                                    $momo++;
                                ?>
                            <?php endif; ?>                  
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <span style="margin-left: 2rem; color: var(--text-silver2);">No payment methods added.</span>
                    <?php endif; ?>
                    <?php if(session()->has('status')): ?>
                        <div class="valid-feedback">
                            <?php echo e(session()->get('status')); ?>

                        </div>
                    <?php endif; ?>
                </ul>
            </div>

            <div class="other_payment">         
                <div class="other_payment_show" onclick="showotherpayment()">
                    <span class="title" onclick="showpayment()">other payment methods</span>
                    <span class="btn_show_other_method">
                        <i class="fa-solid fa-chevron-down arrow-custom" data-arrow></i>
                    </span>
                </div>

                <div class="other_payment_hide" data-payment-hide>
                    <ul>
                        <?php 
                            $count = 0;  
                        ?>
                        <?php $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>      
                            <?php if($payment->userID == Auth::user()->userID): ?>
                                <?php
                                    $count++;
                                ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php if($count == 5): ?> 
                            <span>You already have 5 payment methods we support.</span>
                        <?php else: ?>
                            <?php if($paypal == 0): ?>
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails1()">
                                        <input type="radio" id="check1" name="payment">
                                        <img src="<?php echo e(asset('assets_home/images/paypal.png')); ?>" alt="">
                                        <label for="">PayPal</label>
                                    </div>
                                            
                                    <div class="content_other_payment" data-paymenthide-hide1>
                                        <span>You wanna use this method later ?</span>
                                        <div class="saveandpay">
                                            <form class="detailspayment1" action="<?php echo e(route('addpayment1')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="paymentname" value="paypal" id="">
                                                <input type="hidden" name="paymentimage" value="assets_home/images/paypal.png" id="">
                                                <input type="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                            </form> 
                                            <div class="detailspayment2">
                                                <a href="<?php echo e(route('processTransaction1')); ?>">pay</a>
                                            </div>      
                                        </div>                 
                                    </div>
                                </li>
                                <?php endif; ?>

                                <?php if($vnpay == 0): ?>
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails4()">
                                        <input type="radio" id="check4" name="payment">
                                        <img src="<?php echo e(asset('assets_home/images/vnpay.png')); ?>" alt="">
                                        <label for="">VN Pay</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide4>
                                        <span>You wanna use this method later ?</span>
                                        <div class="saveandpay">
                                            <form class="detailspayment1" action="<?php echo e(route('addpayment1')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="paymentname" value="vnpay" id="">
                                                <input type="hidden" name="paymentimage" value="assets_home/images/vnpay.png" id="">
                                                <input type="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                            </form>
                                            <form class="detailspayment2" action="<?php echo e(route('vnpayPayment1')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" name="redirect">pay</button>
                                            </form>
                                        </div>                        
                                    </div>
                                </li>
                                <?php endif; ?>

                                <?php if($momo == 0): ?>
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails5()">
                                        <input type="radio" id="check5" name="payment">
                                        <img src="<?php echo e(asset('assets_home/images/momo.png')); ?>" alt="">
                                        <label for="">Momo</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide5>
                                        <span>You wanna use this method later ?</span>
                                        <div class="saveandpay">
                                            <form class="detailspayment1" action="<?php echo e(route('addpayment1')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="paymentname" value="momo" id="">
                                                <input type="hidden" name="paymentimage" value="assets_home/images/momo.png" id="">                                            
                                                <input type="submit" name="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                            </form> 
                                            <form class="detailspayment2" action="<?php echo e(route('momoPayment1')); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <button type="submit" name="payUrl">pay</button>
                                            </form>
                                        </div>                       
                                    </div>
                                </li>
                                <?php endif; ?>

                                <?php if($visa == 0): ?>
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails2()">
                                        <input type="radio" oninput="document.getElementById('btn-po').disabled = document.getElementById('check2').checked ? false : true" id="check2" class="cdc" name="payment">
                                        <img src="<?php echo e(asset('assets_home/images/visa.jpg')); ?>" alt="">
                                        <label for="">Visa</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide2>
                                        <div class="card_details">card details</div>
                                        <form class="detailspayment" action="<?php echo e(route('addpayment')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="paymentname" value="visa" id="">
                                            <input type="hidden" name="paymentimage" value="assets_home/images/visa.jpg" id="">
                                            <div class="payment-form-item card_number">
                                                <label for="card_number"><?php echo e(__('Card Number *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number">        
                                            </div>
                                            <div class="payment-form-item card_expi">
                                                <label for="expiration"><?php echo e(__('Expiration *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['expiration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="5" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration">
                                            </div>
                                            <div class="payment-form-item card_cvv">
                                                <label for="cvv"><?php echo e(__('CVV *')); ?></label>
                                                <input type="text" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv">
                                            </div>
                                            <input type="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                        </form>                        
                                    </div>
                                </li>
                                <?php endif; ?>

                                <?php if($master == 0): ?>
                                <li class="other_payment1">
                                    <div class="title_other_payment" onclick="showpaymentdetails3()">
                                        <input type="radio" oninput="document.getElementById('btn-po').disabled = document.getElementById('check3').checked ? false : true" id="check3" class="cdc" name="payment">
                                        <img src="<?php echo e(asset('assets_home/images/master.png')); ?>" alt="">
                                        <label for="">Master Card</label>
                                    </div>

                                    <div class="content_other_payment" data-paymenthide-hide3>
                                        <div class="card_details">card details</div>
                                        <form class="detailspayment" action="<?php echo e(route('addpayment')); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="paymentname" value="master" id="">
                                            <input type="hidden" name="paymentimage" value="assets_home/images/master.png" id="">
                                            <div class="payment-form-item card_number">
                                                <label for="card_number1"><?php echo e(__('Card Number *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number1">        
                                            </div>
                                            <div class="payment-form-item card_expi">
                                                <label for="expiration1"><?php echo e(__('Expiration *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['expiration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="5" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration1">
                                            </div>
                                            <div class="payment-form-item card_cvv">
                                                <label for="cvv1"><?php echo e(__('CVV *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['cvv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv1">
                                            </div>
                                            <input type="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                        </form>                        
                                    </div>
                                </li>
                            <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                    <?php $__errorArgs = ['card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['expiration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['cvv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback">
                            <?php echo e($message); ?>

                        </div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
            </div>
        </div>
        <a class="redirect" href="<?php echo e(route('paymentmanagement')); ?>">Add or manage your payment methods.</a>
    </div>
    <div class="order-summary">
        <div class="summary-title">
            <span class="title">ORDER SUMMARY</span>
            <button class="close-checkout" onclick="showCheckOut()" wire:click.prevent="removeCartM(<?php echo e($cartId); ?>)">
                
                <i class="fa-sharp fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="order-list">

            <div class="order-item">
                <div class="order-img">
                    <img src="<?php echo e(asset("$gameIcon")); ?>" alt="">
                </div>
                <div class="oi-details">
                    <span class="item-name"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $gameId))); ?></span>
                    <?php if($gameSale != 0): ?>
                    <span class="badge">-<?php echo e($gameSale); ?>%</span>
                    <?php else: ?>
                    <?php endif; ?>
                    <div class="item-price">
                        <?php if($gameSale != 0): ?>
                        <del class="del">$<?php echo e($gamePrice); ?></del>
                        <?php else: ?>
                        <?php endif; ?>
                        <span class="price">$<?php echo e(number_format($gamePrice * (1 - $gameSale / 100), 2, '.', '')); ?></span>
                    </div>
                </div>
            </div>

            <div class="payment-summary">
                <div class="order-price">
                    <span class="title">Price</span>
                    <span class="price">$<?php echo e($gamePrice); ?></span>
                </div>
                <div class="order-price">
                    <span class="title">Sale Discount</span>
                    <span class="price">-$<?php echo e(number_format($gamePrice * $gameSale / 100, 2, '.', '')); ?></span>
                </div>
                <hr>
                <div class="order-total">
                    <span class="title">Total</span>
                    <span class="price">$<?php echo e(number_format($gamePrice * (1 - $gameSale / 100), 2, '.', '')); ?></span>
                    <?php
                        \Session::put('total_after', round($gamePrice * (1 - $gameSale / 100), 2))
                    ?>
                </div>
                <div class="order-contact">
                    Need Help?
                    <a href="" class="contact">Contact Us</a>
                </div>
            </div>
        </div>

        <div class="place-order tooltip">
            <button class="btn-po" wire:click.prevent="update(<?php echo e($cartId); ?>)" disabled="disabled" id="btn-po">PLACE ORDER</button>
            <span class="tooltiptext">Choose your payment</span>
            <?php
                \Session::put('cart_Id', $cartId)
            ?>
        </div>
        
    </div>
</div>



<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/livewire/details-check-out-form.blade.php ENDPATH**/ ?>