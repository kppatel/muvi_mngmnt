
<div class="container">
	<form action="" method="post">
		<fieldset>
			<legend><h1>Edit Movie</h1></legend>
			<label for="title">Title</label>
			<input id="title" name="title" type="text" value="<?php echo $movie['title'] ?>">
			<?php echo form_error('title') ?>
			<br>

			<label for="category">Category</label>
			<?php echo form_dropdown('category', $category, $movie['category_id']); ?>
			<?php echo form_error('category') ?>
			<br>

			<label for="director">Director</label>
			<?php echo form_dropdown('director', $director, $movie['director_id'], 'multiple'); ?>
			<?php echo form_error('director') ?>
			<br>

			<label for="producer">Producer</label>
			<?php echo form_dropdown('producer', $producer, $movie['producer_id'], 'multiple'); ?>
			<?php echo form_error('producer') ?>
			<br>

			<label for="released_date">Released Date (DD/MM/YYYY)</label>
			<input id="released_date" name="released_date" type="text" value="<?php echo $movie['released_date'] ?>">
			<?php echo form_error('released_date') ?>
			<br>

			<input type="hidden" name="id" value="<?php echo $movie['id'] ?>">
			<input type="submit" value="Edit">
			<input type="reset">
			<?php echo anchor('movies/index', 'Cancel') ?>
		</fieldset>
	</form>
</div>
</body>
</html>
