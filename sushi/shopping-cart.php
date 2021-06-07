<?php

    //starts session
    session_start();

    if(!isset($_SESSION["logged"]))
    {
        header("location:index.php");
        die('You must first log-in!');
    }

    if(isset($_GET["success_order"]))
    {
        $popup = "<div id=\"random\">
                    <div class=\"random-content\">
                    <span class=\"close-random close-x\">&times;</span>
                    <h2 class=\"random-style\">Success!</h2>
                    <p class=\"random-style\">Order succeeded!</p>
                    </div>
                </div>";
    }
    if(isset($_GET["error2"]))
    {
        $popup = "<div id=\"random\">
                    <div class=\"random-content\">
                    <span class=\"close-random close-x\">&times;</span>
                    <h2 class=\"random-style\">Error!</h2>
                    <p class=\"random-style\">Connection error!</p>
                    </div>
                </div>";
    }

?>

<html>
<title>Soushi sushi - Shopping cart</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/css.css">
<link rel="icon" sizes="192x192" href="images/random/logo9.png">
<body>

<!-- Top of the page button  -->
<button onclick="topFunction()" id="arrowUp" title="Go to top"><img src="images/random/arrow-up.png" width="20px"></button>

<!-- Top bar -->
<div id="top">
  <div class="bar padding-8" style="width:100%; background-color:rgba(0,0,0,0.8);">
    <img src="images/random/logo5.png" style="width: 80px;padding-left:30px" class="vertical-align-middle"/></img>
    <img src="images/random/homepage.png" class="bar-img" style="width: 55px; padding-left: 35px;"></img>
    <a href="index.php" class="bar-item button-topmenu text-white hover-text-red"> HOME </a>

    <!-- Register -->
    <?php
    
    if(isset($_SESSION["logged"])){
      echo "<img src=\"images/random/menu.png\" class=\"bar-img\" style=\"width: 55px; padding-left: 35px;\"></img>
           <a href=\"menu.php?list=all\" class=\"bar-item button-topmenu text-white hover-text-red\"> MENU </a>";
      echo "<button id=\"accountButton\" class=\"bar-item button-topmenu button-account\" style=\"float: right; padding: auto 20px auto 20px;\">Logged in as: ".$_SESSION["username"]."</button>";
      $popupAccount = " <div id=\"account\">
                          <div class=\"account-content\">
                            <span class=\"close-account close-x\">&times;</span>
                            <h2 class=\"random-style\">Account: ".$_SESSION["username"]."</h2>
                            <p class=\"random-style\">First name: ".$_SESSION["firstname"]."</p>
                            <p class=\"random-style\">Last name: ".$_SESSION["lastname"]."</p>
                            <form action=\"logout.php?page=index\" method=\"POST\">
                              <button type=\"submit\" class=\"account-button\"> Log out </button>
                            </form>
                          </div>
                        </div>";
    }

    ?>
  </div>
</div>

<!-- Pop-up generated -->
<?php

    if(isset($_GET["success_order"])||isset($_GET["error2"]))
    {
        echo $popup;
    }

    if(isset($popupAccount))
    {
        echo $popupAccount;
    }

?>

<!-- Header -->
<header class="container dark-red padding-header" id="myHeader">
  <div class="text-center">
    <h4>Rice to meet you! &#128516</h4>
    <h2 class="xxxlarge animate-bottom">Soushi sushi</h2>
    <img src="images/random/noodle-divider-black.svg" width="400px" height="15px"></img>
  </div>
  </br>
</header>

