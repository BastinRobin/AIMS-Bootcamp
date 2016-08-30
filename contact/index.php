<?php include 'header.php'; ?>
	<div class="container" style="padding-top:150px">
		<div class="col-md-6">
			<h3>Add Contacts</h3>
			<form action="process.php" method="POST">
				<div class="form-group">
					<label>Name:</label>
					<input type="text" class="form-control" name="name" required>
				</div>
				<div class="form-group">
					<label>Mobile:</label>
					<input type="text" class="form-control" name="mobile" required>	
				</div>
				<div class="form-group">
					<label>Category</label>
					<select name="category" class="form-control">
						<option>Student</option>
						<option>Teacher</option>
						<option>Parents</option>
					</select>
				</div>
				<div class="form-group">
					<button type="submit" class="btn btn-success">Add</button>
				</div>
			</form>
		</div>
	</div>
<?php include 'footer.php'; ?>
