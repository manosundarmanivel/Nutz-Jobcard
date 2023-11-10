<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Service Type</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?=base_url('')?>"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Outwork Master</li>
                <li class="breadcrumb-item">Service Type</li>
                <li class="breadcrumb-item active">Add</li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <div class="card mb-4">
            <h6 class="card-header">Service Type Add</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/addServicetype') ?>">
                    <div class="form-group">
                        <label class="form-label" for="name">Service Type:</label>
                        <input type="text" class="form-control" name="name" id="name" required placeholder="Enter Service Type">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="name">Description:</label>
                        <input type="text" class="form-control" name="description" id="name" required placeholder="Enter Service Type">
                    </div>

                    <button type="submit" class="btn btn-primary">Add Service Type</button>
                </form>
            </div>
        </div>
    </div>
</div>