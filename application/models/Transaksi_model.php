<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaksi_model extends CI_Model
{
    function get_data_transaction($tb_header, $tb_detail, $id_tabel, $tanggal)
    {
        
        $query = $this->db->query(
        "SELECT * FROM $tb_header AS h
        INNER JOIN supplier AS s ON h.id_supplier = s.id_supplier 
        INNER JOIN (SELECT $id_tabel,
        sum(harga_beli*jumlah) AS subtotal, 
        sum(ppn) AS total_pajak
                 FROM $tb_detail 
                 GROUP BY $id_tabel) d
        ON h.$id_tabel = d.$id_tabel 
        GROUP BY h.$id_tabel
        ORDER BY h.$tanggal DESC" 
        );

        return $query->result_array();
    }

    function get_data_transaction_where($tb_header, $tb_detail, $id_tabel, $tanggal, $where)
    {      
        $query = $this->db->query(
        "SELECT * FROM $tb_header AS h
        INNER JOIN supplier AS s ON h.id_supplier = s.id_supplier 
        INNER JOIN (SELECT $id_tabel,
        sum(harga_beli*jumlah) AS subtotal, 
        sum(ppn) AS total_pajak
                 FROM $tb_detail 
                 GROUP BY $id_tabel) d
        ON h.$id_tabel = d.$id_tabel 
        WHERE h.status = $where
        GROUP BY h.$id_tabel
        ORDER BY h.$tanggal DESC" 
        );

        return $query->result_array();
    }

    function get_transaction_date($tanggal1, $tanggal2)
    {
        
        $query = $this->db->query(
        "SELECT * FROM pembelian_header AS h
        INNER JOIN supplier AS s ON h.id_supplier = s.id_supplier 
        INNER JOIN (SELECT id_pembelian,
        sum(harga_beli*jumlah) AS subtotal, 
        sum(ppn) AS total_pajak
                 FROM pembelian_detail 
                 GROUP BY id_pembelian) d
        ON h.id_pembelian = d.id_pembelian
        WHERE h.tanggal_pembelian between '$tanggal1' and '$tanggal2'
        GROUP BY h.id_pembelian
        ORDER BY h.tanggal_pembelian DESC" 
        );

        return $query->result_array();
    }

    function get_pelunasan($tb_header, $id_tabel, $tanggal){
        $query = $this->db->query(
            "SELECT * FROM $tb_header AS h
            INNER JOIN supplier AS s ON h.id_supplier = s.id_supplier 
            GROUP BY h.$id_tabel
            ORDER BY h.$tanggal DESC" 
            );
        
        return $query->result_array();
    }

    function get_pelunasan_where($tb_header, $id_tabel, $tanggal, $where){
        $query = $this->db->query(
            "SELECT * FROM $tb_header AS h
            INNER JOIN supplier AS s ON h.id_supplier = s.id_supplier 
            WHERE h.$id_tabel ='$where'" 
            );
        
        return $query->row_array();
    }

    function get_order_detail($table, $id_tabel, $id)
    {
        $query = $this->db->query(
            "SELECT * FROM $table as pd
            JOIN (SELECT * from barang) b on pd.id_barang=b.id_barang
            WHERE $id_tabel='$id'"
        );

        return $query->result_array();
    }

    function get_header($table,$id_tabel,$id)
    {
        $query = $this->db->query(
            "SELECT*FROM $table as ph
            INNER JOIN (SELECT id_supplier, nama_supplier, alamat from supplier) s 
            on ph.id_supplier=s.id_supplier
            WHERE $id_tabel='$id'"
        );

        return $query->row_array();
    }

    function get_retur()
    {
        $query = $this->db->query(
            "SELECT * FROM retur_pembelian_header AS h
            INNER JOIN supplier AS s on h.id_supplier = s.id_supplier
            INNER JOIN pembelian_header AS p ON h.no_nota = p.no_nota 
            INNER JOIN (SELECT no_nota,
            sum(harga_beli*jumlah) AS subtotal, 
            sum(ppn) AS total_pajak
                     FROM retur_pembelian_detail 
                     GROUP BY no_nota) d
            ON h.no_nota = d.no_nota 
            GROUP BY h.id_retur_pembelian
            ORDER BY h.tanggal DESC" 
            );
        
            return $query->result_array();
    }

    function get_stok()
    {
        $query = $this->db->query(
                "SELECT * FROM `pembelian_header` AS ph
                    INNER JOIN pembelian_detail AS pd 
                    ON ph.id_pembelian = pd.id_pembelian
                    INNER JOIN barang AS b
                    ON pd.id_barang = b.id_barang");

                return $query->result_array();
    }
}