<?php require_once('connection.php'); ?>
<?php
  
  session_start();
  if(isset($_GET["button1"])){
    $fname = (isset($_GET["firstname"]) ? $_GET["firstname"] : '');
    $lname = (isset($_GET["lastname"]) ? $_GET["lastname"] : ''); 
    $number = (isset($_GET["contactnumber"]) ? $_GET["contactnumber"] : ''); 
    $nic = (isset($_GET["nic"]) ? $_GET["nic"] : '');
    $field = (isset($_GET["field"]) ? $_GET["field"] : '');
    $_SESSION["userID"] = $nic;

    $query = "INSERT INTO people 
          (NIC,FirstName,LastName,ContactNo,JobType)
          VALUES ('{$nic}','{$fname}','{$lname}','{$number}','{$field}')";
    mysqli_query($connection, $query);

      if($field == "tutor") { header('Location:tutor.php'); }
      if($field == "photographer"){header('Location:Photographer.php');}
      if($field == "eventOrganizer") { header('Location:eventOrganizer.php'); }
  } 
  if(isset($_GET["button2"])){
    $idlog = (isset($_GET["idlog"]) ? $_GET["idlog"] : ''); 
    $query = "select * from people";
    $result_set = mysqli_query($connection, $query);
    while($record = mysqli_fetch_assoc($result_set)){
      if($record['NIC'] == $idlog){
        $_SESSION["userID"] = $idlog;
        if($record['JobType'] == 'tutor'){ header('Location:tutor.php'); }
        if($record['JobType'] == "photographer"){header('Location:Photographer.php');}
        if($record['JobType'] == "eventOrganizer") { header('Location:eventOrganizer.php'); }
        break;
      }
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Photographic Database</title>
    <link rel="stylesheet" href="form1.css">
</head>
<body>
    <div class="movertopic">
      <h1>PHOTOGRAPHIC DATABASE</h1>
    </div>       
    <div class="moverbottom1">
      <div class="moverbottom2">
        <div class="container">
            <form action="project.php">
              <div class="secondarytopic">
                <label>REGISTER</label>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="fname">First Name</label>
                </div>
                <div class="col-75">
                  <input type="text" id="fname" name="firstname" placeholder="Your name..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Last Name</label>
                </div>
                <div class="col-75">
                  <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                    <label for="Adress">Contact Number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="contactno" name="contactnumber" placeholder="Your contact number..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                    <label for="Adress">Id Number</label>
                </div>
                <div class="col-75">
                    <input type="text" id="nic" name="nic" placeholder="Your Id Number..">
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="field">Select your field</label>
                </div>
                <div class="col-75">
                  <select id="field" name="field">
                    <option value="photographer">Photographer</option>
                    <option value="model">Model</option>
                    <option value="equipmentProvider">Equipment Provider</option>
                    <option value="eventOrganizer">Event Organizer</option>
                    <option value="tutor">Photographic Tutor</option>
                    <option value="other">Other</option>
                  </select>
                </div>
              </div>
              <br>
              <div class="row">
                <input type="submit" value="Register" name="button1">
              </div>
            </form>
        </div>
      </div>
    
      <div class="moverbottom2">
      <div class="container">
          <form action="project.php">
            <div class="secondarytopic">
              <label>LOG IN</label>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">ID Number</label>
              </div>
              <div class="col-75">
                <input type="text" id="idnumber" name="idlog" placeholder="Your Id Number..">
              </div>
            </div>
            
            
            <br>
            <div class="row">
              <input type="submit" value="Log In" name="button2">
            </div>
          </form>
      </div>
      </div>
      
    </div>
    
</body>
</html>
<?php mysqli_close($connection) ?>