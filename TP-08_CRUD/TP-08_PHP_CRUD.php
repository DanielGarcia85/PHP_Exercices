<!DOCTYPE html>
<html>
<head>
    <title>BASE DE DONNÉES "Produits"</title>
</head>
</html>

<?php

$bdd = new mysqli('localhost', 'root', '', 'test');

if($bdd->connect_error) die("Connexion impossible");

//$sql = '';
$recherche = $_GET['submit'];

if($recherche == "read"){

    $sql = "SELECT * FROM produits";

    $rec = $bdd->query($sql) or die($bdd->error);
    
    if($rec->num_rows==0){
        echo("<br>Pas de prduits dans la base de données<br>");
        echo("<br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
    }else{
        echo("<br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
        echo("<br>Voici tous les produits<br>");echo("<hr>");echo("<hr>");
        while($row = $rec->fetch_object()){
            echo("Id: ".$row->id."<br>");
            echo("Nom: ".$row->nom.", ");
            echo("Prix: ".$row->prix);
            echo("<hr>");
        }
    }
}

if($recherche == "insert"){
    if(empty($_GET['nomProdIn']) or empty($_GET['prixProdIn'])){
        echo("<br>Vous devez renseigner le nom et le prix du produit");
        echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
    }else{
        if(!is_numeric($_GET['prixProdIn'])){
            echo("<br>Vous devez renseigner un prix valide");
            echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
        }else{
            $nomProdIn = $_GET['nomProdIn'];
            $prixProdIn = $_GET['prixProdIn'];

            $sql = "INSERT INTO produits (nom, prix) VALUES ('$nomProdIn', $prixProdIn);";
            $rec = $bdd->query($sql) or die($bdd->error);

            echo("<br>Le produit suivant a été inséré dans la base de donnée<br><br>");
            echo("Nom : ".$nomProdIn."<br>");
            echo("Prix : ".$prixProdIn."<br>");
            echo("<br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
        }
    }
}

if($recherche == "update"){
    if(empty($_GET['productId'])){
        echo("<br>Vous devez selectionner son numéro d'ID pour modifier un produit");
        echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
    }else{
        if(empty($_GET['nomProdUp']) && empty($_GET['prixProdUp'])){
            echo("<br>Vous devez renseigner une modification à faire");
            echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
        }else{
            if($_GET['prixProdUp'] && !is_numeric($_GET['prixProdUp'])){
                echo("<br>Vous devez renseigner un prix valide");
                echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
            }else{
                $clauseSet = array();

                if(!empty($_GET['nomProdUp'])){
                    $nomProdUp = $_GET['nomProdUp'];
                    $clauseSet[] = "nom = '$nomProdUp'";                    
                }
                if(!empty($_GET['prixProdUp'])){
                    $prixProdUp = $_GET['prixProdUp'];
                    $clauseSet[] = "prix = '$prixProdUp'";
                }

                if(count($clauseSet)>0){
                    $set = "SET ". implode(" , ", $clauseSet);
                } else{
                    $set= "";
                }
                
                $sql = "UPDATE produits $set WHERE id = ".$_GET['productId'];
                $rec = $bdd->query($sql) or die($bdd->error);
                
                if(empty($rec)){
                    echo("<br>Aucun enregistrement modifié");
                    echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
                }else{
                    echo("Le produit N°".$_GET['productId']." a bien été modifié<br><br>");
                    if(!empty($_GET['nomProdUp'])){echo("Nom : ".$nomProdUp."<br>");}
                    if(!empty($_GET['prixProdUp'])){echo("Prix : ".$prixProdUp."<br>");}
                    echo("<br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
                }
            }
        }
    }
}

if($recherche == "delete"){
    if(empty($_GET['productId'])){
        echo("<br>Vous devez selectionner un numéro d'ID pour supprimer un produit");
        echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
    }else{
        $sql = "DELETE FROM produits WHERE id = ".$_GET['productId'];
        $rec = $bdd->query($sql) or die($bdd->error);

        if(empty($rec)){
            echo("<br>Aucun enregistrement supprimé");
            echo("<br><br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
        }else{
            echo("Le produit N°".$_GET['productId']." a bien été supprimé<br>");
            echo("<br><a href=\"http://localhost/%23_TP-08/TP-08_index.php\">Retour au formulaire</a><br>");
        }
    }

}