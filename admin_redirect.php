<?php

session_start();

if (isset($_SESSION['user_name']))
{

  include("php/config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>redirect</title>

    <style>
      
    </style>
</head>
<body>



<div class = " container row text-center justify-items-center">

<div class="card bg-info mt-5 ms-5 col-sm-4" style="width: 18rem; height: 10rem;">
  <div class="card-body">
    <h5><a href="display_table.php" class = "card-title">User Information</a></h5>
  </div>
</div>

<div class="card bg-info mt-5 ms-5 col-sm-4" style="width: 18rem; height: 10rem;">
  <div class="card-body">
    <h5><a href="add_place.php" class = "card-title">Add a place</a></h5>
  </div>
</div>

<div class="card bg-info mt-5 ms-5 col-sm-4" style="width: 18rem; height: 10rem;">
  <div class="card-body">
    <h5><a href="php/admin_logout.php" class = "card-title">Home page</a></h5>
  </div>
</div>


</div>



</body>
</html>

<?php

}
else
{
  header("Location: LGS.php");
  exit;
}

?>

