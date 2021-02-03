<?php
include_once ('phhprocess.inc.php');
//$jobcode = "CJ DCM 2011 1606 02 2011";
//$period = "2011";
//CJ KCR 2011 0164 01
//	CJ PTC 2010 2591 02
$text = 'This is a Simple text.';
?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <form action="" id="myForm" method="post">
            <select name="period" id="period">
                <option value ="2011" >2011</option>
                <option value ="2010" >2010</option>
            </select>
            <label>Input Job Code :</label>
            <input type="text" id="jobcode" name="jobcode" value=''/>
            <button type='submit'>Submit</button>
            <input type="button" onclick="myFunction()" value="Reset form">
            <input type="reset" value="Start Over" />
        </form>
        <script>
            function myFunction() {
                document.getElementById("myForm").reset();
            }
        </script>
    </body>
</html>

<hr>
<?php
if (isset($_POST['jobcode'])) {
    $jobcode = $_POST['jobcode'];

    $objProcess = new PROCESS($jobcode);
    echo "######################## AFTER INSTANTIATE THE PROCESS CLASS ###############################<br>";
    $cutCode = $objProcess->cutCode;
    $cuttingType = $objProcess->cuttingType;
    echo "\$cuttingType = $cuttingType , \$cutCode = $cutCode<br>";
    $millFaceCode = $objProcess->millFaceCode;
    $Mill_SurfaceProcessCode = $objProcess->Mill_SurfaceProcessCode;
    if (!empty($millFaceCode)) {
        echo "\$millFaceCode = $millFaceCode <br>";
    }
    if (!empty($Mill_SurfaceProcessCode)) {
        echo "\$Mill_SurfaceProcessCode = $Mill_SurfaceProcessCode <br>";
    }
    $Mill_SurfaceProcessSymbol = $objProcess->Mill_SurfaceProcessSymbol;
    if (!empty($Mill_SurfaceProcessSymbol)) {
        echo "\$Mill_SurfaceProcessSymbol = $Mill_SurfaceProcessSymbol <br>";
    }
    $SG_SurfaceProcessSymbol = $objProcess->SG_SurfaceProcessSymbol;
    $SG_SurfaceProcessCode = $objProcess->SG_SurfaceProcessCode;
    if (!empty($SG_SurfaceProcessSymbol)) {
        echo "\$SG_SurfaceProcessSymbol = $SG_SurfaceProcessSymbol<br>";
    }
    if (!empty($SG_SurfaceProcessCode)) {
        echo "\$SG_SurfaceProcessCode = $SG_SurfaceProcessCode <br>";
    }
    $SGFaceCode = $objProcess->SGFaceCode;
    if (!empty($SGFaceCode)) {
        echo "\$SGFaceCode = $SGFaceCode <br>";
    }
    $RGFaceCode = $objProcess->RGFaceCode;
    if (!empty($RGFaceCode)) {
        echo "\$RGFaceCode = $RGFaceCode <br>";
    }
    $RG_SurfaceProcessSymbol = $objProcess->RG_SurfaceProcessSymbol;
    if (!empty($RG_SurfaceProcessSymbol)) {
        echo "\$RG_SurfaceProcessSymbol = $RG_SurfaceProcessSymbol <br>";
    }
    $RG_SurfaceProcessCode = $objProcess->RG_SurfaceProcessCode;
    if (!empty($RG_SurfaceProcessCode)) {
        echo "\$RG_SurfaceProcessCode = $RG_SurfaceProcessCode <br>";
    }
    $RG_Faces = $objProcess->RGFaces;
    if (!empty($RG_Faces)) {
        echo "\$RG_Faces = $RG_Faces<br>";
    }
    $ThickSizeMill = $objProcess->ThickSizeMill;
    $WidthSizeMill = $objProcess->WidthSizeMill;
    $LengthSizeMill = $objProcess->LengthSizeMill;
    echo "\$ThickSizeMill = $ThickSizeMill<br>";
    echo "\$WidthSizeMill = $WidthSizeMill<br>";
    echo "\$LengthSizeMill = $LengthSizeMill<br>";

    $ThickSizeSurfGrind = $objProcess->ThickSizeSurfGrind;
    $WidthSizeSurfGrind = $objProcess->WidthSizeSurfGrind;
    $LengthizeSurfGrind = $objProcess->LengthSizeSurfGrind;

    echo "\$ThickSizeSurfGrind = $ThickSizeSurfGrind <br>";
    echo "\$WidthSizeSurfGrind = $WidthSizeSurfGrind <br>";
    echo "\$LengthizeSurfGrind = $LengthizeSurfGrind <br>";
//    $RGFaces = $objProcess->
//    $scheduling_detial =
//
//    echo "The \$sch_detial grab from $jobcode is as follow <br>";
//    var_dump($sch_detail);
//    echo "<br>";
//    $period = $_POST['period'];
//    $getResultforJoblist = get_detail_by_jobcode($jobcode);
//
//    echo "<br>";
//    echo "The result of get_detail_by_jobcode(\"$jobcode\") is as follow :-<br> ";
//    print_r($getResultforJoblist);
//    echo "<br>";
}


// this echoes "is is a Simple text." because 'i' is matched first
//echo strpbrk($text, 'mi');
//echo "<br>";
// this echoes "Simple text." because chars are case sensitive
//echo strpbrk($text, 'S');
// [sid] => 5029, [bid] => 1, [quono] => DCM 2011 004 (R1), [jobno] => 2, [jlfor] => CJ
//$str = "4WA2SGA";
//$pattern = "/4WASGA/";
//$replace = "/\d(SGA)/";
//echo preg_filter($pattern, $replace, $str);
//$str = "4WA2SGA";
//echo "\$str = $str <br>";
//$pattern = "/4WA2SGA/";
//echo preg_filter($pattern, "SGA", $str);
//echo "<br>";
//$startPosition = strpos("4WA6SGA", "SGA");
//$noOfSurface = substr($str, ($startPosition - 1), 1);
//echo "no of Surface in SGA is " . $noOfSurface . "<br>";

$str = "4W2RG";
$pattern = "/4W2RG/";
echo stristr($str, "SGA");
//echo preg_filter($pattern, "SGA", $str);
?>
