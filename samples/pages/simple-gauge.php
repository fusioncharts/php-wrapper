<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

//widget appearance configuration
$arrChartConfig = [
    "chart" => [
        "caption"      => "Nordstorm's Customer Satisfaction Score for 2017",
        "lowerLimit"   => "0",
        "upperLimit"   => "100",
        "showValue"    => "1",
        "numberSuffix" => "%",
        "theme"        => "fusion",
        "showToolTip"  => "0",
    ],
];

//widget color range data
$colorDataObj = [
    "color" => [
        ["minValue" => "0", "maxValue" => "50", "code" => "#F2726F"],
        ["minValue" => "50", "maxValue" => "75", "code" => "#FFC533"],
        ["minValue" => "75", "maxValue" => "100", "code" => "#62B58F"],
    ],
];

//dial array
$dial = [];

//widget dial data in array format, multiple values can be separated by comma e.g. ["81", "23", "45",...]
$widgetDialDataArray = ["81"];
for ($i = 0; $i < count($widgetDialDataArray); $i++) {
    array_push($dial, ["value" => $widgetDialDataArray[$i]]);
}

$arrChartConfig["colorRange"] = $colorDataObj;
$arrChartConfig["dials"] = ["dial" => $dial];

//JSON encode the data to retrieve the string containing the JSON representation of the data in the array.
$jsonEncodedData = json_encode($arrChartConfig);

//widget object
$Widget = new FusionCharts("angulargauge", "MyFirstWidget", "400", "250", "widget-container", "json", $jsonEncodedData);

//render the Widget
$Widget->render();
