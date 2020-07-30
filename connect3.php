<?php
$servername = "sarahsud001.mysql.guardedhost.com";
$database = "sarahsud001_covidpoemproject";
$username = "sarahsud001_covidpoemproject";
$password = "!HCP12rt89";

$sql = "mysql:host=$servername;dbname=$database;";
$dsn_Options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];

// Create a new connection to the MySQL database using PDO, $my_Db_Connection is an object
try { 
  $my_Db_Connection = new PDO($sql, $username, $password, $dsn_Options);
  //echo "Connected successfully";
} catch (PDOException $error) {
  echo 'Connection error: ' . $error->getMessage();
}

// Set the variables for the person we want to add to the database
$adjective1 = $_POST['adjective1'];
$noun1 = $_POST['noun1'];
$verb = $_POST['verb'];
$adjective2 = $_POST['adjective2'];
$noun2 = $_POST['noun2'];


// Here we create a variable that calls the prepare() method of the database object
// The SQL query you want to run is entered as the parameter, and placeholders are written like this :placeholder_name
$my_Insert_Statement = $my_Db_Connection->prepare("INSERT INTO Poetry (adjective1, noun1, verb, adjective2, noun2) VALUES (?,?,?,?,?)");

// Execute the query using the data we just defined
// The execute() method returns TRUE if it is successful and FALSE if it is not, allowing you to write your own messages here
if ($my_Insert_Statement->execute([$adjective1, $noun1, $verb, $adjective2, $noun2])) {
  //echo "New record created successfully";
  header("Location: /read.php");
} else {
  echo "Unable to create record";
}

?>