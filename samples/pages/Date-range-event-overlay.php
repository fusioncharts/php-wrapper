<?php

use FusionCharts\PhpWrapper\FusionCharts;
use FusionCharts\PhpWrapper\FusionTable;
use FusionCharts\PhpWrapper\TimeSeries;

require __DIR__ . '/../../vendor/autoload.php';

$data = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/data/date-range-event-overlay-data.json');
$schema = file_get_contents('https://s3.eu-central-1.amazonaws.com/fusion.store/ft/schema/date-range-event-overlay-schema.json');

$fusionTable = new FusionTable($schema, $data);
$timeSeries = new TimeSeries($fusionTable);

$timeSeries->AddAttribute("caption", "{ 
								text: 'Interest Rate Analysis'
							  }");

$timeSeries->AddAttribute("subCaption", "{ 
                                text: 'Federal Reserve (USA)'
                              }");

$timeSeries->AddAttribute("yAxis", "[{
                              plot: 'Interest Rate',
                              format:{
                                suffix: '%'
                              },
                              title: 'Interest Rate'
                            }]");

$timeSeries->AddAttribute("xAxis", "{
                              plot: 'Time',
                              timemarker: [{
                                start: 'Jul-1981',
                                end: 'Nov-1982',
                                label: 'Economic downturn was triggered by {br} tight monetary policy in an effort to {br} fight mounting inflation.',
                                timeFormat: '%b-%Y'
                              }, {
                                start: 'Jul-1990',
                                end: 'Mar-1991',
                                label: 'This eight month recession period {br} was characterized by a sluggish employment recovery, {br} most commonly referred to as a jobless recovery.',
                                timeFormat: '%b-%Y'
                              }, {
                                start: 'Jun-2004',
                                end: 'Jul-2006',
                                label: 'The Fed after raising interest rates {br} at 17 consecutive meetings, ends its campaign {br} to slow the economy and forestall inflation.',
                                timeFormat: '%b-%Y'
                              }, {
                                start: 'Dec-2007',
                                end: 'Jun-2009',
                                label: 'Recession caused by the worst {br} collapse of financial system in recent {br} times.',
                                timeFormat: '%b-%Y'
                              }]
                            }");

//chart object
$chart = new FusionCharts("timeseries", "MyFirstChart", "700", "450", "chart-container", "json", $timeSeries);

//render the chart
$chart->render();
