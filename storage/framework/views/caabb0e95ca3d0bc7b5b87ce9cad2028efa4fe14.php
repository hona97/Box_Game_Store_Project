
<?php $__env->startSection('title', 'Admin Panel'); ?>
<?php $__env->startSection('content'); ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        
        <?php if(Session::get('error')): ?>
            <script>
                alert("<?php echo e(Session::get('error')); ?>");
                console.log("error");
            </script>
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
                        <h1>Profile</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin/home">Home</a></li>
                            <li class="breadcrumb-item active">Admin Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">

                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <?php if($admin->image == null): ?>
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="<?php echo e(asset('img/admin/default.png')); ?>" alt="User profile picture">
                                    <?php else: ?>
                                        <img class="profile-user-img img-fluid img-circle"
                                            src="<?php echo e(asset("$admin->image")); ?>" alt="User profile picture">
                                    <?php endif; ?>

                                </div>

                                <h3 class="profile-username text-center"><?php echo e($admin->name); ?></h3>

                                <p class="text-muted text-center"><?php echo e(strtoupper($admin->role)); ?></p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Followers</b> <a class="float-right">0</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Following</b> <a class="float-right">0</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Friends</b> <a class="float-right">0</a>
                                    </li>
                                </ul>

                                <a href="https://www.facebook.com/NguyenTuanLoc2409"
                                    class="btn btn-primary btn-block"><b>Follow</b></a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        
                    </div>
                    <!-- /.col -->
                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">

                                    <li class="nav-item"><a class="nav-link active" href="#edit" data-toggle="tab">Edit
                                            Profile</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#password" data-toggle="tab">Change
                                            Password</a>
                                    </li>
                                </ul>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content">

                                    
                                    <div class="active tab-pane" id="edit">
                                        <form class="form-horizontal" method="post"
                                            action="/admin/home/<?php echo e($admin->adminId); ?>" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group row">
                                                <label for="inputName" class="col-sm-2 col-form-label">Login Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="loginName" class="form-control"
                                                        id="inputLoginName" placeholder="Login Name"
                                                        value="<?php echo e($admin->adminId); ?>">
                                                </div>
                                                <?php $__errorArgs = ['loginName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                                <div class="col-sm-10">
                                                    <input type="email" name="adminEmail" class="form-control"
                                                        id="inputEmail" placeholder="Email" value="<?php echo e($admin->email); ?>">
                                                </div>
                                                <?php $__errorArgs = ['adminEmail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Name</label>
                                                <div class="col-sm-10">
                                                    <input type="text" name="adminName" class="form-control"
                                                        id="inputName" placeholder="Display Name"
                                                        value="<?php echo e($admin->name); ?>">
                                                </div>
                                                <?php $__errorArgs = ['adminName'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputName2" class="col-sm-2 col-form-label">Picture</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="adminPicture" class="form-control"
                                                        id="inputPicture" placeholder="Picture Please">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <input type="submit" class="btn btn-success float-left"
                                                    value="Submit"></input>
                                                <input type="hidden" name="prev_pic" value="<?php echo e($admin->image); ?>">
                                                <button type="reset" class="btn btn-danger float-left"
                                                    style="margin-left: 3px">Reset</button>

                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                    
                                    <div class="tab-pane" id="password">
                                        <form class="form-horizontal" method="post"
                                            action="/admin/changePass/<?php echo e($admin->adminId); ?>"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <div class="form-group row">
                                                <label for="inputPasswordOld" class="col-sm-2 col-form-label">Old
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="adminPassword" class="form-control"
                                                        id="inputPasswordOld" placeholder="Old Password" required>
                                                </div>
                                                <?php $__errorArgs = ['adminPassword'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="inputPasswordNew" class="col-sm-2 col-form-label">New
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="adminPasswordNew" class="form-control"
                                                        id="inputPasswordNew" placeholder="New Password" required
                                                        minlength="8">
                                                </div>
                                                <?php $__errorArgs = ['adminPasswordNew'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>
                                            <div class="form-group row">
                                                <label for="adminPasswordRetype" class="col-sm-2 col-form-label">Retype
                                                    Password</label>
                                                <div class="col-sm-10">
                                                    <input type="password" name="adminPasswordRetype"
                                                        class="form-control" id="adminPasswordRetype"
                                                        placeholder="Retype Password" minlength="1" r>
                                                </div>
                                                <?php $__errorArgs = ['adminPasswordRetype'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                                    <p class="text-danger"><strong><?php echo e($message); ?></strong></p>
                                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                            </div>


                                            <div class="form-group row">
                                                <input type="submit" class="btn btn-success float-left"
                                                    value="Change Password"></input>
                                                <button type="reset" class="btn btn-danger float-left"
                                                    style="margin-left: 3px">Reset</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.dashboards', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/admin/index.blade.php ENDPATH**/ ?>