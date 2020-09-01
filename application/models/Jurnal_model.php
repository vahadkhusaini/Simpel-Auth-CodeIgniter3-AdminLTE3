<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jurnal_model extends CI_Model
{
    public function get_jurnal()   
    {
        $query = $this->db->query(
        "SELECT * FROM jurnal_header AS h		
		INNER JOIN jurnal_detail AS d ON h.id_jurnal = d.id_jurnal
        INNER JOIN (SELECT id_akun, nama_akun FROM akun) s ON d.id_akun = s.id_akun
        ORDER BY d.id DESC");

        return $query->result_array();
    }

    public function get_jurnal_byDate($tanggal1, $tanggal2)   
    {
        $query = $this->db->query(
        "SELECT * FROM jurnal_header AS h		
		INNER JOIN jurnal_detail AS d ON h.id_jurnal = d.id_jurnal
        INNER JOIN (SELECT id_akun, nama_akun FROM akun) s ON d.id_akun = s.id_akun
        WHERE h.tanggal between '$tanggal1' and '$tanggal2' 
        ORDER BY d.id DESC");


        return $query->result_array();
    }
}