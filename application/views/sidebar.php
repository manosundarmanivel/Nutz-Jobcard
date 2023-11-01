<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<head>
    <title>Nutz Bill</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- Icon fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="shortcut icon" href="https://ik.imagekit.io/bfzb9z4tav/assets/favicon_Sp-YkBzsc.svg" type="image/x-icon">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/libs/select2/select2.css">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/fonts/ionicons.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/fonts/feather.css"> 
    <!-- Core stylesheets -->
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/bootstrap-material.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/shreerang-material.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/css/uikit.css">
    <link rel="stylesheet" href="<?= base_url('') ?>assets/libs/datatables/datatables.css"> 
    <script>
        function ShowModel(e){
            e.preventDefault();
            document.getElementById('modals-top').classList.add("show");
        }
    </script> 

    <style>
        @media screen and (min-width:1000px) {
            .logout {
                width: 100%;
            }
        }

        .dropdown-menu{
            max-height:500px;
            overflow-y: scroll;
        }

        .dt-button {
            outline: none;
            border: none;
            border-radius: 2px;
            padding: 0.375rem 0.25rem;
            min-width: calc(1.5rem + 2px);
            font-size: .75rem;
            border-color: #ff4a00 !important;
            background-color: #ff4a00 !important;
            color: #fff !important;
        }
    </style>
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-white">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        <img src="assets/img/logo.png" alt="Brand Logo" class="img-fluid">
                    </span>
                    <a href="index-2.html" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Empire</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>
                      <!-- Links -->

                <li class="sidenav-item open">
                    <a href="javascript:" class="sidenav-link sidenav-toggle">

                        <div>Masters</div>

                    </a>
                    <ul class="sidenav-inner sidenav-menu py-1">

                        <!-- Dashboards -->
                        <li class="sidenav-item  ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Ledger Group</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="ledger_group_master_add"){echo "active";} ?> ">
                                    <a href="<?= base_url('master/ledger_group_master_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="ledger_group_master_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/ledger_group_master_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Ledger</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="ledger_master_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/ledger_master_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="ledger_master_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/ledger_master_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item  ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Product Category</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="product_category_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_category_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="product_category_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_category_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Product Group</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="product_group_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_group_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="product_group_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_group_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Product Model</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="product_model_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_model_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="product_model_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_model_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Product Model Complaint</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="product_model_complaint_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_model_complaint_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="product_model_complaint_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_model_complaint_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item open ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Product Brand</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="product_brand_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_brand_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="product_brand_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_brand_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item  ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>Product Item</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="product_item_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_item_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="product_item_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/product_item_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item  ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>JobCard Service Type</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="jobcard_service_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/jobcard_service_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="jobcard_service_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/jobcard_service_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item  ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>JobCard Employee</div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="jobcard_employee_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/jobcard_employee_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="jobcard_employee_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/jobcard_employee_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                        <li class="sidenav-item  ">
                            <a href="javascript:" class="sidenav-link sidenav-toggle">

                                <div>JobCard Outwork Vendor </div>

                            </a>
                            <ul class="sidenav-menu">
                                <li class="sidenav-item <?php if($classname=="jobcard_outwork_add"){echo "active";} ?>">
                                    <a href="<?= base_url('master/jobcard_outwork_add') ?>" class="sidenav-link">
                                        <div>Add</div>
                                    </a>
                                </li>
                                <li class="sidenav-item <?php if($classname=="jobcard_outwork_view"){echo "active";} ?>">
                                    <a href="<?= base_url('master/jobcard_outwork_view') ?>" class="sidenav-link">
                                        <div>View</div>
                                    </a>
                                </li>



                            </ul>
                        </li>
                    </ul>

                </li>

   







                <!-- UI elements -->







            </div> 
            <div class="layout-container"> 
                <nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-white container-p-x"> 
                    <a href="" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
                        <span class="app-brand-logo demo" style="margin-left: 10px;">
                            <img src="https://ik.imagekit.io/bfzb9z4tav/assets/Nutz_R_c7vy0Z41x.svg?updatedAt=1626781279459" alt="Brand Logo" width="100px" height="100px">
                        </span>
                        <!-- <span class="app-brand-text demo font-weight-normal ml-2">Nutz</span> -->
                    </a>

                    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
                    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
                        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
                            <i class="ion ion-md-menu text-large align-middle"></i>
                        </a>
                    </div>
                    <!-- Divider -->
                    <!-- Divider -->
                    <div class="demo-navbar-user nav-item dropdown logout" style="display:flex;justify-content:end;">
                    <div class="d-inline-flex flex-lg-row-reverse align-items-center align-middle cursor-pointer" onclick=ShowModel() data-toggle="modal" data-target="#modals-top"><i class="feather icon-help-circle text-danger"></i></div>
                        <a class="nav-link  dropdown-toggle" href="#" data-toggle="dropdown">
                            <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                                <!-- <img src="" alt class="d-block ui-w-30 rounded-circle"> -->
                                <span class="px-1 mr-lg-2 ml-2 ml-lg-0">text</span>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right overflow-hidden">
                            <a href="<?= base_url('OAuth/Logout') ?>" class="dropdown-item">
                                <!-- <a href="https://accounts.google.com/Logout" class="dropdown-item"> -->
                                <i class="feather icon-power text-danger"></i> &nbsp; Log Out
                            </a>
                        </div>
                    </div>
                </nav>
                            <div class="modal modal-top fade" id="modals-top">
                                <div class="modal-dialog">
                                    <form class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Shortcuts Keys
                                                <!-- <span class="font-weight-light">Information</span> -->
                                                <br>
                                                <!-- <small class="text-muted">We need payment information to process your order.</small> -->
                                            </h5>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button> -->
                                        </div>
                                        <div class="modal-body">
                                            
                                            <div class="form-row">
                                                <div class="form-group col-12 mb-2">
                                                    <span><strong>Shift+RightArrow : </strong>
                                                    Add single product and move to next product </span>
                                                </div>
                                                <div class="form-group col-12 mb-2">
                                                    <span><strong>Shift+DownArrow : </strong>
                                                    Move to Bill to Details </span>
                                                </div>
                                                <div class="form-group col-12 mb-2">
                                                    <span><strong>Shift+Enter : </strong>
                                                    Print Bill</span>
                                                </div>
                                                <div class="form-group col-12 mb-0">
                                                    <span><strong>Esc : </strong>
                                                    To close the Print Bill page</span>
                                                </div> 
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <!-- <button type="button" class="btn btn-primary">Save</button> -->
                                        </div>
                                    </form>
                                </div>
                            </div>