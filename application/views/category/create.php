<?php $this->load->view('head'); ?>

<div class="container">
	<form action="<?php echo site_url('category/store'); ?>" method="post">
		<div class="form-group">
			<label for="name">Category Name:</label>
			<input class="form-control" type="text" name="name" id="name">
		</div>

		<br>

		<button type="submit" class="btn btn-sm btn-primary">Add Category</button>
	</form>
</div>