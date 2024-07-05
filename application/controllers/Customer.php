
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Customer_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $data['customers'] = $this->Customer_model->get_customers();
        $this->load->view('customer/index', $data);
    }

    public function view($id) {
        $data['customer'] = $this->Customer_model->get_customer_by_id($id);
        if (empty($data['customer'])) {
            show_404();
        }
        $this->load->view('customer/view', $data);
    }

    public function create() {
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customer.email]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('customer/create');
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            );
            $this->Customer_model->create_customer($data);
            redirect('customer');
        }
    }

    public function edit($id) {
        $data['customer'] = $this->Customer_model->get_customer_by_id($id);

        if (empty($data['customer'])) {
            show_404();
        }

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('telepon', 'Telepon', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('customer/edit', $data);
        } else {
            $update_data = array(
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'alamat' => $this->input->post('alamat'),
                'telepon' => $this->input->post('telepon')
            );

            $this->Customer_model->update_customer($id, $update_data);
            redirect('customer');
        }
    }

    public function delete($id) {
        $this->Customer_model->delete_customer($id);
        redirect('customer');
    }
}
?>
