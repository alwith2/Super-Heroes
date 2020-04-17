<?php

require "connection.php";

$method = $_GET["method"];
$id = $_GET["heroes.id"];
$var = $_GET["id"];
// var_dump($var);

$delete = "DELETE FROM heroes WHERE id=".$var; 
     if ($conn->query($delete) === TRUE) {
            echo "Record deleted successfully";
            header("Location: /index.php");
        } else {
         echo "Error deleting record: " . $conn->error;
        }



// $hero1_id = $_GET["hero1_id"];
// $hero2_id = $_GET["hero2_id"];
// $id = $_GET[relationship.id];
// echo $hero1_id;
// var_dump($_GET);

//  function deleteFriend() {
//  $sql ="DELETE FROM relationships
//  WHERE hero1_id = " . $id . " =  type_id = 1";
//  }

// function deleteEnemy() {
//     $sql ="DELETE FROM relationships
//            WHERE hero1_id = " . $id . " =  type_id = 2";
// }


$conn->close();
// header("Location: /index.php");
// header("Location: /hero.php?id=" . $last_id);
?>