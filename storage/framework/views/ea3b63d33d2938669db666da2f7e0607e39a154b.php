<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Theme style -->
    <?php echo $__env->yieldContent('header-specific'); ?>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/fontawesome-free/css/all.min.css')); ?>">
    
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet"
        href="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')); ?>">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')); ?>">
    <!-- JQVMap -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/jqvmap/jqvmap.min.css')); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/dist/css/adminlte.css')); ?>">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.css')); ?>">
    <!-- summernote -->
    <link rel="stylesheet" href="<?php echo e(asset('assets/plugins/summernote/summernote-bs4.min.css')); ?>">
    <!-- icon -->
    <link rel="icon" type="image/x-icon" href="<?php echo e(asset('assets_home/images/boxlogo1.png')); ?>">

    <!--
    - livewire
    -->
    <?php echo \Livewire\Livewire::styles(); ?>


    <style>
        .fixed-ratio-resize {
            max-width: 100%;
            height: auto;
            width: auto\9;
        }
    </style>

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="<?php echo e(asset('assets_home/images/boxlogo1.png')); ?>" alt="logo"
                height="60" width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/home" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="/admin/logout" class="nav-link">Logout</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                
                <!-- Messages Dropdown Menu -->
                
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="/admin/home" class="brand-link">
                <img src="<?php echo e(asset('assets/dist/img/AdminLTELogo.png')); ?>" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">BOX GAME</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <?php $__currentLoopData = Session::get('adminImg'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <img src="<?php echo e(asset("$image")); ?>" class="img-circle elevation-2" alt="Image">
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="info">
                        <a href="/admin/home" class="d-block">
                            <?php if(Session::has('admin')): ?>
                                <?php $__currentLoopData = Session::get('admin'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variableName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($variableName); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php else: ?>
                                <?php $__currentLoopData = Session::get('boss'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $variableName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <span><?php echo e($variableName); ?></span>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </a>
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->


                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-book"></i>
                                <p>
                                    GAME
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/game/index" class="nav-link">
                                        <i class="nav-icon fas fa-table"></i>
                                        <p>View All</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/game/create" class="nav-link">
                                        <i class="nav-icon fas fa-edit"></i>
                                        <p>Add New Game</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/category/view" class="nav-link">
                                        <i class="nav-icon fas fa-th"></i>
                                        <p>Categories</p>
                                    </a>
                                </li>
                            </ul>
                        </li>




                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user"></i>
                                <p>
                                    CUSTOMER
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/user" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>View All</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-cart-plus"></i>
                                <p>
                                    ORDERS
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="/admin/cart/index" class="nav-link">
                                        <i class="fas fa-table nav-icon"></i>
                                        <p>View Cart</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/admin/cart/index/cartDetails" class="nav-link">
                                        <i class="far fa-edit nav-icon"></i>
                                        <p>View Cart Details</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        <?php if(Session::has('boss')): ?>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon fas fa-database"></i>
                                    <p>
                                        MANAGER
                                        <i class="fas fa-angle-left right"></i>
                                    </p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="/admin/manager" class="nav-link">
                                            <i class="fas fa-table nav-icon"></i>
                                            <p>View All</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <?php echo $__env->yieldContent('content'); ?>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2022 <a href="https://youtu.be/dQw4w9WgXcQ">Group 4 -
                    T1.2112.E0</a></strong>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 1.0.0
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="<?php echo e(asset('assets/plugins/jquery/jquery.min.js')); ?>"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="<?php echo e(asset('assets/plugins/jquery-ui/jquery-ui.min.js')); ?>"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo e(asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')); ?>"></script>
    <!-- ChartJS -->
    <script src="<?php echo e(asset('assets/plugins/chart.js/Chart.min.js')); ?>"></script>
    <!-- Sparkline -->
    <script src="<?php echo e(asset('assets/plugins/sparklines/sparkline.js')); ?>"></script>
    <!-- JQVMap -->
    <script src="<?php echo e(asset('assets/plugins/jqvmap/jquery.vmap.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/jqvmap/maps/jquery.vmap.usa.js')); ?>"></script>
    <!-- jQuery Knob Chart -->
    <script src="<?php echo e(asset('assets/plugins/jquery-knob/jquery.knob.min.js')); ?>"></script>
    <!-- daterangepicker -->
    <script src="<?php echo e(asset('assets/plugins/moment/moment.min.js')); ?>"></script>
    <script src="<?php echo e(asset('assets/plugins/daterangepicker/daterangepicker.js')); ?>"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="<?php echo e(asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
    <!-- Summernote -->
    <script src="<?php echo e(asset('assets/plugins/summernote/summernote-bs4.min.js')); ?>"></script>
    <!-- overlayScrollbars -->
    <script src="<?php echo e(asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')); ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo e(asset('assets/dist/js/adminlte.js')); ?>"></script>
    
    <?php echo $__env->yieldContent('footer-script'); ?>

    <!--
    - livewire
    -->
    <?php echo \Livewire\Livewire::scripts(); ?>




</body>

</html>
<?php /**PATH D:\New folder\htdocs\Box_Game_Store\resources\views/layouts/dashboards.blade.php ENDPATH**/ ?>