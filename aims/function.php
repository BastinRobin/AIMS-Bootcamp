<?php


	function calculator($one, $two, $three) {

		// Take one and two
		if($three == 'sum') {

			return $one + $two;
		}

		else if($three == 'minus') {

			return $one - $two;
		}

		else if($three == 'multiply') {

			return $one * $two;
		}

		else ($three == 'divide') {
			return $one / $two;
		}
	}


	function get_full_name($fname, $lname) {
		return $fname.' '.$lname;
	}


	function calculate_bonus($v) {
		return $v + 500;
	}

?>