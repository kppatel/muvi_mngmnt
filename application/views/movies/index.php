<div class="container">
	<h1>Movies</h1>
	<?php echo anchor('movies/create', 'Create'); ?>
	<?php if (!empty($data)): ?>
		<table class="list">
			<thead>
				<tr>
			<th data-sort="string">Title</th>
			<th data-sort="string">Director</th>
			<th data-sort="string">Producer</th>
			<th data-sort="string">Category</th>
			<th data-sort="string">Actor</th>
			<th data-sort="date">Released Date</th>
			<th colspan="2">Actions</th>
			</tr>
			</thead>

			<tbody>
				<?php foreach ($data as $r): ?>
					<tr>
						<td><?php echo $r['title'] ?></td>
						<td><?php echo $r['director'] ?></td>
						<td><?php echo $r['producer'] ?></td>
						<td><?php echo $r['category'] ?></td>
						<td><?php echo $r['actor'] ?></td>
						<td><?php echo $r['released_date'] ?></td>
						<td align="center"><?php echo anchor('movies/edit/' . $r['id'], 'Edit') ?></td>
						<td align="center"><?php echo anchor('movies/delete/' . $r['id'], 'Delete', array('class' => 'delete')) ?></td>
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
