<?php

$bdd = new mysqli('localhost', 'root', '', 'test');

if($bdd->connect_error) die("Connexion impossible");

$recherche = $_GET['recherche'];
$sqlnpa = '';
$sqlsommets = '';

//if (((int) $_GET['a'])==$_GET['a']){echo(""c'est un nombre entier)};

if($recherche=="rechcode"){
    $code = $_GET['code'];
    if(!empty($code)){
        if(is_numeric($code)){
            $sqlnpa = $sqlnpa."select * from npa where npa_code like '".$code."%'";
        }else{
            echo("Le code saisit doit être un nombre entier<br>");
        }
    }else{
        echo("Vous devez saisir un code pour la recherche par code<br>");
    }
}

if($recherche=="rechloc"){
    $localite = $_GET['localite'];
    if(!empty($localite)){
        $sqlnpa = $sqlnpa."select * from npa where npa_localite like '".$localite."%'";
    }else{
        echo("Vous devez saisir une localit&eacute; pour la recherche par localit&eacute;");
    }
}

if(!empty($sqlnpa)){

    $rec = $bdd->query($sqlnpa) or die($bdd->error);

    if(!(isset($_GET['format'])) or ((isset($_GET['format']) && ($_GET['format'] != "xml")) && (isset($_GET['format']) && ($_GET['format'] != "csv")))){
        echo("Voici les résultat obtenus pour la requête SQL suivante : ".$sqlnpa."\n");
    }
    
    if($rec->num_rows==0){
        echo("<br><br>Pas de résultat pour cette recherche");
    }else{
        if(isset($_GET['format']) && ($_GET['format'])){
            $format = $_GET['format'];
            switch($format){
                //CSV
                case "csv":
                    //permet de creer un fichier CSV et de le télécharger
                    header("content-type: application/csv");
                    header("content-disposition: attachement; filename=npa.csv");
                    //Ensuite je rempli mon fichier CSV
                    echo("CODE;LOCALITE;\n");
                    while($row = $rec->fetch_object()){
                        echo($row->npa_code.";".$row->npa_localite."\n");
                    }
                    break;
                //JSON
                case "json":
                    echo("<br><br>");
                    while($row = $rec->fetch_object()) {
                        $res[] = $row;
                    }
                    echo(json_encode($res));
                    break;
                //XML
                case "xml": 
                    header('Content-type: text/xml; charset=UTF-8');
                    $xml = new XMLWriter();
                    $xml->openMemory();
                    $xml->startDocument('1.0', 'UTF-8');
                    $xml->startElement('listNPA');
                    while($row = $rec->fetch_object()){
                        $xml->startElement('npa');
                        $xml->writeElement('code', $row->npa_code);
                        $xml->writeElement('localite', $row->npa_localite);
                        $xml->endElement();
                    }
                    $xml->endElement();
                    $xml->endDocument();
                    echo $xml->outputMemory(TRUE);
                    break;
            }
        }else{
            //HTML
            echo("<br><br>");
            while($row = $rec->fetch_object()){
                echo("Code: ".$row->npa_code."<br>");
                echo("Localité: ".$row->npa_localite."<br>");
                echo("<hr>");
            }
        }
    }
}

if($recherche=="rechsom"){

    $clausewhere = array();

    $nom = $_GET['nom'];
    if(!empty($nom)){
        $nom = $_GET['nom'];
        $clausewhere[] = "som_nom LIKE '$nom%'"; // si on ne met rien dans les [], ça empile à la suite
    }

    $region = $_GET['region'];
    if(!empty($region)){
        $region = $_GET['region'];
        $clausewhere[] = "som_region LIKE '$region%'";
    }

    $altmin = $_GET['altmin'];
    if(!empty($altmin)){
        $altmin = $_GET['altmin'];
        $clausewhere[] = "som_altitude > '$altmin'";
    }

    $altmax = $_GET['altmax'];
    if(!empty($altmax)){
        $altmax = $_GET['altmax'];
        $clausewhere[] = "som_altitude < '$altmax'";
    }

    if(count($clausewhere)>0){
        $where = "WHERE ". implode(" AND ", $clausewhere);
    } else{
        $where = "";
    }

    if(!empty($_GET['order'])){
        $order = $_GET['order'];
        switch($order){
            case "nom": $order_by = "ORDER BY som_nom";break;
            case "region": $order_by = "ORDER BY som_region";break;
            case "altitude": $order_by = "ORDER BY som_altitude";break;
        }
        if(!empty($_GET['tri'])){
            $tri = $_GET['tri'];
            switch($tri){
                case "triasc": $tri_by = "ASC";break;
                case "trides": $tri_by = "DESC";break;
            }
        }else{
            $tri_by = "";
        }
    }else{
        $order_by = "";
        $tri_by = "";
    }

    if(isset($_GET['nbpage'])){
        $page = $_GET['page'];
        $nbpage = $_GET['nbpage'];
        $limit = "LIMIT ".$page.",".$nbpage;
    }else{
        $limit = "";
    }

    $nombreParPage = 20;
    //$page = 1;
    if (isset($_GET['page'])){
        $page = $_GET['page'];
        $limit = "limit " . ($page-1)*$nombreParPage . ", $nombreParPage";
    } 

    $sqlsommets = "SELECT * FROM sommets $where $order_by $tri_by $limit";
    
    if(!(isset($_GET['format'])) or ((isset($_GET['format']) && ($_GET['format'] != "xml")) && (isset($_GET['format']) && ($_GET['format'] != "csv")))){
        echo("Voici les résultat obtenus pour la requête SQL suivante : ".$sqlsommets."\n");
    }

    $rec = $bdd->query($sqlsommets) or die($bdd->error);

    if(isset($_GET['format']) && ($_GET['format'])){
        $format = $_GET['format'];
        switch($format){
            case "csv":
                header("content-type: application/csv");
                header("content-disposition: attachement; filename=npa.csv");
                echo("SOMMET;REGION;ALTITUDE\n");
                while($row = $rec->fetch_object()){
                    echo($row->som_nom.";".$row->som_region.";".$row->som_altitude."\n");
                }
                break;
            case "json":
                echo("<br><br>");
                    while($row = $rec->fetch_object()) {
                        $res[] = $row;
                    }
                echo(json_encode($res));
                break;
            case "xml":
                header('Content-type: text/xml; charset=UTF-8');
                $xml = new XMLWriter();
                $xml->openMemory();
                $xml->startDocument('1.0', 'UTF-8');
                $xml->startElement('ListeSommets');
                while($row = $rec->fetch_object()){
                    $xml->startElement('Sommet');
                     $xml->writeElement('nom', $row->som_nom);
                     $xml->writeElement('region', $row->som_region);
                     $xml->writeElement('altitude', $row->som_altitude);
                     $xml->endElement();
                }
                $xml->endElement();
                $xml->endDocument();
                echo $xml->outputMemory(TRUE);
                break;
        } 
    }else{
        echo("<br><br>");
        while($row = $rec->fetch_object()){
            echo("SOMMET => Nom: ".$row->som_nom.", ");
            echo("Region : ".$row->som_region.", ");
            echo("Altitude : ".$row->som_altitude);
            echo("<hr>");
        }
    }
  
}



