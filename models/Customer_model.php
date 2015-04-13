<?php
class Customer_model extends CI_Model
{
	public function __construct() 
	{
            parent::__construct();
            $this->load->database();
	}
	
	public function get_customers() 
	{
		$query = $this->db->get('customer');
		return $query->result_array();
	}
	
	public function get_customer($id) 
	{
                $this->db->where('id', $id);
                $this->db->limit(1);
		$query = $this->db->get('customer');
                $res = $query->result_array();
                $ret = NULL;
                if (!empty($res))
                    {
                    $ret = $query->result_array()[0];
                    }
                return $ret;
	}

        
	public function update_customer($data)
	{
            $this->db->where('id', $data['id']);
            $this->db->update('customer', $data);

 	    return NULL;
	}
        
	public function insert_customer($customer_data_array)
	{
            $this->db->insert('customer', $customer_data_array); 

 	    return NULL;
	}


        public function delete_customer($id) 
	{
            echo 'delete_customer called: id = '.$id;
            $this->db->where('id', $id);
            $this->db->delete('customer'); 
            return NULL;
	}
        
}