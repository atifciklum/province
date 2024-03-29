<?php
class Home_model extends CI_Model {

    public function add_citizen($citizen_data)
    {
        $this->dba->insert('province_data',$citizen_data);
     
    }
    public function update_citizen($citizen_id , $data)
    {

        $this->dba->update('province_data', $data, $citizen_id);

    }

    public function delete_citizen($citizen_id) 
    {
        $this->dba->delete('province_data',$citizen_id);
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