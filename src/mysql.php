<?php 
// HTML response header
header('Content-type: text/plain');

// Database connection parameters
$DB_HOST = 'localhost';
$DB_PORT = 3306; // 3306 is default MySQL port
$DB_USER = 'root';
$DB_PASS = ''; // blank or new_password
$DB_NAME = 'mysql'; // database instance name

//PDO ???

// Open connection (all args can be optional or NULL!)
$mysqli = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);
if ($mysqli->connect_error) {
  echo 'Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error . PHP_EOL;
} else {
  // Query users
  if ($result = $mysqli->query('SELECT User FROM user')) {
    echo 'Database users are:' . PHP_EOL;
    for ($i = 0; $i < $result->num_rows; $i++) {
      $result->data_seek($i);
      $row = $result->fetch_assoc();
      echo $row['User'] . PHP_EOL;
    }
    $result->close();
  } else {
    echo 'Query failed' . PHP_EOL;
  }
}

// Close connection
$mysqli->close();
?>