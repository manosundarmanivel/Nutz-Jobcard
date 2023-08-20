<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Remedy</h4>
                    </div>
                </div>
                <?php if ($this->session->flashdata('message')) { ?>
                    <div class="alert alert-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" role="alert">
                        <?= $this->session->flashdata('message')[1] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php   } ?>
            </div> 
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <form action="<?= base_url('admin/addRemedy') ?>" method="post">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add Remedy</h4> -->
                                <div class="mb-3  row">
                                    <div class="mb-3  row">  
                                        <label for="example-text-input" style="font-size: medium;" class="col-md-3 col-xl-3 col-form-label">Customer</label>
                                        <div class="col-md-12 col-xl-10">
                                            <?php if($customers)
                                                foreach($customers as $customer): ?>
                                            <select class="form-control" name="customer_id" id="customer_id">
                                                <option value="">Select Customer</option>
                                                <option value="<?= $customer->id ?>"> <?php echo CUSTOMER_ID;echo "00$customer->id" ." "."- " .ucwords($customer->first_name) ;if($customer->last_name){echo ucwords($customer->last_name);}; ?></option>
                                            </select>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>   
                                    <?php
                                      if($categories)
                                      foreach($categories as $category){ ?>
                                          <div class="mb-3  row">  
                                              <label for="example-text-input" style="font-size: medium;" class="col-md-3 col-xl-3 col-form-label"><?=ucfirst($category->name) ?></label>
                                              <?php if($category->items){
                                                  $items=json_decode($category->items);
                                                  foreach($items as $item){ ?>
                                                    <div class="col-md-12 col-xl-12">
                                                        <input type="checkbox" class="form-check-success" id="<?=$item?>" name="category_items[<?=$category->id?>][]" value="<?=$item?>">
                                                        <label for="<?=$item?>"><?= ucwords($item)?></label>
                                                    </div> 
                                                  <?php  }
                                                }  ?>
                                          </div>  
                                     <?php }
                                    ?>
                                </div>     
                                <div class="mb-3 row">
                                    <div class="col-12 col-xl-7 d-flex ">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="rightbar-overlay"></div>
 
    <script src="<?= base_url('assets') ?>/libs/jquery/jquery.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/metismenu/metisMenu.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/simplebar/simplebar.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/node-waves/waves.min.js"></script> 

    <script src="<?= base_url('assets') ?>/js/app.js"></script>
    </body>


    </html>