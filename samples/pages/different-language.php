<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$chartData = "{
                \"chart\": {
                    \"caption\": \"سوبرماركت هاري\",
                    \"subCaption\": \"الإيرادات الشهرية للعام الماضي\",
                    \"xAxisName\": \"الشهر\",
                    \"yAxisName\": \"كمية\",
                    \"numberPrefix\": \"$\",
                    \"theme\": \"fusion\",
                    \"rotateValues\": \"1\",
                    \"exportEnabled\": \"1\"
                },
                \"data\": [
                    {
                        \"label\": \"يناير\",
                        \"value\": \"420000\"
                    },
                    {
                        \"label\": \"فبراير\",
                        \"value\": \"810000\"
                    },
                    {
                        \"label\": \"مارس\",
                        \"value\": \"720000\"
                    },
                    {
                        \"label\": \"أبريل\",
                        \"value\": \"550000\"
                    },
                    {
                        \"label\": \"مايو\",
                        \"value\": \"910000\"
                    },
                    {
                        \"label\": \"يونيو\",
                        \"value\": \"510000\"
                    },
                    {
                        \"label\": \"يوليو\",
                        \"value\": \"680000\"
                    },
                    {
                        \"label\": \"أغسطس\",
                        \"value\": \"620000\"
                    },
                    {
                        \"label\": \"سبتمبر\",
                        \"value\": \"610000\"
                    },
                    {
                        \"label\": \"أكتوبر\",
                        \"value\": \"490000\"
                    },
                    {
                        \"label\": \"نوفمبر\",
                        \"value\": \"900000\"
                    },
                    {
                        \"label\": \"ديسمبر\",
                        \"value\": \"730000\"
                    }
                ]
        }";

//chart object
$chart = new FusionCharts("column2d", "chart-1", "600", "400", "chart-container", "json", $chartData);

//render the chart
$chart->render();
