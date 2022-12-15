<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
    Model utk tabel matings, dan pengaturan siklus perkawinan
*/

class Mating_model extends CI_Model {
    
    
    public function getDataMatings()
    {
        $this->datatables->select('a.id_matings, a.tanggal_kawin, a.pisah_jantan, 
        a.cek_kehamilan, a.pisah_kandang, a.lahiran, a.sapih, a.kawin_kembali ,b.inisial as indukan, c.inisial as pejantan');
        $this->datatables->from('matings a');
        $this->datatables->join('ternak b','a.id_ternak_betina = b.id_ternak');
        $this->datatables->join('ternak c','a.id_ternak_jantan = c.id_ternak');
        return $this->datatables->generate();
    }

    public function getDataMatingsDashboard()
    {
        $this->db->select('a.id_matings, a.tanggal_kawin, a.pisah_jantan, 
        a.cek_kehamilan, a.pisah_kandang, a.lahiran, a.sapih, a.kawin_kembali ,b.inisial as indukan, c.inisial as pejantan');
        $this->db->from('matings a');
        $this->db->join('ternak b','a.id_ternak_betina = b.id_ternak');
        $this->db->join('ternak c','a.id_ternak_jantan = c.id_ternak');
        $this->db->order_by('tanggal_kawin','ASC');
        return $this->db->get()->result();
    }

    public function getDataPengaturanSiklusKawin(){
        $this->db->select('*');
        $this->db->from('pengaturan_siklus_perkawinan');
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