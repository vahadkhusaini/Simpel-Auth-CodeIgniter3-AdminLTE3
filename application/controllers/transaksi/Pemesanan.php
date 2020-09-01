<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller 
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
        $data['title'] = 'Pemesanan';
        $data['trans'] = $this->Transaksi_model->get_data_transaction('pemesanan_header','pemesanan_detail','id_pemesanan','tanggal_pemesanan');

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/pemesanan/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function tambah()
    {
        $this->cart->destroy();
        $tanggal =  date('ymds');
        $data = [
            'title'     => 'Pemesanan',
            'auto_kode' => $this->Master_model->auto_kode('pemesanan_header','id_pemesanan','PO'.$tanggal),
            'supplier'  => $this->Master_model->get_data('supplier','id_supplier'),
            'barang'    => $this->Master_model->get_data('barang','id_barang')
        ];

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/pemesanan/tambah',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function simpan()
    {
        $tanggal = $this->input->post('tanggal');
        $data = [
            'id_pemesanan' => $this->input->post('no_pemesanan'),
            'tanggal_pemesanan' => date('Y-m-d', strtotime($tanggal)),
            'id_supplier' => $this->input->post('id_supplier'),
            'status' => 'Belum Selesai'
        ];

        $this->Master_model->tambah_data('pemesanan_header',$data);

        foreach ($this->cart->contents() as $items) {

            $data = [
                'id_pemesanan' => $this->input->post('no_pemesanan'),
                'id_barang' => $items['id'],
                'harga_beli' => $items['price'],
                'jumlah' => $items['qty'],
                'satuan_beli' => $items['satuan']
            ];
            
            $this->Master_model->tambah_data('pemesanan_detail',$data);
        }
        
        $this->cart->destroy();
        $output['status'] = 200;
        $output['message'] = 'Data telah disimpan';
        echo json_encode($output);
    }

    public function cetak($id = NULL){
        $data['po'] = $this->Transaksi_model->get_header('pemesanan_header','id_pemesanan',$id);
        $data['detail'] = $this->Transaksi_model->get_order_detail('pemesanan_detail','id_pemesanan',$id);
        
        $pdf = new FPDF('P', 'mm', 'A4');
		$pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 20);    
        
        $pdf->Cell(65 ,20,'',0,0);
        $pdf->Cell(59 ,5,'PEMESANAN',0,0);
        $pdf->Cell(59 ,20,'',0,1);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(25, 0, 'No Pemesanan', 0, 0, 'L');
        $pdf->Cell(5, 0, ':', 0, 0, 'L');
		$pdf->Cell(85, 0, $data['po']['id_pemesanan'],0 ,0, 'L');

        $pdf->Cell(30, 0, 'Nama Supplier', 0, 0, 'L');
        $pdf->Cell(5, 0, ':', 0, 0, 'L');
		$pdf->Cell(30, 0, $data['po']['nama_supplier'], 0, 0, 'L');
		$pdf->Ln();

        $pdf->Cell(25, 15, 'Tanggal', 0, 0, 'L');
        $pdf->Cell(5, 15, ':', 0, 0, 'L');
		$pdf->Cell(85, 15, date('d M Y', strtotime($data['po']['tanggal_pemesanan'])), 0, 0, 'L');
		
        $pdf->Cell(30, 15, 'Alamat', 0, 0, 'L');
        $pdf->Cell(5, 15, ':', 0, 0, 'L');
		$pdf->Cell(30, 15, $data['po']['alamat'], 0);
        $pdf->Ln();

        $pdf->SetFont('Arial','B',10);
        /*Heading Of the table*/
        $pdf->Cell(10 ,8,'No',1,0,'C');
        $pdf->Cell(40 ,8,'Barcode',1,0,'C');
        $pdf->Cell(25 ,8,'Kode Barang',1,0,'C');
        $pdf->Cell(75 ,8,'Nama Barang',1,0,'C');
        $pdf->Cell(15 ,8,'Qty',1,0,'C');
        $pdf->Cell(20 ,8,'Satuan',1,0,'C');
        $pdf->Ln();
        /*end of line*/
        /*Heading Of the table end*/
        $pdf->SetFont('Arial','',10);
        $no = 1;
        $subtotal = 0;
        $total_ppn = 0;
            foreach ($data['detail'] as $d) {
                $total = $d['jumlah']*$d['harga_beli'];
                $pdf->Cell(10 ,8,$no,1,0,'C');
                $pdf->Cell(40 ,8,$d['kode_barcode'],1,0);
                $pdf->Cell(25 ,8,$d['id_barang'],1,0);
                $pdf->Cell(75 ,8,$d['nama_barang'],1,0);
                $pdf->Cell(15 ,8,$d['jumlah'],1,0,'R');
                $pdf->Cell(20 ,8,$d['satuan'],1,0,'R');
                
                $pdf->Ln();
                $no++;  
            }
        $pdf->Output();
    }
}