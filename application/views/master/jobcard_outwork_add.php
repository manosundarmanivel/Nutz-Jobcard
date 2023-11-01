
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Outwork Vendor</h4>
<div class="card mb-4">
    <h6 class="card-header">Add Outwork Vendor</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('master/addOutwork') ?>">
        <div style="display: flex; flex-wrap: wrap;">
            <div class="form-group col-6">
                <label class="form-label" for="name">Vendor Name / Company Name :</label>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Employee Name">
            </div>
           

            <div class="form-group col-6 ">
                <label class="form-label" for="name">Vendor Mobile Number :</label>
                <input type="text" class="form-control" name="contact" id="name" required placeholder="Enter Contact Number">
            </div>
            <div class="form-group col-6">
                <label class="form-label" for="name">Vendor Address</label>
                <textarea type="text" class="form-control" name="address" id="name" required placeholder="Enter Employee Address"> </textarea>
            </div>
            <div class="form-group col-6">
                <label class="form-label" for="name">Vendor E-Mail ID</label>
                <input type="text" class="form-control" name="email" id="name" required placeholder="Enter Employee Username">
            </div>
            
            </div>


            <button type="submit" class="btn btn-primary">Add Outwork Vendor</button>
        </form>
    </div>
</div>
        </div>
</div>


