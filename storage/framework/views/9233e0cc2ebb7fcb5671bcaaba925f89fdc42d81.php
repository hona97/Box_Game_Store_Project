<section>

    <section class="section genre" data-section wire:ignore>
        <div class="container genre-container swiper">

            <div class="title-wrapper">
                <h3 class="h3">Popular Genres</h3>
            </div>

            <div class="swiper-button-next swiper-btn"></div>
            <div class="swiper-button-prev swiper-btn"></div>

            <div class="swiper-wrapper">
                <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="" wire:click.prevent="sortByGenre('<?php echo e($value->type); ?>')" class="swiper-slide">
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



    <section class="section game-list">

        <div class="container">

            <div class="list-game-container">

                <div>

                    <div class="game-list-title">
                        <h3 class="h3"><?php echo e($title); ?></h3>
                        <button class="nav-open-btn" aria-label="open menu" data-filter-toggler
                            onclick="toggleFilter()">
                            <span class="line line-1"></span>
                            <span class="line line-2"></span>
                            <span class="line line-3"></span>
                        </button>

                    </div>
                    <?php if($game->count() == 0): ?>
                        <div style="text-align: center; margin-block-start: 50px">
                            <h2 class="h2-large">No results found</h2>
                            <span style="color: var(--text-silver)">Unfortunately I could not find any results matching
                                your search.</span>
                        </div>
                    <?php else: ?>
                        <div class="list-game">
                            <?php $__currentLoopData = $game; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="shop-card">

                                    <div class="card-banner">
                                        <a href="/game/<?php echo e($value->gameId); ?>"><img src="<?php echo e(asset("$value->icon")); ?>"
                                                class="img-cover" style="height: 282px"></a>
                                        <?php if($value->sale != 0): ?>
                                            <span class="badge" aria-label="20% off">-<?php echo e($value->sale); ?>%</span>
                                        <?php endif; ?>


                                        <div class="card-actions">
                                            <div class="tooltip">
                                                <?php if(Auth::check()): ?>
                                                    <?php if(in_array($value->gameId, $gameIds)): ?>
                                                        <button class="action-btn" type="button">
                                                            <i class="fa-sharp fa-solid fa-check"></i>
                                                        </button>
                                                        <span class="tooltiptext">Purchased</span>
                                                    <?php else: ?>
                                                        <?php if(Cart::content()->where('id', $value->gameId)->count()): ?>
                                                            <button class="action-btn" type="button"
                                                                wire:click.prevent="removeCart('<?php echo e($value->gameId); ?>')">
                                                                -
                                                            </button>
                                                            <span class="tooltiptext">Remove</span>
                                                        <?php else: ?>
                                                            <button class="action-btn" type="button"
                                                                wire:click.prevent="addToCart('<?php echo e($value->gameId); ?>')">
                                                                +
                                                            </button>
                                                            <span class="tooltiptext">Add to Cart</span>
                                                        <?php endif; ?>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="<?php echo e(route('login')); ?>" class="action-btn-login"
                                                        type="button">
                                                        +
                                                    </a>
                                                    <span class="tooltiptext">Add to Cart</span>
                                                <?php endif; ?>
                                            </div>

                                        </div>
                                    </div>

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

                        <div><?php echo e($game->links('pagination-links')); ?></div>
                    <?php endif; ?>
                </div>

                <div class="filter-list" wire:ignore>

                    <div class="filter-search">
                        <div class="filter-title">
                            <h3 class="h4">Filters</h3>
                            <a href="<?php echo e(URL::to('/browse')); ?>" class="reset">RESET</a>
                        </div>

                        <form class="input-wrapper-sidebar">
                            <input type="search" name="search" placeholder="Search a game ..."
                                class="search-field-sidebar" id="search" wire:model="search">

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
                                    <a href="#" wire:click.prevent="sortBy('gameId', 'asc')">Alphabetical</a>
                                </li>
                                <li class="filter-hide-item">
                                    <a href="#" wire:click.prevent="sortBy('price', 'desc')">Price: High to
                                        Low</a>
                                </li>
                                <li class="filter-hide-item">
                                    <a href="" wire:click.prevent="sortBy('price', 'asc')">Price: Low to
                                        High</a>
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
                                    <li class="filter-hide-item" data-genre-<?php echo e($genre->type); ?>>
                                        <a href="" data-link-<?php echo e($genre->type); ?>

                                            wire:click.prevent="sortByType('<?php echo e($genre->type); ?>')"
                                            onclick="activeFilter(document.querySelector('[data-genre-<?php echo e($genre->type); ?>]'), document.querySelector('[data-link-<?php echo e($genre->type); ?>]'))"><?php echo e(str_replace('_', ' ', $genre->type)); ?></a>
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
                                    <li class="filter-hide-item" data-genre-<?php echo e($value->os); ?>>
                                        <a href="" data-link-<?php echo e($value->os); ?>

                                            wire:click.prevent="sortByOs('<?php echo e($value->os); ?>')"
                                            onclick="activeFilter(document.querySelector('[data-genre-<?php echo e($value->os); ?>]'), document.querySelector('[data-link-<?php echo e($value->os); ?>]'))"><?php echo e(strtoupper($value->os)); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        </div>

        <script>
            const activeFilter = function(genre, link) {
                genre.classList.toggle("active");
                link.classList.toggle("active");
            }
        </script>
    </section>

    

    <div class="filterbar">

        <div class="filter-list" data-filter-sidebar wire:ignore>

            <div class="filter-search">
                <div class="filter-title">
                    <h3 class="h4">Filters</h3>
                    <button class="nav-close-btn" aria-label="close menu" data-filter-close onclick="closeFilter()">
                        <ion-icon name="close-outline" aria-hidden="true"></ion-icon>
                    </button>
                </div>

                <div class="input-wrapper-sidebar">
                    <input type="search" name="search" id="search" placeholder="Search a game ..."
                        class="search-field-sidebar" wire:model="search">

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
                            <a href="" wire:click.prevent="sortBy('gameId', 'asc')">Alphabetical</a>
                        </li>
                        <li class="filter-hide-item">
                            <a href="" wire:click.prevent="sortBy('price', 'desc')">Price: High to Low</a>
                        </li>
                        <li class="filter-hide-item">
                            <a href="" wire:click.prevent="sortBy('price', 'asc')">Price: Low to High</a>
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
                                <a href=""
                                    wire:click.prevent="sortByType('<?php echo e($genre->type); ?>')"><?php echo e(str_replace('_', ' ', $genre->type)); ?></a>
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
                                <a href=""
                                    wire:click.prevent="sortByOs('<?php echo e($value->os); ?>')"><?php echo e(strtoupper("$value->os")); ?></a>
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

</section>
<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/livewire/browse-add-cart.blade.php ENDPATH**/ ?>