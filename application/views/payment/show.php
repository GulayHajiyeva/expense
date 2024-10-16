<?php $this->load->view('head'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Payment Info</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
	<div class="container mt-5">
		<h2>User Payment Information</h2>
		<h4>
			<a href="<?= site_url('category/create') ?>" class="btn btn-sm btn-success">Add</a>
		</h4>
		<?php if (!empty($session_payments)): ?>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>User Name</th>
						<th>Category</th>
						<th>Currency</th>
						<th>Total Income</th>
						<th>Total Expense</th>
						<th>Balance</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($session_payments as $payment): ?>
						<tr>
							<td><?php echo $payment->customer_name; ?></td>
							<td><?php echo $payment->category_name; ?></td>
							<td><?php echo $payment->currency_name; ?></td>
							<td><?php echo number_format($payment->total_income, 2); ?></td>
							<td><?php echo number_format($payment->total_expense, 2); ?></td>
							<td><?php echo number_format($payment->balance, 2); ?></td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		<?php else: ?>
			<p>No payment information found for this user.</p>
		<?php endif; ?>
	</div>
</body>

</html>
