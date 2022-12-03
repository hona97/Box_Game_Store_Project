<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Box Game Account Password | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/styleauth.css')); ?>">
</head>
<body>
    
    <div class="form-container">
        <form action="<?php echo e(route('password.email')); ?>" method="post">

            <?php echo csrf_field(); ?>

            <img src="<?php echo e(asset('assets_home/images/boxlogo.png')); ?>" alt="">

            <h5><?php echo e(__('Forgot you password ?')); ?></h4>

            <p style="text-align: left;">
                <?php echo e(__('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.')); ?>

            </p>

            <?php if(session()->has('status')): ?>
            <div class="valid-feedback">
                <?php echo e(session()->get('status')); ?>

            </div>
            <?php endif; ?>

            <div class="box">
                
                <label for="email"><?php echo e(__('Email Address *')); ?></label>
                <input id="email" type="email" name="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email')); ?>" autocomplete="email">
            
            </div>

            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <span class="invalid-feedback" role="alert">
                <strong><?php echo e($message); ?></strong>
            </span>
            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

            <input type="submit" name="submit" value="<?php echo e(__('send mail')); ?>" class="btn">

            <p>
                <?php echo e(__('Remember your password ? ')); ?><a href="login"><?php echo e(__('Sign In')); ?></a><br>
            </p>

        </form>

    </div>

</body>
</html><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/auth/password/forgetpassword.blade.php ENDPATH**/ ?>