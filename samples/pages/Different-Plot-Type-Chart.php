<?php

    /* Include the `../src/fusioncharts.php` file that contains functions to embed the charts.*/
    include("../includes/fusioncharts.php");
?>
  <html>

    <head>
        <title>FusionCharts | Simple FuionTime Chart</title>
        <!-- FusionCharts Library -->
        <script type="text/javascript" src="//cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
    </head>

    <body>

        <?php

			$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/different-plot-type-for-each-variable-measure-data.json');
			$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/different-plot-type-for-each-variable-measure-schema.json');

			$fusionTable = new FusionTable($schema, $data);
			$timeSeries = new TimeSeries($fusionTable);

			$timeSeries->AddAttribute("caption", "{ 
                                        text: 'Sales Performance'
                                      }");

			$timeSeries->AddAttribute("yAxis", "[{
                                              plot: {
                                                value: 'Sale Amount',
                                                type: 'area'
                                              },
                                              title: 'Sale Amount',
                                              format: {
                                                prefix: '$'
                                              }
                                            }, {
                                              plot: {
                                                value: 'Units Sold',
                                                type: 'column'
                                              },
                                              title: 'Units Sold'
                                            }]");
						
			// chart object
			$Chart = new FusionCharts("timeseries", "MyFirstChart" , "700", "450", "chart-container", "json", $timeSeries);

			// Render the chart
			$Chart->render();

?>

        <h3>Different plot type for each variable (measure)</h3>
        <div id="chart-container">Chart will render here!</div>
        <br/>
        <br/>
        <a href="../index.php">Go Back</a>
    </body>

    </html>