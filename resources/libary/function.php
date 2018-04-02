<?php

/*
* Author: Sven Gasser
* Content: Delivering functions for the application. 
*/

//-----------------------------------------------------
// Funktion getProduct
//-----------------------------------------------------

/* Diese Funktion führt die Abfrage der Daten durch und stellt die Produkte am Ort des Aufrufes (index.php) dar (Layout wird von CSS bestummen) */

function getProduct() {

	// Neue Datenbankverbindung als Variable pdo
	$pdo=Connection()

		// Die Abfrage nach der RFID-ID. Dabei wird der letze Scan ausgelesen (letzer Scan wird anhand der Zeit ermittelt und dann mittels Selektor ausgewählt)
		$sql = 'SELECT product_logged_rfid FROM product_log, ORDER BY Timestamp DESC limit 1;';
		($pdo->query($sql);

		// Der Inhalt der Query $sql wird an $rfid_id zugewiesen
		$id = $sql;

		// Neue Abfrage nach dem Produkt, Variable $sql wird überschrieben
		$sql = 'SELECT * FROM product WHERE product_rfid = '$rfid_id';';

			// Ausgabe des Produktes 
			

			foreach ($conn->query($sql) as $row) {
				print $row['name'] . "\t";
				print $row['color'] . "\t";
				print $row['calories'] . "\n";
			}

	// Die $pdo-Variable setzen wir auf null (die Connection wird damit geschlossen)
	$pdo = null;
	
}

//-----------------------------------------------------
// Funktion setProduct
//-----------------------------------------------------

/* Diese Funktion wird für das Hinzufügen von neuden Produkten benötigt. */

function setProduct() {

	$pdo=Connection()

		// Neue Daten hinzufügen
		$sql = 'SELECT product_logged_rfid FROM product_log, ORDER BY Timestamp DESC limit 1;';
		($pdo->query($sql);

	// Die $pdo-Variable setzen wir auf null (die Connection wird damit geschlossen)
	$pdo = null;
 }

//-----------------------------------------------------
// Funktion Connection
//-----------------------------------------------------

/* Diese Funktion wird für die DB-Anbindung benötigt. */

	  // Verbindung als Funktion
    function Connection(){
	
        // Der Connector (PDO); Diese Anmelededaten könnten auch ausgelagert werden. 
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