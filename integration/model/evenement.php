<?php
class Evenement{
    private ?int $idevent = null;
    private ?string $titre = null;
    private ?string $description = null;
    private ?string $type = null;
    private ?string $lieu = null;
    private ?string $date = null;
    private ?int $nbparticipant = null;
    private ?string $image = null;

    public function __construct(string $titre, string $description, string $type, string $lieu, string $date, int $nbparticipant, string $image)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->type = $type;
        $this->lieu = $lieu;
        $this->date = $date;
        $this->nbparticipant = $nbparticipant;
        $this->image = $image;
    }

    public function getIdevent(): int
    {
        return $this->idevent;
    }

    public function setIdevent(int $idevent): void
    {
        $this->idevent = $idevent;
    }


    public function getTitre(): string
    {
        return $this->titre;
    }


    public function setTitre(string $titre): void
    {
        $this->titre = $titre;
    }


    public function getDescription(): string
    {
        return $this->description;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getLieu(): string
    {
        return $this->lieu;
    }


    public function setLieu(string $lieu): void
    {
        $this->lieu = $lieu;
    }


    public function getDate(): string
    {
        return $this->date;
    }


    public function setDate(string $date): void
    {
        $this->date = $date;
    }


    public function getNbparticipant(): int
    {
        return $this->nbparticipant;
    }


    public function setNbparticipant(int $nbparticipant): void
    {
        $this->nbparticipant = $nbparticipant;
    }

    public function getImage(): string
    {
        return $this->image;
    }


    public function setImage(string $image): void
    {
        $this->image = $image;
    }



}
?>