<div class="main-content"> 
    <div class="page-content">
        <div class="container-fluid">
            <div class="row"> 
                <div class="col-xl-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card mini-stats-wid">
                                <div class="card-body">
                                    
                                    <div class="d-flex flex-wrap">
                                        <div class="me-3">
                                            <p class="text-muted mb-2">Total Active User</p>
                                            <h5 class="mb-0"><?=$active_user?></h5>
                                        </div>

                                        <div class="avatar-sm ms-auto">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                                <i class="bx bxs-user"></i>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card blog-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap">
                                        <div class="me-3">
                                            <p class="text-muted mb-2">Total In Active User</p>
                                            <h5 class="mb-0"><?=$inactive_user?></h5>
                                        </div>

                                        <div class="avatar-sm ms-auto">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="card blog-stats-wid">
                                <div class="card-body">

                                    <div class="d-flex flex-wrap">
                                        <div class="me-3">
                                            <p class="text-muted mb-2">Total Active Customer</p>
                                            <h5 class="mb-0"><?=$active_customer?></h5>
                                        </div>

                                        <div class="avatar-sm ms-auto">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-4">
                            <div class="card blog-stats-wid">
                                <div class="card-body">
                                    <div class="d-flex flex-wrap">
                                        <div class="me-3">
                                            <p class="text-muted mb-2">Total In Active Customer</p>
                                            <h5 class="mb-0"><?=$inactive_customer?></h5>
                                        </div>

                                        <div class="avatar-sm ms-auto">
                                            <div class="avatar-title bg-light rounded-circle text-primary font-size-20">
                                            <i class="bx bxs-user"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                            <h4 class="mb-sm-0 font-size-18">Remedy Reminder</h4>
    
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
                                            <th>Customer Name</th> 
                                            <th>Reminder</th> 
                                            <th>Date</th> 
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if($reminders)
                                        $no=1;
                                        foreach ($reminders as $reminder) :   ?>
                                            <tr>
                                                <td><?= $no ?></td>
                                                <td><?= ucwords($reminder->customer_name) ?></td> 
                                                <td><?php if($reminder->remedy=="remedy_1"){echo "Reminder 1";}elseif($reminder->remedy=="remedy_2"){echo "Reminder 2";}elseif($reminder->remedy=="remedy_3"){echo "Reminder 3";}  ?></td> 
                                                <td><?php if($reminder->remedy=="remedy_1"){echo date("d M Y", strtotime($reminder->remedy_1_date ));}elseif($reminder->remedy=="remedy_2"){echo date("m-d-Y", strtotime($reminder->remedy_2_date));}elseif($reminder->remedy=="remedy_3"){echo date("m-d-Y", strtotime($reminder->remedy_3_date));}  ?></td> 
                                                <td><a href="<?= base_url("admin/viewRemedy/$reminder->customer_id/$reminder->id") ?>" class="badge bg-success p-2 align-bottom">view</a></td>   
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