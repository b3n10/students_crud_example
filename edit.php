<?php

require_once("config.php");
require_once("functions.php");

$success = false;

if ($_POST) {
  if ( count(inputArray()) == 4 ) {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE students SET name=?, age=?, email=? WHERE id=?";
    $query = $pdo->prepare($sql);
    $query->execute( inputArray() );
    $success = true;
  } else {
    echo "<p><strong>No records can be blank!</strong></p>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>University of Tabun</title>
  </head>
  <body>
    <p>
      <a href="index.php">Home</a>
    </p>
    <div>
      <form action="edit.php" method="post">
        <?php
          if (isset($_GET['id']) || isset($_POST['id'])) {
            $id = (isset($_GET['id'])) ? $_GET['id'] : $_POST['id'];

            $sql = "SELECT * FROM students WHERE id = " . $id;
            foreach ($pdo->query($sql) as $row) {
              echo "<div>";
              echo "<label>Name:</label>";
              echo "<input type='text' name='name' value=" . $row['name'] . ">";
              echo "</div>";
              echo "<div>";
              echo "<label>Age:</label>";
              echo "<input type='text' name='age' value=" . $row['age'] . ">";
              echo "</div>";
              echo "<div>";
              echo "<label>E-mail:</label>";
              echo "<input type='text' name='email' value=" . $row['email'] . ">";
              echo "</div>";
            }

            echo "<input type='hidden' name='id' value=" . $id . ">"; 
            $pdo = null;
          }
        ?>
        <div>
          <button type="submit">Update</button>
          <?php echo ($success) ? "<p>Successfully updated record! <a href='index.php'>Check record/s</a></p>" : '' ?>
        </div>
      </form>
    </div>
  </body>
</html>
