<?php require_once('connection.php'); ?>
<?php
    session_start();
    
    $query1 = "select * from people where people.jobtype = 'model' ";
    $result_set = mysqli_query($connection, $query1);
    $table = '<table id="customers">';
    $table .= '<tr><th>Models</th></tr>';
    $table .= ' <tr><th>First Name</th> <th>Last Name</th> <th>ContactNo</th></tr>';
    while($record = mysqli_fetch_assoc($result_set)){
        $table .= '<tr>';
        $table .= '<td>'.$record['FirstName'].'</td>';
        $table .= '<td>'.$record['LastName'].'</td>';
        $table .= '<td>'.$record['ContactNo'].'</td>';
        $table .= '</tr>';
      }
      $table .= '</table>';
    
    
    $query2 = "select * from exhibition";
    $result_set2 = mysqli_query($connection, $query2);
    $table2 = '<table id="customers">';
    $table2 .= '<tr><th>Exhibitions</th></tr>';
    $table2 .= ' <tr><th>Name </th> <th> Venue </th> <th> Date </th> <th>Organizers Name</th> </tr>'; 
    /*<th>Organizers Name</th><th>Organizers Number</th></tr>*/
    while($record2 = mysqli_fetch_assoc($result_set2)){
        $table2 .= '<tr>';
        $table2 .= '<td>'.$record2['name'].'</td>';
        $table2 .= '<td>'.$record2['venue'].'</td>';
        $table2 .= '<td>'.$record2['date'].'</td>';
        $table2 .= '<td>'.$record2['organizerID'].'</td>';
        /*$table2 .= '<td>'.$record2['ContactNO'].'</td>';*/
        $table2 .= '</tr>';
      }
      $table2 .= '</table>';

      $query3 = "select * from people where people.jobtype = 'photographer' ";
    $result_set3 = mysqli_query($connection, $query3);
    $table3 = '<table id="customers">';
    $table3 .= '<tr><th>Photographers</th></tr>';
    $table3 .= ' <tr><th>First Name</th> <th>Last Name</th> <th>ContactNo</th></tr>';
    while($record3 = mysqli_fetch_assoc($result_set3)){
        $table3 .= '<tr>';
        $table3 .= '<td>'.$record3['FirstName'].'</td>';
        $table3 .= '<td>'.$record3['LastName'].'</td>';
        $table3 .= '<td>'.$record3['ContactNo'].'</td>';
        $table3 .= '</tr>';
      }
      $table3 .= '</table>';

      $query4 = "select * from people where people.jobtype = 'Event Organizer' ";
      $result_set4 = mysqli_query($connection, $query3);
      $table4 = '<table id="customers">';
      $table4 .= '<tr><th>Event Organizer</th></tr>';
      $table4 .= ' <tr><th>First Name</th> <th>Last Name</th> <th>ContactNo</th></tr>';
      while($record4 = mysqli_fetch_assoc($result_set4)){
          $table4 .= '<tr>';
          $table4 .= '<td>'.$record4['FirstName'].'</td>';
          $table4 .= '<td>'.$record4['LastName'].'</td>';
          $table4 .= '<td>'.$record4['ContactNo'].'</td>';
          $table4 .= '</tr>';
        }
        $table4 .= '</table>';

        $query5 = "select * from equipments ";
        $result_set5 = mysqli_query($connection, $query5);
        $table5 = '<table id="customers">';
        $table5 .= '<tr><th>Equipments</th></tr>';
        $table5 .= ' <tr><th>Equipment ID</th> <th>Equipment Type</th> <th>Price</th></tr>';
        while($record5 = mysqli_fetch_assoc($result_set5)){
            $table5 .= '<tr>';
            $table5 .= '<td>'.$record5['equipmentID'].'</td>';
            $table5 .= '<td>'.$record5['Type'].'</td>';
            $table5 .= '<td>'.$record5['price'].'</td>';
            $table5 .= '</tr>';
          }
          $table5 .= '</table>'; 
          
          $query6 = "select * from courses";
    $result_set6 = mysqli_query($connection, $query6);
    $table6 = '<table id="customers">';
    $table6 .= '<tr><th>Courses</th></tr>';
    $table6 .= ' <tr><th>courseID</th> <th>Price</th> <th>Course Title</th> <th>Course Teacher</th></tr>';
    while($record6 = mysqli_fetch_assoc($result_set6)){
        $table6 .= '<tr>';
        $table6 .= '<td>'.$record6['courseID'].'</td>';
        $table6 .= '<td>'.$record6['price'].'</td>';
        $table6 .= '<td>'.$record6['courseTitle'].'</td>';
        $table6 .= '<td>'.$record6['courseTeacher'].'</td>';
        $table6 .= '</tr>';
      }
      $table6 .= '</table>';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title></title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='photographer.css'>
</head>
<body style="background-image: url(https://www.pandotrip.com/wp-content/uploads/2016/07/li-Photo-by-Santo-980x572.jpg);">
    <div class="topic">
      <lable style="color:white">Welcome to the Database</lable>
    </div>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class="containertable">
            <?php
              echo $table;
            ?>
            </div>
        </div>
        <div class = "moverright">
            <div class="containertable">
            <?php
              echo $table2;
            ?>
            </div>
        </div>
        
    </div>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class = "containertable">
            <?php
              echo $table3;
            ?>
            </div>
        </div>
            <div class = "moverright">
                <div class="containertable">
                <?php
                echo $table4;
                ?>
                </div>
            </div>
    </div>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class="containertable">
            <?php
              echo $table5;
            ?>
            </div>
        </div>
        <div class = "moverright">
            <div class="containertable">
            <?php
              echo $table6;
            ?>
            </div>
        </div>
    </div>
    
</body>
</html>
<?php mysqli_close($connection) ?>