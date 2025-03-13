<?php


$chaine = ("rouge;bleu;vert");
echo($chaine."<br>");

//example d'utilisation de l'explode
$liste = explode(";", $chaine);
print_r($liste);echo("<br>");

//example d'utilisation de l'implode
$chaine2 = implode(" et ", $liste);
echo($chaine2."<br>");

echo("<br>");
//print_r($_SERVER);

//Connextion
$bdd = new mysqli('localhost', 'root', '', 'test');

//Test si ok
if($bdd->connect_error) die("Connexion impossible");

//Creation requête
$sql = 'select * from personne';

//Affiche pour test
echo("$sql<br>");

//Execute la requête
$rec = $bdd->query($sql) or die($bdd->error);

while($row = $rec->fetch_object()){
    echo("<hr>");
    print_r($row);
    echo("<hr>");
    echo("Id : ".$row->id."<br>");
    echo("Nom : ".$row->nom."<br>");
    echo("Prenom : ".$row->prenom."<br>");
    echo("Age : ".$row->age."<br>");
}