<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-0">Outwork Vendor</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Outwork Master</li>
                <li class="breadcrumb-item">Outwork Vendor</li>
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
            <h6 class="card-header">Outwork Vendors Edit</h6>

            <div class="card-body">

                <form method="post" action="<?= base_url('master/editOutwork/' . $outworks['id']) ?>">

                    <div style="display: flex; flex-wrap: wrap;">

                        <div class="form-group col-6 ">
                            <label class="form-label" for="customer_name">Vendor Name / Company Name: </label>
                            <input value="<?= $outworks['name'] ?>" type="text" class="form-control" id="name" name="name" required placeholder="Enter Name">

                        </div>


                        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Vendor Mobile Number:</label>
                            <input value="<?= $outworks['contact'] ?>" type="text" class="form-control" name="contact" id="name" required>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Vendor Address:</label>
                            <textarea type="text" class="form-control" name="address" id="name" required><?= $outworks['address'] ?> </textarea>
                        </div>
                        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Vendor E-Mail ID::</label>
                            <input value="<?= $outworks['email'] ?>" type="text" class="form-control" name="email" id="name" required>
                        </div>






                        <button type="submit" class="btn btn-primary ">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>