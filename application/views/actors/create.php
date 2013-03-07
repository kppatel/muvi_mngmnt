<form action="" method="post">
	<fieldset>
		<legend><h1>Create Actor</h1></legend>
		<label for="name">Name</label>
		<input id="name" name="name" type="text">
		<?php echo form_error('name') ?>
		<br>

		<label for="gender">Gender</label>
		<?php $options = array(
                  'Male'  => 'Male',
                  'Female'    => 'Female'
                );
		echo form_dropdown('gender', $options);?>
		<br>

		<input type="submit" value="Create">
		<input type="reset">
		<?php echo anchor('actors/index', 'Cancel') ?>
	</fieldset>
</form>
