<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retur extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('pdf');
        $this->load->model('Master_model');
        $this->load->model('Transaksi_model');
        
    }

    public function index()
    {
        $data['title'] = 'Retur Pembelian';
        $data['trans'] = $this->Transaksi_model->get_retur();

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/retur/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function tambah()
    {
        $tanggal =  date('mdyH');

        $data = [
            'title'     => 'Retur Pembelian',
            'auto_kode' => $this->Master_model->auto_kode('retur_pembelian_header','id_retur_pembelian','RTP'.$tanggal),
            'trans'     => $this->Transaksi_model->get_data_transaction_where('pembelian_header','pembelian_detail','id_pembelian','tanggal_pembelian','"belum lunas"'),
            'supplier'  => $this->Master_model->get_data('supplier','id_supplier'),
            'barang'    => $this->Master_model->get_data('barang','id_barang')
        ];

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/retur/tambah',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function cek_stok()
    {
        $id_barang = $this->input->post('Kode');

        $data['barang'] = $this->Master_model->get_data_byId('barang','id_barang', $id_barang);
        $output['stok'] = $data['barang']['stok'];
            
        echo json_encode($output);
    }

    public function simpan()
    {
        $tanggal = $this->input->post('tanggal');
        $data_header = [
            'id_retur_pembelian' => $this->input->post('no_retur'),
            'no_nota' => $this->input->post('no_nota'),
            'id_supplier' => $this->input->post('id_supplier'),
            'tanggal' => date('Y-m-d', strtotime($tanggal))           
        ];

        $this->Master_model->tambah_data('retur_pembelian_header',$data_header);

        foreach ($this->cart->contents() as $items) {
           
                $data = [
                    'no_nota' => $this->input->post('no_nota'),
                    'id_barang' => $items['id'],
                    'harga_beli' => $items['price'],
                    'jumlah' => $items['qty'],
                    'ppn' => $items['ppn']
                ];
                
                $this->Master_model->tambah_data('retur_pembelian_detail',$data);

                $this->cart->destroy();
                $output['status'] = 200;
                $output['message'] = 'data berhasil disimpan';
                
                echo json_encode($output);
        } 
    }

    public function cetak($id = NULL){
        $data['po'] = $this->Transaksi_model->get_header('retur_pembelian_header','id_retur_pembelian',$id);
        $data['detail'] = $this->Transaksi_model->get_order_detail('retur_pembelian_detail','no_nota',$data['po']['no_nota']);
        
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 20);    
        
        $pdf->Cell(65 ,20,'',0,0);
        $pdf->Cell(59 ,5,'RETUR PEMBELIAN',0,0);
        $pdf->Cell(59 ,20,'',0,1);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(25, 0, 'No Retur', 0, 0, 'L');
        $pdf->Cell(5, 0, ':', 0, 0, 'L');
        $pdf->Cell(85, 0, $data['po']['id_retur_pembelian'],0 ,0, 'L');

        $pdf->Cell(30, 0, 'Nama Supplier', 0, 0, 'L');
        $pdf->Cell(5, 0, ':', 0, 0, 'L');
        $pdf->Cell(30, 0, $data['po']['nama_supplier'], 0, 0, 'L');
        $pdf->Ln();

        $pdf->Cell(25, 15, 'Tanggal', 0, 0, 'L');
        $pdf->Cell(5, 15, ':', 0, 0, 'L');
        $pdf->Cell(85, 15, date('d M Y', strtotime($data['po']['tanggal'])), 0, 0, 'L');
        
        $pdf->Cell(30, 15, 'Alamat', 0, 0, 'L');
        $pdf->Cell(5, 15, ':', 0, 0, 'L');
        $pdf->Cell(30, 15, $data['po']['alamat'], 0);
        $pdf->Ln();

        $pdf->Cell(25, 0, 'No Nota/ref', 0, 0, 'L');
        $pdf->Cell(5, 0, ':', 0, 0, 'L');
        $pdf->Cell(115, 0, $data['po']['no_nota'], 0, 0, 'L');

        $pdf->Cell(45 , 5, '', 0, 0, 'C');
        $pdf->Ln();

        $pdf->SetFont('Arial','B',10);
        /*Heading Of the table*/
        $pdf->Cell(10 ,8,'No',1,0,'C');
        $pdf->Cell(25 ,8,'Kode Barang',1,0,'C');
        $pdf->Cell(70 ,8,'Nama Barang',1,0,'C');
        $pdf->Cell(15 ,8,'Qty',1,0,'C');
        $pdf->Cell(25 ,8,'Unit Price',1,0,'C');
        $pdf->Cell(20 ,8,'PPN (10%)',1,0,'C');
        $pdf->Cell(25 ,8,'Total',1,1,'C');/*end of line*/
        /*Heading Of the table end*/
        $pdf->SetFont('Arial','',10);
        $no = 1;
        $subtotal = 0;
        $total_ppn = 0;
            foreach ($data['detail'] as $d) {
                $total = $d['jumlah']*$d['harga_beli'];
                $pdf->Cell(10 ,8,$no,1,0,'C');
                $pdf->Cell(25 ,8,$d['id_barang'],1,0);
                $pdf->Cell(70 ,8,$d['nama_barang'],1,0);
                $pdf->Cell(15 ,8,$d['jumlah'],1,0,'R');
                $pdf->Cell(25 ,8,'Rp '.number_format($d['harga_beli'], 0, '', '.'),1,0,'R');
                $pdf->Cell(20 ,8,'Rp '.number_format($d['ppn'], 0, '', '.'),1,0,'R');
                $pdf->Cell(25 ,8,'Rp '.number_format($total, 0, '', '.') ,1,1,'R');
            $no++;
            $subtotal += $total;
            $total_ppn += $d['ppn'];
            }
            
        
        $pdf->Cell(115 ,8,'',0,0);
        $pdf->Cell(30 ,8,'Subtotal',0,0);
        $pdf->Cell(45 ,8,'Rp '.number_format($subtotal, 0, '', '.'),1,1,'R');
        $pdf->Cell(115 ,8,'',0,0);
        $pdf->Cell(30 ,8,'PPN (10%)',0,0);
        $pdf->Cell(45 ,8,'Rp '.number_format($total_ppn, 0, '', '.'),1,1,'R');
        $pdf->Cell(115 ,8,'',0,0);
        $pdf->Cell(30 ,8,'Total Pemesanan',0,0);
        $pdf->Cell(45 ,8,'Rp '.number_format($subtotal+$total_ppn, 0, '', '.'),1,1,'R');
        $pdf->Output();

    }
}