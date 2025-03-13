<?php

$bdd = new mysqli('localhost', 'root', '', 'test');

if($bdd->connect_error) die("Connexion impossible");

/*
$sql = 'select * from npa';
echo("$sql<br>");
$rec = $bdd->query($sql) or die($bdd->error);
while($row = $rec->fetch_object()){
    echo("<hr>");
    echo("Id : ".$row->npa_id."<br>");
    echo("Code : ".$row->npa_code."<br>");
    echo("Localité : ".$row->npa_localite."<br>");
}
*/

$code = $_POST['code'];
$localite = $_POST['localite'];
$recherche = $_POST['recherche'];

$sql = '';

//if (((int) $_GET['a'])==$_GET['a']){echo(""c'est un nombre entier)};

if($recherche=="rechcode"){
    if(!empty($code)){
        if(is_numeric($code)){
            $sql = $sql."select * from npa where npa_code like '".$code."%'";
        }else{
            echo("Le code saisit doit être un nombre entier<br>");
        }
    }else{
        echo("Vous devez saisir un code pour la recherche par code<br>");
    }
}

if($recherche=="rechloc"){
    if(!empty($localite)){
        $sql = $sql."select * from npa where npa_localite like '".$localite."%'";
    }else{
        echo("Vous devez saisir une localit&eacute; pour la recherche par localit&eacute;");
    }
}

if(!empty($sql)){

    echo("Voici les résultat obtenus pour la requête SQL suivante : ".$sql."<br><br>");

    $rec = $bdd->query($sql) or die($bdd->error);

    
    if($rec->num_rows==0){echo("Pas de résultat pour cette recherche");}

    while($row = $rec->fetch_object()){
        echo("Code: ".$row->npa_code."<br>");
        echo("Localité: ".$row->npa_localite."<br>");
        echo("<hr>");
    }
}



