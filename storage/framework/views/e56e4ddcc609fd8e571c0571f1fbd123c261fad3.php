<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Your Password | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/styleauth.css')); ?>">
</head>
<body>
    
    <div class="form-container">
        <form action="<?php echo e(route('password.update')); ?>" method="post">

            <?php echo csrf_field(); ?>

            <img src=" <?php echo e(asset('assets_home/images/boxlogo.png')); ?> " alt="">

            <h5><?php echo e(__('Reset Your Password ?')); ?></h4>

            <input type="hidden" name="token" value="<?php echo e($request->route('token')); ?>">

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
unset($__errorArgs, $__bag); ?>" value="<?php echo e(old('email', $request->email)); ?>" autocomplete="email">
                
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
            
            </div>

            <div class="box">
                
                <label for="password"><?php echo e(__('New Password')); ?></label>
                <input id="password" type="password" name="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="new-password">
                
            </div>

            <?php $__errorArgs = ['password'];
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

            <div class="box">

                <label for="password-confirm"><?php echo e(__('Confirm Password')); ?></label>
                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
            
            </div>

            <input type="submit" name="submit" value="<?php echo e(__('reset password')); ?>" class="btn">

        </form>

    </div>

</body>
</html><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/auth/password/resetpassword.blade.php ENDPATH**/ ?>