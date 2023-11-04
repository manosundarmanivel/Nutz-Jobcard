<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    { 
        redirect(base_url("master/ledger_group_master_add")); 
    } 

    public function ledger_master_add()
    {
        $data['active_ledger_groups'] = $this->User_model->getActiveLedgerGroups();
        $class['classname'] = 'ledger_master_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_master_add', $data);
        $this->load->view("footer");
    }

    public function ledger_master_view()
    { 
         $data['ledger_masters'] = $this->User_model->getActiveLedgerMasters();
         $class['classname'] = 'ledger_master_view';
   
        $full_names = array();
        foreach ($data['ledger_masters'] as $ledger) {
            $full_names[] = $this->User_model->get_full_name($ledger['created_by']);
        }
        $data['full_names'] = $full_names;

        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_master_view', $data);
        $this->load->view("footer");
    }  

    public function ledger_group_master_add()
    {  $data ='';
        $class['classname'] = 'ledger_group_master_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_group_master_add', $data);
        $this->load->view("footer");
    }

    public function ledger_group_master_view()
    { 
        $data['ledger_group_masters'] = $this->User_model->getActiveLedgerGroupMasters();
        $class['classname'] = 'ledger_group_master_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_group_master_view', $data);
        $this->load->view("footer");
    } 

   
    public function viewActiveLedgerGroupMasters()
    {
        $data['ledger_group_masters'] = $this->User_model->getActiveLedgerGroupMasters(); 
        $class['classname'] = 'viewActiveLedgerGroupMasters';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_group_master_view', $data);
        $this->load->view("footer");
    }

    public function viewActiveLedgerMasters()
    {
        $data['ledger_masters'] = $this->User_model->getActiveLedgerMasters(); 
        $class['classname'] = 'viewActiveLedgerMasters';
        $this->load->view("sidebar",$class);
        $this->load->view('master/ledger_master_view', $data);
        $this->load->view("footer");
    }

    public function addLedger()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('customer_name', 'Customer Name', 'required|max_length[50]');
                $this->form_validation->set_rules('customer_contact', 'Customer Contact', 'required');    
                $this->form_validation->set_rules('customer_group', 'Customer Group', 'required');  
                $this->form_validation->set_rules('customer_address', 'Customer Address', 'required');  
                $this->form_validation->set_rules('customer_email', 'Customer Email', 'required');  
                $this->form_validation->set_rules('customer_gst', 'Customer GST', 'required');  
                $this->form_validation->set_rules('customer_pan', 'Customer Plan', 'required');  
                $this->form_validation->set_rules('entry_type', 'Entry Type', 'required');  
                $this->form_validation->set_rules('price_list', 'Price List', 'required');  
                $this->form_validation->set_rules('add_less_percentage', 'Add Less Percentage', 'required');  
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('customer_name'),
                        'contact_no' => $this->input->post('customer_contact'),
                        'ledger_group_id' => $this->input->post('customer_group'),
                        'address' => $this->input->post('customer_address'),
                        'email_id' => $this->input->post('customer_email'),
                        'gst_no' => $this->input->post('customer_gst'),
                        'pan_no' => $this->input->post('customer_pan'),
                        'entry_type' => $this->input->post('entry_type'),
                        'price_list' => $this->input->post('price_list'),
                        'discount' => $this->input->post('add_less_percentage'),
                        'is_active' => true,
                        'created_by' => $this->session->userdata('user_id'),
                        'created_at' => date('Y-m-d H:i:s')
                        
                    );
                    $this->User_model->addLedger($data);
                    $this->session->set_flashdata('message', array('success', "Ledger Added Successfully"));
                    redirect('master/ledger_master_add');
        
                } 
            }

           
        }
    }

   
    

    public function addledgergroup()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            if($this->input->post()){
                
                $this->form_validation->set_rules('name', 'Name', 'required');  
                $this->form_validation->set_rules('type', 'Type', 'required');  
               
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
            $user_id = $this->session->userdata('user_id');
            $name = $this->input->post('name');
            $type = $this->input->post('type');


            $data = array(
                'name' => $name,
                'type' => $type,
                'is_active' => 1,
                // 'created_by' => $user_id,
                'created_by' => "1",
                'created_at' => date('Y-m-d H:i:s'),
            
            );



            $this->User_model->addLedgerGroup($data);
            $this->session->set_flashdata('message', array('success', "Ledger Group Added Successfully"));
            redirect('master/ledger_group_master_add');
        }
            
        } else { 
            $class['classname'] = 'addledgergroup';
            $this->load->view("sidebar",$class);
            $this->load->view('master/ledger_group_master_add', $data);
            $this->load->view("footer");
        }
    }
}


    public function deleteLedger($id) {
        $this->User_model->deleteLedger($id);
        redirect('master/ledger_master_view'); 
    }
    public function deleteLedgerGroup($id) {
        $this->User_model->deleteLedgerGroup($id);
        redirect('master/ledger_group_master_view'); 
    }


    public function editLedger($id) {
        $data['ledger'] = $this->User_model->getLedgerById($id);
        
         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('customer_name'),
                'contact_no' => $this->input->post('customer_contact'),
                'address' => $this->input->post('customer_address'),
                'email_id' => $this->input->post('customer_email'),
                'gst_no' => $this->input->post('customer_gst'),
                'pan_no' => $this->input->post('customer_pan'),
                'entry_type' => $this->input->post('entry_type'),
                'price_list' => $this->input->post('price_list'),
                'discount' => $this->input->post('add_less_percentage'),
    
            );
            
            $res = $this->User_model->updateLedger($id, $data);
            if($res)
            redirect('master/ledger_master_view');
         }
        if ($data['ledger']) {
            $class['classname'] = 'viewledger';
            $this->load->view("sidebar",$class);
            $this->load->view('master/ledger_master_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }
    public function editLedgerGroup($id) {
        $data['ledgerGroup'] = $this->User_model->getLedgerGroupById($id);

         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('name'),
                'type' => $this->input->post('type'),
                
    
            );
            
            $res = $this->User_model->updateLedgerGroup($id, $data);
            if($res)
            redirect('master/ledger_group_master_view');
         }
        if ($data['ledgerGroup']) {
            $class['classname'] = 'viewledgerGroup';
            $this->load->view("sidebar",$class);
            $this->load->view('master/ledger_group_master_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }



    public function product_category_add()
    {
        $data ='';
        $class['classname'] = 'product_category_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_category_add', $data);
        $this->load->view("footer");
    }

    public function product_category_view()
    { 
        $data['product_categories'] = $this->User_model->getActiveProductcategory();
        $class['classname'] = 'product_category_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_category_view', $data);
        $this->load->view("footer");
    } 



    public function addProductcategory()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('product_category', 'product_category', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('product_category'),
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addProductcategory($data);
                    $this->session->set_flashdata('message', array('success', "Product Category Added Successfully"));
                    redirect('master/product_category_add');
        
                } 
            }

           
        }
    }

    public function deleteProductcategory($id) {
        $this->User_model->deleteProductcategory($id);
        redirect('master/product_category_view'); 
    }
    public function deleteProductimage($id) {
        $this->User_model->deleteProductimage($id);
        redirect('master/product_item_view'); 
    }

    public function editProductcategory($id) {
        $data['product_category'] = $this->User_model->getProductcategoryById($id);

         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('product_category'),
                
                
    
            );
            
            $res = $this->User_model->updateProductcategory($id, $data);
            if($res)
            redirect('master/product_category_view');
         }
        if ($data['product_category']) {
            $class['classname'] = 'viewProductcategory';
            $this->load->view("sidebar",$class);
            $this->load->view('master/product_category_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }


    public function product_group_add()
    {
        $data['active_product_categories'] = $this->User_model->getActiveProductcategory();
        $class['classname'] = 'product_group_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_group_add', $data);
        $this->load->view("footer");
    }

    public function product_group_view()
    { 
        $data['product_groups'] = $this->User_model->getActiveProductgroups();
    
        $class['classname'] = 'product_group_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_group_view', $data);
        $this->load->view("footer");
    } 



    public function addProductgroup()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('customer_group', 'Product Category', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        'product_category_id'=>$this->input->post('customer_group'),
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addProductgroup($data);
                    $this->session->set_flashdata('message', array('success', "Product Group Added Successfully"));
                    redirect('master/product_group_add');
        
                } 
            }

           
        }
    }

    public function deleteProductgroup($id) {
        $this->User_model->deleteProductgroup($id);
        redirect('master/product_group_view'); 
    }

    public function editProductgroup($id) {
        $data['product_group'] = $this->User_model->getProductgroupById($id);

         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('name'),
                'product_category_id'=>$this->input->post('product_category_id'),
                       
                
                
    
            );
            
            $res = $this->User_model->updateProductgroup($id, $data);
            if($res)
            redirect('master/product_group_view');
         }
        if ($data['product_group']) {
            $class['classname'] = 'viewProductgroup';
            $this->load->view("sidebar",$class);
            $this->load->view('master/product_group_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }




    public function product_model_add()
    {
        $data['active_product_groups'] = $this->User_model->getActiveProductgroups();
        $class['classname'] = 'product_model_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_model_add', $data);
        $this->load->view("footer");
    }

    public function product_model_view()
    { 
        $data['product_models'] = $this->User_model->getActiveProductmodels();
        $class['classname'] = 'product_model_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_model_view', $data);
        $this->load->view("footer");
    } 



    public function addProductmodel()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('customer_group', 'Product Model', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        'product_group_id'=>$this->input->post('customer_group'),
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addProductmodel($data);
                    $this->session->set_flashdata('message', array('success', "Product Group Added Successfully"));
                    redirect('master/product_model_add');
        
                } 
            }

           
        }
    }

    public function deleteProductmodel($id) {
        $this->User_model->deleteProductmodel($id);
        redirect('master/product_model_view'); 
    }

    public function editProductmodel($id) {
        $data['product_model'] = $this->User_model->getProductmodelById($id);

         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('name'),
                'product_group_id'=>$this->input->post('product_group_id'),
                       
                
                
    
            );
            
            $res = $this->User_model->updateProductmodel($id, $data);
            if($res)
            redirect('master/product_model_view');
         }
        if ($data['product_model']) {
            $class['classname'] = 'viewProductmodel';
            $this->load->view("sidebar",$class);
            $this->load->view('master/product_model_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }





    public function product_model_complaint_add()
    {
        $data['active_product_models'] = $this->User_model->getActiveProductmodels();
        $class['classname'] = 'product_model_complaint_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_model_complaint_add', $data);
        $this->load->view("footer");
    }

    public function product_model_complaint_view()
    { 
        $data['product_model_complaints'] = $this->User_model->getActiveProductcomplaints();
        $class['classname'] = 'product_model_complaint_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_model_complaint_view', $data);
        $this->load->view("footer");
    } 



    public function addProductmodelcomplaint()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('product_model', 'Product Model', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        'product_model_id'=>$this->input->post('product_model'),
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addProductmodelcomplaint($data);
                    $this->session->set_flashdata('message', array('success', "Product Model Complaint Successfully"));
                    redirect('master/product_model_complaint_add');
        
                } 
            }

           
        }
    }

    public function deleteProductmodelcomplaint($id) {
        $this->User_model->deleteProductmodelcomplaint($id);
        redirect('master/product_model_complaint_view'); 
    }

    public function editProductmodelcomplaint($id) {
        $data['product_model_complaint'] = $this->User_model->getProductmodelcomplaintById($id);

         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('name'),
                'product_model_id'=>$this->input->post('product_model'),
                       
                
                
    
            );
            
            $res = $this->User_model->updateProductmodelcomplaint($id, $data);
            if($res)
            redirect('master/product_model_complaint_view');
         }
        if ($data['product_model_complaint']) {
            $class['classname'] = 'viewProductmodelcomplaint';
            $this->load->view("sidebar",$class);
            $this->load->view('master/product_model_complaint_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }



    public function product_brand_add()
    {  $data ='';
        $class['classname'] = 'product_brand_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_brand_add', $data);
        $this->load->view("footer");
    }


   

    public function product_brand_view()
    { 
        $data['product_brands'] = $this->User_model->getActiveProductbrand();
        $class['classname'] = 'product_brand_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_brand_view', $data);
        $this->load->view("footer");
    } 



    public function addProductbrand()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required');
                
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addProductbrand($data);
                    $this->session->set_flashdata('message', array('success', "Product Model Complaint Successfully"));
                    redirect('master/product_brand_add');
        
                } 
            }

           
        }
    }

    public function deleteProductbrand($id) {
        $this->User_model->deleteProductbrand($id);
        redirect('master/product_brand_view'); 
    }

    public function editProductbrand($id) {
        $data['product_brand'] = $this->User_model->getProductbrandById($id);

         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('name'),
    
            );
            
            $res = $this->User_model->updateProductbrand($id, $data);
            if($res)
            redirect('master/product_brand_view');
         }
        if ($data['product_brand']) {
            $class['classname'] = 'viewProductbrand';
            $this->load->view("sidebar",$class);
            $this->load->view('master/product_brand_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }





    public function product_item_add()
    {
        $data['active_product_groups'] = $this->User_model->getActiveProductgroups();
        $data['active_product_categories'] = $this->User_model->getActiveProductcategory();
        $data['active_product_models'] = $this->User_model->getActiveProductmodels();
        $data['active_product_brands'] = $this->User_model->getActiveProductbrand();

        $class['classname'] = 'product_item_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_item_add', $data);
        $this->load->view("footer");
    }

    public function product_item_view()
    { 
        $data['product_items'] = $this->User_model->getActiveProductitems();
        $class['classname'] = 'product_item_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/product_item_view', $data);
        $this->load->view("footer");
    } 



    public function addProductitem()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('icode', 'Item Code', 'required');
                $this->form_validation->set_rules('name', 'Item Name', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                $this->form_validation->set_rules('img', 'Item Images / Videos', 'required');
                $this->form_validation->set_rules('sellingunit', 'Selling Unit Of Materials', 'required');
                $this->form_validation->set_rules('purchaseunit', 'Purchase Unit Of Materials', 'required');
                $this->form_validation->set_rules('product_c', 'Product Category', 'required');
                $this->form_validation->set_rules('product_m', 'Product Model', 'required');
                $this->form_validation->set_rules('product_g', 'Product Group', 'required');
                $this->form_validation->set_rules('product_b', 'Product Brand', 'required');
                $this->form_validation->set_rules('tax', 'Tax %', 'required');
                $this->form_validation->set_rules('code', 'HSN / SAC Code', 'required');
                $this->form_validation->set_rules('purchaseprice', 'Purchase Price', 'required');
                $this->form_validation->set_rules('dealerbprice', 'Dealer Billing Price', 'required');
                $this->form_validation->set_rules('wholesaleprice', 'Wholesale Price', 'required');
                $this->form_validation->set_rules('mop', 'MOP', 'required');
                $this->form_validation->set_rules('minimumstock', 'Minimum Stock', 'required');
                $this->form_validation->set_rules('maximumstock', 'Maximum Stock', 'required');
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
 
                        'code ' => $this->input->post('icode'),
                       ' name ' => $this->input->post('name'),
                        'description ' => $this->input->post('description'),
                        'image_url'  => $this->input->post('img'),
                        'selling_unit'  => $this->input->post('sellingunit'),
                        'purchase_unit'  => $this->input->post('purchaseunit'),
                        'product_category_id ' => $this->input->post('product_c'),
                        'product_group_id'  => $this->input->post('product_g'),
                        'product_model_id'  => $this->input->post('product_m'),
                        'product_brand_id'  => $this->input->post('product_b'),
                        'tax_master_id ' => $this->input->post('tax'),
                        'hsn_sac_code ' => $this->input->post('code'),
                        'purchase_price ' => $this->input->post('purchaseprice'),
                        'dealer_billing_price ' => $this->input->post('dealerbprice'),
                        'wholesale_price' => $this->input->post('wholesaleprice'),
                        'mpo ' => $this->input->post('mop'),
                        'min_stock ' => $this->input->post('minimumstock'),
                        'max_stock'   => $this->input->post('maximumstock'),
                        'is_active '=>1
                       
                        
                        
                    );
                    $this->User_model->addProductitem($data);
                    $this->session->set_flashdata('message', array('success', "Product Item Added Successfully"));
                    redirect('master/product_item_add');
        
                } 
            }

           
        }
    }

    public function deleteProductitem($id) {
        $this->User_model->deleteProductitem($id);
        redirect('master/product_item_view'); 
    }

    public function editProductitem($id) {
        $data['product_item'] = $this->User_model->getProductitemById($id);

         if($this->input->post())
         {
          
            $data = array(
                      'code' => $this->input->post('icode'),
                       'name' => $this->input->post('name'),
                        'description ' => $this->input->post('description'),
                        'image_url'  => $this->input->post('img'),
                        'selling_unit'  => $this->input->post('sellingunit'),
                        'purchase_unit'  => $this->input->post('purchaseunit'),
                        'product_category_id ' => $this->input->post('product_c'),
                        'product_group_id'  => $this->input->post('product_g'),
                        'product_model_id'  => $this->input->post('product_m'),
                        'product_brand_id'  => $this->input->post('product_b'),
                        'tax_master_id' => $this->input->post('tax'),
                        'hsn_sac_code' => $this->input->post('code'),
                        'purchase_price' => $this->input->post('purchaseprice'),
                        'dealer_billing_price' => $this->input->post('dealerbprice'),
                        'wholesale_price' => $this->input->post('wholesaleprice'),
                        'mpo' => $this->input->post('mop'),
                        'min_stock ' => $this->input->post('minimumstock'),
                        'max_stock'   => $this->input->post('maximumstock'),
                        'is_active'=>1
                       
                
                
    
            );
            
            $res = $this->User_model->updateProductitem($id, $data);
            if($res)
            redirect('master/product_item_view');
         }
        if ($data['product_item']) {
            $class['classname'] = 'viewProductitem';
            $this->load->view("sidebar",$class);
            $this->load->view('master/product_item_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }

    public function addProductimage($id)
    {
        $data['product_item'] = $this->User_model->getProductitemById($id);
        $data['product_image'] = $this->User_model->getProductimageById($id);

        if (isset($data['product_item']) || isset($data['product_image'])) {
            $class['classname'] = 'viewProductitem';
            $this->load->view("sidebar",$class);
            $this->load->view('master/product_image_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }



    }

    public function saveProductImage($id)
    {

   $image_url = $this->User_model->uploadMultiple('img');

   $this->User_model->insertProductImage($id, $image_url['0']);
                redirect('master/product_item_view');
  

    }



    public function jobcard_service_add()
    {  $data ='';
        $class['classname'] = 'jobcard_service_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/jobcard_service_add', $data);
        $this->load->view("footer");
    }


   

    public function jobcard_service_view()
    { 
        $data['service_types'] = $this->User_model-> getActiveServicetype();
        $class['classname'] = 'jobcard_service_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/jobcard_service_view', $data);
        $this->load->view("footer");
    } 



    public function addServicetype()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('description', 'Description', 'required');
                
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        'description' => $this->input->post('description'),
                        
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addServicetype($data);
                    $this->session->set_flashdata('message', array('success', "Service Type Added Successfully"));
                    redirect('master/jobcard_service_add');
        
                } 
            }

           
        }
    }

    public function deleteServicetype($id) {
        $this->User_model->deleteServicetype($id);
        redirect('master/jobcard_service_view'); 
    }

    public function editServicetype($id) {
        $data['service_type'] = $this->User_model->getServicetypeById($id);

         if($this->input->post())
         {
          
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
    
            );
            
            $res = $this->User_model->updateServicetype($id, $data);
            if($res)
            redirect('master/jobcard_service_view');
         }
        if ($data['service_type']) {
            $class['classname'] = 'viewServicetype';
            $this->load->view("sidebar",$class);
            $this->load->view('master/jobcard_service_edit', $data);
            $this->load->view("footer");
        } else {
            //error page
        }
    }




    public function jobcard_employee_add()
    {  $data ='';
        $class['classname'] = 'jobcard_employee_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/jobcard_employee_add', $data);
        $this->load->view("footer");
    }


   

    public function jobcard_employee_view()
    { 
        $data['employees'] = $this->User_model->getActiveEmployee();
        $class['classname'] = 'jobcard_employee_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/jobcard_employee_view', $data);
        $this->load->view("footer");
    } 



    public function addEmployee()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('designation', 'Designation', 'required');
                $this->form_validation->set_rules('contact', 'Contact', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('username', 'Username', 'required');
                $this->form_validation->set_rules('password', 'Password', 'required');
                
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        'designation' => $this->input->post('designation'),
                        'contact'=> $this->input->post('contact'),
                        'address'=> $this->input->post('address'),
                        'username'=> $this->input->post('username'),
                        'password'=> $this->input->post('password'),
                        
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addEmployee($data);
                    $this->session->set_flashdata('message', array('success', "Employee Added Successfully"));
                    redirect('master/jobcard_employee_add');
        
                } 
            }

           
        }
    }

    public function deleteEmployee($id) {
        $this->User_model->deleteEmployee($id);
        redirect('master/jobcard_employee_view'); 
    }

    public function editEmployee($id) {
        $data['employees'] = $this->User_model->getEmployeeById($id);

         if($this->input->post())
         {
          
            $data = array(

                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'contact'=> $this->input->post('contact'),
                'address'=> $this->input->post('address'),
                'username'=> $this->input->post('username'),
                'password'=> $this->input->post('password'),
    
            );
            
            $res = $this->User_model->updateEmployee($id, $data);
            if($res)
            redirect('master/jobcard_employee_view');
         }
        if ($data['employees']) {
            $class['classname'] = 'viewEmployee';
            $this->load->view("sidebar",$class);
            $this->load->view('master/jobcard_employee_edit', $data);
            $this->load->view("footer");
        } 
        else 
        {
            //error page
        }
    }





    public function jobcard_outwork_add()
    {  $data ='';
        $class['classname'] = 'jobcard_outwork_add';
        $this->load->view("sidebar",$class);
        $this->load->view('master/jobcard_outwork_add', $data);
        $this->load->view("footer");
    }


   

    public function jobcard_outwork_view()
    { 
        $data['outworks'] = $this->User_model-> getActiveOutwork();
        $class['classname'] = 'jobcard_outwork_view';
        $this->load->view("sidebar",$class);
        $this->load->view('master/jobcard_outwork_view', $data);
        $this->load->view("footer");
    } 



    public function addOutwork()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {

            if($this->input->post()){
                $this->form_validation->set_rules('name', 'Name', 'required');
                $this->form_validation->set_rules('contact', 'Contact', 'required');
                $this->form_validation->set_rules('address', 'Address', 'required');
                $this->form_validation->set_rules('email', 'Email', 'required');
             
                
                
                if ($this->form_validation->run() == FALSE) {
                    $this->session->set_flashdata('message', array('danger', validation_errors()));
                }else{
                    $data = array(
                        'name' => $this->input->post('name'),
                        
                        'contact'=> $this->input->post('contact'),
                        'address'=> $this->input->post('address'),
                        'email'=> $this->input->post('email'),
                        'is_active' => 1
                       
                        
                    );
                    $this->User_model->addOutwork($data);
                    $this->session->set_flashdata('message', array('success', "Outwork Vendor Added Successfully"));
                    redirect('master/jobcard_outwork_add');
        
                } 
            }

           
        }
    }

    public function deleteOutwork($id) {
        $this->User_model->deleteOutwork($id);
        redirect('master/jobcard_outwork_view'); 
    }

    public function editOutwork($id) {
        $data['outworks'] = $this->User_model->getOutworkById($id);

         if($this->input->post())
         {
          
            $data = array(

                'name' => $this->input->post('name'),
                        
                'contact'=> $this->input->post('contact'),
                'address'=> $this->input->post('address'),
                'email'=> $this->input->post('email'),
    
            );
            
            $res = $this->User_model->updateOutwork($id, $data);
            if($res)
            redirect('master/jobcard_outwork_view');
         }
        if ($data['outworks']) {
            $class['classname'] = 'viewOutwork';
            $this->load->view("sidebar",$class);
            $this->load->view('master/jobcard_outwork_edit', $data);
            $this->load->view("footer");
        } 
        else 
        {
            //error page
        }
    }
   

}
