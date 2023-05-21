<?php
	namespace Controller\Card;

	class CardController {

		public function __construct() {
		}

		public function get_card_type() {
			$data = ['S' => 'Spade', 'H' => 'Heart', 'D' => 'Diamond', 'C' => 'Club'];

			return $data;
		}

		public function get_card_list() {
			$data = ['A', '2', '3', '4', '5', '6', '7', '8', '9', 'X', 'J', 'Q', 'K'];

			return $data;
		}
	}
?>