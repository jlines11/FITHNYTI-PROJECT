<?php
if (session_status() == PHP_SESSION_NONE) {
    // Start the session if it's not already started
    session_start();
}
?>

<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container">
            <a class="navbar-brand" href="index.php">
                <span>
                    Fithnyti
                </span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
            </button>
            <div class="collapse navbar-collapse ml-auto  " id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                    <li class="nav-item ">
                        <a class="nav-link" href="index.php">Home </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="affichierevenementfront.php">Evenements </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="affichierevenementparticiper.php">Participations </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="affichierreclamation.php">Reclamations </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="calendrier.php">Calendrier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listedemande.php">Demandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="listeliv.php">Livraison</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ajouterlivraison2.php">Ajouter Livraison</a>
                    </li>

                </ul>
                <?php if (empty($_SESSION)) { ?>

                <div class="user_option ">
                    <a href="login.php" class="">
                        Login / Signup
                    </a>
                </div>

                <?php } else { ?>

                <div class="user_option ">
                    <a href="logout.php" class="">
                        <?php echo $_SESSION['email']; ?>

                    </a>


                </div>
                <?php } ?>

            </div>
        </nav>
    </div>
</header>
