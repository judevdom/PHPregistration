<!DOCTYPE html>
<html>
  <head>
    <title>Validation Form</title>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body class="bg-secondary">
<?php
  if(!isset($_SESSION)){
    session_start();
}
  $name = "";
  $email = "";
  $gender = "";
  $comment = "";
  $website = "";
  $hash = "";
  $hash_for_verify = "";
  $row = "";
  //$hashed_password = ""; //FIXME: split into one per line
 //$hashed_password = "";
  

  // define variables and set to empty values
$errors = array(); 
// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'validationdb');
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  echo "no data";
}
  // REGISTER USER
if (isset($_POST['submit-register'])) {
  // receive all input values from the form
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  
  $comment = mysqli_real_escape_string($conn, $_POST['comment']);
  $website = mysqli_real_escape_string($conn, $_POST['website']);
  $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($name)) { array_push($errors, "Name is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
  array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same name and/or email
  $user_check_query = "SELECT * FROM yuksyguests WHERE name='$name' OR email='$email' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['name'] === $name) {
      array_push($errors, "name already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $hash = password_hash($password_1, PASSWORD_DEFAULT);//encrypt the password before saving in the database

    $query = "INSERT INTO yuksyguests (name, email, password, gender, website, comment) 
          VALUES('$name', '$email', '$hash', '$gender', '$website', '$comment')";
    mysqli_query($conn, $query);
    $_SESSION['name'] = $name;
    $_SESSION['success'] = "You are now logged in";
    header('location: success.php');
  }
}  

  // LOGIN USER
  if (isset($_POST['login_user'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if (empty($name)) {
      array_push($errors, "name is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
      
      $query = "SELECT password FROM yuksyguests WHERE name='$name'";
      $results = mysqli_query($conn, $query);
      $row = $results->fetch_row();
      $hash = $row[0];
      print_r ($hash);
      echo ('</br>');

       if(password_verify($password, $hash)){

        $query = "SELECT * FROM yuksyguests WHERE name='$name'";
        $results = mysqli_query($conn, $query);
        
        if (mysqli_num_rows($results) == 1) {
         
            // Password is correct, so start a new session
            session_start();
            $_SESSION['name'] = $name;
            $_SESSION['success'] = "You are now logged in";
            header('location: success.php');
          
        }else {
          array_push($errors, "Wrong name/password combination");
        }
      }else {
        array_push($errors, "Wrong name/password combination");
     } 
    }
    mysqli_close($conn);
  }

?>
  </body>
</html>