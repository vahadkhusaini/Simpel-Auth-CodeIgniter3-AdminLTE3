<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller 
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
        $data['title'] = 'Pembelian';
        $data['trans'] = $this->Transaksi_model->get_data_transaction('pembelian_header', 'pembelian_detail', 'id_pembelian','tanggal_pembelian');

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/pembelian/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function tambah()
    {
        $date_now =  date('ymdHis');
        $data = [
            'title'     => 'Pembelian',
            'auto_kode' => $this->Master_model->auto_kode('pembelian_header','id_pembelian','PB'.$date_now),
            'trans'     => $this->Transaksi_model->get_data_transaction('pemesanan_header', 'pemesanan_detail', 'id_pemesanan','tanggal_pemesanan'),
            'order'     => $this->Transaksi_model->get_data_transaction_where('pemesanan_header', 'pemesanan_detail', 'id_pemesanan','tanggal_pemesanan','"Belum Selesai"'),
            'supplier'  => $this->Master_model->get_data('supplier','id_supplier'),
            'barang'    => $this->Master_model->get_data('barang','id_barang')
        ];

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('transaksi/pembelian/tambah',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function simpan()
    {
        $this->form_validation->set_rules('no_nota', 'Nomor Nota', 'trim|is_unique[pembelian_header.no_nota]',
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
            $tanggal_pemb = $this->input->post('tanggal');
            $tanggal_tempo =  $this->input->post('tanggal_tempo');
            $metode =  $this->input->post('jenis_pembelian');
            $id_pemesanan =  $this->input->post('no_pemesanan');

            if($metode == 'T'){
                $status = 'lunas';
            }else{
                $status = 'belum lunas';
            }

            $data = [
                'id_pembelian' => $this->input->post('id_pembelian'),
                'id_pemesanan' => $id_pemesanan,
                'no_nota' => $this->input->post('no_nota'),
                'id_supplier' => $this->input->post('id_supplier'),
                'keterangan' => $this->input->post('keterangan'),
                'jenis_pembelian' => $metode,
                'tanggal_pembelian' => date('Y-m-d', strtotime($tanggal_pemb)),
                'tanggal_jth_tempo' => date('Y-m-d', strtotime($tanggal_tempo)),
                'status' => $status
            ];

            $this->Master_model->tambah_data('pembelian_header',$data);
            
            $this->Master_model->edit_data('pemesanan_header','id_pemesanan',$id_pemesanan, $status = ['status' => 'Selesai']);

            $ppn_masukan = 0;
            foreach ($this->cart->contents() as $items) {
                $pajak = $items['ppn'];

                $data = [
                    'id_pembelian' => $this->input->post('id_pembelian'),
                    'id_barang' => $items['id'],
                    'harga_beli' => $items['price'],
                    'jumlah' => $items['qty'],
                    'satuan_beli' => $items['satuan'],
                    'ppn' => $pajak
                ];
            $ppn_masukan += $pajak;
                $this->Master_model->tambah_data('pembelian_detail',$data);              
            }

            // Jurnal
            $tanggal = date('ymdHis');
            $kode_jurnal = "JUPB".$tanggal;
            $data = [
                'id_jurnal' => $kode_jurnal,
                'id_pembelian' => $this->input->post('id_pembelian'),
                'tanggal' => date('Y-m-d', strtotime($tanggal_pemb)),
                'keterangan' => $this->input->post('keterangan')." ".$this->input->post('no_nota')
            ];

            $this->Master_model->tambah_data('jurnal_header',$data);

            if($metode == 'K'){
                if($ppn_masukan == 0){
                    // Utang Dagang
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '211',
                        'debet' => 0,
                        'kredit' => $this->cart->total()
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);
                                       
                    // Pembelian
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '410',
                        'debet' => $this->cart->total(),
                        'kredit' => 0
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);
        
                }else{

                    // Utang Dagang
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '211',
                        'debet' => 0,
                        'kredit' => $this->cart->total()+$ppn_masukan
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);
        
                    // PPN Masukan
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '610',
                        'debet' => $ppn_masukan,
                        'kredit' => 0
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);

                    
                    // Pembelian
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '410',
                        'debet' => $this->cart->total(),
                        'kredit' => 0
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);
                }

            }else if($metode == "T"){
                if($ppn_masukan == 0){  
                    // Kas
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '110',
                        'debet' => 0,
                        'kredit' => $this->cart->total()
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);

                    // Pembelian
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '410',
                        'debet' => $this->cart->total(),
                        'kredit' => 0
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);
        
                }else{
                                       
                    // Kas
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '110',
                        'debet' => 0,
                        'kredit' => $this->cart->total()+$ppn_masukan
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);

                    // PPN Masukan
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '610',
                        'debet' => $ppn_masukan,
                        'kredit' => 0
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);

                    // Pembelian
                    $data = [
                        'id_jurnal' => $kode_jurnal,
                        'id_akun' => '410',
                        'debet' => $this->cart->total(),
                        'kredit' => 0
                    ];
        
                    $this->Master_model->tambah_data('jurnal_detail',$data);
    
                }
            }

            $this->cart->destroy();
            $output['status'] = 200;          
            $output['message'] = 'Data berhasil disimpan';
            echo json_encode($output);
        }
    }

            public function cetak($id = NULL){
                $data['po'] = $this->Transaksi_model->get_header('pembelian_header','id_pembelian',$id);
                $data['detail'] = $this->Transaksi_model->get_order_detail('pembelian_detail','id_pembelian',$id);
                
                $pdf = new FPDF('P', 'mm', 'A4');
                $pdf->AddPage();
                $pdf->SetFont('Arial', 'B', 20);    
                
                $pdf->Cell(65 ,20,'',0,0);
                $pdf->Cell(59 ,5,'FAKTUR PEMBELIAN',0,0);
                $pdf->Cell(59 ,20,'',0,1);
                
                $pdf->SetFont('Arial','',10);
                
                $pdf->Cell(25, 0, 'No Nota', 0, 0, 'L');
                $pdf->Cell(5, 0, ':', 0, 0, 'L');
                $pdf->Cell(85, 0, $data['po']['no_nota'],0 ,0, 'L');
                
                $pdf->Cell(30, 0, 'Nama Supplier', 0, 0, 'L');
                $pdf->Cell(5, 0, ':', 0, 0, 'L');
                $pdf->Cell(30, 0, $data['po']['nama_supplier'], 0, 0, 'L');
                $pdf->Ln();
        
                $pdf->Cell(25, 15, 'Tanggal', 0, 0, 'L');
                $pdf->Cell(5, 15, ':', 0, 0, 'L');
                $pdf->Cell(85, 15, date('d M Y', strtotime($data['po']['tanggal_pembelian'])), 0, 0, 'L');
                
                $pdf->Cell(30, 15, 'Alamat', 0, 0, 'L');
                $pdf->Cell(5, 15, ':', 0, 0, 'L');
                $pdf->Cell(30, 15, $data['po']['alamat'], 0);
                $pdf->Ln();

                $pdf->Cell(25, 0, 'Jatuh Tempo', 0, 0, 'L');
                $pdf->Cell(5, 0, ':', 0, 0, 'L');
                $pdf->Cell(115, 0, date('d M Y', strtotime($data['po']['tanggal_jth_tempo'])), 0, 0, 'L');
                
                $pdf->Cell(45 , 5, $data['po']['jenis_pembelian'] == 'T' ? 'Tunai' : 'Kredit ', 1, 1, 'C');
                $pdf->Ln();

                $pdf->SetFont('Arial','B',10);
                /*Heading Of the table*/
                $pdf->Cell(10 ,8,'No',1,0,'C');
                $pdf->Cell(25 ,8,'Kode Barang',1,0,'C');
                $pdf->Cell(65 ,8,'Nama Barang',1,0,'C');
                $pdf->Cell(10 ,8,'Qty',1,0,'C');
                $pdf->Cell(15 ,8,'Satuan',1,0,'C');
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
                        $pdf->Cell(65 ,8,$d['nama_barang'],1,0);
                        $pdf->Cell(10 ,8,$d['jumlah'],1,0,'C');
                        $pdf->Cell(15 ,8,$d['satuan_beli'],1,0,'R');
                        $pdf->Cell(25 ,8,'Rp '.number_format($d['harga_beli'], 0, '', '.'),1,0,'R');
                        $pdf->Cell(20 ,8,$d['ppn'],1,0,'R');
                        $pdf->Cell(25 ,8,'Rp '.number_format($total, 0, '', '.') ,1,1,'R');
                    $no++;
                    $subtotal += $total;
                    $total_ppn += $d['ppn'];
                    }

                $pdf->Cell(120 ,8,'',0,0);
                $pdf->Cell(30 ,8,'Subtotal',0,0);
                $pdf->Cell(45 ,8,'Rp '.number_format($subtotal, 0, '', '.'),1,1,'R');
                $pdf->Cell(120 ,8,'',0,0);
                $pdf->Cell(30 ,8,'PPN (10%)',0,0);
                $pdf->Cell(45 ,8,'Rp '.number_format($total_ppn, 0, '', '.'),1,1,'R');
                $pdf->Cell(120 ,8,'',0,0);
                $pdf->Cell(30 ,8,'Total Pembelian',0,0);
                $pdf->Cell(45 ,8,'Rp '.number_format($subtotal+$total_ppn, 0, '', '.'),1,1,'R');
                $pdf->Output();
        
            }
}