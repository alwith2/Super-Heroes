<?php

require "connection.php";
require "header.php";


echo '<div class = "text-center"><h1 class=" text-primary">comicbook</h1></div>';
$sql = "SELECT * FROM heroes";
$result = $conn->query($sql);

echo '<div class="row">';
if ($result->num_rows > 0) {
    $output = "";
    echo '<div class="container pl-5">';
    echo '<div class="row text-content-justify">
               </div>';
    while ($row = $result->fetch_assoc()) {
        $hero = "hero.php?id=" . $row["id"];
        $output .=
        '<div class="row"
            <div class="card" style="width: 30rem;">
               <div class="row text-content-justify">
               </div>
                <div class="col-6 offset-3">
               </div>
                    <div class="card-body border border-dark">
                        <h5 class="card-title">' . $row["name"] . '</h5>
                        <img class="card-img-top" style="width:50px;height:100px;" src='.$row["image_url"].' />
                        <p class="card-text">' . $row["about_me"] . '</p>   
                        <a href=' . $hero . ' class="btn btn-primary">About me</a>
                    </div>  
                </div>';
    }
    echo $output;
    echo '</div>
    </div>
    </div>';
} else {
    echo "0 results";
}

?>
<form action="newinfo.php" method="post">
  <div class="form-group p-3">
    <label for="exampleInputEmail1">ADD PROFILE</label><br>
    <label for="exampleInputEmail1">Name</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="name" id="name">
    <label for="exampleInputEmail1">About Me</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="about_me" id="about_me">
    <label for="exampleInputEmail1">BIO</label>
    <input type="text" class="form-control" aria-describedby="emailHelp" name="biography" id="biography">
    <small id="emailHelp" class="form-text text-muted">We'll never share your info with anyone else.</small>
  </div>
  <button type="submit" class="btn btn-primary ml-3">Enter</button>
  <input type="hidden" id="method" value="newHero" name="method">
</form>
<?php

$conn->close();
require 'footer.php';
?>

