<?php
include_once 'demandeC.php';
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/config.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/model/livraison2.php";
class traitement_livraison
{
 
    function add_livraison($livraison)
    {
        $sql = "INSERT INTO livraison VALUES (NULL, DEFAULT,:etat, :ad_depart,:ad_arrive,:tel,:dat)";
        $db = config::getConnexion();
        try {
            print_r($livraison->getDate()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'etat' => $livraison->getEtat(),
                'ad_depart' => $livraison->getAddressDepart(),
                'ad_arrive'=> $livraison->getAddressArrive(),

                'tel' => $livraison->telephone(),

                'dat' => $livraison->getDate()->format('Y/m/d')
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function listeslivraison()
    {
        $sql = "SELECT * FROM livraison";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletelivraison($id)
    {
        $sql = "DELETE FROM livraison WHERE idliv = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function update_livraison($livr, $idliv)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare( 'UPDATE livraison SET idliv = :idliv,etat_livraison = :etat_livraison ,etat =:etat , adresse_du_depart = :adresse_du_depart, adresse_du_arrive = :adresse_du_arrive ,numero_telephone = :numero_telephone ,date = :date WHERE idliv= :idliv' );
            $query->execute([
                'idliv' => $idliv,
                'etat_livraison' => $livr->etat_livraison(),
                'etat' =>$livr->getEtat(),
                'adresse_du_depart' => $livr->getAddressDepart(),
                'adresse_du_arrive' => $livr->getAddressArrive(),
                'numero_telephone' => $livr->telephone(),
                'date' => $livr->getDate()->format('Y/m/d')
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showCom($libelle)
    {
        $sql = "SELECT * FROM livraison WHERE idliv LIKE '%" . $libelle . "%' OR
        numero_telephone = '" . $libelle . "' OR etat_livraison LIKE '%" . $libelle . "%' OR etat LIKE '%" . $libelle . "%' OR  adresse_du_depart LIKE '%" . $libelle . "%' OR  adresse_du_arrive LIKE '%" . $libelle . "%'  ";
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
    function trierlivraison()
    {
        $sql = "SELECT * from livraison ORDER BY date DESC";
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
    function trierlivraison1()
    {
        $sql = "SELECT * from livraison ORDER BY date ASC";
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

    function encours()
    {
        $sql = "SELECT * FROM livraison WHERE etat_livraison = 'EN COURS' ";
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
    function recu()
    {
        $sql = "SELECT * FROM livraison WHERE etat_livraison = 'réçu' ";
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
 
   
    }


