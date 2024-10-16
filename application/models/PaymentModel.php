<?php
class PaymentModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function store()
	{
		$category_name = $this->session->userdata('userCategory');
		$currency_name = $this->session->userdata('userCurrency');
		$customer_name = $this->session->userdata('username');

		$category = $this->db->get_where('categories', ['name' => $category_name])->row();
		$currency = $this->db->get_where('currencies', ['name' => $currency_name])->row();
		$customer = $this->db->get_where('customers', ['name' => $customer_name])->row();

		if ($category && $currency && $customer) {
			$data = array(
				'amount' => $this->input->post('amount'),
				'category_id' => $category->id,  
				'currency_id' => $currency->id,  
				'type' => $this->input->post('type'),
				'customer_id' => $customer->id,  
				'remark' => $this->input->post('remark')
			);

			$inserted = $this->db->insert('payments', $data);

			
			if ($inserted) {
				echo "Məlumat uğurla əlavə edildi!";
			} else {
			
				echo "Məlumat daxil edilə bilmədi. Xəta: " . $this->db->error();
			}
		} else {
		
			echo "Məlumatlar tapılmadı və ya səhvdir.";
		}
	}

	public function getByCustomerId($customer_id)
	{
		$this->db->select(
			'
			customers.name as customer_name, 
			categories.name as category_name, 
			currencies.name as currency_name, 
			SUM(CASE WHEN payments.type = "income" THEN payments.amount ELSE 0 END) as total_income, 
			SUM(CASE WHEN payments.type = "expense" THEN payments.amount ELSE 0 END) as total_expense,
			(SUM(CASE WHEN payments.type = "income" THEN payments.amount ELSE 0 END) - 
			 SUM(CASE WHEN payments.type = "expense" THEN payments.amount ELSE 0 END)) as balance'
		);
		$this->db->from('payments');
		$this->db->join('customers', 'customers.id = payments.customer_id', 'left');
		$this->db->join('categories', 'categories.id = payments.category_id', 'left');
		$this->db->join('currencies', 'currencies.id = payments.currency_id', 'left');

	
		$this->db->where('payments.customer_id', $customer_id);

	
		$this->db->group_by(['payments.customer_id', 'payments.category_id']); // Yeni əlavə

		$query = $this->db->get();
		return $query->result();
	}




	public function getAll($start_date = null, $end_date = null, $category_id = null, $customer_id = null, $currency_id = null)
	{
		$this->db->select(
			'
			customers.name as customer_name, 
			categories.name as category_name, 
			currencies.name as currency_name, 
			SUM(CASE WHEN payments.type = "income" THEN payments.amount ELSE 0 END) as total_income, 
			SUM(CASE WHEN payments.type = "expense" THEN payments.amount ELSE 0 END) as total_expense,
			(SUM(CASE WHEN payments.type = "income" THEN payments.amount ELSE 0 END) - 
			 SUM(CASE WHEN payments.type = "expense" THEN payments.amount ELSE 0 END)) as balance'
		);
	
		$this->db->from('payments');
		$this->db->join('customers', 'customers.id = payments.customer_id', 'left');
		$this->db->join('categories', 'categories.id = payments.category_id', 'left');
		$this->db->join('currencies', 'currencies.id = payments.currency_id', 'left');
	
		if ($start_date && $end_date) {
			$this->db->where('payments.date >=', $start_date);
			$this->db->where('payments.date <=', $end_date);
		}
		if ($category_id) {
			$this->db->where('payments.category_id', $category_id);
		}
		if ($customer_id) {
			$this->db->where('payments.customer_id', $customer_id);
		}
		if ($currency_id) {
			$this->db->where('payments.currency_id', $currency_id);
		}
	

		$this->db->group_by(['payments.customer_id', 'payments.category_id']);
	
		$query = $this->db->get();
		return $query->result();
	}
	
}
