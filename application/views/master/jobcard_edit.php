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
 
        <h4 class="font-weight-bold py-3 mb-0">Edit Service</h4>
        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                <li class="breadcrumb-item">Service</li>
                <li class="breadcrumb-item active">Edit</li>
            </ol>
        </div> 


        <div class="card mb-4">
            <h6 class="card-header">Edit Service</h6>
            <div class="card-body">
                <form id="jobform" method="post" enctype="multipart/form-data" action="<?= base_url('master/editJobcard/'.$jobcard['id']) ?>">
                    <div style="display: flex; flex-wrap: wrap;">
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Form No./ Service No :</label>
                            <input type="text" disabled class="form-control" value="<?= $jobcard['formno'] ?>" required placeholder="Enter Service No">
                        </div>
                        <div class="form-group col-6 ">
                            <label class="form-label" for="name">Contact Number:</label>
                            <div style="display: flex;">
                                <input type="text" class="form-control" id="contact_number" value="<?= $jobcard['contact'] ?>" name="contact" placeholder="Enter Contact Number">
                                <button class="btn btn-facebook" type="button" id="lookup_btn">Lookup</button>
                            </div>


                        </div>



                        <div class="form-group col-6">
                            <label class="form-label" for="name">Customer / Company Name</label>
                          
                            <div style="display: flex; align-items: center; ">
                                <input value="<?= $jobcard['customerName'] ?>" type="hidden" name="customer_name" id="customer_name" />
                                <p id="result"> <?= $jobcard['customerName'] ?></p>
                                <button type="button" class="btn btn-outline-danger  p-2 m-2" id="addButton" style="display: none; "><a href="<?= base_url('master/ledger_master_add') ?>">Add Ledger</a> </button>
                            </div>



                        </div>
                        <div class="form-group col-6">
            <label class="form-label" for="name">Warranty Status :</label>
            <label class="switcher">
                <input name="warranty" type="checkbox" id="toggleButton" <?= $jobcard['warrantyStatus'] == 1 ? 'checked' : '' ?> onclick="toggleWarranty()" class="switcher-input">
                <span class="switcher-indicator">
                    <span class="switcher-yes"></span>
                    <span class="switcher-no"></span>
                </span>
            </label>
        </div>
        <input type="hidden" name="warrantyStatus" id="warrantyStatusInput" value="<?= $jobcard['warrantyStatus'] ?>">
        <div id="warrantyStatus" class="form-group col-6" <?= $jobcard['warrantyStatus'] == 1 ? 'style="display: block;"' : 'style="display: none;"' ?>>
            <label class="form-label">Bill No :</label>
            <input class="form-control" value="<?= $jobcard['billNo'] ?>" type="text" id="billDetailsInput" name="billDetailsInput">
        </div>
                        <div class="form-group col-6">
                            <label class="form-label" for="name">Remarks :</label>
                            <textarea type="text" class="form-control" name="remarks" id="name" required placeholder="Enter Remarks"> <?= $jobcard['remarks'] ?> </textarea>
                        </div>
                        <input type="hidden" name="data" id="jobdata" />


                    </div>


                    <button class="btn btn-primary">Update JobCard</button>
                </form>
            </div>
        </div>



    </div>
</div>


<script> 
function toggleWarranty() {
        const toggleButton = document.getElementById('toggleButton');
        const warrantyStatus = document.getElementById('warrantyStatus');
        const warrantyStatusInput = document.getElementById('warrantyStatusInput');

        warrantyStatus.style.display = toggleButton.checked ? 'block' : 'none';
        warrantyStatusInput.value = toggleButton.checked ? 1 : 0;


        if (!toggleButton.checked) {
            billDetailsInput.value = null;
        }
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
                        $('#customer_name').val(response.ledgerName);

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