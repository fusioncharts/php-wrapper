<?php
    $hostdb = "127.0.0.1";  // MySQl host
    $userdb = "root";  // MySQL username
    $passdb = "password";  // MySQL password
    $namedb = "drilldowndb";  // MySQL database name
    
    // Establish a connection to the database
    $dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
    
    /*Render an error message, to avoid abrupt failure, if the database connection parameters are incorrect */
    if ($dbhandle->connect_error) {
      exit("There was an error with your connection: ".$dbhandle->connect_error);
    }
    
    // Drilldown column order
    $columnLevels = ["Region", "Country", "City"];
    $maxDrill = sizeof($columnLevels);

    // Get drilldown parameters
    $columnClickedUpon = $_GET["label"];
    $drillDownLevel = $_GET["drillLevel"];

    if ($drillDownLevel == null) {
        $drillDownLevel = "0";
        #echo "drillDown before 1: $drillDownLevel";
        $data = GetDBData($columnLevels[(int)$drillDownLevel], null, null, $dbhandle, "0", $maxDrill);
    } else {
        $iDrillDownLevel = (int)$drillDownLevel + 1;
        $drillDownLevel = (string)$iDrillDownLevel;
        #echo "drillDown before 2: $drillDownLevel";
        $data = GetDBData($columnLevels[$iDrillDownLevel], $columnClickedUpon, $columnLevels[$iDrillDownLevel - 1], $dbhandle, $drillDownLevel, $maxDrill);
    }

    $iDrillDownLevel = (int)$drillDownLevel;



    function GetDBData($columnName, $parentValue, $parentName, $dbhandle, $drillDownLevel, $maxDrill) {
        
        #echo "DrillDownLevel after: $drillDownLevel";

        $chartConfigObj = array ( "chart" =>  
                            array( 
                                "caption" => "Sales by $columnName",
                                "xAxisName" => $columnName,
                                "yAxisName" => "Total Sales", 
                                "numberSuffix" => "K", 
                                "theme" => "fusion"
                            )
                        );

        if ($parentValue == null) {
            $strQuery = "SELECT $columnName, SUM(`Total Sales`) as TotalSales FROM sales_record GROUP BY $columnName";
        } else {
            $strQuery = "SELECT $columnName, SUM(`Total Sales`) as TotalSales FROM sales_record WHERE $parentName = '$parentValue' GROUP BY $columnName";
        }

        $labelValueArray = array();

        $result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
        if ($result) {
            while($row = mysqli_fetch_array($result)) {
                $label = $row[$columnName];                
                if (((int)$drillDownLevel) <  $maxDrill - 1) {
                    array_push($labelValueArray, 
                        array(
                            "label" => "$label",
                            "value" => $row["TotalSales"],
                            "link" => "newchart-jsonurl-drilldown-data-handler.php?label=$label&drillLevel=$drillDownLevel"
                        )
                    );
                } else {
                    array_push($labelValueArray, 
                        array(
                            "label" => "$label",
                            "value" => $row["TotalSales"]
                        )
                    );
                }
            }
        };


        $chartConfigObj["data"] = $labelValueArray;

        $jsonEncodedData = json_encode($chartConfigObj);

        echo $jsonEncodedData;
    }
?>