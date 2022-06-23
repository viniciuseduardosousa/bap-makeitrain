<?php
require 'php/functions.php';
$connection = dbConnect();

$naam = '';
$email = '';
$bericht = '';

//Opslag variabele voor errors
$errors = [];


if($_SERVER['REQUEST_METHOD'] == "POST"){
  //gegevens opslaan
  $naam = $_POST['naam'];
  $email = $_POST['email'];
  $bericht = $_POST['bericht'];
  $tijdstip = date('Y-m-d H:i:s');

  //fouten controleren / valideren van input

  if(isEmpty($naam)){
    $errors['naam'] = 'Vul uw naam in';
  }
  if(!isValidEmail($email)){
    $errors['email'] = 'Vul uw email in';
  }
  if(!hasMinLength($bericht, 5)){
    $errors['bericht'] = 'Meer woorden aub.';
  }

  //print_r($errors);

  if(count($errors) == 0){
    $sql = "INSERT INTO `berichten` (`naam`, `email`, `bericht`, `tijdstip`) 
            VALUES (:naam, :email, :bericht, :tijdstip);";
    
    $statement = $connection->prepare($sql);
    $params = [
        'naam' => $naam,
        'email' => $email,
        'bericht' => $bericht,
        'tijdstip' => $tijdstip

    ];

    $statement->execute($params);


    //stuur bezoeker naar bedankt pagina
    header('Location: bedankt.html');
    exit;
  }
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
         <li><a href="shop.php"> Shop </a></li>
         <li><a href="contact.php"> Contact </a></li>
      </ul>
    </nav>
  </header>
  <main>
    <article>
      <section class="contact hue-rotation"> 
        
        <h2>Contact us</h2>
        <form action="contact.php" method="POST" novalidate>
          <label for="naam">name</label>
          <input class="input" type="text" value="<?php echo $naam; ?>" name="naam" id="naam" required>
          <?php if(!empty($errors['naam'])): ?>
              <em class="errors"><?php echo $errors['naam'] ?></em>
          <?php endif;?>

          <label for="email"><br> e-mail</label>
          <input class="input" type="email" value="<?php echo $email; ?>" name="email" id="email" required>
          <?php if(!empty($errors['email'])): ?>
              <em class="errors"><?php echo $errors['email'] ?></em>
          <?php endif;?>

          <label for="bericht"><br>message</label>
          <textarea class="input  texter" name="bericht" id="bericht" required><?php echo $bericht; ?></textarea>
          <?php if(!empty($errors['bericht'])): ?>
              <em class="errors"><?php echo $errors['bericht'] ?></em>
          <?php endif;?>
          <br>

          <button class="submit" type="submit">Submit</button>
        </form>

      </section>
    </article>
  </main>
</body>


</html>
      