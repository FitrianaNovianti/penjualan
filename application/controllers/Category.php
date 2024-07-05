<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Category_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['categories'] = $this->Category_model->get_categories();
        $this->load->view('category/index', $data);
    }

    public function view($id) {
        $data['category'] = $this->Category_model->get_category_by_id($id);
        if (empty($data['category'])) {
            show_404();
        }
        $this->load->view('category/view', $data);
    }

    public function create() {
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[category.name]');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('category/create');
        } else {
            $data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            );
            $this->Category_model->create_category($data);
            redirect('category');
        }
    }

    public function edit($id) {
        $data['category'] = $this->Category_model->get_category_by_id($id);

        if (empty($data['category'])) {
            show_404();
        }

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('category/edit', $data);
        } else {
            $update_data = array(
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description'),
                'status' => $this->input->post('status')
            );

            $this->Category_model->update_category($id, $update_data);
            redirect('category');
        }
    }

    public function delete($id) {
        $this->Category_model->delete_category($id);
        redirect('category');
    }
}
?>
