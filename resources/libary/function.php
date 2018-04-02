<?php

/*
* Author: Sven Gasser
* Content: Delivering functions for the application
*/

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
	
        // Der Connector (PDO); Diese Anmlededaten könnten auch ausgelagert werden. 
		$connection = new PDO('mysql:host=localhost;dbname=hermes_core', 'hermes_appusr', 'ZmuFbj2or2KPqFyn');

        // Errorhandling 
		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}

		// Zum Schluss geben wir den Rückgabewert aus
        	return $connection;
	}

//-----------------------------------------------------
// Funktion Connection
//-----------------------------------------------------

/* Diese Funktion loggt die Produktescans, um Statistiken zu erstellen */

	function setLog() {
		
		// Neue Datenbankverbindung aufbauen
		$newConn = Connection();

		// Jeder Produktescan wird in der Datenbank erfasst
		$query = ""
		($pdo->query($query)
	}

?>