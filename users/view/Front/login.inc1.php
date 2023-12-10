<?php
include_once '../../Controller/clientC.php';
include_once '../../Model/client.php';
include('connect.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$ClientC = new ClientC;

if (isset($_POST['login'])) {
    $email = trim($_POST["email"]);
    $password = strip_tags(trim($_POST['password']));
    $recaptcha_response = $_POST['g-recaptcha-response'];

    // Validate reCAPTCHA
    $recaptcha_secret = '6Le6HSMpAAAAAPxgQxBuej4N9_EqDNVk89C4jKFY'; // Replace with your actual secret key
    $recaptcha_url = "https://www.google.com/recaptcha/api/siteverify?secret={$recaptcha_secret}&response={$recaptcha_response}";
    $recaptcha_data = json_decode(file_get_contents($recaptcha_url));

    if (!$recaptcha_data->success) {
        $_SESSION['message'] = "Please complete the reCAPTCHA.";
        $_SESSION['msg_type'] = "danger";
        header("location: login.php");
        exit();
    }

    // Proceed with login if reCAPTCHA is successful
    $query = $db->prepare("SELECT * FROM client WHERE email=?");
    $query->execute(array($email));
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        if (password_verify($password, $user['password'])) {
            if ($user['type'] == 1) {
                header("location: ../Back/index.php");
            } else {
                $_SESSION["email"] = $email;
                $_SESSION["idClient"] = $user['idClient'];
                header("location: index.php");
            }
        } else {
            $_SESSION['message'] = "Login invalid! Email or Password is incorrect.";
            $_SESSION['msg_type'] = "danger";
            header("location: login.php");
        }
    } else {
        $_SESSION['message'] = "Login invalid! Email or Password is incorrect.";
        $_SESSION['msg_type'] = "danger";
        header("location: login.php");
    }
}
?>
