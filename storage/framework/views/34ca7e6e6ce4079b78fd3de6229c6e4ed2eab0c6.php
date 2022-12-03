
<?php $__env->startSection('title', 'View Game'); ?>
<?php $__env->startSection('header-specific'); ?>
    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Game Center</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Game Center</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- /.card -->

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Game Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $games; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $game): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><img src="<?php echo e(asset("$game->icon")); ?>" width="50px" height="50px">

                                                </td>
                                                <td><a
                                                        href="/admin/game/view/<?php echo e($game->gameId); ?>"><?php echo e(str_replace('_', ' ', str_replace('__', ': ', $game->gameId))); ?></a>
                                                </td>
                                                
                                                <td><?php echo e($game->price); ?>$</td>
                                                <td>
                                                    <?php if(isset($category)): ?>
                                                        <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($value->gameId === $game->gameId): ?>
                                                                <div aria-disabled="true" class="badge badge-success">
                                                                    <?php echo e(str_replace('_', ' ', $value->type)); ?></div>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        N/A
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="/admin/game/view/<?php echo e($game->gameId); ?>"
                                                        class="btn btn-primary">View</a>
                                                    
                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?php echo e($game->gameId); ?>">Delete</button>
                                                </td>
                                            </tr>
                                            
                                            <div class="modal fade" id="delete<?php echo e($game->gameId); ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h3 class="text-center" style="color: red">WARNING !!!!!</h3>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h4>Wanna delete this game? There is no
                                                                turning back from here !!!!</h4>
                                                            <img src="<?php echo e(asset('img/john-cena-are-you-sure-about-that.gif')); ?>"
                                                                class="rounded mx-auto d-block" alt="...">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/game/delete/<?php echo e($game->gameId); ?>"
                                                                class="btn btn-danger">DELETE</a>
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">CANCEL</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            <th>Category</th>
                                            <th>Function</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-script'); ?>


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
                "responsive": true,
                "lengthChange": false,
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
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/admin/game/index.blade.php ENDPATH**/ ?>