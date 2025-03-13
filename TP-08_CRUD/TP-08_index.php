
<?php
    
    $bdd = new mysqli('localhost', 'root', '', 'test');

    if ($bdd->connect_error) {die("Connexion impossible: " . $bdd->connect_error);}

    $sql = "SELECT id FROM produits";
    $result = $bdd->query($sql) or die($bdd->error);

    $ids = [];
    while ($row = $result->fetch_assoc()) {
        $ids[] = $row['id'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>BASE DE DONNÉES "Produits"</title>
</head>

<body>

<form action = "TP-08_PHP_CRUD.php" method="get">


    <h1>BASE DE DONNES "Produits"</h1>
    <button type="submit" id="read" name="submit" value="read">Afficher les produits</button>

    <h2>Ins&eacute;rer un nouveau produit</h2>
    <label for="nomProdIn">Nom du Produit </label>
    <input type="text" id="nomProdIn" name="nomProdIn">
    <label for="prixProdIn">Prix du produit </label>
    <input type="text" id="prixProdIn" name="prixProdIn">
    <button type="submit" id="insert" name="submit" value="insert">Ajouter</button>
    
    <h2>Modifier un produit</h2>
    <label for="productID">ID <label>
    <select name="productId">
        <option value="null" selected disabled>--Choisissez un id--</option>
        <?php foreach ($ids as $id): ?>
            <option value="<?= $id; ?>"><?= $id; ?></option>
        <?php endforeach; ?>
    </select>
    <br>
    <label for="nomProdUp">Nom du Produit </label>
    <input type="text" id="nomProdUp" name="nomProdUp">
    <label for="prixProdUp">Prix du produit </label>
    <input type="text" id="prixProdUp" name="prixProdUp">
    <br>
    <button type="submit" id="update" name="submit" value="update">Modifier</button>
    <button type="submit" id="delete" name="submit" value="delete">Supprimer</button>

</form>

</body>
</html>