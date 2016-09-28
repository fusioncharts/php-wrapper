<?php

/* Include the `fusioncharts.php` file that contains functions	to embed the charts. */

include("../src/fusioncharts.php");

/* The following 4 code lines contain the database connection information. Alternatively, you can 
move these code lines to a separate file and include the file here. You can also modify 
this code based on your database connection. */

   $hostdb = "localhost:3309";  // MySQl host
   $userdb = "root";  // MySQL username
   $passdb = "";  // MySQL password
   $namedb = "dummy_database";  // MySQL database name

   // Establish a connection to the database
   $dbhandle = mysqli_connect($hostdb, $userdb, $passdb, $namedb);

   /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
   if (!$dbhandle) {
  	exit("There was an error with your connection: ".mysqli_connect_error());
   }
?>

<html>
   <head>
  	<title>FusionCharts XT - Column 2D Chart - Data from a database</title>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/fusioncharts.js"></script>
    <script type="text/javascript" src="http://static.fusioncharts.com/code/latest/themes/fusioncharts.theme.fint.js?cacheBust=56"></script>	
  </head>

   <body>
  	<?php

     	// Form the SQL query that returns the top 10 most populous countries
     	$strQuery = "SELECT * FROM `MOCK_DATA` ORDER BY `MOCK_DATA`.`id` ASC";

     	// Execute the query, or else return the error message.
     	$result = mysqli_query($dbhandle,$strQuery);

     	// If the query returns a valid response, prepare the JSON string
     	if ($result) {
      	// The `$arrData` array holds the chart attributes and data
      	$arrData = array(
    	    "chart" => array(
              "caption"=>"Revenues and Profits",
              "subCaption"=>"For last year",
              "xAxisname"=>"Month",
              "pYAxisName"=>"Amount (In USD)",
              "sYAxisName"=>"Profit %",
              "numberPrefix"=>"$",
              "sNumberSuffix"=>"%",
              "sYAxisMaxValue"=>"50",
              "numDivLines"=>"3",
              "theme"=>"fint"
          	)
         );

        //prepare categories  
      	$arrData["categories"] = array();
        $category = array();
        // Push the data into the category array
      	while($row = mysqli_fetch_array($result)) {
         	array_push($category, array(
          	"label" => $row["MONTHS"]
          	)
         	);
      	}
        array_push($arrData["categories"], array("category" => $category));

      //prepare dataset
      $arrData["dataset"] = array();
      array_push($arrData["dataset"], buildDataset(array("seriesName"=>"REVENUES"), "REVENUES", $strQuery));
      array_push($arrData["dataset"], buildDataset(array("seriesName"=>"PROFITS","renderAs"=>"area",
        "showValues"=>"0",), "PROFITS", $strQuery));
      array_push($arrData["dataset"], buildDataset(array("seriesName"=>"PROFIT %", "parentYAxis"=>"S",
            "renderAs"=>"line",
            "showValues"=>"0"), "PROFIT_IN_PERCENTAGE", $strQuery));

      //prepare trendline
      $arrData["trendlines"] = array();
      $line = array();
      array_push($line, array("startValue"=>"18833","color"=>"#0075c2","valuePadding"=>"20", "displayvalue"=>"Average{br}Revenue"));
      array_push($line, array("startValue"=>"21","parentYAxis"=>"s","color"=>"#f2c500","displayvalue"=>"Average{br}Profit %"));
      array_push($arrData["trendlines"], array("line" => $line));
    
      //JSON Encode the data to retrieve the string containing the JSON representation of the data in the array.
    	$jsonEncodedData = json_encode($arrData);

      /*Create an object for the mscombi chart using the FusionCharts PHP class constructor. Syntax for the constructor is ` FusionCharts("type of chart", "unique chart id", width of the chart, height of the chart, "div id to render the chart", "data format", "data source")`. Because we are using JSON data to render the chart, the data format will be `json`. The variable `$jsonEncodeData` holds all the JSON data for the chart, and will be passed as the value for the data source parameter of the constructor.*/
      $mscombidy2dChart = new FusionCharts("mscombidy2d", "myFirstChart" , 600, 300, "chart-1", "json", $jsonEncodedData);
      // Render the chart
      $mscombidy2dChart->render();
      // Close the database connection
      $dbhandle->close();
    }

    function buildDataset($data, $dataColumName, $sqlquery) {
      $resultset = mysqli_query($GLOBALS['dbhandle'], $sqlquery);
      $datasetinner = $data;
      $makedata = array();

      while($row = mysqli_fetch_array($resultset)) {
        array_push($makedata, array(
          "value" => $row[$dataColumName]
        ));
      }         
      $datasetinner["data"] = $makedata;
      return $datasetinner;
    }
           
  	?>

  	<div id="chart-1"><!-- Fusion Charts will render here--></div>
   </body>
</html>