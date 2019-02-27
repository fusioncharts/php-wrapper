<?php

    class FusionCharts {
        
        private $eventOptions = array();
        private $constructorOptions = array();

        private $baseTemplate = '
            <script type="text/javascript">
                FusionCharts.ready(function () {
                    __FT__
                    __FC__
                });
            </script>';

        private $constructorTemplate = 'new FusionCharts(__constructorOptions__);';
        private $renderTemplate = 'FusionCharts("__chartId__").render();';
        private $eventTemplate = 'FusionCharts("__chartId__").addEventListener("_fceventname_",_fceventbody_);';

        // constructor
        function __construct($type, $id, $width = 400, $height = 300, $renderAt, $dataFormat= null, $dataSource) {
            isset($type) ? $this->constructorOptions['type'] = $type : '';
            isset($id) ? $this->constructorOptions['id'] = $id : 'php-fc-'.time();
            isset($width) ? $this->constructorOptions['width'] = $width : '';
            isset($height) ? $this->constructorOptions['height'] = $height : '';
            isset($renderAt) ? $this->constructorOptions['renderAt'] = $renderAt : '';
            isset($dataFormat) ? $this->constructorOptions['dataFormat'] = $dataFormat : '';
            isset($dataSource) ? $this->constructorOptions['dataSource'] = $dataSource : '';
        }

        //Add event
        function addEvent($eventName, $funcName){
            isset($eventName) ? $this->eventOptions[$eventName] = $funcName : '';
        }

        //Add message
        function addMessage($messageName, $messageValue){
            isset($messageName) ? $this->constructorOptions[$messageName] = $messageValue : '';
        }

        // render the chart created
        // It prints a script and calls the FusionCharts javascript render method of created chart
        function render() {

            $timeSeries = null;
            $tempArray = array();
            foreach($this->constructorOptions as $key => $value) {
                if ($key === 'dataSource') {
                    $tempArray['dataSource'] = '__dataSource__';
                } else {
                    $tempArray[$key] = $value;
                }
            }

            $jsonEncodedOptions = json_encode($tempArray);

            if (is_object($this->constructorOptions['dataSource']))
            {                
                if (get_class($this->constructorOptions['dataSource']) === 'TimeSeries'){
                    $timeSeries = $this->constructorOptions['dataSource'];
                }
            } else {

                $dataFormat = $this->constructorOptions['dataFormat'];

                if ($dataFormat === 'json') {
                    $jsonEncodedOptions = preg_replace('/\"__dataSource__\"/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
                } elseif ($dataFormat === 'xml') { 
                    $jsonEncodedOptions = preg_replace('/\"__dataSource__\"/', '\'__dataSource__\'', $jsonEncodedOptions);
                    $jsonEncodedOptions = preg_replace('/__dataSource__/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
                } elseif ($dataFormat === 'xmlurl') {
                    $jsonEncodedOptions = preg_replace('/__dataSource__/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
                } elseif ($dataFormat === 'jsonurl') {
                    $jsonEncodedOptions = preg_replace('/__dataSource__/', $this->constructorOptions['dataSource'], $jsonEncodedOptions);
                }            
            }

            $tempData = preg_replace('/__constructorOptions__/', $jsonEncodedOptions, $this->constructorTemplate);
            foreach($this->eventOptions as $key => $value) {
                $tempEvtTmp = preg_replace('/__chartId__/', $this->constructorOptions['id'], $this->eventTemplate);
                $tempEvtTmp = preg_replace('/_fceventname_/', $key, $tempEvtTmp);
                $tempEvtTmp = preg_replace('/_fceventbody_/', $value, $tempEvtTmp);       
                $tempData .= $tempEvtTmp;
            }
            $tempData .= preg_replace('/__chartId__/', $this->constructorOptions['id'], $this->renderTemplate);
            $renderHTML = preg_replace('/__FC__/', $tempData, $this->baseTemplate);            

            if ($timeSeries){
                $renderHTML = preg_replace('/__FT__/', $timeSeries->GetDataStore(), $renderHTML);
                $renderHTML = preg_replace('/\"__dataSource__\"/', $timeSeries->GetDataSource(), $renderHTML); 
            }else{
                $renderHTML = preg_replace('/__FT__/', '', $renderHTML);
            }

            echo $renderHTML;
        }

    }

    class TimeSeries {
        
        private $fusionTableObject = null;
        private $attributesList = array();

        function __construct($fusionTable) {
            $this->fusionTableObject = $fusionTable;
        }

        function AddAttribute($key, $value){
            $attribute = array();
            $attribute[$key] = $value;
            array_push($this->attributesList, $attribute);
        }

        function GetDataSource(){
            $stringData = '';
            $format = '%s:%s,';
            foreach ($this->attributesList as $attribute) {
                $attribKey = key($attribute);                                
                $stringData .= sprintf($format, $attribKey, $attribute[$attribKey]) . "\r\n";
            }            
            $stringData .= sprintf('%s:%s', 'data', 'fusionTable');
            
            return "{" . "\r\n" . $stringData . "\r\n" . "}";
        }

        function GetDataStore(){
            return $this->fusionTableObject->GetDataTable();
        }
    }

    abstract class OrderBy {
        const ASC = 0;
        const DESC = 1;
    }

    abstract class FilterType {
        const Equals = 0;
        const Greater = 1;
        const GreaterEquals = 2;
        const Less = 3;
        const LessEquals = 4;
        const Between = 5;
    }

    class FusionTable {
        private $stringData = '';

        function __construct($schema, $data) {
            $this->stringData .="let schema = " . $schema . ";\r\n";
            $this->stringData .="let data = " . $data . ";\r\n";
            $this->stringData .="let fusionDataStore = new FusionCharts.DataStore();\r\n";
            $this->stringData .="let fusionTable = fusionDataStore.createDataTable(data, schema);\r\n";
        }

        function Select(...$columnName) {
            if (count($columnName) > 0 ) {
                $selectData = sprintf("'%s'", implode("','", $columnName));
                $this->stringData .= "fusionTable = fusionTable.query(FusionCharts.DataStore.Operators.select([" . $selectData . "]));". "\r\n";
            }
        }

        function Sort($columnName, $columnOrderBy) {   
            $sortData = sprintf("sort([{column: '%s', order: '%s'}])", $columnName, (OrderBy::ASC === $columnOrderBy) ? "asc" : "desc");
            $this->stringData .= "fusionTable = fusionTable.query(" . $sortData . ");". "\r\n";
        }

        function CreateFilter($filterType, $columnName, ...$values) {
            $filterData = '';            
            if (count($values) > 0 ) {
                $refl = new ReflectionClass('FilterType');
                $constants = $refl->getConstants();
                $constName = null;
                foreach ( $constants as $name => $value )
                {
                    if ( $value == $filterType )
                    {
                        $constName = lcfirst($name);
                        break;
                    }
                }

                if ($constName) {
                    switch ($filterType) {
                        case FilterType::Equals:
                            $filterData = sprintf("FusionCharts.DataStore.Operators.%s('%s','%s')", $constName, $columnName, $values[0]);
                            break;
                        case FilterType::Between:
                            if (count($values) > 1 ) {
                                $filterData = sprintf("FusionCharts.DataStore.Operators.%s('%s',%s,%s)", $constName, $columnName, $values[0], $values[1]);
                            }
                            break;
                        default:
                        $filterData = sprintf("FusionCharts.DataStore.Operators.%s('%s',%s)", $constName, $columnName, $values[0]);
                    }
                }
            }   
            return $filterData;       
        }

        function ApplyFilter($filter) {
            if (strlen($filter)>0){
                $this->stringData .= "fusionTable = fusionTable.query(" . $filter . ");". "\r\n";
            }
        }

        function ApplyFilterByCondition($filter) {
            if (strlen($filter)>0){
                $this->stringData .= "fusionTable = fusionTable.query(" . $filter . ");". "\r\n";
            }
        }

        function Pipe(...$filters) {
            $filterData='';
            if (count($filters) > 0 ) {
                $filterData = sprintf("%s", implode(",", $filters));
                $this->stringData .= "fusionTable = fusionTable.query(FusionCharts.DataStore.Operators.pipe(" . $filterData . "));". "\r\n";
            }
        }

        function GetDataTable() {
            return $this->stringData;
        }
    }
?>
