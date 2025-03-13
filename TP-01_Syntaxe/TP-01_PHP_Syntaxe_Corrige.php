<?php

/*  TP 01 */

// Exercice 1 a)
echo("<h3>Exercice 1:</h3>");
for ($i=1; $i<=20; $i++) {
  echo("$i<br/>");
}
echo("<hr/>");

// Exercice 1 b)
echo("<h3>Exercice 1 b):</h3>");
function boucle($debut, $fin) {
  for ($i=$debut; $i<=$fin; $i++) {
    echo("$i<br/>");
  }
}
boucle(3, 12);
echo("<hr/>");

// Exercice 1 c)
echo("<h3>Exercice 1 c):</h3>");
function boucleV2($debut, $fin, $increment=1) {
  for ($i=$debut; $i<=$fin; $i+=$increment) {
    echo("$i<br/>");
  }
}
boucleV2(4, 12);
boucleV2(4, 12, 2);
echo("<hr/>");

// Exercice 2 a)
echo("<h3>Exercice 2 a):</h3>");
define('ANNEE_COURANTE', 2020);
function afficherSelonAge($annee) {
  $age = ANNEE_COURANTE - $annee;
  echo("Vous êtes né-e en $annee, votre âge: $age<br/>");
  if ($age<18) {
    echo("Vous êtes mineur-e<br/>");
  } elseif ($age>18) {
    echo("Vous êtes majeur-e<br/>");
  } else {
    echo("Vous devenez/êtes devenu-e majeur-e cette année<br/>");
  }
  echo("<br/>");
}
afficherSelonAge(2006);
afficherSelonAge(2000);
afficherSelonAge(2002);
echo("<hr/>");

// Exercice 2 b)
echo("<h3>Exercice 2 b):</h3>");
function afficherSelonAgeV2($annee) {
  $age = date("Y") - $annee;
  echo("Vous êtes né-e en $annee, votre âge: $age<br/>");
  if ($age<18) {
    echo("Vous êtes mineur-e<br/>");
  } elseif ($age>18) {
    echo("Vous êtes majeur-e<br/>");
  } else {
    echo("Vous devenez/êtes devenu-e majeur-e cette année<br/>");
  }
  echo("<br/>");
}
afficherSelonAgeV2(2006);
afficherSelonAgeV2(2000);
afficherSelonAgeV2(2002);
echo("<hr/>");
