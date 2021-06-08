<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/line-chart-with-time-axis-data.json');
$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/line-chart-with-time-axis-schema.json');

$fusionTable = new FusionTable($schema, $data);
$timeSeries = new TimeSeries($fusionTable);

$timeSeries->AddAttribute("caption", "{ 
													text: 'Sales Analysis'
												  }");

$timeSeries->AddAttribute("subcaption", "{ 
											text: 'Grocery'
										  }");

$timeSeries->AddAttribute("yAxis", "[{
												  plot: {
													value: 'Grocery Sales Value',
													type: 'line'
												  },
												  format: {
													prefix: '$'
												  },
												  title: 'Sale Value'
											   }]");

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
