<?php

/*
* Author: Sven Gasser
* Content: Data Logger. Recives the Data from the Arduino over HTTP 
*/

	//Inkludieren von functions.php
   	include("function.php");
	   
	// Neue DB-Verbindung aufbauen mittels der Funktion Connection(), Zuweisung an $sql_con
   	$sql_con=Connection();

	// Wenn eine POST-Anfrage über HTTP hereinkommt, empfängt die Applikation hier die Daten (die Daten werden im Arduino-Code bestummen)
	$temp1=$_POST["temp1"];
	$hum1=$_POST["hum1"];

	// Die obenen empfangenen Daten müssen nun in die Datenbank geschrieben werden
	$query = "INSERT INTO `product_Log` (`temperature`, `humidity`) 
		VALUES ('".$temp1."','".$hum1."')"; 

		// Die Daten werden nun in die DB geschrieben    	
		mysql_query($query,$sql_con);
	  
	// Die aufgebaute Verbindung zur DB wieder schliessen, mittel Zuweisung von null an $sql_con
	$sql_con= null;

   	header("Location: index.php");
?>
