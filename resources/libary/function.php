<?php

/*
* Author: Sven Gasser
* Content: Delivering functions for the application
*/

// Inkludieren von db_config beinhaltet globale Variablen für die DB-Anbindung)
include("../config/db_config.php"); 

//-----------------------------------------------------
// Funktion getProduct
//-----------------------------------------------------

/* Diese Funktion führt die Abfrage der Daten durch und stellt sie dar (Layout wird von CSS bestummen) */

function getProduct($conn) {
		$sql = 'SELECT name, color, calories FROM fruit ORDER BY name';
		foreach ($conn->query($sql) as $row) {
			print $row['name'] . "\t";
			print $row['color'] . "\t";
			print $row['calories'] . "\n";
		}
    }

//-----------------------------------------------------
// Funktion setProduct
//-----------------------------------------------------

/* Diese Funktion wird für die DB-Anbindung benötigt. */

function setProduct() {
	
	if($result!==FALSE){
		while($row = mysql_fetch_array($result)) {
		   printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
			  $row["timeStamp"], $row["temperature"], $row["humidity"]);
		}
		mysql_free_result($result);
		mysql_close();
	 }
	
}

//-----------------------------------------------------
// Funktion Connection
//-----------------------------------------------------

/* Diese Funktion wird für die DB-Anbindung benötigt. */

	  // Verbindung als Funktion
    function Connection(){
        
        // Der Connector (PDO), die Angaben stammen aus db_config
		$connection = new PDO('mysql:host=$db_host;dbname=$db_name', '$db_user', 'db_pass');

        // Errorhandling 
		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}
        
        // falls keine Datenbank mit dem angegebenen Namen gefunden wurde
		mysql_select_db($db) or die( 'MySQL ERROR: '. mysql_error() );

            // Zum Schluss geben wir den Rückgabewert aus
        	return $connection;
	}
	
?>