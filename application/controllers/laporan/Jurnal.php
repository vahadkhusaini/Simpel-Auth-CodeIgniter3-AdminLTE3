<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
        $this->load->library('pdf');
        
        $this->load->model('Master_model');
        $this->load->model('Jurnal_model');
    }

    public function index()
    {      
        $data['title'] = 'Jurnal Pembelian';
        $data['jurnal'] = $this->Jurnal_model->get_jurnal();

        $this->load->view('_partial/header', $data);
        $this->load->view('_partial/navbar', $data);
        $this->load->view('_partial/sidebar', $data);
        $this->load->view('laporan/jurnal/index',$data);
        $this->load->view('_partial/footer', $data);
    }

    public function get_jurnal_by_date()
    {
        $tanggal1 = $this->input->post('Tanggal1');
        $tanggal2 = $this->input->post('Tanggal2');

        $data = $this->Jurnal_model->get_jurnal_byDate($tanggal1, $tanggal2);

        echo json_encode($data);
    }

    public function cetak(){
        $tanggal1 = $this->uri->segment('4');
        $tanggal2 = $this->uri->segment('5');
        
        $data['ju'] = $this->Jurnal_model->get_jurnal_byDate($tanggal1, $tanggal2);
        
        $pdf = new FPDF('P', 'mm', 'A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial', 'B', 20);    
        
        $pdf->Cell(49 ,10,'',0,0);
        $pdf->Ln();
        $pdf->Cell(48 ,20,'',0,0);
        $pdf->Cell(59 ,5,'LAPORAN JURNAL PEMBELIAN',0,0);
        $pdf->Cell(60 ,10,'',0,1);

        $pdf->SetFont('Arial','',10);

        $pdf->Cell(60 ,0,'',0,0);
        $pdf->Cell(20, 0, 'Periode', 0, 0, 'L');
        $pdf->Cell(5, 0, ':', 0, 0, 'L');
        $pdf->Cell(23, 0, date('d M Y', strtotime($tanggal1)), 0, 0, 'L');
        $pdf->Cell(10, 0, 's/d', 0, 0, 'L');
        $pdf->Cell(115, 0, date('d M Y', strtotime($tanggal2)), 0, 0, 'L');
        $pdf->Cell(30 ,10,'',0,0);
        $pdf->Ln();

        $pdf->SetFont('Arial','B',10);
        /*Heading Of the table*/
        $pdf->Cell(20 ,8,'Tanggal',1,0,'C');
        $pdf->Cell(60 ,8,'Keterangan',1,0,'C');
        $pdf->Cell(25 ,8,'Kode Akun',1,0,'C');
        $pdf->Cell(25 ,8,'Nama Akun',1,0,'C');
        $pdf->Cell(30 ,8,'Debet',1,0,'C');
        $pdf->Cell(30 ,8,'Kredit',1,0,'C');
        /*Heading Of the table end*/
        $pdf->SetFont('Arial','',10);
        $pdf->Ln();

        $debet = 0;
        $kredit = 0;
        foreach ($data['ju'] as $d) {
            $cellWidth=60; //lebar sel
            $cellHeight=8; //tinggi sel satu baris normal
                		
                $textLength=strlen($d['keterangan']);	//total panjang teks
                $errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
                $startChar=0;		//posisi awal karakter untuk setiap baris
                $maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
                $textArray=array();	//untuk menampung data untuk setiap baris
                $tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
                
                while($startChar < $textLength){ //perulangan sampai akhir teks
                    //perulangan sampai karakter maksimum tercapai
                    while( 
                    $pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
                    ($startChar+$maxChar) < $textLength ) {
                        $maxChar++;
                        $tmpString=substr($d['keterangan'],$startChar,$maxChar);
                    }
                    //pindahkan ke baris berikutnya
                    $startChar=$startChar+$maxChar;
                    //kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
                    array_push($textArray,$tmpString);
                    //reset variabel penampung
                    $maxChar=0;
                    $tmpString='';
                    
                }
                //dapatkan jumlah baris
                $line=count($textArray);
                $pdf->Cell(20 ,($line * $cellHeight),date('d M Y', strtotime($d['tanggal'])),1,0,'C');
           
            //memanfaatkan MultiCell sebagai ganti Cell
            //atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
            //ingat posisi x dan y sebelum menulis MultiCell
            $xPos=$pdf->GetX();
            $yPos=$pdf->GetY();
            $pdf->MultiCell($cellWidth,$cellHeight,$d['keterangan'],1);
            
            //kembalikan posisi untuk sel berikutnya di samping MultiCell 
            //dan offset x dengan lebar MultiCell
            $pdf->SetXY($xPos + $cellWidth , $yPos);

            $pdf->Cell(25 ,($line * $cellHeight),$d['id_akun'],1,0);
            $pdf->Cell(25 ,($line * $cellHeight),$d['nama_akun'],1,0,'L');
            $pdf->Cell(30 ,($line * $cellHeight),'Rp '.number_format($d['debet'], 0, '', '.'),1,0,'L');
            $pdf->Cell(30 ,($line * $cellHeight),'Rp '.number_format($d['kredit'], 0, '', '.') ,1,1,'L');

            $debet += $d['debet'];
            $kredit += $d['kredit'];
        }

        $pdf->Cell(125,0,'',0,0);
        $pdf->Cell(5,0,'',0,0);
        $pdf->Cell(30 ,8,'Rp '.number_format($debet,0,'','.'),1,0,'C');
        $pdf->Cell(30 ,8,'Rp '.number_format($kredit,0,'','.'),1,0,'C');
        $pdf->Output();

    }
}