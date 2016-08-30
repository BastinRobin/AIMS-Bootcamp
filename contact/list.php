<?php
	include 'config.php';

	$mysqli = mysqli_connect(HOST, USER, PASSWORD, DB); 

	$result = mysqli_query($mysqli, "SELECT * FROM contact");
?>

<?php include 'header.php' ?>
	<div class="container"  style="padding-top:150px">
	<table class="table table-condensed">
		<thead>
			<tr>
				<th>Name</th>
				<th>Mobile</th>
				<th>Category</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
			while($res = mysqli_fetch_array($result)) { 		
				echo "<tr>";
				echo "<td>".$res['name']."</td>";
				echo "<td>".$res['mobile']."</td>";
				echo "<td>".$res['category']."</td>";	
				echo "<td><a href=\"edit.php?id=$res[id]\" class='btn btn-warning'>Edit</a> | <a href=\"delete.php?id=$res[id]\" class='btn btn-danger' onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
			}
			?>

		</tbody>
	</table>
	</div>
<?php include 'footer.php' ?>
