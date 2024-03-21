<?php include 'header.php'; ?>
			<h1>Add Vehicle</h1>
			<form action="index.php" method="post" id="add_form">
				<input type="hidden" name="action" value="add_vehicle">
				
				<label>Class:</label>
				<select name="make_id">
				<?php foreach ($makes as $make) :?>
					<option value="<?= htmlspecialchars($make['ID'])?>">
						<?= $make['Make']?>
					</option>
				<?php endforeach; ?>
				</select>
				<br>
				
				<label>Type:</label>
				<select name="type_id">
				<?php foreach ($types as $type) :?>
					<option value="<?= htmlspecialchars($type['ID'])?>">
						<?= $type['Type']?>
					</option>
				<?php endforeach; ?>
				</select>
				<br>
				
				<label>Class:</label>
				<select name="class_id">
				<?php foreach ($classes as $class) :?>
					<option value="<?= htmlspecialchars($class['ID'])?>">
						<?= $class['Class']?>
					</option>
				<?php endforeach; ?>
				</select>
				<br>
				
				<label>Year:</label>
				<input type="text" name="year" />
				<br>
				
				<label>Model:</label>
				<input type="text" name="model" />
				<br>
				
				<label>Price:</label>
				<input type="text" name="price" />
				<br>
				
				<input type="submit" value="Add Vehicle" />
				<br>
			</form>

			<p><a href="index.php?action=list_vehicles">View Full Vehicle List</a><br>
			<a href="index.php?action=list_makes">View/Edit Vehicle Makes</a><br>
			<a href="index.php?action=list_types">View/Edit Vehicle Types</a><br>
			<a href="index.php?action=list_classes">View/Edit Vehicle Classes</a></p>

<?php include 'footer.php';?>