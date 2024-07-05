<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_categories() {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function get_category_by_id($id) {
        $query = $this->db->get_where('category', array('id' => $id));
        return $query->row_array();
    }

    public function create_category($data) {
        return $this->db->insert('category', $data);
    }

    public function update_category($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('category', $data);
    }

    public function delete_category($id) {
        $this->db->where('id', $id);
        return $this->db->delete('category');
    }
}
?>
