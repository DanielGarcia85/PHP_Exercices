<?php

// Exercice 1: Lire les données reçues et les afficher (si le bouton a été cliqué)
if (isset($_POST['btnOk'])){
    echo("Votre nom est : " . $_POST['nom'] . "<br>");
    if (isset($_POST['newsletter'])) {
        echo("Vous voulez la newsletter<br>");
    } else {
        echo("Vous ne voulez pas la newsletter<br>");
    }
    echo("Le paiement sera : " . $_POST['paiement'] . "<br>");
    echo("La couleur choisie est : " . $_POST['couleur'] . "<br>");
    echo("<a href=\"TP_03_Corrige.html\">Retour au formulaire</a><br>");
}

// Exercice 2: Lire et convertir
if (isset($_POST['btnConvertir'])){
    define('TAUX_EUR', 0.90);    
    define('TAUX_USD', 1.07);    
    define('TAUX_CAD', 1.35);    
    $montant = $_POST['montant'];
    $monnaie = $_POST['monnaie'];
    switch($monnaie) {
        case 'EUR';
            $taux = TAUX_EUR;
            break;
        case 'USD';
            $taux = TAUX_USD;
            break;
        case 'CAD';
            $taux = TAUX_CAD;
            break;
        default:
            $taux = 1;
    }
    $montantConverti = $montant * $taux;
    echo("Le montant de $montant CHF donne $montantConverti $monnaie<br>");
    echo("<a href=\"TP_03_Corrige.html\">Retour au formulaire</a><br>");
}
