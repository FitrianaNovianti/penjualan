<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Customer_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_customers() {
        $query = $this->db->get('customer');
        return $query->result_array();
    }

    public function get_customer_by_id($id) {
        $query = $this->db->get_where('customer', array('id' => $id));
        return $query->row_array();
    }

    public function create_customer($data) {
        return $this->db->insert('customer', $data);
    }

    public function update_customer($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('customer', $data);
    }

    public function delete_customer($id) {
        $this->db->where('id', $id);
        return $this->db->delete('customer');
    }
}
?>
