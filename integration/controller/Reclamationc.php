<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/config.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/model/Reclamation.php";

class Reclamationc
{
    function affichereclamations()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM reclamation where archive=0');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }

    function reclamationtraite(int $idRec)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('update reclamation  set traite=1  WHERE idrec = :idRec');
            $query->execute(['idRec' => $idRec]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function dearchiverreclamation(int $idRec)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('update reclamation  set archive=0  WHERE idrec = :idRec');
            $query->execute(['idRec' => $idRec]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function archiverreclamation(int $idRec)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('update reclamation  set archive=1  WHERE idrec = :idRec');
            $query->execute(['idRec' => $idRec]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    function affichereclamationshist()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM reclamation where archive=1');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }
    function affichereclamationsNonTraiter()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM reclamation where traite=0 and archive=0');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }
    function affichereclamationsTraiter()
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM reclamation where traite=1 and archive=0');
            $query->execute();
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }
    function ajoutereclamation(Reclamation $reclamation)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('INSERT INTO reclamation (titre, description, nomconducteur, email, numtel, type, actions, image) VALUES (:titre, :description, :nomconducteur, :email, :numtel, :type, :actions, :image)');
            $query->execute([
                'titre' => $reclamation->getTitre(),
                'description' => $reclamation->getDescription(),
                'nomconducteur' => $reclamation->getNomconducteur(),
                'email' => $reclamation->getEmail(),
                'numtel' => $reclamation->getNumtel(),
                'type' => $reclamation->getType(),
                'actions' => $reclamation->getActions(),
                'image' => $reclamation->getImage()
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerreclamation(int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('DELETE FROM reclamation WHERE idrec = :id');
            $query->execute(['id' => $id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierreclamation(Reclamation $reclamation, int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('UPDATE reclamation SET 
                titre = :titre, 
                description = :description,
                nomconducteur = :nomconducteur,
                email = :email,
                numtel = :numtel,
                type = :type,
                actions = :actions,
                image = :image
                WHERE idrec = :id');

            $query->execute([
                'titre' => $reclamation->getTitre(),
                'description' => $reclamation->getDescription(),
                'nomconducteur' => $reclamation->getNomconducteur(),
                'email' => $reclamation->getEmail(),
                'numtel' => $reclamation->getNumtel(),
                'type' => $reclamation->getType(),
                'actions' => $reclamation->getActions(),
                'image' => $reclamation->getImage(),
                'id' => $id
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function verifierreclamation(Reclamation $reclamation)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM reclamation WHERE titre = :titre AND description = :description AND type = :type AND nomconducteur = :nomconducteur AND email = :email');
            $query->execute([
                'titre' => $reclamation->getTitre(),
                'description' => $reclamation->getDescription(),
                'type' => $reclamation->getType(),
                'nomconducteur' => $reclamation->getNomconducteur(),
                'email' => $reclamation->getEmail()
            ]);
            $result = $query->fetch();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function getreclamation(int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM reclamation WHERE idrec = :id');
            $query->execute(['id' => $id]);
            $result = $query->fetch();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getStatisticsByType() {
        $pdo = config::getConnexion();

        $query = "SELECT type, COUNT(*) AS count FROM reclamation GROUP BY type";
        $statement = $pdo->query($query);

        $statisticsByType = [];
        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
            $statisticsByType[$row['type']] = $row['count'];
        }

        return $statisticsByType;
    }
}

?>
