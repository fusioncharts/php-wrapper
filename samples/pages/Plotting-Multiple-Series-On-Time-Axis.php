<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>
        <title>FusionCharts | Simple FusionTime Chart</title>
        <!-- FusionCharts Library -->
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    </head>

    <body>

        <?php

			$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/plotting-multiple-series-on-time-axis-data.json');
			$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/plotting-multiple-series-on-time-axis-schema.json');

			$fusionTable = new FusionTable($schema, $data);
			$timeSeries = new TimeSeries($fusionTable);

			$timeSeries->AddAttribute("caption", "{ 
											text: 'Sales Analysis'
										  }");

			$timeSeries->AddAttribute("subcaption", "{ 
											text: 'Grocery & Footwear'
										  }");
										  
			$timeSeries->AddAttribute("series", "'Type'");

			$timeSeries->AddAttribute("yAxis", " [{
												  plot: 'Sales Value',
												  title: 'Sale Value',
												  format: {
													prefix: '$'
												  }
												}]");			  
						
			// chart object
			$Chart = new FusionCharts("timeseries", "MyFirstChart" , "700", "450", "chart-container", "json", $timeSeries);

			// Render the chart
			$Chart->render();

?>

        <h3>Plotting multiple series on time axis</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>