<?php

  //starts session
  session_start();

  if(isset($_GET["success1"]))
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Success!</h2>
                  <p class=\"random-style\">Registered with success! Now you can log-in.</p>
                </div>
              </div>";
  }
  if(isset($_SESSION["popuplogin"])&&$_SESSION["popuplogin"] == 1)
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Success!</h2>
                  <p class=\"random-style\">Logged with success as ".$_SESSION["username"]."!</p>
                </div>
              </div>";
    $_SESSION["popuplogin"]++;
  }
  if(isset($_GET["success3"]))
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Success!</h2>
                  <p class=\"random-style\">Logged out with success!</p>
                </div>
              </div>";
  }
  if(isset($_GET["success_item"]))
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Success!</h2>
                  <p class=\"random-style\">Item added with success!</p>
                </div>
              </div>";
  }
  if(isset($_GET["error1"]))
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Error!</h2>
                  <p class=\"random-style\">Password and Confirm password should match!</p>
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
  if(isset($_GET["error3"]))
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Error!</h2>
                  <p class=\"random-style\">Username already taken!</p>
                </div>
              </div>";
  }
  if(isset($_GET["error4"]))
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Error!</h2>
                  <p class=\"random-style\">Something went wrong with the registration!</p>
                </div>
              </div>";
  }
  if(isset($_GET["error5"]))
  {
    $popup = "<div id=\"random\">
                <div class=\"random-content\">
                  <span class=\"close-random close-x\">&times;</span>
                  <h2 class=\"random-style\">Error!</h2>
                  <p class=\"random-style\">Username or password is wrong!</p>
                </div>
              </div>";
  }

?>

<html>
<title>Soushi sushi - Menu</title>
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
      echo "<img src=\"images/random/shopping-cart.png\" class=\"bar-img\" style=\"width: 55px; padding-left: 35px;\"></img>
           <a href=\"shopping-cart.php\" class=\"bar-item button-topmenu text-white hover-text-red\"> SHOPPING-CART </a>";
      echo "<button id=\"accountButton\" class=\"bar-item button-topmenu button-account\" style=\"float: right; padding: auto 20px auto 20px;\">Logged in as: ".$_SESSION["username"]."</button>";
      $popupAccount = " <div id=\"account\">
                          <div class=\"account-content\">
                            <span class=\"close-account close-x\">&times;</span>
                            <h2 class=\"random-style\">Account: ".$_SESSION["username"]."</h2>
                            <p class=\"random-style\">First name: ".$_SESSION["firstname"]."</p>
                            <p class=\"random-style\">Last name: ".$_SESSION["lastname"]."</p>
                            <form action=\"logout.php?page=menu\" method=\"POST\">
                              <button type=\"submit\" class=\"account-button\"> Log out </button>
                            </form>
                          </div>
                        </div>";
    }
    else{
      echo "<button id=\"loginButton\" class=\"bar-item button-topmenu animated-register\" style=\"float: right; padding: auto 20px auto 20px;\">LOG-IN</button>";
    }

    ?>
  </div>
</div>

<!-- Popup login -->
<div class="popup">
  <div class="popup-content">

    <!-- Login form -->
    <div class="login-wrap">
      <span class="close-login close-x">&times;</span>
      <h2>Login</h2>
      <div class="form">
        <form action="login-account.php?page=menu" method="post">
          <input required type="text" placeholder="Username" minlength="4" maxlength="32" name="un" />
          <input required type="password" placeholder="Password" minlength="8" maxlength="32" name="pw" />
          <button type="submit"> Sign in </button>
        </form>
        <a id="registerButton"> <p> Don't have an account? Register </p></a>
      </div>
    </div>

  </div>
</div>

<!-- Popup register -->
<div class="popup">
  <div class="popup-content">

    <!-- Login form -->
    <div class="register-wrap">
      <span class="close-register close-x">&times;</span>
      <h2>Register</h2>
      <div class="form">
        <form action="register-account.php?page=menu" method="post">
        <input required type="text" placeholder="Username" minlength="4" maxlength="32" name="un" />
          <input required type="password" placeholder="Password" minlength="8" maxlength="32" name="pw1" />
          <input required type="password" placeholder="Repeat your password" minlength="8" maxlength="32" name="pw2" />
          <input required type="text" placeholder="First Name" minlength="2" maxlength="16" name="fn" />
          <input required type="text" placeholder="Last Name" minlength="2" maxlength="16" name="ln" />
          <button type="submit" > Register </button>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Pop-up generated -->
