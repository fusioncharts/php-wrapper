<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$chartData = "{  
            \"chart\": 
            { 
                \"caption\": \"Market Share of Web Servers\",
                \"plottooltext\": \"<b>\$percentValue</b> of web servers run on \$label servers\",
                \"showLegend\": \"0\",
                \"enableMultiSlicing\": \"0\",
                \"showPercentValues\": \"1\",
                \"legendPosition\": \"bottom\",
                \"useDataPlotColorForLabels\": \"1\",
                \"theme\": \"fusion\"
            },
            \"data\": [{ 
                    \"label\": \"Apache\",
                    \"value\": \"32647479\"
                }, { 
                    \"label\": \"Microsoft\", 
                    \"value\": \"22100932\" 
                }, { 
                    \"label\": \"Zeus\", 
                    \"value\": \"14376\" 
                }, { 
                    \"label\": \"Other\",
                    \"value\": \"18674221\" 
            }]
       }";

//chart object
$chart = new FusionCharts("pie2d", "chart-1", "700", "400", "chart-container", "json", $chartData);

//attach message with message string.
$chart->addEvent("dataplotClick", "plotClickHandler");

//render the chart
$chart->render();
