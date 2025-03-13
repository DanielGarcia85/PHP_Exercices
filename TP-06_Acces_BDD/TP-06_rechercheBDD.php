<?php

$bdd = new mysqli('localhost', 'root', '', 'test');

if($bdd->connect_error) die("Connexion impossible");

$clausewhere = array();

if(isset($_GET['nom'])){
    $nom = $_GET['nom'];
    $clausewhere[] = "som_nom LIKE '%$nom%'"; // si on ne met rien dans les [], ça empile à la suite
}

if(isset($_GET['region'])){
    $region = $_GET['region'];
    $clausewhere[] = "som_region LIKE '%$region%'";
}

if(isset($_GET['altmin'])){
    $altmin = $_GET['altmin'];
    $clausewhere[] = "som_altitude > '$altmin'";
}

if(isset($_GET['altmax'])){
    $altmax = $_GET['altmax'];
    $clausewhere[] = "som_altitude < '$altmax'";
}

if(count($clausewhere)>0){
    $where = "WHERE ". implode(" AND ", $clausewhere);
} else{
    $where = "";
}

if(isset($_GET['tri'])){
    $tri = $_GET['tri'];
    $order = "ORDER BY ".$tri;
}else{
    $order = "";
}

if(isset($_GET['page']) && isset($_GET['nbpage'])){
    $page = $_GET['page'];
    $nbpage = $_GET['nbpage'];
    $limit = "LIMIT ".$page.",".$nbpage;
}else{
    $limit = "";
}

$sql = "SELECT * FROM sommets $where $order $limit";
echo($sql);echo("<hr>");

$rec = $bdd->query($sql) or die($bdd->error);

while($row = $rec->fetch_object()){
    echo("SOMMET => Nom: ".$row->som_nom.", ");
    echo("Region : ".$row->som_region.", ");
    echo("Altitude : ".$row->som_altitude);
    echo("<hr>");
}

/*
$res = array();
while($row=$rec->fetch_object()){
    $res[] = $row;
}
echo(json_encode($res));
*/



