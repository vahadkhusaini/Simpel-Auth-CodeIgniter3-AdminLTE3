<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_model extends CI_Model
{
    public function auto_kode($tabel,$id_tabel,$kode_awal)   
    {
        $this->db->select('RIGHT('.$tabel.'.'.$id_tabel.',4) as kode', FALSE);
        $this->db->order_by($id_tabel,'DESC');    
        $this->db->limit(1);    
        $query = $this->db->get($tabel);      //cek dulu apakah ada sudah ada kode di tabel.    
        if($query->num_rows() <> 0){      
         //jika kode ternyata sudah ada.      
        $data = $query->row();      
        $kode = intval($data->kode) + 1;    
        }
        else 
        {      
         //jika kode belum ada      
        $kode = 1;    
        }

        $kode_akhir = str_pad($kode, 4, "0", STR_PAD_LEFT); // angka 4 menunjukkan jumlah digit angka 0
        $autokode = $kode_awal.$kode_akhir;
        return $autokode;  
    }

    public function get_data_count($id_tabel, $tabel, $status){
        $query = $this->db->query(
            "SELECT count($id_tabel) as hasil from $tabel WHERE status='$status'");

            return $query->row_array();
    }

    public function get_data_count2($id_tabel, $tabel){
        $query = $this->db->query(
            "SELECT count($id_tabel) as hasil from $tabel");

            return $query->row_array();
    }

    public function join_data($first_table,$id_table_first,$sec_table,$id_tabel_join)
    {
        $this->db->select("$first_table.*, $sec_table.*");
        $this->db->from($first_table);
        $this->db->join($sec_table, "$sec_table.$id_tabel_join = $first_table.$id_tabel_join");
        $this->db->order_by($id_table_first, 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function join3()
    {
        $this->db->select("barang.*, supplier.*, kategori.*");
        $this->db->from("barang");
        $this->db->join("supplier", "supplier.id_supplier = barang.id_supplier");
        $this->db->join("kategori", "kategori.id_kategori = barang.id_kategori");
        $this->db->order_by('id_barang', 'DESC');
        $query = $this->db->get();

        return $query->result_array();
    }

    public function get_data($tabel, $id_table)
    {
        $this->db->order_by($id_table, 'DESC');
        $query = $this->db->get($tabel);
        return $query->result_array();
    }

    public function get_barang_bySupplier($id){
        return $this->db->get_where('barang',['id_supplier' => $id])->result_array();   
    }

    public function get_data_byId($tabel, $id_tabel,$id)
    {
        return $this->db->get_where($tabel,[$id_tabel => $id])->row_array();
    }

    public function tambah_data($tabel,$data)
    {
        return $this->db->insert($tabel,$data);
    }

    public function cek_duplicate($name){
        $query = $this->db->query("
            SELECT COUNT(*) AS count FROM barang WHERE nama_barang = '$name'");

            return $query->result_array();
    }

    public function edit_data($tabel,$id_tabel,$id,$data)
    {
        $this->db->where($id_tabel, $id);
        $this->db->update($tabel, $data);

        return $this->db->get($tabel);
    }

    public function hapus_data($tabel,$id_tabel,$id)
    {
        return  $this->db->delete($tabel, [$id_tabel => $id]);
    }
}