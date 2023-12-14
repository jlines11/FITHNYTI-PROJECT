<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

  <title>Elaxi</title>

  <!-- slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css" />

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Dosis:500|Poppins:400,600,700&display=swap" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" /><link rel="stylesheet" href="css\login.css" />
</head>

<body>
  <div class="hero_area">
      <!-- header section strats -->
   <?php include 'navigation.php'; ?>
    <!-- end header section -->

    <link rel="stylesheet" href="css\signup.css" />

    <?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once 'signup.inc1.php';
?>    <?php if(isset($_SESSION['message'])) : ?>
    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  ?>
  <?php endif;?>
    <!-- slider section -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <div class="container">
      <div class="col-md-11 col=lg-9 mx-auto px-0">
        <div class="book_form ">
          
        <form action="signup.inc1.php" method ="post">
        <label for="email">Last name :</label>
      <input type="text" class="form-control"  id="nom"placeholder="Nom" name="lastName" required />
      <label for="email">First name :</label>
      <input type="text" class="form-control" id="prenom"placeholder="Prenom" name="firstName" required />
      <label for="email">Password :</label>
      <input type="password" class="form-control" id="newPassword" placeholder="Mot de Passe" name="password" required />
      <label for="email">Numero :</label>
      <input type="numero" class="form-control" id="numtel" placeholder="numero de telephone" name="numtel" required />
      <label for="email">Address :</label>
      <input type="text" class="form-control" id="address" placeholder="adresse" name="address" required />
      <label for="email">Email :</label>
      <input type="email" class="form-control" id="email" name="email"placeholder="Email" required />
      <label for="email">Date :</label>
      <input type="date" class="form-control" id="DOB" name="dob" placeholder="Date of Birth" required />
      

      <button name= "submit"type="submit" class="btn btn-primary py-3 w-100 mb-4">S'inscrire</button>
    </form>
        </div>
      </div>
    </div>
 
  </div>

  


  <script src="js/jquery-3.4.1.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <script src="js/custom.js"></script>

</body>

</html>