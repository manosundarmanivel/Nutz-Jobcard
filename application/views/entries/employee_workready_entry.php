<div class="layout-content">
    <?php if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <span><?= $this->session->flashdata('message')[1] ?></span>
        </div>
    <?php   } ?>
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="alert alert-dark alert-dismissible fade show" id="serverResponseAlert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <span></span>
        </div>

        <div style="display: flex; justify-content:space-between; align-items: center; ">
            <h4 class="font-weight-bold  mt-2 mb-4">Employee Workready Entry</h4>

        </div>


        <div class="card mb-4">
            <h6 class="card-header">Employee Workready Entry</h6>
            <div class="card-body">
                <form id="jobform" method="post" enctype="multipart/form-data">
                    <div style="display: flex; flex-wrap: wrap;">
                    <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Jobcard Number:</label>
                            <select onchange="handleChange()" class=" form-control " data-allow-clear="true" style="width: 100%" id="job_card_number" >

                            </select>
                        </div>
                        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Customer Name / Company Name:</label>
                            <p id="customer_name"></p>

                        </div>



                        <div class="form-group col-6">
                            <label class="form-label" for="name">Contact Number :</label>
                            <p id="contact"></p>
                            




                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Warranty Status :</label>
                            <p id="warranty"></p>

                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="name">Remarks :</label>
                            <p id="remarks"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Jobcard Created By:</label>
                            <p id="created_by_name"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Product Given for Service:</label>
                            <p id="product_model_name"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Complaints Type:</label>
                            <p id="complaint_name"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Service Type:</label>
                            <p id="service_name"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Photos :</label>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Spares Used:</label>
                            <select class="select2-demo form-control" data-allow-clear="true" style="width: 100%" id="customer_groups" name="customer_group">
                                <option value="">Select Spares Used: </option>


                                <?php
                                foreach ($active_ledger_groups as $group) { ?>
                                    <option value="<?= $group['id'] ?>"><?= $group['type'] ?></option>

                                <?php

                                } ?>
                            </select>

                        </div>

                        <div class=" form-group col-6" style="display: flex; justify-content: space-between;">


                            <div class="form-group ">
                            <label class="form-label" for="name">Amount :</label>
                            </div>
                            <button class="btn btn-primary"> + </button>
                        </div>





                        <div class="form-group  col-6">
                            <label class="form-label" for="customer_contact">Labour Charge:</label>
                            <input type="text" class="form-control" id="customer_contact" name="labour_charge" placeholder="Enter Labour Charge">
                        </div>
                        <div class="form-group  col-6">
                            <label class="form-label" for="customer_contact">Outwork Charge:</label>
                            <input type="text" class="form-control" id="customer_contact" name="outwork_charge" placeholder="Enter Contact Number">
                        </div>
                        <div class="form-group  col-6">
                            <label class="form-label" for="customer_contact">Grand Total Charges:</label>
                            <p></p>
                        </div>

                    </div>


                    <button class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>



    </div>
</div>



<script type="text/javascript">
    $(document).ready(function() {
  console.log("mano");
        $('#job_card_number')
            .wrap('<div class="position-relative"></div>')
            .select2( 
                {
                
                ajax: {
                    url: '<?= base_url("entries/getJobCardProducts") ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // Search term
                            page: params.page,
                            user_id : 1, // Page number
                        };

                    },

                    processResults: function(data, params) {
                        console.log(data);
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 10) < data.total_count // Adjust the number of items to load
                            }
                        };
                    },
                    cache: true
                },
                // minimumInputLength: 2, // Minimum characters before search
                templateResult: function(item) {
                    if (item.loading) return 'Loading...';
                    return item.jobcardNo;
                },
                templateSelection: function(item) {
                    return item.jobcardNo;
                }
            });
    });

    function handleChange() {
        
        var product_id = $('#job_card_number').val();
        console.log(product_id);
        

        $.ajax({
            url: '<?= base_url('entries/getJobCardDetails') ?>',
            method: 'post',
            data: {
                product_id: product_id
            },
            dataType: 'json',
            success: function(response) {

                console.log(response);
                if (response) {
                    // Display the job card details
                    $('#created_by_name').text(response[0].created_by_name);

                    if (response[0].warrantyStatus === '1') {
                        $('#warranty').text('Yes');
                    } else {
                        $('#warranty').text('No');
                    }

                    $('#remarks').text(response[0].remarks);
                    $('#contact').text(response[0].contact);
                    $('#customer_name').text(response[0].customerName);

                    $('#product_model_name').text(response[0].model_name);
                    $('#service_name').text(response[0].service_name);
                    $('#job_id').val(response[0].jobID);
                    $('#jobcardNo').val(response[0].jobcardNo);

                    if (response[0].complaint_name !== null) {
                        $('#complaint_name').text(response[0].complaint_name);
                    } else {
                        $('#complaint_name').text(response[0].problem_stated);
                    }




                } else {
                    $('#result').text('Job Card Not Found');
                }
            }
        });
    };

</script>


<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>
