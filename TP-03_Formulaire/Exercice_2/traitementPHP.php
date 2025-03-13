<?php

$montant=$_POST['montant'];
$devise=$_POST['devise'];
$taux;

if($devise=="EUR"){$taux=1.1;}
if($devise=="USD"){$taux=1.2;}

if(is_numeric($montant)){
    $resultat = $montant * $taux;
    echo("Le montant de ".$montant." en CHF donne ".$resultat." ".$devise);
}else{
    echo("Montant non valide");
}





