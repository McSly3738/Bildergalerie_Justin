<?php

if (isset( $_SESSION['user_id'] ) ) {
    echo "<br/>";
    echo "<div class='contentuserindex'>
                    <p>Herzlich Willkommen Sie sind nun eingeloggt!</p>
                  </div>" ;

}
?>
    <link href="css/home.css" rel="stylesheet">
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/home.js"></script>

    <section class="Welcome_Index">
    <div class="in1">
      <div class="content_Index">

        <h1>FAPSY</h1>
      <h3> Beautiful free stock photos</h3>
        <a class="btn_Index">Discover now</a>
      </div>
    </div>
    </section>

    <div class="search">
      <h1>FAPSY</h1>
    <h3> Beautiful free stock photos</h3>
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search free photos.." title="Type in a name">
    </div>
    
    <div class="Welcometext">
    <p>Currently popular pictures</p>
    </div>

    <div class="startbilder">
    <a href="images/abend.jpeg"><img src="bilder/abend.jpeg" alt=""></a>
    <img src="images/berg.jpeg" alt="">
    <img src="images/eis.jpeg" alt="">
    <img src="images/rauch.jpeg" alt="">
    <img src="images/happy.jpeg" alt="">
    <img src="images/road.jpeg" alt="">
    <img src="images/street.jpeg" alt="">
    <img src="images/weg.jpeg" alt="">
    <img src="images/swiss.jpeg" alt="">
    <img src="images/car.jpeg" alt="">
    <img src="images/meer.jpeg" alt="">
    <img src="images/gang.jpeg" alt="">
    <img src="images/fett.jpeg" alt="">
    <img src="images/landscape.jpeg" alt="">
    <img src="images/handy.jpeg" alt="">
    <img src="images/motorrad.jpeg" alt="">
    <img src="images/ski.jpeg" alt="">
    <img src="images/hope.jpeg" alt="">
    <img src="images/company.jpeg" alt="">
    <img src="images/ballon.jpeg" alt="">
    <img src="images/blau.jpeg" alt="">
    </div>
