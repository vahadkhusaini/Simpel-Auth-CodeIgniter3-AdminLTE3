<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cartpemesanan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Transaksi_model');
    }

    function add()
    {
        $data = [
            'id' => $this->input->post('Kode'), 
            'qty' => $this->input->post('Qty'),
            'name' => $this->input->post('Name'),
            'barcode' => $this->input->post('Barcode'),
            'satuan' => $this->input->post('Satuan'),
            'price' => 0
        ];

        $this->cart->insert($data);
        echo $this->show_cart();
    }

    public function show_cart()
    { 
        $output = '';
        $no = 0;

            foreach ($this->cart->contents() as $items) {
                $no++;            
                $output .='
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$items['barcode'].'</td>
                        <td>'.$items['name'].'</td>
                        <td>'.$items['qty'].'</td>   
                        <td>'.$items['satuan'].'</td>   
                                      
                        <td>
                            <input type="button" id="'.$items['rowid'].'" class="delete-cart btn btn-danger btn-xs" value="Hapus">
                        </td>
                    </tr>
                ';
            }
        return $output;
    }

    function delete()
    { //fungsi remove To Cart
        $id = $this->input->post('Id');
            
        $this->cart->remove($id);
        echo $this->show_cart();
    }

    function destroy(){
        $this->cart->destroy();
        echo $this->show_cart();
    }
}