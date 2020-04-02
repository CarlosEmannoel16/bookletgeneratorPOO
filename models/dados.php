<?php

class Dados {

    private $nomeBuyer;
    private $address;
    private $city;
    private $quanP;
    private $valuePay;
    private $expirationDay;
    private $nameSeller;
    private $locationPay;
    private $observation;
    private $phone;
    private $title;

    public function setNameBuyer($nb){
        $this->nomeBuyer = trim($nb);

    }
    public function getNameBuyer(){
        return $this->nomeBuyer;
    }


    public function setAddres($andd){
        $this->address = trim($andd);
    }
    public function getAddres(){
        return $this->address;
    }


    public function setCity($c){
        $this->city = trim($c);
    }
    public  function getCity(){
        return $this->city;
    }


    public function  setQuantP($qp){
        $this->quanP = trim($qp);
    }
    public function  getQuantP(){
        return $this->quanP;
    }


    public function  setValuePay($vp){
        
        $vp = number_format($vp, 2, ',', '.');
        $this->valuePay = $vp;
    }
    public function getValuePay(){
        return $this->valuePay;
    }


    public function setExpirationDay($ed){
        $ed = explode('-',$ed);
        $this->expirationDay = $ed;

    }
    public function getExpirationDay(){
        return $this->expirationDay;
    }
    

    public function setNameSeller($ns){
        $this->nameSeller = trim($ns);
    }
    public function getNameSeller(){
        return $this->nameSeller;
    }


    public  function setLocationPay($lp){
        $this->locationPay =trim($lp);
    }
    public function  getLocationPay(){
        return $this->locationPay;
    }


    public function  setObservation($obs){
        $this->observation = trim($obs);
    }
    public function getObservation(){
        return $this->observation;
    }


    public function setPhone($ph){
        $this->phone = trim($ph);
    }
    public function getPhone(){
        return $this->phone;
    }


    public  function setTitle($tl){
        $this->title = trim($tl);
    }
    public function getTitle(){
        return $this->title;
    }

 
}