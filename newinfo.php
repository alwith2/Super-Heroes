<?php

require "connection.php";


$method = $_POST["method"];
$methodAbility= $_POST["methodAbility"];

// create hero
$name = $_POST["name"];
$about_me = $_POST["about_me"];
$biography = $_POST["biography"];
$ability = $_POST["ability"];
// edit abilities
$abilities = $_POST["methodAbility"];
// echo $name;

$edit = "UPDATE abilities SET ability='$abilities' WHERE id=".$id;     
    if ($conn->query($edit) === TRUE) {
            echo "Record updated successfully";
            header("Location: /index.php");
        } else {
            echo "Error updating record: " . $conn->error;
        }

$sql = "INSERT INTO heroes (name, about_me, biography) VALUES ('$name', '$about_me', '$biography')";
$result = $conn->query($sql);
if ($result === TRUE) {
        $last_id = $conn->insert_id;
        // echo $last_id;
}

$sql = "INSERT INTO abilities (ability) VALUES ('$ability')";
$result = $conn->query($sql);
if ($result === TRUE) {
        $last_id = $conn->insert_id;
        // echo $last_id;
}
$sql = "INSERT INTO ability_hero (ability_id) VALUES ('$abilities.id')";
$result = $conn->query($sql);
if ($result === TRUE) {
        $last_id = $conn->insert_id;
        // echo $last_id;
}


$conn->close();
header("Location: /hero.php?id=" . $last_id);

//  header("Location: /index.php");
?>