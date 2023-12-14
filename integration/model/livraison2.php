<?php
class livraison
{


    private  $idliv = null;
    private  $etat_livraison = null;
    private  $etat = null;
    private  $adresse_du_depart = null;

    private  $adresse_du_arrive = null;
    private  $numero_telephpne = null;

    private  $date = null;

    public function __construct($id = null, $p, $ad,$aa,$tele ,$d)
    {
        $this->idliv = $id;
        $this->etat = $p;
        
        $this->adresse_du_depart = $ad;
        $this->adresse_du_arrive = $aa;

        $this->numero_telephpne = $tele;

        $this->date = $d;
    }

  
    public function getIdliv()
    {
        return $this->idliv;
    }
    
    
    public function etat_livraison()
    {
        return $this->etat_livraison;
    }
    
    
      
    public function getEtat()
    {
        return $this->etat;
    }


    public function getAddressDepart()
    {
        return $this->adresse_du_depart;
    }

    
    public function getAddressArrive()
    {
        return $this->adresse_du_arrive;
    }

    
    public function telephone()
    {
        return $this->numero_telephpne;
    }


   
    public function getDate()
    {
        return $this->date;
    }


    public function set_Etat_livraison($etat)
    {
        $this->etat_livraison = $etat;

        return $this;
    }

}
