
<?php $__env->startSection('title', 'Purchase History'); ?>
<?php $__env->startSection('content1'); ?>

<style>
    .profile .options .transaction {
        border-left: var(--blue) solid .5rem;
        color: var(--black);
    }
</style>

<div class="information">

    <div class="settings">
        <p class="title-settings title"><?php echo e(__('purchase history')); ?></p>
        <p class="content-settings"><?php echo e(__('View your account payment details and transactions.')); ?></p>
    </div>

    <?php if(empty($trans)): ?>
    <div class="purchase-history" style="text-align: center; font-weight: 400">No charges have been made to your account yet</div>
    <?php else: ?>

    <div class="purchase-history">
        <table style="width: 100%">
            <tr class="ph-title">
                <td>DATE</th>
                <td>DESCRIPTION</th>
                <td>PRICE</th>
                <td>STATUS</th>
                <td>DETAILS</th>
            </tr>
        <?php $__currentLoopData = $trans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tran): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr class="ph-list">
                <td><?php echo e($tran->date); ?></td>
                <td>
                    <a href="/game/<?php echo e($tran->gameId); ?>"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $tran->gameId))); ?></a>
                </td>
                <td>-$<?php echo e(round($tran->gamePrice * (1 - $tran->gameSale / 100), 2)); ?></td>
                <td>
                    <?php if($tran->status != 0): ?> 
                    Purchased
                    <?php else: ?>
                    Processing
                    <?php endif; ?>
                </td>
                <td><a href="#" onclick="showDetails(document.querySelector('[data-transactions-<?php echo e($tran->gameId); ?>]'))">Details</a></td>
            </tr>
            <tr class="ph-list">
                <td></td>
                <td class="ph-list-hide" data-transactions-<?php echo e($tran->gameId); ?>>
                    <span style="font-weight: 800; margin-block-end: 10px; display: flex; gap: 10px">
                        Order ID: <p><?php echo e($tran->orderId); ?></p>
                    </span>
                    <?php
                        $date = Carbon\Carbon::parse($tran->date, 'Asia/Ho_Chi_Minh');
                        $now = Carbon\Carbon::now('UTC');

                        $diff = $date->diffForHumans($now);
                    ?>
                    <span style="font-weight: 600; margin-block-end: 10px; display: flex; gap: 50px;"><?php echo e($diff); ?>.</span>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
    </div>

    <?php endif; ?>

</div>

<script>
    const showDetails = function (details) {
        details.classList.toggle("active");
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('user.profile.layouts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/user/profile/transactions.blade.php ENDPATH**/ ?>