<?php
require_once 'models/dados.php';
class Gerador{


    public function GerarTabela(Dados $u){
                /* PEGANDO DIA MÊS E ANO DA DATA DE VENCIMENTO ESCOLHIDA*/
                $dado = $u->getExpirationDay();
                $year = $dado[0];
                $month = $dado[1];
                $day = $dado[2];
    
            /**INFORMAÇÕES DE DWONLOAD DO ARQUIVO */
            /*NOME DO ARQUIVO DE DONWLOAD*/$nameFile = "Carne.xls";
            header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
            header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
            header ("Cache-Control: no-cache, must-revalidate");
            header ("Pragma: no-cache");
            header ("Content-type: application/x-msexcel");
            header ("Content-Disposition: attachment; filename=\"{$nameFile}\"" );
            header ("Content-Description: PHP Generated Data" );

            define('Expiration',$day);
            /**AUMENTANDO UM ANO CASO MES FOR MAIOR QUE 12 */
            for( $i = 1; $i <= $u->getQuantP(); $i++){ 
                    $day = Expiration;
                    $month++;            
                    if($month > 12){
                        $month = 1;
                        $year++;
                    }
            
                    /** VERIFICANDO SE O ANO É BISEXTO E MODIFICANDO CASO SEJA */
                    $yearBi = ($year/4);
            
                    if (is_int($yearBi) == false){
                        if(($day > 28) && ($month == 2) ){
                            $day = 3;
                        }
                    }  
            
                    /**VERIFICANDO SE O DIA EXISTE */
                    if($day == 31){
                        if($month == 4 || $month == 6 || $month == 9 || $month == 11) {
                            $day = 2;
                        }  
                    }

                    /**CRIANDO ESTRUTURA DA TABELA E PREENCHANDO COM OS DADOS */
                    $html = '
                    <style>
                        .tituloTabela{
                                font-size:23pt;
                                text-align:center;
                                border-top:1px solid #a0a0a0;
                        }
                        .subtitulo{
                                font-size:11pt;
                                text-align:center;
                        }
                        td{
                                text-align:left;
                        }
                    
                        .borderRight{
                            border-bottom:1px solid #a0a0a0;
            
                        }
                    
                        .borderUp{
                            border-style:solid;
                            border-bottom-width:1px;
                            border-color:#0a0a0a;
                        }
                        .borderCenter{
                            border-bottom:1px solid #a0a0a0;
                            border-right:1px solid #a0a0a0;
                        }
                        .borderRightLef{
                            border-right:1px solid #a0a0a0;
                            border-left:1px solid #a0a0a0;
                        }

                        .smallTitle{
                            font-size:10pt;
                        }
                        .borderLeft{
                            border-right:1px dotted #a0a0a0;
                            border-bottom:1px solid #a0a0a0;
                        }
                        .pont{
                            border-right: 1px dotted #a0a0a0;
                        }
                        



                    </style>

                    <table>
                            <tr>
                                <td colspan="3" class="pont" class="tituloTabela"></td>
                                <td class="tituloTabela" colspan="10">Carnê de Pagamento</td>

                            </tr>
                            <tr>
                                <td colspan="3" class="pont"></td>
                                <td class="subtitulo" colspan="11" >'.$u->getTitle().'</td>
                            </tr>
                            <tr>
                                <td colspan="3"  ></td>
                                <td colspan="10" class="subtitulo"  > Cell: '.$u->getPhone().'</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="smallTitle" > Vencimento: </td>
                                <td colspan="7"  class="smallTitle borderRightLef" > Local de Pagamento:  </td>
                                <td colspan="3"  class="borderRight smallTitle"> Vencimento: </td>
                            </tr>
                            <tr>
                                <td colspan="3"  class="borderLeft" >'.$day.' / '.$month.' / '.$year.'</td>
                                <td colspan="7" class="borderCenter" >'.$u->getLocationPay().'</td>
                                <td colspan="3"  class="borderRight">'.$day.' / '.$month.' / '.$year.'</td>
                            </tr>
                            <tr>
                                <td colspan="3"  class="smallTitle "> (=) Valor do Documento: </td>
                                <td colspan="7" class="smallTitle borderRightLef" >Nome/cliente:</td>
                                <td colspan="3"  class="">(=)Valor do Documento: </td>
                            </tr>
                            <tr>
                                <td colspan="3"  class="borderLeft" >R$: '.$u->getValuePay().' </td>
                                <td colspan="7"  class="borderCenter">'.$u->getNameBuyer().'</td>
                                <td colspan="3"  class="borderRight">R$: '.$u->getValuePay().'</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="smallTitle ">   Nº Parcela/Total Parc:  </td>
                                <td colspan="7" class="smallTitle borderRightLef">  Endereço/cliente:</td>
                                <td colspan="3" class="smallTitle ">    Nº Parcela/Total Parc: </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="borderLeft" >'.$i.' // '.$u->getQuantP().'</td>
                                <td colspan="7" class="borderCenter">'.$u->getAddres().' '.$u->getCity().'Caipu</td>
                                <td colspan="3" class="borderRight">'.$i.' // '.$u->getQuantP().'</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="smallTitle">   (=)Valor Pago:    </td>
                                <td colspan="7" classs="smallTitle borderRightLef">  Observações:     </td>
                                <td colspan="3"  class=" smallTitle borderRight2"> (=) Valor Pago:    </td>
                            </tr>
                            <tr>
                                <td colspan="3"  class="borderLeft ">   Visto do Responsável     </td>
                                <td colspan="7" rowspan="2"  class="borderCenter">'.$u->getObservation().'</td>
                                <td colspan="3" class="borderRight">     Visto do Responsável  </td>
                            </tr>
                            <tr>
                                <td colspan="3" class="borderLeft">Pago em ___/___/___ </td>
                                <td colspan="3" class="borderRight">Pago em ___/___/___</td>
                            </tr>

                    </table> <br>';
        echo $html;
    }    
exit; 

    }
}