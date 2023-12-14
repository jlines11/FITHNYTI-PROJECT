<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/config.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/model/ReponseAdmin.php";
class ReponseAdminc
{
    function affichereponsesparrec(int $id)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM ReponseAdmin where idrec=:id');
            $query->execute(['id' => $id]);
            $result = $query->fetchAll();
            return $result;
        } catch (Exception $e) {
            die('Erreur :' . $e->getMessage());
        }
    }

    function ajoutereponse(ReponseAdmin $reponse)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('INSERT INTO ReponseAdmin (titre, description, image, dateReponse, idrec) VALUES (:titre, :description, :image, :dateReponse, :idrec)');
            $query->execute([
                'titre' => $reponse->getTitre(),
                'description' => $reponse->getDescription(),
                'image' => $reponse->getImage(),
                'dateReponse' => $reponse->getDateReponse(),
                'idrec' => $reponse->getReclamationAssociee()->getIdrec()
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function supprimerreponse(int $idReponse)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('DELETE FROM ReponseAdmin WHERE idReponse = :idReponse');
            $query->execute(['idReponse' => $idReponse]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function modifierreponse(ReponseAdmin $reponse, int $idReponse)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('UPDATE ReponseAdmin SET 
                titre = :titre, 
                description = :description,
                image = :image,
                dateReponse = :dateReponse,
                WHERE idReponse = :idReponse');

            $query->execute([
                'titre' => $reponse->getTitre(),
                'description' => $reponse->getDescription(),
                'image' => $reponse->getImage(),
                'dateReponse' => $reponse->getDateReponse(),
                'idReponse' => $idReponse
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function getreponse(int $idReponse)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('SELECT * FROM ReponseAdmin WHERE idReponse = :idReponse');
            $query->execute(['idReponse' => $idReponse]);
            $result = $query->fetch();
            return $result;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    function likerep(int $idReponse, int $nblike)
    {
        $pdo = config::getConnexion();
        try {
            $query = $pdo->prepare('update ReponseAdmin  set nblike=:nblike WHERE idReponse = :idReponse');
            $query->execute(['idReponse' => $idReponse, 'nblike' => $nblike]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}


?>