<?php

class Dba 
{
    private $CI;
    public function __construct()
	{
        $this->CI = &get_instance();
        $this->CI->load->database();
	}
    
    //insert
    public function insert($table_name, $data) 
    {
        $this->CI->db->insert($table_name, $data);
        if ($this->CI->db->affected_rows() > 0) 
        {
            return true; 
        } else {
            return false; 
        }
    }
    //update
    public function update($table_name, $data, $where_condition) {
       
    
       
        $this->CI->db->where('id', $where_condition);
        $this->CI->db->update($table_name, $data);
        return $this->CI->db->affected_rows();
    }
    //delete
    public function delete($table_name , $user_id) 
    {
        $this->CI->db->where('id', $user_id);
        $this->CI->db->delete($table_name);
        return $this->CI->db->affected_rows(); 
    }


};
?>