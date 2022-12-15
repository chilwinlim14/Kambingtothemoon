<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_model extends CI_Model
{
    public function get_data_produksi()
    {
        $this->datatables->select('a.id_produksi, a.produk,a.tanggal, a.jumlah, a.catatan, b.inisial, c.nama_produk');
        $this->datatables->from('produksi a');
        $this->datatables->join('ternak b','a.id_ternak = b.id_ternak');
        $this->datatables->join('master_produk c','a.produk = c.id_produk');
        return $this->datatables->generate();
    }


    

    public function get_data_produksi_byId($id_produksi)
    {
        $this->db->select('*');
        $this->db->from('produksi');
        $this->db->where('id_produksi', $id_produksi);
        return $this->db->get()->row();
    }
}
