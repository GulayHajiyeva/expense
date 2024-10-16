<?php $this->load->view('head'); ?>

<div class="container">
	<form action="<?php echo site_url('currency/store'); ?>" method="post">
		<div class="form-group">
			<h2>Add Currency:</h2>
			<label for="currency">Currency:</label>
			<input class="form-control" type="text" name="currency" id="name">
		</div>

		<br>

		<button type="submit" class="btn btn-sm btn-primar">Send</button>
	</form>
</div>