
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Product Category</h4>
<div class="card mb-4">
    <h6 class="card-header">Add Product Category</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('master/addProductcategory') ?>">
            

            <div class="form-group">
                <label class="form-label" for="type">Name of the Category:</label>
                <input type="text" class="form-control" name="product_category" id="name" required placeholder="Enter Name of the Category">
                
               
               
                
            </div>

            <button type="submit" class="btn btn-primary">Add Product Category</button>
        </form>
    </div>
</div>
        </div>
</div>


