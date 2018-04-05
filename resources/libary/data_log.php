<?php

/*
* Author: Sven Gasser
* Content: Data Logger. Recives the Data from the Arduino over HTTP 
*/

	//Inkludieren von functions.php
   	include("function.php");
	   
	// Neue DB-Verbindung aufbauen mittels der Funktion Connection(), Zuweisung an $sql_con
   	$sql_con=Connection();

	// Wenn eine POST-Anfrage über HTTP hereinkommt, empfängt die Applikation hier die Daten des RFID-Scans (die Daten werden vom Arduino-Code definiert)
	$uid=$_POST["uid"];

	// Wir müssen herausfinden, um welches Produkt es sich handelt. Dazu Fragen wir die $uid in der Tabelle product in der Spalte product_rfid ab. Von dieser nehmen wir dann die product_id und schreiben diese in die Tabelle product_log
	$sql = "SELECT product_id FROM product WHERE product_rfid = $uid";

		// Die Abfrage ausführen
		$sql_con->exec($sql);

	// Die obenen empfangenen Daten müssen nun in die Datenbank geschrieben werden
	$query = "INSERT INTO product_log (`product_product_id`) VALUES $sql"; 

		// Die Daten werden nun in die DB geschrieben  
		$sql_con->exec($query);
		
	// Die aufgebaute Verbindung zur DB wieder schliessen, mittel Zuweisung von null an $sql_con
	$sql_con= null;

	// Sendet den HTTP-Header in Rohform
   	header("Location: index.php");
?>
