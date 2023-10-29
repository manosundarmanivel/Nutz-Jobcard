<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>Sign Up - Sathyodhayam</title>
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
                                        <h5 class="text-primary">Create an Account</h5>
                                        <p>Sign up to join Sathyodhayam.</p>
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
                                <form class="form-horizontal" method="post" action="<?= base_url('dashboard/register') ?>">
                                    <div class="mb-3">
                                        <label for="full_name" class="form-label">Full Name</label>
                                        <input type="text" class="form-control" name="full_name" id="full_name" placeholder="Enter Your Full Name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm_password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <div>
                            <p>Already have an account? <a href="<?= base_url('Login') ?>" class="fw-medium text-primary">Login</a></p>
                            <p>© <script>document.write(new Date().getFullYear())</script> Sathyodhayam. Crafted with <i class="mdi mdi-heart text-danger"></i> by Nutz</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('assets') ?>/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/node-waves/waves.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/app.js"></script>
</body>
</html>
