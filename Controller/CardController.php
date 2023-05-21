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

		public function get_card_arrangement() {
			$data = [];

			// arrange card in an array list - total 52 cards, ex: [S-A, S-2, S-3, ...]
			foreach ( $this->get_card_type() as $ct_key => $ct_val ) {
				foreach ($this->get_card_list() as $cl_key => $cl_val ) {
					$data[] = $ct_key.'-'.$cl_val;
				}
			}

			return $data;
		}
	}
?>