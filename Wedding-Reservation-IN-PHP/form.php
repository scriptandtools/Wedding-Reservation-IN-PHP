<?php
      session_start();
       include('db.php');
       include('query.php');

       $database     = new db();
       $errors         = array();
       $data           = array();
       if (empty($_POST['name']))
              $errors['name'] = 'Name is required.';

       if(!preg_match("/^[a-zA-Z ]*$/",$_POST['name']))
              $errors['name'] = 'Only letters and white space allowed.';

       if (empty($_POST['email']))
              $errors['email'] = 'Email is required.';

       if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
              $errors['email'] = 'Email is invalid.';

       if (empty($_POST['number']))
              $errors['number'] = 'Number is required.';

       if (empty($_POST['photographer']))
              $errors['photographer'] = 'Photographer is required.';

       if (empty($_POST['date']))
              $errors['date'] = 'Date is required.';

       if(!empty($_POST['date'])){
              $rdate= DateTime::createFromFormat('m/d/Y', $_POST['date'])->format('Y/m/d');
              if($rdate>date("Y/m/d")){
                     $reserved_num = $database->get_row(sprintf(COUNT_RESERVED,$qDate->format('Y/m/d')));
                     if ($reserved_num["count"] != 0){
                            $data['success'] = false;
                            $data['errors'] = 'Date already reserved.';
                     }
              }else
              {
                     $data['success'] = false;
                     $data['errors'] = 'Date has already passed.';
              }
       }
       
       if ( ! empty($errors)) {
              $data['success'] = false;
              $data['errors']  = $errors;
       } else {
              $rdate= DateTime::createFromFormat('m/d/Y', $_POST['date'])->format('Y/m/d');
              $database->others(sprintf(RESERVE_INSERT, $rdate, $_POST['name'], $_POST['email'], $_POST['number'], $_POST['photographer']));
              //dito dapat ung queries
              $data['success'] = true;
              $data['message'] = 'Success!';
       }
       echo json_encode($data);
?>
