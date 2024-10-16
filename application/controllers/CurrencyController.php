<?php
defined('BASEPATH') or exit('No direct script access allowed');

class 	CurrencyController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CurrencyModel');
		$this->load->library('session');
	}

	public function create()
	{
		$this->load->view('currency/create');
	}

	public function store()
	{
		$userCurrency = $this->input->post('currency');
		$this->session->set_userdata('userCurrency', $userCurrency);
		$this->CurrencyModel->store();

		redirect('payment/create');
	}
}