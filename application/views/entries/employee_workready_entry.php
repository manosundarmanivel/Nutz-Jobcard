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
                            <select onchange="handleChange()" class=" form-control " data-allow-clear="true" style="width: 100%" id="job_card_number">

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
                        <div>
                        </div>
                    </div>

                    <div>
                        <div class="form-group  col-12">
                            <label class="form-label  my-2" for="customer_contact">Spares:</label>
                            <div id="dynamicSparesUsed">
                                <!-- This is where dynamically added Spares Used sections will appear -->
                            </div>
                            <button type="button" class="btn btn-primary m-2 " id="addSparesUsed">Add Spares</button>
                        </div>



                    </div>









                    <div style="display: flex; flex-wrap: wrap;">

                        <div class="form-group col-6">
                            <label class="form-label" for="labour_charge">Labour Charge:</label>
                            <input type="text" class="form-control" id="labour_charge" name="labour_charge" placeholder="Enter Labour Charge">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="outwork_charge">Outwork Charge:</label>
                            <input type="text" class="form-control" id="outwork_charge" name="outwork_charge" placeholder="Enter Outwork Charge">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="grand_total">Grand Total Charges:</label>
                            <p id="grand_total">0</p>
                        </div>

                    </div>
                    <button class="btn btn-primary">Submit</button>
            </div>




            </form>
        </div>
        <input type="hidden" id="totalAmount" />

    </div>
</div>



</div>
</div>

<script>
    let totalAmount = 0;
    document.addEventListener("DOMContentLoaded", function() {
        const dynamicSparesUsed = document.getElementById("dynamicSparesUsed");
        const addSparesUsedButton = document.getElementById("addSparesUsed");
        const totalAmountElement = document.getElementById("totalAmount");

        addSparesUsedButton.addEventListener("click", function() {

            const newSparesUsed = document.createElement("div");
            newSparesUsed.style.display = "flex";

            newSparesUsed.innerHTML = `
                <div class="form-group col-6">
                    <label class="form-label" for="name">Spares Used:</label>
                    <select class="select2-demo form-control" data-allow-clear="true" style="width: 100%" name="customer_group">
                        <option value="">Select Spares Used: </option>
                        <?php foreach ($spares as $spare) { ?>
                            <option value="<?= $spare['id'] ?>" data-amount="<?= $spare['mpo'] ?>"><?= $spare['name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group col-6" style="display: flex; justify-content: space-between;">
                    <div class="form-group">
                        <label class="form-label" for="name">Amount: </label>
                        <p>0</p>
                    </div>
                    <button class="btn btn-primary m-3 removeSparesUsed"> - </button>
                </div>
            `;


            dynamicSparesUsed.appendChild(newSparesUsed);


            updateTotalAmount();
            updateGrandTotal();
        });

        dynamicSparesUsed.addEventListener("change", function(event) {
            if (event.target.tagName === "SELECT") {
                const selectedOption = event.target.options[event.target.selectedIndex];
                const amount = parseFloat(selectedOption.getAttribute("data-amount")) || 0;
                const amountElement = event.target.parentElement.parentElement.querySelector("p");
                amountElement.textContent = amount;
                console.log(amountElement.textContent);

                updateTotalAmount();
                updateGrandTotal();
            }
        });

        dynamicSparesUsed.addEventListener("click", function(event) {
            if (event.target.classList.contains("removeSparesUsed")) {
                event.target.parentElement.parentElement.remove();


                updateTotalAmount();
                updateGrandTotal();
            }
        });

        function updateTotalAmount() {
            totalAmount = 0;
            const sparesUsedElements = dynamicSparesUsed.querySelectorAll("div.form-group.col-6 select");

            sparesUsedElements.forEach(function(spareUsedElement) {
                const selectedOption = spareUsedElement.options[spareUsedElement.selectedIndex];
                const amount = parseFloat(selectedOption.getAttribute("data-amount")) || 0;
                totalAmount += amount;
            });

            console.log(totalAmount);

            totalAmountElement.textContent = totalAmount;
        }
    });

    const labourChargeInput = document.getElementById("labour_charge");
    const outworkChargeInput = document.getElementById("outwork_charge");
    const grandTotalElement = document.getElementById("grand_total");

    labourChargeInput.addEventListener("input", updateGrandTotal);
    outworkChargeInput.addEventListener("input", updateGrandTotal);

    function updateGrandTotal() {
        const labourCharge = parseFloat(labourChargeInput.value) || 0;
        const outworkCharge = parseFloat(outworkChargeInput.value) || 0;
        const total = labourCharge + outworkCharge + totalAmount;
        grandTotalElement.textContent = total;
    }

    updateGrandTotal();
</script>







<script type="text/javascript">
    var user_id = <?php echo json_encode($this->session->userdata('user')->id); ?>;
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
                            page: params.page,
                            user_id: 8, // Page number
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

<script>


</script>




<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>