<?php

require_once 'functions/Gerador.php';
$gerador = new Gerador();

    /**  OBTENDO, VALIDANDO E ENVIANDO DADOS PARA CLASSE Dados() */
    date_default_timezone_set('UTC');   

    /**OBTENDO */
    $nameBuyer = filter_input(INPUT_POST,'nome');
    $address = filter_input(INPUT_POST, 'ender');
    $city = filter_input(INPUT_POST, 'cidade');
    $quantityP = filter_input(INPUT_POST, 'qua_parc');
    $valuePay = filter_input(INPUT_POST, 'valor');
    $expirationDay = filter_input(INPUT_POST, 'data');
    $nameSeller = filter_input(INPUT_POST, 'nomeV');
    $locationPay = filter_input(INPUT_POST, 'localP');
    $observation = filter_input(INPUT_POST, 'obs');
    $phone = filter_input(INPUT_POST, 'tell');
    $title = filter_input(INPUT_POST,'title');
    /** VERIFICANDO */
    if($nameBuyer || $quantityP || $valuePay ){
        $carne = new Dados();
        $carne->setNameBuyer($nameBuyer);
        $carne->setAddres($address);
        $carne->setCity($city);
        $carne->setQuantP($quantityP);
        $carne->setValuePay($valuePay);
        $carne->setExpirationDay($expirationDay);
        $carne->setNameSeller($nameSeller);
        $carne->setLocationPay($locationPay);
        $carne->setObservation($observation);
        $carne->setPhone($phone);
        $carne->setTitle($title);
        /**ENVIANDO */
        $gerador->GerarTabela($carne);  

        /**GERANDO */
        $gerador->Gerador();

} 
?>
