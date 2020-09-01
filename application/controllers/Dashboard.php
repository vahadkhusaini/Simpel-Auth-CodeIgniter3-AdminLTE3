<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Master_model');
    }

    public function index()
    {
        $data['title']  = 'Dashboard';
        $data['pemesanan'] = $this->Master_model->get_data_count('id_pemesanan','pemesanan_header','Belum Selesai');
        $data['pembelian'] = $this->Master_model->get_data_count('id_pembelian','pembelian_header','Belum Lunas');
        $data['barang'] = $this->Master_model->get_data_count2('id_barang','barang');
        
        
        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('dashboard',$data);
        $this->load->view('_partial/footer', $data);  
    }
}