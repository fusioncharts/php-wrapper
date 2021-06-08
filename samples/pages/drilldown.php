<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

//chart object
$chart = new FusionCharts("column2d", "MyDrillDownChart", "600", "350", "chart-container", "jsonurl", "drilldown-data-handler.php");

//render the chart
$chart->render();
