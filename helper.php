<?php
	function print_arr($array=[]) {
		echo '<pre>';
		print_r($array);
		echo '</pre>';
	}

	function print_json($response, $http_status) {
		header('Content-Type: application/json; charset=utf-8');
		http_response_code($http_status);
		echo json_encode($response);
	}
?>