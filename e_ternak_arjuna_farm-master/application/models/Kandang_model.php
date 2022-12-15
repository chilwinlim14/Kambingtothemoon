<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kandang_model extends CI_Model {
    
    public function getDataKandang()
    {
        $this->datatables->select('a.id_kandang, a.nama_kandang,a.blok, 
        a.keterangan,count(b.id_kandang) AS populasi');
        $this->datatables->from('master_kandang a');
        $this->datatables->join('ternak b','a.id_kandang = b.id_kandang','left');
        $this->datatables->group_by('a.id_kandang, a.nama_kandang,a.blok, 
        a.keterangan');
        return $this->datatables->generate();
    }

    public function getDataKandangResult(){
        $this->db->select('*');
        $this->db->from('master_kandang');
        return $this->db->get()->result();
    }

    public function getDataKandang_byId($id_kandang)
    {
        $this->db->select('*');
        $this->db->from('master_kandang');
        $this->db->where('id_kandang', $id_kandang);
        return $this->db->get();
    }
}