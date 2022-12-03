
<?php $__env->startSection('title', 'Change Your Password'); ?>
<?php $__env->startSection('content1'); ?>

<style>
    .profile .options .password {
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">
    <div class="password">
        <p class="title"><?php echo e(__('change your password')); ?></p>
        <p class="content-password"><?php echo e(__('For your security, we highly recommend that you choose a unique password that you don\'t use for any other online account.')); ?></p>
    </div>
    
    <form action="<?php echo e(route('updatepassword')); ?>" method="post" id="evaluationForm">
        <?php echo csrf_field(); ?>
        <div class="form">
            <div class="action">
                <label class="title" for="">current password</label>
                <div class="box">
                    <label for="current_password"><?php echo e(__('Current Password *')); ?></label>
                    <input id="current_password" type="password" class="<?php $__errorArgs = ['current_password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        name="current_password" autocomplete="current_password" autofocus>
                </div>

                <?php $__errorArgs = ['current_password'];
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

                <label class="title" for="">new password</label>
                <div class="box">
                    <label for="password"><?php echo e(__('New Password *')); ?></label>
                    <input id="password" type="password" name="password" class="<?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        autocomplete="password">
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

                <label class="title" for="">retype new password</label>
                <div class="box">
                    <label for="password_confirmation"><?php echo e(__('Retype New Password *')); ?></label>
                    <input id="password_confirmation" type="password" name="password_confirmation" class="<?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    autocomplete="password_confirmation">
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
            </div>
            <div class="rules">
                <label class="title" for="">your password</label>
                <span>Your password must have 8+ characters and maxinum 15 characters</span>
                <span>Your password must have at least 1 number and 1 letter</span>
                <span>Your password must contain no special characters and no space(s)</span>
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
            </div>
        </div>
        <div class="btn_change_pass">
            <div class="discard">
                <button type="button" id="evaluationFormEditCancel">discard changes</button>
            </div>
            <div class="save">
                <input type="submit" name="submit" value="<?php echo e(__('save changes')); ?>" id="evaluationFormEdit">
            </div>
        </div>
    </form>

    <div class="signout_container">
        <div class="infor_signout">
            <p class="title"><?php echo e(__('signout everywhere')); ?></p>
            <span>Sign out everywhere else your Box Game account is being used, including all other browsers, phones, consoles, or any other devices</span>
        </div>
        <div class="btn_signout" onclick="showsignoutForm()">
            signout other sessions
        </div>
    </div>
    <?php if(session()->has('status1')): ?>
        <div class="valid-feedback">
            <?php echo e(session()->get('status1')); ?>

        </div>
    <?php endif; ?>
    <?php if(session()->has('error1')): ?>
        <div class="invalid-feedback">
            <?php echo e(session()->get('error1')); ?>

        </div>
    <?php endif; ?>
</div>

<div class="signout-form-container" data-signout>

    <form action="<?php echo e(route('logoutEverywhere')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div id="close-signout-btn" class="fas fa-times" onclick="showsignoutForm()"></div>
        <img src=" <?php echo e(asset('assets_home/images/boxlogo1.png')); ?> " alt="">
        <h4><?php echo e(__('Log Out Other Browser Sessions')); ?></h4>
        <span>
            <?php echo e(__('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.')); ?>

        </span>

        <div class="box">
            <div class="input">
                <label for="password"><?php echo e(__('Current Password *')); ?></label>
                <input id="password" type="password" name="password" autocomplete="password" autofocus>
            </div>
        </div>

        <input type="submit" name="submit" value="<?php echo e(__('signout')); ?>" class="btn">
    </form>

</div>

<script src="<?php echo e(asset('assets_home/js/scriptsecurity.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/profile/passwordandsecurity.blade.php ENDPATH**/ ?>