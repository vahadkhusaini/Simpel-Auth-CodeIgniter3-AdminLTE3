<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('firebase');
        $this->load->model('Master_model');
    }

    public function index()
    {
        $data = [
            'title' => 'Upload',
            'user' =>  $this->Master_model->get_data('user','id_pengguna'),
        ];

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('master/firebase/upload/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function do_upload(){
        $firebase = $this->firebase->init();

        $db = $firebase->getStorage();

        $upload_image = $_FILES['image']['name'];
            
            if($upload_image)
            { 
                $config['allowed_types']    = 'jpeg|jpg|png|pdf';
                $config['max_size']         = '5048';
                $config['upload_path']      = './assets/img/';

                $this->load->library('upload',$config);

                if($this->upload->do_upload('image'))
                {
                    $temp_foler = './assets/img/';
                    $image = $this->upload->data('file_name');

                    $file = fopen($temp_foler.$image, 'r');

                    $db->getBucket()->upload($file, ['name' => 'Challenge/' . $image]);
                    $this->session->set_flashdata('msg' ,'<div class="alert alert-success" role="alert">Gambar di tambahkan!</div>');
                    redirect('master/upload');
                }
                else
                {
                    $this->session->set_flashdata('msg','<div class="alert alert-danger" role="alert">'.'<p>Gambar</p>'.$this->upload->display_errors().'</div>');
                    
                    redirect('master/upload');
                }
            }

            if(empty($upload_image))
            {
                $this->session->set_flashdata('msg' ,'<div class="alert alert-danger" role="alert">Pilih Gambar !</div>');

                redirect('master/upload');
            }
    }
}