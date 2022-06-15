<?php
require 'php/functions.php';
$connection = dbConnect();

//checken of er gegevens zijn opgestuurd
if($_SERVER['REQUEST_METHOD'] == "POST"){
  //gegevens tonen
  print_r($_POST);
  exit;
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link rel="stylesheet" href="css/contact.css">
  <link rel="stylesheet" href="css/main.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Odibee+Sans&display=swap" rel="stylesheet">

</head>
<body>
  <header>
    <nav>
      <a class="logo" href="home.html"> TechShop </a>
      <ul class="nav-list">
         <li><a href="home.html"> Home </a></li>
         <li><a href="#Services">Services </a></li>
         <li><a href="#Shop"> Shop </a></li>
         <li><a href="contact.php"> Contact </a></li>
      </ul>
    </nav>
  </header>
  <main>
    <article>
      <section class="contact"> 
        
        <h2>Contact us</h2>
        <form action="contact.php" method="POST">
          <label for="naam">name</label>
          <input class="input" type="text" name="naam" id="naam" required>

          <label for="email"><br> e-mail</label>
          <input class="input" type="email" name="email" id="email" required>

          <label for="bericht"><br>message</label>
          <textarea class="input  texter" name="bericht" id="bericht" required></textarea>

          <button class="input" type="submit">Submit</button>
        </form>

      </section>
    </article>
  </main>
</body>


</html>
      