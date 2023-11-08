
<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>View Outwork Vendors</h4>
    <div class="card">
        <h6 class="card-header">View Outwork Vendors</h6>
        <div class="card-datatable table-responsive p-3">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Vendor Name / Company Name</th>
                        <th>Vendor Mobile Number</th>
                        <th>Vendor Address</th>
                        <th>Vendor E-Mail ID</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Options</th>
                        

                    </tr>
                </thead>
            
               
                <tbody>
                    
                    <?php if (!empty($outworks)) {
                        foreach ($outworks as $outwork) { ?>
                            <tr>
                                <td><?= $outwork['name'] ?></td>
                                
                                <td><?= $outwork['contact'] ?></td>
                                <td><?= $outwork['address'] ?></td>
                                <td><?= $outwork['email'] ?></td>
                                
                                <td><?= $outwork['created_name']?></td>
                                <td><?php
                                        if ($outwork['updated_name'] != NULL) {
                                            echo $outwork['updated_name'];
                                        } else {
                                            echo "-";
                                        }
                                        ?></td>
                                <td><?= $outwork['created_at']?></td>
                                <td><?= $outwork['updated_at']?></td>
                                <td>
                                    <?php 
                                    if($outwork['is_default'] == 0)
                                    { ?>
 <a  class="btn btn-info btn-sm" href="<?= base_url('master/editOutwork/'. $outwork['id']); ?>"><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                    <a class="btn btn-danger btn-sm" href="<?= base_url('master/deleteOutwork/'.$outwork['id']); ?>"><i class=" feather icon-trash-2"></i>&nbsp;Delete </a>
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
                            <td colspan="2">No active Outwork Vendors found.</td>
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

