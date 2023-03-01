<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['user_name'])){
   header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user page</title>
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="images/favicon/favicon.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&family=Montserrat:wght@100;500&display=swap"
        rel="stylesheet">


    <link rel="stylesheet" href="css/page.css">

</head>

<body>

    <header>

        <nav>
            <ul class="nav-links">
                <li><a href="index.php" class="btn">Home</a>
                </li>
                <li><a href="#" class="btn">About</a></li>
            </ul>
        </nav>
        <a href="logout.php" class="cnt"><button>Log out</button></a>
    </header>

    <div class="container">

        <div class="content">
            <h3>Hello, <span>User</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['user_name'] ?></span></h1>
            <p>This is your User dashboard</p>

        </div>

    </div>

</body>

</html>