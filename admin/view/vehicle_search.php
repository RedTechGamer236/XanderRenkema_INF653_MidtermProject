<?php include('header.php')?>

<section>
	<form action='index.php' method="post">
		<input type="hidden" name="action" value="list_vehicles">
		<select name="make">
			<option value="0">View All Makes</option>
			<?php if(!empty($makes)) : ?>
				<?php foreach ($makes as $make) : ?>
					<option value=<?= htmlspecialchars($make['ID'])?> <?php if(isset($_POST['make']) && $_POST['make'] == $make['ID'])
						echo 'selected'; ?>><?= htmlspecialchars($make['Make'])?></option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
		<br>
		<select name="type">
			<option value="0">View All Types</option>
			<?php if(!empty($types)) : ?>
				<?php foreach ($types as $type) : ?>
					<option value=<?= htmlspecialchars($type['ID'])?> <?php if(isset($_POST['type']) && $_POST['type'] == $type['ID'])
						echo 'selected'; ?>><?= htmlspecialchars($type['Type'])?></option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
		<br>
		<select name="class">
			<option value="0">View All Classes</option>
			<?php if(!empty($classes)) : ?>
				<?php foreach ($classes as $class) : ?>
					<option value=<?= htmlspecialchars($class['ID'])?> <?php if(isset($_POST['class']) && 
						$_POST['class'] == $class['ID']) echo 'selected'; ?>><?= htmlspecialchars($class['Class'])?></option>
				<?php endforeach; ?>
			<?php endif; ?>
		</select>
		<br>
		<input type="radio" name="sort" value="price" checked <?php if(isset($_POST['sort']) && $_POST['sort'] == 'price')
			echo 'checked'; ?>> Price
		<input type="radio" name="sort" value="year" <?php if(isset($_POST['sort']) && $_POST['sort'] == 'year')
			echo 'checked'; ?>> Year
		<button type="submit">Submit</button>
	</form>
</section>
<section>
	<?php if(!empty($vehicles)) : ?>
		<table>
			<tr>
				<th>Year</th>
				<th>Make</th>
				<th>Model</th>
				<th>Type</th>
				<th>Class</th>
				<th>Price</th>
			</tr>
			<?php foreach ($vehicles as $vehicle) : ?>
			<tr>
				<td><?= htmlspecialchars($vehicle['year'])?></td>
				<td><?= htmlspecialchars(get_make_name($vehicle['make_id']))?></td>
				<td><?= htmlspecialchars($vehicle['model'])?></td>
				<td><?= htmlspecialchars(get_type_name($vehicle['type_id']))?></td>
				<td><?= htmlspecialchars(get_class_name($vehicle['class_id']))?></td>
				<td><?= htmlspecialchars($vehicle['price'])?></td>
			</tr>
		<?php endforeach; ?>
		</table>
	<?php else : ?>
		<p>No vehicles available for purchase.</p>
	<?php endif; ?>
</section>
<section>
<a href="index.php">View Full Vehicle List</a>
</section>

<?php include('footer.php')?>