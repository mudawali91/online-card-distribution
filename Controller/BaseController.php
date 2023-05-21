<?php
	include_once '../config.php';
	require_once 'CardController.php';
	use Controller\Card\CardController;

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

			// initialize card object
			$card = new CardController();

			$data['card_arrangement'] = $card_arrangement = $card->get_card_arrangement();
			$data['total_card'] = $total_card = count($card_arrangement);

			// randomly shuffle cards
			shuffle($card_arrangement);
			$data['card_arrangement_shuffle'] = $card_arrangement;

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