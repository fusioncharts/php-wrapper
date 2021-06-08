<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$arrChartConfig = [
    "chart" => [
        "caption"      => "Countries With Most Oil Reserves [2017-18]",
        "subCaption"   => "In MMbbl = One Million barrels",
        "xAxisName"    => "Country",
        "yAxisName"    => "Reserves (MMbbl)",
        "numberSuffix" => "K",
        "theme"        => "fusion",
    ],
];

//an array of hash objects which stores data
$arrChartData = [
    ["Venezuela", "290"],
    ["Saudi", "260"],
    ["Canada", "180"],
    ["Iran", "140"],
    ["Russia", "115"],
    ["UAE", "100"],
    ["US", "30"],
    ["China", "30"],
];

$arrLabelValueData = [];

//pushing labels and values
for ($i = 0; $i < count($arrChartData); $i++) {
    array_push($arrLabelValueData, [
        "label" => $arrChartData[$i][0], "value" => $arrChartData[$i][1],
    ]);
}

$arrChartConfig["data"] = $arrLabelValueData;

//JSON encode the data to retrieve the string containing the JSON representation of the data in the array.
$jsonEncodedData = json_encode($arrChartConfig);

//chart object
$chart = new FusionCharts("column2d", "MyFirstChart", "600", "350", "chart-container", "json", $jsonEncodedData);

//render the chart
$chart->render();
