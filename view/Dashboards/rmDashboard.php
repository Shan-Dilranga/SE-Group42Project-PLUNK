<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <meta charset="utf-8">
        <title>Bloomfield</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
        <link rel="icon" type="icon" href="../images/bloomfieldlogo.png" sizes="32*32">
        <link rel="stylesheet" href="../style/Dashboard.css">



  </head>
    <body>
        <div class="main">
          <div class="upper">
                <div class="resbooking">
                <h3>Bookings</h3>
                </div>
                <div class="reorder">
                  <h2>Items</h3>
                <?php
                    require_once "../../controller/showtable.php";
                    $reorderTable = new Table("item");
                    $reorderTable->show("SELECT ItemID, ItemName, Quantity,ReorderQuantity FROM plunk.item", false);
                  ?>
                </div>
                <div class="calendar">
                    <iframe class="bloomcal" src="https://calendar.google.com/calendar/embed?height=500&wkst=2&bgcolor=%23009688&ctz=Asia%2FColombo&showTz=0&showPrint=0&title=Bloomfield%20Calendar&showTabs=0&showDate=1&showTitle=1&src=NG5vZWhmNTQzMXZoaGtidDRnczdoYTJ0N29AZ3JvdXAuY2FsZW5kYXIuZ29vZ2xlLmNvbQ&src=ZW4ubGsjaG9saWRheUBncm91cC52LmNhbGVuZGFyLmdvb2dsZS5jb20&color=%23B39DDB&color=%230B8043" style="border-width:0" width="500" height="500" frameborder="0" scrolling="no"></iframe>
                </div>
          </div>
          <div class="notifichead">
              <h2>Notifications</h2>
              <?php
                    require_once "../../controller/showtable.php";
                    $notificationTable = new Table("notification");
                    $notificationTable->show("SELECT Date, EventType, Message FROM plunk.notification", false);
                  ?>
          </div>
          <div class="Notifications">


          </div>


        </div>
    </body>
</html>