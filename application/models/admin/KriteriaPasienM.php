<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KriteriaPasienM extends CI_Model
{
	private $tabel;

	public function __construct()
	{
		parent::__construct();
		$this->tabel = "tbl_kriteria_pasien";
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

	public function tampil_data_inParameter($oper)
	{
		$query = $this->db->get_where($this->tabel, array('id_kriteria_pasien' => $oper));
		return $query->row_array();
		
	}

	public function hapus_data($id_kriteria_pasien)
	{
		$query = $this->db->where("id_kriteria_pasien", $id_kriteria_pasien);
		$query = $this->db->delete($this->tabel);
		return $query;
	}

	public function edit_data($id_kriteria_pasien, $data)
	{
		$query = $this->db->where("id_kriteria_pasien", $id_kriteria_pasien);
		$query = $this->db->update($this->tabel, $data);
		return $query;
	}
}
