<?php include('header.php')?>

<div class="table-responsive">
	<h1>Vehicle Make List</h1>
	<?php if(!empty($makes)) : ?>
		<table class="table">
			<tr>
				<th>Name</th>
			</tr>
			<?php foreach ($makes as $make) : ?>
			<tr>
				<td><?= htmlspecialchars($make['Make'])?></td>
				<td><form action="." method="post">
					<input type="hidden" name="action" value="delete_make">
					<input type="hidden" name="make_id" value="<?= $make['ID'] ?>">
					<button type="submit">Remove</button>
				</form></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php else : ?>
		<p>No makes available.</p>
	<?php endif; ?>
</div>
<div>
	<h1>Add Vehicle make</h1>
	<form action='.?action=list_makes' method='post' id='add_form'>
		<input type='hidden' name='action' value='add_make'>

		<label>Name:</label>
		<input type="text" name="make_name" />
		<br>
				
		<input type="submit" value="Add make" />
		<br>
	</form>
</div>
<div>
	<p><a href="index.php?action=list_vehicles">View Full Vehicle List</a><br>
		<a href="index.php?action=show_add_form">Click here</a> to add a vehicle.<br>
		<a href="index.php?action=list_types">View/Edit Vehicle Types</a><br>
		<a href="index.php?action=list_classes">View/Edit Vehicle Classes</a></p>
</div>

<?php include('footer.php')?>