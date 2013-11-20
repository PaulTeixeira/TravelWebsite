<?php

	function mysql_insert_array($table, $data, $exclude = array()) {

		$fields = $values = array();

		if( !is_array($exclude) ) $exclude = array($exclude);

		foreach( array_keys($data) as $key ) {
			if( !in_array($key, $exclude) ) {
				$fields[] = "`$key`";
				$values[] = "'" . mysql_real_escape_string($data[$key]) . "'";
			}
		}
		
		$fields = implode(",", $fields);
		$values = implode(",", $values);

		$sql = "INSERT INTO `$table` ($fields) VALUES ($values)";
		$result = mysql_query($sql);
        
		if($result) {
			echo "SUCCESS";
			//header('Location: thankyou.php');
			//exit;
		} else {
			echo "FAIL";
			echo mysql_error();
		}
	}
?>