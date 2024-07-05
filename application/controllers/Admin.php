<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['admins'] = $this->Admin_model->get_admins();
        $this->load->view('admin/index', $data);
    }

    public function view($id) {
        $data['admin'] = $this->Admin_model->get_admin_by_id($id);
        if (empty($data['admin'])) {
            show_404();
        }
        $this->load->view('admin/view', $data);
    }

    public function create() {
        $this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[admin.email]');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/create');
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            );
            $this->Admin_model->create_admin($data);
            redirect('admin');
        }
    }

    public function edit($id) {
        $data['admin'] = $this->Admin_model->get_admin_by_id($id);

        if (empty($data['admin'])) {
            show_404();
        }

        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('status', 'Status', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('admin/edit', $data);
        } else {
            $update_data = array(
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'status' => $this->input->post('status')
            );

            $password = $this->input->post('password');
            if (!empty($password)) {
                $update_data['password'] = password_hash($password, PASSWORD_BCRYPT);
            }

            $this->Admin_model->update_admin($id, $update_data);
            redirect('admin');
        }
    }

    public function delete($id) {
        $this->Admin_model->delete_admin($id);
        redirect('admin');
    }
}
?>
