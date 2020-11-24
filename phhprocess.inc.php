<?php

//CJ DCM 2011 1606 02 2011
//CJ KCR 2011 0164 01
include_once ('class/dbh.inc.php');
include_once ('class/variables.inc.php');
include_once ('class/phhdate.inc.php');
include_once ('class/pmach.inc.php');

function numberToWords($int) {
    echo "in function numberToWords , \$int = $int<br>";
    switch ($int) {
        case "1":
            $response = "ONE";
            return $response;
            break;
        case "2":
            $response = "TWO";
            return $response;
            break;
        case "3":
            $response = "THREE";
            return $response;
            break;
        case "4":
            $response = "FOUR";
            return $response;
            break;
        case "5":
            $response = "FIVE";
            return $response;
            break;
        case "6":
            $response = "SIX";
            return $response;
            break;
        default:
            $response = "empty";
            return $response;
            break;
    }
}

function get_detail_by_jobcode($jobcode) {
    // get the infomation by $period and $jobcode
    // from the production_scheduling_period and the coressponding
    //production_output_period
    echo "enter function of get_detail_by_jobcode <br>";
    $branch = substr($jobcode, 0, 2);
    $co_code = substr($jobcode, 3, 3);
    $yearmonth = '20' . substr($jobcode, 7, 2) . '-' . substr($jobcode, 9, 2);
    $runningno = (int) substr($jobcode, 12, 4);
    $jobno = (int) substr($jobcode, 17, 2);
    $periodQuono = substr($jobcode, 7, 4);
    $objPeriod = new Period();
    $period = $objPeriod->getcurrentPeriod();
    echo "\$branch = $branch , \$co_code = $co_code, \$yearmonth = $yearmonth, \$runningno = $runningno, \$jobno = $jobno<br>";
    echo "\$period = $period<br>";
    $proschtab = 'production_scheduling_' . $period;
    echo "$proschtab = $proschtab <br>";
    $qr = "SELECT * FROM $proschtab "
            . "WHERE jlfor = '$branch' "
            . "AND quono LIKE '$co_code%' "
            . "AND date_issue LIKE '$yearmonth%' "
            . "AND runningno = $runningno "
            . "AND status = 'active' "
            . "AND jobno = $jobno";
    echo "\$qr = $qr <br>";
    echo "<br>###########################################################################<br>";
    $objSQL = new SQL($qr);
    $result = $objSQL->getResultOneRowArray();
    //print_r($result);
    if (!empty($result)) {
        return $result;
    } else {//if current period table cant see any reudlt check last period table
        //return 'empty';
        $lastperiod = $objPeriod->getlastPeriod();
        $proschtab = 'production_scheduling_' . $lastperiod;
        echo "check last period ,$proschtab <br>";
        $qr = "SELECT * FROM $proschtab "
                . "WHERE jlfor = '$branch' "
                . "AND quono LIKE '$co_code%' "
                . "AND date_issue LIKE '$yearmonth%' "
                . "AND runningno = $runningno "
                . "AND status = 'active' "
                . "AND jobno = $jobno";
        echo "\$qr = $qr <br>";
        $objSQL = new SQL($qr);
        $result = $objSQL->getResultOneRowArray();
        if (!empty($result)) {
            return $result;
        } else {
            return 'empty';
        }
    }
}

function find_sid_by_jobcode($period, $jobcode) {
    // get the infomation by $period and $jobcode
    // production_output_period
    //
    $branch = substr($jobcode, 0, 2);
    $co_code = substr($jobcode, 3, 3);
    $yearmonth = '20' . substr($jobcode, 7, 2) . '-' . substr($jobcode, 9, 2);
    $runningno = (int) substr($jobcode, 12, 4);
    $jobno = (int) substr($jobcode, 17, 2);
    $proschtab = 'production_scheduling_' . $period;
    $qr = "SELECT * FROM $proschtab "
            . "WHERE jlfor = '$branch' "
            . "AND quono LIKE '$co_code%' "
            . "AND date_issue LIKE '$yearmonth%' "
            . "AND runningno = $runningno "
            . "AND status = 'active' "
            . "AND jobno = $jobno";
    $objSQL = new SQL($qr);
    $result = $objSQL->getResultOneRowArray();
    #print_r($result);
    if (!empty($result)) {
        return $result;
    } else {
        return 'no sid can be found in $proschtab <br>';
    }
}

