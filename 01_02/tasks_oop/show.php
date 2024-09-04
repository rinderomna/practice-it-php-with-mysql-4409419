<?php
$hostname = "127.0.0.1";
$username = "mariadb";
$password = "mariadb";
$database = "mariadb";
$port     = 3306;

$db = new mysqli($hostname, $username, $password, $database, $port);
$result = $db->query("SELECT * FROM tasks LIMIT 1");
$record = $result->fetch_object();
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
      <dd><?php echo $record->id; ?></dd>
    </dl>
    <dl>
      <dt>Priority</dt>
      <dd><?php echo $record->priority; ?></dd>
    </dl>
    <dl>
      <dt>Completed</dt>
      <dd><?php echo $record->completed == 1 ? "true" : "false"; ?></dd>
    </dl>
    <dl>
      <dt>Description</dt>
      <dd><?php echo $record->description; ?></dd>
    </dl>

  </section>

</body>

</html>

<?php
$result->free();
$db->close();
?>