<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelunasan extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->model('Master_model');
        $this->load->library('pdf');
        $this->load->model('Transaksi_model');
    }

    public function index()
    {      
        $data['title'] = 'Pelunasan';
        $data['trans'] = $this->Transaksi_model->get_pelunasan('pelunasan','id_pelunasan', 'tanggal_pelunasan');

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/pelunasan/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function tambah()
    {
        $tanggal =  date('mdyH');
        $data = [
            'title'     => 'Pelunasan',
            'auto_kode' => $this->Master_model->auto_kode('retur_pembelian_header','id_retur_pembelian','RTP'.$tanggal),
            'trans'     =>  $this->Transaksi_model->get_data_transaction_where('pembelian_header','pembelian_detail','id_pembelian','tanggal_pembelian','"belum lunas"')
        ];

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/pelunasan/tambah',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function simpan()
    {
        $retur = $this->input->post('retur');
        $tanggal_pel = $this->input->post('tanggal');
        $data = [
            'id_pelunasan' => $this->input->post('no_pelunasan'),
            'no_nota' => $this->input->post('no_nota'),
            'id_supplier' => $this->input->post('id_supplier'),
            'tanggal_pelunasan' => date('Y-m-d', strtotime($tanggal_pel)),
            'keterangan' =>  $this->input->post('keterangan'),
            'jumlah_bayar' => $this->input->post('totalbayar')
        ];

        $this->Master_model->tambah_data('pelunasan',$data);

           // Jurnal
        $tanggal = date('ymdHis');
        $data = [
             'id_jurnal' => "JUPB".$tanggal,
             'id_pembelian' => $this->input->post('no_nota'),
             'tanggal' => date('Y-m-d', strtotime($tanggal_pel)),
             'keterangan' => $this->input->post('keterangan')." ".$this->input->post('no_nota')
        ];

        $this->Master_model->tambah_data('jurnal_header',$data);

        if($retur == 0){
              // Kas
            $data = [
                'id_jurnal' => "JUPB".$tanggal,
                'id_akun' => '110',
                'debet' => 0,
                'kredit' => $this->input->post('totalbayar')
            ];

            $this->Master_model->tambah_data('jurnal_detail',$data);

            // Utang Dagang
            $data = [
                'id_jurnal' => "JUPB".$tanggal,
                'id_akun' => '211',
                'debet' => $this->input->post('totalbayar'),
                'kredit' => 0
            ];

            $this->Master_model->tambah_data('jurnal_detail',$data);
            
        }else{

             // Retur Pembelian
             $data = [
                'id_jurnal' => "JUPB".$tanggal,
                'id_akun' => '502',
                'debet' => 0,
                'kredit' => $retur
            ];

            $this->Master_model->tambah_data('jurnal_detail',$data);

             // Kas
             $data = [
                'id_jurnal' => "JUPB".$tanggal,
                'id_akun' => '110',
                'debet' => 0,
                'kredit' => $this->input->post('totalbayar')
            ];

            $this->Master_model->tambah_data('jurnal_detail',$data);

            // Utang Dagang
            $data = [
                'id_jurnal' => "JUPB".$tanggal,
                'id_akun' => '211',
                'debet' => $this->input->post('total'),
                'kredit' => 0
            ];

            $this->Master_model->tambah_data('jurnal_detail',$data);

        }

        $output['status'] = 200;
        $output['message'] = 'data berhasil disimpan';
        
        echo json_encode($output);
    }


    function cek_retur(){
        $id = $this->input->post('Id');
        $data['retur'] = $this->Transaksi_model->get_order_detail('retur_pembelian_detail','no_nota',$id);

        $subtotal = 0;
        $ppn = 0;
        foreach($data['retur'] as $d){
            $total = $d['harga_beli']*$d['jumlah'];

            $subtotal += $total;
            $ppn += $d['ppn'];
        }

        $total_retur = $subtotal+$ppn;

        $output['status'] = 200;
        $output['total'] = $total_retur;
        echo json_encode($output);
    }

    public function cetak($id = NULL)
	{
        $id = $this->uri->segment('4');
        
        $data['bayar'] = $this->Transaksi_model->get_pelunasan_where('pelunasan','id_pelunasan', 'tanggal_pelunasan', $id);

		$pdf = new FPDF('P', 'mm', 'A5');
		$pdf->AddPage();
		$pdf->SetFont('Arial', '', 8);

        $pdf->Cell(25, 4, 'No Pelunasan', 0, 0, 'L');
        $pdf->Cell(10, 10, '', 0, 0, 'L');
        $pdf->Cell(50, 4, $data['bayar']['id_pelunasan'],0 ,0, 'L');
        $pdf->Cell(30, 5, '', 0, 0, 'L');
        $pdf->Ln();


        $pdf->Cell(25, 4, 'Tanggal Pelunasan', 0, 0, 'L');
        $pdf->Cell(10, 10, '', 0, 0, 'L');
        $pdf->Cell(70, 4, date('d M Y', strtotime($data['bayar']['tanggal_pelunasan'])),0 ,0, 'L');
        $pdf->Cell(30, 10, '', 0, 0, 'L');
		$pdf->Ln();

        $pdf->Cell(30, 40, '', 0, 0, 'L');
		$pdf->SetFont('Arial', '', 20);
		$pdf->Cell(25, 20, 'BUKTI PEMBAYARAN', 0, 0, 'L');
		$pdf->Cell(50, 20, '', 0, 0, 'L');
        $pdf->Ln();
        
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(10, 40, '', 0, 0, 'L');
        $pdf->Cell(70, 7, 'Dibayar Kepada :   '.$data['bayar']['nama_supplier'], 0, 0, 'L');
        $pdf->Ln();
        $pdf->Cell(10, 40, '', 0, 0, 'L');
        $pdf->Cell(70, 7, 'Untuk          :   Pelunasan Hutang', 0, 0, 'L');
        $pdf->Ln();
        
        $pdf->Cell(5, 10, '', 0, 0, 'L');
        $pdf->Ln();
		$pdf->SetFont('Arial', '', 15);
        // $pdf->Cell(0, 20, '', 0, 0, 'L');
        $pdf->Cell(30, 10, '', 0, 0, 'L');
        $pdf->Cell(30, 10, 'Jumlah', 0, 0, 'L');
        $pdf->Cell(10, 10, '', 0, 0, 'L');
        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(30, 10, 'Rp '.number_format($data['bayar']['jumlah_bayar'], 0, '', '.'), 1, 0, 'L');
        $pdf->Cell(25, 30, '', 0, 0, 'L');
        $pdf->Ln();

        $pdf->Cell(70, 30, '', 0, 0, 'L');
        $pdf->SetFont('Arial', '', 10);
        $pdf->Cell(30, 4, 'Pekalongan, '.date('d M Y', strtotime($data['bayar']['tanggal_pelunasan'])), 0, 0, 'L');
        $pdf->Cell(30, 20, '', 0, 0, 'L');
        $pdf->Ln();

        $pdf->Cell(70, 40, '', 0, 0, 'L');
        $pdf->Cell(40, 20, 'Toko ENI', 0, 0, 'L');
        $pdf->Cell(30, 10, '', 0, 0, 'L');
		$pdf->Ln();

		$pdf->Output();
	}
}