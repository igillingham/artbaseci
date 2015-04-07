<?php
class Artworks_model extends CI_Model
{
	public function __construct() 
	{
            parent::__construct();
            //$this->load->database();
            $this->load->library('rb');
	}
	
	public function get_artworks() 
	{
		//$query = $this->db->get('artwork');
		//return $query->result_array();
		$query = R::findAll('artwork');
		return $query;
	}
	
	public function get_artwork($id) 
	{
		$query = R::load('artwork', $id);
		return $query;
	}
	
	public function set_artwork()
	{
	    $this->load->helper('url');
	
	    $data = array(
		'artwork' => $this->input->post('artwork_name'),
	    );
	
            if ($this->rb->findOne( 'artwork', ' name = ? ', [ $data['artwork'] ] ) == NULL)
                {
                $record = $this->rb->dispense('artwork');
                $record->name = $data['artwork'];
                
                $this->rb->store( $record );
                }
	    
	    return NULL;
	}

        public function delete_artwork($id) 
	{
                echo 'delete_artwork called: id = '.$id;
		$record = R::load('artwork', $id);
		R::trash($record);
		return NULL;
	}
        
}