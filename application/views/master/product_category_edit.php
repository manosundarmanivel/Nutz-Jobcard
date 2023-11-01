<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php } ?>
        <h4 class="font-weight-bold mt-2 mb-4"><i class="feather icon-home"></i>Edit Product Category</h4>
        <div class="card mb-4">
            <h6 class="card-header">Edit Product Category</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/editProductcategory/'.$product_category['id']) ?>">
                   
                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Product Category</label>
                            <select name="product_category" class="select2-demo form-control " data-allow-clear="true" style="width: 100%" >
                <option value=""><?= $product_category['name']?></option>
                <option> Machines </option>
                    <option> Spares</option>
                   
                </select>
                           
                        </div>

        </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
