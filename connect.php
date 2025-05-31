<?php
$name = $_POST['name'];
$review = $_POST['rev'];

$conn = new mysqli('localhost', 'root', '', 'test');
if ($conn->connect_error) {
   echo "$conn->connect_error";
   die("Connection Failed : " . $conn->connect_error);
} else {
   $stmt = $conn->prepare("insert into registration(name, review) values(?, ?)");
   $stmt->bind_param("ss", $name, $review);
   $execval = $stmt->execute();
   echo $execval;
   echo "Registration successfully...";
   $stmt->close();
   $conn->close();
}
?>