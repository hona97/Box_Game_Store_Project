<div>
    <?php if($paginator->hasPages()): ?>
        <?php (isset($this->numberOfPaginatorsRendered[$paginator->getPageName()]) ? $this->numberOfPaginatorsRendered[$paginator->getPageName()]++ : $this->numberOfPaginatorsRendered[$paginator->getPageName()] = 1); ?>
        
        <nav>
            <ul class="pagination">
                
                <?php if($paginator->onFirstPage()): ?>
                <?php else: ?>
                    <li class="page-item">
                        <button type="button" dusk="previousPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>" class="number" wire:click="previousPage('<?php echo e($paginator->getPageName()); ?>')" wire:loading.attr="disabled" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">&lsaquo;</button>
                    </li>
                <?php endif; ?>

                
                <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                    <?php if(is_string($element)): ?>
                        <li class="page-item disabled" aria-disabled="true"><span class="number"><?php echo e($element); ?></span></li>
                    <?php endif; ?>

                    
                    <?php if(is_array($element)): ?>
                        <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                            <?php if($paginator->currentPage() > 4 && $page === 3): ?>
                                <span class="number">...</span>
                            <?php endif; ?>

                            <?php if($page == $paginator->currentPage()): ?>
                                <li class="page-item" wire:key="paginator-<?php echo e($paginator->getPageName()); ?>-<?php echo e($this->numberOfPaginatorsRendered[$paginator->getPageName()]); ?>-page-<?php echo e($page); ?>" aria-current="page"><span class="number" style="color: var(--text-white); font-weight: 700; font-size: 17px"><?php echo e($page); ?></span></li>
                            <?php elseif($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() - 1 || $page == 1 || $page == $paginator->lastPage() || ($paginator->currentPage() <= 4 && $page <= 5 && $page > 1) || ($paginator->currentPage() >= $paginator->lastPage() - 3 && $page >= $paginator->lastPage() - 4 && $page < $paginator->lastPage())): ?>
                                <li class="page-item" wire:key="paginator-<?php echo e($paginator->getPageName()); ?>-<?php echo e($this->numberOfPaginatorsRendered[$paginator->getPageName()]); ?>-page-<?php echo e($page); ?>"><button type="button" class="number" wire:click="gotoPage(<?php echo e($page); ?>, '<?php echo e($paginator->getPageName()); ?>')"><?php echo e($page); ?></button></li>
                            <?php endif; ?>

                            <?php if($paginator->currentPage() <= $paginator->lastPage() - 4 && $page === $paginator->lastPage() - 1): ?>
                                <span class="number">...</span>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                
                <?php if($paginator->hasMorePages()): ?>
                    <li class="page-item">
                        <button type="button" dusk="nextPage<?php echo e($paginator->getPageName() == 'page' ? '' : '.' . $paginator->getPageName()); ?>" class="number" wire:click="nextPage('<?php echo e($paginator->getPageName()); ?>')" wire:loading.attr="disabled" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">&rsaquo;</button>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
    <?php endif; ?>
</div>

<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/pagination-links.blade.php ENDPATH**/ ?>