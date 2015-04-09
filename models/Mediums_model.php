<?php
class Mediums_model extends CI_Model
{
	public function __construct() 
	{
            parent::__construct();
            $this->load->database();
            //$this->load->library('rb');
	}
	
	public function get_mediums() 
	{
		$query = $this->db->get('medium');
		return $query->result_array();
	}
	
	public function get_medium($id) 
	{
                $this->db->where('id', $id);
                $this->db->limit(1);
		$query = $this->db->get('medium');
                $res = $query->result_array();
                //var_dump($query->result_array());
                $ret = NULL;
                if (!empty($res))
                    {
                    $ret = $query->result_array()[0];
                    }
                return $ret;

	}
	
	public function update_medium($data)
	{
            $this->db->where('id', $data['id']);
            $this->db->update('medium', $data); 

 	    return NULL;
	}
	public function insert_medium($medium_data_array)
	{
            $this->db->insert('medium', $medium_data_array); 

 	    return NULL;
	}

        public function delete_medium($id) 
	{
            echo 'delete_medium called: id = '.$id;
            $this->db->where('id', $id);
            $this->db->delete('medium'); 
                
            //$record = R::load('medium', $id);
            //R::trash($record);
		return NULL;
	}
        
}