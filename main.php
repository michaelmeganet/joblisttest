<?php
include_once ('phhprocess.inc.php');
//$jobcode = "CJ DCM 2011 1606 02 2011";
//$period = "2011";
//CJ KCR 2011 0164 01
//	CJ PTC 2010 2591 02
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
$text = 'This is a Simple text.';

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
