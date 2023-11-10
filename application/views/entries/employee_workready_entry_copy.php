<style>
    .ui-feed-icon-container {
        width: 200px;
        height: 200px;
        overflow: hidden;
    }

    .ticket-file-img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    .img-fluid.ticket-file-img[src=""] {
        display: none;
    }
</style>

<div class="layout-content"> 
    <div class="container-fluid flex-grow-1 container-p-y"> 
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
        <h4 class="font-weight-bold py-3 mb-0">Workready Entry</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Workready Entry</li> 
            </ol>
        </div> 
        <div class="card mb-4">
            <h6 class="card-header">Workready Entry</h6>
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
                        <label class="form-label" for="name">Photos :</label>
                        <div class="form-group col-6">
                            <div style="display: flex;  " class="image-container ">
                            </div>
                        </div>
                        <div>
                        </div>
                    </div>

                    <div>
                        <div class="form-group  col-12">
                            <label class="form-label  my-2" for="customer_contact">Spares:</label>
                            <div id="dynamicSparesUsed">
                            </div>
                            <button type="button" class="btn btn-primary m-2 " id="addSparesUsed">Add Spares</button>
                        </div>
                    </div>
                    <div style="display: flex; flex-wrap: wrap;">

                        <div class="form-group col-6">
                            <label class="form-label" for="labour_charge">Labour Charge:</label>
                            <input type="text" class="form-control" id="labour_charges" name="labour_charges" placeholder="Enter Labour Charge">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="outwork_charge">Outwork Charge:</label>
                            <input type="text" class="form-control" id="outwork_charges" name="outwork_charges" placeholder="Enter Outwork Charge">
                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="grand_total">Grand Total Charges:</label>
                            <p id="grand_total">0</p>
                        </div>
                    </div>
                    <button onclick="handlesubmit()" class="btn btn-primary">Submit</button>
            </div>
            <input type="hidden" name="product_id" id="product_id" />
            <input type="hidden" name="job_id" id="job_id" />
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
            newSparesUsed.classList.add("spares_used_row");
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
                    <button class="btn btn-danger m-4 removeSparesUsed">Remove</button>
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
            totalAmountElement.textContent = totalAmount;
        }
    });


    function handlesubmit() {
        const sparesList = [];
        const sparesUsedRows = document.querySelectorAll(".spares_used_row");
        const job_id = document.querySelector('[name="job_id"]').value;
        const product_id = document.querySelector('[name="product_id"]').value;
        const laborCharges = document.querySelector('[name="labour_charges"]').value;
        const outworkCharges = document.querySelector('[name="outwork_charges"]').value;
        const Data = {
            job_id: job_id,
            product_id: product_id,
            laborCharges: laborCharges,
            outworkCharges: outworkCharges,
            totalCharges: totalAmount,
            spare: sparesList
        }
        sparesUsedRows.forEach((spareRow, index) => {
            const spareSelect = spareRow.querySelector("select");
            const selectedOption = spareSelect.options[spareSelect.selectedIndex];
            const name = selectedOption.textContent;
            const amount = selectedOption.getAttribute("data-amount");
            const spareData = {
                name: name,
                amount: amount,
            };
            sparesList.push(spareData);
        });

        const sparesJSON = JSON.stringify(Data);
        console.log(sparesJSON);

        $.ajax({
            url: '<?= base_url('entries/saveSpares') ?>',
            method: 'post',
            data: {
                sparesJSON: sparesJSON
            },

            dataType: 'json',
            success: function(response) {
                console.log(response, 'response');
                if (response.success) {
                    console.log("success");
                } else {
                    console.log("not success");
                }
            }
        });

    }

    const labourChargeInput = document.getElementById("labour_charges");
    const outworkChargeInput = document.getElementById("outwork_charges");
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
                            user_id: user_id, // Page number
                        }; 
                    }, 
                    processResults: function(data, params) {
                        console.log(data);
                        params.page = params.page || 1;

                        return {
                            results: data.items,
                            pagination: {
                                more: (params.page * 10) < data.total_count
                            }
                        };
                    },
                    cache: true
                },
                // minimumInputLength: 2, 
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
                    $('#product_id').val(response[0].id); 
                    var jsonString = response[0].image_url; 
                    function parseImageUrls(input) {
                        try {
                            const imageList = JSON.parse(input); 
                            if (Array.isArray(imageList)) {
                                return imageList;
                            }
                        } catch (error) { 
                            return [input];
                        }
                    } 
                    var imageUrls = parseImageUrls(jsonString);
                    var container = $('.image-container '); 
                    container.empty(); 
                    imageUrls.forEach(function(imageUrl) {
                        var imgElement = $('<img>')
                            .attr('src', '<?= base_url('assets/uploads/') ?>' + imageUrl)
                            .attr('alt', 'Photos')
                            .addClass('img-fluid ticket-file-img')
                            .css({
                                'width': '200px',
                                'height': '150px',
                                'object-fit': 'cover',
                            });
                        container.append(imgElement);
                        console.log(imgElement);
                    }); 
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
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>