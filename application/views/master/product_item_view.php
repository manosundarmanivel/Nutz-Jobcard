<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>View Items</h4>
        <div class="card">
            <h6 class="card-header">View Items</h6>
            <div class="card-datatable table-responsive p-3">
                <table class="datatables-demo table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                           
                            <th>Selling Unit Of Materials</th>
                            <th>Purchase Unit Of Materials</th>
                            <th>Product Category</th>
                            <th>Product Group</th>
                            <th>Product Model</th>
                            <th>Product Brand</th>
                            <th>Tax %</th>
                            <th>HSN / SAC Code</th>
                            <th>Purchase Price</th>
                            <th>Dealer Billing Price</th>
                            <th>Wholesale Price</th>
                            <th>MOP</th>
                            <th>Minimum Stock</th>
                            <th>Maximum Stock</th>
                            <th>Created By</th>
                            <th>Updated By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Options</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($product_items)) {
                          
                            foreach ($product_items as $product_item) { ?>
                                <tr>
                                    <td><?= $product_item['name'] ?></td>
                                    <td><?= $product_item['description'] ?></td>
                                    
                                    <td><?= $product_item['selling_unit'] ?></td>
                                    <td><?= $product_item['purchase_unit'] ?></td>
                                    <td><?= $product_item['category_name'] ?></td>
                                    <td><?= $product_item['group_name'] ?></td>
                                    <td><?= $product_item['model_name'] ?></td>
                                    <td><?= $product_item['brand_name'] ?></td>
                                    <td><?= $product_item['tax_value'] ?></td>
                                    <td><?= $product_item['hsn_sac_code'] ?></td>
                                    <td><?= $product_item['purchase_price'] ?></td>
                                    <td><?= $product_item['dealer_billing_price'] ?></td>
                                    <td><?= $product_item['wholesale_price'] ?></td>
                                    <td><?= $product_item['mpo'] ?></td>
                                    <td><?= $product_item['min_stock'] ?></td>
                                    <td><?= $product_item['max_stock'] ?></td>
                                    <td><?= $product_item['created_name'] ?></td>
                                    <td><?php
                                        if ($product_item['updated_name'] != NULL) {
                                            echo $product_item['updated_name'];
                                        } else {
                                            echo "-";
                                        }
                                        ?></td>
                                    <td><?= $product_item['created_at'] ?></td>
                                    <td><?= $product_item['updated_at'] ?></td>
                                    <td>
                                        <?php
                                        if ($product_item['is_default'] == 0) { ?>
                                            <a class="btn btn-info btn-sm" href="<?= base_url('master/editProductitem/'. $product_item['id']);?>" ><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                            <a class="btn btn-danger btn-sm" href="<?= base_url('master/deleteProductitem/' . $product_item['id']); ?>"><i class=" feather icon-trash-2"></i>&nbsp;Delete </a>
                                            <a class="btn btn-facebook btn-sm" href="<?= base_url('master/addProductimage/' . $product_item['id']); ?>"><i class=" feather icon-upload"></i>&nbsp;Add Image </a>
                                        <?php
                                        } else {
                                            echo ("-");
                                        }
                                        ?>

                                    </td>

                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="2">No active product categories found.</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/libs/datatables/datatables.js"></script>
<script src="<?= base_url('') ?>assets/js/pages/tables_datatables.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>