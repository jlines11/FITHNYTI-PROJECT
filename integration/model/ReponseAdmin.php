<?php
class ReponseAdmin
{
// Attributs
    private ?int $idReponse = null;
    private ?string $titre = null;
    private ?string $description = null;
    private ?string $image = null;
    private ?string $dateReponse = null;
    private ?int $idrec = null;

    public function __construct(?string $titre, ?string $description, ?string $image, ?string $dateReponse, ?int $idrec)
    {
        $this->titre = $titre;
        $this->description = $description;
        $this->image = $image;
        $this->dateReponse = $dateReponse;
        $this->idrec = $idrec;
    }

    public function getIdReponse(): ?int
    {
        return $this->idReponse;
    }

    public function setIdReponse(?int $idReponse): void
    {
        $this->idReponse = $idReponse;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(?string $titre): void
    {
        $this->titre = $titre;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): void
    {
        $this->image = $image;
    }

    public function getDateReponse(): ?string
    {
        return $this->dateReponse;
    }

    public function setDateReponse(?string $dateReponse): void
    {
        $this->dateReponse = $dateReponse;
    }

    public function getIdrec(): ?int
    {
        return $this->idrec;
    }

    public function setIdrec(?int $idrec): void
    {
        $this->idrec = $idrec;
    }


}
?>