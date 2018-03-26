<?php

function getProduct($conn) {
		$sql = 'SELECT name, color, calories FROM fruit ORDER BY name';
		foreach ($conn->query($sql) as $row) {
			print $row['name'] . "\t";
			print $row['color'] . "\t";
			print $row['calories'] . "\n";
		}
    }

function setProduct() {


	
}


?>