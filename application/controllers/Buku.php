<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Buku_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $search = $this->input->get('search');
        
        $this->load->library('pagination');

        $config['base_url'] = site_url('buku/index');
        $config['total_rows'] = $this->Buku_model->count_buku($search);
        $config['per_page'] = 10; // Jumlah data per halaman
        $config['uri_segment'] = 3; // Segmen URI untuk nomor halaman

        $this->pagination->initialize($config);

        $data['buku'] = $this->Buku_model->get_buku($config['per_page'], $this->uri->segment(3), $search);
        $data['pagination'] = $this->pagination->create_links();
        $data['search'] = $search;

        $this->load->view('buku/index', $data);
    }

    public function view($id) {
        $data['buku'] = $this->Buku_model->get_buku_by_id($id);
        if (empty($data['buku'])) {
            show_404();
        }
        $this->load->view('buku/view', $data);
    }

    public function create() {
        $data['categories'] = $this->Buku_model->get_categories();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('buku/create', $data);
        } else {
            $data = array(
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'publisher' => $this->input->post('publisher'),
                'category' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock')
            );
            $this->Buku_model->create_buku($data);
            redirect('buku');
        }
    }

    public function edit($id) {
        $data['buku'] = $this->Buku_model->get_buku_by_id($id);
        $data['categories'] = $this->Buku_model->get_categories();

        if (empty($data['buku'])) {
            show_404();
        }

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('author', 'Author', 'required');
        $this->form_validation->set_rules('publisher', 'Publisher', 'required');
        $this->form_validation->set_rules('category', 'Category', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');
        $this->form_validation->set_rules('stock', 'Stock', 'required|integer');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('buku/edit', $data);
        } else {
            $update_data = array(
                'title' => $this->input->post('title'),
                'author' => $this->input->post('author'),
                'publisher' => $this->input->post('publisher'),
                'category' => $this->input->post('category'),
                'price' => $this->input->post('price'),
                'stock' => $this->input->post('stock')
            );

            $this->Buku_model->update_buku($id, $update_data);
            redirect('buku');
        }
    }

    public function delete($id) {
        $this->Buku_model->delete_buku($id);
        redirect('buku');
    }
}
?>
