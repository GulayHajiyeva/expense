<?php
defined('BASEPATH') or exit('No direct script access allowed');

class CategoryController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('CategoryModel');
		$this->load->library('session');
	}

	public function create()
	{
		$this->load->view('category/create');
	}

	public function store()
	{
		$userCategory = $this->input->post('name');
		$this->session->set_userdata('userCategory', $userCategory);
		$this->CategoryModel->store();

		redirect('customer/create');
	}

	public function show()
	{
		$data['categories'] = $this->CategoryModel->get();

		$this->load->view('category/show', $data);
	}
}
