<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View Remedy</h4>
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
                        <!-- <form action="<?= base_url('admin/addCustomer') ?>" method="post"> -->
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Customer</h4> -->
                                <div class="mb-3  row">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">First Name</label>
                                            <div class="col-md-12 col-xl-10">
                                                <input class="form-control" type="text" value="<?php if($customer->first_name){echo "$customer->first_name";} ?>" name="first_name" placeholder="First Name Not Found" disabled required>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Last Name</label>
                                            <div class="col-md-12 col-xl-10">
                                                <input class="form-control" type="text" value="<?php if($customer->last_name){echo "$customer->last_name";} ?>" name="last_name" placeholder="Last Name Not Found" disabled>
                                            </div>
                                        </div> 
                                </div>   
                                <div class="mb-3  row">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Mobile Number</label>
                                            <div class="col-md-12 col-xl-10"> 
                                                <input class="form-control" type="text" value="<?php if($customer->mobile_no){echo "$customer->mobile_no";} ?>" name="mobile_no" placeholder="Mobile Number Not Found" required disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Date of Birth</label>
                                            <div class="col-md-12 col-xl-10">
                                                <input class="form-control" type="date" value="<?php if($customer->dob){echo "$customer->dob";} ?>" name="dob" placeholder="" required disabled>
                                            </div>
                                        </div> 
                                </div>   
                                <div class="mb-3  row"> 
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Birth Time</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="time" value="<?php if($customer->birth_time){echo "$customer->birth_time";} ?>" name="birth_time" placeholder="" required disabled>
                                        </div>
                                    </div> 
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Appointment Date</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="date" value="<?php if($customer->appointment_date){echo "$customer->appointment_date";} ?>"  name="appointment_date" placeholder="" required disabled>
                                        </div>
                                    </div> 
                                </div>   
                                <div class="mb-3  row">  
                                    <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Address</label>
                                    <div class="col-md-12 col-xl-10">
                                        <textarea class="form-control" id="address" name="address" placeholder="Address Not Found" required disabled><?php if($customer->address){echo "$customer->address";} ?></textarea>
                                    </div>
                                </div>  
                            </div>
                        <!-- </form> -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= base_url('admin/addRemedy') ?>" method="post">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Remedy</h4> -->
                                <div class="mb-3  row">   
                                    <div class="mb-3  row">  
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Remedy 1</label>
                                        <div class="col-md-12 col-xl-10">
                                            <textarea class="form-control" rows="4" cols="50" id="remedy_1" name="remedy_1" placeholder="Remedy 1 Not Found" required disabled><?php if($remedy->remedy_1){echo "$remedy->remedy_1";} ?></textarea>
                                        </div>
                                    </div>  
                                    <div class="mb-3  row">  
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Remedy 2</label>
                                        <div class="col-md-12 col-xl-10">
                                            <textarea class="form-control" rows="4" cols="50" id="remedy_2" name="remedy_2" placeholder="Remedy 2 Not Found" required disabled><?php if($remedy->remedy_2){echo "$remedy->remedy_2";} ?></textarea>
                                        </div>
                                    </div> 
                                    <div class="mb-3  row">  
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Remedy 3</label>
                                        <div class="col-md-12 col-xl-10">
                                            <textarea class="form-control" rows="4" cols="50" id="remedy_3" name="remedy_3" placeholder="Remedy 3 Not Found" required disabled><?php if($remedy->remedy_3){echo "$remedy->remedy_3";} ?></textarea>
                                        </div>
                                    </div>   
                                </div>     
                            </div>
                        </form>
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

    <script src="<?= base_url('assets') ?>/js/app.js"></script>
    </body>


    </html>