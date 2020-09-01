<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stok extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Master_model');
        $this->load->library('pdf');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {      
        $data['title'] = 'Stok Pembelian';
        $data['trans'] = $this->Transaksi_model->get_stok();

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('laporan/stok/index',$data);
        $this->load->view('_partial/footer', $data);
    }
}