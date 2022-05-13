<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - System CBT SMK Darmawan Sentul</title>
    <!-- css bootstrap -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/bootstrap.css'; ?>">
    <!-- css datatables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/Bootstrap-4-4.1.1/css/bootstrap.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/FixedColumns-3.2.5/css/fixedColumns.bootstrap4.min.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/DataTables/Responsive-2.2.2/css/responsive.bootstrap4.min.css'; ?>">
    <link rel="shortcut icon" href="">
    <!-- icon font awesome -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/all.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/brands.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/awesome/css/solid.css'; ?>">
    <!-- icon animate -->
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/animate/animate.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/style.css'; ?>">
    <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/sb-admin-2.min.css'; ?>">
    <script src="<?= base_url() . 'assets/sweetJs/sweetalert2.all.min.js' ?>"></script>
    <!-- JS MATH AJAX -->
    <!-- JQUERY -->
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery.js'; ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-1.9.1.min.js'; ?>"></script>
    <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-3.4.1.min.js'; ?>"></script>
</head>
    <?php 
    if ($_SERVER['REQUEST_URI']=='/favicon.ico') exit('');
    ?>
<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <!-- <img src="<?= base_url() . 'gambar/smk.png' ?>" alt="" height="65" width="65"> -->
                </div>
                <div class="sidebar-brand-text mx-3">Administrator</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('admin'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Setting Exam</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Ujian:</h6>
                        <a class="collapse-item" href="<?= base_url('Admin/settingExam'); ?>">Set Ujian</a>
                        <a class="collapse-item" href="utilities-border.html">E - Learning</a>
                        <a class="collapse-item" href="<?= base_url('Admin/pengawas'); ?>">Pengawas</a>
                        <a class="collapse-item" href="<?= base_url('Admin/ruang'); ?>">Ruang</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Berkas:</h6>
                        <a class="collapse-item" href="<?= base_url('Admin/ganti_password'); ?>">Ganti Password</a>
                        <div class="collapse-divider"></div>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            Nav Item - Tables
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li> -->

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->


                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama'); ?></span>
                                <img class="img-profile rounded-circle" src="<?= base_url('gambar/adminFoto/') . $this->session->userdata('pic'); ?>">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->