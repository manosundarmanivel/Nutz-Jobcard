<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">
 
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Add Category</h4>
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
                        <form action="<?= base_url('admin/addCategory') ?>" method="post">
                            <div class="card-body">
                                <!-- <h4 class="card-title">Add User</h4> -->
                                <div class="mb-3  row">
                                    <div class="col-lg-6 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Category</label>
                                        <div class="col-md-12 col-xl-10">
                                            <input class="form-control" type="text" name="category" placeholder="Enter Category" required>
                                        </div>
                                    </div> 
                                </div>   
                                <div class="mb-3  row">
                                    <div class="col-lg-12 col-md-12">
                                        <label for="example-text-input" class="col-md-3 col-xl-3 col-form-label">Add Items</label>
                                        <div class="col-md-12 col-xl-10">
                                             <textarea class="form-control" id="items" name="items" placeholder="Add Items" required></textarea>
                                        </div>
                                    </div> 
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
            
        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">View Category</h4>
                    </div>
                </div>
            <div class="card">
                <?php if ($categories) { ?>
                <div class="ast_faq_section">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <?php $no = 1;
                            foreach ($categories as $category) : ?>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="panelsStayOpen-heading<?= $no ?>">
                                        <button class="accordion-button collapsed" onclick="Handleclick(this)" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?= $no ?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?= $no ?>">
                                            <div> 
                                                    <div style="margin-left: 10px;" class="mt-3">
                                                        <p><?= ucfirst($category->name )?></p> 
                                                    </div>
                                                </div>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="panelsStayOpen-collapse<?= $no ?>" class="accordion-collapse collapse  " aria-labelledby="panelsStayOpen-heading<?= $no ?>">
                                        <div class="accordion-body">
                                            <div class="row"> 
                                                <?php if(isset($category->items)){
                                                    $items=json_decode($category->items);
                                                    foreach($items as $item){ ?>
                                                    <div class="container-fluid"> 
                                                        <ul >
                                                            <li><?=$item?></li>
                                                        </ul>
                                                    </div>
                                                <?php
                                                    }
                                                } ?>
                                            </div>
                                            <div class="row">
                                                <div class="col-6" style="margin-left: 15px;">
                                                    <a href="<?= base_url("admin/deleteCategory/$category->id") ?>" class="badge bg-danger p-2 align-bottom">Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php $no++;
                            endforeach; ?>
                        </div>
                    </div>
                <?php } else if (!$handwrittenpaid && !$orders) { ?>
                    <h2 class="text-center ast_toppadder70 ast_bottompadder70">No Category Found</h2>
                <?php } ?> 
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
 
    <script src="<?= base_url('assets') ?>/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
 
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/jszip/jszip.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/pdfmake/build/vfs_fonts.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-buttons/js/buttons.colVis.min.js"></script>
 
    <script src="<?= base_url('assets') ?>/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('assets') ?>/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>
 
    <script src="<?= base_url('assets') ?>/js/pages/datatables.init.js"></script>

    <script src="<?= base_url('assets') ?>/js/app.js"></script>
    </body>


    </html>