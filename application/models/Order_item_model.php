<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_item_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_order_items($order_id) {
        $this->db->select('order_items.*, buku.title as buku_title');
        $this->db->from('order_items');
        $this->db->join('buku', 'order_items.buku_id = buku.id');
        $this->db->where('order_items.order_id', $order_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function create_order_item($data) {
        return $this->db->insert('order_items', $data);
    }

    public function update_order_item($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('order_items', $data);
    }

    public function delete_order_item($id) {
        $this->db->where('id', $id);
        return $this->db->delete('order_items');
    }

    public function delete_order_items_by_order($order_id) {
        $this->db->where('order_id', $order_id);
        return $this->db->delete('order_items');
    }
}
?>
