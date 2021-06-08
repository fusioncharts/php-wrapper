<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

//widget appearance configuration
$arrMapConfig = [
    "chart" => [
        "caption"              => "Average Annual Population Growth",
        "subcaption"           => " 1955-2015",
        "numbersuffix"         => "%",
        "includevalueinlabels" => "1",
        "labelsepchar"         => ": ",
        "entityFillHoverColor" => "#FFF9C4",
        "theme"                => "fusion",
    ],
];

//widget color range data
$colorDataObj = [
    "minvalue" => "0", "code" => "#FFE0B2", "gradient" => "1",
    "color"    => [
        ["minValue" => "0", "maxValue" => "50", "code" => "#F2726F"],
        ["minValue" => "50", "maxValue" => "75", "code" => "#FFC533"],
        ["minValue" => "75", "maxValue" => "100", "code" => "#62B58F"],
    ],
];

//map data array
$mapDataArray = [
    ["NA", ".82", "1"],
    ["SA", "2.04", "1"],
    ["AS", "1.78", "1"],
    ["EU", ".40", "1"],
    ["AF", "2.58", "1"],
    ["AU", "1.30", "1"],
];

$mapData = [];

for ($i = 0; $i < count($mapDataArray); $i++) {
    array_push($mapData, ["id" => $mapDataArray[$i][0], "value" => $mapDataArray[$i][1], "showLabel" => $mapDataArray[$i][2]]);
}

$arrMapConfig["colorRange"] = $colorDataObj;
$arrMapConfig["data"] = $mapData;

//JSON encode the data to retrieve the string containing the JSON representation of the data in the array.
$jsonEncodedData = json_encode($arrMapConfig);

//map object
$Map = new FusionCharts("maps/world", "MyFirstMap", "800", "500", "map-container", "json", $jsonEncodedData);

//render the Map
$Map->render();
