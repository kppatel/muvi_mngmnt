<div class="container">
	<h1>Directors</h1>
	<?php echo anchor('directors/create', 'Create'); ?>
	<?php if (!empty($data)): ?>
		<table class="list">
			<thead>
			<th data-sort="string">Name</th>
			<th colspan="2">Actions</th>
			</thead>

			<tbody>
				<?php foreach ($data as $r): ?>
					<tr>
						<td><?php echo $r['name'] ?></td>
						<td align="center"><?php echo anchor('directors/edit/' . $r['id'], 'Edit') ?></td>
						<td align="center"><?php echo anchor('directors/delete/' . $r['id'], 'Delete', array('class' => 'delete')) ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	<?php else: ?>
		<p>No records found.</p>
	<?php endif ?>
</div>
<?php echo js('jquery'), js('stupidtable') ?>
<script>
	jQuery(function($) {
		$('a.delete').click(function(event) {
			return confirm('Are you sure to delete?');
		});

		$('table.list').stupidtable().bind('aftertablesort', function (event, data) {
			var th = $(this).find("th");
			th.find(".arrow").remove();
			var arrow = data.direction === "asc" ? "&uarr;" : "&darr;";
			th.eq(data.column).append('<span class="arrow">' + arrow +'</span>');
		});
	});
</script>