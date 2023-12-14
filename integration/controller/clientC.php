<?php
require_once  $_SERVER['DOCUMENT_ROOT'] . "/integration/config.php";
class ClientC
{
    public function getClientByIdDirectly($idClient)
    {
        $sql = "SELECT * FROM client WHERE idClient = :idClient";
        $db = config::getConnexion();

        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idClient', $idClient);
            $query->execute();

            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return null;
        }
    }
    
    function addClient($client)
    {
        $sql = "INSERT INTO client (lastName, firstName, email, password, numtel, address, dob)
                VALUES (:lastName, :firstName, :email, :password, :numtel, :address, :dob)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
    
            $dobString = $client->getdob()->format('Y-m-d');
    
            $query->execute([
                'lastName' => $client->getlastName(),
                'firstName' => $client->getfirstName(),
                'email' => $client->getemail(),
                'password' => $client->getpassword(),
                'numtel' => $client->getnumtel(),
                'address' => $client->getaddress(),
                'dob' => $dobString, 
            ]);
    
            echo "Rows affected: " . $query->rowCount(); 
    
            echo "Last inserted ID: " . $db->lastInsertId();
    
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    // tri
    public function trierclient() {
        $sql = "SELECT * FROM client ORDER BY idClient DESC";
        $db = config::getConnexion();

        try {
            $req = $db->query($sql);
            return $req;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function trierclient1() {
        $sql = "SELECT * FROM client ORDER BY idClient ASC";
        $db = config::getConnexion();

        try {
            $req = $db->query($sql);
            return $req;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }// tri
    public function listClients()
    {
        $sql = "SELECT * FROM client";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function likeClient($clientId)
    {
        try {
            $pdo = config::getConnexion();

            $checkStmt = $pdo->prepare("SELECT COUNT(*) FROM client WHERE idClient = :clientId");
            $checkStmt->bindParam(':clientId', $clientId);
            $checkStmt->execute();

            if ($checkStmt->fetchColumn() > 0) {
                $updateStmt = $pdo->prepare("UPDATE client SET likes = likes + 1 WHERE idClient = :clientId");
                $updateStmt->bindParam(':clientId', $clientId);
                $updateStmt->execute();

                return ['success' => true, 'message' => 'Client liked successfully.'];
            } else {
                // Client not found
                return ['success' => false, 'message' => 'Client not found.'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error updating likes: ' . $e->getMessage()];
        }
    }
    
    

    function deleteClient($idClient)
    {
        $sql = " DELETE FROM client WHERE idClient = :idClient ";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idClient', $idClient);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function updateClient($client, $idClient)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE client SET 
                    lastName = :lastName, 
                    firstName = :firstName, 
                    email =:email,
                    identifiant = :identifiant, 
                    password = :password,
                   
                WHERE idClient= :idClient'
            );
            $query->execute([
                
                'lastName' => $client->getlastName(),
                'firstName' => $client->getfirstName(),
                'email' => $client->getemail(),
                'identifiant' => $client->getidentifiant(),
                'password' => $client->getpassword(),
                'numtel' => $client->getnumtel(),

            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    function getClientByEmail($email)
{
    $sql = "SELECT * FROM client WHERE email = :email";
    $db = config::getConnexion();

    try {
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();

        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
        return null;
    }
}

    function showClient($idClient)
    {
        $sql = "SELECT * from client where idClient = $idClient";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}