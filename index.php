<?php
// Include the database connection file
require_once("dbConnection.php");

// Fetch data in descending order (latest entry first)
$stmt = $pdo->query("SELECT * FROM users ORDER BY id DESC");
?>

<html>
<head>	
	<title>Homepage</title>
</head>

<body>
	<h2>Homepage</h2>
	<p>
		<a href="add.php">Add New Data</a>
		<br>
		<a href="about.php">About</a>
		<br>
	</p>
	<table width='80%' border=0>
		<tr bgcolor='#DDDDDD'>
			<td><strong>Name</strong></td>
			<td><strong>Age</strong></td>
			<td><strong>Email</strong></td>
			<td><strong>Action</strong></td>
		</tr>
		<?php
		// Fetch each row as an associative array
		while ($res = $stmt->fetch(PDO::FETCH_ASSOC)) {
			echo "<tr>";
			echo "<td>" . htmlspecialchars($res['name']) . "</td>";
			echo "<td>" . htmlspecialchars($res['age']) . "</td>";
			echo "<td>" . htmlspecialchars($res['email']) . "</td>";	
			echo "<td>
					<a href=\"edit.php?id={$res['id']}\">Edit</a> | 
					<a href=\"delete.php?id={$res['id']}\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
				  </td>";
		}
		?>
	</table>
</body>
</html>
