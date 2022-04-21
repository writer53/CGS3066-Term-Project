<!DOCTYPE html>
<html>

<head>
	<title>Insert Page page</title>
</head>

<body>
	<center>
		<?php

		// servername => localhost
		// username => root
		// password => empty
		// database name => menu
		$conn = mysqli_connect("localhost", "root", "", "menu");
		
		// Check connection
		if($conn === false){
			die("ERROR: Could not connect. "
				. mysqli_connect_error());
		}
		
		// Taking all 5 values from the form data(input)
		$name = $_REQUEST['food'];
		$price = $_REQUEST['price'];
		$vegan = $_REQUEST['vegan'];
		
		// Performing insert query execution
		// here our table name is college
		$sql = "INSERT INTO menu VALUES ('$food',
			'$price','$vegan')";
		
		if(mysqli_query($conn, $sql)){
			echo "<h3>data stored in a database successfully."
				. " Please browse your localhost php my admin"
				. " to view the updated data</h3>";

			echo nl2br("\n$food\n $price\n "
				. "$vegan\n");
		} else{
			echo "ERROR: Hush! Sorry $sql. "
				. mysqli_error($conn);
		}
		
		// Close connection
		mysqli_close($conn);
		?>
	</center>
</body>

</html>

<?php 

$query = "SELECT price, food, vegan FROM menu";

$stmt = $conn->query($query);

echo "<table border='1'>";
echo "<tr>";
echo "<th>Name</th>";
echo "<th>Price</th>";
echo "<th>Vegan</th>";
echo "</tr>";

while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr>";
    echo "<td>" . $row["food"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["vegan"] . "</td>";
    echo "</tr>";
}

echo "</table>";
$conn = null;
?>