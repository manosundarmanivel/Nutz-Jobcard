<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>View Active Ledger Group Masters</title>
</head>

<body>

    <div class="card">
        <h6 class="card-header">View Ledger Groups</h6>
        <div class="card-datatable table-responsive">
            <table class="datatables-demo table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Type</th>
                        <th>Created By</th>
                        <th>Updated By</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        

                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($ledger_group_masters)) {
                        foreach ($ledger_group_masters as $ledger_group) { ?>
                            <tr>
                                <td><?= $ledger_group->name ?></td>
                                <td><?= $ledger_group->type ?></td>
                                <td><?= $ledger_group->created_by?></td>
                                <td><?= $ledger_group->updated_by?></td>
                                <td><?= $ledger_group->created_at?></td>
                                <td><?= $ledger_group->updated_at?></td>
                            
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

</body>

</html>
