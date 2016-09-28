<?php
include("../src/fusioncharts.php");
$hostdb = "localhost";  // MySQl host
$userdb = "root";  // MySQL username
$passdb = "";  // MySQL password
$namedb = "mscombi2d";  // MySQL database name
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
if ($dbhandle->connect_error) {
  exit("There was an error with your connection: ".$dbhandle->connect_error);
}
?>

<html>
   <head>
      <title>FusionCharts | Multi-Series Chart using PHP and MySQL</title>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/fusioncharts.charts.js"></script>
        <script src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js"></script>
   </head>
   <body>

<?php

  $strQuery = "SELECT DISTINCT category, value1, value2, value3 FROM mscombi2ddata; ";
 	$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
  if ($result) {

	$arrData = array(
        "chart" => array(
        	  "caption"=> "Comparison of weekly Visitors",
            "xAxisname"=> "Month",
            "yAxisName"=> "Revenues (In USD)",
            "numberPrefix"=> "$",
            "plotFillAlpha"=> "80",
        	  "showValues"=> "1",
        	  "placeValuesInside"=> "1",
        	  "usePlotGradientColor"=> "0",
        	  "rotateValues"=> "1",
        	  "valueFontColor"=> "#FFFFFF",
        	  "showHoverEffect"=> "1",
            "rotateValues"=> "1",
            "showXAxisLine"=> "1",
            "xAxisLineThickness"=> "1",
            "xAxisLineColor"=> "#999999",
            "showAlternateHGridColor"=> "0",
            "legendBgAlpha"=> "0",
            "legendBorderAlpha"=> "0",
            "legendShadow"=> "0",
            "legendItemFontSize"=> "10",
            "legendItemFontColor"=> "#666666",
            "theme"=> "fint"
          	)
         	);
        	// creating array for categories object

        	$categoryArray=array();
        	$dataseries1=array();
        	$dataseries2=array();
          $dataseries3=array();

          // pushing category array values
        	while($row = mysqli_fetch_array($result)) {
				    array_push($categoryArray, array(
					  "label" => $row["category"]
					)
				);
				array_push($dataseries1, array(
					"value" => $row["value1"]
					)
				);

				array_push($dataseries2, array(
					"value" => $row["value2"]
					)
				);
        array_push($dataseries3, array(
					"value" => $row["value3"]
					)
				);

    	}

    	$arrData["categories"]=array(array("category"=>$categoryArray));
			// creating dataset object
			$arrData["dataset"] = array(array("seriesName"=> "Actual Revenue", "data"=>$dataseries1), array("seriesName"=> "Projected Revenue",  "renderAs"=>"line", "data"=>$dataseries2),array("seriesName"=> "Profit",  "renderAs"=>"area", "data"=>$dataseries3));



      $jsonEncodedData = json_encode($arrData);

			// chart object
      $msChart = new FusionCharts("mscombi2d", "chart1" , "100%", "400", "chart-container", "json", $jsonEncodedData);

      $msChart->render();

      // closing db connection
      $dbhandle->close();

   }

?>

<center>
 <div id="chart-container">Chart will render here!</div></center>
   </body>
</html>
