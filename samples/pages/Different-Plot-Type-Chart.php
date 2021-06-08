<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

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

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
