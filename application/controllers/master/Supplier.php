<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller 
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
        $data['title'] = 'Supplier';
        $data['auto_kode_supplier'] = $this->Master_model->auto_kode('supplier','id_supplier','SPL');
        $data['supplier']  = $this->Master_model->get_data('supplier','id_supplier');

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('master/supplier/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    function get_supplier_byId()
    {
        $id =  $this->input->post('Id');

        $spl = $this->Master_model->get_data_byId('supplier','id_supplier',$id);

        echo json_encode($spl);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|is_unique[supplier.nama_supplier]',
            [
                'trim'      => 'Input dengan benar',
                'is_unique'     => '%s Sudah ada!!!.'
            ]
        );

        if($this->form_validation->run() == false)
        {
            $output['status'] = 201;
            $output['message'] = validation_errors(); 
            echo json_encode($output);
        }else
        {
            $data = [
                'id_supplier'    => $this->input->post('id_supplier'), 
                'nama_supplier'  => $this->input->post('nama_supplier'), 
                'no_telepon'     => $this->input->post('no_telepon'),
                'alamat'         => $this->input->post('alamat')
            ];
    
            $this->Master_model->tambah_data('supplier',$data);
    
            $output['status'] = 200;
            $output['message'] = 'Data berhasil disimpan';
            echo json_encode($output);
        }
    }

    function edit()
    {
        $id =  $this->input->post('id_supplier');

        $data['spl'] = $this->Master_model->get_data_byId('supplier','id_supplier',$id);

        if($this->input->post('nama_supplier') == $data['spl']['nama_supplier'])
        {
            $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim',
                [
                    'trim'      => 'Input dengan benar'
                ]
            );
        }else{
            $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'trim|is_unique[supplier.nama_supplier]',
                [
                    'trim'      => 'Input dengan benar',
                    'is_unique'     => '%s Sudah ada!!!.'
                ]
            );
        }

            if($this->form_validation->run() == false)
            {
                $output['status'] = 201;
                $output['message'] = validation_errors(); 
                echo json_encode($output);
            }else
            {
                $id = $this->input->post('id_supplier');

                $data = [
                    'nama_supplier'  => $this->input->post('nama_supplier'), 
                    'no_telepon'     => $this->input->post('no_telepon'),
                    'alamat'         => $this->input->post('alamat')
                ];

                $this->Master_model->edit_data('supplier','id_supplier',$id,$data);
                
                $output['status'] = 200;
                $output['message'] = 'Data berhasil diedit';
                echo json_encode($output);
            }
    }

    function hapus()
    {   
        $id =  $this->input->post('Id');

        $data['supplier'] = $this->Master_model->get_data_byId('pemesanan_header','id_supplier', $id);
       

        if($data['supplier']['id_supplier'] == NULL )
            {
                $this->Master_model->hapus_data('supplier','id_supplier',$id);
                $output['status'] = 200;
                $output['message'] = 'Data berhasil dihapus';
                echo json_encode($output);                            
            }else{
                $output['status'] = 201;
                $output['message'] = 'Data sudah terhubung, tidak bisa dihapus!!!';
                echo json_encode($output);              
            }
    }

}