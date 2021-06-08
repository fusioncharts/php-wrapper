<?php

use FusionCharts\PhpWrapper\FusionCharts;

require __DIR__ . '/../../vendor/autoload.php';

$xmlData = "<chart caption=\"Harry&apos;s SuperMart\" subcaption=\"Monthly revenue for last year\" xaxisname=\"Month\" yaxisname=\"Amount\" numberprefix=\"¥\" theme=\"fusion\" rotatevalues=\"1\" exportenabled=\"1\">";
$xmlData .= "<set label=\"Jan\" value=\"420000\" />";
$xmlData .= "<set label=\"Feb\" value=\"810000\" />";
$xmlData .= "<set label=\"Mar\" value=\"720000\" />";
$xmlData .= "<set label=\"Apr\" value=\"550000\" />";
$xmlData .= "<set label=\"May\" value=\"910000\" />";
$xmlData .= "<set label=\"Jun\" value=\"510000\" />";
$xmlData .= "<set label=\"Jul\" value=\"680000\" />";
$xmlData .= "<set label=\"Aug\" value=\"620000\" />";
$xmlData .= "<set label=\"Sep\" value=\"610000\" />";
$xmlData .= "<set label=\"Oct\" value=\"490000\" />";
$xmlData .= "<set label=\"Nov\" value=\"900000\" />";
$xmlData .= "<set label=\"Dec\" value=\"730000\" />";
$xmlData .= "</chart>";

//chart object
$chart = new FusionCharts("column2d", "chart-1", "600", "400", "chart-container", "xml", $xmlData);

//render the chart
$chart->render();
