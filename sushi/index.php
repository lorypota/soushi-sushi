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
  if(isset($_SESSION["popuplogin"]) && $_SESSION["popuplogin"] == 1)
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
                  <p class=\"random-style\">Incorrect email or password.</p>
                </div>
              </div>";
  }

?>

<html>
<title>Soushi sushi - Homepage</title>
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
    <img src="images/random/menu.png" class="bar-img" style="width: 55px; padding-left: 35px;"></img>
    <a href="#menu" class="bar-item button-topmenu text-white hover-text-red"> MENU </a>
    <img src="images/random/question.png" class="bar-img" style="width: 55px; padding-left: 35px;"></img>
    <a href="#who" class="bar-item button-topmenu text-white hover-text-red"> US </a>
    <img src="images/random/medal.png" class="bar-img" style="width: 55px; padding-left: 35px;"></img>
    <a href="#quality" class="bar-item button-topmenu text-white hover-text-red"> QUALITY </a>
    <img src="images/random/where.png" class="bar-img" style="width: 55px; padding-left: 35px;"></img>
    <a href="#where" class="bar-item button-topmenu text-white hover-text-red"> WHERE </a>

    <!-- Register -->
    <?php
    
    if(isset($_SESSION["logged"])){
      echo "<img src=\"images/random/shopping-cart.png\" class=\"bar-img\" style=\"width: 55px; padding-left: 35px;\"></img>
           <a href=\"shopping-cart.php\" class=\"bar-item button-topmenu text-white hover-text-red\"> SHOPPING-CART </a>";
      echo "<button id=\"accountButton\" class=\"bar-item button-topmenu button-account\" style=\"float: right; padding: auto 20px auto 20px;\">Logged in as: ".$_SESSION['username']."</button>";
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
        <form action="login-account.php?page=index" method="post">
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
        <form action="register-account.php" method="post">
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

  if(isset($_GET["success1"])||isset($_GET["success3"])||isset($_GET["error1"])||isset($_GET["error2"])||isset($_GET["error3"])||isset($_GET["error4"])||isset($_GET["error5"]))
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

<!-- Images zoom -->
<div id="modal-img-zoom">
  <span id="modal-close" class="modal-button hover-text-red clickable" style="font-size: 50px; top: 40px; right: 100px;">&times;</span>
  <div class="modal-button display-left hover-text-red clickable padding-lr120" onclick="plusModalImg(-1)">❮</div>
  <div class="modal-button display-right hover-text-red clickable padding-lr120" onclick="plusModalImg(1)">❯</div>
  <img class="modal-content" id="modal-img" style="height:70%; width: auto;">
  <p id="caption"></p>
</div>

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

              

  <!-- 3 categories -->
  <a name="menu"></a>
  <div class="row-padding text-center margin-top">
    
    <div class="third">
      <div class="card container orange padding-tb5" style="min-height:310px">
        <h2>Sushi</h2>
        <img src="images/icons/044-sushi.png" width="150px"></img></br></br>

        <!-- Button learn more -->
        <button class="learn-more" onclick="location.href = 'menu.php?list=sushi';">
          <span class="circle background-black">
            <span class="icon arrow background-white"></span>
          </span>
          <span class="button-text color-black">SUSHI </span>
        </button>

      </div>
    </div>

    <div class="third">
      <div class="card container white padding-tb5" style="min-height:310px">
        <h2>Specialties</h2>
        <img src="images/icons/050-noodles.png" width="150px"></img></br></br>

        <!-- Button learn more -->
        <button class="learn-more" onclick="location.href = 'menu.php?list=specialities';">
          <span class="circle background-black">
            <span class="icon arrow background-white"></span>
          </span>
          <span class="button-text color-black"> SPECIAL </span>
        </button>

      </div>
    </div>

    <div class="third">
      <div class="card container brown padding-tb5" style="min-height:310px">
        <h2>Drinks</h2>
        <img src="images/icons/031-ice-tea.png" width="150px"></img></br></br>
        
        <!-- Button learn more -->
        <button class="learn-more" onclick="location.href = 'menu.php?list=drinks';">
          <span class="circle background-black">
            <span class="icon arrow background-white"></span>
          </span>
          <span class="button-text color-black">DRINKS </span>
        </button>

      </div>
    </div>

  </div>
  
  <!-- Whole menu -->
  <div class="padding-whole-menu text-center margin-top">
    <div class="card container background-white" style="min-height:310px">
      <div class="padding-tb5">
        <h2>Search through the whole menu!</h2>
      </div>

      <!-- Scrolling image -->
      <div class="container-menu">
        <div class="sliding-background">
          </br></br>
        </div>
      </div>

      </br>

      <!-- Button learn more -->
      <button class="learn-more" onclick="location.href = 'menu.php?list=all';">
        <span class="circle background-black">
          <span class="icon arrow background-white"></span>
        </span>
        <span class="button-text color-black">EVERYTHING</span>
      </button>

    </div>
  </div>
  
  <!-- Who are we -->
  <a name="who"></a>
  <div class="padding-whole-menu text-center padding-16">
    <div class="card background-white" style="min-height:310px">
      <div class="padding-tb5">
        <h2>Who are we?</h2>
      </div>
      <div class="padding-32-side percent-40" style="text-align: justify;">
        <h4>Soushi is a <i> small company born in Bergamo, Italy</i>. With our sushi you will experience the <i>liveliness and excitement of our kitchen</i>. Our extraordinary cooks wish to make your meal an <i>unforgettable event</i>. You can view our entire menu online.<i> Soushi wishes you a great meal</i>!</h4>
      </div>
      <div class="padding-32-side percent-60">
        <img src="images/random/img-sushi-6.jpg" alt="Kirashi" class="clickable-image" width="23%" height="220px" style="object-fit: cover;">
        <img src="images/random/img-sushi-2.jpg" alt="Pink uramaki" class="clickable-image" width="23%" height="220px" style="object-fit: cover;">
        <img src="images/random/img-sushi-3.jpg" alt="Uramaki with tobiko" class="clickable-image" width="23%" height="220px" style="object-fit: cover;">
        <img src="images/random/img-sushi-8.jpg" alt="A collection of our best sushi" class="clickable-image" width="23%" height="220px" style="object-fit: cover;">
      </div>
    </div>
  </div>
  
  <!-- Quality -->
  <a name="quality"></a>
  <div class="padding-whole-menu text-center">
    <div class="card background-white" style="min-height:330px">
      <div class="padding-tb5">
        <h2>Soushi quality</h2>
      </div>
      <div class="percent-35">
        <img src="images/random/quality-3.jpg" alt="Our rice" class="clickable-image" width="50%" height="110px" style="object-fit: cover;"><br><br>
        <img src="images/random/quality-7.jpg" alt="Our salmon" class="clickable-image" width="40%" height="105px" style="object-fit: cover;">&nbsp;&nbsp;&nbsp;
        <img src="images/random/quality-2.jpg" alt="Our rice" class="clickable-image" width="40%" height="105px" style="object-fit: cover;">
      </div>
      <div class="percent-45" style="text-align: justify;">
        <h6><b>Soushi</b> made sushi available to <b>everyone</b>, without compromises on <b>quality</b>. Some years back sushi was considered a dish to reserve for special occasions, but now you can eat it <b>anywhere</b> and at a <b>compromisable price</b>. All <b>ingredients </b>are <b> selected with care</b>, treated and conserved by the law and combined to offer you the <b>best experience</b>. Soushi guarantees <b>food safety</b> and manteinment of properties of the singular ingredients, thanks to careful workmanship. <br>Soushi sushi is here to offer you the <b> best quality and experience</b>!</h6>
      </div>
      <div class="padding-32-side percent-20">
        <img src="images/random/quality-8.jpg" alt="Our green tea matcha" class="clickable-image" width="80%" height="240px" style="object-fit: cover;">
      </div>
    </div>
  </div>
    
  <!-- Where are we? -->
  <a name="where"></a>
  <div class="padding-whole-menu text-center padding-16">
    <div class="card background-white" style="min-height:310px">
      <div class="padding-tb5">
        <h2>Where are we?</h2>
      </div>
      <div class="padding-32-side one-quarter-map">
        <br><br>
        <h5>
          Our address is: <br>
          I.I.S.S. Ettore Majorana, <br>
          Seriate, Via Partigiani
        </h5>
      </div>
      <div class="padding-32-side three-quarter-map" >
        <iframe width="100%" height="220" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" id="gmap_canvas" src="https://maps.google.com/maps?width=950&amp;height=500&amp;hl=en&amp;q=Via%20Partigiani,%201%20Seriate%20BG&amp;t=&amp;z=12&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe>
      </div>
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