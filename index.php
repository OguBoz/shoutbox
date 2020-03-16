<?php
include 'database.php';

$query = "SELECT * FROM shouts";
$shouts = mysqli_query($con, $query);


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoutbox</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <div class="container">
        <header>
        <h1>Shout IT! Shoutbox</h1>
        </header>
        <div id="shoutouts">
            <ul>
                <?php while($row = mysqli_fetch_assoc($shouts)) : ?>
                <li class="shout"><span><?php echo $row['time'];?> - </span><?php echo $row['user'] . ": " . $row['message']; ?> </li>
                <?php endwhile; ?>
            </ul>
        </div>
        <div id="input">
            <?php if(isset($_GET["error"])) : ?>
                <div class="error"><?php echo $_GET["error"]; ?></div>
            <?php endif; ?>
            <form action="process.php" method="post">
                <input type="text" name="user" placeholder="Enter your name...">
                <input type="text" name="message" placeholder="Enter a message...">
                <br>
                <input type="submit" value="Shout it out!" name="submit" class="shout-btn">
            </form>
        </div>
    </div>
</body>
</html>