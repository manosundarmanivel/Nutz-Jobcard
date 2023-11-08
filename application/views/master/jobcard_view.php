
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>View Job Cards</h4>
    <div class="card">
        <h6 class="card-header">View Job Cards</h6>
        <div class="card-datatable table-responsive p-3">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Form No. / Service No.</th>
                        <th>Customer / Company Name</th>
                        <th>Contact Number</th>
                        <th>Warranty Status</th>
                        <th>Bill No. (if Warranty available)</th>
                        <th>Remarks</th>
                        <th>Jobcard Created By</th>
                      
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Options</th>
                        

                    </tr>
                </thead>
            
               
                <tbody>
                    
                    <?php if (!empty($jobs)) {
                        foreach ($jobs as $job) { ?>
                            <tr>
                                <td><?= $job['formno'] ?></td>
                                
                                <td><?= $job['customerName'] ?></td>
                                <td><?= $job['contact'] ?></td>
                                <td><?= ($job['warrantyStatus'] == 1) ? 'Yes' : 'No' ?> </td>
                                <td><?= $job['billNo'] ?></td>
                                <td><?= $job['remarks'] ?></td>
                                
                                <td><?= $job['created_name']?></td>
                                
                                <td><?= $job['created_at']?></td>
                                <td><?= $job['updated_at']?></td>
                                <td>
                                <a class="btn btn-success btn-sm" href="<?= base_url('master/fetchProductsAndGroups/'.$job['id']); ?>"><i class=" feather icon-navigation"></i>&nbsp;View </a>
                                   
                                    <a class="btn btn-dark btn-sm" href="<?= base_url('master/editJobcard/'.$job['id']); ?>"><i class=" feather icon-edit"></i>&nbsp;Edit </a>
                                    
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('master/deleteJobcard/'.$job['id']); ?>"><i class=" feather icon-trash-2"></i>&nbsp;Delete </a>
                                    
                                   
                                   
                                </td>
                            
                            </tr>
                        <?php }
                    } else { ?>
                        <tr>
                            <td colspan="2">No active job Vendors found.</td>
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

