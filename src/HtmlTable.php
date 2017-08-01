<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 01.08.17
 * Time: 12:48
 */

namespace Niklas\Html;


class HtmlTable
{
    private $mRowData = [];
    private $mStructure;
    private $mWiths = [];

    public function __construct(array $table)
    {
        $this->mStructure = $table;
    }

    public function with(string $key, callable $callback) {
        $this->mWiths[$key] = $callback ;
    }

    public function addRow($rowData) : self {
        $row = [];
        foreach (array_keys($this->mStructure) as $key) {
            if(isset($this->mWiths[$key])) {
                $row[] = $this->mWiths[$key]($rowData);
                continue;
            }
            if(is_object($rowData)) {
                $row[] = $rowData->$key;
            }else if(is_array($rowData)) {
                $row[] = $rowData[$key];
            }else {
                throw new \InvalidArgumentException("Parameter 1 must be a array or object");
            }
        }
        $this->mRowData[] = $row;

        return $this;
    }

    public function  render($className = "table-bordered")
    {
        $finalTable = "<table class=\"table $className\">";
        $finalTable .= "<thead><tr>";
        foreach ($this->mStructure as $item => $value) {
            $finalTable .= "<th>" . htmlentities($value) . "</th>";
        }
        $finalTable .= "</tr></thead><tbody>";


        for($merker = 0; $merker < count($this->mRowData); $merker++) {
            $finalTable .= "<tr>";
            $tempAr = $this->mRowData[$merker];
            foreach ($tempAr as $key => $value) {
                if($value instanceof HtmlRawData) {
                    $finalTable.= "<td>" . $value->getCode() . "</td>";
                    continue;
                }
                $finalTable.= "<td>" . htmlentities($value) . "</td>";
            }
            $finalTable .= "</tr>";
        }
        $finalTable .= "</tbody></table>";

        return $finalTable;
    }

}