<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Product Category</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Product Master</li>
                <li class="breadcrumb-item">Product Category</li> 
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <div class="card mb-4">
            <h6 class="card-header">Product Category Edit</h6>
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
