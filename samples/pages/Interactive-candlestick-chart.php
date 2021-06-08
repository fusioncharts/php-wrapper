<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/candlestick-chart-data.json');
$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/candlestick-chart-schema.json');

$fusionTable = new FusionTable($schema, $data);
$timeSeries = new TimeSeries($fusionTable);

$timeSeries->AddAttribute("caption", "{ 
											text: 'Apple Inc. Stock Price'
										  }");

$timeSeries->AddAttribute("yAxis", "[{
												  plot: {
													value: {
													  open: 'Open',
													  high: 'High',
													  low: 'Low',
													  close: 'Close'
													},
													type: 'candlestick'
												  },
												  format: {
													prefix: '$'
												  },
												  title: 'Stock Value'
												}]");

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
