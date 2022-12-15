<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Penjualan_model extends CI_Model
{
    public function get_data_penjualan()
    {
        // $this->datatables->select('id_treatment_ternak, id_ternak, tanggal, id_treatment, umur_treatment, status_treatment');
        $this->datatables->select('a.id_penjualan , a.tanggal, b.inisial, a.harga, a.deposit, a.utang, a.status, c.nama');
        $this->datatables->from('penjualan a');
        $this->datatables->join('ternak b','a.id_ternak = b.id_ternak');
        $this->datatables->join('kontak c','a.pembeli = c.id_kontak');
        return $this->datatables->generate();
    }

    public function get_data_penjualan_byId($id_penjualan)
    {
        $this->db->select('*');
        $this->db->from('penjualan');
        $this->db->where('id_penjualan', $id_penjualan);
        return $this->db->get()->row();
    }
}
