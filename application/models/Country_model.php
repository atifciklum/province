<?php
class Country_model extends CI_Model {

    public function get_countries() {
        $query = $this->db->get('countries');
        return $query->result_array();
    }

    public function get_country_name($country_id)
    {

        $this->db->select('country_name');
        $this->db->from('countries');
        $this->db->where('country_id', $country_id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $row = $query->row();
            return $row->country_name;
        } else {
            return false;
        }

    }

}
?>
