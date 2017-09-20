<?php 
require_once("config.php");
require_once("functions.php");

$success = false;

if ( isset($_POST['submit']) ) {
  if ( count(inputArray()) == 3 ) {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO students (name, age, email) VALUES(?, ?, ?)";
    $query = $pdo->prepare($sql);
    $query->execute( inputArray() );
    $success = true;
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
      <form action="add.php" method="post">
        <div>
          <label>Name</label>
          <input type="text" name="name" value=<?php echo checkField_1('name'); ?>>
          <?php echo "<span>" . checkField_2('name') . "</span>"; ?>
        </div>
        <div>
          <label>Age</label>
          <input type="text" name="age" value=<?php echo checkField_1('age'); ?>>
          <?php echo "<span>" . checkField_2('age') . "</span>"; ?>
        </div>
        <div>
          <label>E-mail</label>
          <input type="text" name="email" value=<?php echo checkField_1('email'); ?>>
          <?php echo "<span>" . checkField_2('email') . "</span>"; ?>
        </div>
        <div>
          <button type="submit" name="submit">Add</button> 
        </div>
      </form>
      <?php echo ($success) ? "<p>Successfully saved record! <a href='index.php'>Check record/s</a></p>" : '' ?>
    </div>
  </body>
</html>
