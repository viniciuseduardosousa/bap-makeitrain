<?php
require 'functions.php';
$connection = dbConnect();

$result = $connection->query('SELECT * FROM `products`');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bap-Les2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <section>
    <?php
    foreach($result as $row):
    ?>
        <article>
        <h2><?php echo $row['titel']; ?>  </h2>
        <p> <?php echo $row['beschrijving']; ?> </p>
        <em> <?php echo $row['prijs']; ?> </em>
        </article>
    </section>
    <?php
    endforeach;
     echo "het werkt";
    ?>

</body>
</html>