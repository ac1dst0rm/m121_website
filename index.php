<?php

/*
* Author: Sven Gasser
* Content: 
*/
	// Inkludieren der erstellten Funktionen 
	include("resources/libary/function.php"); 	

	$link=Connection();
	$sql = "SELECT * FROM products";
	
	//Funktion einbinden
  ?>

<!--Beginn HTML-->
<html>
   <head>
	   <!-- Dieser Text wird im Browser-Tab angezeigt. -->
	  <title> RFID Scanner </title>
	  <link rel="stylesheet" href="/css/main.css">
   </head>

	<body>

		<div class="center"> 
			<h1> Bitte halten Sie das Produkt an den Leser. </h1>
		</div>

			<?php 
		     	// getScan wird auf false gesetzt. 
				$getScan = false;
		
				// Schreiben des Produkts in eine  Variable
				$output = getProduct();

				// Das Produkt ausgeben (Funktion getProduct)
				print $output;
			?>

		</table>
	</body>
</html>