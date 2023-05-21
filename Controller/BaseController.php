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

			// devide total card with total no of player to get total card per player
			$total_card_per_player = $total_card/(int)$no_of_player;
			// round total card per player in order to get nearest top integer
			$total_card_per_player = ceil($total_card_per_player);
			$data['total_card_per_player'] = $total_card_per_player;

			// split cards based on chunk no of player in order to assign round robin turn
			$card_split = array_chunk($card_arrangement, $no_of_player);
			$data['card_split'] = $card_split;

			$player_card_list = [];
			// distribute and group cards to each player according to round robin turn
			// if all card completely distributed, those player who not receive any more card during round robin turn will be assigned as empty card
			foreach ( range(1, $no_of_player) as $np_key => $np_val ) {
				foreach ( range(1, $total_card_per_player) as $cp_key => $cp_val ) {
					$player_card_list['P'.($np_val)][] = ( isset($card_split[$cp_key][$np_key]) ? $card_split[$cp_key][$np_key] : '' );
				}
			}
			$data['player_card_list'] = $player_card_list;

		    // print output according to require format
		    $data['player_card_list_format'] = $card->print_output($player_card_list);

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