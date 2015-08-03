<?php
class Car
{
    private $make_model;
    private $price;
    private $miles;
    private $picture;

    function worthBuying($max_price)
    {
      return $this->price < ($max_price + 100);
    }

    function __construct($make_model, $price, $miles, $picture)
    {
      $this->make_model = $make_model;
      $this->price = $price;
      $this->miles = $miles;
      $this->picture = $picture;
    }

    function setMake_Model($new_make_model)
    {
      $this->make_model = $make_model;
    }

    function setPrice($new_price)
    {
      $float_price = (float) $new_price;
      if ($float_price != 0) {
          $formatted_price = number_format($float_price, 2);
          $this->price = $formatted_price;
      }
    }

    function setMiles($new_miles)
    {
      $this->miles = $new_miles;
    }

    function setPicture($new_image)
    {
      $this->picture = $image_path;
    }

    function getMake_Model()
    {
      return $this->make_model;
    }

    function getPrice()
    {
      return $this->price;
    }

    function getMiles()
    {
      return $this->miles;
    }
    function getPicture()
    {
      return $this->picture;
    }
}

$first_car = new Car("2014 Porsche 911", 7864, 114991, "porsche.jpg");
$second_car = new Car("2011 Ford F450", 14000, 55995, "ford.jpeg");
$third_car = new Car("2013 Lexus RX 350", 20000, 44700, "lexus.jpg");
$fourth_car = new Car("Mercedes Benz CLS550", 37979, 39900, "mercedes.jpg");


$cars = array($first_car, $second_car, $third_car, $fourth_car);

$cars_matching_search = array();

foreach ($cars as $car) {
    if ($car->worthBuying($_GET["price"])) {
        array_push($cars_matching_search, $car);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Your Car Dealership's Homepage</title>
</head>
<body>
    <h1>Your Car Dealership</h1>
    <ul>
        <?php
            foreach ($cars_matching_search as $car) {
                $new_price = $car->getPrice();
                $miles = $car->getMiles();
                $make_model = $car->getMake_Model();
                $picture = $car->getPicture();
                  echo "<li> $make_model </li>";
                  echo "<li> <img src='$picture'> </li>";
                  echo "<ul>";
                        echo"<li> $new_price </li>";
                        echo "<li> $miles </li>";
                  echo "</ul>";

            }
        ?>
    </ul>
</body>
</html>