<div style="max-width: 1280px; margin: 0px auto;">
  <div class="text-center padding-32">

    <?php

        $servername = "localhost";
        $username_mysql = "root";
        $password = "";
        $dbname = "soushisushi";

        //Create connection
        $conn = new mysqli($servername, $username_mysql, $password, $dbname);
        //Check connection
        if ($conn->connect_error)
        {
            header("location:index.php?error2=1");
            die("Connection failed: " . $conn->connect_error);
        }

        $query = "SELECT sushi_name, pieces_number FROM cart_sushi where id_cart = ".$_SESSION["cart"];

        $result = mysqli_query($conn, $query);

        $number_rows = mysqli_num_rows($result);

        if($number_rows == 0)
        {
            echo "<h2>You haven't added anything yet!</h2>";
            echo "<h4>Proceed adding items to your cart here: <a href=\"menu.php?list=all\" style=\"color:blue;text-decoration:underline;\">MENU</a></h4>";
        }
        else
        {
            echo "<h2>".$number_rows." items added to the cart!</h2>";

            $total_price = 0;
            $all_items = 0;

            if(isset($_GET['elements_number']))
            {
                $value_elements_number ="value=\"".$_GET['elements_number']."\"";
            }
            else
            {
                $value_elements_number = "value=\"20\"";
            }
            echo "
            <form action=\"shopping-cart.php\" method=\"get\">
        
              Number of table rows: 
              <input type=\"number\" name=\"elements_number\" min=\"1\" ".$value_elements_number." style=\"width: 45px;\"></input>
        
              <input type=\"image\" src=\"images/random/search.png\" width=\"15px\" height=\"15px\" class=\"search\" alt=\"Submit\"></input>
              
            </form>";
            $count_outputted_rows = 0;
            $count2 = 0;
            $result = mysqli_query($conn, $query);
            $number_elements_to_output = $number_rows;

            if(isset($_GET['elements_number']))
            {
                $elements_number = $_GET['elements_number'];
            }
            else
            {
                $elements_number = 20;
            }

            $pages_number = ceil($number_elements_to_output/$elements_number);
        
            if ($result->num_rows > 0)
            {
                // output data of each row
                while($row = $result->fetch_assoc())
                {
                    $count2++;
                    $sushi_name = $row['sushi_name'];
                    $pieces_number = $row['pieces_number'];

                    $page_number = ceil($count_outputted_rows/$elements_number)+1;

                    if(($count_outputted_rows%$elements_number == 0 || $count2==1))
                    {
                        echo "<div class=\"table-center-div\">
                                <table class=\"table-style page".$page_number."\">
                                <thead>
                                <tr>
                                    <th>Item name</th> <th>Item description</th> <th>Item Ingredients</th> <th>Item properties</th> <th>Item quantity</th> <th>Items price</th>
                                </tr>
                                </thead>
                                <tbody>";
                    }

                    $count_outputted_rows++;
                    echo "<tr> <td>$sushi_name</td>"; 
                    $query3 = "SELECT description,price FROM sushi WHERE sushi_name = \"".$sushi_name."\"";
                    $result3 = mysqli_query($conn, $query3);
                    while($row = $result3->fetch_assoc())
                    {
                        $description = $row['description'];
                        $price = $row['price'];
                    }
                    echo  "<td>$description</td>";
                    $ingredient = "";
                    $gluten_free = true;
                    $spicy = false;
                    $diet = "vegan";
                    $query2 = "SELECT ingredient FROM sushi_ingredients WHERE sushi_name = \"".$sushi_name."\"";
                    $result2 = mysqli_query($conn, $query2);
                    while($row = $result2->fetch_assoc())
                    {
                        $ingredient .= "<div class=\"tooltip\">".$row['ingredient']."<span class=\"tooltiptext tooltip-top\">";
                        $query3 = "SELECT description, is_glutenfree, is_spicy, id_diet from ingredients where ingredient = \"".$row['ingredient']."\"";
                        $result3 = mysqli_query($conn, $query3);
                        while($row = $result3->fetch_assoc())
                        {
                            $ingredient .= $row['description'];
                            if($row['is_glutenfree']==0)
                            $gluten_free = false;
                            if($row['is_spicy']==1)
                            $spicy = true;
                            if($row['id_diet']==null)
                            $diet = "none";
                            else if($row['id_diet']=="vegetarian" && $diet == "vegan")
                            $diet = "vegetarian";
                        }
                        $ingredient .= "</span> </div> &nbsp;";
                    }
                    echo "<td>$ingredient</td> <td>";
                    if($gluten_free)
                    {
                        echo "<div class=\"tooltip-img\">";
                        echo "<img src=\"images/random/food_categories/gluten-free.png\" style=\"width: 40px;\"></img>";
                        echo "<span class=\"tooltiptext tooltip-top-img\">Gluten free</span> </div>";
                    }
                    if($spicy)
                    {
                        echo "<div class=\"tooltip-img\">";
                        echo "<img src=\"images/random/food_categories/spicy.png\" style=\"width: 40px;\"></img>";
                        echo "<span class=\"tooltiptext tooltip-top-img\">Spicy!</span> </div>";
                    }
                    if($diet=="vegan")
                    {
                        echo "<div class=\"tooltip-img\">";
                        echo "<img src=\"images/random/food_categories/vegan.png\" style=\"width: 40px;\"></img>";
                        echo "<span class=\"tooltiptext tooltip-top-img\">Vegan diet</span> </div>";
                    }
                    else if ($diet = "vegetarian")
                    {
                        echo "<div class=\"tooltip-img\">";
                        echo "<img src=\"images/random/food_categories/vegetarian.png\" style=\"width: 40px;\"></img>";
                        echo "<span class=\"tooltiptext tooltip-top-img\">Vegetarian diet</span> </div>";
                    }
                    echo "<td>$pieces_number</td>";
                    $total_item = $price*$pieces_number;
                    $total_price += $price*$pieces_number;
                    echo "<td>$$total_item</td>";
                    $all_items += $pieces_number;

                    if(($count_outputted_rows%$elements_number == 0 || $number_elements_to_output == $count_outputted_rows))
                    {
                        echo "</tbody>
                            </table>
                            </div>";
                    }
                }
            }
            else
            {
                die('Error during the retrieval of data!');
            }

            echo "<style>
                .page1 {display: block}
                ";
                for($i=2; $i<=ceil($number_elements_to_output/$elements_number); $i++)
                {
                    echo ".page".$i." {display: none}";
                }
            echo "</style>
                <script>

                    var selectedPage = 1;
                    var num_pages = ".$pages_number.";
                    var page;

                    function incrementPage()
                    {
                        page = document.getElementsByClassName('page'+selectedPage);
                        for(i=0;i<page.length;i++)
                        {
                        page[i].style.display=\"none\";
                        }

                        var value = parseInt(document.getElementById('pageNumber').value, 10);
                        if(selectedPage!=num_pages)
                        {
                        selectedPage++;
                        document.getElementById('pageNumber').value = selectedPage;
                        }

                        page = document.getElementsByClassName('page'+selectedPage);
                        for(i=0;i<page.length;i++)
                        {
                        page[i].style.display=\"block\";
                        }
                    }

                    function decrementPage()
                    {
                        page = document.getElementsByClassName('page'+selectedPage);
                        for(i=0;i<page.length;i++)
                        {
                        page[i].style.display=\"none\";
                        }

                        var value = parseInt(document.getElementById('pageNumber').value, 10);
                        if(selectedPage!=1)
                        {
                        selectedPage--;
                        document.getElementById('pageNumber').value = selectedPage;
                        }

                        page = document.getElementsByClassName('page'+selectedPage);
                        for(i=0;i<page.length;i++)
                        {
                        page[i].style.display=\"block\";
                        }
                    }

                </script>
                
                <button onclick=\"decrementPage()\"> ❮ </button>

                <input type=\"text\" id=\"pageNumber\" value=\"1\" class=\"text-center\" style=\"width: 20px; border: none;\" readonly></input>
                
                <button onclick=\"incrementPage()\"> ❯ </button>
                <br>";
        
            echo "
                <div class=\"order-now-center-div\">
                    <table class=\"order-now-line-style\" style=\"border-radius: 5px;\">
                        <thead>
                            <tr>
                                <th>Total items: ".$all_items."</th>
                                <th style=\"padding-left:300px\">Total price: $".$total_price."</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <form action=\"create-order.php\" method=\"post\" class=\"right-align\">
                    <button class=\"order-now-button\" type=\"submit\"> Order now! <img src=\"images/random/order-now.png\" style=\"width: 30px;\" class=\"vertical-align-middle\"></img></button>
                </form>
                <br><br>
                ";
        }

        $query2 = "SELECT id_cart, date_order FROM cart where username = \"".$_SESSION["username"]."\" and is_ordered = 1";

        $result2 = mysqli_query($conn, $query2);

        $number_rows2 = mysqli_num_rows($result2);

        if($number_rows2>0)
        {
            echo "<div class=\"table-center-div\">
                        <table class=\"table-style-ordered\">
                            <thead>
                                <tr>
                                    <th>Previous orders dates (year/month/day)</th> <th>Price</th> <th>Number of items</th>
                                </tr>
                            </thead>
                            <tbody>";

            while($row2 = $result2->fetch_assoc())
            {
                $total_price = 0;
                $total_items = 0;
                $pieces_number = 0;

                echo "</tr>";
                echo "<td>".$row2['date_order']."</td>";
                
                $query3 = "SELECT sushi_name, pieces_number FROM cart_sushi where id_cart = ".$row2['id_cart'];
                $result3 = mysqli_query($conn, $query3);

                while($row3 = $result3->fetch_assoc())
                {
                    $pieces_number = $row3['pieces_number'];
                    $total_items += $pieces_number;

                    $query4 = "SELECT sushi_name, price FROM sushi where sushi_name = \"".$row3['sushi_name']."\"";
                    $result4 = mysqli_query($conn, $query4);

                    while($row4 = $result4->fetch_assoc())
                    {
                        $total_price += $row4['price']*$pieces_number;
                    }
                }
                
                echo "<td> $".$total_price."</td>";
                echo "<td>".$total_items."</td>";
                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }

    ?>
  </div>
</div>

<!-- Footer -->
<span class="card">
  <footer class="container dark-red padding-16">
    <h3>Credits</h3>
    <p>Website created by Rota Lorenzo, <br> Icons made by <a class="a-underlined" href="https://www.freepik.com" title="Freepik">Freepik</a> and <a class="a-underlined" href="https://www.flaticon.com/authors/pixel-perfect" title="Pixel perfect">Pixel perfect</a> from <a class="a-underlined" href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a></div></p>
  </footer>
</span>

<script src="js/javascript.js"></script>

<!-- Pop-up generated -->
<?php

    if(isset($_SESSION["logged"])||isset($_GET["error2"])||isset($_GET["success_order"]))
    {
        echo "<script>openRandom();</script>";
    }

?>

</body>
</html>