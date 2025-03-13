<meta charset="utf-8" />
<?php
  $bdd = new mysqli('localhost', 'root', '', 'devi_delete');
  if ($bdd->connect_error) die("connexion impossible");


  // Exercice 01
  // Tester si la recherche a été déclenchée
  if (isset($_POST['rechercher'])) {
    // Lire le critère et protéger la requête contre les injections SQL ou bug en cas de recherche avec un apostrophe
    $critere = addslashes($_POST['critere']);
    // Construire la requête
    $sql ="select * from npa where npa_localite like '$critere%' limit 0,10";
    echo("$sql<br/>");
    // Exécuter
    $rec = $bdd->query($sql) or die($bdd->error);
    // Voir si résultat
    if ($rec->num_rows==0) echo("aucune localité ne correspond à votre recherche<br/>");
    // Parcours pour affichage
    while ($row = $rec->fetch_object()) {
      echo("$row->npa_localite $row->npa_code<br/>");
    }
}

// Exercice 02 (et exercice 03)
// Tester si la recherche a été déclenchée
if (isset($_POST['rechercher_ex2'])) {
  // Lire le critère et protéger la requête contre les injections SQL ou bug en cas de recherche avec un apostrophe
  $critere = addslashes($_POST['critere']);
  // Voir si le critère est numérique
  if (is_numeric($critere)) {
    $clause ="npa_code like '$critere%'";
  } else {
    $clause ="npa_localite like '$critere%'";
  }
  // Construire la requête
  $sql ="select * from npa where $clause";
  echo("$sql<br/>");
  // Exécuter
  $rec = $bdd->query($sql) or die($bdd->error);
  // Voir si résultat
  if ($rec->num_rows==0) echo("aucune localité ne correspond à votre recherche<br/>");
  // Parcours pour affichage
  while ($row = $rec->fetch_object()) {
    // Pour exercice 03
    // Voir si affichage du lien
    if (isset($_POST['avecLien'])) {
      // Construction du lien
      $lien ='<a href="https://www.google.ch/?#q=' .$row->npa_localite.'">Voir dans Google</a>';
    } else {
      $lien = '';
    }
    // Affichage de la ligne résultat avec le lien (ou non)
    echo("$row->npa_localite $row->npa_code $lien<br/>");
  }
}
