<?php
/*
Author: Sven Gasser für Arduino Projekt 
Inhalt: DB-Connector 
*/

// Inkludieren von db_connect (beinhaltet globale Variablen für die DB Anbindung)
include("db_connect.php"); 

    // Verbindung als Funktion
    function Connection(){
        
        // Der Connector (PDO), die Angaben stammen aus db_config
		$connection = new PDO('mysql:host=localhost;dbname=databasename', 'username', 'password');

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
