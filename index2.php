<?php
include_once 'joblistwork.inc.php';
if (isset($_POST['jobcode'])){
    $jobcode = $_POST['jobcode'];
    $objJCS = new JOB_WORK_2($jobcode);
    $objJCS->call_test_output();
}
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
        <form action="" method="post">
            <label>Input Job Code :</label>
            <input type="text" id="jobcode" name="jobcode" value=''/>
            <button type='submit'>Submit</button>
        </form>
    </body>
</html>
