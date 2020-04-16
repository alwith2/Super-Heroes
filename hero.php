<?php
require "connection.php";
require "header.php";

$id = $_GET["id"];

$sql = "SELECT * FROM heroes WHERE id = " . $id;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $output .=
            ' <div class="jumbotron">
       <div class="row text-justify-center mt-3">
       <div class="col-6">
        <h1 class="display-4">' . $row["name"] . '</h1>
        <p class="lead"></p>
        </div>
        <div class="col-6">
        <img class="card-img-top" style="width:300px;height:300px;" src=' . $row["image_url"] . ' />
        </div>
      </div>
        <hr class="my-4">
        <p>' . $row["biography"] . '</p>
        <a class="btn btn-primary btn-lg" href="#" role="button">Add Friend</a>
      </div>';
    }
    echo $output;
} else {
    echo "0 results";
}

?>

<!-- <div class="row">
    <div class="row m-3 p-3">
        <div class="card mb-3 border border-dark" style="max-width: 540px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <h5>Friends</h5>
                </div>
                <div class="card-body border border-dark">

                    <p class="card-text">
                        <?php echo $row[name]; ?>
                    </p>
                    <img class="card-img-top" style="width:50px;height:50px;" src='.$row["image_url"].' /></p>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="row">
<div class="card p-3" style="width: 300rem;">
<?php

echo "<h5>Friends</h5>";
$sql = "SELECT * FROM relationships
INNER JOIN heroes on relationships.hero2_id=heroes.id
WHERE (hero1_id = " . $id . ") AND (type_id = 1);";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output = "";
    while ($row = $result->fetch_assoc()) {
         $output .=  "<li class='pl-3'>$row[name]</li>";
    }
    echo $output;
} else {
    echo "<p class='pl-5'>0 Friends</p>";
}
?>
</div>
</div>

<div class="row">
<div class="card p-3" style="width: 300rem;">
<?php
echo "<h5>Enemies</h5>";
$sql = "SELECT * FROM relationships
INNER JOIN heroes on relationships.hero2_id=heroes.id
WHERE (hero1_id = " . $id . ") AND (type_id = 2)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output = "";
    while ($row = $result->fetch_assoc()) {
        $output .= "<li class='pl-3'>$row[name]</li>";
    }
    echo $output;
} else {
    echo "<li class='pl-3'>0 Enemies</li>";
}
?>

<div class="row">
<div class="card p-3" style="width: 300rem;">
<?php
$sql = "SELECT * FROM ability_hero
    INNER JOIN abilities on abilities.id=ability_hero.ability_id
    INNER JOIN heroes on heroes.id=ability_hero.hero_id
    WHERE (ability_hero.hero_id = $id)";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $output = "";
    echo "<h5>Super Powers</h5>";
    while ($row = $result->fetch_assoc()) {
        $output .= "<li class='pl-3'>$row[ability]</li>";
    }
    echo $output;
} else {
    echo "0 results";
}




$back = "index.php";
echo '<a href=' . $back . ' class="btn btn-primary">Return to Heroes</a>';

$conn->close();
require "footer.php";
?>