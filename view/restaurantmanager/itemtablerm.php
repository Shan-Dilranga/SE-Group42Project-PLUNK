<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <meta charset="utf-8">
        <title>Bloomfield</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="icon" href="images/bloomfieldlogo.png" sizes="32*32">
        <link rel="stylesheet" href="../style/itemtable.css">

  </head>
  <body>
        <div class="main" >

                    <div class="detailtable">

                    <?php
                        require_once "../../controller/showtable.php";
                        $itemTable = new Table("item");
                        $itemTable->show("SELECT ItemID AS 'Item ID', ItemName AS 'Item Name' , Quantity AS 'Quantity', ReorderQuantity AS 'Reorder Quantity' FROM plunk.item where Quantity <= ReorderQuantity", '../items/update');
                      ?>
                    </div>

                </div>


  </body>
</html>
