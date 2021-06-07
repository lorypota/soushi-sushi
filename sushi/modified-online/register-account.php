<?php

    $servername = "sql309.epizy.com";
    $username_mysql = "epiz_28821330";
    $password_mysql = "vodcHzpb60kC";
    $dbname = "epiz_28821330_soushi";

    //Gets variables from post
    $username=$_POST['un'];
    $password1=$_POST['pw1'];
    $password2=$_POST['pw2'];
    $firstName=$_POST['fn'];
    $lastName=$_POST['ln'];

    if($password1 != $password2)
    {
        header("location:index.php?error1=1");
        die('Password and Confirm password should match!');
    }
    
    //Create connection
    $conn = new mysqli($servername, $username_mysql, $password_mysql, $dbname);
    //Check connection
    if ($conn->connect_error)
    {
        header("location:index.php?error2=1");
        die("Connection failed: " . $conn->connect_error);
    }

    $query = "SELECT username FROM users where username = \"".$username."\"";

    $result = mysqli_query($conn, $query);

    if ($result)
    {
        //Returns number of rows in the table.
        $row = mysqli_num_rows($result);
          
            if ($row > 0)
            {
                header("location:index.php?error3=1");
                die('Username already taken!');
            }
            else
            {
                $query = "INSERT into users (username,password,first_name,last_name) 
                values (\"".$username."\",\"".md5($password1)."\",\"".$firstName."\",\"".$lastName."\")";
                $result = mysqli_query($conn, $query);
                if($result)
                {
                    header("location:index.php?success1=1");
                    die('Registered with success! Now you can log-in.');
                }
                else
                {
                    header("location:index.php?error4=1");
                    die('Something went wrong with the registration!');
                }
            }
    }
  
    //Connection close 
    mysqli_close($conn);
?>