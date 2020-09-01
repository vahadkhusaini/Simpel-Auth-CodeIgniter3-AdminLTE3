<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Master_model');
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
                //cek status pengguna
                if($user['status'] == 0)
                {
                    $output['error'] = true;
                    $output['message'] = 'Pengguna Tidak Aktif';
                    echo json_encode($output);

                }
                elseif(password_verify($password, $user['password']))
                {
                    $data = [
                        'id' => $user['id_pengguna'],
                        'username' => $user['nama_pengguna'],
                        'name' => $user['nama_lengkap'],                        
                        'status' => $user['status'],
                        'hak_akses' => $user['hak_akses']
                    ];
                    
                    $this->session->set_userdata($data);

                   // activity_log("login ke dalam sistem"," ");

                    $output['error'] = false;
                    echo json_encode($output);

                }else
                {
                    $output['error'] = true;
			        $output['message'] = 'Password/Username salah';
                    echo json_encode($output);                  
                }
        }else
        {
            $output['error'] = true;           
			$output['message'] = 'Akun Tidak Terdaftar';
            echo json_encode($output);
        }
    }


    public function edit_profile(){
            $id = $this->input->post('id');

            $this->Master_model->edit_data('user','id_pengguna',$id,
            $data = [                               
                'nama_pengguna'     => $this->input->post('username'),
                'nama_lengkap'     => $this->input->post('name')
            ]);
            
            $this->session->unset_userdata('id');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('name');

            $output['error'] = false;
			$output['message'] = 'Profile telah diupdate, silahkan login kembali';
            echo json_encode($output);
    }

    public function change_password(){
        $data['user'] = $this->db->get_where('user',['id_pengguna' => $this->session->userdata('id')])->row_array();
        $current_pass = $this->input->post('oldpass');
        $new_pass = $this->input->post('newpass');

        if(!password_verify($current_pass, $data['user']['password'])){
            $output['error'] = true;
            
			$output['message'] = 'Password lama tidak cocok!';
            echo json_encode($output);

        }else{
            if($current_pass == $new_pass){

                $output['error'] = true;
            
                $output['message'] = 'Password baru tidak boleh sama dengan password lama!';
                echo json_encode($output);
            }else{
                $pass_hash = password_hash($new_pass, PASSWORD_DEFAULT);

                $this->db->set('password', $pass_hash);
                $this->db->where('id_pengguna', $this->session->userdata('id'));
                $this->db->update('user');

                $this->session->unset_userdata('id');
                $this->session->unset_userdata('username');
                $this->session->unset_userdata('name');

                $output['error'] = false;
                $output['message'] = 'Password telah diganti, silahkan login kembali';
                echo json_encode($output);
            }
        }

            
    }

    public function logout()
    {
        //activity_log("keluar dari sistem (Log Out)"," ");
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('name');
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