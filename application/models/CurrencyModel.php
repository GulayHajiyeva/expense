<?php
class CurrencyModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db->get('currencies')->result();
	}
	public function store()
	{
		$data = array(
			'name' => $this->input->post('currency'),
		);

		$this->db->insert('currencies', $data);
	}
}
