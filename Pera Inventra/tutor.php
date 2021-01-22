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
  if ($cid!='') { mysqli_query($connection, $query); }

  $query1 = "select *
  from people inner join courses
  on courses.courseTeacher=people.NIC";
  $result_set = mysqli_query($connection, $query1);
  $table = '<table id="customers">';
  $table .= '<tr><th>Courses</th></tr>';
  $table .= ' <tr><th>Tutor Name</th><th>ContactNo</th><th>Course Name</th><th>Price</th><th>Level</th></tr>';
  while($record = mysqli_fetch_assoc($result_set)){
    $table .= '<tr>';
    $table .= '<td>'.$record['LastName'].'</td>';
    $table .= '<td>'.$record['ContactNo'].'</td>';
    $table .= '<td>'.$record['courseTitle'].'</td>';
    $table .= '<td>'.$record['price'].'</td>';
    $table .= '<td>'.$record['difficultyLevel'].'</td>';
    $table .= '</tr>';
  }
  $table .= '</table>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Tutors</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='photographer.css'>
</head>
<body style="background-image: url(https://cdn3.vectorstock.com/i/1000x1000/95/32/online-courses-isometric-background-vector-24559532.jpg);">
    <div class="topic">
        <label style="color:white">Tutors</label>
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
                <label>Enter details about the courses</label>
            </div>
            <div class="row">
                    <div class="col-25">
                    <label for="pname">Course Title</label>
                    </div>
                    <div class="col-75">
                    <input type="text" id="title" name="title" placeholder="Name of course title..">
                    </div>
                </div>
            <div class="row">
                <div class="col-25">
                <label for="genre">Course ID</label>
                </div>
                <div class="col-75">
                <input type="text" id="cid" name="cid" placeholder="Enter course ID..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                    <label for="price">Price</label>
                </div>
                <div class="col-75">
                    <input type="text" id="price" name="price" placeholder="Price of the Course..">
                </div>
            </div>
            <div class="row">
                <div class="col-25">
                  <label for="field">Difficulty level</label>
                </div>
                <div class="col-75">
                  <select id="level" name="level">
                    <option value="beginner">Beginner</option>
                    <option value="intermidiate">Intermediate</option>
                    <option value="pro">Pro</option>
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
    </form>
  
</body>
</html>
<?php require_once('connection.php'); ?>