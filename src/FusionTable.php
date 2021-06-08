<?php

namespace FusionCharts\PhpWrapper;

use ReflectionClass;

class FusionTable
{
    /**
     * @var string
     */
    private $stringData = '';

    /**
     * FusionTable constructor.
     *
     * @param $schema
     * @param $data
     */
    function __construct($schema, $data)
    {
        $this->stringData .= "let schema = " . $schema . ";\r\n";
        $this->stringData .= "let data = " . $data . ";\r\n";
        $this->stringData .= "let fusionDataStore = new FusionCharts.DataStore();\r\n";
        $this->stringData .= "let fusionTable = fusionDataStore.createDataTable(data, schema);\r\n";
    }

    /**
     * @param ...$columnName
     */
    function Select(...$columnName)
    {
        if (count($columnName) > 0) {
            $selectData = sprintf("'%s'", implode("','", $columnName));
            $this->stringData .= "fusionTable = fusionTable.query(FusionCharts.DataStore.Operators.select([" . $selectData . "]));" . "\r\n";
        }
    }

    /**
     * @param $columnName
     * @param $columnOrderBy
     */
    function Sort($columnName, $columnOrderBy)
    {
        $sortData = sprintf("sort([{column: '%s', order: '%s'}])", $columnName, (OrderBy::ASC === $columnOrderBy) ? "asc" : "desc");
        $this->stringData .= "fusionTable = fusionTable.query(" . $sortData . ");" . "\r\n";
    }

    /**
     * @param $filterType
     * @param $columnName
     * @param ...$values
     * @return string
     */
    function CreateFilter($filterType, $columnName, ...$values)
    {
        $filterData = '';

        if (count($values) > 0) {

            $reflection = new ReflectionClass('FilterType');
            $constants = $reflection->getConstants();
            $constName = null;

            foreach ($constants as $name => $value) {
                if ($value == $filterType) {
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
                        if (count($values) > 1) {
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

    /**
     * @param $filter
     */
    function ApplyFilter($filter)
    {
        if (strlen($filter) > 0) {
            $this->stringData .= "fusionTable = fusionTable.query(" . $filter . ");" . "\r\n";
        }
    }

    /**
     * @param $filter
     */
    function ApplyFilterByCondition($filter)
    {
        if (strlen($filter) > 0) {
            $this->stringData .= "fusionTable = fusionTable.query(" . $filter . ");" . "\r\n";
        }
    }

    /**
     * @param ...$filters
     */
    function Pipe(...$filters)
    {
        $filterData = '';
        if (count($filters) > 0) {
            $filterData = sprintf("%s", implode(",", $filters));
            $this->stringData .= "fusionTable = fusionTable.query(FusionCharts.DataStore.Operators.pipe(" . $filterData . "));" . "\r\n";
        }
    }

    /**
     * @return string
     */
    function GetDataTable()
    {
        return $this->stringData;
    }
}
