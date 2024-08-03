<?php
        include('db.php');
        include('query.php');
        function comboFill($query){
                $database = new db();
               $table = $database->get_multi_row($query);
               foreach ($table as  $row){
                      echo ' <option value="'.$row["id"].'">'.$row["name"].'</option>';
               }
        }
        function insertReservation(){
               $rdate= DateTime::createFromFormat('m/d/Y', $_POST['date'])->format('Y/m/d');
              $database->others(sprintf(RESERVE_INSERT,$rdate->format(Y/m/d),$_POST['name'],$_POST['email'],$_POST['number']));
              $database->others(RESERVED_PHOTOGRAPHER_INSERT,$_POST['photographer'],$reserve);
        }

 ?>
