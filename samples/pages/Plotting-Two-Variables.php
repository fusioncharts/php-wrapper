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

			$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/plotting-two-variable-measures-data.json');
			$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/plotting-two-variable-measures-schema.json');

			$fusionTable = new FusionTable($schema, $data);
			$timeSeries = new TimeSeries($fusionTable);

			$timeSeries->AddAttribute("caption", "{ 
								text: 'Cariaco Basin Sampling'
							  }");

			$timeSeries->AddAttribute("subcaption", "{ 
											text: 'Analysis of O₂ Concentration and Surface Temperature'
										  }");

			$timeSeries->AddAttribute("yAxis", "[{
													plot: [{
													  value: 'O2 concentration',
													  connectNullData: true
													}],
													min: '3',
													max: '6',
													title: 'O₂ Concentration (mg/L)'  
												  }, {
													plot: [{
													  value: 'Surface Temperature',
													  connectNullData: true
													}],
													min: '18',
													max: '30',
													title: 'Surface Temperature (°C)'
												 }]");		  
						
			// chart object
			$Chart = new FusionCharts("timeseries", "MyFirstChart" , "700", "450", "chart-container", "json", $timeSeries);

			// Render the chart
			$Chart->render();

?>

        <h3>Plotting two variables (measures)</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>