
<?php $__env->startSection('title'); ?>
    <?php if(isset($game)): ?>
        Box Game | <?php echo e($gameName); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('header-specific'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets_home/css/tabs.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section class="section" data-section>

        <div class="container bodydetails">

            <div class="gamename">
                <h1><?php echo e($gameName); ?></h1>
            </div>

            <div class="smallinfo">
                
                <div class="rating">
                    <?php if($avg_star == 0): ?>
                        <p>Not rated yet</p>
                    <?php else: ?>
                        <?php $star =  $avg_star ?>
                        <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <span class="fa-stack" style="width:1em">
                                <i class="far fa-star fa-stack-1x"></i>
                                <?php if($star > 0): ?>
                                    <?php if($star > 0.5): ?>
                                        <i class="fas fa-star fa-stack-1x"></i>
                                    <?php else: ?>
                                        <i class="fas fa-star-half fa-stack-1x"></i>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php $star--; ?>
                            </span>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <span style="margin-left: 1px"><?php echo e($avg_star); ?></span>
                    <?php endif; ?>
                </div>
            </div>

            <div class="overview">
                <a href="">Overview</a>
            </div>

            <div class="details">
                <div class="imgs">
                    <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                        class="swiper mySwiper2 detailsswiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="<?php echo e(asset("$game->banner")); ?>">
                            </div>
                            <?php $__currentLoopData = File::glob($game->gameplay . '/*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide"><img src="<?php echo e(asset(str_replace(public_path(), '', $path))); ?>"
                                        alt="<?php echo e(str_replace(public_path(), '', $path)); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                    </div>
                    <div thumbsSlider="" class="swiper mySwiper detailsswiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide"><img src="<?php echo e(asset("$game->banner")); ?>">
                            </div>
                            <?php $__currentLoopData = File::glob($game->gameplay . '/*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="swiper-slide"><img src="<?php echo e(asset(str_replace(public_path(), '', $path))); ?>"
                                        alt="<?php echo e(str_replace(public_path(), '', $path)); ?>">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                        <div class="swiper-button-next bb"></div>
                        <div class="swiper-button-prev bb"></div>

                    </div>
                    <div class="description">

                        <div class="description1">
                            <p style="text-align: left;">
                                <?php echo e($game->description); ?>

                            </p>
                        </div>

                        <div class="description2">
                            <div class="genres">
                                <p class="genres2">Genres</p>
                                <p class="genres1">
                                    <?php $__currentLoopData = $cate; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <a href="/browse"><?php echo e(str_replace('_', ' ', $type->type)); ?></a>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                            </div>

                        </div>

                        <div class="description3">
                            <?php if($game->price == 0): ?>
                                <span>
                                    Get <?php echo e($gameName); ?> for free now
                                </span>
                            <?php elseif($game->price != 0 && $game->sale == 0): ?>
                                <span>
                                    <?php echo e($gameName); ?> is available now
                                </span>
                            <?php else: ?>
                                <span>
                                    <?php echo e($gameName); ?> is available now -
                                    Get <?php echo e($game->sale); ?>% off
                                </span>
                            <?php endif; ?>

                        </div>

                        <div class="description4">
                            <div class="head">
                                <h4>
                                    About <?php echo e($gameName); ?>

                                </h4>
                            </div>
                            <div class="body">
                                <p><?php echo e($game->about); ?></p>
                                <div class="load">
                                    <div class="show" ng-click="loadMore()">
                                        show more
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="info" data-info>

                    <div class="name">
                        <img src="<?php echo e(asset("$game->icon")); ?>" alt="">
                    </div>

                    <div class="box">

                        <label><?php echo e(__('base game')); ?></label>

                    </div>


                    <div class="price">
                        <?php if($game->price == 0): ?>
                            <span class="badge">
                                Get <?php echo e($gameName); ?> for free now
                            </span>
                        <?php else: ?>
                            <?php if($game->sale != 0): ?>
                                <span class="badge">-<?php echo e($game->sale); ?>%</span>
                                <del class="del">$<?php echo e($game->price); ?></del>
                                <span
                                    class="span">$<?php echo e(number_format($game->price * (1 - $game->sale / 100), 2, '.', '')); ?></span>
                            <?php else: ?>
                                <span class="span">$<?php echo e($game->price); ?></span>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                    <?php if($game->price != 0): ?>
                        
                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('details-add-cart', ['gameId' => $game->gameId])->html();
} elseif ($_instance->childHasBeenRendered('WBb9rvC')) {
    $componentId = $_instance->getRenderedChildComponentId('WBb9rvC');
    $componentTag = $_instance->getRenderedChildComponentTagName('WBb9rvC');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('WBb9rvC');
} else {
    $response = \Livewire\Livewire::mount('details-add-cart', ['gameId' => $game->gameId]);
    $html = $response->html();
    $_instance->logRenderedChild('WBb9rvC', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php else: ?>
                            <div class="deal">
                                <button type="button" class="buy">download now</button>
                            </div>
                    <?php endif; ?>
                    <div class="refund">
                        <span class="title">Refund Type</span>
                        <span class="informa">
                            Self-Refundable
                            <ion-icon name="help-circle-outline"></ion-icon>
                        </span>
                    </div>
                    <div class="developer">
                        <span class="title">Developer</span>
                        <span class="informa"><a href="<?php echo e($game->developer_web); ?>"><?php echo e($game->developer); ?></a></span>
                    </div>
                    <div class="publisher">
                        <span class="title">Publisher</span>
                        <span class="informa">Box Game Publishing</span>
                    </div>
                    <div class="release">
                        <span class="title">Release Date</span>
                        <span class="informa"><?php echo e(date('d-m-Y', strtotime($game->release_date))); ?></span>
                    </div>
                    <div class="platform">
                        <span class="title">Platform</span>
                        <span class="informa">
                            <?php $__currentLoopData = $sys_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php switch(strtolower($value->os)):
                                    case ('window'): ?>
                                        <ion-icon name="logo-windows"></ion-icon>
                                    <?php break; ?>

                                    <?php case ('mac'): ?>
                                        <ion-icon name="logo-apple"></ion-icon>
                                    <?php break; ?>

                                    <?php case ('xbox'): ?>
                                        <ion-icon name="logo-xbox"></ion-icon>
                                    <?php break; ?>

                                    <?php case ('linux'): ?>
                                        Linux
                                    <?php break; ?>

                                    <?php case ('ps'): ?>
                                        PS
                                    <?php break; ?>

                                    <?php default: ?>
                                        <ion-icon name="logo-windows"></ion-icon>
                                    <?php break; ?>
                                <?php endswitch; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </span>
                    </div>

                    <div class="shareandreport">
                        <div class="share">
                            <ion-icon name="share-social"></ion-icon>
                            <button>share</button>
                        </div>
                        <div class="report">
                            <ion-icon name="flag"></ion-icon>
                            <button>report</button>
                        </div>
                    </div>

                </div>
            </div>

            <div class="bottom">

                <div class="bottom1">

                    <div class="followus">
                        <h3>Follow Us</h3>
                        <span>
                            <a href="">
                                <ion-icon name="game-controller-outline"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="globe-outline"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                            <a href="">
                                <ion-icon name="logo-youtube"></ion-icon>
                            </a>
                        </span>
                    </div>

                    <div class="rating1">
                        <h2>Box Player Ratings</h2>
                        <p>Captured from players in the Box Game ecosystem.</p>
                        <span>
                            
                            <?php if($avg_star == 0): ?>
                                <p>Not rated yet, be the first one to review</p>
                            <?php else: ?>
                                <?php $star =  $avg_star ?>
                                <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span class="fa-stack" style="width:1em">
                                        <i class="far fa-star fa-stack-1x"></i>
                                        <?php if($star > 0): ?>
                                            <?php if($star > 0.5): ?>
                                                <i class="fas fa-star fa-stack-1x"></i>
                                            <?php else: ?>
                                                <i class="fas fa-star-half fa-stack-1x"></i>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php $star--; ?>
                                    </span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($avg_star); ?>

                            <?php endif; ?>
                        </span>
                    </div>

                    <div class="specifications">
                        <h3>Specifications</h3>
                        <div class="specifications1">
                            <div class="tabs">
                                <?php $__currentLoopData = $sys_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <input type="radio" name="tabs" id="<?php echo e($value->os); ?>"
                                        <?php if($key == 0): ?> <?php if(true): echo 'checked'; endif; ?> <?php endif; ?>>
                                    <label for="<?php echo e($value->os); ?>"><?php echo e(strtoupper($value->os)); ?></label>
                                    <div class="tab">
                                        <h5 class="title">System Requirements for <?php echo e(strtoupper($value->os)); ?></h5>
                                        <hr>
                                        <br>
                                        <div class="os">
                                            <h5>Version</h5>
                                            <p><?php echo e($value->version); ?></p>
                                        </div>
                                        <div class="processor">
                                            <h5>Processor</h5>
                                            <p><?php echo e($value->chip); ?></p>
                                        </div>
                                        <div class="memory">
                                            <h5>Memory</h5>
                                            <p><?php echo e($value->ram); ?></p>
                                        </div>
                                        <div class="graphics">
                                            <h5>Graphics</h5>
                                            <p><?php echo e($value->graphic); ?></p>
                                        </div>
                                        <div class="other">
                                            <h5>Storage</h5>
                                            <p><?php echo e($value->storage); ?></p>
                                        </div>
                                        <div class="logins">
                                            <h5>Logins</h5>
                                            <p>Requires Box Game account</p>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="languagessupported">
                                <h5>Languages Supported</h5>
                                <p>AUDIO: English | TEXT: English, French, German, Japanese, Korean, Polish, Portuguese
                                    - Brazil, Russian, Chinese - Simplified, Spanish - Spain</p>
                            </div>
                            <div class="end">
                                <p>Published by Box Game, Inc. © 2022. “Box Game” and the Box Game logo are
                                    registered trademarks or trademarks of Box Game, Inc. in the United States and
                                    other countries.</p>
                                <a href="">Privacy Policy</a>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>

    <div class="checkout">
        <div class="checkout-container" data-checkout>
            <?php if(Auth::check()): ?>
                <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('details-check-out-form', ['game' => $game])->html();
} elseif ($_instance->childHasBeenRendered('DZKITBu')) {
    $componentId = $_instance->getRenderedChildComponentId('DZKITBu');
    $componentTag = $_instance->getRenderedChildComponentTagName('DZKITBu');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('DZKITBu');
} else {
    $response = \Livewire\Livewire::mount('details-check-out-form', ['game' => $game]);
    $html = $response->html();
    $_instance->logRenderedChild('DZKITBu', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
            <?php endif; ?>
        </div>



        <div class="overlay-checkout" data-overlay-checkout></div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - custom js link
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -->
    <script src="https://cdn.jsdelivr.net/npm/cleave.js@1.6.0/dist/cleave.min.js"></script>
    <script src="<?php echo e(asset('assets_home/js/scriptdetails.js')); ?>"></script>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - ionicon link
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/home/game/details.blade.php ENDPATH**/ ?>