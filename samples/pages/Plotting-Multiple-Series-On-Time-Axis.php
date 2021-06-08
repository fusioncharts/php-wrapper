<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

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

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
