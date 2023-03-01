<?php

@include 'config.php';

session_start();

if(!isset($_SESSION['admin_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
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
            <h3>Hello, <span>Admin</span></h3>
            <h1>Welcome <span><?php echo $_SESSION['admin_name'] ?></span></h1>
            <p>This is your admin dashboard</p>

        </div>

    </div>

</body>

</html>