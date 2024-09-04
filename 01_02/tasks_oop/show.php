<?php

$hostname = "127.0.0.1";
$username = "mariadb";
$password = "mariadb";
$database = "mariadb";
$port     = 3306;

class Database
{
  private $connection;

  public function __construct($host, $user, $password, $database, $port)
  {
    $this->connection = new mysqli(
      $host,
      $user,
      $password,
      $database,
      $port
    );
    if ($this->connection->connect_error) {
      die("Connection failed: " . $this->connection->connect_error);
    }
  }

  public function query($sql)
  {
    $result = $this->connection->query($sql);
    if ($result === false) {
      die("Query failed: " . $this->connection->error);
    }
    return $result;
  }

  public function fetch_assoc($result)
  {
    return $result->fetch_assoc();
  }

  public function free_result($result)
  {
    $result->free();
  }

  public function close()
  {
    $this->connection->close();
  }
}

$db = new Database($hostname, $username, $password, $database, $port);
$result = $db->query("SELECT * FROM tasks LIMIT 1");
$record = $db->fetch_assoc($result);
$db->free_result($result);
$db->close();
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