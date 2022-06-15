<?php
require 'functions.php';
$connection = dbConnect();
//checken of id is meesgestuurd in de URL :)
if(!isset($_GET['id'])){
    echo "de ID is niet gezet";
    exit;
}
//checken of het een integer is :o
$id = $_GET['id'];
$check_int = filter_var($id, FILTER_VALIDATE_INT);
if($check_int == false){
    echo "dit is geen integer";
    exit;
}
$statement = $connection->prepare('SELECT * FROM `products` WHERE id=?');
$params = [$id];
$statement->execute($params);
$products = $statement->fetch(PDO::FETCH_ASSOC);

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
    <h1><?php echo $products['titel']; ?>™</h1>
    <p><?php echo $products['beschrijving']; ?></p>
    <em>€<?php echo $products['prijs']; ?></em>


    <a href="index.php">terug</a>
</body>
</html>