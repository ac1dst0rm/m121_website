<?php

	include(".php"); 		
	$link=Connection();
	$result=mysql_query("SELECT * FROM `tempLog` ORDER BY `timeStamp` DESC",$link);
	
	//Funktion einbinden
  ?>

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
        //   IF-Afrage für dynamisches Auslesen
		  if($result!==FALSE){
		     while($row = mysql_fetch_array($result)) {
		        printf("<tr><td> &nbsp;%s </td><td> &nbsp;%s&nbsp; </td><td> &nbsp;%s&nbsp; </td></tr>", 
		           $row["timeStamp"], $row["temperature"], $row["humidity"]);
		     }
		     mysql_free_result($result);
		     mysql_close();
		  }
      ?>

   </table>
</body>
</html>
