<?php
require_once("config.php");
require_once("_header.php");
?>
<p>
  <a href="add.php">Add New Record</a>
</p>
<div>
  <table>
    <thead>
      <tr>Name</tr>
      <tr>Age</tr>
      <tr>E-mail</tr>
      <tr>Update</tr>
    </thead>
    <tbody>
  <?php
    $sql = "SELECT * FROM students";
    foreach ($pdo->query($sql) as $row) {
      echo "<tr>";
      echo "<td>" . $row['name'] . "</td>";
      echo "<td>" . $row['age'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td>" . "<a href='edit.php?id=" . $row['id'] . "'>Edit</a>" . " " . "<a href='delete.php?id=" . $row['id'] . "'>Delete</a>" . "</td>";
      echo "</tr>";
    }
    $pdo = null;
  ?>
    </tbody>
  </table>
</div>
<?php
require_once("_footer.php");
?>
