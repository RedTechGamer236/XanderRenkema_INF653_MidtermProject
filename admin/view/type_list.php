<?php include('header.php')?>

<div class="table-responsive">
	<h1>Vehicle Type List</h1>
	<?php if(!empty($types)) : ?>
		<table class="table">
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach ($types as $type) : ?>
			<tr>
				<td><?= htmlspecialchars($type['Type'])?></td>
				<td><form action="." method="post">
					<input type="hidden" name="action" value="delete_type">
					<input type="hidden" name="type_id" value="<?= $type['ID'] ?>">
					<button type="submit">Remove</button>
				</form></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php else : ?>
		<p>No types available.</p>
	<?php endif; ?>
</div>
<div>
	<h1>Add Vehicle type</h1>
	<form action='.?action=list_types' method='post' id='add_form'>
		<input type='hidden' name='action' value='add_type'>

		<label>Name:</label>
		<input type="text" name="type_name" />
		<br>
				
		<input type="submit" value="Add type" />
		<br>
	</form>
</div>
<div>
	<p><a href="index.php?action=list_vehicles">View Full Vehicle List</a><br>
		<a href="index.php?action=show_add_form">Click here</a> to add a vehicle.<br>
		<a href="index.php?action=list_makes">View/Edit Vehicle Makes</a><br>
		<a href="index.php?action=list_classes">View/Edit Vehicle Classes</a></p>
</div>

<?php include('footer.php')?>