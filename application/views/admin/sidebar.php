<!doctype html>
<html lang="en"> 
<head> 
    <meta charset="utf-8" />
    <title>Sathyodhayam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link rel="shortcut icon" href="<?= base_url('assets/') ?>images/header/favicon.svg">
    <link href="<?= base_url('assets/') ?>css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets/') ?>css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets') ?>/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets') ?>/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= base_url('assets') ?>/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
</head>

<body data-topbar="white">
    <div id="layout-wrapper">
        <header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">
                    <div class="navbar-brand-box">
                        <a href="" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="<?= base_url('assets') ?>/images/header/favicon.svg" alt="" height="40">
                            </span>
                            <span class="logo-lg">
                            <img src="<?= base_url('assets') ?>/images/header/logo.png" alt="" height="55" >
                            </span>
                        </a>
                        <a href="" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="<?= base_url('assets') ?>/images/header/favicon.svg" alt="" height="40">
                            </span>
                            <span class="logo-lg">
                                <img src="<?= base_url('assets') ?>/images/header/logo.png" alt="" height="40">
                            </span>
                        </a>
                    </div>
                    <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex">
                    <div class="dropdown d-inline-block d-lg-none ms-2">
                        <button type="button" class="btn header-item noti-icon waves-effect" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-magnify"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-bs-toggle="fullscreen">
                            <i class="bx bx-fullscreen"></i>
                        </button>
                    </div>
                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="<?= base_url('assets') ?>/images/users/avatar-1.jpg" alt="Header Avatar">
                            <span class="d-none d-xl-inline-block ms-1" key="t-henry"><?php if($this->session->userdata("userdata")->first_name){echo ucwords($this->session->userdata("userdata")->first_name);}else{echo "--";} ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"> 
                            <a class="dropdown-item text-danger" href="<?= base_url('admin/logout') ?>"><i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i> <span key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="vertical-menu">
            <div data-simplebar class="h-100">
                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">
                        <li class="menu-title" key="t-menu"></li>
                        <li><a href="<?= base_url('admin') ?>" key="t-dashboards"><i class="bx bx-home-circle"></i><span key="t-dashboards">Dashboards</span></a></li>
                        <li><a href="<?= base_url('admin/adduser') ?>" key="t-dashboards"><i class="bx bx-user-plus"></i><span key="t-dashboards">Add User</span></a></li>
                        <li><a href="<?= base_url('admin/addCustomer') ?>" key="t-dashboards"><i class="bx bx-user-plus"></i><span key="t-dashboards">Add Customer</span></a></li>
                        <li><a href="<?= base_url('admin/addCategory') ?>" key="t-dashboards"><i class="bx bx-layer"></i><span key="t-dashboards">Add Category</span></a></li>
                        <li><a href="<?= base_url('admin/addAppointment') ?>" key="t-dashboards"><i class="bx bx-calendar"></i><span key="t-dashboards">Add Appointment</span></a></li>
                        <li><a href="<?= base_url('admin/addRemedy') ?>" key="t-dashboards"><i class="bx bx-bell"></i><span key="t-dashboards">Add Remedy</span></a></li>
                        <!-- <li>
                            <a href="javascript: void(0);" class="waves-effect">
                                <i class="bx bx-detail"></i>
                                <span key="t-blog">Calls</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="<?= base_url('Admin/Allslots') ?>" key="t-dashboards"><span key="t-blog-details">All Calls</span></a></li>
                                <li><a href="<?= base_url('Admin/Bookedcalls') ?>" key="t-dashboards"><span key="t-blog-details">Booked Calls</span></a></li>
                                <li><a href="<?= base_url('Admin/CompletedCalls') ?>" key="t-blog-details"><span key="t-blog-details">Completed Calls</span></a></li>
                                <li><a href="<?= base_url('Admin/PendingCalls') ?>" key="t-blog-details"><span key="t-blog-details">Refund Calls</span></a></li>
                            </ul>
                        </li> -->   
                    </ul>
                </div>
            </div>
        </div>