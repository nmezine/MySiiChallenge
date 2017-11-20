<?php

require_once('Connection.php');
require_once('modele/TwitterAccount.php');

$newConnection = new Connection();

$twAccountList 	= array(); //List des comptes twitter qui seront envoyer a index.php
$accountList 	= array(); //List des comptes demandé

// on ajoute dans la liste les deux comptes par default
array_push($accountList, "siicanada");
array_push($accountList, "CanadiensMTL");

if(isset($_GET['searchTwitterAccount'])) {
	array_push($accountList, $_GET['searchTwitterAccount']);
}

// on boucle sur la liste des comptes demandé
// create Twitter account and push in array list
foreach($accountList as $items) {

if (isset($_GET['user']))  {$user = $_GET['user'];}  else {$user  = $items;}
if (isset($_GET['count'])) {$count = $_GET['count'];} else {$count = 200;}

$getfield = "?screen_name=$user&count=$count";

$string = json_decode($newConnection->getTwitter()->setGetfield($getfield)
->buildOauth($newConnection->getUrl(), $newConnection->getRequestMethod())
->performRequest(),$assoc = TRUE);

// Si le compte twitter rechercher existe 
// ET qu'il n'est pas deja afficher sur notre page web
if (isset($string[0])) {
	$twToPush = new TwitterAccount($string);
	if(!in_array($twToPush, $twAccountList)) {
		array_push($twAccountList, $twToPush);
	}
}

}


?>