<!DOCTYPE html>
<html>
<head>
<link href="css/extension-page-style.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<style>

.code-block-holder pre {
      max-height: 188px;  
      min-height: 188px; 
      overflow: auto;
      border: 1px solid #ccc;
      border-radius: 5px;
}


.tab-btn-holder {
	width: 100%;
	margin: 20px 0 0;
	border-bottom: 1px solid #dfe3e4;
	min-height: 30px;
}

.tab-btn-holder a {
	background-color: #fff;
	font-size: 14px;
	text-transform: uppercase;
	color: #006bb8;
	text-decoration: none;
	display: inline-block;
	*zoom:1; *display:inline;


}

.tab-btn-holder a.active {
	color: #858585;
    padding: 9px 10px 8px;
    border: 1px solid #dfe3e4;
    border-bottom: 1px solid #fff;
    margin-bottom: -1px;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    position: relative;
    z-index: 300;
}

</style>

</head>
<body>
<?php

/**
* This example describes the X-Y chart preparation using FusionCharts PHP wrapper
*/


// Including the wrapper file in the page
include("../src/fusioncharts.php");

// Preparing the object of FusionCharts with needed informations
    /**
    * The parameters of the constructor are as follows
    * chartType   {String}  The type of chart that you intend to plot. e.g. Column3D, Column2D, Pie2D etc.
    * chartId     {String}  Id for the chart, using which it will be recognized in the HTML page. Each chart on the page should have a unique Id.
    * chartWidth  {String}  Intended width for the chart (in pixels). e.g. 400
    * chartHeight {String}  Intended height for the chart (in pixels). e.g. 300
    * containerId {String}  The id of the chart container. e.g. chart-1
    * dataFormat  {String}  Type of data used to render the chart. e.g. json, jsonurl, xml, xmlurl
    * dataSource  {String}  Actual data for the chart. e.g. {"chart":{},"data":[{"label":"Jan","value":"420000"}]}
    */
