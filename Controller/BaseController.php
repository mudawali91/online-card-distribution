<?php
	include_once '../config.php';

	if ( isset($_POST['action']) ) {
		if ( $_POST['action'] == 'distribute_cards' ) {

			$status = 0;
			$message = '';
			$data = [];

			$no_of_player = ( isset($_POST['no_of_player']) ? $_POST['no_of_player'] : 0 );
			$data['no_of_player'] = $no_of_player;

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