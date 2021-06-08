<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

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

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
