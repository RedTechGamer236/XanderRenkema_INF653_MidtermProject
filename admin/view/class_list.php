<?php include('header.php')?>

<div class="table-responsive">
	<h1>Vehicle Class List</h1>
	<?php if(!empty($classes)) : ?>
		<table class="table">
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach ($classes as $class) : ?>
			<tr>
				<td><?= htmlspecialchars($class['Class'])?></td>
				<td><form action="." method="post">
					<input type="hidden" name="action" value="delete_class">
					<input type="hidden" name="class_id" value="<?= $class['ID'] ?>">
					<button type="submit">Remove</button>
				</form></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php else : ?>
		<p>No classes available.</p>
	<?php endif; ?>
</div>
<div>
	<h1>Add Vehicle class</h1>
	<form action='.?action=list_classes' method='post' id='add_form'>
		<input type='hidden' name='action' value='add_class'>

		<label>Name:</label>
		<input type="text" name="class_name" />
		<br>
				
		<input type="submit" value="Add class" />
		<br>
	</form>
</div>
<div>
	<p><a href="index.php?action=list_vehicles">View Full Vehicle List</a><br>
		<a href="index.php?action=show_add_form">Click here</a> to add a vehicle.<br>
		<a href="index.php?action=list_makes">View/Edit Vehicle Makes</a><br>
		<a href="index.php?action=list_types">View/Edit Vehicle Types</a></p>
</div>

<?php include('footer.php')?>