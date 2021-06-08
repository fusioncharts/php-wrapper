<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

//chart object
$chart = new FusionCharts("column2d", "chart-1", "700", "400", "chart-container", "jsonurl", "data/data.json");

//render the chart
$chart->render();
