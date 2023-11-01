
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Ledger Group</h4>
<div class="card mb-4">
    <h6 class="card-header">Add Ledger Group</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('master/addledgergroup') ?>">
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label class="form-label" for="type">Type:</label>
                <select name="type" class="select2-demo form-control " data-allow-clear="true" style="width: 100%" >
                <option value="">Select Type</option>
                <option>Supplier</option>
                    <option>Customer</option>
                    
                </select>
               
                <!-- <input type="text" class="form-control" name="type" id="type" placeholder="Enter Type"> -->
            </div>

            <button type="submit" class="btn btn-primary">Add Ledger Group</button>
        </form>
    </div>
</div>
        </div>
</div>


