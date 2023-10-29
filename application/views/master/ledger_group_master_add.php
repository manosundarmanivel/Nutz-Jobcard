<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Add Ledger Group</title>
    

<body>

<div class="card mb-4">
    <h6 class="card-header">Add Ledger Group</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('dashboard/addledgergroup') ?>">
            <div class="form-group">
                <label class="form-label" for="name">Name:</label>
                <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Name">
            </div>

            <div class="form-group">
                <label class="form-label" for="type">Type:</label>
                <input type="text" class="form-control" name="type" id="type" placeholder="Enter Type">
            </div>

            <button type="submit" class="btn btn-primary">Add Ledger Group</button>
        </form>
    </div>
</div>

</body>
</html>
