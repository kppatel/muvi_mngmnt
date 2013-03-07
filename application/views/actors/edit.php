<form action="" method="post">
	<fieldset>
		<legend><h1>Edit Actor</h1></legend>
		<label for="name">Name</label>
		<input id="name" name="name" type="text" value="<?php echo $actor['name'] ?>">
		<?php echo form_error('name') ?>
		<br>

		<label for="gender">Gender</label>
		<?php $options = array(
                  'Male'  => 'Male',
                  'Female'    => 'Female'
                );
		echo form_dropdown('gender', $options, $actor['gender']);?>
		<br>

		<input type="hidden" name="id" value="<?php echo $actor['id'] ?>">
		<input type="submit" value="Update">
		<input type="reset">
		<?php echo anchor('actors/index', 'Cancel') ?>
	</fieldset>
</form>
