<?php
class CustomerModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function get()
	{
		return $this->db->get('customers')->result();
	}


	public function store()
	{
		$username = $this->input->post('name');
		$phone = $this->input->post('phone');

		$this->db->where('name', $username);
		$this->db->where('phone', $phone);
		$query = $this->db->get('customers');

		if ($query->num_rows() == 0) {

			$data = array(
				'name' => $username,
				'phone' => $phone,
			);

			$this->db->insert('customers', $data);
			$user_id = $this->db->insert_id();
			$this->load->library('session');
			$this->session->set_userdata('customer_id', $user_id);
		} else {
			return  "exist already";
			$existing_user = $query->row();
			$user_id = $existing_user->id;
			$this->load->library('session');
			$this->session->set_userdata('customer_id', $user_id);
		}


	}
}
