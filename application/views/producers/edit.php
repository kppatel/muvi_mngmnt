<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title></title>
	</head>
	<body>
		<form action="" method="post">
				<fieldset>
				<legend>Edit Producer</legend>
				<label for="name">Name</label>
				<input id="name" name="name" type="text" value="<?php echo $producer['name'] ?>">
				<?php echo form_error('name') ?>
				<br>

				<input type="hidden" name="id" value="<?php echo $producer['id'] ?>">
				<input type="submit" value="Update">
				<input type="reset">
				<?php echo anchor('producers/index', 'Cancel') ?>
				</fieldset>
			</form>
	</body>
</html>