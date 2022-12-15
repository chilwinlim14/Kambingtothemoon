<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    Model utk tabel siklus birahi, dan pengaturan siklus birahi
*/

class Siklus_birahi_model extends CI_Model {
    
    public function getDataSiklusBirahi()
    {
        $this->datatables->select('a.id_siklus_birahi, a.proestrus, a.estrus, a.diestrus, a.anestrus, a.siklus_selanjutnya,concat(b.inisial," - ",b.nomor_tag) AS nomor_tag ');
        $this->datatables->from('siklus_birahi a');
        $this->datatables->join('ternak b','a.id_ternak_betina = b.id_ternak');
        return $this->datatables->generate();
    }

    public function getDataPengaturanSiklusBirahi(){
        $this->db->select('*');
        $this->db->from('pengaturan_siklus_birahi');
        return $this->db->get()->row();
    }

  

    // public function getDataKandang_byId($id_kandang)
    // {
    //     $this->db->select('*');
    //     $this->db->from('master_kandang');
    //     $this->db->where('id_kandang', $id_kandang);
    //     return $this->db->get();
    // }
}