function findCo_codeBycid($cid, $company) {

    $sql = "SELECT co_code FROM customer_" . strtolower($company) . " "
            . " WHERE cid = $cid ";
    echo "sql = $sql <br>";
    $objcid = new SQL($sql);
    $result = $objcid->getResultOneRowArray();
    $co_code = $result['co_code'];
    echo "in function findCo_codeBycid, co_code = $co_code<br>";
    echo "sql = $sql <br>";
    return $co_code;
}

function findQuonoPeriod($quono) {

    $period = substr($quono, 4, 4);
    return $period;
}

function findProcessName($process) {
    $sql = "SELECT * FROM premachining where pmid = '$process' ";
    $objSql = new SQL($sql);
    $result = $objSql->getResultOneRowArray();
    $processName = $result['process'];
    return $processName;
}

Class PROCESS {

    public $joblistno;
    protected $cutCode;
    protected $processType;
    protected $cuttingType;
    protected $ProcessName;
    protected $ProcessSurface;
    protected $SurfaceFinish;
    protected $processCode;
    protected $sid;
    protected $bid;
    protected $qid;
    protected $quono;
    protected $company;
    protected $cid;
    protected $quantity;
    protected $grade;
    protected $process;
    protected $runningno;
    protected $jobno;
    protected $jlfor;
    protected $status;

    public function __construct($jobcode) {


        //Assume all jobcode is current month and last month jobcode
        $objPeriod = new Period();
        $thisPeriod = $objPeriod->getcurrentPeriod();
        $prevPeriod = $objPeriod->getlastPeriod();
        $sch_detail = get_detail_by_jobcode($jobcode);
        $this->status = (string) $sch_detail['status'];
        $status = $this->status;
        echo "JOBCODE Input is $jobcode <br>";
        if ($sch_detail == 'empty') {
            echo "there is no record of $jobcode could be found on current period ($thisPeriod) and last period ($prevPeriod)<br>";
        } elseif ($status != "active") {
            echo "The status for  $jobcode is $status, which is not the active status, this jobcode have issue.<br>";
        } else {
//            echo "The \$sch_detial grab from $jobcode is as follow <br>";
//            var_dump($sch_detail);
//            foreach ($sch_detail as $key => $value) {
//                ${$key} = $value;
//                echo "$key : $value\n" . "<br>";
//                debug_to_console("$key => $value");
//            }
            $this->sid = $sch_detail['sid'];
            $this->bid = $sch_detail['bid'];
            $this->qid = $sch_detail['qid'];
            $this->quono = $sch_detail['quono'];
            $quono = $sch_detail['quono']; //local
            $this->company = $sch_detail['company'];
            $company = $sch_detail['company'];
            $this->cid = $sch_detail['cid'];
            $cid = $sch_detail['cid']; //local
            $this->quantity = $sch_detail['quantity'];
            $this->grade = $sch_detail['grade'];
            $this->process = $sch_detail['process'];
            $process = $sch_detail['process'];
            $this->cuttingType = $sch_detail['cuttingtype'];
            $this->runningno = (string) $sch_detail['runningno'];
            $runningno = (string) $sch_detail['runningno'];
            $this->jobno = (string) $sch_detail['jobno'];
            $jobno = (string) $sch_detail['jobno']; // local
            $this->jlfor = $sch_detail['jlfor'];
            $jlfor = $sch_detail['jlfor']; // local

            if (strlen($jobno) == 1) {
                $jobno = "0" . $jobno;
            }
            if (strlen($runningno) == 1) {

                $runningno = "000" . $runningno;
            } elseif (strlen($runningno) == 2) {
                $runningno = "00" . $runningno;
            } elseif (strlen($runningno) == 3) {
                $runningno = "0" . $runningno;
            } else {
                ## do nothing
            }
            ##### look for co_code
            $co_code = findCo_codeBycid($cid, $company);
            ### look for quotation period
            $quonoPeriod = findQuonoPeriod($quono);
            ### look for process name
            ##$this->ProcessName = $sch_detail['process'];
            $processName = findProcessName($process);
            $this->ProcessName = $processName;

            echo "in constructor of Class PROCESS <br>";
            echo "The below scope variables have been instantiated <br> ";
            echo "<b>sid = $this->sid , bid = $this->bid , qid = $this->qid, quono = $this->quono <br>";
            echo "company = $this->company, cid = $this->cid, quantity = $this->quantity, grade = $this->grade<br>";
            echo "process = $this->process, processName = $this->ProcessName cuttingType = $this->cuttingType, ";
            echo "runningno = $this->runningno, jobno = $this->jobno, jlfor = $this->jlfor, status = $this->status <br>";
            echo "processName = $processName </b><br>";
            echo "<br>";
            echo "############Resolve back to JOBCOBE ######################################<br>";
            echo "JOBCODE IS " . $jlfor . " " . $co_code . " " . $quonoPeriod . " " . $runningno . " " . $jobno . "<br>";

            $objcutCode = new CUTPROCESS($this->cuttingType); //aggregation relationship
            $cutCode = $objcutCode->$cutCode;

            echo "$cutCode = $cutCode <br>";

            $objMill = new MILL($this->ProcessName);
        }
//            $sch_detail = get_scheduling_detail_by_jobcode($prevPeriod, $jobcode);
//            if ($schDetail == 'empty') {
//                Throw new Exception("Cannot find Scheduling data of jobcode = $jobcode in period = $thisPeriod and period = $prevPeriod");
//            } else {
//                $period = $prevPeriod;
//            }
//        } else {
//            $period = $thisPeriod;
//        }
    }

}

