<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' href='Style.css'>
        <title>display</title>
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
        $search = mysqli_real_escape_string($con, $_GET['search']);
        $sql='';
        if($search =='Movie'or $search =='Video game'){
            $sql = "SELECT * FROM media WHERE Type='$search'";
        }elseif ($search =='Action'or $search =='Horror' or $search =='Comedy'or $search =='FPS' or $search =='RPG' or $search =='Sports Games') {
            $sql = "SELECT * FROM media WHERE Genre='$search'";
        }else{
            $sql = "SELECT * FROM media WHERE Title='$search'";
        }
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "id: " . $row["Title"] . " - Name: " . $row["Type"] . " " . $row["Genre"] . "<br>";
            }
        } else {
            echo "0 results";
        }
        mysqli_close($con);
        ?>
    </body>
</html>
