<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Product Model</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Product Master</li>
                <li class="breadcrumb-item">Product Model</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <div class="card mb-4">
            <h6 class="card-header">Product Model Add</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/addProductmodel') ?>">


                    <div class="form-group col-12">
                        <label class="form-label" for="customer_name">Product Model Name:</label>
                        <input required  type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
                    </div>


                    <div style="display: flex;">
                        <div class="form-group col-10">
                            <label class="form-label" for="customer_group">Product Group:</label>
                            <select required  class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="customer_groups" name="customer_group">
                                <option value="">Select Customer Group</option>
                                <?php foreach ($active_product_groups as $product_group) { ?>
                                    <option value="<?= $product_group['id'] ?>"><?= $product_group['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-2 m-3 p-1">
                            <button type="button" class="btn btn-primary" onclick="addNewProductGroup()">Add </button>


                        </div>
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function addNewProductGroup() {
        // Navigate to the "Add Customer Group" page
        window.location.href = "<?php echo base_url('master/product_group_add'); ?>"; // Replace with the actual URL
    }
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script>