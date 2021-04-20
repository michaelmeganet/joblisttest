<?php
include_once('class/dbh.inc.php');
include_once('class/variables.inc.php');

$qrCustList = "SELECT * FROM customer_pst WHERE company = 'PST' AND STATUS != 'deleted' ";
$objSQLCustlist = new SQL($qrCustList);
$customerlist = $objSQLCustlist->getResultRowArray();

$qrMatList = "SELECT * FROM material WHERE company = 'PST' AND listing = 'yes' ";
$objSQLMatlist = new SQL($qrMatList);
$matlist = $objSQLMatlist->getResultRowArray();
#print_r($matlist[0]);
?>
<html>
    <head>

    </head>
    <body>
        <div>
            <form action="" method="post">
                <div>
                    <label> Customer Type :</label>
                    <select name="customer_type" id="customer_type">
                        <option value="local" selected>Local</option>
                        <option value="outstation">Outstation</option>
                        <option value="melaka">Melaka</option>
                    </select>
                </div>
                <div>
                    <label>Customer : </label>
                    <select name="cid" id='cid' onchange='console.log("selected CID = " + this.value)'>
                        <?php
                        foreach ($customerlist as $customerrow) {
                            ?>
                            <option value='<?php echo $customerrow['cid']; ?>'><?php echo $customerrow['co_name'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Material : </label>
                    <select name="grade" id='grade' onchange='console.log("selected matcode = " + this.value)'>
                        <?php
                        foreach ($matlist as $matrow) {
                            ?>
                            <option value='<?php echo $matrow['materialcode']; ?>'><?php echo $matrow['material'] ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <div style='text-align:right;width:50%'>
                    <input type='submit' id='submit_data' name='submit_data' value='Submit'/>
                </div>
            </form>
        </div>
        <div> <!--DPost result area-->
            <?php
            if (isset($_POST)) {
                debug_to_console($_POST);
                echo "<pre> POSTED DATA :";
                print_r($_POST);
                echo "</pre>";

                //begin generating data
                include_once 'price.inc.php';
                $grade = $_POST['grade'];
                $cid = $_POST['cid'];
                $customer_type = $_POST['customer_type'];
                $priceTable = new PRICE($grade, $cid, $customer_type);
            }
            ?>
        </div>
    </body>
</html>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//var_dump($priceTable);
