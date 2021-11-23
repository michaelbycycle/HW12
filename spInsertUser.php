<html>
<body>
<?php


$host = "saffron.arvixe.com"; // this is the server name
$user = "mart461HCL";
$pass = "mart461HCL";
$db = "mart461hcl";
$dsn = "mysql:host=$host;dbname=$db";

$conn=new PDO($dsn, $user, $pass,[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);


//Insert User through Stored Procedure
$username = "JerseyWade";
$email = "Wade@hotmail.com";
$mypassword = "test123";


$sql = 'CALL spInsertUser_wade(:Myusername, :email, :hidden_key)';

$stmt = $conn->prepare($sql);

$stmt->bindParam(':Myusername', $username, PDO::PARAM_STR);
$stmt->bindParam(':email', $email, PDO::PARAM_STR);
$stmt->bindParam(':hidden_key', $mypassword, PDO::PARAM_STR);

$stmt->execute();

$stmt->closeCursor();

/*Display users

require('mysqlconnection.php');

$sql = "SELECT userid, email, hidden_key FROM wade_users";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "Username: " . $row["Myusername"]. " email: " . $row["email"]. " - password: " . $row["hidden_key"]."<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
*/

?>