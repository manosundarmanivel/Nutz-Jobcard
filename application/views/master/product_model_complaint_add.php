<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Product Group</h4>
<div class="card mb-4">
    <h6 class="card-header">Add Product Group</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('master/addProductmodelcomplaint') ?>">
       
        
        <div class="form-group col-12">
                <label class="form-label" for="customer_name">Type of Complaint</label>
                <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
            </div>
        
            
       
            <div class="form-group col-12">
                <label class="form-label" for="customer_group" >Product Model:</label>
                <select class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="product_model_id" name="product_model">
                 <option value="">Select Customer Group</option>
                    <?php foreach ($active_product_models as $product_model) { ?>
                        <option value="<?= $product_model['id'] ?>"><?= $product_model['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
        </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script> 

