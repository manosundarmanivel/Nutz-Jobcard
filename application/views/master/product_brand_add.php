
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Product Brand</h4>
<div class="card mb-4">
    <h6 class="card-header">Add Product Brand</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('master/addProductbrand') ?>">
            <div class="form-group">
                <label class="form-label" for="name">Name of the Product Brand:</label>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Name">
            </div>

            <button type="submit" class="btn btn-primary">Add Product Brand</button>
        </form>
    </div>
</div>
        </div>
</div>