Class CUTPROCESS {

    protected $cuttingType;
    protected $cutCode;

    public function __construct($cuttingType) {
//        parent::__construct($jobcode);
        echo "enter Class CUTPROCESS to instantince . <br>";
        $this->cuttingType = $cuttingType;

        switch ($cuttingType) {

            case CUTTINGTPYE::BANDSAW_CUT:
                $this->cutCode = CUTTINGTPYE::BANDSAW_CUT_CODE;

                break;
            case CUTTINGTPYE::MANUAL_CUT:
                $this->cutCode = CUTTINGTPYE::MANUAL_CUT_CODE;


                break;
            case CUTTINGTPYE::CNCFLAME_CUT:
                $this->cutCode = CUTTINGTPYE::CNCFLAME_CUT_CODE;


                break;

            default:
                $this->cutCode = "empty";

                break;
        }
        echo "\$this->cutCode = $this->cutCode <br";
    }

}

Class MILL extends PROCESS {

    protected $ProcessName;

    public function __construct($processName) {

        $this->ProcessName = $processName;

        echo "<br>#####################################################<br>";
        echo "in Class MILL's constructor, instantiated ProcessName = $processName <br>";

        ####
        # detect milling surfaces
        # 2 : top and bottom
        # 4 : front and rear + left and right
        # 6 : top and bottom + front and rear + left and right
        $millFaces = substr($processName, 0, 1); ## first character of $processName
        echo "millFaces = $millFaces <br>";
        $numberOfFace = numberToWords($millFaces);

        echo "<br>\$numberOfFace = $numberOfFace <br> ";
        #########
        # detect standard milling (W) or accuratge Mill (WA)
        $millAccurate = $millFaces = substr($processName, 1, 2); //Assume it is WA
        $millStandard = $millFaces = substr($processName, 1, 1); //Assume it is W

        if ($millAccurate == "WA") {

            ## This is sure case of Precision Milling (WA)
            ## SURFACE_PROCESSES detected
            $SurfaceProcess = $numberOfFace . "_WA";
        } elseif ($millAccurate != "WA" && $millStandard == "W") {// for which no "WA" detected but have detected "W"
            $SurfaceProcess = $numberOfFace . "_W";
        } else {
            #
            $SurfaceProcess = "empty";
        }
        echo "\$SurfaceProcess = $SurfaceProcess <br>";

        ######
        # setup SURFACE_PROCESSES Class
        $objName = new SURFACE_PROCESSES($SurfaceProcess);
        $millFaceCode = $objName->getFaceCode();
#        $millFaceCode = SURFACE_PROCESSES::FOUR_WA

        echo "\$millFaceCode = $millFaceCode <br>";
    }

}
?>