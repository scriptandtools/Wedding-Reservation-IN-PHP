<?php
  include('db.php');
  include('query.php');
  $database = new db();

  $username = $_REQUEST['user'];
  $count = $database->is_empty(sprintf(USER_CHECK, $username))
  if ($count['count'] != 0)
  {
    echo sprintf(USER_CHECK, $username);
  }
?>
