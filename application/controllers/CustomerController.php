<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CustomerController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CustomerModel');
		$this->load->library('session');
	}

	public function create()
	{
		$this->load->view('customer/create');
	}

	public function store()
	{
		$username = $this->input->post('name');
		$this->session->set_userdata('username', $username);
		$this->CustomerModel->store();
		redirect('currency/create');
	}
}
