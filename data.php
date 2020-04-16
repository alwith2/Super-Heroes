<?php

require "connection.php";
require "header.php";

 echo '<h2>new page</h2>';
$method = $_GET["method"];
$id = $_GET[relationship.id];

// function updateBiography() {}



require 'footer.php';
$conn->close();
header("Location: /hero.php?id=" . $last_id);
?>