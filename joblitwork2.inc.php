<?php

include_once ('../class/phhdate.inc.php');


class  JOB_WORK_DETAIL {

    protected $jlwsid;
    protected $jobcode;
    protected $cuttingtype;
    protected $processcode;
    protected $totalquantity;
    protected $jobOutputList;
    protected $cncmachining;
    protected $manual;
    protected $bandsaw;
    protected $milling;
    protected $millingwidth;
    protected $millinglength;
    protected $roughgrinding;
    protected $precisiongrinding;
    protected $insertArray ;


    public function __construct(  $jobcode, $cuttingtype, $processcode, $totalquantity, $jobOutputList = null){
        

        $jobOutputList = array();
        $this->insertArray = $jobOutputList;

    }



}