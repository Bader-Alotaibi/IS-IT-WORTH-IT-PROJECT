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
                <li><a href="Home.html">home</a></li>
                <li><a href="Login.html">Login</a></li>
                <li><a href="About.html">About</a></li>
            </ul>

        </nav>
        <?php
        include('Functions.php');
            $con = connect();
        $title = mysqli_real_escape_string($con, $_POST['title']);
        ?>
        <div id = "frm"> 
        <form name="f1" action = "addComment.php" onsubmit = "return validation()" method = "POST">  
            <p>  
                <label> User Name: </label>  
                <input type = "text" id ="user" name  = "user" />  
            </p><br>  
            <p>  
                <label> Password: </label>  
                <input type = "password" id ="pass" name  = "pass" />  
            </p><br>
            <p>  
                <label> Comment: </label>  
                <input type = "text" id ="comment" name  = "comment" />  
            </p><br>
                
                Click to add comment:<input type =  "submit" id = "btn2" name = "title" value = "<?php echo $title; ?>" />
                <br>
                Don't have an account? <a href="Register.html">Register</a><br> 
              
        </form>
        </div>
        <script>  
            function validation()
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;
                var com=document.f1.comment.value;
                if(id.length=="" && ps.length=="" && com.length=="") {  
                    alert("User Name, Password and comment fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }
                    if (com.length=="") {  
                    alert("Comment field is empty");  
                    return false;  
                    }
                }                             
            }  
        </script>
    </body>
</html>
