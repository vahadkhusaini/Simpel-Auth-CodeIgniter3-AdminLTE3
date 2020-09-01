<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Master_model');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {
        $data['title'] = 'Barang';
        $data['auto_kode_kategori'] = $this->Master_model->auto_kode('kategori','id_kategori','KTG');
        $data['auto_kode_barang'] = $this->Master_model->auto_kode('barang','id_barang','BRG');
        $data['barang']  = $this->Master_model->join3();
        $data['kategori']  = $this->Master_model->get_data('kategori','id_kategori');
        $data['supplier']  = $this->Master_model->get_data('supplier','id_supplier');
        
        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('master/barang/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    function show_barang()
    {
        $id =  $this->input->post('Id');
        $barang = $this->Master_model->get_barang_bySupplier($id);
        $output = '';
        $no = 0;
    
						foreach($barang as $row){
                            $no++;
                            $output .='
      						<tr class="barang" data-kode="'.$row['id_barang'].'"
      							data-barcode="'.$row['kode_barcode'].'" data-nama="'.$row['nama_barang'].'"
								data-harga="'.$row['harga_beli'].'" data-satuan="'.$row['satuan'].'">
      							<td>'.$no.'</td>
      							<td>'.$row['id_barang'].'</td>
      							<td>'.$row['nama_barang'].'</td>
      						</tr>';
                        }

        echo $output;
    }

    function get_all_data()
    {
        $barang = $this->Master_model->join3();
        echo json_encode($barang);

    }

    function get_barang_byId()
    {
        $id =  $this->input->post('Id');

        $barang = $this->Transaksi_model->get_header('barang','id_barang',$id);

        echo json_encode($barang);
        //echo json_encode($data);
    }

    function get_ktg_byId()
    {
        $id =  $this->input->post('Id');

        $ktg = $this->Master_model->get_data_byId('kategori','id_kategori',$id);

        echo json_encode($ktg);
        //echo json_encode($data);
    }

    function get_brg_bySupplier()
    {
        $id =  $this->input->post('Id');

        $brg = $this->Master_model->get_barang_bySupplier($id);

        echo json_encode($brg);
        //echo json_encode($data);
    }


    function tambah_barang()
    {
        $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|is_unique[barang.nama_barang]',
            [
                'trim'      => 'Input dengan benar',
                'is_unique'     => '%s Sudah ada!!!.'
            ]
        );

        $this->form_validation->set_rules('kode_barcode', 'Kode Barcode', 'trim|is_unique[barang.kode_barcode]',
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
                'id_barang'       => $this->input->post('id_barang'), 
                'kode_barcode'    => $this->input->post('kode_barcode'), 
                'nama_barang'     => $this->input->post('nama_barang'),
                'id_kategori'     => $this->input->post('kategori'),
                'id_supplier'     => $this->input->post('id_supplier'),
                'satuan'          => $this->input->post('satuan'), 
                'stok'            => $this->input->post('stok'),
                'harga_beli'      => $this->input->post('harga_beli')
            ];
    
            $this->Master_model->tambah_data('barang',$data);
    
            $output['status'] = 200;
            $output['message'] = 'Data berhasil disimpan';           
            $output['auto_kode'] = $this->Master_model->auto_kode('barang','id_barang','BRG');
            echo json_encode($output);
        }
    }

    function edit_barang()
    {
        $id =  $this->input->post('id_barang');
        $barang =  $this->Master_model->get_data_byId('barang','id_barang',$id);
        $cek_brg = $this->Master_model->get_data('barang','id_barang');
        $kode_barcode =  $this->input->post('kode_barcode');
        $nama_barang = $this->input->post('nama_barang');

        if($nama_barang === $barang['nama_barang'] || $kode_barcode === $barang['kode_barcode'])
        {
            $this->form_validation->set_rules('nama_barang', 'Nama Barang','trim',
            [
                'trim'      => 'Input dengan benar'
            ]
        );

        $this->form_validation->set_rules('kode_barcode', 'Kode Barcode','trim',
            [
                'trim'      => 'Input dengan benar'
            ]
        );

        }else
        {
            $this->form_validation->set_rules('nama_barang', 'Nama Barang', 'trim|is_unique[barang.nama_barang]',
                [
                    'trim'      => 'Input dengan benar',
                    'is_unique'     => '%s Sudah ada!!!.'
                ]
            );
    
            $this->form_validation->set_rules('kode_barcode', 'Kode Barcode', 'trim|is_unique[barang.kode_barcode]',
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
            $id = $this->input->post('id_barang');  
            
            $data = [
                'kode_barcode'    => $this->input->post('kode_barcode'), 
                'nama_barang'     => $this->input->post('nama_barang'),
                'id_kategori'     => $this->input->post('kategori'),                
                'id_supplier'     => $this->input->post('id_supplier'),
                'satuan'          => $this->input->post('satuan'), 
                'stok'            => $this->input->post('stok'),
                'harga_beli'      => $this->input->post('harga_beli')
            ];
    
            $this->Master_model->edit_data('barang','id_barang',$id,$data);
    
            $output['status'] = 200;          
            $output['message'] = $barang['nama_barang'];
            echo json_encode($output);
        }
    }

    function edit_kategori()
    {
        $id =  $this->input->post('id_kategori');
        $data['ktgri'] = $this->Master_model->get_data_byId('kategori','id_kategori',$id);
        $nama_ktgri =  $this->input->post('nama_kategori');

        if($nama_ktgri == $data['ktgri']['nama_kategori']){
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim',
                [
                    'trim'      => 'Input dengan benar'
                ]
            );

        }else{
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|is_unique[kategori.nama_kategori]',
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
            $id = $this->input->post('id_kategori');

            $data = [
                'nama_kategori'     => $this->input->post('nama_kategori')
            ];
    
            $this->Master_model->edit_data('kategori','id_kategori',$id,$data);
    
            $output['status'] = 200;
            $output['message'] = 'Data berhasil disimpan';
            echo json_encode($output);
        }
    }

    function tambah_kategori()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|is_unique[kategori.nama_kategori]',
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
                'id_kategori'     => $this->input->post('id_kategori'), 
                'nama_kategori'     => $this->input->post('nama_kategori')
            ];
    
            $this->Master_model->tambah_data('kategori',$data);
    
            $output['status'] = 200;
            $output['message'] = 'Data berhasil disimpan';
            echo json_encode($output);
        }
    
    }

    function hapus()
    {   
        $id =  $this->input->post('Id');

        $data['barang'] = $this->Master_model->get_data_byId('pemesanan_detail','id_barang', $id);
       
        if($data['barang']['id_barang'] == NULL )
            {
                $this->Master_model->hapus_data('barang','id_barang',$id);
                $output['status'] = 200;
                $output['message'] = 'Data berhasil dihapus';
                echo json_encode($output);                            
            }else{
                $output['status'] = 201;
                $output['message'] = 'Data sudah terhubung, tidak bisa dihapus!!!';
                echo json_encode($output);              
            }
    }

    function hapus_kategori()
    {   
       $id =  $this->input->post('Id');

       $data['kategori'] = $this->Master_model->get_data_byId('barang','id_kategori', $id);
       

        if($data['kategori']['id_kategori'] == NULL )
            {
                $this->Master_model->hapus_data('kategori','id_kategori',$id);
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