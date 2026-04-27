<?php
session_start();
include 'connection.php';

// var_dump($_POST);
// echo $_SERVER['REQUEST_METHOD'];

// Function to clean the input
function cleanData($conn, $data)
{
    return $conn->real_escape_string(htmlspecialchars(stripslashes(trim($data))));
}


if ($_SERVER['REQUEST_METHOD'] == "POST") {

    // var_dump($_POST);
    $username = cleanData($conn, $_POST['username']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];


    // if any input field is empty, show alert
    if (empty($username) || empty($password) || empty($password2)) {
        echo ("<script>alert('should contain all the fields')</script>");
        exit();
    };

    // echo("hi");
    // query to select the username if it already exists
    $query_one = "SELECT username FROM user_details where username = ?";
    // echo("2");
    // preparing the query
    $statement_one = $conn->prepare($query_one);
    // echo("3");
    // binding the username to query
    $statement_one->bind_param("s", $username);
    // echo("4");
    // executing the query
    $statement_one->execute();

    $result = $statement_one->get_result();
    // echo("$result");
    // if there exists user with the same username, show alert
    if ($result->num_rows > 0) {
        // echo("thisis me");
        echo ("<script>alert('User already exists')</script>");
        echo ("<script>window.location.href='./registration.html'</script>");
        exit();
    } else {

        // if password length is less than 8 show alert
        if(strlen($password)<8){
            echo("<script>alert('Password should be at least of length 8')</script>");
            echo ("<script>window.location.href='./registration.html'</script>");
            exit();

        }

        // if password and retype password do not match, show error
        if ($password != $password2) {
            echo ("<script>alert('Passwords do not match')</script>");
            echo ("<script>window.location.href='./registration.html'</script>");
            exit();
        }

        // hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
        // create insert query
        $query_two = "INSERT INTO user_details(username, password) VALUES(?,?)";
        // prepare the query
        $statement_two = $conn->prepare($query_two);
        // bind the input username and hashed password to the query
        $statement_two->bind_param("ss", $username, $hashed_password);


        // execute the query and redirect to login page
        if ($statement_two->execute()) {
            $_SESSION['user'] = 'registered successfully';
            header("Location: ./login.php");
        } else {
            echo ("<script>alert('Registration failed!')</script>");
            echo ("<script>window.location.href='./registration.html'</script>");
        }
    }
}
