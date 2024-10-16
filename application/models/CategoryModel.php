<?php
class CategoryModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db->get('categories')->result();
	}

	public function store()
	{
		$data = array(
			'name' => $this->input->post('name')
		);

		$this->db->insert('categories', $data);
	}
}
