<?php
class Home_model extends CI_Model {

    public function add_citizen($citizen_data)
    {
        $this->db->insert('province_data', $citizen_data);
        if ($this->db->affected_rows() > 0) {
            return true; 
        } else {
            return false; 
        }
    }
    public function update_citizen($citizen_id , $data)
    {

        $this->db->where('ID', $citizen_id);
        $this->db->update('province_data', $data);
        return $this->db->affected_rows(); 

    }

    public function delete_citizen($citizen_id) {
        $this->db->where('id', $citizen_id);
        $this->db->delete('province_data');
        return $this->db->affected_rows();
    }

    public function get_allcitizens()
    {
        $query = $this->db->get('province_data');
        return $query->result_array();
    }

    public function getcitizenById($citizenId) {
        $this->db->where('ID', $citizenId);
        $query = $this->db->get('province_data');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

 
}
?>