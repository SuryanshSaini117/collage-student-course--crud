<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .err{
            color:white;
            background: red;
            height:50px;
            font-size:30px;
             font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            session_start();
            if(isset($_SESSION['err_message'])){
        ?>
            <!-- <div class=" row err"> -->
                <?php echo  $_SESSION['err_message'];?>
            <!-- </div>  -->
        <?php   }
        session_destroy();
        ?>
        <form action="add-backend.php" method="post" enctype="multipart/form-data">
            <h2 style="text-align: center;"><b><ul>student details</ul></b></h2>
            <label for="file" class="form-label">image</label>
            <input type="file" name="file" class="form-control" Required>

             <label for="name" class="form-label">name</label>
            <input type="text" name="name" class="form-control">

            
            <label for="father_name" class="form-label">father name</label>
            <input type="text" name="father_name" class="form-control">
            
            <label for="phone_no" class="form-label">phone no.</label>
            <input type="text" name="phone_no" class="form-control">
            
            <!-- <label for="gender">gender:</label>
            <label for="gender" class="form-label ">male</label>
            <input type="radio" name="gender" id="" class="form-check-input" value="male">
            <label for="gender" class="form-label">female</label>
            <input type="radio" name="gender" id="" class="form-check-input" value="female"> -->
            <!-- <label for="gender">gender</label> -->
            <div class="form-check">
            <input type="radio" name="gender" id="male" value="male" checked>
            <label for="male" class="form-label">male</label>
            </div>
            <div class="form-check">
                <input type="radio" name="gender" id="female" value="female">
                <label for="female" class="form-label">female</label>
            </div>
            <label for="course">select your course</label>
            <select name="course" id="" class="form-select">
                <option value="mca" class="form-select">MCA</option>
                <option value="bca" class="form-select">BCA</option>
                <option value="mtech" class="form-select">M.TECH</option>
                <option value="btech" class="form-select">B.TECH</option>
            </select>
           <div class="row">
             <label for="message" class="form-label">message:</label>
            <textarea name="message" id="" rows="4" class=""></textarea>
           </div>
           <br>
           <button class="btn btn-info" name="submit">submit</button>
        </form>

    </div>
</body>
</html>