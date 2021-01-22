<?php require_once('connection.php'); ?>
<?php
    session_start();

    $pID = (isset($_GET["pID"]) ? $_GET["pID"] : '');
    $genre = (isset($_GET["genre"]) ? $_GET["genre"] : ''); 
    $price = (isset($_GET["price"]) ? $_GET["price"] : ''); 
    $pcolor = (isset($_GET["pcolor"]) ? $_GET["pcolor"] : '');

    $query = "INSERT INTO photo 
        VALUES ('{$pID}','{$price}','{$genre}','{$_SESSION["userID"]}','{$pcolor}')";
    mysqli_query($connection, $query);
    
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Photographers</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='photographer.css'>
</head>
<body style="background-image: url(https://dvyvvujm9h0uq.cloudfront.net/com/articles/1543483387-reinhart-julian-1145947-unsplash.jpg);">
    <div class="topic" >
        <label style="color:green">PHOTOGRAPHERS</label>
    </div>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class="containertable">
            <?php
              echo $table;
            ?>
            </div>
        </div>
        <div class="moverright">
            <div class="containerform">
            <div class="secondarytopic">
                <label>Upload a Photo</label>
            </div>
            <div class="row">
                    <div class="col-25">
                    <label for="pname">Photo Name</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="pname" name="pname" placeholder="Name of Your photo..">
                    </div>
                </div>
            <div class="row">
                    <div class="col-25">
                    <label for="pID">Photo ID</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="pID" name="pID" placeholder="Your photo ID..">
                    </div>
                </div>
            <div class="row">
                <div class="col-25">
                <label for="genre">Genre</label>
                </div>
                <div class="col-75">
                <input type="text" id="genre" name="genre" placeholder="Genre of your Photo..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="price">Price</label>
                </div>
                <div class="col-75">
                    <input type="text" id="price" name="price" placeholder="Price of Your Photo..">
                </div>
            </div>
            <div class="row">
            <div class="col-25">
                    <label for="pcolor">Color</label>
                    </div>
            <div class="col-75">
                  <select id="pcolor" name="pcolor">
                    <option value="blackandwhite">Black and White</option>
                    <option value="colored">Colored</option>
                  </select>
            </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="UPLOAD">
            </div>
            </div>
        </div>
    </div>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class = "containertable">
            <?php
              echo $table2;
            ?>
            </div>
        
        
        </div>
        
    </div>
    
</body>
</html>
<?php mysqli_close($connection) ?>