$columnChart = new FusionCharts("scatter", "ex1" , "100%", 400, "chart-1", "json", '{
      "chart": {
        "theme": "fint",
        "caption": "Sales of Beer & Ice-cream vs Temperature",
        "subCaption": "Los Angeles Topanga",
        "xAxisName": "Average Day Temperature",
        "xAxisMinValue": "23",
        "xAxisMaxValue": "95",
        "yNumberPrefix": "$",
        "xNumberSuffix": "&deg; F",
        "theme": "fint",
        "xAxisNamePadding": "-5",
        "legendpadding": "0",
        "plotToolText": "<div><b>$seriesname</b><br/>Temperature : <b>$xValue&deg; F</b><br/>Sales : <b>$$yValue</b></div>"
      },
      "categories": [{
        "category": [{
          "x": "23",
          "label": "23\xB0 F",
          "showverticalline": "0"
        }, {
          "x": "32",
          "label": "32\xB0 F",
          "showverticalline": "1"
        }, {
          "x": "50",
          "label": "50\xB0 F",
          "showverticalline": "1"
        }, {
          "x": "68",
          "label": "68\xB0 F",
          "showverticalline": "1"
        }, {
          "x": "80",
          "label": "80\xB0 F",
          "showverticalline": "1"
        }, {
          "x": "95",
          "label": "95\xB0 F",
          "showverticalline": "1"
        }]
      }],
      "dataset": [{
        "seriesname": "Ice Cream",
        //Showing regression line for this dataset
        "showregressionline": "1",
        "data": [{
          "x": "23",
          "y": "1560"
        }, {
          "x": "24",
          "y": "1500"
        }, {
          "x": "24",
          "y": "1680"
        }, {
          "x": "25",
          "y": "1780"
        }, {
          "x": "25",
          "y": "1620"
        }, {
          "x": "26",
          "y": "1810"
        }, {
          "x": "27",
          "y": "2310"
        }, {
          "x": "29",
          "y": "2620"
        }, {
          "x": "31",
          "y": "2500"
        }, {
          "x": "32",
          "y": "2410"
        }, {
          "x": "35",
          "y": "2880"
        }, {
          "x": "36",
          "y": "3910"
        }, {
          "x": "34",
          "y": "3960"
        }, {
          "x": "38",
          "y": "4080"
        }, {
          "x": "40",
          "y": "4190"
        }, {
          "x": "41",
          "y": "4170"
        }, {
          "x": "42",
          "y": "4280"
        }, {
          "x": "54",
          "y": "5180"
        }, {
          "x": "53",
          "y": "5770"
        }, {
          "x": "55",
          "y": "5900"
        }, {
          "x": "56",
          "y": "5940"
        }, {
          "x": "58",
          "y": "6090"
        }, {
          "x": "61",
          "y": "6086"
        }, {
          "x": "67",
          "y": "6100"
        }, {
          "x": "68",
          "y": "6200"
        }, {
          "x": "70",
          "y": "6360"
        }, {
          "x": "75",
          "y": "6450"
        }, {
          "x": "79",
          "y": "6650"
        }, {
          "x": "80",
          "y": "6710"
        }, {
          "x": "79",
          "y": "6975"
        }, {
          "x": "82",
          "y": "7000"
        }, {
          "x": "85",
          "y": "7150"
        }, {
          "x": "86",
          "y": "7160"
        }, {
          "x": "86",
          "y": "7200"
        }, {
          "x": "88",
          "y": "7230"
        }, {
          "x": "87",
          "y": "7210"
        }, {
          "x": "86",
          "y": "7480"
        }, {
          "x": "89",
          "y": "7540"
        }, {
          "x": "89",
          "y": "7400"
        }, {
          "x": "90",
          "y": "7500"
        }, {
          "x": "92",
          "y": "7640"
        }]
      }, {
        "seriesname": "Beer",
        "showregressionline": "1",
        "data": [{
          "x": "23",
          "y": "3160"
        }, {
          "x": "24",
          "y": "3000"
        }, {
          "x": "24",
          "y": "3080"
        }, {
          "x": "25",
          "y": "3680"
        }, {
          "x": "25",
          "y": "3320"
        }, {
          "x": "26",
          "y": "3810"
        }, {
          "x": "27",
          "y": "5310"
        }, {
          "x": "29",
          "y": "3620"
        }, {
          "x": "31",
          "y": "4100"
        }, {
          "x": "32",
          "y": "3910"
        }, {
          "x": "35",
          "y": "4280"
        }, {
          "x": "36",
          "y": "4210"
        }, {
          "x": "34",
          "y": "4160"
        }, {
          "x": "38",
          "y": "4480"
        }, {
          "x": "40",
          "y": "4890"
        }, {
          "x": "41",
          "y": "4770"
        }, {
          "x": "42",
          "y": "4880"
        }, {
          "x": "54",
          "y": "4980"
        }, {
          "x": "53",
          "y": "4770"
        }, {
          "x": "55",
          "y": "4900"
        }, {
          "x": "56",
          "y": "4940"
        }, {
          "x": "58",
          "y": "4990"
        }, {
          "x": "61",
          "y": "5086"
        }, {
          "x": "67",
          "y": "5100"
        }, {
          "x": "68",
          "y": "4700"
        }, {
          "x": "70",
          "y": "5360"
        }, {
          "x": "75",
          "y": "5150"
        }, {
          "x": "79",
          "y": "5450"
        }, {
          "x": "80",
          "y": "5010"
        }, {
          "x": "79",
          "y": "4975"
        }, {
          "x": "82",
          "y": "5400"
        }, {
          "x": "85",
          "y": "5150"
        }, {
          "x": "86",
          "y": "5460"
        }, {
          "x": "86",
          "y": "5000"
        }, {
          "x": "88",
          "y": "5200"
        }, {
          "x": "87",
          "y": "5410"
        }, {
          "x": "86",
          "y": "5480"
        }, {
          "x": "89",
          "y": "5440"
        }, {
          "x": "89",
          "y": "5300"
        }, {
          "x": "90",
          "y": "5500"
        }, {
          "x": "92",
          "y": "5240"
        }]
      }],
      "vtrendlines": [{
        "line": [{
          "startvalue": "23",
          "endvalue": "32",
          "istrendzone": "1",
          "displayvalue": " ",
          "color": "#adebff",
          "alpha": "25"
        }, {
          "startvalue": "23",
          "endvalue": "32",
          "istrendzone": "1",
          "alpha": "0",
          "displayvalue": "Very cold"
        }, {
          "startvalue": "32",
          "endvalue": "50",
          "istrendzone": "1",
          "displayvalue": " ",
          "color": "#adebff",
          "alpha": "15"
        }, {
          "startvalue": "32",
          "endvalue": "50",
          "istrendzone": "1",
          "alpha": "0",
          "displayvalue": "Cold"
        }, {
          "startvalue": "50",
          "endvalue": "68",
          "istrendzone": "1",
          "alpha": "0",
          "displayvalue": "Moderate"
        }, {
          "startvalue": "68",
          "endvalue": "80",
          "istrendzone": "1",
          "alpha": "0",
          "displayvalue": "Hot"
        }, {
          "startvalue": "68",
          "endvalue": "80",
          "istrendzone": "1",
          "displayvalue": " ",
          "color": "#f2a485",
          "alpha": "15"
        }, {
          "startvalue": "80",
          "endvalue": "95",
          "istrendzone": "1",
          "alpha": "0",
          "displayvalue": "Very hot"
        }, {
          "startvalue": "80",
          "endvalue": "95",
          "istrendzone": "1",
          "displayvalue": " ",
          "color": "#f2a485",
          "alpha": "25"
        }]
      }]
    }');
// Render the chart
$columnChart->render();
?>
<div id="chart-1"><!-- Fusion Charts will render here--></div>
 
</body>
</html>