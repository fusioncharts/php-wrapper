<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$chartData = "{
                    \"chart\": {
                      \"caption\": \"Recommended Portfolio Split\",
                      \"subCaption\" : \"For a net-worth of $1M\",
                      \"showValues\":\"1\",
                      \"showPercentInTooltip\" : \"0\",
                      \"numberPrefix\" : \"$\",
                      \"enableMultiSlicing\":\"1\",
                      \"theme\": \"fusion\"
                    },
                    \"data\": [{
                      \"label\": \"Equity\",
                      \"value\": \"300000\"
                    }, {
                      \"label\": \"Debt\",
                      \"value\": \"230000\"
                    }, {
                      \"label\": \"Bullion\",
                      \"value\": \"180000\"
                    }, {
                      \"label\": \"Real-estate\",
                      \"value\": \"270000\"
                    }, {
                      \"label\": \"Insurance\",
                      \"value\": \"20000\"
                    }]
                  }";

//chart object
$chart = new FusionCharts("pie3d", "chart-1", "600", "400", "chart-container", "json", $chartData);

//render the chart
$chart->render();
