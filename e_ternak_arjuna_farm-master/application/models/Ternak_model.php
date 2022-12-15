<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ternak_model extends CI_Model
{

    public function getDataternak()
    {
        $this->datatables->select("id_ternak,
        nomor_tag,
        inisial,
        jenis_kelamin,
        CONCAT
        (
            FLOOR((TIMESTAMPDIFF(MONTH, tanggal_lahir, CURDATE()) / 12)), ' tahun ',
            MOD(TIMESTAMPDIFF(MONTH, tanggal_lahir, CURDATE()), 12) , ' bulan'
        ) AS umur,
        ras");
        $this->datatables->from('ternak');
        $this->db->order_by('inisial','ASC');
        return $this->datatables->generate();
    }

    public function getDataTernakByTagInisial($key)
    {
        $this->db->select('*');
        $this->db->from('ternak');
        $this->db->where('nomor_tag', $key);
        $this->db->or_where('inisial', $key);
        return $this->db->get()->row();
    }

    public function getDataTernakUmur($id_ternak)
    {
        $this->db->select("CONCAT
        (
            FLOOR((TIMESTAMPDIFF(MONTH, tanggal_lahir, CURDATE()) / 12)), ' tahun ',
            MOD(TIMESTAMPDIFF(MONTH, tanggal_lahir, CURDATE()), 12) , ' bulan'
        ) AS umur");
        $this->db->from('ternak');
        $this->db->where('id_ternak', $id_ternak);
        return $this->db->get()->row();
    }

    public function getDataTernakUmurTanggal($id_ternak,$tanggal)
    {
        $this->db->select("CONCAT
        (
            FLOOR((TIMESTAMPDIFF(MONTH, tanggal_lahir, ".$tanggal.") / 12)), ' tahun ',
            MOD(TIMESTAMPDIFF(MONTH, tanggal_lahir, ".$tanggal."), 12) , ' bulan'
        ) AS umur");
        $this->db->from('ternak');
        $this->db->where('id_ternak', $id_ternak);
        return $this->db->get()->row();
    }

    public function getDataTernakbobot($id_ternak)
    {
        $this->db->select("bobot");
        $this->db->from('bobot_ternak');
        $this->db->where('id_ternak', $id_ternak);
        return $this->db->get()->row();
    }

    public function getDataternakResult()
    {
        $this->db->select('*');
        $this->db->from('ternak');
        return $this->db->get()->result();
    }
    public function getDataternakJantan()
    {
        $this->db->select('*');
        $this->db->from('ternak');
        $this->db->where('jenis_kelamin', 'jantan');
        return $this->db->get()->result();
    }

    public function getDataternakBapak($id_ternak)
    {
        $this->db->select('*');
        $this->db->from('ternak');
        // $this->db->where('id_ternak', '!='.$id_ternak);
        $this->db->where('jenis_kelamin', 'jantan');
        return $this->db->get()->result();
    }

    public function getDataternakIbu($id_ternak)
    {
        $this->db->select('*');
        $this->db->from('ternak');
        // $this->db->where('id_ternak', '!='.$id_ternak);
        $this->db->where('jenis_kelamin', 'betina');
        return $this->db->get()->result();
    }

    public function getDataternakBetina()
    {
        $this->db->select('*');
        $this->db->from('ternak');
        $this->db->where('jenis_kelamin', 'betina');
        return $this->db->get()->result();
    }

    public function getDataternak_byId($id_ternak)
    {
        $this->db->select('*');
        $this->db->from('ternak');
        $this->db->where('id_ternak', $id_ternak);
        return $this->db->get()->row();
    }

    public function get_data_foto_ternak_by_idternak($id_ternak)
    {
        $this->db->from('ternak_galeri');
        $this->db->where('id_ternak', $id_ternak);
        return $this->db->get();
    }

    public function get_data_foto_ternak_by_id($id)
    {
        $this->db->from('ternak_galeri');
        $this->db->where('id', $id);
        return $this->db->get();
    }

    function delete_foto_ternak($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ternak_galeri');
        return true;
    }
}
