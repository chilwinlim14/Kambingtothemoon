<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_Model {
    
    public function getDataKontak()
    {
        $this->datatables->select('*');
        $this->datatables->from('kontak');
        return $this->datatables->generate();
    }

    public function getDataKontakResult(){
        $this->db->select('*');
        $this->db->from('kontak');
        return $this->db->get()->result();
    }

    public function getDataKontak_byId($id_kontak)
    {
        $this->db->select('*');
        $this->db->from('kontak');
        $this->db->where('id_kontak', $id_kontak);
        return $this->db->get();
    }
}