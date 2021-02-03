<?php

include_once ('class/dbh.inc.php');
include_once ('class/variables.inc.php');
include_once ('class/phhdate.inc.php');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function checkSpecialPrice($grade, $cid) {

    $table = "$grade" . "_pst_" . "$cid";
//select * from information_schema.tables where table_name='Client_information';
    $sql = "select * from information_schema.tables where table_name=  '$table' ";
    echo "\$sql = $sql <br>";
    $objShowTable = new SQL($sql);

    $ShowTable = $objShowTable->getResultOneRowArray();
//    var_dump($ShowTable);

    echo "<br>";
    print_r($ShowTable);
    echo "<br>";
    if (isset($ShowTable)) {

        foreach ($ShowTable as $value) {
            $priceTable = $value['TABLE_NAME'];
            return $priceTable;
        }
    } else {
        return "Special price for $cid in grade $grade not found.";
    }
}

Class PRICE {

    protected $grade;
    protected $cid;
    protected $customer_type;

    public function __construct($grade, $cid, $customer_type) {
        $this->grade = $grade;
        $this->cid = $cid;
        $this->customer_type = $customer_type;
        $IsSpecialPrice = checkSpecialPrice($grade, $cid);
// check the special price
// if found special price , output special price table
//if not found special price
// check $grade_$customer_type;
//found    $grade_$customer_type; then output table
//if not found
//check $grade table (main)
    }

}
