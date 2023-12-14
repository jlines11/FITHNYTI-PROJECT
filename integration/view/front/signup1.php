<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Sign up</title>
    <link rel="stylesheet" href="css\signup.css" />

    <?php require_once 'signup.inc1.php'; ?>
    <?php if(isset($_SESSION['message'])) : ?>
    <?php
    echo $_SESSION['message'];
    unset($_SESSION['message']);
  ?>
  <?php endif;?>  

  </head>
  <body>
    <h2>Sign up au site FITHNYTI</h2>
    <form action="signup.inc1.php" method ="post">
      <input type="text" id="nom"placeholder="Nom" name="lastName" required />

      <input type="text" id="prenom"placeholder="Prenom" name="firstName" required />

      <input type="password" id="newPassword" placeholder="Mot de Passe" name="password" required />

      <input type="numero" id="numtel" placeholder="numero de telephone" name="numtel" required />
      <input type="text" id="address" placeholder="adresse" name="address" required />


      <input type="email" id="email" name="email"placeholder="Email" required />

      <input type="date" id="DOB" name="dob" placeholder="Date of Birth" required />
      

      <button name= "submit"type="submit">S'inscrire</button>
    </form>
  </body>
</html>
