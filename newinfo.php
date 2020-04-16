<?php

require "connection.php";
require "header.php";

// echo '<h2>new page</h2>';
$method = $_POST["method"];
// echo $_GET["name"];

$name = $_POST["name"];
$about_me = $_POST["about_me"];
$biography = $_POST["biography"];
// echo $name;
 

$sql = "INSERT INTO heroes (name, about_me, biography) VALUES ('$name', '$about_me', '$biography')";
$result = $conn->query($sql);
if ($result === TRUE) {
        $last_id = $conn->insert_id;
        // echo $last_id;
}


require 'footer.php';
$conn->close();
header("Location: /hero.php?id=" . $last_id);

// header("Location: /index.php");
?>