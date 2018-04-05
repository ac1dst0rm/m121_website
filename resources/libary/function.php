<?php

/*
* Author: Sven Gasser
* Content: Delivering functions for the application. 
*/

//-----------------------------------------------------
// Funktion Connection
//-----------------------------------------------------

/* Diese Funktion wird für die DB-Anbindung benötigt. */

	  // Verbindung als Funktion
    function Connection(){
	
        // Der Connector (PDO); Diese Anmelededaten könnten auch ausgelagert werden. 
		$connection = new PDO('mysql:host=localhost;dbname=hermes_core', 'hermes_appusr', 'ZmuFbj2or2KPqFyn'); // Warum die Datenbank wohl Hermes heisst? Hermes ist der Gott der Kunsthändler. Das Entwicklen einer Webapplikation ist ebenfalls eine Art Kunsthandel.

        // Errorhandling 
		if (!$connection) {
	    	die('MySQL ERROR: ' . mysql_error());
		}

			// Zum Schluss geben wir den Rückgabewert aus
        	return $connection;
	}


//-----------------------------------------------------
// Funktion getProduct
//-----------------------------------------------------

/* Diese Funktion führt die Abfrage der Daten durch und stellt die Produkte am Ort des Aufrufes (index.php) dar (Layout wird von CSS bestummen) */

function getProduct() {

	// Neue Datenbankverbindung als Variable pdo
	$newConn=Connection()

		// Die Abfrage nach der RFID-ID. Dabei wird der letze Scan ausgelesen (letzer Scan wird anhand der Zeit ermittelt und dann mittels Selektor ausgewählt)
		$sql = "SELECT product_product_id FROM product_log, ORDER BY Timestamp DESC limit 1";

		// Abfrage ausführen
		($newConn->query($sql);

		// Neue Abfrage nach der Produkt-Sorte in product des entsprechendes Produktes mit der product_id $sql
		$query = "SELECT product_variety_product_variety_id FROM product WHERE product_id = $sql";

		// Abfrage ausführen
		($newConn->query($query);

			// Ausgabe des Produktes
			echo "";

			foreach ($pdo->query($sql) as $row) {
				print $row[''] . "\t";
				print $row['color'] . "\t";
				print $row['calories'] . "\n";
			}

	// Die $pdo-Variable setzen wir auf null (die Connection wird damit geschlossen)
	$newConn = null;
	
}

//-----------------------------------------------------
// Funktion setProduct
//-----------------------------------------------------

/* Diese Funktion wird für das Hinzufügen von neuden Produkten benötigt. */

function setProduct() {

	$newConn=Connection()

		// Neue Daten hinzufügen
		$sql = "";
		($newConn->query($sql);

	// Die $pdo-Variable setzen wir auf null (die Connection wird damit geschlossen)
	$newConn = null;
 }

//-----------------------------------------------------
// Funktion setLog
//-----------------------------------------------------

/* Diese Funktion loggt die Produktescans, um Statistiken zu erstellen */

	function setLog() {
		
		// Neue Datenbankverbindung aufbauen
		$newConn = Connection();

		// Jeder Produktescan wird in der Datenbank erfasst
		$query = "";

		// Daten in DB einfügen
		($newConn->query($query)
	}

//-----------------------------------------------------
// Funktion getLog
//-----------------------------------------------------

/* Diese Funktion gibt den Log des Produktescans aus, um Statistiken zu erstellen */
/* Geplant für Data Science. Mittels chart.js sollten Daten visualisiert werden.  */
	
function getLog() {
		
	// Neue Datenbankverbindung aufbauen
	$newConn = Connection();

	$query = ""
	($pdo->query($query)
}

?>