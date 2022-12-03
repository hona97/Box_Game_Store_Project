<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register for a Box Game Account | Box Game</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/styleauth.css')); ?>">
</head>
<body>
    
    <div class="form-container">
        <form action="<?php echo e(route('handleregister')); ?>" method="post">

            <?php echo csrf_field(); ?>

            <img src=" <?php echo e(asset('assets_home/images/boxlogo.png')); ?> " alt="">

            <h4><?php echo e(__('Sign Up')); ?></h4>

            <div class="box"> 
                <div class="input">
                    <label for="name"><?php echo e(__('Full Name *')); ?></label>
                    <input id="name" type="text" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="name" value="<?php echo e(old('name')); ?>" autocomplete="name" autofocus>
                </div>
            </div>

            <?php $__errorArgs = ['name'];
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

            <div class="box box1">
                <div class="input">
                    <label for="display_name"><?php echo e(__('Display Name *')); ?></label>
                    <input id="display_name" type="text" class="<?php $__errorArgs = ['display_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="display_name" value="<?php echo e(old('display_name')); ?>" autocomplete="display_name" autofocus>
                </div>
                <div class="rules">
                    <i class="fa-regular fa-circle-question">
                        <span class="tooltiptext">Your display name must be between 3 and 15 characters, no special characters and no space(s)</span>
                    </i>               
                </div>
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

            <div class="box box1">
                <div class="input">
                    <label for="password"><?php echo e(__('Password *')); ?></label>
                    <input id="password" type="password" name="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" autocomplete="new-password">
                </div>             
                <div class="rules">
                    <i class="fa-regular fa-circle-question">
                        <span class="tooltiptext">Your password must be between 8 and 15 characters, at least 1 number, at least 1 letter, no special characters and no space(s)</span>
                    </i>               
                </div>
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

                <label for="password-confirm"><?php echo e(__('Confirm Password *')); ?></label>
                <input id="password-confirm" type="password" name="password_confirmation" autocomplete="new-password">
            
            </div>

            <?php $__errorArgs = ['password_confirmation'];
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

            <div class="checkbox">

                <input type="checkbox" name="receive_news" class="<?php $__errorArgs = ['receive_news'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="receive-news" checked>
                <label for="receive-news"><?php echo e(__('I would like to receive news, surveys and special offers from Box Game.')); ?></label>

            </div>

            <?php $__errorArgs = ['receive_news'];
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
            
            <div>
                <div class="checkbox">
                    
                    <input type="checkbox" name="terms_of_service" class="<?php $__errorArgs = ['terms_of_service'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="termsofservice" checked>
                    <label for="termsofservice"><?php echo e(__('I have read and agree to the ')); ?><a href="#"><?php echo e(__('terms of service')); ?></a></label>

                </div>

                <?php $__errorArgs = ['terms_of_service'];
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

            <input type="submit" name="submit" value="<?php echo e(__('register now')); ?>" class="register-btn btn">

            <p><a href="#"><?php echo e(__('Privacy Policy')); ?></a></p>

            <p>
                <?php echo e(__('Have a Box Game Account ? ')); ?><a href="<?php echo e(route('login')); ?>"><?php echo e(__('Sign In')); ?></a><br>
                <?php echo e(__('Back to ')); ?><a href="#"><?php echo e(__('all sign up options')); ?></a>
            </p>

        </form>

    </div>

</body>
</html><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/auth/register.blade.php ENDPATH**/ ?>