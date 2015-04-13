<?php
class Galleries_model extends CI_Model
{
	public function __construct() 
	{
            parent::__construct();
            $this->load->database();
	}
	
	public function get_galleries() 
	{
		$query = $this->db->get('gallery');
		return $query->result_array();
	}
	
	public function get_gallery($id) 
	{
                $this->db->where('id', $id);
                $this->db->limit(1);
		$query = $this->db->get('gallery');
                $res = $query->result_array();
                $ret = NULL;
                if (!empty($res))
                    {
                    $ret = $query->result_array()[0];
                    }
                return $ret;
	}

        
	public function update_gallery($data)
	{
            $this->db->where('id', $data['id']);
            $this->db->update('gallery', $data);

 	    return NULL;
	}
        
	public function insert_gallery($gallery_data_array)
	{
            $this->db->insert('gallery', $gallery_data_array); 

 	    return NULL;
	}


        public function delete_gallery($id) 
	{
            echo 'delete_gallery called: id = '.$id;
            $this->db->where('id', $id);
            $this->db->delete('gallery'); 
            return NULL;
	}
        
}