<?php

if ($_SERVER['REQUEST_METHOD']=='GET') {
    if (isset($_GET['id'])) {
        echo("Détail de la fleur " . $_GET['id'] ."<br>");
        echo("Paramètres:<br>");
        print_r($_GET);
    } else {
        echo("Liste des fleurs<br>");
        echo("Paramètres:<br>");
        print_r($_GET);
    }
} else if ($_SERVER['REQUEST_METHOD']=='POST') {
    echo("Ajouter une nouvelle fleur");
    print_r($_POST);
} else if ($_SERVER['REQUEST_METHOD']=='PATCH' || $_SERVER['REQUEST_METHOD']=='PUT' ) {
    echo("Modifier la fleur" . $_GET['id'] ."<br>");
    parse_str(file_get_content("php://input"), $donnees);
    print_r($donnees);
} else if ($_SERVER['REQUEST_METHOD']=='DELETE') {
    echo("Supprimer la fleur" . $_GET['id']);    
}

