<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PaymentController extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PaymentModel');
		$this->load->model('CustomerModel');
		$this->load->model('CategoryModel');
		$this->load->model('CurrencyModel');
		$this->load->library('session');
	}

	public function create()
	{
		$username = $this->session->userdata('username');
		$userCategory = $this->session->userdata('userCategory');
		$userCurrency = $this->session->userdata('userCurrency');

		$data = array(
			'username' => $username,
			'userCategory' => $userCategory,
			'userCurrency' => $userCurrency
		);

		$this->load->view('payment/create', $data);
	}


	public function store()
	{
		$this->PaymentModel->store(); // Call the model's store method
		redirect('payment/show'); // Redirect to the show method to display payments
	}

	public function show()
	{
		// Get the customer ID from the session
		$customer_id = $this->session->userdata('customer_id');

		if ($customer_id) {
			// Fetch user-specific data
			$data['session_payments'] = $this->PaymentModel->getByCustomerId($customer_id);
			// Optionally, debug to check if the ID is correctly stored in the session
			// Check if the ID is correctly stored in the session
			// Load the view to display the user's payment information
			$this->load->view('payment/show', $data);
		} else {
			// If customer ID is not set, show a message or redirect
			echo "No user found in the session."; // Or redirect to an appropriate page
		}
	}



	public function showAll()
	{
		$start_date = $this->input->get('start_date');
		$end_date = $this->input->get('end_date');
		$category_id = $this->input->get('category_id');
		$customer_id = $this->input->get('customer_id');
		$currency_id = $this->input->get('currency_id');

		$data['payments'] = $this->PaymentModel->getAll($start_date, $end_date, $category_id, $customer_id, $currency_id);

		$data['categories'] = $this->CategoryModel->get(); 
		$data['customers'] = $this->CustomerModel->get(); 
		$data['currencies'] = $this->CurrencyModel->get();

		$this->load->view('payment/showAll', $data);
	}



	// public function filter()
	// {
	// 	$start_date = $this->input->post('start_date');
	// 	$end_date = $this->input->post('end_date');
	// 	$category_id = $this->input->post('category_id');
	// 	$customer_id = $this->input->post('customer_id');
	// 	$currency_id = $this->input->post('currency_id');

	// 	$data['payments'] = $this->PaymentModel->get($start_date, $end_date, $category_id, $customer_id, $currency_id);
	// 	$this->load->view('payment/show', $data);
	// }
}
