
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
            <h4 class="font-weight-bold  mt-2 mb-4">Add JobCard</h4>
            <button type="button" onclick="addproduct()" class="btn btn-primary m-5">Add Product</button>
        </div>


        <div class="card mb-4">
            <h6 class="card-header">Add JobCard</h6>
            <div class="card-body">
                <form id="jobform" method="post" enctype="multipart/form-data" action="<?= base_url('master/addJobCard') ?>">
                    <div style="display: flex; flex-wrap: wrap;">
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Form No. / Service No :</label>
                            <input type="text" disabled class="form-control" value="<?= $service_no ?>" required placeholder="Enter Service No">
                        </div>
                        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Contact Number:</label>
                            <div style="display: flex;">
                                <input type="text" class="form-control" id="contact_number" name="contact" placeholder="Enter Contact Number">
                                <button class="btn btn-facebook" type="button" id="lookup_btn">Lookup</button>
                            </div>


                        </div>



                        <div class="form-group col-6">
                            <label class="form-label" for="name">Customer / Company Name</label>
                            <div style="display: flex; align-items: center; ">
                                <p id="result"></p>
                                <button type="button" class="btn btn-outline-danger  p-2 m-2" id="addButton" style="display: none; "><a href="<?= base_url('master/ledger_master_add') ?>">Add Ledger</a> </button>
                            </div>



                        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Warranty Status :</label>
                            <label class="switcher">
                                <input type="checkbox" id="toggleButton" onclick="toggleWarranty()" class="switcher-input">
                                <span class="switcher-indicator">
                                    <span class="switcher-yes"></span>
                                    <span class="switcher-no"></span>
                                </span>

                            </label>

                        </div>

                        <div id="warrantyStatus" style="display: none;" class="form-group col-6 ">
                            <label class="form-label">Bill No :</label>
                            <input class="form-control" type="text" id="billDetailsInput" name="billDetailsInput">
                        </div>

                        <div class="form-group col-6">
                            <label class="form-label" for="name">Remarks :</label>
                            <textarea type="text" class="form-control" name="remarks" id="name" required placeholder="Enter Remarks"> </textarea>
                        </div>
                        <input type="hidden" name="data" id="jobdata"  />
                       

                    </div>



                </form>
            </div>
        </div>

        <div class="card mb-4">

            <form action=""  id="my_form">


                <!-- <button class="btn btn-primary" type="button" onclick="handlesubmit()">submit</button> -->
            </form>
        </div>
        <button type="submit" onclick="handlesubmit()" class="btn btn-primary">Add JobCard</button>
    </div>
</div>


<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    
const Toast = Swal.mixin({
        toast: true,
        position: 'bottom-end',
        showConfirmButton: false,
        timer: 10000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }   
    })
    $(document).ready(function() {
        var table = $('#example').DataTable({
            buttons: ["copy", "excel", "pdf", "csv"],
        })

        table.buttons().container()
            .appendTo($('.col-sm-6:eq(0)', table.table().container()));
    });
</script>


