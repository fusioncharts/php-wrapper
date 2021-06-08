<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$chartData = "{  
            \"chart\": { 
                \"caption\": \"Server CPU Utilization\", 
                \"subcaption\": \"food.hsm.com\", 
                \"lowerLimit\": \"0\", 
                \"upperLimit\": \"100\", 
                \"numberSuffix\": \"%\", 
                \"valueAbovePointer\": \"0\", 
                \"editmode\":\"1\" 
            }, 
            \"colorRange\": { 
                \"color\": [ 
                    { 
                        \"minValue\": \"0\", 
                        \"maxValue\": \"35\", 
                        \"label\": \"Low\", 
                        \"code\": \"#1aaf5d\"
                    }, { 
                        \"minValue\": \"35\", 
                        \"maxValue\": \"70\", 
                        \"label\": \"Moderate\", 
                        \"code\": \"#f2c500\"
                    }, { 
                        \"minValue\": \"70\",
                        \"maxValue\": \"100\",
                        \"label\": \"High\",
                        \"code\": \"#c02d00\" 
                    } ] 
                }, 
                \"pointers\": 
                { 
                    \"pointer\": [{
                        \"value\": \"72.5\" 
                    }]
                }
       }";

//chart object
$chart = new FusionCharts("hlineargauge", "chart-1", "600", "400", "chart-container", "json", $chartData);

# Attach event with method name
$chart->addEvent("realtimeUpdateComplete", "onUpdate");

//render the chart
$chart->render();
