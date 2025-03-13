<?php

// Exercice 1
echo("<h3>Exercice 1):</h3>");

function epargne($montant, $annees) {
  echo("Vous épargnez $montant pendant $annees années<br/>");
  $solde = 0;
  for ($a=1; $a<=$annees; $a++) {
    $solde += $montant * 12;
    echo("Année $a: solde=$solde<br/>");
  }
  echo("Le montant total de votre épargne sera de $solde</br>");
}

epargne(100, 10);
echo("<hr/>");

// Exercice 2
echo("<h3>Exercice 2):</h3>");

function epargneV2($montant, $annees, $taux=0.5) {
  echo("Vous épargnez $montant pendant $annees années avec un taux de $taux%<br/>");
  $solde = 0;
  $interetsTotal = 0;
  for ($a=1; $a<=$annees; $a++) {
    $solde += $montant * 12;
    $interets = $solde * $taux/100;
    $interetsTotal += $interets;
    $solde += $interets;
    echo("Année $a: solde=" . round($solde,2) . ", les intérêts se montent à " . round($interets, 2) . "<br/>");
  }
  echo("Le montant total de votre épargne sera de " . round($solde, 2) . ", le total des intérêts se monte à " . round($interetsTotal, 2) . "</br>");
}
epargneV2(100, 10);
epargneV2(100, 10, 1);
echo("<hr/>");
