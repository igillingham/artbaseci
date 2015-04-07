<?php
class Mediums_model extends CI_Model
{
	public function __construct() 
	{
            parent::__construct();
            //$this->load->database();
            $this->load->library('rb');
	}
	
	public function get_mediums() 
	{
		//$query = $this->db->get('medium');
		//return $query->result_array();
		$query = R::findAll('medium');
		return $query;
	}
	
	public function get_medium($id) 
	{
		$query = R::load('medium', $id);
		return $query;
	}
	
	public function set_medium()
	{
	    $this->load->helper('url');
	
	    $data = array(
		'medium' => $this->input->post('medium_name'),
	    );
	
            if ($this->rb->findOne( 'medium', ' medium = ? ', [ $data['medium'] ] ) == NULL)
                {
                $record = $this->rb->dispense('medium');
                $record->medium = $data['medium'];
                
                $this->rb->store( $record );
                }
	    
	    return NULL;
	}

        public function delete_medium($id) 
	{
                echo 'delete_medium called: id = '.$id;
		$record = R::load('medium', $id);
		R::trash($record);
		return NULL;
	}
        
}