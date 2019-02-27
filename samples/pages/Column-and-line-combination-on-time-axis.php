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
		
			$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/column-line-combination-data.json');
			$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/column-line-combination-schema.json');

			$fusionTable = new FusionTable($schema, $data);
			$timeSeries = new TimeSeries($fusionTable);

			$timeSeries->AddAttribute("caption", "{ 
                                        text: 'Web visits & downloads'
                                      }");

			$timeSeries->AddAttribute("subcaption", "{ 
											text: 'since 2015'
										  }");

			$timeSeries->AddAttribute("yAxis", "[{
												  plot: [{
														value: 'Downloads',
														type: 'column'
													  }, {
														value: 'Web Visits',
														type: 'line'
													  }]
												}]");			  
						
			// chart object
			$Chart = new FusionCharts("timeseries", "MyFirstChart" , "700", "450", "chart-container", "json", $timeSeries);

			// Render the chart
			$Chart->render();

?>

        <h3>Column and line combination on time axis</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>