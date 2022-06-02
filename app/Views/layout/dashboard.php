<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/favicon.png') ?>">
    <title>Sistem Menejemen Marketing Online</title>
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/extra-libs/c3/c3.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/libs/chartist/dist/chartist.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css') ?>" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="<?= base_url('dist/css/style.min.css') ?>" rel="stylesheet">
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="<?= base_url('dashboard') ?>">
                            <b class="logo-icon">
                                <!-- Dark Logo icon -->
                                <img src="<?= base_url('assets/images/favicon.png') ?>" alt="homepage" class="dark-logo" width="50px"/>
                                <!-- Light Logo icon -->
                                <img src="<?= base_url('assets/images/favicon.png') ?>" alt="homepage" class="light-logo" width="50px"/>
                            </b>
                            <!--End Logo icon -->
                            <!-- Logo text -->
                            <span class="logo-text">
                                <!-- dark Logo text -->
                                SMMO
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)"
                        data-toggle="collapse" data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                            class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                                    <?php if(session()->get('profile') === NULL): ?>
                                                        <img src="<?= base_url('assets/images/default.png') ?>" alt="user" class="rounded-circle" width="40">
                                                    <?php elseif(session()->get('profile')): ?>
                                                        <img src="<?= base_url('profile/'.session()->get('profile')) ?>" alt="user" class="rounded-circle" width="40">
                                                    <?php endif ?>
                                <span class="ml-2 d-none d-lg-inline-block"><span>Halo, </span> <span
                                        class="text-dark"><?= session()->get('name') ?></span> <i data-feather="chevron-down"
                                        class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="<?= base_url('dashboard/profile/u/'.session()->get('email')) ?>"><i data-feather="user"
                                        class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard') ?>"
                                aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span
                                    class="hide-menu">Dashboard</span></a></li>                      
                        <?php if(session()->get('role') === 'Superuser'): ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Master Data</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link" href="<?= base_url('dashboard/posts') ?>"
                                    aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                        class="hide-menu">Data Iklan</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard/category') ?>"
                                    aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                        class="hide-menu">Data Kategori</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard/teams') ?>"
                                    aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                        class="hide-menu">Atur Team</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard/users') ?>"
                                    aria-expanded="false"><i data-feather="user-check" class="feather-icon"></i><span
                                        class="hide-menu">Atur User</span></a></li>

                        <?php elseif(session()->get('role') === 'Leader'): ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Master Data</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link" href="<?= base_url('dashboard/posts') ?>"
                                    aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                        class="hide-menu">Data Iklan</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard/category') ?>"
                                    aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                        class="hide-menu">Data Kategori</span></a></li>
                            <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('dashboard/profile/teams/'.session()->get('teams')) ?>"
                                    aria-expanded="false"><i data-feather="users" class="feather-icon"></i><span
                                        class="hide-menu">Atur Team</span></a></li>

                        <?php elseif(session()->get('role') === 'Employee'): ?>
                            <li class="list-divider"></li>
                            <li class="nav-small-cap"><span class="hide-menu">Master Data</span></li>
                            <li class="sidebar-item"> <a class="sidebar-link" href="<?= base_url('dashboard/posts/my/'.session()->get('id')) ?>"
                                    aria-expanded="false"><i data-feather="file-text" class="feather-icon"></i><span
                                        class="hide-menu">Data Iklan</span></a></li>
                            <?php if (session()->get('teams') === NULL): ?>
                            <li class="sidebar-item"> <a class="sidebar-link" href="<?= base_url('dashboard/profile/teams/error') ?>"
                                    aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                        class="hide-menu">Team Saya</span></a></li>
                            <?php elseif (session()->get('teams')): ?>
                            <li class="sidebar-item"> <a class="sidebar-link" href="<?= base_url('dashboard/profile/teams/'.session()->get('teams')) ?>"
                                    aria-expanded="false"><i data-feather="list" class="feather-icon"></i><span
                                        class="hide-menu">Team Saya</span></a></li>        
                            <?php endif ?>
                        <?php elseif(session()->get('role') === 'Unset'): ?>
    
                        <?php endif ?>

                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Lainnya</span></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="<?= base_url('logout') ?>"
                                aria-expanded="false"><i data-feather="log-out" class="feather-icon"></i><span
                                    class="hide-menu">Keluar</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <?php if($IniDashboard === TRUE): ?>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><?= $pages ?></li>
                                    <?php elseif($IniDashboard === FALSE): ?>
                                    <li class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>" class="text-muted">Dashboard</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page"><?= $pages ?></li>
                                    <?php endif ?>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <?= $this->renderSection('content') ?>
            
            </div>
            <footer class="footer text-center text-muted">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Made with ❤️ by SMMO </a></span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright                © <script>
                    document.write(new Date().getFullYear())
                    </script>. All rights reserved.</span>
            </footer>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="<?= base_url('assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/popper.js/dist/umd/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="<?= base_url('dist/js/app-style-switcher.js') ?>"></script>
    <script src="<?= base_url('dist/js/feather.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js') ?>"></script>
    <script src="<?= base_url('dist/js/sidebarmenu.js') ?>"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url('dist/js/custom.min.js') ?>"></script>
    <script>
        $('img[data-enlargeable]').addClass('img-enlargeable').click(function() {
  var src = $(this).attr('src');
  var modal;

  function removeModal() {
    modal.remove();
    $('body').off('keyup.modal-close');
  }
  modal = $('<div>').css({
    background: 'RGBA(0,0,0,.5) url(' + src + ') no-repeat center',
    backgroundSize: 'contain',
    width: '100%',
    height: '100%',
    position: 'fixed',
    zIndex: '10000',
    top: '0',
    left: '0',
    cursor: 'zoom-out'
  }).click(function() {
    removeModal();
  }).appendTo('body');
  //handling ESC
  $('body').on('keyup.modal-close', function(e) {
    if (e.key === 'Escape') {
      removeModal();
    }
  });
});
    </script>
    <!--This page JavaScript -->
    <script src="<?= base_url('assets/extra-libs/c3/d3.min.js') ?>"></script>
    <script src="<?= base_url('assets/extra-libs/c3/c3.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/chartist/dist/chartist.min.js') ?>"></script>
    <script src="<?= base_url('assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') ?>"></script>
    <script src="<?= base_url('assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js') ?>"></script>
    <script src="<?= base_url('assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js') ?>"></script>
    <script src="<?= base_url('dist/js/pages/dashboards/dashboard1.min.js') ?>"></script>
    <script src="<?= base_url('assets/extra-libs/datatables.net/js/jquery.dataTables.min.js') ?>"></script>
    <script src="<?= base_url('dist/js/pages/datatable/datatable-basic.init.js') ?>"></script>
</body>

</html>