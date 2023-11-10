<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Ledger</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Ledger Master</li>
                <li class="breadcrumb-item ">Ledger</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <div class="card mb-4">
            <h6 class="card-header">Edit Ledger</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/editLedger/'.$ledger['id']) ?>">
                   
                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Customer Name / Company Name:</label>
                            <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= $ledger['name'] ?>" required placeholder="Enter Name">
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_contact">Customer Contact Number:</label>
                            <input type="text" class="form-control" id="customer_contact" name="customer_contact" value="<?= $ledger['contact_no'] ?>" placeholder="Enter Contact Number">
                        </div>
                    </div>

                    <div style="display: flex;">
                    <div class="form-group col-6">
                            <label class="form-label" for="customer_contact">Customer Group:</label>
                            <p> <?= $ledger['ledger_group_type'] ?></p>
                        </div>
                        <!-- <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Customer Group:</label>
                            <select class="select2-demo form-control" data-allow-clear="true" style="width: 100%" id="customer_group" name="customer_group">
                                <?php foreach ($active_ledger_groups as $group) { ?>
                                    <option value="<?= $group['id'] ?>" <?= ($group['id'] == $ledger['group_id']) ? 'selected' : '' ?>><?= $group['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div> -->

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_email">E-Mail ID:</label>
                            <input type="email" class="form-control" id="customer_email" name="customer_email" value="<?= $ledger['email_id'] ?>" placeholder="Enter Email">
                        </div>
                    </div>

                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_gst">GST No.:</label>
                            <input type="text" class="form-control" id="customer_gst" name="customer_gst" value="<?= $ledger['gst_no'] ?>" placeholder="Enter GST No.">
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_pan">PAN No.:</label>
                            <input type="text" class="form-control" id="customer_pan" name="customer_pan" value="<?= $ledger['pan_no'] ?>" placeholder="Enter PAN No.">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="entry_type">Entry Type:</label>
                        <select name="entry_type" class="form-control" data-allow-clear="true" style="width: 100%">
    <option value="">Select an option</option>
    <option value="Sales" <?= ($ledger['entry_type'] === 'Sales') ? 'selected' : '' ?>>Sales</option>
    <option value="Purchase" <?= ($ledger['entry_type'] === 'Purchase') ? 'selected' : '' ?>>Purchase</option>
    <option value="Both" <?= ($ledger['entry_type'] === 'Both') ? 'selected' : '' ?>>Both</option>
</select>

                    </div>

                    <div class="form-group">
                        <label class="form-label" for="price_list">Price List:</label>
                       
                        <select name="price_list" class="form-control" data-allow-clear="true" style="width: 100%">
    <option value="">Select a price list</option>
    <option value="Purchase Price" <?= ($ledger['price_list'] === 'Purchase Price') ? 'selected' : '' ?>>Purchase Price</option>
    <option value="DBP" <?= ($ledger['price_list'] === 'DBP') ? 'selected' : '' ?>>DBP</option>
    <option value="Wholesale Price" <?= ($ledger['price_list'] === 'Wholesale Price') ? 'selected' : '' ?>>Wholesale Price</option>
    <option value="MOP" <?= ($ledger['price_list'] === 'MOP') ? 'selected' : '' ?>>MOP</option>
</select>

                    </div>

                    <div class="form-group">
                        <label class="form-label" for="add_less_percentage">Add / Less %:</label>
                        <input type="text" class="form-control" id="add_less_percentage" name="add_less_percentage" value="<?= $ledger['discount'] ?>" placeholder="Enter Add / Less Percentage">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="customer_address">Address:</label>
                        <textarea class="form-control" id="customer_address" name="customer_address" rows="3" placeholder="Enter Address"><?= $ledger['address'] ?></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
