
<?php $__env->startSection('title', 'Box Game Store | Download & Play PC Games, Mods, DLC & More - Box Game'); ?>
<?php $__env->startSection('content'); ?>
    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - #HERO
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              -->

    <section class="section hero" id="home" aria-label="hero" data-section>
        <div class="container">

            <ul class="has-scrollbar">
                <?php $count = 0; ?>
                <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if ($count == 5) {
                        break;
                    } ?>
                    <?php if($value->top_page == 1): ?>
                        <li class="scrollbar-item carousel">
                            <div class="hero-card has-bg-image"
                                style="background-image: url('<?php echo e(asset("$value->banner")); ?>')">

                                <div class="card-content">
                                    
                                    <?php if($value->price == 0): ?>
                                        <span class="hero-title">
                                            PLAY NOW
                                        </span>
                                        <p class="hero-text">
                                            Play <?php echo e(str_replace('_', ' ', str_replace('__', ': ', $value->gameId))); ?>

                                        </p>
                                        <a href="/game/<?php echo e($value->gameId); ?>" class="btn btn-primary">DOWNLOAD NOW FOR
                                            FREE</a>
                                    <?php else: ?>
                                        <span class="hero-title">
                                            BUY NOW
                                        </span>
                                        <p class="hero-text">
                                            Buy <?php echo e(str_replace('_', ' ', str_replace('__', ': ', $value->gameId))); ?>

                                        </p>
                                        <p class="price">Starting at <?php echo e($value->price); ?></p>
                                        <a href="/game/<?php echo e($value->gameId); ?>" class="btn btn-primary">BUY NOW</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                        <?php $count++; ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                

                <a class="prev" onclick="plusSlides(-1)">
                    <ion-icon name="chevron-back-circle" class="btn-pre"></ion-icon>
                </a>
                <a class="next" onclick="plusSlides(1)">
                    <ion-icon name="chevron-forward-circle" class="btn-next"></ion-icon>
                </a>

            </ul>

        </div>
    </section>


    <section class="section shop">
        <div class="container shop-container swiper">

            <div class="title-wrapper">
                <h3 class="h3">Games On Sale</h3>
            </div>

            <div class="swiper-button-next swiper-btn"></div>
            <div class="swiper-button-prev swiper-btn"></div>

            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('products-table')->html();
} elseif ($_instance->childHasBeenRendered('qZGanlq')) {
    $componentId = $_instance->getRenderedChildComponentId('qZGanlq');
    $componentTag = $_instance->getRenderedChildComponentTagName('qZGanlq');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('qZGanlq');
} else {
    $response = \Livewire\Livewire::mount('products-table');
    $html = $response->html();
    $_instance->logRenderedChild('qZGanlq', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

        </div>

    </section>






    <!--
                                                                                            - #BLOG
                                                                                            -->
    





    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - #TOP LIST
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              -->

    <section class="section top-list">

        <div class="container">

            <div class="product-minimal">

                <div class="product-showcase flex-item">

                    <div class="product-tag" id="top_sold">
                        <h3 class="h3 tag">Top Sold</h3>
                        <button class="tag-btn">VIEW MORE</button>
                    </div>

                    <div class="showcase-wrapper">

                        <div class="showcase-container">
                            <?php $count = 0; ?>
                            <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($count == 5) {
                                    break;
                                } ?>
                                <?php if($mostSold->contains('gameId', $value->gameId)): ?>
                                    <div class="showcase">

                                        <a href="/game/<?php echo e($value->gameId); ?>" class="showcase-img-box">
                                            <img src="<?php echo e(asset("$value->icon")); ?>"
                                                alt="relaxed
                                                short full sleeve t-shirt"
                                                width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">
                                                <a href="/game/<?php echo e($value->gameId); ?>"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $value->gameId))); ?>

                                                </a>
                                            </h4>
                                            <div class="price-box">
                                                <?php if($value->price && $value->sale): ?>
                                                    <p class="price">
                                                        $<?php echo e(number_format($value->price * (1 - $value->sale / 100), 2, '.', '')); ?>

                                                    </p>
                                                <?php elseif($value->price): ?>
                                                    <p class="price">$<?php echo e($value->price); ?></p>
                                                <?php else: ?>
                                                    <p class="price">Free</p>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                    </div>
                                    <?php $count++; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>

                </div>
                
                <div class="product-showcase flex-item">

                    <div class="product-tag">
                        <h3 class="h3 tag">Highest Rating</h3>
                        <button class="tag-btn">VIEW MORE</button>
                    </div>
                    <div class="showcase-wrapper">

                        <div class="showcase-container">
                            <?php $count = 0; ?>
                            <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($count == 5) {
                                    break;
                                } ?>
                                <?php if($most_rated->contains('gameId', $value->gameId)): ?>
                                    <div class="showcase">

                                        <a href="/game/<?php echo e($value->gameId); ?>" class="showcase-img-box">
                                            <img src="<?php echo e(asset("$value->icon")); ?>"
                                                alt="relaxed
                                                short full sleeve t-shirt"
                                                width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">
                                                <a href="/game/<?php echo e($value->gameId); ?>"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $value->gameId))); ?>

                                                </a>
                                            </h4>
                                            <div class="price-box">
                                                <?php if($value->price && $value->sale): ?>
                                                    <p class="price">
                                                        $<?php echo e(number_format($value->price * (1 - $value->sale / 100), 2, '.', '')); ?>

                                                    </p>
                                                <?php elseif($value->price): ?>
                                                    <p class="price">$<?php echo e($value->price); ?></p>
                                                <?php else: ?>
                                                    <p class="price">Free</p>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                    </div>
                                    <?php $count++; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>

                <div class="product-showcase flex-item">

                    <div class="product-tag">
                        <h3 class="h3 tag">Coming Soon</h3>
                        <button class="tag-btn">VIEW MORE</button>
                    </div>

                    <div class="showcase-wrapper">

                        <div class="showcase-container">
                            <?php $count = 0; ?>
                            <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if ($count == 5) {
                                    break;
                                } ?>
                                <?php if($value->release_date > date('Y-m-d')): ?>
                                    <div class="showcase">

                                        <a href="/game/<?php echo e($value->gameId); ?>" class="showcase-img-box">
                                            <img src="<?php echo e(asset("$value->icon")); ?>"
                                                alt="relaxed
                                                short full sleeve t-shirt"
                                                width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">

                                            <h4 class="showcase-title">
                                                <a href="/game/<?php echo e($value->gameId); ?>"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $value->gameId))); ?>

                                                </a>
                                            </h4>
                                            <div class="price-box">
                                                <?php if($value->price && $value->sale): ?>
                                                    <p class="price">
                                                        $<?php echo e(number_format($value->price * (1 - $value->sale / 100), 2, '.', '')); ?>

                                                    </p>
                                                <?php elseif($value->price): ?>
                                                    <p class="price">$<?php echo e($value->price); ?></p>
                                                <?php else: ?>
                                                    <p class="price">Free</p>
                                                <?php endif; ?>
                                            </div>

                                        </div>

                                    </div>
                                    <?php $count++; ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>

                </div>

            </div>

        </div>

    </section>

    <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                - #CATALOG
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              -->

    <section class="section banner" data-section>
        <div class="container">

            <ul class="banner-list">

                <li>
                    <div class="banner-card has-before">

                        <div class="has-bg-image"
                            style="background-image: url('https://www.gamelivestory.com/images/article/helpful-list-details-all-the-pc-exclusive-game-pass-games-main.webp')">
                        </div>

                    </div>
                </li>

                <li>
                    <div class="banner-card has-before">

                        <a href="">
                            <h3 class="h3 tag">
                                Explore Our Catalog
                            </h3>
                        </a>

                        <p class="card-text">
                            Browse by genre, features, price, and more to find your next favorite game.
                        </p>

                        <a href="/browse" class="btn btn-secondary">LEARN MORE</a>

                    </div>
                </li>

            </ul>

        </div>
    </section>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/home/index.blade.php ENDPATH**/ ?>