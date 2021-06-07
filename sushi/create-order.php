<?php

    //starts session
    session_start();

    if(!isset($_SESSION["logged"]))
    {
        header("location:index.php");
        die('You must first log-in!');
    }

    $servername = "localhost";
    $username_mysql = "root";
    $password_mysql = "";
    $dbname = "soushisushi";

    //Gets variables
    $id_cart = $_SESSION["cart"];
    $username = $_SESSION["username"];
    
    //Create connection
    $conn = new mysqli($servername, $username_mysql, $password_mysql, $dbname);
    //Check connection
    if ($conn->connect_error)
    {
        header("location:index.php?error2=1");
        die("Connection failed: " . $conn->connect_error);
    }

    
    $query = "UPDATE cart SET is_ordered = 1, date_order = \"". date("Y-m-d") ."\" where id_cart =\"".$id_cart."\" and username=\"".$username."\"";
    mysqli_query($conn, $query);

    $query2 = "INSERT INTO cart (id_cart, username, is_ordered, date_order) VALUES (\"\", \"".$username."\", 0, null);";
    mysqli_query($conn, $query2);

    $query3 = "SELECT id_cart from cart where username= \"".$username."\" and is_ordered= 0";
    $result3 = mysqli_query($conn, $query3);

    while($row = $result3->fetch_assoc())
    {
        $_SESSION["cart"] = $row['id_cart'];
    }

    header("location:shopping-cart.php?success_order=a");
    die('Order succeeded!');
   
?>