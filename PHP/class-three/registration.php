<?php
session_start();
include 'connection.php';
// echo("helllo");
// var_dump($_POST);
// echo $_SERVER['REQUEST_METHOD'];


function cleanData($conn, $data)
{
    return $conn->real_escape_string(htmlspecialchars(stripslashes(trim($data))));
}
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // echo("hi");

    // var_dump($_POST);
    $username = cleanData($conn, $_POST['username']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if (empty($username) || empty($password) || empty($password2)) {
        echo ("<script>alert('should contain all the fields')</script>");
        exit();
    };

    // echo("hi");

    $query_one = "SELECT username FROM user_details where username = ?";
    // echo("2");
    $statement_one = $conn->prepare($query_one);
    // echo("3");
    $statement_one->bind_param("s", $username);
    // echo("4");
    $statement_one->execute();

    $result = $statement_one->get_result();
    // echo("$result");
    if ($result->num_rows > 0) {
        // echo("thisis me");
        echo ("<script>alert('User already exists')</script>");
        echo ("<script>window.location.href='./registration.html'</script>");
        exit();
    } else {

        if(strlen($password)<8){
            echo("<script>alert('Password should be at least of length 8')</script>");
            echo ("<script>window.location.href='./registration.html'</script>");
            exit();

        }

        if ($password != $password2) {
            echo ("<script>alert('Passwords do not match')</script>");
            echo ("<script>window.location.href='./registration.html'</script>");
            exit();
        }

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query_two = "INSERT INTO user_details(username, password) VALUES(?,?)";
        $statement_two = $conn->prepare($query_two);
        $statement_two->bind_param("ss", $username, $hashed_password);


        if ($statement_two->execute()) {
            $_SESSION['user'] = 'registered successfully';
            header("Location: ./login.php");
        } else {
            echo ("<script>alert('Registration failed!')</script>");
            echo ("<script>window.location.href='./registration.html'</script>");
        }
    }
}
