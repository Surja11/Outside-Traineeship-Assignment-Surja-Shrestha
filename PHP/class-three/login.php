<?php
session_start();
include 'connection.php';
if (isset($_SESSION['user']) && $_SESSION['user'] == 'registered successfully') {
    echo ("<script>alert('Registered successfully! Please log in.')</script>");
    unset($_SESSION['user']);
    echo ("<script>window.location.href='./login.html'</script>");
}

// check if the method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {


    // get the username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // run the query to select the details of user
    $query = "SELECT * FROM user_details WHERE username =?";
    echo ("1");

    // prepare the query
    $statement = $conn->prepare($query);
    echo ("2");

    // bind the placeholder with username
    $statement->bind_param('s', $username);
    echo ("3");

    // execute the statement
    $statement->execute();
    echo ("4");


    // get the results
    $result = $statement->get_result();


    // if result present, check if the passowords match if so redirect to dashboard
    if ($result->num_rows > 0) {
        echo ("6");
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION['username'] = $row["username"];
            header('Location: ./dashboard.php');
        } else {
            echo ("<script>alert('wrong username or password')</script>");
            echo ("<script>window.location.href='./login.html'</script>");
        }
    }
    else{
                 echo ("<script>alert('wrong username or password')</script>");
            echo ("<script>window.location.href='./login.html'</script>");   
    }
};
