<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Customer</h4>
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
                        <form action="<?php if (isset($update)) {
                                            echo base_url("admin/addCustomer/$update->id");
                                        } else {
                                            echo base_url("admin/addCustomer");
                                        } ?>?>" method="post" enctype="multipart/form-data">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Customer</h4> -->
                                <div class="mb-3  row">
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">First Name</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="text" name="first_name" value="<?php if (isset($update)) if ($update->first_name) {
                                                                                                                    echo ucwords($update->first_name);
                                                                                                                } ?>" placeholder="Enter First Name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Last Name</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="text" name="last_name" value="<?php if (isset($update)) if ($update->last_name) {
                                                                                                                echo ucwords($update->last_name);
                                                                                                            } ?>" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3  row">
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Mobile Number</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="text" name="mobile_no" value="<?php if (isset($update)) if ($update->mobile_no) {
                                                                                                                echo ucwords($update->mobile_no);
                                                                                                            } ?>" placeholder="Enter Mobile Number" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Date of Birth</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="date" name="dob" value="<?php if (isset($update)) if ($update->dob) {
                                                                                                            echo date('Y-m-d', strtotime($update->dob));
                                                                                                        } ?>" placeholder="" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3  row">
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Birth Time</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="time" name="birth_time" value="<?php if (isset($update)) if ($update->birth_time) {
                                                                                                                    echo ucwords($update->birth_time);
                                                                                                                } ?>" placeholder="" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Place Of Birth</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="text" name="place_of_birth" value="<?php if (isset($update)) if ($update->place_of_birth) {
                                                                                                                        echo ucwords($update->place_of_birth);
                                                                                                                    } ?>" placeholder="Enter Place of Birth" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3  row">
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Referred By</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="text" name="referred_by" value="<?php if (isset($update)) if ($update->referred_by) {
                                                                                                                    echo ucwords($update->referred_by);
                                                                                                                } ?>" placeholder="Enter Referred By" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Upload Jaathagam</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="file" name="jataka[]" placeholder="" multiple>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3  row">
                                    <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Address</label>
                                    <div class="col-md-12 col-xl-10">
                                        <textarea class="form-control" id="address" name="address" placeholder="Enter Address" required><?php if (isset($update)) if ($update->address) {
                                                                                                                                            echo ucwords($update->address);
                                                                                                                                        } ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <div class="col-12 col-xl-7 d-flex ">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light"><?php if (isset($update)) {
                                                                                                                    echo "Update";
                                                                                                                } else {
                                                                                                                    echo "Submit";
                                                                                                                } ?></button>
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
                        <h4 class="mb-sm-0 font-size-18">Customer Details</h4>

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
                                        <th>Customer Id</th>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Mobile Number</th>
                                        <th>Date of Birth</th>
                                        <th>Birth Time</th>
                                        <th>Place Of Birth</th>
                                        <th>Jataka</th>
                                        <th>Referred By</th>
                                        <th>Address</th>
                                        <th>Created By</th>
                                        <th>Created At</th>
                                        <th>Remedy</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if ($customers)
                                        $no = 1;
                                    foreach ($customers as $customer) :   ?>
                                        <tr>
                                            <td><?= $no ?></td>
                                            <td><?php echo CUSTOMER_ID;
                                                echo "00$customer->id" ?></td>
                                            <td><?php if ($customer->first_name) {
                                                    echo ucwords($customer->first_name);
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?php if ($customer->last_name) {
                                                    echo ucwords($customer->last_name);
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?php if ($customer->mobile_no) {
                                                    echo $customer->mobile_no;
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?php if ($customer->dob) {
                                                    echo $this->Help->formateDate($customer->dob);
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?php if ($customer->birth_time) {
                                                    echo $customer->birth_time;
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?php if ($customer->place_of_birth) {
                                                    echo $customer->place_of_birth;
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            '<td><?php if ($customer->jataka) { ?><button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center" onclick='handleclick(<?= json_encode($customer->jataka) ?>)'>View</button><?php } else {
                                                                                                                                                                                                                                                                                                    echo "-";
                                                                                                                                                                                                                                                                                                }  ?></td>
                                            <td><?php if ($customer->referred_by) {
                                                    echo ucwords($customer->referred_by);
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?php if ($customer->address) {
                                                    echo ucwords($customer->address);
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?php if ($this->Help->getUserInfo($customer->created_by)->email) {
                                                    echo ucwords($this->Help->getUserInfo($customer->created_by)->email);
                                                } else {
                                                    echo "-";
                                                } ?></td>
                                            <td><?= $this->Help->formateDate($customer->created_at) ?></td>
                                            <td><a href="<?= base_url("admin/viewRemedy/$customer->id") ?>" class="badge bg-success p-2 align-bottom">View</a></td>
                                            <td><a href="<?= base_url("admin/addCustomer/$customer->id") ?>" class="badge bg-warning p-2 align-bottom">edit</a> &nbsp; <a href="<?= base_url("admin/deleteCustomer/$customer->id") ?>" class="badge bg-danger p-2 align-bottom">Delete</a></td>
                                        </tr>
                                    <?php $no++;
                                    endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bs-example-modal-center" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Jataka</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row" id="image">

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="rightbar-overlay"></div>

    <script>
        function handleclick(arr) {
            arr = JSON.parse(arr);

            let image_div = '';
            arr.forEach(v => {
                image_div += `<div class="col-6">
                               <a target="_blank" href="<?= base_url('assets/uploads/') ?>${v}"><img src="<?= base_url('assets/uploads/') ?>${v}" alt="" style="width: 220px;
  height: 400px;object-fit: contain;" > </a>
                            </div>`
            })
            console.log(image_div)

            document.getElementById("image").innerHTML = image_div;

            $('#myModal').on('shown.bs.modal', function() {
                $('#myInput').trigger('focus')
            })

        }
    </script>

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