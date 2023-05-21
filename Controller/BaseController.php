<?php
	include_once '../config.php';

	if ( isset($_POST['action']) ) {
		if ( $_POST['action'] == 'distribute_cards' ) {

			$status = 0;
			$message = '';
			$data = [];

			$no_of_player = ( isset($_POST['no_of_player']) ? $_POST['no_of_player'] : 0 );
			$data['no_of_player'] = $no_of_player;

			// start validate input request
			$error_msg = '';

			if ( empty($no_of_player) || filter_var($no_of_player, FILTER_VALIDATE_INT) === false || is_digits($no_of_player) || $no_of_player <= 0 ) {
				$error_msg = 'Input value does not exist or value is invalid';
			}

			if ( !empty($error_msg) ) {
				$response = [
					'status' => $status,
					'message' => $error_msg,
					'data' => $data,
				];
				print_json($response, 200);
				return false;
			}
			// end validate input request

			$response = [
				'status' => 1,
				'message' => 'Success',
				'data' => $data,
			];
			print_json($response, 200);

		} else {
			$response = [
				'status' => 0,
				'message' => 'Invalid Action',
				'data' => [],
			];
			print_json($response, 200);
		}

	} else {
		$response = [
			'status' => 0,
			'message' => 'Invalid Action',
			'data' => [],
		];
		print_json($response, 200);
	}
?>