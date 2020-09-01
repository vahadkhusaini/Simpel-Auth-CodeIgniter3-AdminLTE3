<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller 
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
            'price' => $this->input->post('Harga'),
            'name' => $this->input->post('Name'),
            'ppn' =>  $this->input->post('Ppn'),
            'barcode' => $this->input->post('Barcode'),
            'satuan' => $this->input->post('Satuan')
        ];

        $this->cart->insert($data);
        echo $this->show_cart();
    }

    public function get_order()
    {
        $id = $this->input->post('Id');

        $data['order'] = $this->Transaksi_model->get_order_detail('pemesanan_detail','id_pemesanan',$id);

        $this->cart->destroy();

        foreach($data['order'] as $od){
            $data = [
                'id' => $od['id_barang'],
                'qty' => $od['jumlah'],
                'price' => 0,
                'name' =>$od['nama_barang'],
                'ppn' => 0,
                'barcode' => $od['kode_barcode'],
                'satuan' => $od['satuan_beli']
            ];

            $this->cart->insert($data);
        }

        echo $this->show_cart();
    }

    public function show_cart()
    { 
        $output = '';
        $no = 0;
        $total_pajak = 0;

            foreach ($this->cart->contents() as $items){
                $no++;            
                $pajak = $items['ppn'];
                $output .='
                    <tr>
                        <td>'.$no.'</td>
                        <td>'.$items['barcode'].'</td>
                        <td>'.$items['name'].'</td>
                        <td>'.$items['qty'].'</td>   
                        <td>'.$items['satuan'].'</td> 
                        <td>'.number_format($items['price']).'</td>
                            <td>'.number_format($items['subtotal']).'</td>
                            <td>'.number_format($pajak).'</td>
                        <td>
                            <input type="button" 
                            data-id="'.$items['id'].'"
                            data-barcode="'.$items['barcode'].'"
                            data-name="'.$items['name'].'"
                            data-qty="'.$items['qty'].'"
                            data-satuan="'.$items['satuan'].'" 
                            data-price="'.$items['price'].'"                            
                            data-rowid="'.$items['rowid'].'" class="update-cart btn btn-info btn-xs" value="Update">
                            <input type="button" id="'.$items['rowid'].'" class="delete-cart btn btn-danger btn-xs" value="Hapus">
                        </td>
                    </tr>
                ';
                $total_pajak+=$pajak;
            }
    
            $total = $this->cart->total()+$total_pajak;
            $output .= '
                <tr>
                    <th colspan="5">Sub Total</th>
                    <th colspan="4">'.'Rp '.number_format($this->cart->total()).'</th>
                </tr>
                <tr>
                    <th colspan="5">PPN</th>
                    <th colspan="4">'.'Rp '.number_format($total_pajak).'</th>
                </tr>
                <tr>
                    <th colspan="5">Total</th>
                    <th colspan="4">'.'Rp '.number_format($total).'</th>
                </tr>
                <tr>
                    <th colspan="7"><input type="button" class="destroy-cart btn btn-danger btn-xs" value="Kosongkan data barang"></th>
                </tr>
            ';
    
        return $output;
    }

    function delete()
    { //fungsi remove To Cart
        $id = $this->input->post('Id');
            
        $this->cart->remove($id);
        echo $this->show_cart();
    }

    function update()
    {
        $id = $this->input->post('Id');
        $qty = $this->input->post('Qty');
        $price = $this->input->post('Harga');

        $data = array(
            'rowid' => $id,        
            'qty' => $qty,
            'price' => $price
            );

        $this->cart->update($data);
        echo $this->show_cart();
    }

    function update_price()
    {
        $id = $this->input->post('Id');
        $qty = $this->input->post('Qty');
        $price = $this->input->post('Harga');

        $data = array(
            'rowid' => $id,
            'price' => $price
            );

        $this->cart->update($data);
        echo $this->show_cart();
    }

    function destroy(){
        $this->cart->destroy();
        echo $this->show_cart();
    }
}