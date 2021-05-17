<?php

    $conn = new mysqli('localhost','root','','sparks_foundation_bank');

	if(!$conn){
		die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
	}
