<html>
<head>
<title></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>





<?php

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$telNumber = $_POST['telNumber'];

$servername = "localhost:3307";
$username = "root";
$password = "";
$database = "student";

//create connection_aborted
$conn = new mysqli($servername, $username, $password, $database);

//check connection
if ($conn->connect_error) {
	
	die("Connection failed:" . $conn->connect_error);
}
else{
	echo "Connected successfuly";
	
$stmt = $conn->prepare("insert into `contacts`(`firstName`,`lastName`,`telNumber`)
values(?,?,?)");

$stmt->bind_param("sss",$firstName,$lastName,$telNumber);
$execval = $stmt->execute();
echo $execval;
echo "submittes";



mysqli_select_db($conn, "student");
$result = mysqli_query($conn,"SELECT * FROM contacts");

while($row=mysqli_fetch_array($result))
{
	echo "<br/>";

	echo $row["firstName"]."     ".$row["lastName"]."     ".$row["telNumber"];
	echo "<br/>";

}
$stmt->close();
$conn->close();
}

?>
</body>
</html>
