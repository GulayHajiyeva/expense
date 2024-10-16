<?php $this->load->view('head'); ?>

<div class="container mt-3">
	<h2>Categories</h2>
	<h4>
		<a href="<?= site_url('category/create') ?>" class="btn btn-sm btn-primary">Add</a>
	</h4>
	<table class="table">
		<thead>
			<tr>
				<th>Name</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($categories ?? [] as $category): ?>
				<tr>
					<td>
						<?= $category->name ?>
					</td>
				</tr>
			<?php
			endforeach;
			?>
		</tbody>
	</table>
</div>