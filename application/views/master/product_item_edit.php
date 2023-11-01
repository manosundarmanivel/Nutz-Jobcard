



<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Edit Items</h4>
        <div class="card mb-4">
            <h6 class="card-header">Edit Items</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/editProductitem/'. $product_item['id']) ?>">

<div style="display: flex; flex-wrap: wrap;">

<div class="form-group col-6">
                        <label class="form-label" for="customer_name">Item Code</label>
                        <input value="<?= $product_item['code'] ?>" type="text" class="form-control" id="name" name="icode" required placeholder="Enter Item Code ">
                    </div >
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Item Name</label>
                        <input  value="<?= $product_item['name'] ?>" type="text" class="form-control" id="name" name="name" required placeholder="Enter Item Name">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Description</label>
                        <input  value="<?= $product_item['description'] ?>" type="text" class="form-control" id="name" name="description" required placeholder="Enter Description">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Item Images / Videos</label>
                        <input value="<?= $product_item['image_url'] ?>" type="text" class="form-control" id="name" name="img" required placeholder="Item Images">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Selling Unit Of Materials</label>
                        <input value="<?= $product_item['selling_unit'] ?>" type="text" class="form-control" id="name" name="sellingunit" required placeholder="Enter Selling Unit Of Materials">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Purchase Unit Of Materials</label>
                        <input value="<?= $product_item['purchase_unit'] ?>" type="text" class="form-control" id="name" name="purchaseunit" required placeholder="Enter Purchase Unit Of Materials">
                    </div>



                    <div class="form-group col-6">
                        <label class="form-label" for="customer_group">Product Category:</label>
                        <p><?= $product_item['product_category_id'] ?></p>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_group">Product Model:</label>
                        <p><?= $product_item['product_model_id'] ?></p>
                    </div>
                    
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_group">Product Group:</label>
                        <p><?= $product_item['product_group_id'] ?></p>
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label" for="customer_group">Product Brand:</label>
                        <p><?= $product_item['product_brand_id'] ?></p>
                    </div>

                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Tax %</label>
                        <input value="<?= $product_item['tax_master_id'] ?>" type="text" class="form-control" id="tax" name="tax" required placeholder="Tax %">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">HSN / SAC Code</label>
                        <input value="<?= $product_item['hsn_sac_code'] ?>" type="text" class="form-control" id="tax" name="code" required placeholder="HSN / SAC Code">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Purchase Price</label>
                        <input value="<?= $product_item['purchase_price'] ?>" type="text" class="form-control" id="tax" name="purchaseprice" required placeholder="Purchase Price">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Dealer Billing Price</label>
                        <input value="<?= $product_item['dealer_billing_price'] ?>" type="text" class="form-control" id="tax" name="dealerbprice" required placeholder="Dealer Billing Price">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Wholesale Price</label>
                        <input  value="<?= $product_item['wholesale_price'] ?>" type="text" class="form-control" id="tax" name="wholesaleprice" required placeholder="Wholesale Price">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">MOP</label>
                        <input value="<?= $product_item['mpo'] ?>" type="text" class="form-control" id="tax" name="mop" required placeholder="MOP">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Minimum Stock</label>
                        <input value="<?= $product_item['min_stock'] ?>" type="text" class="form-control" id="tax" name="minimumstock" required placeholder="Minimum Stock">
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="customer_name">Maximum Stock</label>
                        <input value="<?= $product_item['max_stock'] ?>" type="text" class="form-control" id="tax" name="maximumstock" required placeholder="Maximum Stock">
                    </div>
</div>

                    <button type="submit" class="btn btn-primary">Update Item</button>
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