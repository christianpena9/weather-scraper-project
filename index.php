<?php


	
?>

<!doctype html>
<html>
<head>
	<title>My First Webpage</title>

	<meta charset="utf-8" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- CSS Code goes here -->
	<style type="text/css">

		#topContainer {
			width: 100%;
			background-image: url('images/weatherBG.jpg');
			background-size: cover;
			background-position: center;
			padding-top: 100px;
		}

		.center {
			text-align: center;
		}

		.white {
			color: white;
		}

		p {
			padding-top: 15px;
			padding-bottom: 15px;
		}

		button {
			margin-top: 20px;
		}

		.alert {
			margin-top: 20px;
			display: none;
		}

	</style>

</head>

<body>
	
<div class="container contentContainer" id="topContainer">
	<div class="row">
		<div class="col-md-6 col-md-offset-3 center">
			<h1 class="center white">Weather Scraper</h1>

			<p class="lead center white">This application will predict the weather near you!</p>

			<form>

				<div class="form-group">
					<input class="form-control" type="text" name="city" id="city" placeholder="Eg. London, Paris, San Francisco..." />
				</div>

				<button type="submit" class="btn btn-success btn-lg">Find My Weather</button>

			</form>

			<div id="success" class="alert alert-success">

			</div>

			<div id="danger" class="alert alert-danger">
				Sorry, you entered a wrong city.
			</div>

			<div id="noCity" class="alert alert-danger">
				Please enter a city.
			</div>

		</div>

	</div>
</div> <!-- End of .container -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!-- JavaScript Code goes here -->
	<script type="text/javascript">

		$(document).ready(function() {

			var windowHeight = $(window).height();
			$(".contentContainer").css("min-height", windowHeight);

		});

	</script>

	<script type="text/javascript">
		$(document).ready(function() {

			$('button').click(function(event) {
				event.preventDefault();
				$(".alert").hide();

				var city = $("#city").val();
				var regExp;

				if (city == "") {
					$("#noCity").fadeIn();
				} else {
					$.get("scraper.php?city=" + city, function( data ) {
						regExp = data.search("Warning");

						if(regExp === 10) {
							$("#danger").fadeIn();
						} else {
							$("#success").html(data).fadeIn();
						}
					});
				}

			});

		});
	</script>

</body>

</html>