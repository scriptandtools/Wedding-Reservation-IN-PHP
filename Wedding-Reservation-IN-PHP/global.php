<?php
  session_start();
  include('db.php');
  include('query.php');
  $database = new db();

  //User Checker
  if (isset($_REQUEST["user"]))
  {
    $username = $_REQUEST['user'];
    $count = $database->get_row(sprintf(USER_CHECK, $username));
    if ($count['count'] != 0)
    {
      echo "Username already exists.";
    }
  }
  //Register
  else if(isset($_REQUEST["u"]) && isset($_REQUEST["p"]))
  {
    $database->others(sprintf(USER_INSERT,$_REQUEST["u"], $_REQUEST["p"]));
  }
  else if(isset($_REQUEST["lu"]) && isset($_REQUEST["lp"]))
  {
    $username = $_REQUEST['lu'];
    $password = $_REQUEST['lp'];
    $count = $database->get_row(sprintf(USER_PASS_CHECK, $username, $password));
    if ($count['count'] == 0)
    {
      echo "Invalid Username/Password";
    }
    else
    {
      $_SESSION['username'] = $username;
      echo "";
    }
  }
  else if(isset($_REQUEST["logout"]))
  {
    $_SESSION['username'] = null;
  }
  else if(isset($_REQUEST["fill"]))
  {
    $reserve = $database->get_multi_row(RESERVATION);
    $result = "";
    foreach($reserve as $row)
    {
      echo "<tr>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['contact']."</td>";
      echo "<td>".$row['pname']."</td>";
      echo "<td><input class='btn btn-success' type='button' data-value=".$row['id']." onclick='acceptRes($(this).data().value)' name='accept' value='Accept'><input class='btn btn-danger' type='button' data-value=".$row['id']." onclick='deleteRes($(this).data().value)' name='delete' value='Delete'></td>";
      echo "</tr>";
    }
    echo $result;
  }
  else if(isset($_REQUEST["fill1"]))
  {
    $reserve = $database->get_multi_row(RESERVATION1);
    $result = "";
    foreach($reserve as $row)
    {
      echo "<tr>";
      echo "<td>".$row['name']."</td>";
      echo "<td>".$row['date']."</td>";
      echo "<td>".$row['contact']."</td>";
      echo "<td>".$row['pname']."</td>";
      echo "<td><input class='btn btn-danger' type='button' data-value=".$row['id']." onclick='cancelRes($(this).data().value)' name='delete' value='Cancel'></td>";
      echo "</tr>";
    }
    echo $result;
  }
  else if(isset($_REQUEST["updateRes"]))
  {
    $database->others(sprintf(UPDATE_RESERVE, $_REQUEST["updateRes"]));
  }
  else if(isset($_REQUEST["deleteRes"]))
  {
    $database->others(sprintf(DELETE_RESERVE, $_REQUEST["deleteRes"]));
  }
  else if(isset($_REQUEST["cancelRes"]))
  {
    $database->others(sprintf(UN_RESERVE, $_REQUEST["cancelRes"]));
  }
?>
