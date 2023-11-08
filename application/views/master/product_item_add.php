<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Items</h4>
        <div class="card mb-4">
            <h6 class="card-header">Add Items</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/addProductitem') ?>">

                    <div style="display: flex; flex-wrap: wrap;">

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Item Code</label>
                            <input type="text" class="form-control" id="name" name="icode" required placeholder="Enter Item Code ">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Item Name</label>
                            <input type="text" class="form-control" id="name" name="name" required placeholder="Enter Item Name">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Description</label>
                            <input type="text" class="form-control" id="name" name="description" required placeholder="Enter Description">
                        </div>
                        <!-- <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Item Images / Videos</label>
                        <input type="text" class="form-control" id="name" name="img" required placeholder="Item Images">
                    </div> -->
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Selling Unit Of Materials</label>
                            <input type="text" class="form-control" id="name" name="sellingunit" required placeholder="Enter Selling Unit Of Materials">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Purchase Unit Of Materials</label>
                            <input type="text" class="form-control" id="name" name="purchaseunit" required placeholder="Enter Purchase Unit Of Materials">
                        </div>



                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Product Category:</label>
                            <select class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_c">
                                <option value="">Select Product Category</option>
                                <?php foreach ($active_product_categories as $product_category) { ?>
                                    <option value="<?= $product_category['id'] ?>"><?= $product_category['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Product Model:</label>
                            <select class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_m">
                                <option value="">Select Product Model</option>
                                <?php foreach ($active_product_models as $product_model) { ?>
                                    <option value="<?= $product_model['id'] ?>"><?= $product_model['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Product Group:</label>
                            <select class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_g">
                                <option value="">Select Product Group</option>
                                <?php foreach ($active_product_groups as $product_group) { ?>
                                    <option value="<?= $product_group['id'] ?>"><?= $product_group['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="form-group col-4">
                            <label class="form-label" for="customer_group">Product Brand:</label>
                            <select class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_b">
                                <option value="">Select Product Brand</option>
                                <?php foreach ($active_product_brands as $product_brand) { ?>
                                    <option value="<?= $product_brand['id'] ?>"><?= $product_brand['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col-2 m-3 p-1">
                            <button type="button" class="btn btn-primary" onclick="addNewProductBrand()">Add </button>


                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">HSN / SAC Code</label>
                            <input type="text" class="form-control" id="tax" name="code" required placeholder="HSN / SAC Code">
                        </div>
                        <div class="form-group col-6 ">
                            <label class="form-label" for="customer_group">Tax:</label>
                            <select class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="customer_groups" name="tax">
                                <option value="">Select Tax</option>
                                <?php foreach ($active_taxs as $tax) { ?>
                                    <option value="<?= $tax['id'] ?>"><?= $tax['value'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        
                        
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Purchase Price</label>
                            <input type="text" class="form-control" id="tax" name="purchaseprice" required placeholder="Purchase Price">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Dealer Billing Price</label>
                            <input type="text" class="form-control" id="tax" name="dealerbprice" required placeholder="Dealer Billing Price">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Wholesale Price</label>
                            <input type="text" class="form-control" id="tax" name="wholesaleprice" required placeholder="Wholesale Price">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">MOP</label>
                            <input type="text" class="form-control" id="tax" name="mop" required placeholder="MOP">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Minimum Stock</label>
                            <input type="text" class="form-control" id="tax" name="minimumstock" required placeholder="Minimum Stock">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Maximum Stock</label>
                            <input type="text" class="form-control" id="tax" name="maximumstock" required placeholder="Maximum Stock">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Item</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script>
    function addNewProductBrand() {
        // Navigate to the "Add Customer Group" page
        window.location.href = "<?php echo base_url('master/product_brand_add'); ?>"; // Replace with the actual URL
    }
</script>
<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script>