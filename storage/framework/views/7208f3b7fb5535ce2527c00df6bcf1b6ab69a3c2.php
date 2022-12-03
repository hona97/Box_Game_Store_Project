
<?php $__env->startSection('title', 'Game Details'); ?>
<?php $__env->startSection('header-specific'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <section>


        <div class="content-wrapper">
            
            <?php if($message = Session::get('success')): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <span><?php echo e($message); ?></span>
                </div>
            <?php endif; ?>
            
            <?php if(count($errors) > 0): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Game Details</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                <li class="breadcrumb-item active">Game Details</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Default box -->
                <div class="card card-solid">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <h3 class="d-inline-block d-sm-none"></h3>
                                <div class="col-12">
                                    <img src="<?php echo e(asset("$game->icon")); ?>" class="product-image" alt="Product Image">
                                </div>
                                <div class="col-12 product-image-thumbs">
                                    
                                    <div class="product-image-thumb active">
                                        <img src="<?php echo e(asset("$game->icon")); ?>" alt="icon<?php echo e($game->gameId); ?>">
                                    </div>
                                    <div class="product-image-thumb active">
                                        <img src="<?php echo e(asset("$game->banner")); ?>" alt="banner<?php echo e($game->banner); ?>">
                                    </div>
                                    
                                    <?php $__currentLoopData = File::glob($game->gameplay . '/*'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $path): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="product-image-thumb active"><img
                                                src="<?php echo e(asset(str_replace(public_path(), '', $path))); ?>"
                                                alt="<?php echo e(str_replace(public_path(), '', $path)); ?>">
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <h1 class="my-3"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $game->gameId))); ?></h1>

                                <hr>
                                <h4>Description</h4>
                                <p><?php echo e($game->description); ?></p>
                                <hr>
                                <h4>Available Platform</h4>
                                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                    <?php $__currentLoopData = $system_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sys_req): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <label class="btn btn-default text-center">
                                            <input type="radio" name="color_option" id="color_option_a2"
                                                autocomplete="off">
                                            <?php echo e($sys_req->os); ?>

                                            <br>
                                        </label>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </div>
                                <hr>
                                <h4>Developer</h4>
                                <a href="<?php echo e($game->developer_web); ?>"><?php echo e($game->developer); ?></a>
                                <hr>
                                <h4>Release Date</h4>
                                <p><?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $game->release_date)->format('d-m-Y')); ?>

                                </p>
                                <div class="bg-gray py-2 px-3 mt-4">
                                    <h2 class="mb-0">
                                        <?php if($game->price > 0): ?>
                                            <?php echo e($game->price); ?>$
                                        <?php else: ?>
                                            Free To Play
                                        <?php endif; ?>
                                    </h2>
                                    <h4 class="mt-0">
                                        <small>Sale: <?php echo e($game->sale); ?>% </small>
                                    </h4>
                                </div>

                                <div class="mt-4">
                                    
                                    <button type="button" class="btn btn-primary btn-lg btn-flat" data-toggle="modal"
                                        data-target="#detailModal">
                                        <i class="fas fa-edit">Edit Details</i>
                                    </button>
                                    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-
                                        labelledby="demoModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl" role="document">
                                            <form action="/admin/game/editDetail/<?php echo e($game->gameId); ?>" method="post"
                                                enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="demoModalLabel<?php echo e($game->gameId); ?>">
                                                            Edit Detail Game For
                                                            <?php echo e(str_replace('_', ' ', str_replace('__', ': ', $game->gameId))); ?>

                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-
                                                            label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="os" class="col-sm-2 col-form-label">Game
                                                                Name</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="detailID"
                                                                    placeholder="Type of Os" name="detailID"
                                                                    value="<?php echo e(str_replace('_', ' ', str_replace('__', ': ', $game->gameId))); ?>"
                                                                    readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="description"
                                                                class="col-sm-2 col-form-label">Description</label>
                                                            <div class="col-sm-10">
                                                                <textarea type="text" class="form-control" id="detailDesc" placeholder="detailDescription" name="detailDesc"
                                                                    value="<?php echo e($game->description); ?>"><?php echo e($game->description); ?>

                                                                                    </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="about"
                                                                class="col-sm-2 col-form-label">About</label>
                                                            <div class="col-sm-10">
                                                                <textarea type="text" rows='10' class="form-control" id="detailAbout" placeholder="detailAbout"
                                                                    name="detailAbout"><?php echo e($game->about); ?>

                                                                                    </textarea>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="date" class="col-sm-2 col-form-label">Release
                                                                Date</label>
                                                            <div class="col-sm-10">
                                                                <input type="date" class="form-control"
                                                                    id="detailDate" name="detailDate"
                                                                    value="<?php echo e(Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $game->release_date)->format('Y-m-d')); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="price"
                                                                class="col-sm-2 col-form-label">Price</label>
                                                            <div class="col-sm-10">
                                                                <input type="test" class="form-control"
                                                                    id="detailPrice" name="detailPrice" required
                                                                    max="300" step="0.1" min="0"
                                                                    value="<?php echo e($game->price); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="sale"
                                                                class="col-sm-2 col-form-label">Sale</label>
                                                            <div class="col-sm-10">
                                                                <input type="number" class="form-control"
                                                                    id="detailSale" name="detailSale" max="100"
                                                                    min="0" value="<?php echo e($game->sale); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="developer"
                                                                class="col-sm-2 col-form-label">Developer</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control" id="detailDev"
                                                                    placeholder="Graphic Card" name="detailDev"
                                                                    value="<?php echo e($game->developer); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="developerweb"
                                                                class="col-sm-2 col-form-label">Developer Web</label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    id="detaildevWeb" placeholder="Storage"
                                                                    name="detaildevWeb"
                                                                    value="<?php echo e($game->developer_web); ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">Save
                                                            change</button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="mt-4">
                                        <h2 class="mb-0">
                                            <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item => $cate): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <span
                                                    class="badge badge-success"><?php echo e(str_replace('_', ' ', $cate->type)); ?></span>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </h2>
                                    </div>

                                    <div class="mt-4 product-share">
                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                            data-target="#editType">Add/Delete Type</button>
                                    </div>

                                </div>
                            </div>
                            <div class="row mt-4">
                                <nav class="w-100">
                                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                                        <a class="nav-item nav-link active" id="product-about-tab" data-toggle="tab"
                                            href="#product-about" role="tab" aria-controls="product-about"
                                            aria-selected="true">About</a>
                                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                            href="#system-requirements" role="tab" aria-controls="product-comments"
                                            aria-selected="false">System Requirements</a>
                                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                            href="#product-rating" role="tab" aria-controls="product-rating"
                                            aria-selected="false">Rating</a>
                                    </div>
                                </nav>
                                <div class="tab-content p-3 w-100" id="nav-tabContent">
                                    <div class="tab-pane fade show active" id="product-about" role="tabpanel"
                                        aria-labelledby="product-about-tab">
                                        <p><?php echo e($game->about); ?></p>
                                    </div>
                                    <div class="tab-pane fade" id="system-requirements" role="tabpanel"
                                        aria-labelledby="product-comments-tab">

                                        
                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                            data-target="#addPlatform">Add Platform</button>
                                        <div class="tab-content">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>OS</th>
                                                        <th>Version</th>
                                                        <th>ChipSet</th>
                                                        <th>Memory</th>
                                                        <th>VGA</th>
                                                        <th>Storage</th>
                                                        <th>Function</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $system_req; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sys_teq => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($value->os); ?></td>
                                                            <td><?php echo e($value->version); ?></td>
                                                            <td><?php echo e($value->chip); ?></td>
                                                            <td><?php echo e($value->ram); ?></td>
                                                            <td><?php echo e($value->graphic); ?></td>
                                                            <td><?php echo e($value->storage); ?></td>
                                                            <td>
                                                                
                                                                <button type="button" class="btn btn-primary"
                                                                    data-toggle="modal"
                                                                    data-target="#demoModal<?php echo e($value->os); ?>">Edit</button>

                                                                <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#delete<?php echo e($value->os); ?>">Delete</button>
                                                            </td>
                                                        </tr>

                                                        
                                                        <div class="modal fade" id="delete<?php echo e($value->os); ?>"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="demoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="text-center" style="color: red">WARNING
                                                                            !!!!!</h3>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4>Sure to delete <?php echo e($value->os); ?>

                                                                            platform!!!! I
                                                                            give you 5 seconds to think again</h4>
                                                                        <img src="<?php echo e(asset('img/bongo-cat.gif')); ?>"
                                                                            class="fixed-ratio-resize" alt="...">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="/admin/game/deleteReq/<?php echo e($game->gameId); ?>/<?php echo e($value->os); ?>"
                                                                            class="btn btn-danger">Delete</a>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        
                                                        <div class="modal fade" id="demoModal<?php echo e($value->os); ?>"
                                                            tabindex="-1" role="dialog" aria-
                                                            labelledby="demoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <form
                                                                    action="/admin/game/editReq/<?php echo e($game->gameId); ?>/<?php echo e($value->os); ?>"
                                                                    method="post" enctype="multipart/form-data">
                                                                    <?php echo csrf_field(); ?>
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title"
                                                                                id="demoModalLabel<?php echo e($value->os); ?>">
                                                                                Edit Game Requirements for
                                                                                <?php echo e($value->os); ?>

                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria- label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">

                                                                            <div class="form-group row">
                                                                                <label for="os"
                                                                                    class="col-sm-2 col-form-label">OS</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="os"
                                                                                        placeholder="Type of Os"
                                                                                        name="os"
                                                                                        value="<?php echo e($value->os); ?>"
                                                                                        required maxlength="45">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="version"
                                                                                    class="col-sm-2 col-form-label">Version</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="version"
                                                                                        placeholder="Version"
                                                                                        name="version"
                                                                                        value="<?php echo e($value->version); ?>"
                                                                                        required maxlength="45">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="chipset"
                                                                                    class="col-sm-2 col-form-label">Chipset</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="test"
                                                                                        class="form-control"
                                                                                        id="chipset"
                                                                                        placeholder="Chipset Model"
                                                                                        name="chipset"
                                                                                        value="<?php echo e($value->chip); ?>"
                                                                                        required maxlength="100">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="memory"
                                                                                    class="col-sm-2 col-form-label">Memory</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="ram" placeholder="RAM"
                                                                                        name="ram"
                                                                                        value="<?php echo e($value->ram); ?>"
                                                                                        required maxlength="45">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="vga"
                                                                                    class="col-sm-2 col-form-label">VGA</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="vga"
                                                                                        placeholder="Graphic Card"
                                                                                        name="vga"
                                                                                        value="<?php echo e($value->graphic); ?>"
                                                                                        required maxlength="200">
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row">
                                                                                <label for="inputSkills"
                                                                                    class="col-sm-2 col-form-label">Storage</label>
                                                                                <div class="col-sm-10">
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="storage"
                                                                                        placeholder="Storage"
                                                                                        name="storage"
                                                                                        value="<?php echo e($value->storage); ?>"
                                                                                        required maxlength="45">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save
                                                                                change</button>
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="product-rating" role="tabpanel"
                                        aria-labelledby="product-rating-tab">
                                        <div class="tab-content">
                                            <table id="example1" class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>User Name</th>
                                                        <th>Star</th>
                                                        <th>Comment</th>
                                                        <th>Function</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $__currentLoopData = $rating; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr>
                                                            <td><?php echo e($value->userID); ?></td>
                                                            <td>
                                                                <?php $star =  $value->star ?>
                                                                <?php $__currentLoopData = range(1, 5); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <span class="fa-stack" style="width:1em">
                                                                        <i class="far fa-star fa-stack-1x"></i>
                                                                        <?php if($star > 0): ?>
                                                                            <?php if($star > 0.5): ?>
                                                                                <i class="fas fa-star fa-stack-1x"></i>
                                                                            <?php else: ?>
                                                                                <i
                                                                                    class="fas fa-star-half fa-stack-1x"></i>
                                                                            <?php endif; ?>
                                                                        <?php endif; ?>
                                                                        <?php $star--; ?>
                                                                    </span>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <span style="margin-left: 1px"><?php echo e($value->star); ?></span>
                                                            </td>
                                                            <td><?php echo e($value->message); ?></td>
                                                            <td>
                                                                


                                                                <button type="button" class="btn btn-danger"
                                                                    data-toggle="modal"
                                                                    data-target="#delete<?php echo e($value->userID); ?>">Delete</button>
                                                            </td>
                                                        </tr>

                                                        
                                                        <div class="modal fade" id="delete<?php echo e($value->userID); ?>"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="demoModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h3 class="text-center" style="color: red">WARNING
                                                                            !!!!!</h3>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <h4>Sure to delete this rating ? I
                                                                            give you 5 seconds to think again</h4>
                                                                        <img src="<?php echo e(asset('img/rock-bald-head.gif')); ?>"
                                                                            class="fixed-ratio-resize" alt="...">
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <a href="/admin/game/deleteRating/<?php echo e($game->gameId); ?>/<?php echo e($value->userID); ?>"
                                                                            class="btn btn-danger">Delete</a>
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
        </div>

    </section> <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- Modal Add Platform Popup Start-->
    <div class="modal fade" id="addPlatform" tabindex="-1" role="dialog" aria- labelledby="demoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="/admin/game/addReq/<?php echo e($game->gameId); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add New Platform</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <label for="os" class="col-sm-2 col-form-label">OS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="os"
                                    placeholder="window, mac, linux, xbox or ps" name="os" required maxlength="45">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="version" class="col-sm-2 col-form-label">Version</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="version" placeholder="Version"
                                    name="version" required maxlength="45">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="chipset" class="col-sm-2 col-form-label">Chipset</label>
                            <div class="col-sm-10">
                                <input type="test" class="form-control" id="chipset" placeholder="Chipset Model"
                                    name="chipset" required maxlength="100">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="memory" class="col-sm-2 col-form-label">Memory</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="ram" placeholder="RAM"
                                    name="ram" required maxlength="45">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="vga" class="col-sm-2 col-form-label">VGA</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="vga" placeholder="Graphic Card"
                                    name="vga" required maxlength="200">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputSkills" class="col-sm-2 col-form-label">Storage</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="storage" placeholder="Storage"
                                    name="storage" required maxlength="45">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Add New</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Add Platform Popup End-->
    <!-- Modal Edit Type Popup Start-->
    <div class="modal fade" id="editType" tabindex="-1" role="dialog" aria- labelledby="demoModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="POST" action="/admin/game/editType/<?php echo e($game->gameId); ?>">
                <?php echo csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Add or Delete Type</h3>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group row">
                            <p>Uncheck type to delete</p>
                        </div>
                        <?php $__currentLoopData = $cate_all; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" type="checkbox" id="<?php echo e($value->type); ?>"
                                        value="<?php echo e($value->type); ?>" name="category[]"
                                        <?php if($category->contains('type', $value->type)): ?> <?php if(true): echo 'checked'; endif; ?> <?php endif; ?>>
                                    <label for="<?php echo e($value->type); ?>"
                                        class="custom-control-label"><?php echo e(str_replace('_', ' ', $value->type)); ?></label>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save change</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Edit type Popup End-->
    </section>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('footer-script'); ?>
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>

    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- DataTables  & Plugins -->
    <script src="<?php echo e(asset('assets/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jszip/jszip.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/pdfmake/pdfmake.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/pdfmake/vfs_fonts.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.print.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js')); ?>"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "searching": false,
                "responsive": true,
                "lengthChange": false,
                "ordering": true,
                "autoWidth": false,
                "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
            $('.date').datepicker({
                format: '<?php echo e(config('app.date_format_js')); ?>'
            });
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/admin/game/view.blade.php ENDPATH**/ ?>