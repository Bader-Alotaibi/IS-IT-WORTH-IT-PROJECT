<!DOCTYPE html>
<!--
Bader Alotaibi 53306
Fatemah Abbas 50174
Andre Thomas 53453
-->
<html>
    <head>
        <meta charset="UTF-8">
        <link rel='stylesheet' href='Style.css'>
        <title>Add Comment</title>
    </head>
    <body>
        <nav>
            <div class='logo'>Is It Worth It?</div>
            <ul class='links'>
                <li><a href="Home.html">Home</a></li>
                <li><a href="Login.html">Login</a></li>
                <li><a href="About.html">About</a></li>
            </ul>

        </nav><br>
        <?php
        include('Functions.php');
        $con = connect();
        $username = $_POST['user'];
        $password = $_POST['pass'];

        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $password = stripcslashes($password);
        $username = mysqli_real_escape_string($con, $username);
        $password = mysqli_real_escape_string($con, $password);

        $sql = "select * from user where User_Name = '$username' and Pass = '$password'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        $count = mysqli_num_rows($result);
        #check if there is an account wiht that username and passowrd
        if ($count == 1) {# gets the Id of the media by the title then inseret the comment for it
            $user_id = $row['User_ID'];
            $comment = mysqli_real_escape_string($con, $_POST['comment']);
            $title = mysqli_real_escape_string($con, $_POST['title']);
            $media_id = get_Media_ID($title, $con);
            $sql = "INSERT INTO comments (User_ID,Media_ID,Text) VALUES('$user_id','$media_id','$comment')";
            if (mysqli_query($con, $sql)) {
                echo "New comment added successfully";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {# incase the account doesn't exist.
            echo "<h1> Invalid username or password.</h1>";
        }
        mysqli_close($con);
        ?>
    </body>
</html>
