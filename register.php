<?php

@include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $user_type = $_POST['user_type'];
   

   $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'user already exist!';

   }else{
    $pass = $_POST['password'];
    $user_type = $_POST['user_type'];
    if($user_type == 'admin')
    {
       
    if($pass == 'HELLO7898'){
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
        mysqli_query($conn, $insert);
        header('location:login.php');

    }
    else{
        $error[] = 'Sorry but you are not my employee';

    }
       
    }
   
    else
    {
        $pass = md5($_POST['password']);
        $cpass = md5($_POST['cpassword']);
        if($pass != $cpass){
            $error[] = 'Password not matched!';
         }else{
            $insert = "INSERT INTO user_form(name, email, password, user_type) VALUES('$name','$email','$pass','$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
         }
    }

      
   }

};


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>register form</title>

    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/registers.css">


</head>

<body>

    <img src="images/img.svg" alt="">


    <h3>Get Started</h3>

    <section class="main">




        <form action="" method="post">

            <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            </div>
            <div class="form-control">
                <p class="names">Full Name</p>
                <input type="text" name="name" id="name" required placeholder="Enter your name">
            </div>
            <div class="form-control">
                <p class="names">Email</p>


                <input type="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-control">


                <label for="password" class="names">Password</label>
                <input type="password" name="password" required placeholder="Enter your password" id="password">
                <i class="far fa-eye" id="togglePassword"></i>
            </div>
            <div class="form-control">
                <p class="names">Confirm Password</p>

                <input type="password" name="cpassword" id="cpassword" required placeholder="Confirm your password">
                <i class="far fa-eye" id="togglecPassword"></i>

            </div>
            <div class="form-control">
                <p class="names" id="acc-type">Account Type: </p>

                <select name="user_type">
                    <option value="user">User</option>
                    <option value="admin">Admin</option>
                </select>
            </div>

            <input type="submit" name="submit" value="Sign Up" class="form-btn" id="submit">
            <br>
            <br>
            <p class="final-line">Already have an account? <a href="login.php" class="blue">Sign in</a></p>
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
    const togglecPassword = document.querySelector('#togglecPassword');
    const cpassword = document.querySelector('#cpassword');
    togglecPassword.addEventListener('click', function(e) {

        const type = cpassword.getAttribute('type') === 'password' ? 'text' : 'password';
        cpassword.setAttribute('type', type);

        this.classList.toggle('fa-eye-slash');
    });
    var email = document.getElementById("submit").addEventListener("click", check);

    function check(event) {

        var name = document.getElementById("name");
        var strongRegex = new RegExp("^(?=.*[a-zA-Z0-9])(?=.*[0-9])(?=.{8,})");


        if (!strongRegex.test(password.value)) {
            alert("Invalid Password.")
            alert('Must contain at least one number & be more than 7 characters.');
            event.preventDefault();
            return false;

        }

    }
    </script>



</body>

</html>