<?php $this->load->view('head'); ?>
<div class="container mt-3">
	<h2>User Payment Information</h2>

	<form method="get" action="<?= site_url('payment/showAll') ?>" class="mb-4">
		<div class="form-row">
			<div class="form-group col-md-3">
				<label for="start_date">Start Date</label>
				<input type="date" class="form-control" id="start_date" name="start_date">
			</div>
			<div class="form-group col-md-3">
				<label for="end_date">End Date</label>
				<input type="date" class="form-control" id="end_date" name="end_date">
			</div>
			<div class="form-group col-md-3">
				<label for="category_id">Category</label>
				<select id="category_id" name="category_id" class="form-control">
					<option value="">Select Category</option>
					<?php foreach ($categories as $category): ?>
						<option value="<?= $category->id ?>"><?= $category->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label for="customer_id">Customer</label>
				<select id="customer_id" name="customer_id" class="form-control">
					<option value="">Select Customer</option>
					<?php foreach ($customers as $customer): ?>
						<option value="<?= $customer->id ?>"><?= $customer->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="form-group col-md-3">
				<label for="currency_id">Currency</label>
				<select id="currency_id" name="currency_id" class="form-control">
					<option value="">Select Currency</option>
					<?php foreach ($currencies as $currency): ?>
						<option value="<?= $currency->id ?>"><?= $currency->name ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-primary">Filter</button>
	</form>

	<?php if (!empty($payments)): ?>
		<table class="table">
			<thead>
				<tr>
					<th>Name</th>
					<th>Category</th>
					<th>Income (Currency)</th>
					<th>Expense (Currency)</th>
					<th>Balance</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($payments as $payment): ?>
					<tr>
						<td><?php echo $payment->customer_name; ?></td>
						<td><?php echo $payment->category_name; ?></td>
						<td><?php echo $payment->total_income . ' ' . $payment->currency_name; ?></td>
						<td><?php echo $payment->total_expense . ' ' . $payment->currency_name; ?></td>
						<td><?php echo $payment->balance . ' ' . $payment->currency_name; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php else: ?>
		<p>No records found.</p>
	<?php endif; ?>
	<br>
	<?php if (!empty($payments)): ?>
		<div class="mb-4">
			<h4>Total Calculation</h4>
			<p><strong>Total Income:</strong>
				<?= array_sum(array_column($payments, 'total_income')) . ' ' . $payments[0]->currency_name; ?></p>
			<p><strong>Total Expense:</strong>
				<?= array_sum(array_column($payments, 'total_expense')) . ' ' . $payments[0]->currency_name; ?></p>
			<p><strong>Total Balance:</strong>
				<?= array_sum(array_column($payments, 'balance')) . ' ' . $payments[0]->currency_name; ?></p>
		</div>
	<?php endif; ?>
</div>
