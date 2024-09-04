<?php

// hostname: "127.0.0.1"
// username: "mariadb"
// password: "mariadb"
// database: "mariadb"
// port:     3306

$connection = mysqli_connect("127.0.0.1", "mariadb", "mariadb", "mariadb", 3306);
$query = "SELECT * FROM tasks LIMIT 1";
$result = mysqli_query($connection, $query);
$record = mysqli_fetch_assoc($result);
mysqli_free_result($result);
mysqli_close($connection);

?>

<!doctype html>
<html lang="en">

<head>
  <title>Task Manager: Show Task</title>
</head>

<body>

  <header>
    <h1>Task Manager</h1>
  </header>

  <section>

    <h1>Show Task</h1>

    <dl>
      <dt>ID</dt>
      <dd><?php echo $record["id"] ?></dd>
    </dl>
    <dl>
      <dt>Priority</dt>
      <dd><?php echo $record["priority"] ?></dd>
    </dl>
    <dl>
      <dt>Completed</dt>
      <dd><?php echo (bool)$record["completed"] ? "true" : "false" ?></dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd><?php echo $record["description"] ?></dd>
    </dl>

  </section>

</body>

</html>