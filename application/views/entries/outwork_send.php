<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y"> 
        <h4 class="font-weight-bold py-3 mb-0">Outwork Send</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Outwork Master</li>
                <li class="breadcrumb-item ">Outworks</li>
                <li class="breadcrumb-item active">send</li>
            </ol>
        </div>
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <div class="card mb-4">
            <h6 class="card-header">Outwork Send</h6> 
            <div class="card-body">
                <form method="post" action="<?= base_url('entries/sendOutwork') ?>">
                    <input type="hidden" name="job_id" id="job_id" />
                    <input type="hidden" name="jobcardNo" id="jobcardNo" />
                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Jobcard Number:</label>
                            <select onchange="handleChange()" class=" form-control " data-allow-clear="true" style="width: 100%" id="job_card_number" >

                            </select>
                        </div>

                    </div>
                    <div style="display: flex;">

                        <div class="form-group col-6">
                            <label class="form-label" for="customer_name">Customer Name / Company Name:</label>
                            <p id="customer_name"></p>

                        </div>

                        <div class="form-group  col-6">
                            <label class="form-label" for="customer_contact">Customer Contact Number:</label>
                            <p id="contact"></p>
                        </div>
                    </div>







                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_gst">Remarks: </label>
                            <p id="remarks"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_email">Warranty Status: </label>
                            <p id="warranty"></p>
                        </div>

                    </div>
                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_pan">Jobcard Created By :</label>
                            <p id="assigned"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_email">Product Given for Service </label>
                            <p id="product_model_name"></p>
                        </div>

                    </div>
                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_pan">Complaints Type :</label>
                            <p id="complaint_name"></p>
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_email">Service Type : </label>
                            <p id="service_name"></p>
                        </div>


                    </div>
                    <div style="display: flex;">
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_email">Photos : </label>

                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="customer_group">Outwork Vendor</label>
                            <select class="select2-demo form-control " data-allow-clear="true" style="width: 100%" id="outwork_vendor_id" name="outwork_vendor_id">
                                <option value="">Select Outwork Vendor</option>

                                <?php foreach ($outwork_vendors as $outwork_vendor) { ?>
                                    <option value="<?= $outwork_vendor['id'] ?>"><?= $outwork_vendor['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>


                    </div>
                    <div style="display: flex;">



                    </div>

                    <button type="submit" class="btn btn-primary">Send</button>
            </div>








            </form>
        </div>
    </div>
</div>
</div>
</div>



<script type="text/javascript">
    $(document).ready(function() {

        $('#job_card_number')
            .wrap('<div class="position-relative"></div>')
            .select2({
                ajax: {
                    url: '<?= base_url("entries/getJobCardProducts") ?>',
                    dataType: 'json',
                    delay: 250,
                    data: function(params) {
                        return {
                            q: params.term, // Search term
                            page: params.page // Page number
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
        console.log("yess");
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
                    $('#assigned').text(response[0].assigned_name);

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
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script>