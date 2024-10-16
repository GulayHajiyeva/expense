<?php $this->load->view('head'); ?>

<div class="container mt-5">
	<h1 class="mb-4">Ödəniş Yaradın</h1>

	<form action="<?php echo site_url('payment/store'); ?>" method="post">
		<div class="mb-3">
			<label>Müştərinin Adı:</label>
			<input type="text" name="customer_name" value="<?php echo $username; ?>" class="form-control"
				style="width: 50%; background-color: #f8f9fa; border: 1px solid #007bff; color: #495057;" readonly>
		</div>

		<div class="mb-3">
			<label for="userCategory" class="form-label">İstifadəçi Kateqoriyası:</label>
			<input type="text" name="payment_category" value="<?php echo $userCategory; ?>" class="form-control"
				style="width: 50%; background-color: #f8f9fa; border: 1px solid #007bff; color: #495057;" readonly>
		</div>

		<div class="mb-3">
			<label for="userCurrency" class="form-label">İstifadəçi Valyutası:</label>
			<input type="text" name="currency" value="<?php echo $userCurrency; ?>" class="form-control"
				style="width: 50%; background-color: #f8f9fa; border: 1px solid #007bff; color: #495057;" readonly>
		</div>

		<div class="mb-3">
			<label for="type" class="form-label">Növ:</label>
			<select name="type" id="type" class="form-select" required>
				<option value="" disabled selected>Seçin</option>
				<option value="1">Mədaxil</option>
				<option value="2">Məxaric</option>
			</select>
		</div>

		<div class="mb-3">
			<label for="amount" class="form-label">Məbləğ:</label>
			<input type="text" name="amount" id="amount" class="form-control" required>
		</div>

		<div class="mb-3">
			<label for="remark" class="form-label">Qeyd:</label>
			<input type="text" name="remark" id="remark" class="form-control">
		</div>

		<button type="submit" class="btn btn-primary">Əlavə et</button>
	</form>
</div>