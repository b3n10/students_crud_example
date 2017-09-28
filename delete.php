<?php

require_once("config.php");

$success = false;

if ($_POST) {
  $id = $_POST['id'];

  $sql = "DELETE FROM students WHERE id=" . $id;
  $query = $pdo->prepare($sql);
  $query->execute();
  $pdo = null;
  $success = true;
}

require_once("_header.php");
?>
<div>
  <form action="delete.php" method="post">
    <div>
    <?php
      if (isset($_GET['id'])) {
        $id = (isset($_GET['id'])) ? $_GET['id'] : '';

        echo "Are you sure to delete record below?";

        $sql = "SELECT * FROM students WHERE id = " . $id;
        foreach ($pdo->query($sql) as $row) {
          echo "<div>";
          echo "<label>Name: </label>";
          echo "<span>" . $row['name'] . "</span>";
          echo "</div>";
          echo "<div>";
          echo "<label>Age: </label>";
          echo "<span>" . $row['age'] . "</span>";
          echo "</div>";
          echo "<div>";
          echo "<label>E-mail: </label>";
          echo "<span>" . $row['email'] . "</span>";
          echo "</div>";
        }

        echo "<input type='hidden' name='id' value=" . $id . ">"; 
        $pdo = null;
        echo "<button type='submit' class=''>Yes</button>";
        echo "<a href='index.php'>Go back</a>";
      }
    ?>
    </div>
  </form>
  <div>
    <?php echo ($success) ? "<p>Successfully deleted record! <a href='index.php'>Check record/s</a></p>" : '' ?>
  </div>
</div>
<?php
require_once("_footer.php");
?>
