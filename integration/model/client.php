<?php
class client {
    private string $firstName;
    private string $lastName;
    private string $email;
    private string $password;
    private int $numtel;
    private string $address;
    private DateTime $dob;


    public function __construct(string $firstName,string $lastName,string $email,string $password,int $numtel,string $address,DateTime $dob)
    {

    $this->firstName=$firstName;
    $this->lastName=$lastName;
    $this->email=$email;
    $this->password=$password;
    $this->numtel=$numtel;
    $this->address=$address;
    $this->dob=$dob;


    }

    
    public function getfirstName()
    {
        return $this->firstName;
    }
    public function getlastName()
    {
        return $this->lastName;
    }
    public function getemail()
    {
        return $this->email;
    }
    public function getpassword()
    {
        return $this->password;
    }
    public function getnumtel()
    {
        return $this->numtel;
    }
    public function getaddress()
    {
        return $this->address;
    }
    public function getdob(){
        return $this->dob;
    }
  
  
    public function setnom($firstName)
    {
        $this->firstName=$firstName;
    }
    public function setprenom($lastName)
    {
        $this->lastName=$lastName;
    }
    public function setemail($email)
    {
        $this->email=$email;
    }
    public function setpassword($password)
    {
        $this->password=$password;
    }
    public function setnumtel($numtel)
    {
        $this->numtel=$numtel;
    }
    public function setaddress($address){
        $this->address=$address;
    }
    public function setdob($dob){
        $this->dob=$dob;
    }


}