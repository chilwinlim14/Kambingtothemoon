<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment_ternak_model extends CI_Model
{
    public function get_data_treatment_ternak()
    {
        // $this->datatables->select('id_treatment_ternak, id_ternak, tanggal, id_treatment, umur_treatment, status_treatment');
        $this->datatables->select('a.id_treatment_ternak , a.tanggal, b.inisial,a.umur_treatment,a.status_treatment, c.nama_treatment');
        $this->datatables->from('treatment_ternak a');
        $this->datatables->join('ternak b','a.id_ternak = b.id_ternak');
        $this->datatables->join('master_treatment c','a.id_treatment = c.id_treatment');
        return $this->datatables->generate();
    }

    public function get_data_treatment_ternak_byId($id_treatment_ternak)
    {
        $this->db->select('*');
        $this->db->from('treatment_ternak');
        $this->db->where('id_treatment_ternak', $id_treatment_ternak);
        return $this->db->get()->row();
    }
    public function getDataTreatmentTerdekat()
    {   
        $this->db->select('a.id_treatment_ternak , a.tanggal, b.inisial,b.nomor_tag,
        a.umur_treatment,a.status_treatment, c.nama_treatment, 
        CONCAT(d.nama_kandang, " - Blok ",d.blok) as kandang');
        $this->db->from('treatment_ternak a');
        $this->db->join('ternak b','a.id_ternak = b.id_ternak');
        $this->db->join('master_treatment c','a.id_treatment = c.id_treatment');
        $this->db->join('master_kandang d','b.id_kandang = d.id_kandang');
        $this->db->where('a.tanggal<=','2022-12-14');
        $this->db->order_by('a.tanggal','ASC');
        return $this->db->get()->result();
    }
}
