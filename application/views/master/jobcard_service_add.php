
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Service Type</h4>
<div class="card mb-4">
    <h6 class="card-header">Add Service Type</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('master/addServicetype') ?>">
            <div class="form-group">
                <label class="form-label" for="name">Service Type:</label>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Service Type">
            </div>
            <div class="form-group">
                <label class="form-label" for="name">Description:</label>
                <input type="text" class="form-control" name="description" id="name" required placeholder="Enter Service Type">
            </div>

            <button type="submit" class="btn btn-primary">Add Service Type</button>
        </form>
    </div>
</div>
        </div>
</div>


