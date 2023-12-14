<?php

class Reclamation
{
    // Attributs
    private ?int $idrec= null;
    private ?string $titre= null;
    private ?string $description= null;
    private ?string $nomconducteur= null;
    private ?string $email= null;
    private ?string $numtel= null;
    private ?string $type= null;
    private ?string $actions= null;
    private ?string $image= null;

    // Constructeur
    public function __construct($titre, $description, $nomconducteur, $email, $numtel, $type, $actions, $image)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->nomconducteur = $nomconducteur;
        $this->email = $email;
        $this->numtel = $numtel;
        $this->type = $type;
        $this->actions = $actions;
        $this->image = $image;
    }

    // Getters et setters (pour accéder et définir les valeurs des attributs)

    public function getIdrec()
    {
        return $this->idrec;
    }

    public function getTitre()
    {
        return $this->titre;
    }

    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getNomconducteur()
    {
        return $this->nomconducteur;
    }

    public function setNomconducteur($nomconducteur)
    {
        $this->nomconducteur = $nomconducteur;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getNumtel()
    {
        return $this->numtel;
    }

    public function setNumtel($numtel)
    {
        $this->numtel = $numtel;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function setActions($actions)
    {
        $this->actions = $actions;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage($image)
    {
        $this->image = $image;
    }
}

?>
