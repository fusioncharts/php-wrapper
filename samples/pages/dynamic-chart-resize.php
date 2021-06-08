<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$mapData = "{
                    \"chart\":
                    {  
                        \"caption\": \"Countries With Most Oil Reserves [2017-18]\",
                        \"subcaption\": \"In MMbbl = One Million barrels\",
                        \"xaxisname\": \"Country\",
                        \"yaxisname\": \"Reserves (MMbbl)\",
                        \"numbersuffix\": \"K\",
                        \"theme\": \"fusion\"
                        },
                        \"data\": [{
                        \"label\": \"Venezuela\",
                        \"value\": \"290\"
                    }, {
                        \"label\": \"Saudi\",
                        \"value\": \"260\"
                    }, {
                        \"label\": \"Canada\",
                        \"value\": \"180\"
                    }, {
                        \"label\": \"Iran\",
                        \"value\": \"140\"
                    }, {
                        \"label\": \"Russia\",
                        \"value\": \"115\"
                    }, {
                        \"label\": \"UAE\",
                        \"value\": \"100\"
                    }, {
                        \"label\": \"US\",
                        \"value\": \"30\"
                    }, {
                        \"label\": \"China\",
                        \"value\": \"30\"
                    }]
                  }";

//chart object
$chart = new FusionCharts("column2d", "chart-1", "100%", "100%", "chartContainer", "json", $mapData);

//render the chart
$chart->render();
