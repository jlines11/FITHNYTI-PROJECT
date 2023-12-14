<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/config.php";
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/model/participation.php" ;

class Participationc{

    function afficherparticipation(int $iduser)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from evenement e join participation p on e.idevent=p.idevent where iduser=:iduser');
            $query->execute([
                'iduser'=>$iduser
                ]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function ajouterparticipation(Participation $participation)
    {

        $pdo = config::getConnexion();
        try
        {

            $query = $pdo->prepare('insert into participation (idevent,iduser) values (:idevent,:iduser)');
            $query->execute(['idevent'=>$participation->getIdevent(),
                'iduser'=>$participation->getIduser()
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }

    function supprimerparticipation(int $id,int $iduser)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from participation where idevent = :id and iduser=:iduser');
            $query->execute(['id' => $id,
            'iduser'=>$iduser
            ]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function verif(int $idevent,int $iduser)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from participation where idevent=:idevent and iduser=:iduser');
            $query->execute(['idevent'=>$idevent,
                'iduser'=>$iduser
            ]);
            $result = $query->fetch();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }

    function getuser(int $id)
    {
        $pdo = config::getConnexion();
        try {

            $query = $pdo->prepare('SELECT * FROM user where id = :id');

            $query->execute(['id'=>$id]);
            $result = $query->fetch();
            return $result ;
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    function afficherparticipation2(int $idevent)
    {   $pdo=config::getConnexion();
        try
        {
            $query = $pdo->prepare('select * from user e join participation p on e.id=p.iduser where p.idevent=:idevent ');
            $query->execute(['idevent'=>$idevent]);
            $result = $query->fetchALL();
            return $result;
        }
        catch(Exception $e)
        {
            die('erreur :'.$e->getMessage());
        }

    }
    function supprimerparticipation2(int $id,int $idevent)
    {
        $pdo = config::getConnexion();
        try
        {
            $query = $pdo->prepare('delete from participation where iduser = :id and idevent=:idevent');
            $query->execute(['id' => $id,
                'idevent'=>$idevent]);
        }
        catch(Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
}
?>