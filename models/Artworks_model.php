<?php
class Artworks_model extends CI_Model
{
	public function __construct() 
	{
            parent::__construct();
            $this->load->database();
            //$this->load->library('rb');
	}
	
	public function get_artworks() 
	{
		$query = $this->db->get('artwork');
		return $query->result_array();
		//$query = R::findAll('artwork');
		//return $query;
	}
	
	public function get_artwork($id) 
	{
                $this->db->where('id', $id);
                $this->db->limit(1);
		$query = $this->db->get('artwork');
                return $query->result_array()[0];
		//$query = R::load('artwork', $id);
		//return $query;
	}
	
	public function update_artwork($data)
	{
            $this->db->where('id', $data['id']);
            $this->db->update('artwork', $data);

 	    return NULL;
	}
    

        public function delete_artwork($id) 
	{
            echo 'delete_artwork called: id = '.$id;
            log_message('debug', 'delete_artwork() called on artworks_model for artwork_id:'.$id);
            $this->db->where('id', $id);
            $this->db->delete('artwork'); 

            //$record = R::load('artwork', $id);
            //R::trash($record);
            //return NULL;
	}
        
}