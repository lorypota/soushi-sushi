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

    //Gets variables from post
    $id_cart=$_SESSION["cart"];
    $sushi_name=str_replace('_', ' ', $_POST['sushi_name']);
    $pieces_number=$_POST['cart_number'];
    
    //Create connection
    $conn = new mysqli($servername, $username_mysql, $password_mysql, $dbname);
    //Check connection
    if ($conn->connect_error)
    {
        header("location:index.php?error2=1");
        die("Connection failed: " . $conn->connect_error);
    }

    
    $query = "select id_cart,sushi_name, pieces_number from cart_sushi where id_cart =\"".$id_cart."\" and sushi_name=\"".$sushi_name."\"";
    $result = mysqli_query($conn, $query);
    $num_rows = mysqli_num_rows($result);

    if($num_rows>0)
    {   
        while($row2 = $result->fetch_assoc())
        {
            $pieces_number += $row2['pieces_number'];
        } 

        $query2 = "DELETE FROM cart_sushi where id_cart =\"".$id_cart."\" and sushi_name=\"".$sushi_name."\"";
        mysqli_query($conn, $query2);

        $query2 = "INSERT INTO cart_sushi (id_cart,sushi_name,pieces_number) values (".$id_cart.",\"".$sushi_name."\",".$pieces_number.")";
        mysqli_query($conn, $query2);
    }
    else
    {
        $query2 = "INSERT INTO cart_sushi (id_cart,sushi_name,pieces_number) values (".$id_cart.",\"".$sushi_name."\",".$pieces_number.")";
        mysqli_query($conn, $query2);
    }

    header("location:menu.php?list=all&success_item=a");
    die('Item added with success!');
   
?>