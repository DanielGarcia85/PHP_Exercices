<?php

echo("TP9");

if($_SERVER['REQUEST_METHOD']=='GET'){

    $bdd = new mysqli('localhost', 'root', '', 'test');

    if($bdd->connect_error) die("<br><br>Connexion impossible");

    if(isset($_GET['list'])){

        echo("<br><br>Vous voulez obtenir la liste des NPA");

        $sql = "SELECT * FROM npa";

        $rec = $bdd->query($sql) or die($bdd->error);

        if($rec->num_rows==0){

            echo("<br><br>Pas de NPA dans la base de données");

        }else{

            while($row = $rec->fetch_object()){
                $res[] = $row; // pour le format JSON
                echo("<br><br>");
                echo("Id: ".$row->npa_id.", ");
                echo("Code: ".$row->npa_code.", ");
                echo("Localité: ".$row->npa_localite);
            }
            echo("<br><br>".json_encode($res)); // Impression au format JSON
        }

    }

    if(isset($_GET['id'])){

        $id = $_GET['id'];

        echo("<br><br>Vous voulez obtenir le NPA ayant l’identifiant $id");

        $sql = "SELECT * FROM npa WHERE npa_id =$id";

        $rec = $bdd->query($sql) or die($bdd->error);

        if($rec->num_rows==0){

            echo("<br><br>Pas de NPA avec l'id $id dans la base de données");

        }else{

            while($row = $rec->fetch_object()){
                $res[] = $row;
                echo("<br><br>");
                echo("Id: ".$row->npa_id.", ");
                echo("Code: ".$row->npa_code.", ");
                echo("Localité: ".$row->npa_localite);
            }
            echo("<br><br>".json_encode($res));
        }

    }
    echo("<br><br>");
    print_r($_GET);
}

else if($_SERVER['REQUEST_METHOD']=='POST'){

    echo("<br><br>Ajouter un nouveau NPA");

    $bdd = new mysqli('localhost', 'root', '', 'test');

    if($bdd->connect_error) die("<br><br>Connexion impossible");

    if(empty($_POST['code']) or empty($_POST['localite'])){
        echo("<br><br>Vous devez renseigner un code et une localité");
    }else{
        $code = $_POST['code'];
        $localite = $_POST['localite'];

        $sql = "INSERT INTO npa (npa_code, npa_localite) VALUES ('$code', '$localite');";
        $rec = $bdd->query($sql) or die($bdd->error);

        echo("<br><br>Le NPA a bien été ajouté à la base de donnée");
    }
    echo("<br><br>");
    print_r($_POST);

}

elseif($_SERVER['REQUEST_METHOD']=='PATCH'){

    $bdd = new mysqli('localhost', 'root', '', 'test');

    if($bdd->connect_error) die("<br><br>Connexion impossible");

    parse_str(file_get_contents("php://input"), $donnees);

    //Quand on récupère du format JSON
    //$content = file_get_contents("php://input");
    //$donnees = json_decode($content, true);
    
    if ($donnees && isset($donnees['id']) && (isset($donnees['code']) or isset($donnees['localite']))) {
        $id = addslashes($donnees['id']);

        $sql = "SELECT * FROM npa WHERE npa_id = $id";
        $rec = $bdd->query($sql) or die($bdd->error);

        if($rec->num_rows==0){
            echo("<br><br>Il n'y a aucun NPA avec l'ID $id");
        }else{
 
            $clauseSet = array();

                if(!empty($donnees['code'])){
                    $codeUp = addslashes($donnees['code']);
                    $clauseSet[] = "npa_code = '$codeUp'";                    
                }
                if(!empty($donnees['localite'])){
                    $localiteUp = addslashes($donnees['localite']);
                    $clauseSet[] = "npa_localite = '$localiteUp'";
                }
                
                if(count($clauseSet)>0){
                    $set = "SET ". implode(" , ", $clauseSet);
                } else{
                    $set= "";
                }
            $sql = "UPDATE npa $set WHERE npa_id = $id";
            echo("<br><br>".$sql);
            $rec = $bdd->query($sql) or die($bdd->error);
            echo("<br><br>Le NPA N°$id a bien été modifié");
        }

    } else {
        echo("<br><br>Données JSON invalides ou incomplètes.");
    }
    echo("<br><br>");
    print_r($donnees);

}

elseif($_SERVER['REQUEST_METHOD']=='DELETE'){

    if(!isset($_GET['id'])){

        echo("<br><br>Vous devez renseigner un numero d'Id de NPA");

    }else{

        $bdd = new mysqli('localhost', 'root', '', 'test');
        if($bdd->connect_error) die("<br><br>Connexion impossible");

        $id = addslashes($_GET['id']);

        $sql = "SELECT * FROM npa WHERE npa_id = $id";
        $rec = $bdd->query($sql) or die($bdd->error);

        if($rec->num_rows==0){
            echo("<br><br>Il n'y a aucun NPA avec l'ID $id");
        }else{
            $sql = "DELETE FROM npa WHERE npa_id = $id";
            $rec = $bdd->query($sql) or die($bdd->error);
            echo("<br><br>Suppression le NPA N°".$_GET['id']);
        }

    }
    

    echo("<br><br>");
    print_r($_GET);
}

