<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_Model {
    public function __construct() {
        $this->load->database();
    }

    public function get_buku($limit = 10, $start = 0, $search = '') {
        $this->db->select('buku.*, category.name as category_name');
        $this->db->from('buku');
        $this->db->join('category', 'buku.category = category.id', 'left');
        
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('author', $search);
            $this->db->or_like('publisher', $search);
            $this->db->or_like('category_name', $search);
        }
        
        $this->db->limit($limit, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_buku_by_id($id) {
        $this->db->select('buku.*, category.name as category_name');
        $this->db->from('buku');
        $this->db->join('category', 'buku.category = category.id', 'left');
        $this->db->where('buku.id', $id);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function create_buku($data) {
        return $this->db->insert('buku', $data);
    }
    public function get_buku_with_category() {
        $this->db->select('buku.*, category.name as category_name');
        $this->db->from('buku');
        $this->db->join('category', 'buku.category_id = category.id');
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function update_buku($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('buku', $data);
    }

    public function delete_buku($id) {
        $this->db->where('id', $id);
        return $this->db->delete('buku');
    }

    public function count_buku($search = '') {
        if (!empty($search)) {
            $this->db->like('title', $search);
            $this->db->or_like('author', $search);
            $this->db->or_like('publisher', $search);
            $this->db->or_like('category_name', $search);
        }
        $this->db->from('buku');
        $this->db->join('category', 'buku.category = category.id', 'left');
        return $this->db->count_all_results();
    }       

    public function get_categories() {
        $query = $this->db->get('category');
        return $query->result_array();
    }
}
?>
