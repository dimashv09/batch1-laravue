<?php
	function convert_date($value) {
		return date('H:i:s - d F Y', strtotime( $value ));
	}
?>