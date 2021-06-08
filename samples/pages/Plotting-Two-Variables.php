<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

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

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
