<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_item extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Order_item_model');
        $this->load->model('Order_model');
        $this->load->model('Buku_model');
        $this->load->helper('form');
        $this->load->library('form_validation');
    }

    public function create($order_id) {
        $data['order'] = $this->Order_model->get_order_by_id($order_id);
        $data['buku'] = $this->Buku_model->get_buku();

        $this->form_validation->set_rules('buku_id', 'Buku', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('order_item/create', $data);
        } else {
            $item_data = array(
                'order_id' => $order_id,
                'buku_id' => $this->input->post('buku_id'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price')
            );
            $this->Order_item_model->create_order_item($item_data);
            redirect('order/view/'.$order_id);
        }
    }

    public function edit($id) {
        $data['order_item'] = $this->Order_item_model->get_order_items($id);
        $data['buku'] = $this->Buku_model->get_buku();

        if (empty($data['order_item'])) {
            show_404();
        }

        $this->form_validation->set_rules('buku_id', 'Buku', 'required');
        $this->form_validation->set_rules('quantity', 'Quantity', 'required|integer');
        $this->form_validation->set_rules('price', 'Price', 'required|numeric');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('order_item/edit', $data);
        } else {
            $item_data = array(
                'buku_id' => $this->input->post('buku_id'),
                'quantity' => $this->input->post('quantity'),
                'price' => $this->input->post('price')
            );

            $this->Order_item_model->update_order_item($id, $item_data);
            redirect('order/view/'.$data['order_item']['order_id']);
        }
    }

    public function delete($id) {
        $order_item = $this->Order_item_model->get_order_items($id);
        if (empty($order_item)) {
            show_404();
        }

        $this->Order_item_model->delete_order_item($id);
        redirect('order/view/'.$order_item['order_id']);
    }
    
        public function view($id) {
            $data['order'] = $this->Order_model->get_order_by_id($id);
            $data['order_items'] = $this->Order_item_model->get_order_items($id);
    
            if (empty($data['order'])) {
                show_404();
            }
    
            $this->load->view('order/view', $data);
    }   
}   
?>
