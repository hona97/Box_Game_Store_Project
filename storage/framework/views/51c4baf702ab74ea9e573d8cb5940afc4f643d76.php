
<?php $__env->startSection('title', 'Category'); ?>
<?php $__env->startSection('content'); ?>
    <section>
        <!-- Content Wrapper. Contains page content -->

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
                            <h1>Categories</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                                <li class="breadcrumb-item active">Categories</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">

                <div class="container-fluid">
                    <div class="row">
                        <!-- left column -->
                        <div class="col-md-6">
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Game Type</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->


                                <!-- /.card-body -->
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Image</th>
                                                <th>Type</th>
                                                <th>Function</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <tr>
                                                    <td>
                                                        <img src="<?php echo e(asset("$value->image")); ?>" width="50px"
                                                            height="50px" alt="<?php echo e($value->type); ?>">
                                                    </td>
                                                    <td>
                                                        <p><?php echo e(str_replace('_', ' ', $value->type)); ?></p>
                                                    </td>

                                                    <td>
                                                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                                            data-target="#demoModal<?php echo e($key); ?>">Edit</button>

                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#delete<?php echo e($value->type); ?>">Delete</button>
                                                    </td>
                                                </tr>
                                                <!-- Delete Warning -->
                                                <div class="modal fade" id="delete<?php echo e($value->type); ?>" tabindex="-1"
                                                    role="dialog" aria-labelledby="demoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h3 class="text-center" style="color: red">WARNING !!!!!
                                                                </h3>
                                                                <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <h4>There is no turning back from here !!!!</h4>
                                                                <img src="<?php echo e(asset('img/please.gif')); ?>"
                                                                    class="fixed-ratio-resize" alt="...">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <a href="/admin/category/delete/<?php echo e($value->type); ?>"
                                                                    class="btn btn-danger" float="left">DELETE</a>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">CANCEL</button>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <!-- Modal Form Popup Start-->
                                                <div class="modal fade" id="demoModal<?php echo e($key); ?>" tabindex="-1"
                                                    role="dialog" aria- labelledby="demoModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <form action="/admin/category/edit/<?php echo e($value->type); ?>"
                                                            method="post" enctype="multipart/form-data">
                                                            <?php echo csrf_field(); ?>
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title"
                                                                        id="demoModalLabel<?php echo e($key); ?>">
                                                                        Change Game Type</h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria- label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="form-group row">
                                                                        <label for="typeEdit<?php echo e($key); ?>"
                                                                            class="col-sm-2 col-form-label">Type</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="text" class="form-control"
                                                                                id="typeEdit<?php echo e($key); ?>" required maxlength="45"
                                                                                placeholder="Type of Game" name="typeEdit"
                                                                                value="<?php echo e(str_replace('_', ' ', $value->type)); ?>">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="typeEditImage<?php echo e($key); ?>"
                                                                            class="col-sm-2 col-form-label">Image</label>
                                                                        <div class="col-sm-10">
                                                                            <input type="file" class="form-control"
                                                                                id="typeEditImage<?php echo e($key); ?>"
                                                                                placeholder="Type's Image"
                                                                                name="typeEditImage">
                                                                            <input type="hidden" name="prev_pic"
                                                                                value="<?php echo e($value->image); ?>">

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
                                                <!-- Modal Popup Example End-->
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.card -->



                        </div>
                        <!--/.col (left) -->
                        <!-- right column -->
                        <div class="col-md-6">
                            <!-- Form Element sizes -->
                            <form action="/admin/category/create" enctype="multipart/form-data" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="card card-success">
                                    <div class="card-header">
                                        <h3 class="card-title">Add New</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="tab-content" id="addOrRemove" name="sysReq[0]">
                                                    <!-- /.tab-pane -->
                                                    <div class="form-group row">
                                                        <button type="button" name="add" id="dynamic-ar"
                                                            class="btn btn-outline-primary">Add Type</button>
                                                    </div>
                                                    <div class="form-group row">
                                                        <?php $__errorArgs = ['type.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                            <br>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <label for="type[0]" class="col-sm-2 col-form-label">Type</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="type[0]"
                                                                placeholder="Type of Game" name="type[0]" required
                                                                maxlength="45">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <?php $__errorArgs = ['image.*'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                            <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                            <br>
                                                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                                        <label for="image[0]"
                                                            class="col-sm-2 col-form-label">Image</label>

                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" id="image[0]"
                                                                placeholder="Type's Image" name="image[0]" required>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                </div>
                                                <!-- /.tab-content -->
                                            </div>
                                            <!-- /.tab-content -->
                                        </div><!-- /.card-body -->
                                        <div class="form-row">
                                            <div class="col-12" style="margin-bottom: 10px">
                                                <button type="Submit" class="btn btn-success float-center"><i
                                                        class="fas fa-cloud-upload-alt"></i>
                                                    Submit
                                                </button>
                                                <button type="reset" class="btn btn-danger float-center"
                                                    style="margin-right: 5px;">
                                                    <i class="fas fa-window-close"></i> Reset All
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </form>

                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </section>
        </div><!-- /.container-fluid -->

        <!-- /.content-wrapper -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">
            var i = 0;
            $("#dynamic-ar").click(function() {
                ++i;
                $("#addOrRemove").append(
                    `<div class="tab-content" name="sysReq[` + i + `]">
                    <div class="form-group row">
                        <label for="type[` + i + `]" class="col-sm-2 col-form-label">Type</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="type[` + i + `]"
                                placeholder="Type of Game" name="type[` + i + `]" required maxlength="45">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image[` + i + `]" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="image[` + i + `]"
                                    placeholder="Type's Image" name="image[` + i + `]">
                            </div>
                        </div>
                    <button type="button" class="btn btn-outline-danger" id="remove-input-field">Delete</button>
                    <hr>
                </div>`
                );
            });
            $(document).on('click', '#remove-input-field', function() {

                $(this).parent('div').remove();
            });
        </script>
    </section>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer-script'); ?>

    <script src="<?php echo e(asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js')); ?>"></script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>
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

<?php echo $__env->make('layouts.dashboards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/admin/category/index.blade.php ENDPATH**/ ?>