
<?php $__env->startSection('content'); ?>


<!-- 
    - #PROFILE
  -->

<div style="width: 100%; background: #f8f8f8">
  <section class="section section1">

    <div class="container container1">

      <div class="profile">

        <div class="options">
          <a href="<?php echo e(route('accountsettings')); ?>" class="accountsettings">
            <ion-icon name="person"></ion-icon>
            <div><?php echo e(__('account settings')); ?></div>
          </a>
          <div class="communication" id="login-btn">
            <ion-icon name="notifications"></ion-icon>
            <a href="#">communications</a>
          </div>
          <a href="<?php echo e(route('paymentmanagement')); ?>" class="payment">
            <ion-icon name="wallet"></ion-icon>
            <div><?php echo e(__('payment management')); ?></div>
          </a>
          <a href="<?php echo e(route('transactions')); ?>" class="transaction">
            <ion-icon name="timer"></ion-icon>
            <div>transactions</div>
          </a>
          <a href="<?php echo e(route('passwordandsecurity')); ?>" class="password">
            <ion-icon name="key"></ion-icon>
            <div><?php echo e(__('password & security')); ?></div>
          </a>
          <div class="redeem">
            <ion-icon name="gift"></ion-icon>
            <a href="#">redeem code</a>
          </div>
        </div>

        <div class="informations">
          <?php echo $__env->yieldContent('content1'); ?>
        </div>

      </div>

    </div>

  </section>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/profile/layouts.blade.php ENDPATH**/ ?>