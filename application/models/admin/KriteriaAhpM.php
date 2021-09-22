<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KriteriaAhpM extends CI_Model
{
	private $tabel;

	public function __construct()
	{
		parent::__construct();
		$this->tabel = "tbl_kriteria_ahp";
	}

	public function tambah_dataM($data)
	{
		$query = $this->db->insert($this->tabel, $data);
		return $query;
	}

	public function tampil_data()
	{
		$query = $this->db->get($this->tabel);
		$query = $query->result_array();
		return $query;
	}

	public function hapus_data($id_kriteria)
	{
		$query = $this->db->where("id_kriteria_ahp", $id_kriteria);
		$query = $this->db->delete($this->tabel);
		return $query;
	}

	public function edit_data($id_kriteria_ahp, $data)
	{
		$query = $this->db->where("id_kriteria_ahp", $id_kriteria_ahp);
		$query = $this->db->update($this->tabel, $data);
		return $query;
	}
}
