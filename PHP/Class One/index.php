<?php

$name = htmlspecialchars($_POST['name']);
$age = htmlspecialchars($_POST['age']);
$color = htmlspecialchars($_POST['color']);
$hobbies = $_POST['hobbies'];

if (!$name) {
    $message = "Name should be entered";
    echo "<script>alert(' $message ');</script>";
    exit();
} else {

    echo "Hello " . $name;
}
echo "<br><br>";


//    if (gettype($age)!='int'){
//         $message = "Age should be a number";
//             echo "<script>alert(' $message ');</script>";
//             exit();
//    }

if ($age == "") {

    $message = "Age should be entered";
    echo "<script>alert(' $message ');</script>";
    exit();
} else {

    if ($age > 18) {
        echo $name . " You are an adult.<br><br>";
    } else {
        echo $name . " You are a minor.<br><br>";
    }
}
if (!$color) {
    $message = "Color should be entered";
    echo "<script>alert(' $message ');</script>";
    exit();
} else {
    switch ($color) {
        case "red":
            echo "Red is a bold choice!<br><br>";
            break;
        case "blue":
            echo "Blue is calming!<br><br>";
            break;
        case "green":
            echo "Green represents nature.<br><br>";
            break;
        default:
            echo "That's an interesting choice!<br><br>";
    };
}

if ($hobby == []) {

    echo "The hobbies you selected are:<br><br>";

    foreach ($hobbies as $hobby) {
        echo $hobby . "<br>";
    }
} else {

    $message = "Hobby should be selected";
    echo "<script>alert(' $message ');</script>";
    exit();
}

echo "<br>The loop till the year you have lived is:<br><br>";

for ($i = 1; $i <= $age; $i++) {
    echo $i . "<br>";
}
