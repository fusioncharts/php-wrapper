<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$chartData = "{
                \"chart\":
                {  
                    \"caption\": \"Sales by Region\",
                    \"xaxisname\": \"Region\",
                    \"yaxisname\": \"Total Sales\",
                    \"numbersuffix\": \"K\",
                    \"theme\": \"fusion\"
                },
                \"data\": [{
                    \"label\": \"Europe\",
                    \"value\": \"827508\",
                    \"link\": \"j-updateChart-Europe\"
                }, {
                    \"label\": \"North America\",
                    \"value\": \"342947\",
                    \"link\": \"j-updateChart-NA\"
                }, {
                    \"label\": \"South America\",
                    \"value\": \"183881\",
                    \"link\": \"j-updateChart-SA\"
                }]
            }";

$secondChartData = "{
                \"chart\":
                {                      
                }
            }";

//chart object
$chart = new FusionCharts("column2d", "ex1", '600', '400', "chart-1", "json", $chartData);

//second chart object
$secChart = new FusionCharts("column2d", "chartTwo", '600', '400', "chart-2", "json", $secondChartData);

//render the chart
$chart->render();
$secChart->render();
