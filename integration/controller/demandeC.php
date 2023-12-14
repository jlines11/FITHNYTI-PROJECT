<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/config.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/model/demande.php";
class DemandeC
{
 
    function add_demande($demande)
    {
        $sql = "INSERT INTO demande VALUES (NULL, DEFAULT,:disponibilite, :livraison,:conducteur)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'disponibilite' => $demande->getDisponibilite(),
                'livraison' => $demande->getLivraison(),
                'conducteur'=> $demande->getConducteur()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listesDemande()
    {
        $sql = "SELECT * FROM demande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteDemande($id)
{
    $sql = "DELETE FROM demande WHERE idD = :id";
    $db = config::getConnexion();

    try {
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);
        $req->execute();
        unset($db); // Fermez explicitement la connexion après l'exécution
    } catch (Exception $e) {
        // Loggez l'erreur ou renvoyez-la de manière plus contrôlée au lieu d'utiliser die
        die('Error during deletion: ' . $e->getMessage());
    }
}
function updateDemande($demande, $id)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE demande SET
             idD = :idD,
             dateD = :dateD,
             disponibilite = :disponibilite,
             livraison = :livraison,
             conducteur = :conducteur  
             WHERE idD = :id'
        );
        $query->execute([
            'idD' => $id,
            'dateD' => $demande->getDateD()->format('Y/m/d'),
            'disponibilite' => $demande->getDisponibilite(),
            'livraison' => $demande->getLivraison(),
            'conducteur' => $demande->getConducteur(),
            'id' => $id // Ajout du paramètre manquant
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage(); // Affiche l'erreur s'il y en a une
    }
}

    function showDemande($id)
    {
        $sql = "SELECT * from demande where idD = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $commande = $query->fetch();
            return $commande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function showCom($libelle)
    {
        $sql = "SELECT * FROM demande WHERE idD LIKE '%" . $libelle . "%' OR
        dateD LIKE '%" . $libelle . "%' OR livraison LIKE '%" . $libelle . "%' OR conducteur LIKE '%" . $libelle . "%' OR  disponibilite LIKE '%" . $libelle . "%'  ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
   
            $com = $query->fetchAll();
            return $com;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function trierdemande()
    {
        $sql = "SELECT * from demande ORDER BY dateD DESC";
        $db = config::getConnexion();
        try {
            $req = $db->query($sql);
            return $req;
        } 
        catch (Exception $e)
         {
            die('Erreur: ' . $e->getMessage());
        }
    
    
    
    }
    function trierdemande1()
    {
        $sql = "SELECT * from demande ORDER BY dateD ASC";
        $db = config::getConnexion();
        try {
            $req = $db->query($sql);
            return $req;
        } 
        catch (Exception $e)
         {
            die('Erreur: ' . $e->getMessage());
        }
    
    
    
    }
    }


