<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Master_treatment_model extends CI_Model {
    
    public function getDataMasterTreatment()
    {
        $this->datatables->select('id_treatment,nama_treatment,keterangan');
        $this->datatables->from('master_treatment');
        return $this->datatables->generate();
    }

    public function getDataMasterTreatmentResult(){
        $this->db->select('*');
        $this->db->from('master_treatment');
        return $this->db->get()->result();
    }

    public function getDataMasterTreatment_byId($id_treatment)
    {
        $this->db->select('*');
        $this->db->from('master_treatment');
        $this->db->where('id_treatment', $id_treatment);
        return $this->db->get();
    }
}