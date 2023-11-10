<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y"> 
        <h4 class="font-weight-bold py-3 mb-0">View Service</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Service</li>
                <li class="breadcrumb-item active">view</li>
            </ol>
        </div>
        <?php foreach ($products as $product) { ?> 
            <div class="card m-4">
                <h6 class="card-header">Product </h6>
                <div class="card-body"> 
                    <form method="post">
                        <div style="display: flex; flex-wrap: wrap;">
                            <div class="form-group col-6">
                                <label class="form-label" for="name">Jobcard No:</label>
                                <p><?= $product->jobcardNo ?></p>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label" for="name">Product Given for Service</label>
                                <p><?= $product->product_model_name ?></p>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label" for="name">Compaints Type</label>
                                <p><?= $product->complaint_name ?></p>
                            </div>

                            <div class="form-group col-6">
                                <label class="form-label" for="name">Service Type</label>
                                <p><?= $product->service_name ?></p>
                            </div>
                            <div class="form-group col-6">
                                <label class="form-label" for="name">Assigned to</label>
                                <p><?= $product->assigned ?></p> 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <ul>
                <?php foreach ($groups as $group) { ?>
                    <?php if ($group->parent_id == $product->id) { ?>
                        <div class="card m-4">
                            <h6 class="card-header">Group</h6>
                            <div class="card-body">
                                <form method="post">
                                    <div style="display: flex; flex-wrap: wrap;"> 
                                        <div class="form-group col-6">
                                            <label class="form-label" for="name">Jobcard No :</label>
                                            <p> <?= $group->jobcardNo ?></p>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="name">Product Given for Service :</label>
                                            <p> <?= $group->product_model_name ?></p>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="name">Problem Stated :</label>
                                            <p> <?= $group->problem_stated ?></p>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="name">Service Type :</label>
                                            <p> <?= $group->service_name ?></p>
                                        </div>
                                        <div class="form-group col-6">
                                            <label class="form-label" for="name">Assigned to :</label>
                                            <p> <?= $group->assigned ?></p>
                                        </div> 
                                    </div> 
                                </form>
                            </div>
                        </div> 
                    <?php } ?>
                <?php } ?>
            </ul>
        <?php } ?>
    </div>
</div>