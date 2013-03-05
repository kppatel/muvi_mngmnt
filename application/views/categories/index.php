<?php echo css('base'), css('skeleton'), css('layout') ?>
<ul class="menu">
	<li><?php echo anchor('movies/index', 'Movies'); ?></li>
	<li><?php echo anchor('directors/index', 'Directors'); ?></li>
	<li><?php echo anchor('producers/index', 'Producers'); ?></li>
	<li><?php echo anchor('categories/index', 'Categories'); ?></li>
</ul>
<?php echo anchor('categories/create', 'Create'); ?>
<h3>Categories</h3>
		<?php if(!empty($data)): ?>
		<table class="list">
			<thead>
				<th data-sort="string">Name</th>
				<th colspan="2">Actions</th>
			</thead>

			<tbody>
				<?php foreach ($data as $r): ?>
				<tr>
					<td><?php echo $r['name'] ?></td>
					<td align="center"><?php echo anchor('categories/edit/' . $r['id'], 'Edit') ?></td>
					<td align="center"><?php echo anchor('categories/delete/' . $r['id'], 'Delete') ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php else: ?>
		<p>No records found.</p>
		<?php endif ?>