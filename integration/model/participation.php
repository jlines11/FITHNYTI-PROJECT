<?php
class Participation{
    private ?int $idparticipation = null;
    private ?int $idevent = null;
    private ?int $iduser = null;


    public function __construct(int $idevent, int $iduser)
    {
        $this->idevent = $idevent;
        $this->iduser = $iduser;
    }

    public function getIdparticipation(): int
    {
        return $this->idparticipation;
    }

    public function setIdparticipation(int $idparticipation): void
    {
        $this->idparticipation = $idparticipation;
    }

    public function getIdevent(): int
    {
        return $this->idevent;
    }

    public function setIdevent(int $idevent): void
    {
        $this->idevent = $idevent;
    }

    public function getIduser(): int
    {
        return $this->iduser;
    }


    public function setIduser(int $iduser): void
    {
        $this->iduser = $iduser;
    }



}
?>