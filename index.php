<?php

declare(strict_types=1);
require(__DIR__ . "/hotelFunctions.php");
require(__DIR__ . "/prices.php");
require(__DIR__ . '/vendor/autoload.php');
unset($_SESSION["loginVerified"]);
$currenMonth = 1;
$currenYear = 2023;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="settings.css">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>Island Hotel</h1>
    </header>
    <main>
        <section class="heroSection">
            <img src="images/heroOne.jpg" alt="">
            <img src="images/heroTwo.jpg" alt="">
            <img src="images/heroThree.jpg" alt="">
        </section>
        <section class="rooms">
            <?php foreach ($rooms as $room) : ?>
                <div class="room">
                    <h1><?php echo $room["room"] ?></h1>
                </div>
            <?php endforeach ?>
        </section>

        <section class="booking">
            <form action="payment.php" method="POST">
                <select name="roomSelect" class="roomSelect">
                    <?php for ($i = 0; $i < count($rooms); $i++) : ?>
                        <option value=<?php echo $i + 1 ?>><?php echo $rooms[$i]["room"] . " ($" . $rooms[$i]["price"] . ")" ?></option>
                    <?php endfor ?>
                </select>
                <section class="dates">
                    <div>
                        <p>arrival</p>
                        <input type="date" name="arrivalDate" min="2023-01-01" max="2023-01-31">
                    </div>
                    <div>
                        <p>departure</p>
                        <input type="date" name="departureDate" min="2023-01-01" max="2023-01-31">
                    </div>
                </section>
                <section class=" features">
                    <?php foreach ($features as $feature) : ?>
                        <div class="feature">
                            <input type="checkbox" name="<?php echo $feature['feature']; ?>" value="<?php echo $feature['price']; ?>">
                            <?php echo $feature["feature"] . " ($" . $feature["price"] . ")" ?>

                        </div>
                    <?php endforeach ?>
                </section>
                <button type="submit">submit</button>
            </form>
        </section>
    </main>
    <script src="calendar.js"></script>
</body>

</html>
