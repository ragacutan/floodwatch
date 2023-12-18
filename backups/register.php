<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $filter_name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
   $name = mysqli_real_escape_string($conn, $filter_name);
   $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
   $email = mysqli_real_escape_string($conn, $filter_email);
   $filter_pass = filter_var($_POST['pass'], FILTER_SANITIZE_STRING);
   $pass = mysqli_real_escape_string($conn, md5($filter_pass));
   $filter_cpass = filter_var($_POST['cpass'], FILTER_SANITIZE_STRING);
   $cpass = mysqli_real_escape_string($conn, md5($filter_cpass));

   // New fields for address and contact number
   $filter_address = filter_var($_POST['address'], FILTER_SANITIZE_STRING);
   $address = mysqli_real_escape_string($conn, $filter_address);
   $filter_contact = filter_var($_POST['contact'], FILTER_SANITIZE_STRING);
   $contact = mysqli_real_escape_string($conn, $filter_contact);

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'user already exists!';
   } else {
      if($pass != $cpass){
         $message[] = 'confirm password not matched!';
      } else {
         // Inserting data into the database
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, address, contact) VALUES('$name', '$email', '$pass', '$address', '$contact')") or die('query failed');
         $message[] = 'registered successfully!';
         header('location:login.php');
      }
   }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <style>
      body {
   font-family: 'Arial', sans-serif;
   background-color: #f4f4f4;
   margin: 0;
   padding: 0;
   display: flex;
   justify-content: center;
   align-items: center;
   height: 100vh;
}

.form-container {
   background-color: #fff;
   padding: 20px;
   border-radius: 8px;
   box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
   width: 300px;
}

h3 {
   text-align: center;
   color: #333;
}

.box {
   width: 100%;
   padding: 10px;
   margin-bottom: 15px;
   box-sizing: border-box;
   border: 1px solid #ccc;
   border-radius: 4px;
}

.btn {
   width: 100%;
   padding: 10px;
   box-sizing: border-box;
   background-color: #4caf50;
   color: #fff;
   border: none;
   border-radius: 4px;
   cursor: pointer;
}

.btn:hover {
   background-color: #45a049;
}

p {
   text-align: center;
   margin-top: 15px;
}

.message {
   background-color: #f44336;
   color: white;
   padding: 10px;
   margin-bottom: 15px;
   border-radius: 4px;
   position: relative;
}

.message span {
   margin-right: 20px;
}

.message i {
   position: absolute;
   top: 50%;
   right: 10px;
   transform: translateY(-50%);
   color: #fff;
   cursor: pointer;
}

   </style>

</head>
<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>
   
   <section class="form-container">

<form action="" method="post">
   <h3>register now</h3>
   <input type="text" name="name" class="box" placeholder="enter your username" required>
   <input type="email" name="email" class="box" placeholder="enter your email" required>
   <input type="password" name="pass" class="box" placeholder="enter your password" required>
   <input type="password" name="cpass" class="box" placeholder="confirm your password" required>
   <!-- New input fields for address and contact number -->
   <input type="text" name="address" class="box" placeholder="enter your address" required>
   <input type="text" name="contact" class="box" placeholder="enter your contact number" required>
   <input type="submit" class="btn" name="submit" value="register now">
   <p>already have an account? <a href="login.php">login now</a></p>
</form>

</section>

</body>
</html>