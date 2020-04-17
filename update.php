<?php
require "connection.php";
require "header.php";
?>
<form action="newinfo.php" method="post">
  <div class="form-group p-3">
    <label class="btn btn-primary">LOST OR GAINED ABILITIES?</label><br>
    <label for="exampleInputEmail1">Ability</label>
    <input type="text" class="form-control" name="methodAbility" id="methodAbility">
  </div>
  <button type="submit" class="btn btn-primary ml-3">MODIFY</button>
  <input type="hidden" id="method" value="ability" name="method">
</form>
<?php
require 'footer.php';
$conn->close();
header("Location: /hero.php?id=" . $last_id);
 ?>