<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <meta charset="utf-8">
        <title>Bloomfield</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="icon" href="images/bloomfieldlogo.png" sizes="32*32">
        <link rel="stylesheet" href="../style/crud.css">
        <script type="text/javascript" src="../script/additem.js"></script>
        <script type="text/javascript" src="../script/updatedata.js"></script>

  </head>
  <body>
  <?php
        require_once "../../model/database.php";
        $DB = new DB;
        $id = explode("=", $_GET['data'])[1];
        $query = "SELECT * FROM plunk.bill WHERE BillID=$id";
        $result = $DB->runQuery($query)[0];
    ?>

    <div class=main>
    <div class= left>
    <div class="form">
			<h2 class="center-text"><b>PAY BILL</b>
                <!-- <image src = "../images/bin.png" class="bin"></image> -->
            </h2>
			
        
        <form action="../../controller/CRUD.php" method="POST">
        <input type="hidden" name="pay-bill">
            <table class="formtable">
            <tr>
                <div class="form-group">
                   <td><label for="BillID">Bill ID</label></td> 
                    <td><input type="number" id= "BillID" name="BillID" required class="form-control" value = "<?php echo "$result[BillID]";?>" readonly/></td>
                </div>
            </tr>
            
            <tr>
                <div class="form-group">
                   <td><label for="CustomerName">Customer Name</label></td> 
                    <td><input type="text" id= "CustomerName" name="CustomerName" required class="form-control" value = "<?php echo "$result[CustomerName]";?>" <?php if($_SESSION['UserType'] != 'Cashier'){echo "readonly";}?>/></td>
                </div>
            </tr>
            <tr>
                <div class="form-group">
                    <td><label for="Price">Price</label></td>
                    <td><input type="number" id="Price" name="Price" required class="form-control" min=0 oninput="validity.valid||(value='');" value = "<?php echo "$result[Price]";?>" readonly/></td>
                </div>
            </tr>
            <?php 
                if($_SESSION['UserType']=='Cashier'){
                    echo "
                    <tr>
                        <div class=form-group>
                            <td><label for=Discount>Discount</label></td>
                            <td><input type=number id=Discount name=Discount required class=form-control min=0 oninput=validity.valid||(value=''); value = $result[Discount] readonly/></td>
                        </div>
                    </tr>
                    ";
                }
            ?>
            
            </table>
            
            <div class="form-group">
                <?php 
                    if($_SESSION['UserType']!='Cashier'){
                        echo "
                        <table>
                            <tr>
                                <td>Pay the amount through Cashier to receive items.</td>
                                <td><button type=back class=\"button submit\"><a class=cancel href=../items/itemspage.php>OK</a></button></td>
                            </tr>
                        </table>
                        ";
                    }else{
                        echo "
                        <center><button type=submit name=submit value=Submit class=\"button submit\">Paid</button></center>
                        ";
                    }
                ?>
            </div>
    </form>                
    </div>
</div>
<div class= right>
        <div class="righttable">
        <div class="itemtable">
            <h3>Ordered Items</h3>
            <iframe src="../orderitem/details.php?OrderID=<?php echo $result['OrderID'] ?>" class="item"></iframe>
        </div>
</div>
</div>
</div>
     
  </body>

 
</html>
