<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/adding-a-reference-line-data.json');
$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/adding-a-reference-line-schema.json');

$fusionTable = new FusionTable($schema, $data);
$timeSeries = new TimeSeries($fusionTable);

$timeSeries->AddAttribute("caption", "{ 
                            text: 'Temperature readings in Italy'
                          }");

$timeSeries->AddAttribute("yAxis", "[{
                          plot: 'Temperature',
                          title: 'Temperature',
                          format:{
                            suffix: '°C',
                          },
                          referenceLine: [{
                            label: 'Controlled Temperature',
                            value: '10'
                          }]
                        }]");

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
