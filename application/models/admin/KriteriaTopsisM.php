<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KriteriaTopsisM extends CI_Model
{
	private $tabel;

	public function __construct()
	{
		parent::__construct();
		$this->tabel = "tbl_kriteria_topsis";
	}

}
