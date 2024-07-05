<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Order_model');
        $this->load->model('Customer_model');
        $this->load->model('Order_item_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function index() {
        $search = $this->input->get('search');
        
        $this->load->library('pagination');

        $config['base_url'] = site_url('order/index');
        $config['total_rows'] = $this->Order_model->count_orders($search);
        $config['per_page'] = 10; // Jumlah data per halaman
        $config['uri_segment'] = 3; // Segmen URI untuk nomor halaman

        $this->pagination->initialize($config);

        $data['orders'] = $this->Order_model->get_orders($config['per_page'], $this->uri->segment(3), $search);
        $data['pagination'] = $this->pagination->create_links();
        $data['search'] = $search;

        $this->load->view('order/index', $data);
    }

    public function view($id) {
        $data['order'] = $this->Order_model->get_order_by_id($id);
        $data['order_items'] = $this->Order_item_model->get_order_items($id);

        if (empty($data['order'])) {
            show_404();
        }

        $this->load->view('order/view', $data);
    }

    public function create() {
        $data['customers'] = $this->Order_model->get_customers();

        $this->form_validation->set_rules('customer_id', 'Customer', 'required');
        $this->form_validation->set_rules('order_date', 'Order Date', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('order/create', $data);
        } else {
            $data = array(
                'customer_id' => $this->input->post('customer_id'),
                'order_date' => $this->input->post('order_date'),
                'status' => $this->input->post('status'),
                'total' => $this->input->post('total')
            );
            $this->Order_model->create_order($data);
            redirect('order');
        }
    }

    public function edit($id) {
        $data['order'] = $this->Order_model->get_order_by_id($id);
        $data['customers'] = $this->Order_model->get_customers();

        if (empty($data['order'])) {
            show_404();
        }

        $this->form_validation->set_rules('customer_id', 'Customer', 'required');
        $this->form_validation->set_rules('order_date', 'Order Date', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('total', 'Total', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('order/edit', $data);
        } else {
            $update_data = array(
                'customer_id' => $this->input->post('customer_id'),
                'order_date' => $this->input->post('order_date'),
                'status' => $this->input->post('status'),
                'total' => $this->input->post('total')
            );

            $this->Order_model->update_order($id, $update_data);
            redirect('order');
        }
    }

    public function delete($id) {
        $this->Order_model->delete_order($id);
        redirect('order');
    }
}
?>
