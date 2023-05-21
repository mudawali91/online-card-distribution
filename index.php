<?php include_once 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="author" content="Muda Wali - Tyrell System Programing Test">
	<title>Tyrell System Programing Test | Q1</title>

	<!-- Begin CSS -->
	<link href="public/assets/css/bootstrap.min.css" rel="stylesheet">

	<style>
		.container {
			margin-top: 30px;
			margin-bottom: 20px;
		}
		.card {
			margin-top: 20px;
		}
		.display-none {
			display: none;
		}
		.border.border-success.rounded.custom {
			padding: 0.75rem 1.25rem;
			background-color: #f8f9fa;
		}
	</style>
	<!-- End CSS -->
</head>
<body>
	
	<div class="container">

		<h3>A) Programming Test</h3>
		<div class="card">
			<div class="card-header">
				Theme: Playing cards will be given out to n(number) people
			</div>
			<div class="card-body">
				<h6 class="card-title">Input Instruction:</h6>
				<p class="card-text">
					<ol type="a">
						<li>Number of people (numerical value)</li>
						<li>It does not matter how cards are given if recompile of program arguments, parameter, keyboard input and so on are not necessary.</li>
						<li>In case input value is nil or value is invalid then the error message of "Input value does not exist or value is invalid" must be displayed and the process must be terminated.</li>
						<li>Any number less than 0 is an invalid value.</li>
						<li>Greater than 53 are normal values and cards must be distributed to a number of people instead of having it as an error.</li>
					</ol>
				</p>
				<div id="validation_msg" class="alert alert-danger display-none" role="alert"></div>
				<form id="form_q1" name="form_q1" method="POST" action="javascript:void(0)">
					<div class="form-row">
						<div class="form-group col-md-6">
							<label>Number of people</label>
							<input type="text" class="form-control form-control-sm" id="no_of_player" name="no_of_player"/>
						</div>
					</div>
					<div class="form-group row">
						<div class="col-sm-10">
							<button type="button" class="btn btn-primary btn-sm" id="btn_submit_q1">Submit</button>
						</div>
					</div>
				</form>

				<hr />
				<h6 class="card-title">Output:</h6>
				<div id="div_output" class="border border-success rounded custom display-none"></div>
			</div>
		</div>

	</div>

	<!-- Begin JS -->
	<script src="public/assets/js/vendor/jquery.min.js"></script>
	<script src="public/assets/js/bootstrap.bundle.min.js"></script>
	<script type="text/javascript">

		function is_digits(value) {
			// allow only digit from 0-9, disable from start with 0
			let pattern = '^([0-9]|[1-9][0-9]{1,10})$';
			return ( value.match(pattern) ? true : false );
		}

		function form_validation() {
			let no_of_player = $('#no_of_player').val();
			let error_msg = '';

			// reset validation alert
			$('#validation_msg').text(error_msg);
			$('#validation_msg').hide();

			if ( no_of_player == '' || is_digits(no_of_player) == false || parseInt(no_of_player) <= 0 ) {
				error_msg = 'Input value does not exist or value is invalid';
			}

			// if error exist then display validation alert
			if ( error_msg != '' ) {
				$('#validation_msg').text(error_msg);
				$('#validation_msg').show();
				$('#div_output').html('');
				$('#div_output').hide();
				return false;
			} else {
				return true;
			}
		}

		function distribute_cards() {
			let no_of_player = $('#no_of_player').val();

			$('#div_output').html('');

			$.ajax({
				url: "Controller/BaseController.php",
				type: "POST",
				data: { 'action': 'distribute_cards', 'no_of_player' : no_of_player },
				cache: false,
				success: function(response) {
					console.log('response', response);
					if ( response.status == 1 ) {
			            let player_card_list = '';
			            if ( response.data.player_card_list_format != '' ) {
			            	// display list of cards per player according row format
				            $.each(response.data.player_card_list_format, function(key, val) {
				            	player_card_list += val+"<br>";
				            });

				            $('#div_output').html(player_card_list);
				            $('#div_output').show();
			            }
		            } else {
		            	// handle validation error message from server-side
		            	$('#validation_msg').text(response.message);
						$('#validation_msg').show();
						$('#div_output').html('');
						$('#div_output').hide();
		            }
				},
				error: function(e) {
					console.log(e);
				},
				complete: function(response) {
				},
		    });
		}

		$(function() {

			// disabled submit form by press enter
			$('#btn_submit_q1').on('click', function(e) {
				e.preventDefault();
				if ( form_validation() === true ) {
					distribute_cards();
				}
			});

			$('.form-control').on('input', function(e) {
				$('#validation_msg').hide();
			});

	  	});

	</script>
	<!-- End JS -->
</body>
</html>