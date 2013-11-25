<!--- By: Sharmaine Roxas -->

<?php

	function mysql_insert_array($table, $data, $exclude = array()) {
	
		include "settings/connection.php";
		$fields = $values = array();

		if( !is_array($exclude) ) $exclude = array($exclude);

		foreach( array_keys($data) as $key ) {
			if( !in_array($key, $exclude) ) {
				$fields[] = "`$key`";													//will set the field name from the customers table into a variable $key
				$values[] = "'" . mysql_real_escape_string($data[$key]) . "'";			//eliminates characters so it is safe to place in mysql_query
			}
		}
		
		$fields = implode(",", $fields);		//separates all the fields in the array with a coma
		$values = implode(",", $values);		//separates all the values in the array with a coma

		$sql = "INSERT INTO `$table` ($fields) VALUES ($values)";			//query
		$result = mysql_query($sql);			
        
		if($result) {
			echo "SUCCESS";
		} else {
			echo "FAIL";
			echo mysql_error();
		}
	}
?>