<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

require "connection.php";
require "header.php";

$method = $_POST["method"];

// create hero
$name = $_POST["name"];
$about_me = $_POST["about_me"];
$biography = $_POST["biography"];
// $ability = $_POST["ability"];






$sql = "INSERT INTO heroes (name, about_me, biography) VALUES ('$name', '$about_me', '$biography')";
$result = $conn->query($sql);
if ($result === TRUE) {
        $last_id = $conn->insert_id;
         echo $last_id;
}

// $sql = "INSERT INTO abilities (ability) VALUES ('$ability')";
// $result = $conn->query($sql);
// if ($result === TRUE) {
//         $last_id = $conn->insert_id;
//         echo $last_id;
// }
// $sql = "INSERT INTO ability_hero (ability_id) VALUES ('$abilities.id')";
// $result = $conn->query($sql);
// if ($result === TRUE) {
//         $last_id = $conn->insert_id;
//          echo $last_id;
// }


$conn->close();
 header("Location: /hero.php?id=" . $last_id);

//  header("Location: /index.php");
?>