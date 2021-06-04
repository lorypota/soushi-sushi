<?php

    //starts session
    session_start();

    $servername = "localhost";
    $username_mysql = "root";
    $password_mysql = "";
    $dbname = "soushisushi";

    //Gets variables from post
    $username=$_POST['un'];
    $password=$_POST['pw'];
    
    //Create connection
    $conn = new mysqli($servername, $username_mysql, $password_mysql, $dbname);
    //Check connection
    if ($conn->connect_error)
    {
        header("location:index.php?error2=1");
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT first_name,last_name FROM users where username = \"".$username."\" and password = \"".md5($password)."\"";

    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $firstname = $row['first_name'];
            $lastname = $row['last_name'];
        }
    } else {
        header("location:index.php?error5=1");
        die('Error during the login!');
    }

    if ($result)
    {
        //Returns number of rows in the table.
        $row = mysqli_num_rows($result);
          
            if ($row = 1)
            {
                $_SESSION["logged"] = "yes";
                $_SESSION["username"] = $username;
                $_SESSION["firstname"] = $firstname;
                $_SESSION["lastname"] = $lastname;
                $_SESSION["popuplogin"] = 1;

                if($_GET['page']=="index")
                {
                    header("location:index.php");
                }
                else if($_GET['page']=="menu")
                {
                    header("location:menu.php?list=all");
                }

                die('Logged-in with success!');
            }
            else
            {
                header("location:index.php?error5=1");
                die('Error during the login!');
            }
    }

    //Connection close 
    mysqli_close($conn);
?>