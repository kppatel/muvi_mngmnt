<form action="" method="post">
	<fieldset>
		<legend><h1>Edit Director</h1></legend>
		<label for="name">Name</label>
		<input id="name" name="name" type="text" value="<?php echo $director['name'] ?>">
		<?php echo form_error('name') ?>
		<br>

		<input type="hidden" name="id" value="<?php echo $director['id'] ?>">
		<input type="submit" value="Update">
		<input type="reset">
		<?php echo anchor('directors/index', 'Cancel') ?>
	</fieldset>
</form>