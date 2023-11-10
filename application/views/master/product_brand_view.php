
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Product Brand</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Product Master</li>
                <li class="breadcrumb-item">Product Brand</li> 
                <li class="breadcrumb-item active">View</li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
    <div class="card">
    <div style="display: flex; justify-content:space-between; align-items: center;
            border-bottom: 0 solid rgba(24, 28, 33, 0.13);
            border-color: rgba(24, 28, 33, 0.13);
            border-radius: 0.125rem 0.125rem 0 0; 
            border-bottom-width: 1px;">
                <h6 class="card-header" style="border:none">Product Brand View</h6>
                <div>
                    <a href="<?=base_url('master/product_brand_add')?>" class="btn btn-primary mr-3">Add Product Brand</a> 
                </div>
            </div>
        <div class="card-datatable table-responsive p-3">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Options</th>
                        

                    </tr>
                </thead>
            
               
                <tbody>
                    <?php if (!empty($product_brands)) {
                        foreach ($product_brands as $product_brand) { ?>
                            <tr>
                                <td><?= $product_brand['name'] ?></td>
                                
                                <td><?= $product_brand['created_name']?></td>
                                <td><?php
                                        if ($product_brand['updated_name'] != NULL) {
                                            echo $product_brand['updated_name'];
                                        } else {
                                            echo "-";
                                        }
                                        ?></td>
                                <td><?= $product_brand['created_at']?></td>
                                <td><?= $product_brand['updated_at']?></td>
                                <td>
                                    <?php 
                                    if($product_brand['is_default'] == 0)
                                    { ?>
 <a  class="btn btn-info btn-sm" href="<?= base_url('master/editProductbrand/'. $product_brand['id']); ?>"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('master/deleteProductbrand/'.$product_brand['id']); ?>"><i class=" feather icon-trash-2"></i>&nbsp;Delete </a>
                                    <?php
                                    }
                                    else
                                    {
                                        echo("-");
                                    }
                                    ?>
                                   
                                </td>
                            
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="2">No active ledger group masters found.</td>
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

