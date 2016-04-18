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
    * This example describes the gnatt chart creation using FusionCharts PHP wrapper
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
	$ganttChart = new FusionCharts("gantt", "ex1" , "100%", "200", "chart-1", "json", '{
        "chart": {
          "caption": "Acme Industries - Mailer campaign launch",
          "subcaption": "Typical steps involved",
          "dateformat": "mm/dd/yyyy",
          "theme": "fint",
          "canvasBorderAlpha": "40",
          "showcanvasborder": "1",
          "plottooltext": "<div>Start Date : <b>$start</b><br/>End Date : <b>$end</b></div>"
        },
        "categories": [{
          "category": [{
            "start": "08/01/2015",
            "end": "08/31/2015",
            "label": "Aug \'15"
          }, {
            "start": "09/01/2015",
            "end": "09/30/2015",
            "label": "Sep \'15"
          }, {
            "start": "10/01/2015",
            "end": "10/31/2015",
            "label": "Oct \'15"
          }, {
            "start": "11/01/2015",
            "end": "11/30/2015",
            "label": "Nov \'15"
          }, {
            "start": "12/01/2015",
            "end": "12/31/2015",
            "label": "Dec \'15"
          }, {
            "start": "01/01/2016",
            "end": "01/31/2016",
            "label": "Jan \'16"
          }, {
            "start": "02/01/2016",
            "end": "02/28/2016",
            "label": "Feb \'16"
          }, {
            "start": "03/01/2016",
            "end": "03/31/2016",
            "label": "Mar \'16"
          }]
        }],
        "processes": {
          "fontsize": "12",
          "isbold": "1",
          "align": "right",
          "process": [{
            "label": "Identify Customers"
          }, {
            "label": "Survey 500 Customers"
          }, {
            "label": "Interpret Requirements"
          }, {
            "label": "Market Analysis"
          }, {
            "label": "Brainstorm concepts"
          }, {
            "label": "Define Ad Requirements"
          }, {
            "label": "Design & Develop"
          }, {
            "label": "Mock test"
          }, {
            "label": "Documentation"
          }, {
            "label": "Start Campaign"
          }]
        },
        "tasks": {
          "task": [{
            "start": "08/04/2015",
            "end": "08/10/2015"
          }, {
            "start": "08/08/2015",
            "end": "08/19/2015"
          }, {
            "start": "08/19/2015",
            "end": "09/02/2015"
          }, {
            "start": "08/24/2015",
            "end": "09/02/2015"
          }, {
            "start": "09/02/2015",
            "end": "09/21/2015"
          }, {
            "start": "09/21/2015",
            "end": "10/06/2015"
          }, {
            "start": "10/06/2015",
            "end": "01/21/2016"
          }, {
            "start": "01/21/2016",
            "end": "02/19/2016"
          }, {
            "start": "01/28/2016",
            "end": "02/24/2016"
          }, {
            "start": "02/24/2016",
            "end": "03/27/2016"
          }]
        }

      }');

	// Render the chart
	$ganttChart->render();
?>
<div class="live-chart-wrapper">
<span id="chart-1" class="chart" ><!-- Fusion Charts will render here--></span>

</div>

</body>
</html>


