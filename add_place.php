<?php


session_start();

if (isset($_SESSION['user_name']))
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/d7810fec34.js" crossorigin="anonymous"></script>
</head>
<body>


<div class="text-center mt-5">
  <h1>Add Offbeat Place Information</h1>
</div>


<form action="php/add_place2.php" class = "mt-5 container form-control" method = "post" enctype="multipart/form-data">

<div class = "row">
    <div class = "col-sm-4">
        <label for="">Name of Place</label>
    </div>
    <div class = "col-sm-8">
        <input type="text" class = "form-control" name = "p_name">
    </div>
    <br>
    <br>


    <div class = "col-sm-4">
        <label for="">Enter State</label>
    </div>
    <div class = "col-sm-8">
    <select class="form-select" aria-label="Default select example" name = "p_state">
        <option selected>Select State---</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="D&H">D&H</option>
        <option value="Delhi">Delhi</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Ladakh">Ladakh</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Odisha">Odisha</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="West Bengal">West Bengal</option>
    </select>
    </div>


    <br>
    <br>


    <div class = "col-sm-4">
        <label for="">Enter Description of the Place</label>
    </div>
    <div class = "col-sm-8">
    <textarea class="form-control" aria-label="With textarea" name = "p_desc"></textarea>
    </div>




    <br>
    <br>
    <br>



    <div class = "col-sm-4">
        <label for="">Add image</label>
    </div>
    <div class = "col-sm-8">
    <input type="file" class="form-control" id="file" accept=".jpg, .jpeg, .png" name="p_image">
    </div>
    <br>
    <br>




    <br>
    

    <div class="col-sm-5"></div>
    <div class = "col-sm-2 text-center">
        <input type="submit" class = "btn btn-primary form-control" name = "submit" value = "submit">
    </div>


    <div class="col-sm-3"></div>    
</div>


</form>

<br>
<br>
<br>
<div class="container text-center">
  <h4><a href="php/admin_logout.php">Home Page</a></h4>
</div>

<div class="container text-center">
  <h4><a href="admin_redirect.php">Go back</a></h4>
</div>

<?php if(isset($_GET['error'])){ ?>               
    <div class="container alert alert-danger" role="alert">
        <?php echo $_GET['error']; ?>
    </div>
<?php } ?>
                
    
<?php if(isset($_GET['success'])){ ?>
    <div class="conatiner alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
    </div>
<?php } ?>

    
</body>
</html>

