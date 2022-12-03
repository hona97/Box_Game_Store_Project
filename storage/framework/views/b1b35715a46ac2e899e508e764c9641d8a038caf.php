
<?php $__env->startSection('title'); ?>
    <?php if(isset($os)): ?>
        Browse by Platform | <?php echo e(strtoupper($os)); ?>

    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>

        <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        - #GENRES
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        -->

        <section class="section genre" data-section>
            <div class="container genre-container swiper">

                <div class="title-wrapper">
                    <h3 class="h3">Popular Genres</h3>
                </div>

                <div class="swiper-button-next swiper-btn"></div>
                <div class="swiper-button-prev swiper-btn"></div>

                <div class="swiper-wrapper">
                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="/browse/<?php echo e($value->type); ?>" class="swiper-slide">
                            <div class="shop-card">

                                <div class="card-banner">
                                    <img src="<?php echo e(asset($value->image)); ?>" class="img-cover">

                                    <div class="gradient"
                                        style="background: linear-gradient(rgba(0,0,0,0), rgb(0,0,0) 100%)">
                                    </div>

                                    <span class="genre-title"><?php echo e($value->type); ?></span>
                                </div>

                            </div>
                        </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>



                </div>

            </div>
        </section>


        <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        - #GAME-LIST
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        -->

        <section class="section game-list">

            <div class="container">

                <div class="list-game-container">

                    <div>

                        <div class="game-list-title">
                            <h3 class="h3">Games on <?php echo e(strtoupper("$os")); ?></h3>
                            <button class="nav-open-btn" aria-label="open menu" data-filter-toggler
                                onclick="toggleFilter()">
                                <span class="line line-1"></span>
                                <span class="line line-2"></span>
                                <span class="line line-3"></span>
                            </button>

                        </div>
                        <div class="list-game">
                            <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="shop-card">

                                    <a href="/game/<?php echo e($value->gameId); ?>" class="card-banner">
                                        <img src="<?php echo e(asset("$value->icon")); ?>" style="height: 282px" loading="lazy"
                                            alt="<?php echo e($value->gameId); ?>" class="img-cover">
                                        <?php if($value->sale != 0): ?>
                                            <span class="badge" aria-label="20% off">-<?php echo e($value->sale); ?>%</span>
                                        <?php endif; ?>


                                        <div class="card-actions">

                                            <button class="action-btn">
                                                <ion-icon name="bag-handle-outline" aria-hidden="true"></ion-icon>
                                            </button>

                                            <button class="action-btn">
                                                <ion-icon name="star-outline" aria-hidden="true"></ion-icon>
                                            </button>


                                        </div>
                                    </a>

                                    <div class="card-content">

                                        <span class="card-type">BASE GAME</span>

                                        <h3>
                                            <a href="/game/<?php echo e($value->gameId); ?>"
                                                class="card-title"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $value->gameId))); ?></a>
                                        </h3>

                                        <div class="price">
                                            <?php if($value->price): ?>
                                                <?php if($value->sale): ?>
                                                    <del class="del">$<?php echo e($value->price); ?></del>

                                                    <span
                                                        class="span">$<?php echo e(number_format($value->price * (1 - $value->sale / 100), 2, '.', '')); ?></span>
                                                <?php else: ?>
                                                    <span class="span">$<?php echo e($value->price); ?></span>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <span class="span">FREE</span>
                                            <?php endif; ?>
                                        </div>

                                    </div>

                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>

                    <div class="filter-list">

                        <div class="filter-search">
                            <div class="filter-title">
                                <h3 class="h4">Filters</h3>
                                <button class="reset">RESET</button>
                            </div>

                            <form class="input-wrapper-sidebar">
                                <input type="search" name="search" placeholder="Search a game ..."
                                    class="search-field-sidebar" id="search">

                                <button class="search-submit-sidebar" aria-label="search">
                                    <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                                </button>
                            </form>
                        </div>

                        <div class="filter">
                            <div class="custom-show" data-filter-show onclick="showfilter()">
                                <span class="filter-name">CUSTOM</span>

                                <span class="btn-show">
                                    <ion-icon name="chevron-down-outline" data-arrow class="arrow-custom"></ion-icon>
                                </span>
                            </div>

                            <div class="custom-hide" data-filter-hide>
                                <ul>
                                    <li class="filter-hide-item">
                                        <a href="/browse">All</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">New Release</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Cooming Soon</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Alphabetical</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Price: High to Low</a>
                                    </li>
                                    <li class="filter-hide-item">
                                        <a href="">Price: Low to High</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="filter">
                            <div class="genre-show" data-filter-show1 onclick="showfilter1()">
                                <span class="filter-name">GENRE</span>

                                <span class="btn-show">
                                    <ion-icon name="chevron-down-outline" data-arrow1 class="arrow-genre"></ion-icon>
                                </span>
                            </div>

                            <div class="genre-hide" data-filter-hide1>
                                <ul>
                                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="filter-hide-item">
                                            <a
                                                href="/browse/<?php echo e($genre->type); ?>"><?php echo e(str_replace('_', ' ', $genre->type)); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </ul>
                            </div>
                        </div>

                        <div class="filter">
                            <div class="platform-show" data-filter-show2 onclick="showfilter2()">
                                <span class="filter-name">FLATFORM</span>

                                <span class="btn-show">
                                    <ion-icon name="chevron-down-outline" data-arrow2 class="arrow-platform"></ion-icon>
                                </span>
                            </div>

                            <div class="platform-hide" data-filter-hide2>
                                <ul>
                                    <?php $__currentLoopData = $platform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li class="filter-hide-item">
                                            <a href=""><?php echo e(strtoupper($value->os)); ?></a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>



        <!--
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        - #FILTER-SIDEBAR
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        -->

        <div class="filterbar">

            <div class="filter-list" data-filter-sidebar>

                <div class="filter-search">
                    <div class="filter-title">
                        <h3 class="h4">Filters</h3>
                        <button class="nav-close-btn" aria-label="close menu" data-filter-close onclick="closeFilter()">
                            <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                        </button>
                    </div>

                    <div class="input-wrapper-sidebar">
                        <input type="search" name="search" id="search" placeholder="Search a game ..."
                            class="search-field-sidebar">

                        <button class="search-submit-sidebar" aria-label="search">
                            <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
                        </button>
                    </div>
                </div>

                <div class="filter">
                    <div class="custom-show" data-filter-show3 onclick="showfilter3()">
                        <span class="filter-name">CUSTOM</span>

                        <span class="btn-show">
                            <ion-icon name="chevron-down-outline" data-arrow3 class="arrow-custom"></ion-icon>
                        </span>
                    </div>

                    <div class="custom-hide" data-filter-hide3>
                        <ul>
                            <li class="filter-hide-item">
                                <a href="/browse">All</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">New Release</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Cooming Soon</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Alphabetical</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Price: High to Low</a>
                            </li>
                            <li class="filter-hide-item">
                                <a href="">Price: Low to High</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="filter">
                    <div class="genre-show" data-filter-show4 onclick="showfilter4()">
                        <span class="filter-name">GENRE</span>

                        <span class="btn-show">
                            <ion-icon name="chevron-down-outline" data-arrow4 class="arrow-genre"></ion-icon>
                        </span>
                    </div>

                    <div class="genre-hide" data-filter-hide4>
                        <ul>
                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $genre): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="filter-hide-item">
                                    <a href="/browse/<?php echo e($genre->type); ?>"><?php echo e(str_replace('_', ' ', $genre->type)); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="filter">
                    <div class="platform-show" data-filter-show5 onclick="showfilter5()">
                        <span class="filter-name">FLATFORM</span>

                        <span class="btn-show">
                            <ion-icon name="chevron-down-outline" data-arrow5 class="arrow-platform"></ion-icon>
                        </span>
                    </div>

                    <div class="platform-hide" data-filter-hide5>
                        <ul>
                            <?php $__currentLoopData = $platform; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="filter-hide-item">
                                    <a href=""><?php echo e($value->os); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>

                <div class="filter-btn">
                    <button class="btn-reset">RESET</button>

                    <button class="btn-done" onclick="closeFilter()">DONE</button>
                </div>

            </div>

            <div class="overlay1" data-filter-sidebar data-overlay1 onclick="closeFilter()"></div>
        </div>
        <script type="text/javascript">
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>


        <script>
            $(document).ready(function() {
                $('#search').on('keyup', function(e) {
                    e.preventDefault();
                    var value = $(this).val();
                    $.ajax({
                        type: "get",
                        url: '/search',
                        data: {
                            'search': value
                        },
                        success: function(data) {
                            $('.list-game').html(data);
                            // console.log(data);
                        },
                        error: function(data) {
                            var errors = data.responseJSON;
                            console.log(errors);
                        }
                    });

                });
            });
        </script>

    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-script'); ?>
    <script src="<?php echo e(asset('assets_home/js/browse.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/home/browse/platform.blade.php ENDPATH**/ ?>