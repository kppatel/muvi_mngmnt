<form action="" method="post">
	<fieldset>
		<legend><h1>Create Producer</h1></legend>
		<label for="name">Name</label>
		<input id="name" name="name" type="text">
		<?php echo form_error('name') ?>
		<br>

		<input type="submit" value="Create">
		<input type="reset">
		<?php echo anchor('producers/index', 'Cancel') ?>
	</fieldset>
</form>
</body>
</html>
