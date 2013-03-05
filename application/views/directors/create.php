<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
	</head>
	<body>
		<form action="" method="post">
			<fieldset>
			<legend>Create Director</legend>
			<label for="name">Name</label>
			<input id="name" name="name" type="text">
			<?php echo form_error('name') ?>
			<br>

			<input type="submit" value="Create">
			<input type="reset">
			<?php echo anchor('directors/index', 'Cancel') ?>
			</fieldset>
		</form>
	</body>
</html>
