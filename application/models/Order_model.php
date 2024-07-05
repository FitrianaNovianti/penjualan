<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_orders($limit = 10, $start = 0, $search = '') {
        $this->db->select('orders.*, customer.nama as customer_name');
        $this->db->from('orders');
        $this->db->join('customer', 'orders.customer_id = customer.id', 'left');
        
        if (!empty($search)) {
            $this->db->like('customer.nama', $search);
            $this->db->or_like('orders.status', $search);
        }
        
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_order_by_id($id) {
        $this->db->select('orders.*, customer.nama as customer_name');
        $this->db->from('orders');
        $this->db->join('customer', 'orders.customer_id = customer.id', 'left');
        $this->db->where('orders.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function create_order($data) {
        return $this->db->insert('orders', $data);
    }

    public function update_order($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('orders', $data);
    }

    public function delete_order($id) {
        $this->db->where('id', $id);
        return $this->db->delete('orders');
    }

    public function count_orders($search = '') {
        if (!empty($search)) {
            $this->db->like('customer.nama', $search);
            $this->db->or_like('orders.status', $search);
        }
        $this->db->from('orders');
        $this->db->join('customer', 'orders.customer_id = customer.id', 'left');
        return $this->db->count_all_results();
    }

    public function get_customers() {
        $query = $this->db->get('customer');
        return $query->result_array();
    }
}
?>
