<tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><img src="<?php echo e(asset($user->image)); ?>" width="50px" height="50px">
            </td>

            <td><?php echo e($user->userID); ?></td>
            <td><?php echo e($user->username); ?></td>
            
            <td><?php echo e($user->email); ?></td>
            <td>
                <?php if($user->blocked_at == null): ?>
                    <span class="btn btn-success">Active</span>
                <?php else: ?>
                    <span class="btn btn-danger">Inactive</span>
                <?php endif; ?>
            </td>
            <td>
                <?php if($user->blocked_at != null): ?>
                    <button class="btn btn-success"
                        wire:click.prevent="activateUser('<?php echo e($user->userID); ?>')">Activate</button>
                <?php else: ?>
                    <button class="btn btn-danger"
                        wire:click.prevent="deactivateUser('<?php echo e($user->userID); ?>')">Deactivate</button>
                <?php endif; ?>
                <button type="button" class="btn btn-danger" data-toggle="modal"
                    data-target="#delete<?php echo e($user->userID); ?>">Delete</button>
            </td>
        </tr>
        
        <div class="modal fade" id="delete<?php echo e($user->userID); ?>" tabindex="-1" role="dialog"
            aria-labelledby="demoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="text-center" style="color: red">WARNING !!!!!</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <h4>Confirm delete one of our customers ?</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="/admin/user/delete/<?php echo e($user->userID); ?>" class="btn btn-danger">DELETE</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">CANCEL</button>
                    </div>
                </div>

            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/livewire/active-user.blade.php ENDPATH**/ ?>