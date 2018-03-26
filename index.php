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
      <title> RFID Scanner </title>
   </head>
<body>
   <h1> Wilkommen zum RFID Scanner. </h1>

    <t5> Hilfe <t5>

   <table border="1" cellspacing="1" cellpadding="1">
		<tr>
			<td>&nbsp;Timestamp&nbsp;</td>
			<td>&nbsp;Temperature 1&nbsp;</td>
			<td>&nbsp;Moisture 1&nbsp;</td>
		</tr>

	  <?php 
	  $output = getProduct();

	  print $output;
	
		 
      ?>

   </table>
</body>
</html>