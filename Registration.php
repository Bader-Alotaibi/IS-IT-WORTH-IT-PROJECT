<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Registration</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel='stylesheet' href='Style.css'>
    </head>
    <body>
        <nav>
            <div class='logo'>Is It Worth It</div>
            <ul class='links'>
                <li><a href="Home.html">Home</a></li>
                <li><a href="Login.html">Login</a></li>
                <li><a href="About.html">About</a></li>
            </ul>

        </nav>
        <?php
        include('connection.php');
        $name = mysqli_real_escape_string($con, $_POST['user']);
        $password = mysqli_real_escape_string($con, $_POST['pass']);
        $sql = "INSERT INTO user (User_Name,Pass) VALUES('$name','$password')";
        if (mysqli_query($con, $sql)) {
            echo "New account created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }

        mysqli_close($con);
        ?>
    </body>
</html>
