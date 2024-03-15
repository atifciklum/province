<?php
class Province_model extends CI_Model {

    public function get_provinces() {
        $query = $this->db->get('provinces');
        return $query->result_array();
    }

    public function get_provinces_by_country($country_id) {
        $this->db->where('country_id', $country_id);
        $query = $this->db->get('provinces');
        return $query->result_array();
    }


    public function get_province_name($province_id)
    {

        $this->db->select('province_name');
        $this->db->from('provinces');
        $this->db->where('province_id', $province_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->province_name;
        } else {
            return false;
        }

    }
}
?>
