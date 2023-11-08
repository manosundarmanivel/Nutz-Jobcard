<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php } ?>
        <h4 class="font-weight-bold mt-2 mb-4"><i class="feather icon-home"></i>Edit Product Model</h4>
        <div class="card mb-4">
            <h6 class="card-header">Edit Product Model</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/editProductmodel/' . $product_model['id']) ?>">

                <div class="form-group col-12">
                <label class="form-label" for="customer_name">Product Group Name:</label>
                <input value="<?= $product_model['name'] ?>" type="text" class="form-control" id="name" name="name" required placeholder="Enter Name" >
            </div>

            <div class="form-group col-12">
                <label class="form-label" for="customer_group" >Product Group:</label>
                <p><?= $product_model['group_name'] ?></p>
            

            </div>


            <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
</div>
</div>