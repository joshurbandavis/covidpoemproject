<?php

    $adjective1 = $_POST['adjective1'];
    $noun1 = $_POST['noun1'];
    $verb = $_POST['verb'];
    $adjective2 = $_POST['adjective2'];
    $noun2 = $_POST['noun2'];

    $mysql_host = "sarahsud001.mysql.guardedhost.com";
    $mysql_user = "sarahsud001_covidpoemproject";
    $mysql_database = "sarahsud001_covidpoemproject";
    $mysql_password = "!HCP12rt89";

    $conn = new mysqli($mysql_host,$mysql_user,$mysql_password,$mysql_database);

    if($conn->connection_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("INSERT INTO words(adjective1, noun1, verb, adjective2, noun2)
            VALUES(?,?,?,?,?)");
        $stmt->bind_param("sssss", $adjective1, $noun1, $verb, $adjective2, $noun2);
        if ($stmt->execute()) {
            echo "lines sucessfully added";
        } else {
            "Unable to create new record";
        }
        
        $stmt->close();
        $conn->close();
    }
?>

