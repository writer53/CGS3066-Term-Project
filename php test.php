<?php
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// sql to create table
$sql = "CREATE TABLE Menu (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
foodname VARCHAR(30) NOT NULL,
price VARCHAR(30) NOT NULL,
type VARCHAR(50),
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Menu created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// insert menu
$sql = "INSERT INTO Menu (foodname, price, type)
VALUES ('Pepperoni Pizza', '$50', 'Pizza')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// sql to print table
$query = "SELECT id, foodname, price, type FROM Menu";
$stmt = $conn->query($query);
echo "<table border='1'>";
echo "<tr>";
echo "<th>id</th>";
echo "<th>Food Name</th>";
echo "<th>Price</th>";
echo "<th>Type</th>";
echo "</tr>";
while ( $row = $stmt->fetch(PDO::FETCH_ASSOC) ) {
    echo "<tr>";
    echo "<td>" . $row["id"] . "</td>";
    echo "<td>" . $row["foodname"] . "</td>";
    echo "<td>" . $row["price"] . "</td>";
    echo "<td>" . $row["type"] . "</td>";
    echo "</tr>";
}
echo "</table>";


$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
<title>Add new employee</title>
</head>
<body>
<div>Add a new employee</div>
<form action="" method="post">
<p>First Name:<input type="text" name="first_name" autocomplete="off"></p>
<p>Last Name:<input type="text" name="last_name" autocomplete="off"></p>
<p>Email:<input type="text" name="email" autocomplete="off"></p>
<p>Password:<input type="password" name="password" autocomplete="off"></p>
<p><input type="submit" name="submit" value="Add"/></p>
</form>
</body>
</html>