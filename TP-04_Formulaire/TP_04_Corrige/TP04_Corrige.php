<?php

  // Exercice 1 - Calculatrice
  if (isset($_POST['btnAddition'])) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $resultat = $nombre1 + $nombre2;    
    echo("$nombre1 + $nombre2 = $resultat<br>");
  } 
  if (isset($_POST['btnSoustraction'])) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $resultat = $nombre1 - $nombre2;    
    echo("$nombre1 - $nombre2 = $resultat<br>");
  } 
  if (isset($_POST['btnMultiplication'])) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $resultat = $nombre1 * $nombre2;    
    echo("$nombre1 * $nombre2 = $resultat<br>");
  } 
  if (isset($_POST['btnDivision'])) {
    $nombre1 = $_POST['nombre1'];
    $nombre2 = $_POST['nombre2'];
    $resultat = $nombre1 / $nombre2;    
    echo("$nombre1 / $nombre2 = $resultat<br>");
  } 

// Exercice 2 - Recherche
if (isset($_POST['btnRechercher'])) {
    // Version 1:
    echo("<h3>Version 1</h3>");
    if ($_POST['nom']) {
      echo("Vous chercher le nom: " . $_POST['nom'] . "<br>");
    }
    if ($_POST['prefixe']) {
      echo("Vous chercher le préfixe: " . $_POST['prefixe'] . "<br>");
    }
    if (isset($_POST['roaming'])) {
      echo("Vous chercher avec l'option roaming<br>");
    }
    if (isset($_POST['sms'])) {
      echo("Vous chercher avec l'option SMS<br>");
    }

    // Version 2:
    echo("<h3>Version 2</h3>");
    $recherche = array();
    if ($_POST['nom']) {
      $recherche[] = "le nom: " . $_POST['nom'];
    }
    if ($_POST['prefixe']) {
      $recherche[] = "le préfixe: " . $_POST['prefixe'];
    }
    if (isset($_POST['roaming'])) {
      $recherche[] = "l'option roaming";
    }
    if (isset($_POST['sms'])) {
      $recherche[] = "l'option SMS";
    }
    if (count($recherche)) {
      echo("Vous chercher " . implode(" avec ", $recherche));
    } else {
      echo("Vous n'avez spécifié aucun critère de recherche");
    }

  }
