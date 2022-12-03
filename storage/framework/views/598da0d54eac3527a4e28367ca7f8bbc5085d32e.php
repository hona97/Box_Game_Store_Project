
<?php $__env->startSection('title', 'Payment Methods'); ?>
<?php $__env->startSection('content1'); ?>

<style>
    .profile .options .payment{
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">

    <div class="payment">
        <p class="title"><?php echo e(__('payment management')); ?></p>
        <p class="content-payment"><?php echo e(__('View your payment activity and the current balance of your BoxGame account. View our Privacy Policy.')); ?></p>
    </div>

    <p class="your_payment"><?php echo e(__('your payment methods')); ?></p>
    
    <div class="add_or_manage">
        <?php
            $i = 5;
            $paypal = 0;
            $visa = 0;
            $master = 0;
            $vnpay = 0;
            $momo = 0;       
        ?>
        
        <p class="content_add_or_manage"><?php echo e(__('Add or manage payment methods associated with your Epic Games Account.')); ?></p>
        
        <div class="manage">
            <div class="payment-show1" onclick="showpayment1()">
                <span class="payment-name1">manage paymentmethod</span>

                <span class="btn-showmethod1">
                    <ion-icon name="chevron-down-outline" data-arrow1 class="arrow-custom"></ion-icon>
                </span>
            </div>

            <div class="payment-hide1" data-payment-hide1>
                <ul>
                    <?php $__empty_1 = true; $__currentLoopData = $payments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <?php if($payment->userID == Auth::user()->userID): ?>
                            <?php
                                $i++;
                                $function = 'showpaymentdetails' . $i . '()';
                                $data = 'data-paymenthide-hide' . $i;
                            ?>
                            <?php if($payment->card_name == 'paypal' || $payment->card_name == 'vnpay' || $payment->card_name == 'momo'): ?>
                                <li class="payment-hide-item1">
                                    <div class="title_payment1" onclick="<?php echo e($function); ?>">
                                        <input type="radio" name="payment1">
                                        <img src="<?php echo e(asset($payment->image)); ?>" alt="">
                                        <label for=""><?php echo e($payment->card_name); ?></label>
                                    </div>
                                            
                                    <div class="content_payment1" <?php echo e($data); ?>>
                                        <form class="detailspayment1" action="<?php echo e(url("paymentdelete/{$payment->cardId}")); ?>" method="get">
                                            <?php echo csrf_field(); ?>
                                            <span>You don't want to use <?php echo e($payment->card_name); ?> ?</span>
                                            <div class="payment_btn1">
                                                <input type="submit" class="submit1" value="<?php echo e(__('delete')); ?>">
                                            </div>                                  
                                        </form>                        
                                    </div>
                                </li>
                            <?php elseif($payment->card_name == 'visa'): ?>
                                <li class="payment-hide-item1">
                                    <div class="title_payment1" onclick="<?php echo e($function); ?>">
                                        <input type="radio" name="payment1">
                                        <img src="<?php echo e(asset($payment->image)); ?>" alt="">
                                        <label for=""><?php echo e($payment->card_name); ?></label>
                                    </div>
                                            
                                    <div class="content_payment1" <?php echo e($data); ?>>
                                        <div class="card_details1">card details</div>
                                        <form class="detailspayment1" action="<?php echo e(url("payment/{$payment->cardId}")); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="payment-form-item1 card_number1">
                                                <label for="card_number"><?php echo e(__('Card Number *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number" value="<?php echo e($payment->card_number); ?>">        
                                            </div>
                                            <div class="payment-form-item1 card_expi1">
                                                <label for="expiration"><?php echo e(__('Expiration *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['expiration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration" value="<?php echo e($payment->payment_date); ?>">
                                            </div>
                                            <div class="payment-form-item1 card_cvv1">
                                                <label for="cvv"><?php echo e(__('CVV *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['cvv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv" value="<?php echo e($payment->cvv); ?>">
                                            </div>
                                            <div class="payment_btn">
                                                <a href="<?php echo e(url("paymentdelete/{$payment->cardId}")); ?>">delete</a>
                                                <input type="submit" class="submit1" value="<?php echo e(__('update')); ?>">
                                            </div>                                  
                                        </form>                        
                                    </div>
                                </li>
                            <?php else: ?>
                                <li class="payment-hide-item1">
                                    <div class="title_payment1" onclick="<?php echo e($function); ?>">
                                        <input type="radio" name="payment1">
                                        <img src="<?php echo e(asset($payment->image)); ?>" alt="">
                                        <label for=""><?php echo e($payment->card_name); ?></label>
                                    </div>
                                            
                                    <div class="content_payment1" <?php echo e($data); ?>>
                                        <div class="card_details1">card details</div>
                                        <form class="detailspayment1" action="<?php echo e(url("payment/{$payment->cardId}")); ?>" method="post">
                                            <?php echo csrf_field(); ?>
                                            <div class="payment-form-item1 card_number1">
                                                <label for="card_number1"><?php echo e(__('Card Number *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['card_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="17" maxlength="19" placeholder="xxxx-xxxx-xxxx-xxxx" name="card_number" id="card_number1" value="<?php echo e($payment->card_number); ?>">        
                                            </div>
                                            <div class="payment-form-item1 card_expi1">
                                                <label for="expiration1"><?php echo e(__('Expiration *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['expiration'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" maxlength="5" placeholder="xx/xx" name="expiration" id="expiration1" value="<?php echo e($payment->payment_date); ?>">
                                            </div>
                                            <div class="payment-form-item1 card_cvv1">
                                                <label for="cvv1"><?php echo e(__('CVV *')); ?></label>
                                                <input type="text" class="<?php $__errorArgs = ['cvv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv1" value="<?php echo e($payment->cvv); ?>">
                                            </div>
                                            <div class="payment_btn">
                                                <a href="<?php echo e(url("paymentdelete/{$payment->cardId}")); ?>">delete</a>
                                                <input type="submit" class="submit1" value="<?php echo e(__('update')); ?>">
                                            </div>                                  
                                        </form>                        
                                    </div>
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
                        <span>No payment methods added.</span>
                    <?php endif; ?>
                    <?php if(session()->has('status')): ?>
                        <div class="valid-feedback">
                            <?php echo e(session()->get('status')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(session()->has('status2')): ?>
                        <div class="invalid-feedback">
                            <?php echo e(session()->get('status2')); ?>

                        </div>
                    <?php endif; ?>
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
                </ul>
            </div>
        </div>

        <div class="add">
            <div class="payment-show" onclick="showpayment()">
                <span class="payment-name">add paymentmethod</span>

                <span class="btn-showmethod">
                    <ion-icon name="chevron-down-outline" data-arrow class="arrow-custom"></ion-icon>
                </span>
            </div>

            <div class="payment-hide" data-payment-hide>
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
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails1()">
                                <input type="radio" name="payment">
                                <img src="<?php echo e(asset('assets_home/images/paypal.png')); ?>" alt="">
                                <label for="">PayPal</label>
                            </div>
                                    
                            <div class="content_payment" data-paymenthide-hide1>
                                <form class="detailspayment" action="<?php echo e(route('addpayment1')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="paymentname" value="paypal" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/paypal.png" id="">
                                    <span>You will be directed to PayPal to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                    <input type="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                </form>                        
                            </div>
                        </li>
                        <?php endif; ?>

                        <?php if($vnpay == 0): ?>
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails4()">
                                <input type="radio" name="payment">
                                <img src="<?php echo e(asset('assets_home/images/vnpay.png')); ?>" alt="">
                                <label for="">VN Pay</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide4>
                                <div class="card_details">card details</div>
                                <form class="detailspayment" action="<?php echo e(route('addpayment1')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="paymentname" value="vnpay" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/vnpay.png" id="">
                                    <span>You will be directed to VNPay to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                    <input type="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                </form>                        
                            </div>
                        </li>
                        <?php endif; ?>

                        <?php if($momo == 0): ?>
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails5()">
                                <input type="radio" name="payment">
                                <img src="<?php echo e(asset('assets_home/images/momo.png')); ?>" alt="">
                                <label for="">Momo</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide5>
                                <div class="card_details">card details</div>
                                <form class="detailspayment" action="<?php echo e(route('addpayment1')); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="paymentname" value="momo" id="">
                                    <input type="hidden" name="paymentimage" value="assets_home/images/momo.png" id="">
                                    <span>You will be directed to Momo to authorize your payment method, then you will be returned to Box Game to complete this purchase.</span>
                                    <input type="submit" name="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                </form>                        
                            </div>
                        </li>
                        <?php endif; ?>

                        <?php if($visa == 0): ?>
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails2()">
                                <input type="radio" name="payment">
                                <img src="<?php echo e(asset('assets_home/images/visa.jpg')); ?>" alt="">
                                <label for="">Visa</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide2>
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
                                        <input type="text" class="<?php $__errorArgs = ['cvv'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" minlength="3" maxlength="3" placeholder="xxx" name="cvv" id="cvv">
                                    </div>
                                    <input type="submit" class="submit" value="<?php echo e(__('save')); ?>">
                                </form>                        
                            </div>
                        </li>
                        <?php endif; ?>

                        <?php if($master == 0): ?>
                        <li class="payment-hide-item">
                            <div class="title_payment" onclick="showpaymentdetails3()">
                                <input type="radio" name="payment">
                                <img src="<?php echo e(asset('assets_home/images/master.png')); ?>" alt="">
                                <label for="">Master Card</label>
                            </div>

                            <div class="content_payment" data-paymenthide-hide3>
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
                <?php if(session()->has('status1')): ?>
                    <div class="invalid-feedback">
                        <?php echo e(session()->get('status1')); ?>

                    </div>
                <?php endif; ?>
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

</div>

<script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
<script src="<?php echo e(asset('assets_home/js/scriptpayment.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/profile/paymentmanagement.blade.php ENDPATH**/ ?>