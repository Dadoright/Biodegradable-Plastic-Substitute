<?php require_once('connection.php'); ?>
<?php

  session_start();
  $title = (isset($_GET["title"]) ? $_GET["title"] : '');
  $cid = (isset($_GET["cid"]) ? $_GET["cid"] : ''); 
  $price = (isset($_GET["price"]) ? $_GET["price"] : ''); 
  $level = (isset($_GET["level"]) ? $_GET["level"] : '');

  $query = "INSERT INTO courses 
        (courseID,price,courseTitle,difficultyLevel,courseTeacher)
        VALUES ('{$cid}','{$price}','{$title}','{$level}','{$_SESSION['userID']}')";
  mysqli_query($connection, $query);

  $query1 = "select * from people where people.jobtype = 'photographer' ";
  $result_set = mysqli_query($connection, $query1);
  $table = '<table id="customers">';
  $table .= '<tr><th>Photographers</th></tr>';
  $table .= ' <tr><th>First Name</th> <th>Last Name</th> <th>ContactNo</th></tr>';
  while($record = mysqli_fetch_assoc($result_set)){
    $table .= '<tr>';
    $table .= '<td>'.$record['FirstName'].'</td>';
    $table .= '<td>'.$record['LastName'].'</td>';
    $table .= '<td>'.$record['ContactNo'].'</td>';
    $table .= '</tr>';
  }
  $table .= '</table>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Event Organizers</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='photographer.css'>
</head>
<body style="background-image: url(https://samektest2.blogs.bucknell.edu/files/2020/04/BucknellSamek_KressGallery_Zoom.jpg);">
    <div class="topic">
        <label style="color:white">Event Organizers</label>
    </div>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class="containertable">
                <?php echo $table;?>
            </div>
        </div>
        <form action="tutor.php">
        <div class="moverright">
            <div class="containerform">
            <div class="secondarytopic">
                <label>Enter details about the Exhibitions</label>
            </div>
            <div class="row">
                    <div class="col-25">
                    <label for="pname">Exhibition Name</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="ex" name="ex" placeholder="Name of the Exhibition..">
                    </div>
                </div>
            <div class="row">
                <div class="col-25">
                <label for="genre">Date</label>
                </div>
                <div class="col-75">
                <input type="text" id="date" name="date" placeholder="Opening Date..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="price">Venue</label>
                </div>
                <div class="col-75">
                    <input type="text" id="venue" name="venue" placeholder="Venue..">
                </div>
            </div>
            <br>
            <div class="row">
                <input type="submit" value="UPLOAD">
            </div>
            </div>
        </div>
    </div>
    </form>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class = "containertable">
                <table>
                    <tr>
                        <th>Equipment Id</th> <th>Equipment Type</th> <th>Equipment Model</th> <th>Price</th>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                </table>
            </div>
        
        
        </div>
        <div class="moverright1">
            <div class = "containertable">
                <table>
                    <tr>
                        <th>Equipment Id</th> <th>Equipment Type</th> <th>Equipment Model</th> <th>Price</th>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="moverbottom2">
        <div class="moverleft">
            <div class = "containertable">
                <table>
                    <tr>
                        <th>Equipment Id</th> <th>Equipment Type</th> <th>Equipment Model</th> <th>Price</th>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                </table>
            </div>
        
        
        </div>
        <div class="moverright1">
            <div class = "containertable">
                <table>
                    <tr>
                        <th>Equipment Id</th> <th>Equipment Type</th> <th>Equipment Model</th> <th>Price</th>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                    <tr>
                        <td>1234</td>
                        <td>Camera</td>
                        <td>Canon</td>
                        <td>125000</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
<?php require_once('connection.php'); ?>