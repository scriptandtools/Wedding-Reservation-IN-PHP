<?php
  if (isset($_SESSION['username']))
  {
    echo
    "
      <li><a href='#' onclick='logout_account()'><b> Logout </b></a></li>
      <li><a href='#' data-toggle='modal' data-target='#reservationModal'><b> Accept Reservations </b></a></li>
      <li><a href='#' data-toggle='modal' data-target='#reservedModal'><b> Reserved </b></a></li>
    ";
  }
  else
  {
    echo
    "
      <li><a href='#' data-toggle='modal' data-target='#loginModal'><b> Login </b></a></li>
      <li><a href='#' data-toggle='modal' data-target='#registerModal'><b> Register </b></a></li>
    ";
  }

?>
