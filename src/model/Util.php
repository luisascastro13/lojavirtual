<?php
class Util{

	public static function format_currency($val){
		return "R$ " . preg_replace("/[.]/", ",", number_format($val, 2));
	}
}
?>
