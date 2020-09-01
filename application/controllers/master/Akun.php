<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller 
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
        $data['title'] = 'Akun';
        $data['akun']  = $this->Master_model->get_data('akun','id_akun');

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('master/akun/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    function get_akun_byId()
    {
        $id =  $this->input->post('Id');

        $akun = $this->Master_model->get_data_byId('akun','id_akun',$id);

        echo json_encode($akun);
        //echo json_encode($data);
    }

    function tambah()
    {
        $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'trim|is_unique[akun.nama_akun]',
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
            $id_akun = $this->input->post('id_akun');
    
            $data = [
                'id_akun'       => $id_akun,
                'nama_akun'     => $this->input->post('nama_akun')
            ];
    
            $this->Master_model->tambah_data('akun',$data);
    
            $output['status'] = 200;
            $output['message'] = 'Data berhasil disimpan';
            echo json_encode($output);
        }

    }

    function edit()
    {
        $id =  $this->input->post('id_akun');

        $data['ak'] = $this->Master_model->get_data_byId('akun','id_akun', $id);
        $data['akun'] = $this->Master_model->get_data_byId('jurnal_detail','id_akun', $id);

        $id_akun = $this->input->post('id_akun');
        $nama_akun = $this->input->post('nama_akun');

        if($nama_akun == $data['ak']['nama_akun'] || $id_akun == $data['ak']['id_akun'])
        {
            $this->form_validation->set_rules('nama_akun', 'Nama Akun','trim',
                [
                    'trim' => 'Input dengan benar'
                ]
            );

            $this->form_validation->set_rules('id_akun', 'Kode Akun','trim',
                [
                    'trim' => 'Input dengan benar'
                ]
            );
        }else
        {
            $this->form_validation->set_rules('nama_akun', 'Nama Akun', 'trim|is_unique[akun.nama_akun]',
                [
                    'trim'      => 'Input dengan benar',
                    'is_unique'     => '%s Sudah ada!!!'
                ]
            );

            $this->form_validation->set_rules('id_akun', 'Kode Akun', 'trim|is_unique[akun.id_akun]',
                [
                    'trim'      => 'Input dengan benar',
                    'is_unique'     => '%s Sudah ada!!!'
                ]
            );
        }

        if($this->form_validation->run() == false)
        {
            $output['status'] = 201;
            $output['message'] = validation_errors(); 
            echo json_encode($output);

        }else{
            $id = $this->input->post('id_akun');
    
            $data = [
                'id_akun'       => $id,
                'nama_akun'     => $this->input->post('nama_akun')
            ];
    
            $this->Master_model->edit_data('akun','id_akun',$id,$data);
    
            $output['status'] = 200;
            $output['message'] = 'Data berhasil diedit';
            echo json_encode($output);
        }
    }

    function hapus()
    {   
        $id =  $this->input->post('Id');
        $data['akun'] = $this->Master_model->get_data_byId('jurnal_detail','id_akun', $id);

        if($data['akun']['id_akun'] == NULL)
            {
                $this->Master_model->hapus_data('akun','id_akun',$id);
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