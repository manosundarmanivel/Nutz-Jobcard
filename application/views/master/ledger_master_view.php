<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
    <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>View Ledger</h4>
        <div class="card">
            <h6 class="card-header">View Ledgers</h6>
            <div class="card-datatable table-responsive">
                <table class="datatables-demo table table-striped table-bordered" id="datatable">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Email ID</th>
                            <th>GST No.</th>
                            <th>PAN No.</th>
                            <th>Entry Type</th>
                            <th>Price List</th>
                            <th>Discount</th>
                            <th>Created By</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ledger_masters as $key => $ledger) : ?>
                            <tr>
                                <td><?php echo $ledger['id']; ?></td>
                                <td><?php echo $ledger['name']; ?></td>
                                <td><?php echo $ledger['contact_no']; ?></td>
                                <td><?php echo $ledger['address']; ?></td>
                                <td><?php echo $ledger['email_id']; ?></td>
                                <td><?php echo $ledger['gst_no']; ?></td>
                                <td><?php echo $ledger['pan_no']; ?></td>
                                <td><?php echo $ledger['entry_type']; ?></td>
                                <td><?php echo $ledger['price_list']; ?></td>
                                <td><?php echo $ledger['discount']; ?></td>
                                <td><?php echo $full_names[$key]; ?></td>
                                <td>
                                    <a  class="btn btn-info btn-sm" href="<?= base_url('master/editLedger/'. $ledger['id']);?>" ><i class="feather icon-edit"></i>&nbsp;Edit </a>
                                    <a class="btn btn-danger btn-sm" ><i class=" feather icon-trash-2"></i>&nbsp;Delete </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/libs/datatables/datatables.js"></script>

<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datatable').dataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        })
    })
</script>