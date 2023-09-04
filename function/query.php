<?php
	function exquery($conn,$data){
		$Qry = $conn->query($data);
		return $Qry;
	}
 ?>
