<?php

/*
* Author: Sven Gasser
* Content: Data Logger. Writes the recived Data from the Arduino directly in to the DB
*/

	//Inkludieren von functions.php
   	include("function.php");
	   
	//
   	$link=Connection();

	// Wenn eine POST-Anfrage hereinkommt, empfängt die Applikation hier die Daten (die Daten werden im Arduino-Code bestummen)
	$temp1=$_POST["temp1"];
	$hum1=$_POST["hum1"];

	// Die obenen empfangenen Daten müssen nun in die Datenbank geschrieben werden
	$query = "INSERT INTO `product_Log` (`temperature`, `humidity`) 
		VALUES ('".$temp1."','".$hum1."')"; 
   	
   mysql_query($query,$link);
	  
	// Die aufgebaute Verbindung zur DB wieder schliessen, mittel Zuwesung von null an $link
	$link= null;

   	header("Location: index.php");
?>
