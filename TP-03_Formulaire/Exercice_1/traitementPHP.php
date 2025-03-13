<?php

if(isset($_POST['nom'])){
    echo("<br>Nom : ".$_POST['nom']);
}
if(isset($_POST['pays'])){
    echo("<br>Pays : ".$_POST['pays']);
}
if(isset($_POST['genre'])){
    echo("<br>Genre : ".$_POST['genre']);
}
if(isset($_POST['newsletter'])){
    echo("<br>Est abonné à la newsletter");
}else{
    echo("<br>N'est pas abonné à la newsletter");
}




