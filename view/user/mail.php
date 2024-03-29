
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>

        <meta charset="utf-8">
        <title>Bloomfield</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,height=device-height, initial-scale=1">
        <link rel="icon" type="icon" href="../images/bloomfieldlogo.png" sizes="32*32">
        <link rel="stylesheet" href="..\style\mail.css">



  </head>
  <body>
    <?php
    require '..\..\library\vendor\autoload.php';
    require "..\..\controller\pages.php";
    require_once "..\..\model\database.php";


      $API_KEY ="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";
    if (isset($_POST['sendmail'])) {
      $DB = new DB;
      $name = $_POST['Name'];
      $email_id = $_POST['to'];
      $subject = $_POST['Subject'];
      $massage = $_POST['message'];


      $email = new \SendGrid\Mail\Mail();
      $email->setFrom("shandilranga62@gmail.com", "shan dilranga");
      $email->setSubject($subject);
      $email->addTo($email_id, $name);
      $email->addContent("text/plain", $massage);


      //for update sign up table
      try {
          $sql = "UPDATE plunk.signup SET Approval='Emailed' WHERE SignupID='$_POST[SignupID]'";
          $DB->runQuery($sql);


      } catch (\Throwable $th) {
          throw $th;
      }
      $sendgrid = new \SendGrid($API_KEY);
      if ($sendgrid->send($email)) {

        $newPage = new Page('mailsuccess.html');
        // header(Location:$newPage );
        $newPage->show();
        exit;
      }
      // try {
      //     $response = $sendgrid->send($email);
      //     print $response->statusCode() . "\n";
      //     print_r($response->headers());
      //     print $response->body() . "\n";
      // } catch (Exception $e) {
      //     echo 'Caught exception: '. $e->getMessage() ."\n";
      // }
    }

?>


    <div class="main">

              <div class="mailheader">
                <h2>Mail Box</h2>

              </div>


              <div class="middle2">

                            <div class="mainpage3" id="mainpages">
                              <div class="formbox">
                                <form class="adduser" action="mail.php" method="post" autocomplete="on" >

                                  <div class="submain">
                                    <input type="hidden" name="SignupID" id="SignupID">
                                    <div class="forminputs">
                                        <label for="Name"><b>Name :</b></label>
                                        <input type="text" name="Name" class="input" id="Name" required>
                                    </div>
                                    <div class="forminputs">
                                        <label for="to"><b>To :</b></label>
                                        <input type="email" name="to" class="input" id="Email" required>
                                    </div>
                                    <div class="forminputs">
                                        <label for="Subject"><b>Subject :</b></label>
                                        <input type="text" name="Subject" class="input" id="Subject" required>
                                    </div>
                                    <div class="forminput2">
                                        <label for="message"><b>Message :</b></label><br><br>
                                        <textarea class="msg" name="message" rows="8" cols="50" id="message" required></textarea>
                                    </div><br>


                                    <div class="formbtn">
                                      <button type="submit"  id="sent" class="add" name="sendmail" >Sent</button>
                                      <button type="reset" id="deny" class="add" name="button">Reset</button>
                                    </div>

                                  </div>
                                </form>

                              </div>
                              <div class="tablediv">
                                <div class="resevationtable">
                                  <h3 class="ReservationMenu">Approved Member Requestes</h3>
                                  <table id="table" >
                                    <tr>
                                      <th>Sign-up ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>UserName</th>
                                      <th>Password</th>
                                      <th>DisplayID</th>

                                    </tr>

                                  <?php
                                  require '..\..\model\bookingdatabaseconnection.php';
                    // C:\xampp\htdocs\project\SE-Group42Project-PLUNK\model\bookingdatabaseconnection.php
                                  $records = mysqli_query($conn,"SELECT * FROM plunk.signup WHERE Approval ='Yes'");
                                  while($data = mysqli_fetch_array($records))
                                  {
                                  ?>
                                    <tr>
                                      <td><?php echo $data['SignupID']; ?></td>
                                      <td><?php echo $data['Name']; ?></td>
                                      <td><?php echo $data['Email']; ?></td>
                                      <td><?php echo $data['UserName']; ?></td>
                                      <td><?php echo $data['Password']; ?></td>
                                      <td><?php echo $data['DisplayID']; ?></td>


                                    </tr>
                                  <?php
                                  }
                                  ?>
                                  </table>

                                  <?php mysqli_close($conn); // Close connection ?>
                                  <script>

                                                  var table = document.getElementById('table');
                                                  var msgs=" Hello, Your Request has accepted by the bllomfield Management.";
                                                  var title=" Request Approved";
                                                  for(var i = 1; i < table.rows.length; i++)
                                                  {
                                                      table.rows[i].onclick = function()
                                                      {
                                                           //rIndex = this.rowIndex;
                                                           document.getElementById("SignupID").value = this.cells[0].innerHTML;
                                                           document.getElementById("Name").value = this.cells[1].innerHTML;
                                                           document.getElementById("Email").value = this.cells[2].innerHTML;
                                                           document.getElementById("message").value = msgs+"User Name :"+ this.cells[3].innerHTML+" "+"Password :"+this.cells[4].innerHTML+" "+"Member ID :"+this.cells[5].innerHTML;
                                                           document.getElementById("Subject").value =title;
                                                           // document.getElementById("message").value = this.cells[3].innerHTML;


                                                      };
                                                  }

                                           </script>


                                </div><br><br>
                                <div class="resevationtable2">
                                  <h3 class="ReservationMenu">Denied Member Requestes</h3>
                                  <table id="table2" >
                                    <tr>
                                      <th>Sign-up ID</th>
                                      <th>Name</th>
                                      <th>Email</th>
                                      <th>Reason</th>


                                    </tr>

                                  <?php
                                  require '..\..\model\bookingdatabaseconnection.php';
                    // C:\xampp\htdocs\project\SE-Group42Project-PLUNK\model\bookingdatabaseconnection.php
                                  $records = mysqli_query($conn,"SELECT * FROM plunk.signup WHERE Approval ='No'");
                                  while($data = mysqli_fetch_array($records))
                                  {
                                  ?>
                                    <tr>
                                      <td><?php echo $data['SignupID']; ?></td>
                                      <td><?php echo $data['Name']; ?></td>
                                      <td><?php echo $data['Email']; ?></td>
                                      <td><?php echo $data['Reason']; ?></td>



                                    </tr>
                                  <?php
                                  }
                                  ?>
                                  </table>

                                  <?php mysqli_close($conn); // Close connection ?>
                                  <script>

                                                  var table = document.getElementById('table2');
                                                  var msg=" Hello, Your Request has denied by the bllomfield Management.";
                                                  var titletwo=" Request Denied";
                                                  for(var i = 1; i < table.rows.length; i++)
                                                  {
                                                      table.rows[i].onclick = function()
                                                      {
                                                           //rIndex = this.rowIndex;
                                                           document.getElementById("SignupID").value = this.cells[0].innerHTML;
                                                           document.getElementById("Name").value = this.cells[1].innerHTML;
                                                           document.getElementById("Email").value = this.cells[2].innerHTML;
                                                           document.getElementById("message").value =msg+" "+"Reason is :" +this.cells[3].innerHTML;
                                                           document.getElementById("Subject").value =titletwo;
                                                           // document.getElementById("message").value = this.cells[3].innerHTML;


                                                      };
                                                  }

                                           </script>


                                </div>

                              </div>



                            </div>


                  </div>
            </div>


      </body>
</html>
