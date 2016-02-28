<?php

	$city = $_GET['city'];

	$city = str_replace(' ', '', $city);

	$contents = file_get_contents("http://www.weather-forecast.com/locations/".$city."/forecasts/latest");

	preg_match('/1 &ndash; 3 Day Weather Forecast Summary:<\/b><span class="read-more-small"><span class="read-more-content"> <span class="phrase">(.*?)<\/span><\/span><\/span>/s', $contents, $matches);

	echo $matches[1];

?>