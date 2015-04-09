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
                $data = array(
		'medium' => $this->input->post('medium_name'),
                );
		$this->mediums_model->insert_medium($data);
                redirect('/mediums'); // reload Mediums list view
		//$this->load->view('mediums/success');
	    }
	}
        
    	public function edit($medium_id)
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
            //$medium_id = $this->input->post('medium_id');
            log_message('debug', 'mediums/edit on server for medium_id:'.$medium_id);
	    $data['title'] = 'Edit a medium item';
            $data['medium_info'] = $this->mediums_model->get_medium($medium_id);
	    $this->form_validation->set_rules('medium_name', 'Medium name', 'required');
            $this->form_validation->set_rules('sbm', 'Return to list', 'required');
            
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('mediums/edit', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
                $this->updatedatabase();
                redirect('/mediums'); // reload Mediums list view
	    }
	}
  
    	public function updatedatabase()
	{
            if($this->input->post('sbm') == "Update Medium") 
                {
                $data = array(
                'id' => $this->input->post('medium_id'),
		'medium' => $this->input->post('medium_name')
                );
                log_message('debug', 'mediums/updatedatabase for medium_id:'.$data['id']);
		$this->mediums_model->update_medium($data);
                //$this->index(); // reload Mediums list view
                }
            else if ($this->input->post('sbm') == "Return to list")
                {
                redirect('/mediums');
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
                redirect('/mediums'); // reload Mediums list view
                }
        }
    }