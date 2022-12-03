
<?php $__env->startSection('title', 'View Cart'); ?>
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
                        <h1>Order List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Order List</li>
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
                                <h3 class="card-title">Cart</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>CartID</th>
                                            <th>UserName</th>
                                            <th>Order Total</th>
                                            <th>Status</th>
                                            <th>Function</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($cart->cartId); ?></td>
                                                <td><?php echo e($cart->userID); ?></td>
                                                <td><?php echo e(round($cart->cartTotal, 2)); ?>$</td>
                                                <?php if($cart->status != 0): ?>
                                                    <td>Purchased</td>
                                                <?php else: ?>
                                                    <td>Processing</td>
                                                <?php endif; ?>
                                                <td>
                                                    <a href="/admin/cart/view/<?php echo e($cart->cartId); ?>"
                                                        class="btn btn-primary">View</a>
                                                    

                                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                                        data-target="#delete<?php echo e($cart->cartId); ?>">Delete</button>
                                                </td>
                                            </tr>
                                            
                                            <div class="modal fade" id="delete<?php echo e($cart->cartId); ?>" tabindex="-1"
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
                                                            <h4>Are you sure about that ???</h4>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="/admin/cart/delete/<?php echo e($cart->cartId); ?>"
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
                                            <th>CartID</th>
                                            <th>UserName</th>
                                            <th>Order Total</th>
                                            <th>Status</th>
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

<?php echo $__env->make('layouts.dashboards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/admin/cart/order.blade.php ENDPATH**/ ?>