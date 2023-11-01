<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php } ?>
        <h4 class="font-weight-bold mt-2 mb-4"><i class="feather icon-home"></i>Edit Ledger Group</h4>
        <div class="card mb-4">
            <h6 class="card-header">Edit Ledger Group</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/editLedgerGroup/'.$ledgerGroup['id']) ?>">
                   
                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Name</label>
                            <input type="text" class="form-control" id="customer_name" name="name" value="<?= $ledgerGroup['name'] ?>" required placeholder="Enter Name">
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_contact">Type</label>
                           <p><?= $ledgerGroup['type'] ?></p>
                        </div>
                    </div>

                   

                   

                  

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
