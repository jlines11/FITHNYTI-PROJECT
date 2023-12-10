<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css\login.css" />
    <?php require_once 'login.inc1.php'; ?>
    <?php if(isset($_SESSION['message'])) : ?>
      <?php echo $_SESSION['message']; ?>
      <?php unset($_SESSION['message']); ?>
    <?php endif; ?>  
    <!-- Include reCAPTCHA script -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>
  <body>
    <h2>Login au site FITHNYTI</h2>
    <form action="login.inc1.php" method="post">
      <label for="email">Email :</label>
      <input type="email" id="email" name="email" placeholder="Email" required />
      
      <label for="newPassword">Mot de Passe :</label>
      <input type="password" id="newPassword" placeholder="Mot de Passe" name="password" required />
      
      <!-- Include reCAPTCHA widget -->
      <div class="g-recaptcha" data-sitekey="6Le6HSMpAAAAAEvwFb-Wcqs__Tigr_Cg93OouibB"></div>
      
      <button type="submit" name="login" class="btn btn-primary py-3 w-100 mb-4">Sign In</button> 
      
      <p class="text-center mb-0">Don't have an Account? <a href="signup.php">Sign Up</a></p>
      <a class="forgot text-muted" href="send.php">Forgot password?</a> 
    </form>
  </body>
</html>
