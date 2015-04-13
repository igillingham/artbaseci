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
		$this->load->model('mediums_model');
                $this->load->model('galleries_model');
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
        $data['medium_list'] = $this->mediums_model->get_mediums();
        $data['location_list'] = $this->galleries_model->get_galleries();
	    $data['title'] = 'Edit an artwork item';
	
	    //$this->form_validation->set_rules('Name', 'Title', 'required');
	    $this->form_validation->set_rules('artwork_name', 'Artwork name', 'required');
        $this->form_validation->set_rules('sbm', 'Return to list', 'required');
 
	    if ($this->form_validation->run() === FALSE)
	    {
		$this->load->view('templates/header', $data);
		$this->load->view('artworks/edit', $data);
		$this->load->view('templates/footer');
	
	    }
	    else
	    {
            $this->updatedatabase();
            redirect('/artworks'); // reload Artworks list view
	    }
	}

	public function updatedatabase()
{
        if($this->input->post('sbm') == "Update Artwork") 
            {
            $data = array(
            'id' => $this->input->post('artwork_id'),
			'name' => $this->input->post('name'),
			'medium' => $this->input->post('medium'),
			'present_location' => $this->input->post('present_location'),
			'original_payment_to_artist' => $this->input->post('original_payment_to_artist'),
            );
            log_message('debug', 'artworks/updatedatabase for artwork_id:'.$data['id']);
			$this->artworks_model->update_artwork($data);
            }
        else if ($this->input->post('sbm') == "Return to list")
            {
            redirect('/artworks');
            }
        else
            {
            echo "OOPS!!";
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
                log_message('debug', 'artworks/delete on server for artwork_id:'.$awid);
                $this->artworks_model->delete_artwork($awid);
                $this->index(); // reload Artworks list view
                }
        }
    }