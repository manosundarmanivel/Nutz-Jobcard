<div class="layout-content">
        <div class="container-fluid flex-grow-1 container-p-y">
        <?php if ($this->session->flashdata('message')) { ?>
            <div class="alert alert-dark-<?= $this->session->flashdata('message')[0] ?> alert-dismissible fade show" id="alert">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <span><?= $this->session->flashdata('message')[1] ?></span>
            </div>
        <?php   } ?>
            <h4 class="font-weight-bold  mt-2 mb-4"><i class="feather icon-home"></i>Add Ledger</h4>
<div class="card mb-4">
    <h6 class="card-header">Add Ledger</h6>
    <div class="card-body">
        <form method="post" action="<?= base_url('master/addledger') ?>">
       
        <div style="display: flex;">
        <div class="form-group col-6">
                <label class="form-label" for="customer_name">Customer Name / Company Name:</label>
                <input type="text" class="form-control" id="customer_name" name="customer_name" required placeholder="Enter Name">
            </div>

            <div class="form-group  col-6">
                <label class="form-label" for="customer_contact">Customer Contact Number:</label>
                <input type="text" class="form-control" id="customer_contact" name="customer_contact" placeholder="Enter Contact Number">
            </div>
        </div>

        
            
            <div style="display: flex;">
            <div class="form-group col-6">
                <label class="form-label" for="customer_group" >Customer Group:</label>
                <select class="select2-demo form-control " onchange="ledgerChange()"  data-allow-clear="true" style="width: 100%" id="customer_groups" name="customer_group">
                 <option value="">Select Customer Group</option>
                    <?php foreach ($active_ledger_groups as $group) { ?>
                        <option value="<?= $group['id'] ?>"><?= $group['name'] ?></option>
                    <?php } ?>
                </select>
            </div>

            

            <div class="form-group col-6">
                <label class="form-label" for="customer_email">E-Mail ID:</label>
                <input type="email" class="form-control" id="customer_email" name="customer_email" placeholder="Enter Email">
            </div>
            </div>

           <div style="display: flex;">
           <div class="form-group col-6">
                <label class="form-label" for="customer_gst">GST No.:</label>
                <input type="text" class="form-control" id="customer_gst" name="customer_gst" placeholder="Enter GST No.">
            </div>

            <div class="form-group col-6">
                <label class="form-label" for="customer_pan">PAN No.:</label>
                <input type="text" class="form-control" id="customer_pan" name="customer_pan" placeholder="Enter PAN No.">
            </div>
           </div>

            <div class="form-group">
                <label class="form-label" for="entry_type">Entry Type:</label>
                <select name="entry_type"  class=" form-control " data-allow-clear="true" style="width: 100%" >
                <option value="">Select Entry Type</option>
                    <option>Sales</option>
                    <option>Purchase</option>
                    <option>Both</option>
                    
                </select>
                <!-- <input type="text" class="form-control" id="entry_type"  placeholder="Enter Entry Type"> -->
            </div>

            <div class="form-group">
                <label class="form-label" for="price_list">Price List:</label>
                <select name="price_list"  class=" form-control " data-allow-clear="true" style="width: 100%" >
                <option value="">Select Price List</option>
                    <option>Purchase Price</option>
                    <option>DBP</option>
                    <option>Wholesale Price </option>
                    <option>MOP </option>
                 
                </select>
                
            </div>

            <div class="form-group">
                <label class="form-label" for="add_less_percentage">Add / Less %:</label>
               
                <input type="text" class="form-control" name="add_less_percentage"  id="add_less_percentage"  placeholder="Enter Add / Less Percentage">
            </div>
            <div class="form-group">
                <label class="form-label" for="customer_address">Address:</label>
                <textarea class="form-control" id="customer_address" name="customer_address" rows="3" placeholder="Enter Address"></textarea>
            </div>
            <div class="form-group" id="isVendor" style="display: none;">
            <label class="form-label" for="customer_address">Add as a Vendor</label>
            <input class="form-control" id="add_vendor" name="add_vendor" type="checkbox"/>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
        </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="<?= base_url('') ?>assets/js/pages/forms_selects.js"></script>
<script src="<?= base_url('') ?>assets/libs/bootstrap-select/bootstrap-select.js"></script>
<script src="<?= base_url('') ?>assets/libs/select2/select2.js"></script> 
<script>
function ledgerChange(){
    const element = document.getElementById("customer_groups");
    if(element.value == 1)
    {
    document.getElementById("isVendor").style.display= "block";
    }
 
}
</script>
