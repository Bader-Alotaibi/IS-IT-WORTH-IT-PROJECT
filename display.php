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
        <title>display</title>
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
        <table class="display">
            <?php
            include('Functions.php');
            $con = connect();
            $search = mysqli_real_escape_string($con, $_GET['search']);
            $sql = '';
            #if the search was all then it will pull all
            if ($search == 'All') { 
                $sql = "SELECT * FROM media";
            }#if the search was Movie or Video game it will search by type
            elseif ($search == 'Movie'or $search == 'Video game') { 
                $sql = "SELECT * FROM media WHERE Type='$search'";
            }# if the search was by one of the genres then it will seach by genre
            elseif ($search == 'Action'or $search == 'Horror' or $search == 'Comedy'or $search == 'FPS' or $search == 'RPG' or $search == 'Sports Games') {
                $sql = "SELECT * FROM media WHERE Genre='$search'";
            }
            else { # if it was none of those options it will search by title 
                $sql = "SELECT * FROM media WHERE Title='$search'";
            }
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <tr>
                            <th><h2> <?php echo $row["Title"]; ?></h2></th>
                        </tr>
                        <tr>
                            <td><img src="Posters/<?php echo $row["Title"]; ?>.jpg" height="400" width="250" alt ="Poster of <?php echo $row["Title"]; ?>"></td>
                            <td class="info"><ul>
                                    <li><span id="bold">Type:</span> <?php echo $row["Type"]; ?>  <span id="bold">Genre:</span> <?php echo $row["Genre"]; ?></li><br>
                                    <li><a href="<?php echo $row["Trailer"]; ?>">Trailer</a></li><br>
                        <li><p><span id="bold">Decription:</span> <?php echo $row["Decription"]; ?></p></li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                          <td><form name="addComment" action = "add_Comment.php" method = "POST"> <!-- To take the user to another page to add comment -->
                                Click here to add a comment <input type =  "submit" id="add_comment_btn" name="title" value = "<?php echo $row["Title"]; ?>" />   
                            </form> </td>  
                        </tr>
                        <tr>
                            <td> <?php comments($row['Title'], $con) ?></td>
                        </tr>
                    <?php
                }
                ?>
            </table>
            <?php
        } else {
            echo "0 results";
        }
        mysqli_close($con);
        ?>
    </body>
</html>
