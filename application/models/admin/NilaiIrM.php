<?php
defined('BASEPATH') or exit('No direct script access allowed');

class NilaiIrM extends CI_Model
{
	private $tabel;

	public function __construct()
	{
		parent::__construct();
		$this->tabel = "tbl_ir";
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
	public function tampil_data_nilai($oper)
	{
		$query = $this->db->get_where($this->tabel, array('ukuran_matrik' => $oper));
		$query = $query->row_array();
		return $query;
	}

	public function hapus_data($id_ir)
	{
		$query = $this->db->where("id_ir", $id_ir);
		$query = $this->db->delete($this->tabel);
		return $query;
	}

	public function edit_data($id_ir, $data)
	{
		$query = $this->db->where("id_ir", $id_ir);
		$query = $this->db->update($this->tabel, $data);
		return $query;
	}
}
