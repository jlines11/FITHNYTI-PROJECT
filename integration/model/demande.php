<?php
class demande
{


    private  $idD = null;
    private  $dateD = null;
    private  $disponibilite = null;
    private  $livraison = null;
    private  $conducteur = null;


    public function __construct($id = null, $p, $ad,$aa,$tele )
    {
        $this->idD = $id;
        $this->dateD= $p;
        $this->disponibilite = $ad;
        $this->livraison = $aa;
        $this->conducteur = $tele;
    }

  
    public function getIdD()
    {
        return $this->idD;
    }
    
    
    public function getDateD()
    {
        return $this->dateD;
    }
    
    
      
    public function getDisponibilite()
    {
        return $this->disponibilite;
    }


    public function getLivraison()
    {
        return $this->livraison;
    }

    
    public function getConducteur()
    {
        return $this->conducteur;
    }

    

}
