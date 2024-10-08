<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Activity 1</h1>
    <?php

    $count = 2;

    while ($count <= 20){
        echo $count. " ";
        $count +=2 ;
    }
    ?>
    <h1>Activity 2</h1>
    <?php
    $password = isset($post['password']) ? $post['password'] : '';

    do {
        if ($password !== "password123"){
            echo "<h2>Invalid password. Please try again.<h2>";
            echo "<form method ="post">
            <label for="password"> Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="submit">
            </form>";
        }
    
    }
    while ($password !== "password123");

    if ($password === "password123") {
        echo "<h2>Access Granted.<h2>";
    }
?>
<h1>Activity 3</h1>
<?php
for ($i = 1; $i <=10; $i++){
    echo "7 x $i =" . (7 * $i) . " ";
}
?>

<h1>activity  4</h1>
<?php

for ($i = 1; $i <= 10; $i++){
    
    if ($i == 5){
        continue;
    }
    if ($i == 9){
        break
    }
    echo $i . " ";
}
?>
<?php
<h1>activity 5</h1>
$sum = 0;
$num = 1;

while ($num <= 100) {
    $sum += $num;
    $num++;
}
echo "the sum of the numbers from 1 to 100 is: " . $ sum;
?>
<h1>activity 6</h1>

<?php
$mov = ["The Shawshank Redemption", "Inception", "The Dark Knight", "Interstellar", "Parasite"];

$counter = 1;

foreach "$mov as $mov<br>";
$counter++;
?>
<h1>activity 7</h1>

<?php
$stud = [
    "name" => "John",
    "age" => 21,
    "grade" => "A",
    "city" => "Baguio"
];

foreach ($stud as $key => $value){
    echo "$key: $value<br>";
}


</body>
</html>