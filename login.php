<?php

@include 'config.php';
error_reporting(0);

session_start();

$error = '';

if(isset($_POST['submit'])){
   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];

   $select = "SELECT * FROM user_form WHERE email = '$email' && password = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $row = mysqli_fetch_array($result);
      if($row['user_type'] == 'admin'){
         $_SESSION['admin_name'] = $row['name'];
         header('location:admin_page.php');
      }elseif($row['user_type'] == 'user'){
         $_SESSION['user_name'] = $row['name'];
         header('location:user_dashboard.php');
      }
   }else{
      $error = 'Incorrect email or password!';
   }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">

    <link rel="stylesheet" href="css/logins.css">
    <style>

    </style>
    <style>

    </style>


</head>

<body>
    <img src="images/img.svg" alt="">
    <h3>Welcome back</h3>
    <section class="main">
        <form action="" method="post">
            <div class="form-control">
                <p class="names">Email</p>
                <input type="email" class="email-holder" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-control">
                <p class="names">Password</p>
                <input type="password" name="password" id="password" required placeholder="Enter your password">
                <i class="far fa-eye" id="togglePassword"></i>
            </div>
            <input type="submit" name="submit" value="login now" class="form-btn">
            <div class="error"><?php echo $error; ?></div>
            <br>
            <br>
            <br>

            <p class="final-line">Not registered yet? <a href="register.php" class=" blue">Register
                    now</a></p>
        </form>




    </section>
    <script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {

        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);

        this.classList.toggle('fa-eye-slash');
    });
    </script>

</body>

</html>