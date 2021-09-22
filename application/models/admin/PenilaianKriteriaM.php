<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenilaianKriteriaM extends CI_Model
{
	private $tabel;

	public function __construct()
	{
		parent::__construct();
		$this->tabel = "tbl_pasangankriteria_ahp";
	}

	public function tambah_dataM($data)
	{
		$query = $this->db->insert($this->tabel, $data);
		return $query;
	}

	public function tampil_data()
	{
		$query = $this->db->query('SELECT tbl_pasangankriteria_ahp.id_pasangan_kriteria, tbl_pasangankriteria_ahp.nilai, baris.nama_kriteria AS "nama_kriteria_baris" , kolom.nama_kriteria AS "nama_kriteria_kolom", tbl_pasangankriteria_ahp.id_kriteria_baris, tbl_pasangankriteria_ahp.id_kriteria_kolom, tbl_pasangankriteria_ahp.id_kriteria_pasien, tbl_kriteria_pasien.nama_kriteria_pasien FROM `tbl_pasangankriteria_ahp` INNER JOIN tbl_kriteria_pasien ON tbl_kriteria_pasien.id_kriteria_pasien = tbl_pasangankriteria_ahp.id_kriteria_pasien INNER JOIN tbl_kriteria_ahp AS baris ON tbl_pasangankriteria_ahp.id_kriteria_baris = baris.id_kriteria_ahp  INNER JOIN tbl_kriteria_ahp AS kolom ON tbl_pasangankriteria_ahp.id_kriteria_kolom = kolom.id_kriteria_ahp ORDER BY tbl_pasangankriteria_ahp.id_pasangan_kriteria ASC ');
		$query = $query->result_array();
		return $query;
	}

	public function tampil_data_inParameter($oper)
	{
		$query = $this->db->query('SELECT tbl_pasangankriteria_ahp.id_pasangan_kriteria, tbl_pasangankriteria_ahp.nilai, baris.nama_kriteria AS "nama_kriteria_baris" , kolom.nama_kriteria AS "nama_kriteria_kolom", tbl_pasangankriteria_ahp.id_kriteria_baris, tbl_pasangankriteria_ahp.id_kriteria_kolom, tbl_pasangankriteria_ahp.id_kriteria_pasien, tbl_kriteria_pasien.nama_kriteria_pasien FROM `tbl_pasangankriteria_ahp` INNER JOIN tbl_kriteria_pasien ON tbl_kriteria_pasien.id_kriteria_pasien = tbl_pasangankriteria_ahp.id_kriteria_pasien INNER JOIN tbl_kriteria_ahp AS baris ON tbl_pasangankriteria_ahp.id_kriteria_baris = baris.id_kriteria_ahp  INNER JOIN tbl_kriteria_ahp AS kolom ON tbl_pasangankriteria_ahp.id_kriteria_kolom = kolom.id_kriteria_ahp WHERE tbl_pasangankriteria_ahp.id_kriteria_pasien="' . $oper . '"');
		$query = $query->result_array();
		return $query;
	}

	public function hapus_data($id_pasangan_kriteria)
	{
		$query = $this->db->where("id_pasangan_kriteria", $id_pasangan_kriteria);
		$query = $this->db->delete($this->tabel);
		return $query;
	}
	public function edit_data($id_pasangan_kriteria, $data)
	{
		$query = $this->db->where("id_pasangan_kriteria", $id_pasangan_kriteria);
		$query = $this->db->update($this->tabel, $data);
		return $query;
	}
	public function update_kriteria($data)
	{
		$this->db->select("*");
		$this->db->where($data);
		$query = $this->db->get($this->tabel);
		$hasil = $query->result_array()[0];
		$count = $query->num_rows();
		$result["hasil"] = $hasil;
		$result["count"] = $count;
		// var_dump($result);
		// die;
		return $result;

	}

}
