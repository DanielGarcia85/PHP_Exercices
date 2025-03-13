<?php
/*
  Les paramètres sont tous optionnels
  a) Pour la recherche: nom, region, alt_min, alt_max
  b) Pour le tri: tri avec comme valeur 'nom', 'region' ou 'altitude'
  c) Pour le sens: sens avec comme valeur 'asc' ou 'desc'
  d) Pour la pagination: page (1, 2, 3, ...)
*/
$bdd = new mysqli("localhost", "root", "", "Test");
if ($bdd->connect_error) die("connexion impossible");


// Traitement des critères de recherche
$criteres = array();
if (isset($_GET['nom']) and $_GET['nom']) {
  $criteres[] = "som_nom like '". addslashes($_GET['nom'])."%'";
}
if (isset($_GET['region']) and $_GET['region']) {
  $criteres[] = "som_region like '". addslashes($_GET['region'])."%'";
}
if (isset($_GET['alt_min']) and $_GET['alt_min']) {
  $criteres[] = "som_altitude >". addslashes($_GET['alt_min']);
}
if (isset($_GET['alt_max']) and $_GET['alt_max']) {
  $criteres[] = "som_altitude <". addslashes($_GET['alt_max']);
}
if (count($criteres)) {
  $where = "where " . implode(' AND ', $criteres);
} else {
  $where = '';
}

// Traitement du tri
$tri = "som_nom";
if (isset($_GET['tri']) and $_GET['tri']) {
  switch($_GET['tri']) {
    case 'region':
      $tri = "som_region";
      break;
    case 'altitude':
      $tri = "som_altitude";
      break;
    default:
      $tri = "som_nom";
  }
}
if (isset($_GET['sens'])) {
  $sens = addslashes($_GET['sens']);
} else {
  $sens = "";
}

// Traitement de la pagination
$nombreParPage = 20;
$page = 1;
if (isset($_GET['page'])) $page = $_GET['page'];
$limit = "limit " . ($page-1)*$nombreParPage . ", $nombreParPage";

// Construction de la requête
$sql = "SELECT * from sommets $where order by $tri $sens $limit";
// echo("$sql<br>");

// Exécution de la requête
$rec = $bdd->query($sql) or die($bdd->error);

// Parcours du résultat
while ($row = $rec->fetch_object()) {
  echo("$row->som_nom $row->som_region $row->som_altitude<br>");
}
