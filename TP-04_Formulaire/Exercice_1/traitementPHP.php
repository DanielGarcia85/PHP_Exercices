<?php

$resultat;
$operateur=$_POST['calcul'];
$nb1=$_POST['nb1'];
$nb2=$_POST['nb2'];

if(is_numeric($_POST['nb1'])&&is_numeric($_POST['nb2'])){

    if($operateur=="div" && $nb2=="0"){
        echo("La division par 0 est impossible");
    }else{
        if ($operateur == "add"){$resultat = $nb1+$nb2;}
        if ($operateur == "sou"){$resultat = $nb1-$nb2;}
        if ($operateur == "mul"){$resultat = $nb1*$nb2;}
        if ($operateur == "div"){$resultat = $nb1/$nb2;}
        echo("Le résultat est : ".$resultat);
    }  
    
}else{
    echo("Nombre non valide");
}
