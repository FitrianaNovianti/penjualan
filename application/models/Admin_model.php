<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_admins() {
        $query = $this->db->get('admin');
        return $query->result_array();
    }

    public function get_admin_by_id($id) {
        $query = $this->db->get_where('admin', array('id' => $id));
        return $query->row_array();
    }

    public function create_admin($data) {
        return $this->db->insert('admin', $data);
    }

    public function update_admin($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('admin', $data);
    }

    public function delete_admin($id) {
        $this->db->where('id', $id);
        return $this->db->delete('admin');
    }
}
?>
