<?php
class Customer extends CI_Controller
{
	public	function __construct() 
	{
		parent::__construct();
		$this->load->library('rb');
		$this->load->library('javascript');
		//$this->load->library('jquery');
		$this->load->model('customer_model');
	}
	
	public function index() 
	{
		$data['customers'] = $this->customer_model->get_customers();
		$data['title'] = 'Customers';
                $this->load->view('templates/header', $data);
		$this->load->view('customer/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($customer_id = NULL) 
	{
		$data['customer_info'] = $this->customer_model->get_customer($customer_id);

		if (empty($data['customer_info']))
			{
		        show_404();
			}

		$data['title'] = $data['customer_info']['customer_name'];
	
		$this->load->view('templates/header', $data);
		$this->load->view('customer/view', $data);
		$this->load->view('templates/footer');

	}
	
	public function create()
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Create a customer item';

	    //$this->form_validation->set_rules('Name', 'Title', 'required');
	    $this->form_validation->set_rules('customer_name', 'Customer name', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('customer/create', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
                $data = array(
		'name' => $this->input->post('customer_name'),
  		'address' => $this->input->post('address'),
 		'email' => $this->input->post('email'),
		'phone_1' => $this->input->post('phone_1'),
		'phone_2' => $this->input->post('phone_2'),
		'notes' => $this->input->post('notes')
               );
		$this->customer_model->insert_customer($data);
                redirect('/customer'); // reload Customer list view
		//$this->load->view('customer/success');
	    }
	}
        
    	public function edit($customer_id)
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
            //$customer_id = $this->input->post('customer_id');
            log_message('debug', 'customer/edit on server for customer_id:'.$customer_id);
	    $data['title'] = 'Edit a customer item';
            $data['customer_info'] = $this->customer_model->get_customer($customer_id);
	    $this->form_validation->set_rules('customer_name', 'Customer name', 'required');
            $this->form_validation->set_rules('sbm', 'Return to list', 'required');
            
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('customer/edit', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
                $this->updatedatabase();
                redirect('/customer'); // reload Customer list view
	    }
	}
  
    	public function updatedatabase()
	{
            if($this->input->post('sbm') == "Update Customer") 
                {
                $data = array(
                'id' => $this->input->post('customer_id'),
		'name' => $this->input->post('customer_name'),
  		'address' => $this->input->post('address'),
 		'email' => $this->input->post('email'),
		'phone_1' => $this->input->post('phone_1'),
		'phone_2' => $this->input->post('phone_2'),
		'notes' => $this->input->post('notes')
                );
                log_message('debug', 'customer/updatedatabase for customer_id:'.$data['id']);
		$this->customer_model->update_customer($data);
                //$this->index(); // reload Customer list view
                }
            else if ($this->input->post('sbm') == "Return to list")
                {
                redirect('/customer');
                }
            else
                {
                echo "OOPS!!";
                }
                  
 	}
  
     function confirm_delete()
        {
         //if (isset($_POST['accept_terms_checkbox']))
            if ($this->input->post('confirm'))
                {
                return TRUE;
                }
            else
                {
                $error = 'Please check confirm to delete record';
                $this->form_validation->set_message('confirm', $error);
                return FALSE;
                }
        }
        
    public function delete($customer_id = NULL)
        {
            $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Delete a customer item';
            $data['customer_id'] = $customer_id;
            $this->form_validation->set_rules('confirm', '', 'callback_confirm_delete');
	    if ($this->form_validation->run() === FALSE)
                {
                echo 'customer/delete validation FALSE on server for customer_id:'.$customer_id.'  --- Dispaly form';
		$this->load->view('templates/header', $data);
		$this->load->view('customer/delete', $data);
		$this->load->view('templates/footer');
	
                }
	    else
                {
                $mid = $this->input->post('customer_id');
                log_message('debug', 'customer/delete on server for customer_id:'.$customer_id);
                $this->customer_model->delete_customer($mid);
                redirect('/customer'); // reload Customer list view
                }
        }
    }