<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        if($this->session->userdata('name'))
        {
            redirect('dashboard');
        }
        else
        {
            $this->form_validation->set_rules('username' ,'User Name' , 'trim|required');
            $this->form_validation->set_rules('password' ,'Password' , 'trim|required');
            
            if($this->form_validation->run() == false)
            {
                $data['title'] = 'Login Page';
                $this->load->view('auth/login' , $data);
            }
            else
            {
                //validasi sukses
                $this->_login();
            }       
        }
    }

    public function _login()
    {
        $username = htmlspecialchars($this->input->post('username'),TRUE);
        $password = htmlspecialchars($this->input->post('password'),TRUE);
        $user = $this->db->get_where('user',['nama_pengguna' => $username])->row_array();

         //user ada
        if($user){
                //cek password
                if(password_verify($password, $user['password']))
                {
                    $data = [
                        'id' => $user['id_pengguna'],
                        'name' => $user['nama_pengguna'],
                        'status' => $user['status']
                    ];
                    
                    $this->session->set_userdata($data);

                   // activity_log("login ke dalam sistem"," ");

                    $output['error'] = false;
                    echo json_encode($output);
                }
                else
                {
                    $output['error'] = true;
			        $output['message'] = 'Password/Username salah';
                    echo json_encode($output);
                    
                }
        }
        else
        {
            $output['error'] = true;
            
			$output['message'] = 'Akun Tidak Terdaftar';
            echo json_encode($output);
        }
    }

    public function logout()
    {
        //activity_log("keluar dari sistem (Log Out)"," ");
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role_id');
       // $this->cart->destroy();
        $this->session->set_flashdata('msg' ,'<div class="alert alert-success" role="alert">Anda telah logout</div>');

        redirect('auth');
    }

    public function blocked()
    {
        $data['title'] = 'Access Forbidden';
        $this->load->view('templates/header',$data);
        $this->load->view('auth/blocked');
        $this->load->view('templates/footer');
    }
}