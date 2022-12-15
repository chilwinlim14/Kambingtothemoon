<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_produk_model extends CI_Model {
    
    public function getDataMasterproduk()
    {
        $this->datatables->select('*');
        $this->datatables->from('master_produk');
        return $this->datatables->generate();
    }

    public function getDataMasterprodukResult(){
        $this->db->select('*');
        $this->db->from('master_produk');
        return $this->db->get()->result();
    }

    public function getDataMasterproduk_byId($id_produk)
    {
        $this->db->select('*');
        $this->db->from('master_produk');
        $this->db->where('id_produk', $id_produk);
        return $this->db->get();
    }
}