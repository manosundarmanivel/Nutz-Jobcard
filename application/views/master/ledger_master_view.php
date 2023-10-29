<!DOCTYPE html>
<html>

<head>
    <title>Active Ledger Masters</title>
    <!-- Include necessary CSS and JavaScript libraries here -->
</head>

<body>
    <div class="card">
        <h6 class="card-header">View Ledgers</h6>
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
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
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>
