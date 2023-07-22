<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add User</h4>
                    </div>
                </div>
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('message')[1] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php   } ?>
            </div> 
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= base_url('admin/addUser') ?>" method="post">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add User</h4> -->
                                <div class="mb-3  row">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">First Name</label>
                                            <div class="col-md-12 col-xl-10">
                                                <input class="form-control" type="text" name="first_name" placeholder="Enter First Name" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Last Name</label>
                                            <div class="col-md-12 col-xl-10">
                                                <input class="form-control" type="text" name="last_name" placeholder="Enter Last Name">
                                            </div>
                                        </div> 
                                </div>  
                                <div class="mb-3  row">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Email</label>
                                            <div class="col-md-12 col-xl-10">
                                                <input class="form-control" type="email" name="email" placeholder="Enter Email" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Password</label>
                                            <div class="col-md-12 col-xl-10">
                                                <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
                                            </div>
                                        </div> 
                                </div>  
                                <div class="mb-3 row">
                                    <div class="col-12 col-xl-7 d-flex ">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content py-0">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">User Details</h4>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- <h4 class="card-title">Default Datatable</h4> -->
                            <table id="datatable-buttons" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>S.No</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th> 
                                        <th>Created By</th>
                                        <th>Created At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if($users)
                                    $no=1;
                                    foreach ($users as $user) :   ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?= ucwords($user->first_name) ?></td>
                                            <td><?php if($user->last_name){ echo ucwords($user->last_name); }else{echo "-";} ?></td>
                                            <td><?php if($user->email){echo ucwords($user->email);}else{echo "-";} ?></td>   
                                            <td><?php if($this->Help->getUserInfo($user->created_by)->email){echo ucwords($this->Help->getUserInfo($user->created_by)->email);}else{echo "-";} ?></td>   
                                            <td><?= $user->created_at ?></td>   
                                            <td><a href="<?= base_url("admin/deleteUser/$user->id") ?>" class="badge bg-danger p-2 align-bottom">Delete</a></td>   
                                        </tr>
                                    <?php $no++; endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>

    <div class="rightbar-overlay"></div>
 
    <script src="<?= base_url('assets') ?>/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/node-waves/waves.min.js"></script>
 
    <script src="<?= base_url('assets') ?>/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
 
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
 
    <script src="<?= base_url('assets') ?>/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
 
    <script src="<?= base_url('assets') ?>/js/pages/datatables.init.js"></script>

    <script src="<?= base_url('assets') ?>/js/app.js"></script>
    </body>


    </html>