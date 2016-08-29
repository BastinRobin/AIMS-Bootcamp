<?php 
	
	include 'function.php';
	
	// Constants
	define('HOST', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', 'xyz');


	// General syntax
	$name = "Bastin Robin";


	// Examples of variable
	$bucket_a = "Water";
	$bucket_b = "Milk";
 
	$bucket_c = $bucket_a;
	$bucket_a = $bucket_b;
	$bucket_b = $bucket_c;

	$a = array($bucket_a, $bucket_b);

	// Array 
	$fnames = ["Robin", "Mike", "Jack", "Sam", "Bastin", "Salman"];
	$lnames = ["Bastin", "J", "Ma", "Daniel", "Robin", "Khan"];

	$marks = [100, 90, 80, 50, 60, 70];

	$people = array(
		array("name" => "Bastin", "marks" => 100),
		array("name" => "Mike", "marks" => 90),
		array("name" => "Jack", "marks" => 80),
		array("name" => "Sam", "marks" => 50),
		array("name" => "Robin", "marks" => 50)

	);

	$people[0]['name'];
	$people[0]['marks'];


	$people[1]['name'];
	$people[1]['marks'];

?>

<table>
	<thead>
		<tr>
			<th>Index</th>
			<th>Names</th>
			<th>Basic Pay</th>
			<th>Total Pay with Bonus</th>
		</tr>
	</thead>
	<tbody>
		<?php for($i=0; $i < count($fnames); $i++) { ?>
		<tr>
			<td><?php echo $i; ?></td>
			<td><?php echo get_full_name($fnames[$i], $lnames[$i]) ?></td>
			<td><?php echo $marks[$i] ?></td>
			<td><?php echo calculate_bonus($marks[$i]) ?></td>

		</tr>
		<?php } ?>
	</tbody>
</table>


for($i=0; $i<count($emails); $i++) {
	$email = $emails[$i];
	$name = $email;
	
	$message ="Hi ". $name ." How are you!";
	Mail::send($email, $message);

	
}
