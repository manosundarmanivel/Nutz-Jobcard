<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<head>
    <title>Login</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Empire is one of the unique admin template built on top of Bootstrap 4 framework. It is easy to customize, flexible code styles, well tested, modern & responsive are the topmost key factors of Empire Dashboard Template" />
    <meta name="keywords" content="bootstrap admin template, dashboard template, backend panel, bootstrap 4, backend template, dashboard template, saas admin, CRM dashboard, eCommerce dashboard">
    <meta name="author" content="Codedthemes" />
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets') ?>/img/favicon.ico">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->


    <!-- Core stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap-material.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/shreerang-material.css">
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/libs/perfect-scrollbar/perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/pages/authentication.css">
</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner py-5">

            <!-- [ Logo ] Start -->
            <div class="d-flex justify-content-center align-items-center">
                <div class="ui-w-60">
                    <div class="w-100 position-relative">
                        <img src="<?= base_url('assets') ?>/img/logo-dark.png" alt="Brand Logo" class="img-fluid">
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <form class="my-5" method="post" action="<?= base_url('dashboard/login') ?> ">
                <div class="form-group">
                    <label class="form-label">Username</label>
                    <input type="text" class="form-control" name="username" id="login_email" placeholder="Enter Email" required>
                    <div class="clearfix"></div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="password" aria-describedby="password-addon" required>
                    <div class="clearfix"></div>
                </div>
                <button type="submit" class="btn btn-primary btn-block mt-4">Login</button>

            </form>
            <!-- [ Form ] End -->

            <div>
                <?php if ($this->session->flashdata('message')) { ?>

                    <div class="alert alert-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?= $this->session->flashdata('message')[1] ?>
                    </div>

                <?php } ?>
            </div>

        </div>
    </div>
    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="<?= base_url('assets') ?>/js/pace.js"></script>
    <script src="<?= base_url('assets') ?>/js/jquery-3.3.1.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/popper/popper.js"></script>
    <script src="<?= base_url('assets') ?>/js/bootstrap.js"></script>



</body>


<!-- Mirrored from html.phoenixcoded.net/empire/bootstrap/default/pages_authentication_register-v1.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 16 Sep 2020 08:13:46 GMT -->

</html>