<div class="layout-content">
    <div class="container-fluid flex-grow-1 container-p-y">
        <div class="alert alert-dark alert-dismissible fade show" id="serverResponseAlert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <span></span>
        </div>
        <h4 class="font-weight-bold py-3 mb-0">Service Entry</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Service</li>
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
            <div style="display: flex; justify-content:space-between; align-items: center;
            border-bottom: 0 solid rgba(24, 28, 33, 0.13);
            border-color: rgba(24, 28, 33, 0.13);
            border-radius: 0.125rem 0.125rem 0 0; 
            border-bottom-width: 1px;">
                <h6 class="card-header" style="border:none">Service</h6>
                <div>
                    <button type="button" onclick="addproduct()" class="btn btn-primary mr-3">Add job</button>
                    <button type="button" onclick="deleteProduct()" class="btn btn-danger mr-3">Delete job</button>
                </div>
            </div>
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
                                <button type="button" class="btn btn-outline-danger  p-2 m-4" id="addButton" style="display: none; "><a href="<?= base_url('master/ledger_master_add') ?>">Add Ledger</a> </button>
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
                        <input type="hidden" name="data" id="jobdata" />
                    </div>
                </form>
            </div>
        </div>

        <form action="" id="my_form">

        </form>
        <button type="submit" onclick="handlesubmit()" class="btn btn-primary">Add Service</button>
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

    function deleteProduct() {
        productsData?.pop();
        form.removeChild(form.lastChild);
        console.log(productsData);
    }

    function deleteGroup(id) {
        productsData?.[id - 1]?.group?.pop();
        let div = document.getElementById(`product_row_${id}`);
        div.removeChild(div.lastChild);

    }

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
        <div class="card mb-4">
        <div style="display: flex; justify-content:space-between; align-items: center;
        border-bottom: 0 solid rgba(24, 28, 33, 0.13);
        border-color: rgba(24, 28, 33, 0.13);
        border-radius: 0.125rem 0.125rem 0 0; 
        border-bottom-width: 1px;"> 
            <h6 class="card-header" style='border:none'>Job ${productcount}</h6>
            <div>
            <button type="button" class="btn btn-primary mr-3"  onclick="addgroup(${productcount})">add group</button>
            <button type="button" class="btn btn-danger mr-3"  onclick="deleteGroup(${productcount})">Delete group</button>
            </div> 
            </div> 
        <div class="card-body">
            <div style="display: flex; flex-wrap: wrap;">
            <div class="form-group col-6 ">
                <label class="form-label" for="name">Jobcard No:</label>
                <input type="text" class="form-control" name="jobno_${productcount}"  required placeholder="Enter JobCard Number">
            </div>
            <div class="form-group col-6 ">
                                <label class="form-label" for="name">Product Given for Service</label>
                                <select class="select2-demo form-control "  data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_${productcount}" ">
                    <option value="">Select Product Model</option>
                        <?php foreach ($product_models as $product) { ?>
                            <option value="<?= $product['id'] ?>"><?= $product['name'] ?></option>
                        <?php } ?>
                    </select>
                            
            </div>
            <div class="form-group col-6 ">
                                <label class="form-label" for="name">Compaints Type </label>
                                <select class="select2-demo form-control "  data-allow-clear="true" style="width: 100%" id="customer_groups" name="complaint_${productcount}">
                    <option value="">Select Compaints Type</option>
                        <?php foreach ($product_model_complaints as $complaint) { ?>
                            <option value="<?= $complaint['id'] ?>"><?= $complaint['name'] ?></option>
                        <?php } ?>
                    </select>
            </div>
            <div class="form-group col-6 ">
                                <label class="form-label" for="name">Service Type </label>
                                <select class="select2-demo form-control "  data-allow-clear="true" style="width: 100%" id="customer_groups" name="service_${productcount}">
                    <option value="">Select Service Type</option>
                        <?php foreach ($service_types as $service) { ?>
                            <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                        <?php } ?>
                    </select>
                                
            </div>
                       
            <div class="form-group col-6 ">
                                <label class="form-label" for="name">Assigned to </label>
                                
                                <select class="select2-demo form-control "  data-allow-clear="true" style="width: 100%" id="customer_groups" name="employee_${productcount}">
                    <option value="">Select Service Type</option>
                        <?php foreach ($technitions as $technition) { ?>
                            <option value="<?= $technition['id'] ?>"><?= $technition['name'] ?></option>
                        <?php } ?>
                    </select>
                            
            </div>
            <div class="form-group col-6">
                <div class="ui-bordered px-3 pt-3">
                    <label class="form-label">Attached files</label>
                    <div class="clearfix" id='file_div_${productcount}'>
                        <a  href="javascript:void(0)" onclick="fileClick('file_${productcount}')" class="ticket-file-add float-left bg-lighter text-muted mt-2 mb-3"><span class="ion ion-md-add"></span></a>
                    </div>  
                    <input type='file' name='file[]' onchange="imageChange(this,${productcount})" id='file_${productcount}' multiple style='display:none' />
                    <input type='hidden' name='image_${productcount}' id='image_${productcount}' />
                                
                </div>

            </div> 
            `;
        form.appendChild(inputRow)
        productcount++;
        productsData.push(product);
    }

    function imageChange(element, id, grp_id) {
        let file_div;
        let file;
        let add_button;
        if (grp_id) {
            file_div = document.getElementById(`file_div_${grp_id}_${id}`);
            file = document.getElementById(`image_${grp_id}_${id}`);
            add_button = `<a  href="javascript:void(0)" onclick="fileClick('file_${grp_id}_${id}')" class="ticket-file-add float-left bg-lighter text-muted mt-2 mb-3"><span class="ion ion-md-add"></span></a>`
        } else {
            file_div = document.getElementById(`file_div_${id}`);
            file = document.getElementById(`image_${id}`);
            add_button = `<a  href="javascript:void(0)" onclick="fileClick('file_${id}')" class="ticket-file-add float-left bg-lighter text-muted mt-2 mb-3"><span class="ion ion-md-add"></span></a>`
        }
        let formData = new FormData();
        for (let i = 0; i < element.files.length; i++) {
            formData.append(`image[]`, element.files[i]); 
        }
        fetch('uploadImage', {
                method: 'POST',
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                let arr = data;
                console.log(arr)
                let image_div = '';
                data?.forEach((v, i) => {
                    image_div += `
                    <div class="ui-feed-icon-container float-left pt-2 mr-3 mb-3">
                        <a href="javascript:void(0)" onclick='deleteImage(${id},${i},${grp_id})' class="ui-icon ui-feed-icon ion ion-md-close bg-secondary text-white"></a>
                        <img  src="<?= base_url('assets/uploads/') ?>${v}" alt="" class="img-fluid ticket-file-img image_scale">
                    </div>
                `;
                }); 
                file_div.innerHTML = image_div + add_button;
                file.value = JSON.stringify(arr);
            })
            .catch(error => {
                alert("SomeThing went wrong. Try again..!");
                console.log(error);
            });
    }

    function deleteImage(id, index, grp_id) {
        let file_div;
        let file;
        let add_button;
        if (grp_id) {
            file_div = document.getElementById(`file_div_${grp_id}_${id}`);
            file = document.getElementById(`image_${grp_id}_${id}`);
            add_button = `<a  href="javascript:void(0)" onclick="fileClick('file_${grp_id}_${id}')" class="ticket-file-add float-left bg-lighter text-muted mt-2 mb-3"><span class="ion ion-md-add"></span></a>`
        } else {
            file_div = document.getElementById(`file_div_${id}`);
            file = document.getElementById(`image_${id}`);
            add_button = `<a  href="javascript:void(0)" onclick="fileClick('file_${id}')" class="ticket-file-add float-left bg-lighter text-muted mt-2 mb-3"><span class="ion ion-md-add"></span></a>`
        }
        let image_div = '';
        let data = JSON.parse(file.value);
        let arr = data;
        data?.splice(index, 1);
        data?.forEach((v, i) => {
            image_div += `
                    <div class="ui-feed-icon-container float-left pt-2 mr-3 mb-3">
                        <a href="javascript:void(0)" onclick='deleteImage(${arr},${i})' class="ui-icon ui-feed-icon ion ion-md-close bg-secondary text-white"></a>
                        <img src="<?= base_url('assets/uploads/') ?>${v}" alt="" class="img-fluid ticket-file-img image_scale">
                    </div>
                `;
        });
        file_div.innerHTML = image_div + add_button;
        file.value = data;
    }

    function fileClick(id) {
        document.getElementById(id).click();
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
            <div class='container-fluid'>
        <h6 class="card-header">Group ${groupcount}</h6>
        <div class="card-body">
        
        <div style="display: flex; flex-wrap: wrap;">
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Jobcard No:</label>
                            <input type="text" class="form-control" name="jobno_${groupcount}_${id}"  required placeholder="Enter JobCard Number">
                        </div>
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Product Given for Service</label>
                            <select class="select2-demo form-control "  data-allow-clear="true" style="width: 100%" id="customer_groups" name="product_${groupcount}_${id}" ">
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
                            <select class="select2-demo form-control "  data-allow-clear="true" style="width: 100%" id="customer_groups" name="service_${groupcount}_${id}">
                 <option value="">Select Service Type</option>
                    <?php foreach ($service_types as $service) { ?>
                        <option value="<?= $service['id'] ?>"><?= $service['name'] ?></option>
                    <?php } ?>
                </select>
                        </div>
                       
        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Assigned to </label>
                            <select class="select2-demo form-control "  data-allow-clear="true" style="width: 100%" id="customer_groups" name="employee_${groupcount}_${id}">
                 <option value="">Select Service Type</option>
                    <?php foreach ($technitions as $technition) { ?>
                        <option value="<?= $technition['id'] ?>"><?= $technition['name'] ?></option>
                    <?php } ?>
                </select>
                        </div>
                        <div class="form-group col-6">
                            <div class="ui-bordered px-3 pt-3">
                                    <label class="form-label">Attached files</label>
                                    <div class="clearfix" id='file_div_${groupcount}_${id}'>
                                        <a  href="javascript:void(0)" onclick="fileClick('file_${groupcount}_${id}')" class="ticket-file-add float-left bg-lighter text-muted mt-2 mb-3"><span class="ion ion-md-add"></span></a>
                                    </div>  
                                    <input type='file' name='file[]' onchange="imageChange(this,${id},${groupcount})" id='file_${groupcount}_${id}' multiple style='display:none' />
                                    <input type='hidden' name='image_${groupcount}_${id}' id='image_${groupcount}_${id}' />
                             
                        </div>

            </div> 
            </div>
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

        jobData.formno = <?= $service_no; ?>;
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
            product.assigned = document.querySelector(`[name="employee_${index + 1}"]`).value;
            product.image_url = document.querySelector(`[name="image_${index + 1}"]`).value;


            product.group.forEach((group, groupIndex) => {
                group.jobcardNo = document.querySelector(`[name="jobno_${groupIndex + 1}_${index + 1}"]`).value;
                group.products = document.querySelector(`[name="product_${groupIndex + 1}_${index + 1}"]`).value;
                group.problem = document.querySelector(`[name="problem_${groupIndex + 1}_${index + 1}"]`).value;
                group.service = document.querySelector(`[name="service_${groupIndex + 1}_${index + 1}"]`).value;
                group.assigned = document.querySelector(`[name="employee_${groupIndex + 1}_${index + 1}"]`).value;
                group.image_url = document.querySelector(`[name="image_${groupIndex + 1}_${index + 1}"]`).value;
            });
        });
        const requestData = {
            jobData: jobData,
            productsData: productsData,
        };
        console.log(productsData);
        document.getElementById("jobdata").value = JSON.stringify(requestData);
        document.getElementById("jobform").submit();
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

</div>

</div>
<!-- [ Layout wrapper ] end -->

<!-- Core scripts -->
<script src="<?= base_url('') ?>assets/js/pace.js"></script>
<script src="<?= base_url('') ?>assets/libs/popper/popper.js"></script>
<script src="<?= base_url('') ?>assets/js/bootstrap.js"></script>
<script src="<?= base_url('') ?>assets/js/sidenav.js"></script>
<script src="<?= base_url('') ?>assets/js/layout-helpers.js"></script>
<script src="<?= base_url('') ?>assets/js/material-ripple.js"></script>

<!-- Libs -->
<script src="<?= base_url('') ?>assets/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.js"></script>
<script src="<?= base_url('') ?>assets/libs/dropzone/dropzone.js"></script>

<!-- Demo -->
<script src="<?= base_url('') ?>assets/js/demo.js"></script>
<script src="<?= base_url('') ?>assets/js/pages/pages_tickets_edit.js"></script>
</body>

</html>