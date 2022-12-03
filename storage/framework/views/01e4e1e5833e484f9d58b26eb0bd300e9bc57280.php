
<?php $__env->startSection('title', 'Personal Details'); ?>
<?php $__env->startSection('content1'); ?>

<style>
    .profile .options .accountsettings {
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">

    <div class="settings">
        <p class="title-settings title"><?php echo e(__('account settings')); ?></p>
        <p class="content-settings"><?php echo e(__('Manage your account’s details.')); ?></p>
    </div>

    <div class="info">
        <p class="title-info title"><?php echo e(__('account information')); ?></p>
        <div class="content-info">
            <div class="displayname change">
                <label for="displayname"><?php echo e(__('display name')); ?></label>
                <input id="name-info" type="text" name="displayname" class="<?php $__errorArgs = ['displayname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(Auth::user()->userID); ?>" autocomplete="displayname" disabled>
            </div>

            <div class="changename change1 fa-solid fa-user-pen" onclick="showchangenameForm()"></div>

            <div class="email change">
                <label for="email"><?php echo e(__('email address')); ?></label>
                <input id="email-info" type="text" name="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(Auth::user()->email); ?>" autocomplete="email" disabled>
            </div>

            <div class="changeemail change1 fa-solid fa-user-pen" onclick="showchangeemailForm()"></div>

            <?php if(session()->has('status')): ?>
            <div class="valid-feedback">
                <?php echo e(session()->get('status')); ?>

            </div>
            <?php endif; ?>

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
    </div>
    <form action="<?php echo e(route('handleaccountsettings')); ?>" method="post" enctype="multipart/form-data" id="evaluationForm">
        <?php echo csrf_field(); ?>
        <div class="personal-details">
            <p class="title-details title"><?php echo e(__('personal details')); ?></p>
            <p class="content-details1"><?php echo e(__('Manage your name and contact info. These personal details are private and will not be displayed to other users. View our Privacy Policy.')); ?></p>
            <div class="content-details2">
                <div class="details-input">
                    <label for="name"><?php echo e(__('full name')); ?></label>
                    <input id="name" type="text" name="name" class="<?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" value="<?php echo e(Auth::user()->username); ?>">
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
                <div class="ava">
                    <label for="ava"><?php echo e(__('avatar')); ?></label>
                    <img id="previewImage" src="<?php echo e(asset(Auth::user()->image)); ?>" alt="">
                    <input type="file" onchange="previewFile(this);" id="ava" name="ava" class="image_preview"></input>
                </div>

                <?php if(session()->has('status1')): ?>
                <div class="valid-feedback">
                    <?php echo e(session()->get('status1')); ?>

                </div>
                <?php endif; ?>
                
                <div class="discardorsave">
                    <button type="button" id="evaluationFormEditCancel">discard changes</button>
                    <input class="save" type="submit" value="save changes" name="" id="evaluationFormEdit">
                </div>
                
            </div>
        </div>
    </form>

    <div class="delete">
        <p class="title-delete title"><?php echo e(__('delete account')); ?></p>
        <div class="content-delete">
            <p class="content-delete1">
                <?php echo e(__('Delete your Box Game account including all personal information, purchases, game progress, in-game content, and Unreal projects. Your account will be permanently deleted in 14 days.')); ?>

            </p>
            <div class="delete_account" onclick="showdeleteForm()">
                delete account
            </div>
        </div>
    </div>

</div>

<div class="changename-form-container" data-changename>

    <form action="<?php echo e(route('handleaccountsettingss')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div id="close-changename-btn" class="fas fa-times" onclick="showchangenameForm()"></div>
        <img src=" <?php echo e(asset('assets_home/images/boxlogo1.png')); ?> " alt="">
        <h4><?php echo e(__('Add Your New Display Name')); ?></h4>
        <div class="box box1">
            <div class="input">
                <label for="new_displayname"><?php echo e(__('New Name *')); ?></label>
                <input id="new_displayname" type="text" class="<?php $__errorArgs = ['new_displayname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_displayname" value="<?php echo e(old('new_displayname')); ?>" autocomplete="new_displayname" autofocus>
            </div>
            <div class="rules">
                <i class="fa-regular fa-circle-question">
                    <span class="tooltiptext"><?php echo e(__('Your display name must be between 3 and 15 characters, no special characters and no space(s)')); ?></span>
                </i>               
            </div>
        </div>

        <?php $__errorArgs = ['new_displayname'];
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
            <div class="input">
                <label for="new_displayname_confirmation"><?php echo e(__('Confirm Name *')); ?></label>
                <input id="new_displayname_confirmation" type="text" class="<?php $__errorArgs = ['new_displayname_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="new_displayname_confirmation" value="<?php echo e(old('new_displayname_confirmation')); ?>" autocomplete="new_displayname_confirmation" autofocus>
            </div>
        </div>

        <?php $__errorArgs = ['new_displayname_confirmation'];
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
            <input type="checkbox" name="agree" class="<?php $__errorArgs = ['agree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="agree">
            <label for="agree"><?php echo e(__('I agree to change my displayname.')); ?></label>
        </div>

        <?php $__errorArgs = ['agree'];
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

        <input type="submit" name="submit" value="<?php echo e(__('confirm')); ?>" class="register-btn btn">
    </form>

</div>

<div class="changeemail-form-container" data-changeemail>

    <form action="<?php echo e(route('handleaccountsettingsss')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div id="close-changeemail-btn" class="fas fa-times" onclick="showchangeemailForm()"></div>
        <img src=" <?php echo e(asset('assets_home/images/boxlogo1.png')); ?> " alt="">
        <h4><?php echo e(__('Add Your New Email')); ?></h4>
        <div class="box">
            <div class="input">
                <label for="email"><?php echo e(__('New Email *')); ?></label>
                <input id="email" type="email" class="<?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="email" value="<?php echo e(old('email')); ?>" autocomplete="email" autofocus>
            </div>
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

        <div class="checkbox">
            <input type="checkbox" name="agree" class="<?php $__errorArgs = ['agree'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="agree">
            <label for="agree"><?php echo e(__('I agree to change my email.')); ?></label>
        </div>

        <?php $__errorArgs = ['agree'];
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

        <input type="submit" name="submit" value="<?php echo e(__('confirm')); ?>" class="register-btn btn">
    </form>

</div>


<div class="delete-form-container" data-delete>

    <form action="<?php echo e(route('deleteuser')); ?>" method="post">
        <?php echo csrf_field(); ?>
        <div id="close-delete-btn" class="fas fa-times" onclick="showdeleteForm()"></div>
        <img src=" <?php echo e(asset('assets_home/images/boxlogo1.png')); ?> " alt="">
        <h4><?php echo e(__('Delete Your Account')); ?></h4>
        <span class="span1">
            <?php echo e(__('Are you sure you want to delete your Box Game account? If you’re having problems, please contact player support who can help.')); ?>

        </span>
        <span class="span2">
            <?php echo e(__('Deleting your account will remove access to Box Game like Fortnite. Personal information, purchases, game progress, in-game content, and Unreal projects will also be permanently deleted.')); ?>

        </span>

        <a href="<?php echo e(route('deleteuser')); ?>" class="register-btn btn">
            <?php echo e(__('delete')); ?>

        </a>
        <div class="cancel" onclick="showdeleteForm()">
            <?php echo e(__('cancel')); ?>

        </div>
    </form>

</div>
<script src="<?php echo e(asset('assets_home/js/scriptprofile.js')); ?>" defer></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/profile/accountsettings.blade.php ENDPATH**/ ?>