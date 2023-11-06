<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Login - Sathyodhayam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= base_url('assets') ?>/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets') ?>/css/icons.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets') ?>/css/app.min.css" id="app-style" rel="stylesheet" type="text/css">
</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p>Sign in to continue to Sathyodhayam.</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="<?= base_url('assets') ?>/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light" style="background-color: #fff !important;">
                                            <img src="<?= base_url('assets') ?>/images/header/favicon.svg" alt="" height="55">
                                        </span>
                                    </div>
                                </a>
                                <a href="" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light" style="background-color: #fff !important;">
                                            <img src="<?= base_url('assets') ?>/images/header/favicon.svg" alt="" height="55">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <div class="p-2">
                                <?php if ($this->session->flashdata('message')) { ?>
                                    <div class="alert alert-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" role="alert">
                                        <?= $this->session->flashdata('message')[1] ?>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php } ?>
                                <div class="mt-3">
                                    <!-- Form for user login -->
                                    <form class="form-horizontal" method="post" action="<?= base_url('dashboard/login') ?>">
                                        <div class="mb-3">
                                            <label for="login_email" class="form-label">Email</label>
                                            <input type="text" class="form-control" name="username" id="login_email" placeholder="Enter Email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group auth-pass-inputgroup">
                                                <input type="password" class="form-control" name="password" placeholder="Enter password" aria-label="password" aria-describedby="password-addon" required>
                                                <button class="btn btn-light " type="button" id="password-addon"><i class="mdi mdi-eye-outline"></i></button>
                                            </div>
                                        </div>
                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log In</button>
                                            <p>Already have an account? <a href="<?= base_url('dashboard/register') ?>" class="fw-medium text-primary">SignUp</a></p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div>
                            <p>© <script>document.write(new Date().getFullYear())</script> Sathyodhayam. Crafted with <i class="mdi mdi-heart text-danger"></i> by Nutz</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end account-pages -->
    <!-- JAVASCRIPT -->
    <script src="<?= base_url('assets') ?>/libs/jquery/jquery.min.js"></script>
   
