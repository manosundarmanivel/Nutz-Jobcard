
<h4 class="font-weight-bold  pt-8 m-4 mb-4">Products and Groups for Job ID: <?= $jobID ?></h4>
<?php foreach ($products as $product) { ?>
    
    <div class="card m-4">
    <h6 class="card-header">Product </h6>
        <div class="card-body">
       
            <form method="post" >
                <div style="display: flex; flex-wrap: wrap;">
                    <div class="form-group col-6">
                        <label class="form-label" for="name">Jobcard No:</label>
                        <p><?=  $product->jobcardNo ?></p>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="name">Product Given for Service</label>
                        <p><?=  $product->product_model_name ?></p>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="name">Compaints Type</label>
                        <p><?=  $product->complaint_name ?></p>
                    </div>
                    
                    <div class="form-group col-6">
                        <label class="form-label" for="name">Service Type</label>
                        <p><?=  $product->service_name ?></p>
                    </div>
                    <div class="form-group col-6">
                        <label class="form-label" for="name">Assigned to</label>
                        <p><?=  $product->assigned ?></p>
                       
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
                        <form method="post" >
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