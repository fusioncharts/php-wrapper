<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$hostdb = "127.0.0.1";  //MySQl host
$userdb = "root";  //MySQL username
$passdb = "password";  //MySQL password
$namedb = "drilldowndb";  //MySQL database name

//establish a connection to the database
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);

/*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
if ($dbhandle->connect_error) {
    exit("There was an error with your connection: " . $dbhandle->connect_error);
}

$strQuery = "SELECT Country, SUM(`Total Sales`) as TotalSales FROM sales_record GROUP BY Country";

$labelValueArray = [];

$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
if ($result) {
    while ($row = mysqli_fetch_array($result)) {
        array_push($labelValueArray,
            [
                "label" => $row["Country"],
                "value" => $row["TotalSales"],
            ]
        );
    }
}

$chartConfigObj = [
    "chart" =>
        [
            "caption"      => "Sales by Country",
            "xAxisName"    => "Country",
            "yAxisName"    => "Total Sales",
            "numberSuffix" => "K",
            "theme"        => "fusion",
        ],
];

$chartConfigObj["data"] = $labelValueArray;

$chartData = json_encode($chartConfigObj);

//chart object
$chart = new FusionCharts("pie3d", "chart-1", "600", "400", "chart-container", "json", $chartData);

//render the chart
$chart->render();