<script>
    let warrantyAvailable = false;

    function toggleWarranty() {
        warrantyAvailable = !warrantyAvailable;
        const toggleButton = document.getElementById('toggleButton');



        const warrantyStatus = document.getElementById('warrantyStatus');
        warrantyStatus.style.display = warrantyAvailable ? 'block' : 'none';
    }

    function checkWarranty() {
        const warrantyInput = document.getElementById('warrantyInput').value.toLowerCase();
        const billDetailsDiv = document.getElementById('billDetailsDiv');

        if (warrantyInput === 'yes') {
            billDetailsDiv.style.display = 'block';
            const billDetails = document.getElementById('billDetailsInput').value;
            console.log('Warranty is available, and bill details are: ' + billDetails);
        } else if (warrantyInput === 'no') {
            console.log('Warranty is not available.');
        } else {
            alert('Please enter a valid option (Yes/No).');
        }
    }





    const form = document.getElementById("my_form");
    let productcount = 1;
    let productsData = [];

    function addproduct() {
        const product = {
            jobcardNo: '',
            products: '',
            complaint: '',
            service: '',
            assigned: '',
            group: [],
        };
        const inputRow = document.createElement("div");
        inputRow.classList.add("product_row");
        inputRow.setAttribute("id", `product_row_${productcount}`);
        inputRow.innerHTML = `
        <h6 class="card-header">Add Product</h6>
        <div class="card-body">
        <div style="display: flex; flex-wrap: wrap;">
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Jobcard No:</label>
                            <input type="text" class="form-control" name="jobno_${productcount}"  required placeholder="Enter JobCard Number">
                        </div>
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Product Given for Service</label>
                            <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_${productcount}" ">
                 <option value="">Select Product Model</option>
                    <?php foreach ($product_models as $product) { ?>
                        <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                    <?php } ?>
                </select>
                           
                        </div>
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Compaints Type </label>
                            <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="complaint_${productcount}">
                 <option value="">Select Compaints Type</option>
                    <?php foreach ($product_model_complaints as $complaint) { ?>
                        <option value="<?= $complaint['id'] ?>"><?= $complaint['name'] ?></option>
                    <?php } ?>
                </select>
                        </div>
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Service Type </label>
                            <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="service_${productcount}">
                 <option value="">Select Service Type</option>
                    <?php foreach ($service_types as $service) { ?>
                        <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                    <?php } ?>
                </select>
                            
                        </div>
                       
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Assigned to </label>
                            
                            <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="employee_${productcount}">
                 <option value="">Select Service Type</option>
                    <?php foreach ($technitions as $technition) { ?>
                        <option value="<?= $technition['id'] ?>"><?= $technition['name'] ?></option>
                    <?php } ?>
                </select>
                           
                        </div>
                        <div class="form-group col-6">
                            <input type="file" name="img_${productcount}[]" multiple required>
                         
                        </div>

            </div>
            <button type="button" class="btn btn-primary" class="add_group" onclick="addgroup(${productcount})">add group</button>
            </div>
            `;
        form.appendChild(inputRow)
        productcount++;
        productsData.push(product);
    }

    function addgroup(id) {
        const group = {
            jobcardNo: '',
            products: '',
            problem: '',
            service: '',
            assigned: '',
        };
        let groupcount = productsData[id - 1].group.length + 1;
        const inputRow = document.createElement("div");
        inputRow.classList.add(`group_row_${id}`);
        inputRow.innerHTML =
            `
        <h6 class="card-header">Add Group</h6>
        <div class="card-body">
        
        <div style="display: flex; flex-wrap: wrap;">
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Jobcard No:</label>
                            <input type="text" class="form-control" name="jobno_${groupcount}_${id}"  required placeholder="Enter JobCard Number">
                        </div>
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Product Given for Service</label>
                            <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_${groupcount}_${id}" ">
                 <option value="">Select Compaints Type</option>
                    <?php foreach ($product_models as $product) { ?>
                        <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                    <?php } ?>
                </select>
                        </div>
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Problem Stated </label>
                            <input type="text" class="form-control" name="problem_${groupcount}_${id}"  required ">
                        </div>
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Service Type </label>
                            <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="service_${groupcount}_${id}">
                 <option value="">Select Service Type</option>
                    <?php foreach ($service_types as $service) { ?>
                        <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                    <?php } ?>
                </select>
                        </div>
                       
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Assigned to </label>
                            <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="employee_${groupcount}_${id}">
                 <option value="">Select Service Type</option>
                    <?php foreach ($technitions as $technition) { ?>
                        <option value="<?= $technition['id'] ?>"><?= $technition['name'] ?></option>
                    <?php } ?>
                </select>
                        </div>
                        <div class="form-group col-6">
                            <input type="file" name="img[]" multiple required>
                         
                        </div>

            </div>
            <button type="button" class="btn btn-primary" class="add_group" onclick="addgroup(${productcount})">add group</button>
            </div>
            `


        document.getElementById(`product_row_${id}`).appendChild(inputRow);
        productsData[id - 1].group.push(group);
    }

    function handlesubmit() {

        const jobData = {
        jobcardNo: '',
        contact: '',
        customerName: '',
        warrantyStatus: false,
        billNo: '',
        remarks: '',
       
        
    };

    const resultElement = document.getElementById("result");
    var formData = new FormData();
    
    const resultValue = resultElement.textContent;

    jobData.formno = <?= $service_no ;?>;
    jobData.contact = document.querySelector(`[name="contact"]`).value;
    jobData.customerName = resultValue;
    jobData.warrantyStatus = document.getElementById('toggleButton').checked;
    jobData.billNo = document.querySelector(`[name="billDetailsInput"]`).value;
    jobData.remarks = document.querySelector(`[name="remarks"]`).value;


        productsData.forEach((product, index) => {
            product.jobcardNo = document.querySelector(`[name="jobno_${index + 1}"]`).value;
            product.products = document.querySelector(`[name="product_${index + 1}"]`).value;
            product.complaint = document.querySelector(`[name="complaint_${index + 1}"]`).value;
            product.service = document.querySelector(`[name="service_${index + 1}"]`).value;
            product.assigned = document.querySelector(`[name="employee_${index + 1}"]`).value; // Corrected field name
            // images = document.querySelector(`[name="img_${index + 1}[]"]`); 
            product.images = new FormData();
  let  productImageInput = document.querySelector(`[name="img_${index + 1}[]"]`);
  console.log(productImageInput);
  for (let i = 0; i < productImageInput.files.length; i++) {
    product.images.append(`product_image_${i}`, productImageInput.files[i]);
    console.log(productImageInput.files[i],"test");
  }


           

            product.group.forEach((group, groupIndex) => {
                group.jobcardNo = document.querySelector(`[name="jobno_${groupIndex + 1}_${index + 1}"]`).value;
                group.products = document.querySelector(`[name="product_${groupIndex + 1}_${index + 1}"]`).value;
                group.problem = document.querySelector(`[name="problem_${groupIndex + 1}_${index + 1}"]`).value;
                group.service = document.querySelector(`[name="service_${groupIndex + 1}_${index + 1}"]`).value;
                group.assigned = document.querySelector(`[name="employee_${groupIndex + 1}_${index + 1}"]`).value; // Corrected field name
            });
        });
        console.log(productsData,"text");
        // console.log(jobData);
      


        const requestData = {
        jobData: jobData,
        productsData: productsData,
    };

document.getElementById("jobdata").value = JSON.stringify(requestData);
document.getElementById("jobform").submit();
    //     fetch('addJobCard', {
    //     method: 'POST',
    //     headers: {
    //         'Content-Type': 'application/json',
    //     },
    //     body: JSON.stringify(requestData),
    // })
    // .then(response => response.json())
    // .then(data => {
    //     console.log(data);
    //     console.log("got response");
    // window.reload();
    // })
    // .catch(error => {
    //     console.error('Error:', error);
    // });

    }
</script>


<script type="text/javascript">
    $(document).ready(function() {
        $('#lookup_btn').click(function() {
            var contactNumber = $('#contact_number').val();

            $.ajax({
                url: '<?= base_url('master/getLedgerName') ?>',
                method: 'post',
                data: {
                    contact: contactNumber
                },
                dataType: 'json',
                success: function(response) {
                    if (response.ledgerName) {
                        $('#result').text(response.ledgerName);
                    } else {
                        $('#result').text('Not Found');
                    }
                }
            });
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        var checkContentInterval = setInterval(function() {
            var resultElement = document.getElementById("result");
            var addButton = document.getElementById("addButton");

            if (resultElement.textContent.trim() === "Not Found") {
                addButton.style.display = "block";
            } else {
                addButton.style.display = "none";
            }
        }, 100);
    });
</script>