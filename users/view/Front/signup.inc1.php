<?php
include_once '../../Controller/clientC.php';
include_once '../../Model/client.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$trouve = false;
$ClientC = new ClientC;

if (isset($_POST["submit"])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $numtel = $_POST['numtel'];
    $address = $_POST['address'];
    $dobString = $_POST['dob'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['message'] = "Invalid email format!";
        $_SESSION['msg_type'] = "danger";
        header("location: signup.php");
        exit();
    }

    $existingClient = $ClientC->getClientByEmail($email);

    if ($existingClient) {
        $_SESSION['message'] = "Signup invalid! Email already exists.";
        $_SESSION['msg_type'] = "danger";
        header("location: signup.php");
        exit();
    } else {
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

            $dob = new DateTime($dobString);

            $client = new client($firstName, $lastName, $email, $hashedPassword, $numtel, $address, $dob);
            $ClientC->addClient($client);

            $_SESSION['message'] = "Signup success!";
            $_SESSION['msg_type'] = "success";
            header("location: login.php");
            exit();
        } catch (Exception $e) {
            $_SESSION['message'] = "Error: " . $e->getMessage();
            $_SESSION['msg_type'] = "danger";
            header("location: signup.php");
            exit();
        }
    }
}
?>
