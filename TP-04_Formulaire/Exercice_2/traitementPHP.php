<?php

$nom=$_POST['nom'];
$prefixe=$_POST['prefixe'];

$output="Vous recherchez";

echo("Version 1 <br>");
if($nom<>""){
    echo("Vous recherchez le nom: ".$nom."<br>");
    $output=$output." le nom ".$nom;
}

if($prefixe<>""){
    echo("Vous recherchez le prefixe: ".$prefixe."<br>");
    $output=$output." le prefixe ".$prefixe;
}

if(isset($_POST['roaming'])){
    echo("Vous recherchez avec l'option roaming<br>");
    $output=$output." avec l'option roaming";
}

if(isset($_POST['sms'])){
    echo("Vous recherchez avec l'option SMS<br>");
    $output=$output." avec l'option SMS";
}

echo("Version 2 <br>");
echo($output);