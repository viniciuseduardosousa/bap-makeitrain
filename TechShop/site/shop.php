<?php
require 'php/functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `products`');

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>

  <link rel="stylesheet" href="css/shop.css">
  <link rel="stylesheet" href="css/navbar.css">
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
         <li><a href="#Shop"> Shop </a></li>
         <li><a href="contact.php"> Contact </a></li>
      </ul>
    </nav>
  </header>
  <main>

    <section class='main'>
    <?php foreach($result as $row):?>
      <section class="grid-item">

        <article class="card">
          <img class="card-img" src="<?php echo $row['foto']?>"/>
          <section class="card-content">
            <h2 class="card-header"><?php echo $row['titel']; ?></h2>
            <p class="card-text">
            <?php echo $row['beschrijving']; ?>
            <br>
            €<?php echo $row['prijs'];?>
            </p>
            <button class="card-btn">Bekijken <span>&rarr;</span></button>
          </section>
        </article>
      </section>
      <?php endforeach; ?>
    </section>
      

  </main>

</body>
</html>