




<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php } ?>
        <h4 class="font-weight-bold mt-2 mb-4"><i class="feather icon-home"></i>Edit Service Type</h4>
       
        <div class="card mb-4">
            <h6 class="card-header">Edit Service Type</h6>
            
            <div class="card-body">
                <form method="post" action="<?= base_url('master/editEmployee/' . $employees['id']) ?>">

                <div style="display: flex; flex-wrap: wrap;">
               
                <div class="form-group col-6 ">
                <label class="form-label" for="customer_name">Employee Name: </label>
                <input value="<?= $employees['name'] ?>" type="text" class="form-control" id="name" name="name" required placeholder="Enter Name" >

                        </div>
                <div class="form-group col-6">
                            <label class="form-label" for="type">Employee Designation :</label>
                            <select  name="designation" class="select2-demo form-control " data-allow-clear="true" style="width: 100%">
                                <option value="<?= $employees['designation'] ?>" >Select Type</option>
                                <option> User </option>
                                <option>Technician</option>

                            </select>


                        </div>

                        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Contact Number:</label>
                            <input value="<?= $employees['contact'] ?>" type="text" class="form-control" name="contact" id="name" required placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Employee Address</label>
                            <textarea value="<?= $employees['address'] ?>" type="text" class="form-control" name="address" id="name" required placeholder="Enter Employee Address"> </textarea>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Employee Username</label>
                            <input value="<?= $employees['username'] ?>" type="text" class="form-control" name="username" id="name" required placeholder="Enter Employee Username">
                        </div>
                      

                   


           
            </form>
        </div>
        <button type="submit" class="btn btn-primary ">Update</button>
    </div>
</div>
</div>