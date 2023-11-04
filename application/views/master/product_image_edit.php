<style>
    #imagePreview {
        display: flex;
        flex-wrap: wrap;
        margin-top: 10px;
    }

    .preview-image {
        width: 100px;
        height: 100px;
        object-fit: cover;
        margin: 5px;
        border: 1px solid #ccc;
    }

   

.image-container {

    margin-right: 10px; /* Adjust margin as needed */
    margin-bottom: 10px; /* Adjust margin as needed */
}

.image-wrapper {
    position: relative;
}

.delete-button {
    text-align: center;
    margin-top: 5px; /* Adjust margin as needed */
}

</style>

<link rel="stylesheet" href="<?= base_url('') ?>assets/libs/dropzone/dropzone.css">

<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Product Image</h4>
        <div class="card mb-4">
            <h6 class="card-header">Add Product Image</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/saveProductImage/' . $product_item['id']) ?>" enctype="multipart/form-data">

                    <div style="display: flex; flex-wrap: wrap;">

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Item Code</label>

                            <p><?= $product_item['code'] ?></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Item Name</label>
                            <p><?= $product_item['code'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Description</label>
                            <p><?= $product_item['description'] ?></p>

                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Selling Unit Of Materials</label>
                            <p><?= $product_item['selling_unit'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Purchase Unit Of Materials</label>
                            <p><?= $product_item['purchase_unit'] ?></p>

                        </div>



                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Product Category:</label>
                            <p><?= $product_item['category_name'] ?></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Product Model:</label>
                            <p><?= $product_item['model_name'] ?></p>
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Product Group:</label>
                            <p><?= $product_item['group_name'] ?></p>
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Product Brand:</label>
                            <p><?= $product_item['brand_name'] ?></p>
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Tax %</label>
                            <p><?= $product_item['tax_master_id'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">HSN / SAC Code</label>
                            <p><?= $product_item['hsn_sac_code'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Purchase Price</label>
                            <p><?= $product_item['purchase_price'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Dealer Billing Price</label>
                            <p><?= $product_item['dealer_billing_price'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Wholesale Price</label>
                            <p><?= $product_item['wholesale_price'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">MOP</label>
                            <p><?= $product_item['mpo'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Minimum Stock</label>
                            <p><?= $product_item['min_stock'] ?></p>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Maximum Stock</label>
                            <p><?= $product_item['max_stock'] ?></p>

                        </div>


                        <div class="form-group col-6">
                            <input type="file" name="img[]" multiple required>
                            <button type="submit" class="btn btn-primary">Add Image</button>
                        </div>

                    </div>


                    <!-- <div class="card mb-4">
                            <h6 class="card-header">Dropzone</h6>
                            <div class="card-body">
                                <form method="post" action="<?= base_url('master/saveProductImage/' . $product_item['id']) ?>" enctype="multipart/form-data" class="dropzone needsclick" id="dropzone-demo">
                                    <div class="dz-message needsclick">
                                        Drop files here or click to upload
                                        <span class="note needsclick">(This is just a demo dropzone. Selected files are<strong>not</strong> actually uploaded.)</span>
                                    </div>
                                    <div class="fallback">
                                    <input type="file" name="img[]" multiple required>
                                        <div class="clearfix"></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Add Image</button>
                                </form>
                            </div>
                        </div> -->






                </form>


            </div>




            <div id="gallery-thumbnails" class="col form-col">
    <div class="gallery-sizer col-sm-12 col-md-2 col-xl-3 position-absolute"></div>
    <div style="display: flex; flex-wrap: wrap; justify-content: space-around "  class="gallery-thumbnail ">
        <?php foreach ($product_image as $image_url) { ?>
            <div class="image-container"> <!-- Added a container for each image -->
                <div class="image-wrapper">
                    <a href="<?= base_url("/assets/uploads/" . $image_url['image_url']) ?>" class="img-thumbnail img-thumbnail-zoom-in">
                        <span class="img-thumbnail-overlay bg-dark opacity-25"></span>
                        <span class="img-thumbnail-content display-4 text-white">
                            <i class="ion ion-ios-search"></i>
                        </span>
                        <img width="400px" src="<?= base_url("/assets/uploads/" . $image_url['image_url']) ?>" class="img-fluid" alt="images">
                    </a>
                </div>
                <div class="delete-button">
                    <a class="btn btn-danger btn-sm" href="<?= base_url('master/deleteProductimage/' . $image_url['id']); ?>"><i class="feather icon-trash-2"></i>&nbsp;Delete</a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>


        </div>
    </div>
</div>
</div>




<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script>
<script src="<?= base_url('') ?>assets/libs/dropzone/dropzone.js"></script>
