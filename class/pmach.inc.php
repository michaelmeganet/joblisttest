<?php

Class CUTTINGTPYE {
    #CUT TYPE

    const MANUAL_CUT = "MANUAL CUT";
    const MANUAL_CUT_CODE = "M";
    const BANDSAW_CUT = "BANDSAW CUT";
    const BANDSAW_CUT_CODE = "B";
    const CNCFLAME_CUT = "CNC FLAME CUT";
    const CNCFLAME_CUT_CODE = "C";

}

Class PROCESSNAME {

    const MILLING = "MILL";
    const PRECISION_GRIND = "SURFACE GRIND";
    const ROUGH_GRIND = "ROUGH GRIND";

}

Class PROCESSSURFACE {

    const ONEFACE = 1;
    const TWOFACE = 2;

}

Class SURFACEFINISH {

    const MILL_ROUCH_SURFACE = "W";
    const MILL_ACCURATE_SURFACE = "WA";
    const RG_ROUGH_SURFACE = "RG";
    coNst RG_ACCURATE_SURFACE = "RGA";
    const SG_ROUGH_SURFACE = "SG";
    const SG_ACCURATE_SURFACE = "SGA";

}

Class SURFACE_PROCESSES {

    protected $millFaceCode;
    protected $SurfaceProcess;
    protected $SGFaceCode;
    protected $SGAFaceCode;
    protected $RGAFaceCode;
    protected $RGFaceCode;

    public function setFOUR_WA() {
        $this->millFaceCode = self::FOUR_WA;
    }

    public function getFaceCode() {
        return $this->millFaceCode;
    }

    public function getSGFaceCode() {
        return $this->SGFaceCode;
    }

    public function getSGAFaceCode() {
        return $this->SGAFaceCode;
    }

    public function getRGFaceCode() {
        return $this->RGFaceCode;
    }

    public function getRGAFaceCode() {
        return $this->RGAFaceCode;
    }

    ## MILLING SURFACE PROCESS SYMBOL

    const ONE_W = "1TW"; //1 side thick mill (thickness surfaces mill)
    const ONE_WA = "1TWA"; //1 side thick mill (thickness surfaces mill ACCURATE)
    const TWO_W = "2TW"; //2 sides thick mill
    const THREE_W = "2TW-1WW"; // 2 side  thick mill , 1 side width mill
    const FOUR_W = "2TW-2WW"; // 2 side thick mill , 2 side width mill
    const FIVE_W = "2TW-2WW-1LW"; // 2 side  thick mill , 2 side  width mill, 1 side  length mill
    const SIX_W = "2TW-2WW-2LW"; //2 side thick mill , 2 side width mill, 2 side length mill
    const TWO_WA = "2TWA"; // 2 side accurate thick mill
    const THREE_WA = "2TWA-1WWA"; // 2 side accurate thick mill , 1 side accurate width mill
    const FOUR_WA = "2TWA-2WWA"; // 2 side accurate thick mill , 2 side accurate width mill
    const FIVE_WA = "2TWA-2WWA-1LWA"; // 2 side accurate thick mill , 2 side accurate width mill, 1 side accurate length mill
    const SIX_WA = "2TWA-2WWA-2LWA"; // 2 side accurate thick mill , 2 side accurate width mill, 2 side accurate length mill
    #ROUGH GRIND SURFACE PROCESS SYMBOL
    const ONE_RG = "1TRG"; //1 side thick RG (thickness surfaces RG)
    const TWO_RG = "2TRG"; //2 sides thick RG
    const THREE_RG = "2TRG-1WRG"; // 2 side  thick RG , 1 side width RG
    const FOUR_RG = "2TRG-2WRG"; // 2 side thick RG , 2 side width RG
    const FIVE_RG = "2TRG-2WRG-1LRG"; // 2 side  thick RG , 2 side  width RG, 1 side  length RG
    const SIX_RG = "2TRG-2WRG-2LRG"; //2 side thick RG , 2 side width RG, 2 side length RG
    const TWO_RGA = "2TRGA"; // 2 side accurate thick RG
    const THREE_RGA = "2TRGA-1WRGA"; // 2 side accurate thick RG , 1 side accurate width RG
    const FOUR_RGA = "2TRGA-2WRGA"; // 2 side accurate thick RG , 2 side accurate width RG
    const FIVE_RGA = "2TRGA-2WRGA-1LRGA"; // 2 side accurate thick RG , 2 side accurate width RG, 1 side accurate length RG
    const SIX_RGA = "2RGA-2WRGA-2LRGA"; // 2 side accurate thick RG , 2 side accurate width RG, 2 side accurate length RG
    #PRECISION GRIND SURFACE PROCESS SYMBOL (Surface Grind)
    const ONE_SG = "1TSG"; //1 side thick SG (thickness surfaces SG)
    const TWO_SG = "2TSG"; //2 sides thick SG
    const THREE_SG = "2TSG-1WSG"; // 2 side  thick SG , 1 side width SG
    const FOUR_SG = "2TSG-2WSG"; // 2 side thick SG , 2 side width SG
    const FIVE_SG = "2TSG-2WSG-1LSG"; // 2 side  thick SG , 2 side  width SG, 1 side  length SG
    const SIX_SG = "2TSG-2WSG-2LSG"; //2 side thick SG , 2 side width SG, 2 side length SG
    const ONE_SGA = "1TSGA"; //1 side thick SGA (thickness surfaces SGA)
    const TWO_SGA = "2TSGA"; // 2 side accurate thick SG
    const THREE_SGA = "2TSGA-1WSGA"; // 2 side accurate thick SG , 1 side accurate width SG
    const FOUR_SGA = "2TSGA-2WSGA"; // 2 side accurate thick SG , 2 side accurate width SG
    const FIVE_SGA = "2TSGA-2WSGA-1LSGA"; // 2 side accurate thick SG , 2 side accurate width SG, 1 side accurate length SG
    const SIX_SGA = "2SGA-2WSGA-2LSGA"; // 2 side accurate thick SG , 2 side accurate width SG, 2 side accurate length SG

    public function __construct($SurfaceProcess) {

        //$this->millFaceCode = $SurfaceProcess;
        $this->SurfaceProcess = $SurfaceProcess;
        echo "in constructor of Class SURFACE_PROCESSES  <br>";
        switch ($SurfaceProcess) {
            case "ONE_W":
                $this->millFaceCode = self::ONE_W;
            case "ONE_WA":
                $this->millFaceCode = self::ONE_WA;
                break;
            case "TWO_W":
                $this->millFaceCode = self::TWO_W;
                break;
            case "TWO_WA":
                $this->millFaceCode = self::TWO_WA;
                break;
            case "THREE_WA":
                $this->millFaceCode = self::THREE_WA;
                break;
            case "THREE_W":
                $this->millFaceCode = self::THREE_W;
                break;
            case "FOUR_W":
                $this->millFaceCode = self::FOUR_W;
                break;
            case "FOUR_WA":
                $this->millFaceCode = self::FOUR_WA;
                break;
            case "SIX_W":
                $this->millFaceCode = self::SIX_W;
                break;
            case "SIX_WA":
                $this->millFaceCode = self::SIX_WA;
                break;
            case "ONE_SGA":
                $this->SGAFaceCode = self::ONE_SGA;
                break;
            case "TWO_SGA":
                $this->SGAFaceCode = self::TWO_SGA;
                break;
            case "THREE_SGA":
                $this->SGAFaceCode = self::THREE_SGA;
                break;
            case "FOUR_SGA":
                $this->SGAFaceCode = self::FOUR_SGA;
                break;
            case "FIVE_SGA":
                $this->SGAFaceCode = self::FIVE_SGA;
                break;
            case "SIX_SGA":
                $this->SGAFaceCode = self::SIX_SGA;
                break;
            case "ONE_RGA":
                $this->RGAFaceCode = self::ONE_RGA;
                break;
            case "TWO_RGA":
                $this->RGAFaceCode = self::TWO_RGA;
                break;
            case "THREE_RGA":
                $this->RGAFaceCode = self::THREE_RGA;
                break;
            case "FOUR_RGA":
                $this->RGAFaceCode = self::FOUR_RGA;
                break;
            case "FIVE_RGA":
                $this->RGAFaceCode = self::FIVE_RGA;
                break;
            case "SIX_RGA":
                $this->RGAFaceCode = self::SIX_RGA;
                break;
            case "ONE_RG":
                $this->RGFaceCode = self::ONE_RG;
                break;
            case "TWO_RG":
                $this->RGFaceCode = self::TWO_RG;
                break;
            case "THREE_RG":
                $this->RGFaceCode = self::THREE_RG;
                break;
            case "FOUR_RG":
                $this->RGFaceCode = self::FOUR_RG;
                break;
            case "FIVE_RG":
                $this->RGFaceCode = self::FIVE_RG;
                break;
            case "SIX_RG":
                $this->RGFaceCode = self::SIX_RG;
                break;
            case "ONE_SG":
                $this->SGFaceCode = self::ONE_SG;
                break;
            case "TWO_SG":
                $this->SGFaceCode = self::TWO_SG;
                break;
            case "THREE_SG":
                $this->SGFaceCode = self::THREE_SG;
                break;
            case "FOUR_SG":
                $this->SGFaceCode = self::FOUR_SG;
                break;
            case "FIVE_SG":
                $this->SGFaceCode = self::FIVE_SG;
                break;
            case "SIX_SG":
                $this->SGFaceCode = self::SIX_SG;
                break;

            default:
                break;
        }
        echo "\$this->SurfaceProcess = $this->SurfaceProcess <br>";
//        self::setFOUR_WA();
    }

    function checkFaceCode() {

        echo "enter funciton checkFaceCode() <br>";
//        $result = self::getFOUR_WA();
//        $result = self::FOUR_WA;

        return $result;
    }

}
