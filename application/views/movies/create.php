<form action="" method="post">
	<fieldset>
		<legend><h1>Create Movie</h1></legend>
		<label for="title">Title</label>
		<input id="title" name="title" type="text">
		<?php echo form_error('title') ?>
		<br>

		<label for="category">Category</label>
		<?php echo form_dropdown('category', $category); ?>
		<?php echo form_error('category') ?>
		<br>

		<label for="director">Director</label>
		<?php echo form_dropdown('director', $director, NULL, 'multiple'); ?>
		<?php echo form_error('director') ?>
		<br>

		<label for="producer">Producer</label>
		<?php echo form_dropdown('producer', $producer, NULL, 'multiple'); ?>
		<?php echo form_error('producer') ?>
		<br>

		<label for="actor">Actor</label>
		<?php echo form_dropdown('actor', $actor, NULL, 'multiple'); ?>
		<?php echo form_error('actor') ?>
		<br>

		<label for="released_date">Released Date (DD/MM/YYYY)</label>
		<input id="released_date" name="released_date" type="text">
		<?php echo form_error('released_date') ?>
		<br>

		<input type="submit" value="Create">
		<input type="reset">
		<?php echo anchor('movies/index', 'Cancel') ?>
	</fieldset>
</form>