<?php
class Galleries extends CI_Controller
{
	public	function __construct() 
	{
		parent::__construct();
		$this->load->library('rb');
		$this->load->library('javascript');
		//$this->load->library('jquery');
		$this->load->model('galleries_model');
	}
	
	public function index() 
	{
		$data['galleries'] = $this->galleries_model->get_galleries();
		$data['title'] = 'Galleries';
                $this->load->view('templates/header', $data);
		$this->load->view('galleries/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($gallery_id = NULL) 
	{
		$data['gallery_info'] = $this->galleries_model->get_gallery($gallery_id);

		if (empty($data['gallery_info']))
			{
		        show_404();
			}

		$data['title'] = $data['gallery_info']['gallery_name'];
	
		$this->load->view('templates/header', $data);
		$this->load->view('galleries/view', $data);
		$this->load->view('templates/footer');

	}
	
	public function create()
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Create a gallery item';

	    //$this->form_validation->set_rules('Name', 'Title', 'required');
	    $this->form_validation->set_rules('gallery_name', 'Gallery name', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('galleries/create', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
                $data = array(
		'gallery_name' => $this->input->post('gallery_name'),
  		'street' => $this->input->post('street'),
		'town' => $this->input->post('town'),
		'postcode' => $this->input->post('postcode'),
               );
		$this->galleries_model->insert_gallery($data);
                redirect('/galleries'); // reload Galleries list view
		//$this->load->view('galleries/success');
	    }
	}
        
    	public function edit($gallery_id)
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
        //$gallery_id = $this->input->post('gallery_id');
        log_message('debug', 'galleries/edit on server for gallery_id:'.$gallery_id);
	    $data['title'] = 'Edit a gallery item';
        $data['gallery_info'] = $this->galleries_model->get_gallery($gallery_id);
	    $this->form_validation->set_rules('gallery_name', 'Gallery name', 'required');
        $this->form_validation->set_rules('sbm', 'Return to list', 'required');
            
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('galleries/edit', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
                $this->updatedatabase();
                redirect('/galleries'); // reload Galleries list view
	    }
	}
  
    	public function updatedatabase()
	{
            if($this->input->post('sbm') == "Update Gallery") 
                {
                $data = array(
                'id' => $this->input->post('gallery_id'),
		'gallery_name' => $this->input->post('gallery_name'),
		'street' => $this->input->post('street'),
		'town' => $this->input->post('town'),
		'postcode' => $this->input->post('postcode'),
                );
                log_message('debug', 'galleries/updatedatabase for gallery_id:'.$data['id']);
		$this->galleries_model->update_gallery($data);
                //$this->index(); // reload Galleries list view
                }
            else if ($this->input->post('sbm') == "Return to list")
                {
                redirect('/galleries');
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
        
    public function delete($gallery_id = NULL)
        {
            $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Delete a gallery item';
            $data['gallery_id'] = $gallery_id;
            $this->form_validation->set_rules('confirm', '', 'callback_confirm_delete');
	    if ($this->form_validation->run() === FALSE)
                {
                echo 'galleries/delete validation FALSE on server for gallery_id:'.$gallery_id.'  --- Dispaly form';
		$this->load->view('templates/header', $data);
		$this->load->view('galleries/delete', $data);
		$this->load->view('templates/footer');
	
                }
	    else
                {
                $mid = $this->input->post('gallery_id');
                log_message('debug', 'galleries/delete on server for gallery_id:'.$gallery_id);
                $this->galleries_model->delete_gallery($mid);
                redirect('/galleries'); // reload Galleries list view
                }
        }
    }