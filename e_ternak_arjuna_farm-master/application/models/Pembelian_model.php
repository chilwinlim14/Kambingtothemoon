<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian_model extends CI_Model
{
    public function get_data_pembelian()
    {
        $this->datatables->select('a.id_pembelian, a.tanggal, b.inisial, a.harga, c.nama, a.keterangan');
        $this->datatables->from('pembelian a');
        $this->datatables->join('ternak b','a.id_ternak = b.id_ternak');
        $this->datatables->join('kontak c','a.penjual = c.id_kontak');
        return $this->datatables->generate();
    }

    public function get_data_pembelian_byId($id_pembelian)
    {
        $this->db->select('*');
        $this->db->from('pembelian');
        $this->db->where('id_pembelian', $id_pembelian);
        return $this->db->get()->row();
    }
}