<?php

  if(isset($_GET["success1"])||isset($_GET["success3"])||isset($_GET["error1"])||isset($_GET["error2"])||isset($_GET["error3"])||isset($_GET["error4"])||isset($_GET["error5"])||isset($_GET["success_item"]))
  {
    echo $popup;
  }

  if(isset($_SESSION["popuplogin"]) && $_SESSION["popuplogin"] == 2)
  {
    echo $popup;
    $_SESSION["popuplogin"]++;
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
      $password_mysql = "";
      $dbname = "soushisushi";

      //Create connection
      $conn = new mysqli($servername, $username_mysql, $password_mysql, $dbname);
      //Check connection
      if ($conn->connect_error)
      {
          header("location:index.php?error2=1");
          die("Connection failed: " . $conn->connect_error);
      }

      $query = "SELECT sushi_name, description, price, is_special, is_drink FROM sushi";

      $result = mysqli_query($conn, $query);

      $num = mysqli_num_rows($result);

      $number_elements_to_output = 0;

      if ($result->num_rows > 0)
      {
        while($row = $result->fetch_assoc())
        {
          if(strcmp($_GET['list'],"drinks")==0 && $row['is_drink'] == 1)
          {
            $number_elements_to_output++;
          }
          else if(strcmp($_GET['list'],"specialities")==0 && $row['is_special'] == 1)
          {
            $number_elements_to_output++;
          }
          else if(strcmp($_GET['list'],"sushi")==0 && $row['is_drink'] == 0 && $row['is_special'] == 0)
          {
            $number_elements_to_output++;
          }
        }
      }

      switch ($_GET['list']) { //Shows number of dishes
        case "all":
          echo "<h2>".$num." sushi / specialties / drinks available!</h2> ";
          $number_elements_to_output = $num;
          break;
        case "drinks":
          echo "<h2>".$number_elements_to_output." drinks available!</h2> ";
          break;
        case "specialities":
          echo "<h2>".$number_elements_to_output." specialties available!</h2> ";
          break;
        case "sushi";
          echo "<h2>".$number_elements_to_output." sushi dishes available!</h2> ";
          break;
      }

      $result = mysqli_query($conn, $query);
    ?>

    <form action="menu.php" method="get">
      Show:
      <select name="list">
        <option value="all" <?php if(isset($_GET['list'])){if($_GET['list']=="all"){echo "selected=\"selected\"";}}?>>Show all</option>
        <option value="sushi" <?php if(isset($_GET['list'])){if($_GET['list']=="sushi"){echo "selected=\"selected\"";}}?>>Only sushi</option>
        <option value="specialities" <?php if(isset($_GET['list'])){if($_GET['list']=="specialities"){echo "selected=\"selected\"";}}?>>Only specialties</option>
        <option value="drinks" <?php if(isset($_GET['list'])){if($_GET['list']=="drinks"){echo "selected=\"selected\"";}}?>>Only drinks</option>
      </select>

      Order by: 
      <select name="order">
        <option value="nameInc" <?php if(isset($_GET['order'])){if($_GET['order']=="nameInc"){echo "selected=\"selected\"";}}?>>Name increasing</option>
        <option value="nameDec" <?php if(isset($_GET['order'])){if($_GET['order']=="nameDec"){echo "selected=\"selected\"";}}?>>Name decreasing</option>
        <option value="priceInc" <?php if(isset($_GET['order'])){if($_GET['order']=="priceInc"){echo "selected=\"selected\"";}}?>>Price increasing</option>
        <option value="priceDec" <?php if(isset($_GET['order'])){if($_GET['order']=="priceDec"){echo "selected=\"selected\"";}}?>>Price decreasing</option>
      </select>

      Number of table rows: 
      <input type="number" name="elements_number" min="1"
      <?php
        if(isset($_GET['elements_number']))
        {
          echo "value=\"".$_GET['elements_number']."\"";
        }
        else
        {
          echo "value=\"20\"";
        }
      ?>
     style="width: 45px;"></input>

      <input type="image" src="images/random/search.png" width="15px" height="15px" class="search" alt="Submit"></input>
    </form>

    <?php

      /* order based on select */
      if(isset($_GET['order']))
      {
        switch ($_GET['order'])
            {
              case "nameInc":
                $query .= " order by sushi_name";
                break;
              case "nameDec":
                $query .= " order by sushi_name desc";
                break;
              case "priceInc":
                $query .= " order by price";
                break;
              case "priceDec":
                $query .= " order by price desc";
                break;
            }
      }

      $result = mysqli_query($conn, $query);

      $count_outputted_rows = 0;
      $count2 = 0;

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
          $description = $row['description'];
          $price = $row['price'];
          $is_special = $row['is_special'];
          $is_drink = $row['is_drink'];

          $page_number = ceil($count_outputted_rows/$elements_number)+1;

          if(($count_outputted_rows%$elements_number == 0 || $count2==1) &&($_GET['list']=="all"||($_GET['list']=="drinks" && $is_drink==1)||($_GET['list']=="specialities" && $is_special==1)||($_GET['list']=="sushi" && $is_drink == 0 && $is_special == 0)))
          {
            echo "<div class=\"table-center-div\">
                    <table class=\"table-style page".$page_number."\">
                    <thead>
                      <tr>";

            switch ($_GET['list'])
            {
              case "all":
                echo "<th>Dish or drink name</th>";
                break;
              case "drinks":
                echo "<th>Drink name</th>";
                break;
              case "specialities":
                echo "<th>Specialty name</th>";
                break;
              case "sushi";
                echo "<th>Sushi name</th>";
                break;
            }

            echo "<th>Description</th> <th>Price</th>";

            if($_GET['list']!="drinks")
              echo "<th>Ingredients</th> <th>Properties</th>";

            if(isset($_SESSION["cart"]))
            {
              echo "<th>Add to cart &nbsp</th>";
            }

            echo "</tr> </thead> <tbody>";
          }

          switch ($_GET['list'])
          {
            case "all":
              $count_outputted_rows++;
              echo "<tr> <td>$sushi_name</td> <td>$description</td> <td>$$price</td>";
              $query2 = "SELECT ingredient FROM sushi_ingredients WHERE sushi_name = \"".$sushi_name."\"";
              $result2 = mysqli_query($conn, $query2);
              $ingredient = "";
              $gluten_free = true;
              $spicy = false;
              $diet = "vegan";
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

              if(isset($_SESSION["cart"]))
              {
                echo "</td> <td>";
                echo "<form action=\"add-to-cart.php\" method=\"post\">";
                echo    "<input type=\"hidden\" name=\"sushi_name\" value=".str_replace(' ', '_', $sushi_name)."></input>";
                echo    "<input type=\"hidden\" name=\"list\" value=".$_GET['list']."></input>";
                if(isset($_GET['order']))
                {
                  echo    "<input type=\"hidden\" name=\"order\" value=".$_GET['order']."></input>";
                }
                echo    "<input type=\"number\" name=\"cart_number\" min=\"1\" value =\"1\" style=\"width: 40px;\"></input><br>";
                echo    "<input type=\"image\" src=\"images/random/add-to-cart.png\" width=\"30px\" height=\"30px\" class=\"cart-image vertical-align-middle\" alt=\"Submit\"></input>";
                echo "</form>";
              }

              echo "</td> </tr>";
              break;
            case "drinks":
              if($is_drink == 1)
              {
                $count_outputted_rows++;
                echo "<tr> <td>$sushi_name</td> <td>$description</td> <td>$$price</td>";

                if(isset($_SESSION["cart"]))
                {
                  echo "<td>";
                    echo "<form action=\"add-to-cart.php\" method=\"post\">";
                      echo "<input type=\"hidden\" name=\"sushi_name\" value=".str_replace(' ', '_', $sushi_name)."></input>";
                      echo    "<input type=\"hidden\" name=\"list\" value=".$_GET['list']."></input>";
                      if(isset($_GET['order']))
                      {
                        echo    "<input type=\"hidden\" name=\"order\" value=".$_GET['order']."></input>";
                      }
                      echo "<input type=\"number\" name=\"cart_number\" min=\"1\" value =\"1\" style=\"width: 40px;\"></input><br>";
                      echo "<input type=\"image\" src=\"images/random/add-to-cart.png\" width=\"30px\" height=\"30px\" class=\"cart-image vertical-align-middle\" alt=\"Submit\"></input>";
                    echo "</form>";
                  echo "</td>";
                }

                echo "</tr>";
              }
              break;
            case "specialities":
              if($is_special == 1)
              {
                $count_outputted_rows++;
                echo "<tr> <td>$sushi_name</td> <td>$description</td> <td>$$price</td>";
                $query2 = "SELECT ingredient FROM sushi_ingredients WHERE sushi_name = \"".$sushi_name."\"";
                $result2 = mysqli_query($conn, $query2);
                $ingredient = "";
                $gluten_free = true;
                $spicy = false;
                $diet = "vegan";
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

                if(isset($_SESSION["cart"]))
                {
                  echo "</td> <td>";
                  echo "<form action=\"add-to-cart.php\" method=\"post\">";
                  echo    "<input type=\"hidden\" name=\"sushi_name\" value=".str_replace(' ', '_', $sushi_name)."></input>";
                  echo    "<input type=\"hidden\" name=\"list\" value=".$_GET['list']."></input>";
                  if(isset($_GET['order']))
                  {
                    echo    "<input type=\"hidden\" name=\"order\" value=".$_GET['order']."></input>";
                  }
                  echo    "<input type=\"number\" name=\"cart_number\" min=\"1\" value =\"1\" style=\"width: 40px;\"></input><br>";
                  echo    "<input type=\"image\" src=\"images/random/add-to-cart.png\" width=\"30px\" height=\"30px\" class=\"cart-image vertical-align-middle\" alt=\"Submit\"></input>";
                  echo "</form>";
                }

                echo "</td> </tr>";
              }
              break;
            case "sushi";
              if($is_drink == 0 && $is_special == 0)
              {
                $count_outputted_rows++;
                echo "<tr> <td>$sushi_name</td> <td>$description</td> <td>$$price</td>";
                $query2 = "SELECT ingredient FROM sushi_ingredients WHERE sushi_name = \"".$sushi_name."\"";
                $result2 = mysqli_query($conn, $query2);
                $ingredient = "";
                $gluten_free = true;
                $spicy = false;
                $diet = "vegan";
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

                if(isset($_SESSION["cart"]))
                {
                  echo "</td> <td>";
                  echo "<form action=\"add-to-cart.php\" method=\"post\">";
                  echo    "<input type=\"hidden\" name=\"sushi_name\" value=".str_replace(' ', '_', $sushi_name)."></input>";
                  echo    "<input type=\"hidden\" name=\"list\" value=".$_GET['list']."></input>";
                  if(isset($_GET['order']))
                  {
                    echo    "<input type=\"hidden\" name=\"order\" value=".$_GET['order']."></input>";
                  }
                  echo    "<input type=\"number\" name=\"cart_number\" min=\"1\" value =\"1\" style=\"width: 40px;\"></input><br>";
                  echo    "<input type=\"image\" src=\"images/random/add-to-cart.png\" width=\"30px\" height=\"30px\" class=\"cart-image vertical-align-middle\" alt=\"Submit\"></input>";
                  echo "</form>";
                }

                echo "</td> </tr>";
              }
              break;
          }

          if(($count_outputted_rows%$elements_number == 0 || $number_elements_to_output == $count_outputted_rows) &&($_GET['list']=="all"||($_GET['list']=="drinks" && $is_drink==1)||($_GET['list']=="specialities" && $is_special==1)||($_GET['list']=="sushi" && $is_drink == 0 && $is_special == 0)))
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
          
        ";
    ?>
  </div>
</div>

<!-- Footer -->
<span class="card">
  <footer class="container dark-red padding-16">
    <div class="right-align text-center" style="margin-right: 100px;">
      <h3>Credits</h3>
      <p>Website created by Rota Lorenzo</p>
    </div>
    <div class="left-align" style="margin-left: 100px;">
      <h3>Contact us!</h3>
      <p>Phone: +39 345 826 4304</p>
      <p>Email: lorenzokaide@gmail.com</p>
    </div>
    <div class="text-center" style="margin-left: 40%; margin-right:40%;">
      <h3>Working hours:</h3>
      <p>Monday to Friday</p>
      <p>12:00-10:00 PM</p>
    </div>
  </footer>
</span>
<!-- Start of ChatBot (www.chatbot.com) code -->
<script type="text/javascript">
    window.__be = window.__be || {};
    window.__be.id = "60be3b9a458a1400071b6f8a";
    (function() {
        var be = document.createElement('script'); be.type = 'text/javascript'; be.async = true;
        be.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.chatbot.com/widget/plugin.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(be, s);
    })();
</script>
<!-- End of ChatBot code -->

<script src="js/javascript.js"></script>

<!-- Pop-up generated -->
<?php

  if(isset($_GET["success1"]))
  {
    echo "<script>buttonLoginFunc();openRandom();</script>";
  }

  if(isset($_SESSION["logged"])||isset($_GET["error2"])||isset($_GET["success3"]))
  {
    echo "<script>openRandom();</script>";
  }

  if(isset($_GET["error1"])||isset($_GET["error3"])||isset($_GET["error4"]))
  {
    echo "<script>buttonRegisterFunc();openRandom();</script>";
  }

  if(isset($_GET["error5"]))
  {
    echo "<script>buttonLoginFunc();openRandom();</script>";
  }

?>

</body>
</html>