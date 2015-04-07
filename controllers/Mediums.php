<?php
class Mediums extends CI_Controller
{
	public	function __construct() 
	{
		parent::__construct();
		$this->load->library('rb');
		$this->load->library('javascript');
		//$this->load->library('jquery');
		$this->load->model('mediums_model');
	}
	
	public function index() 
	{
		$data['mediums'] = $this->mediums_model->get_mediums();
		$data['title'] = 'Mediums';
		//$this->load->view('templates/menu', $data);
                $this->load->view('templates/header', $data);
		$this->load->view('mediums/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($medium_id = NULL) 
	{
		$data['medium_info'] = $this->mediums_model->get_medium($medium_id);
		echo 'index: ';
		//echo '<pre>';
		//var_dump( $data['medium_info']);
		//echo '</pre>';
		if (empty($data['medium_info']))
			{
		        show_404();
			}

		$data['title'] = $data['medium_info']['medium'];
	
		$this->load->view('templates/header', $data);
		$this->load->view('mediums/view', $data);
		$this->load->view('templates/footer');

	}
	
	public function create()
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Create a medium item';
	    //$data['medium_name'] = 'Create a medium item';
	
	    //$this->form_validation->set_rules('Name', 'Title', 'required');
	    $this->form_validation->set_rules('medium_name', 'Medium name', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('mediums/create', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
		$this->mediums_model->set_medium();
                $this->index(); // reload Mediums list view
		//$this->load->view('mediums/success');
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
        
    public function delete($medium_id = NULL)
        {
            $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Delete a medium item';
            $data['medium_id'] = $medium_id;
            $this->form_validation->set_rules('confirm', '', 'callback_confirm_delete');
	    if ($this->form_validation->run() === FALSE)
                {
                echo 'mediums/delete validation FALSE on server for medium_id:'.$medium_id.'  --- Dispaly form';
		$this->load->view('templates/header', $data);
		$this->load->view('mediums/delete', $data);
		$this->load->view('templates/footer');
	
                }
	    else
                {
                $mid = $this->input->post('medium_id');
                log_message('debug', 'mediums/delete on server for medium_id:'.$medium_id);
                $this->mediums_model->delete_medium($mid);
                $this->index(); // reload Mediums list view
                }
        }
    }