<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Service Type</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= base_url('') ?>"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Outwork Master</li>
                <li class="breadcrumb-item">Service Type</li>
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
            <h6 class="card-header">Service Type Edit</h6>
            <div class="card-body">
                <form method="post" action="<?= base_url('master/editServicetype/' . $service_type['id']) ?>"> 
                    <div class="form-group col-12">
                        <label class="form-label" for="customer_name">Service Type: </label>
                        <input value="<?= $service_type['name'] ?>" type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">
                    </div>
                    <div class="form-group col-12">
                        <label class="form-label" for="customer_name">Description: </label>
                        <input value="<?= $service_type['description'] ?>" type="text" class="form-control" id="name" name="description" required placeholder="Enter Description">
                    </div> 
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>