<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'price.inc.php';
$grade = "1050p";
$cid = 20513;
$customer_type = "outstation";
$priceTable = new PRICE($grade, $cid, $customer_type);
//var_dump($priceTable);
