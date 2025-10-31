<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
              <?php
              include_once "db-connection.php";
            // include("db-connection");
            //   $students = mysqli_query($conn,"SELECT *FROM student");
            $students = mysqli_query($conn,"SELECT * FROM student");
            //   print_r($students);die();
              ?>  
    <div class="container">
         <?php
            session_start();
            if(isset($_SESSION['success'])){
        ?>
            <div class=" row session"> 
                <?php 
                    echo $_SESSION['success']; 
                ?>
            </div>
            <?php  }
                session_destroy();
            ?>
        <a href="add.php" class="btn btn-warning">add</a>
            <form action="" method="post" enctype="multipart/form-data">
        <table  class="table table-bordered table-responsive-md">
            <thead>
                <tr>
                    <th>sr.no</th>
                    <th>image</th>
                    <th>name</th>
                    <th>father name</th>
                    <th>phone no.</th>
                    <th>gender</th>
                    <th>course</th>
                    <th>message</th>
                    <th>status</th>
                    <th>created at</th>
                    <th>updated at</th>
                    <th>action</th>
                </tr>
            </thead>
             <?php foreach($students as $key => $student){?>
            <tbody>
                <tr>
                    <td><?php echo $key+1 ?></td>
                    <td><img style="max-height:100px; min-height:100px;" src="images/<?php echo $student['file']?>"/></td>
                    <td><?php echo $student['name']?></td>
                    <td><?php echo $student['father_name']?></td>
                    <td><?php echo $student['phone_no']?></td>
                    <td><?php echo $student['gender']?></td>
                    <td><?php echo $student['course']?></td>
                    <td><?php echo $student['message']?></td>
                    <td><?php echo $student['statuts']?></td>
                    <td><?php echo $student['created_at']?></td>
                    <td><?php echo $student['updated_at']?></td>
                    <td>
                        <a href="update.php?id=<?php echo $student['id']?>">update</a><br>
                        <a href="delete.php?id=<?php echo $student['id']?>">delete</a>
                    </td>
                </tr>
            </tbody>
            <?php } ?>
        </table>
    </form>
    </div>
</body>
</html>