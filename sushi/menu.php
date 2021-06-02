
<html>
<title>Soushi sushi - Menu</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="css/css.css">
<link rel="icon" sizes="192x192" href="images/random/logo9.png">
<body onload="startModalImg();">

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
    
    if(isset($_GET["success2"])){
      echo "<img src=\"images/random/shopping-cart.png\" class=\"bar-img\" style=\"width: 55px; padding-left: 35px;\"></img>
           <a href=\"#map\" class=\"bar-item button-topmenu text-white hover-text-red\"> SHOPPING-CART </a>";
      echo "<button id=\"accountButton\" class=\"bar-item button-topmenu button-account\" style=\"float: right; padding: auto 20px auto 20px;\">Logged in as: ".$_GET["success2"]."</button>";
      $popupAccount = " <div id=\"account\">
                          <div class=\"account-content\">
                            <span class=\"close-account close-x\">&times;</span>
                            <h2 class=\"random-style\">Account: ".$_GET["success2"]."</h2>
                            <p class=\"random-style\">First name: ".$_GET["first"]."</p>
                            <p class=\"random-style\">Last name: ".$_GET["last"]."</p>
                            <form action=\"logout.php\">
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
        <form action="login-account.php" method="post">
          <input required type="text" placeholder="Username" name="un" />
          <input required type="password" placeholder="Password" name="pw" />
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
        <form action="register-account.php" method="post">
          <input required type="text" placeholder="Username" name="un" />
          <input required type="password" placeholder="Password" name="pw1" />
          <input required type="password" placeholder="Repeat your password" name="pw2" />
          <input required type="text" placeholder="First Name" name="fn" />
          <input required type="text" placeholder="Last Name" name="ln" />
          <button type="submit" > Register </button>
        </form>
      </div>
    </div>

  </div>
</div>

<!-- Pop-up generated -->
<?php

  if(isset($_GET["success1"])||isset($_GET["success2"])||isset($_GET["success3"])||isset($_GET["error1"])||isset($_GET["error2"])||isset($_GET["error3"])||isset($_GET["error4"])||isset($_GET["error5"]))
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

      $query = "SELECT sushi_name, description, price, is_special, is_drink FROM sushi";

      $result = mysqli_query($conn, $query);

      $num = mysqli_num_rows($result);
      echo "<h2>$num dishes or drinks available!</h2> ";  //Shows number of dishes
    ?>

    <form action="menu.php" method="get">
      Order by: 
      <select name="order">
        <option value="all">Show all</option>
        <option value="sushi">Sushi</option>
        <option value="specialties">Specialties</option>
        <option value="drinks">Drinks</option>
      </select>

      Number of table rows: 
      <input type="text" name="elements_number" value="20" style="width: 30px;"></input>
      <input type="image" src="images/random/search.png" width="15px" height="15px" class="search" alt="Submit">
    </form>

    <div style="width:98%; margin:1%;">

        <?php

          $count = 0;
          $elements_number = 20;
          
          if ($result->num_rows > 0)
          {
            // output data of each row
            while($row = $result->fetch_assoc())
            {

              $sushi_name = $row['sushi_name'];
              $description = $row['description'];
              $price = $row['price'];
              $is_special = $row['is_special'];
              $is_drink = $row['is_drink'];

              $page_number = ceil($count/$elements_number);
              $page_number2 = $page_number+1;
              $count++;

              if($count-1 == 0 || ($count-1)%$elements_number == 0)
              {
                echo "<table class=\"table-style page".$page_number2."\">
                      <thead>
                        <tr>
                          <th>Sushi name</th>
                          <th>Description</th>
                          <th>Price</th>
                        </tr>
                      </thead>
                      <tbody>";
              }

              echo "<tr>
                      <td>$sushi_name</td>
                      <td>$description</td>
                      <td>$$price</td>
                    </tr>";

              if($count == $num || $count%$elements_number == 0)
              {
                echo "</tbody>
                      </table>";
              }
            }
          }
          else
          {
              die('Error during the retrieval of data!');
          }

        ?>

      <?php

      echo "<style>
            .page1 {display: block}
            ";
            for($i=2; $i<=ceil($num/$elements_number); $i++)
            {
              echo ".page".$i." {display: none}";
            }
      echo "</style>
            <script>

              var selectedPage = 1;
              var num_pages = ".$page_number.";
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

            <input type=\"text\" id=\"pageNumber\" value=\"1\" class=\"text-center\" style=\"width: 10px; border: none;\" readonly></input>
            
            <button onclick=\"incrementPage()\"> ❯ </button>
            
          ";
      ?>

    </div>
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

  if(isset($_GET["success1"]))
  {
    echo "<script>buttonLoginFunc();openRandom();</script>";
  }

  if(isset($_GET["success2"])||isset($_GET["error2"])||isset($_GET["success3"]))
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