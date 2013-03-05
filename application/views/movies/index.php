<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
		<?php echo css('base'), css('skeleton'), css('layout') ?>
	</head>
	<body>
		<div class="container">
		<h1>Movie Management</h1>
		
		<br>
		<?php echo anchor('movies/create', 'Create'); ?>
		<br>
		<h3>Movies</h3>
		<?php if(!empty($data)): ?>
		<table class="list">
			<thead>
				<th>Title</th>
				<th>Director</th>
				<th>Producer</th>
				<th>Category</th>
				<th>Released Date</th>
				<th colspan="2">Actions</th>
			</thead>

			<tbody>
				<?php foreach ($data as $r): ?>
				<tr>
					<td><?php echo $r['title'] ?></td>
					<td><?php echo $r['director'] ?></td>
					<td><?php echo $r['producer'] ?></td>
					<td><?php echo $r['category'] ?></td>
					<td><?php echo $r['released_date'] ?></td>
					<td align="center"><?php echo anchor('movies/edit/' . $r['id'], 'Edit') ?></td>
					<td align="center"><?php echo anchor('movies/delete/' . $r['id'], 'Delete') ?></td>
				</tr>
				<?php endforeach ?>
			</tbody>
		</table>
		<?php else: ?>
		<p>No records found.</p>
		<?php endif ?>
</div>
	</body>
</html>
