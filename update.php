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
        
            include_once 'db-connection.php';
            $id = $_GET['id'];
            // print_r( $id);die();
            $result = mysqli_query($conn,"SELECT * FROM student WHERE id = '$id'");
            $value = mysqli_fetch_assoc( $result);
            // print_r($value);die();
        ?>
    <div class="container">
        <form action="update-backend.php?id=<?php echo $value['id']?>" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center;"><b><ul>student details</ul></b></h2>
            <label for="file" class="form-label">image</label>
            <input type="file" name="file" class="form-control" value="<?php echo $value['file']?>">
             <img style="max-height: 100px; min-height:100px;" src="images/<?php echo $value['file']?>"/><br><br>

             <label for="name" class="form-label">name</label>
            <input type="text" name="name" class="form-control" value="<?php echo $value['name']?>">

            
            <label for="father_name" class="form-label">father name</label>
            <input type="text" name="father_name" class="form-control" value="<?php echo $value['father_name']?>">
            
            <label for="phone_no" class="form-label">phone no.</label>
            <input type="text" name="phone_no" class="form-control" value="<?php echo $value['phone_no']?>">
            
            <!-- <label for="gender">gender:</label>
            <label for="gender" class="form-label ">male</label>
            <input type="radio" name="gender" id="" class="form-check-input" value="male">
            <label for="gender" class="form-label">female</label>
            <input type="radio" name="gender" id="" class="form-check-input" value="female"> -->
            <!-- <label for="gender">gender</label> -->
            <div class="form-check">
            <input <?php echo $value['gender'] == 'male' ? 'checked': '';?> type="radio" name="gender" id="male" value="male">
            <label for="male" class="form-label">male</label>
            </div>
            <div class="form-check">
                <input <?php echo $value['gender'] == 'female' ? 'checked': '';?> type="radio" name="gender" id="female" value="female">
                <label for="female" class="form-label">female</label>
            </div>
            <label for="course">select your course</label>
            <select name="course" id="" class="form-select">
                <option value="mca" class="form-select" <?php echo  $value['course'] == 'mca' ? 'selected': '';?>>MCA</option>
                <option value="bca" class="form-select" <?php echo  $value['course'] == 'bca' ? 'selected': '';?>>BCA</option>
                <option value="mtech" class="form-select" <?php echo  $value['course'] == 'mtech' ? 'selected': ''; ?>>M.TECH</option>
                <option value="btech" class="form-select" <?php echo  $value['course'] == 'btech' ? 'selected': '';?>>B.TECH</option>
            </select>
           <div class="row">
             <label for="message" class="form-label">message:</label>
            <textarea name="message" id="" rows="4" class=""><?php echo $value['message']?></textarea>
           </div>
           <br>
           <button class="btn btn-info" name="submit">submit</button>
        </form>

    </div>
</body>
</html>