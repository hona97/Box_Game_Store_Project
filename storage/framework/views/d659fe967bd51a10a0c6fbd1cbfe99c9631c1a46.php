<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in to Your Box Game Account | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/styleauth.css')); ?>">
</head>

<body>

    <div class="form-container">
        <form action="<?php echo e(route('handlelogin')); ?>" method="post">

            <?php echo csrf_field(); ?>
            <img src=" <?php echo e(asset('assets_home/images/boxlogo.png')); ?> " alt="">

            <h4><?php echo e(__('Sign In')); ?></h4>

            <?php if(session()->has('status')): ?>
                <div class="valid-feedback">
                    <?php echo e(session()->get('status')); ?>

                </div>
            <?php endif; ?>

            <?php if(session()->has('error')): ?>
                <div class="invalid-feedback">
                    <?php echo e(session()->get('error')); ?>

                </div>
            <?php endif; ?>

            <div class="box">

                <label for="display_name"><?php echo e(__('Display Name *')); ?></label>
                <input id="display_name" type="text" class="<?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    name="display_name" value="<?php echo e(old('display_name')); ?>" autocomplete="display_name" autofocus>

            </div>

            <?php $__errorArgs = ['display_name'];
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

                <label for="password"><?php echo e(__('Password *')); ?></label>
                <input id="password" type="password" name="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    autocomplete="current-password">

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

            <div class="check">

                <div class="checkbox">
                    <input type="checkbox" name="remember" id="remember"
                        value="<?php echo e(old('remember') ? 'checked' : ''); ?>">
                    <label for="remember"><?php echo e(__('Remember me')); ?></label>
                </div>

                <?php if(Route::has('password.request')): ?>
                    <a href="<?php echo e(route('password.request')); ?>"><?php echo e(__('Forgot Your Password')); ?></a>
                <?php endif; ?>
            </div>

            <input type="submit" name="submit" value="<?php echo e(__('log in')); ?>" class="btn">

            <p><a href="#"><?php echo e(__('Privacy Policy')); ?></a></p>
            <p><a href="/admin"><?php echo e(__('For Manager Only')); ?></a></p>

            <p>
                <?php echo e(__('Don\'t have a Box Game Account ? ')); ?><a href="register"><?php echo e(__('Sign Up')); ?></a><br>
                <?php echo e(__('Back to ')); ?><a href="#"><?php echo e(__('all sign up options')); ?></a>
            </p>

        </form>

    </div>

</body>

</html>
<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/auth/login.blade.php ENDPATH**/ ?>