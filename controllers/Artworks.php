<?php
class Artworks extends CI_Controller
{
	public	function __construct() 
	{
		parent::__construct();
		$this->load->library('rb');
		$this->load->library('javascript');
		//$this->load->library('jquery');
		$this->load->model('artworks_model');
	}
	
	public function index() 
	{
		$data['artworks'] = $this->artworks_model->get_artworks();
		$data['title'] = 'Artworks';
                $this->load->view('templates/header', $data);
		$this->load->view('artworks/index', $data);
		$this->load->view('templates/footer');
	}
	
	public function view($artwork_id = NULL) 
	{
		$data['artwork_info'] = $this->artworks_model->get_artwork($artwork_id);
		echo 'index: ';
		if (empty($data['artwork_info']))
			{
		        show_404();
			}

		$data['title'] = $data['artwork_info']['name'];
	
		$this->load->view('templates/header', $data);
		$this->load->view('artworks/view', $data);
		$this->load->view('templates/footer');

	}
	
	public function edit($artwork_id = NULL)
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
            $data['artwork_info'] = $this->artworks_model->get_artwork($artwork_id);
	    $data['title'] = 'Edit an artwork item';
	
	    //$this->form_validation->set_rules('Name', 'Title', 'required');
	    $this->form_validation->set_rules('artwork_name', 'Artwork name', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('artworks/edit', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
		$this->artworks_model->set_artwork();
                $this->index(); // reload Artworks list view
	    }
	}

	public function create()
	{
	    $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Create an arwork item';
	
	    //$this->form_validation->set_rules('Name', 'Title', 'required');
	    $this->form_validation->set_rules('artwork_name', 'Artwork name', 'required');
	
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('artworks/create', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
		$this->artworks_model->set_artwork();
                $this->index(); // reload Artworks list view
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
        
    public function delete($artwork_id = NULL)
        {
            $this->load->helper('form');
	    $this->load->library('form_validation');
	
	    $data['title'] = 'Delete an artwork item';
            $data['artwork_id'] = $artwork_id;
            $this->form_validation->set_rules('confirm', '', 'callback_confirm_delete');
	    if ($this->form_validation->run() === FALSE)
                {
                echo 'artworks/delete validation FALSE on server for artwork_id:'.$artwork_id.'  --- Dispaly form';
		$this->load->view('templates/header', $data);
		$this->load->view('artworks/delete', $data);
		$this->load->view('templates/footer');
	
                }
	    else
                {
                $awid = $this->input->post('artwork_id');
                log_message('debug', 'artworks/delete on server for artwork_id:'.$artwork_id);
                $this->artworks_model->delete_artwork($awid);
                $this->index(); // reload Artworks list view
                }
        }
    }