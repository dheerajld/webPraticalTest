<?php

include_once('connection.php');

function test_input($data)
{

    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);
    $stmt = $conn->prepare("SELECT * FROM administrator");
    $stmt->execute();
    $users = $stmt->fetchAll();

    $id = $_SESSION['id'];

    foreach ($users as $user) {

        if (($user['username'] == $username) &&
            ($user['password'] == $password)
        ) {
            // header("location: administrator.php");
            session_start();
            echo "<script type = \"text/javascript\">
									alert(\"Login Successful.................\");
									window.location = (\"administrator.php\")
									</script>";
        } else {
            echo "<script type = \"text/javascript\">
									alert(\"Login Failed. Try Again................\");
									window.location = (\"index.php\")
									</script>";
            // header("location: index.php");
            die();
        }
    }
}
