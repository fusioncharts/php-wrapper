<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$gaugeData = "{
                    \"chart\": { 
                        \"caption\": \"Customer Satisfaction Score\", 
                        \"subcaption\": \"Los Angeles Topanga\", 
                        \"plotToolText\": \"Current Score: \$value\", 
                        \"theme\": \"fint\", 
                        \"chartBottomMargin\": \"50\", 
                        \"showValue\": \"1\" 
                    }, 
                    \"colorRange\": { 
                        \"color\": [{ 
                            \"minValue\": \"0\", 
                            \"maxValue\": \"45\", 
                            \"code\": \"#e44a00\"
                        }, { 
                            \"minValue\": \"45\", 
                            \"maxValue\": \"75\", 
                            \"code\": \"#f8bd19\" 
                        }, { 
                            \"minValue\": \"75\", 
                            \"maxValue\": \"100\", 
                            \"code\": \"#6baa01\" 
                        }] 
                    }, 
                    \"dials\": { 
                        \"dial\": [{ 
                            \"value\": \"70\", 
                            \"id\": \"dial1\" 
                        }] 
                    }
                }";

//chart object
$chart = new FusionCharts("angulargauge", "angulargauge-1", "450", "270", "angulargauge-container", "json", $gaugeData);

//render the chart
$chart->render();
