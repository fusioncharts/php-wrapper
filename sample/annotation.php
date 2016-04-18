<!DOCTYPE html>
<html>
<head>
<link href="css/extension-page-style.css" rel="stylesheet" type="text/css"  />
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
<script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.widgets.js"></script>

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
    * This example describes the annotation of FusionChart using the PHP wrapper
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
	$annotationChart = new FusionCharts("column2d", "ex1" , "100%", "300", "chart-1", "json", '{
        "chart": {
          "caption": "Top 4 Chocolate Brands Sold",
          "subCaption": "Last Year",
          "yAxisName": "Sales (in USD)",
          "yAxisMaxValue": "120000",
          "showXAxisLine": "0",
          "numberPrefix": "$",
          "theme": "fint",
          "PlotfillAlpha": "0",
          "placeValuesInside": "0",
          "rotateValues": "0",
          "valueFontColor": "#333333",
          "showLabels": "0",
          "chartBottomMargin": "20",
          "plotToolText": "<div>Brand : <b>$label</b><br/>Total Revenue : <b>$$value</b></div>",
        },
        "annotations": {
          "autoScale": "1",
          "scaleImages": "1",
          "origW": "400",
          "origH": "300",
          "groups": [{
            "id": "user-images",
            "items": [{
              "id": "butterFinger-icon",
              "type": "image",
              "url": "http://static.fusioncharts.com/sampledata/images/butterFinger.png",
              "x": "$dataset.0.set.0.CenterX - 28",
              "y": "$dataset.0.set.0.STARTY",
              "xScale": "50",
              "toy": "$dataset.0.set.0.ENDY + 2",
            }, {
              "id": "snickrs-user-icon",
              "type": "image",
              "url": "http://static.fusioncharts.com/sampledata/images/snickrs.png",
              "x": "$dataset.0.set.1.CenterX - 25",
              "y": "$dataset.0.set.1.STARTY",
              "xScale": "50",
              "toy": "$dataset.0.set.1.ENDY + 2",
            }, {
              "id": "coffee_crisp-user-icon",
              "type": "image",
              "url": "http://static.fusioncharts.com/sampledata/images/coffee_crisp.png",
              "x": "$dataset.0.set.2.CenterX - 25",
              "y": "$dataset.0.set.2.STARTY",
              "xScale": "50",
              "toy": "$dataset.0.set.2.ENDY + 2",
            }, {
              "id": "100grand-user-icon",
              "type": "image",
              "url": "http://static.fusioncharts.com/sampledata/images/100grand.png",
              "x": "$dataset.0.set.3.CenterX - 25",
              "y": "$dataset.0.set.3.STARTY",
              "xScale": "50",
              "toy": "$dataset.0.set.3.ENDY + 2",
            }]
          }]
        },
        "data": [{
          "label": "Butterfinger",
          "value": "92000"
        }, {
          "label": "Snickers",
          "value": "87000"
        }, {
          "label": "Coffee Crisp",
          "value": "83000"
        }, {
          "label": "100 Grand",
          "value": "80000"
        }]
      }');
	// Render the chart
	$annotationChart->render();
?>
<div class="live-chart-wrapper">
<span id="chart-1" class="chart" style="height:500px"><!-- Fusion Charts will render here--></span>

</div>

</body>
</html>


