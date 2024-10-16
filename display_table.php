<?php

session_start();

if (isset($_SESSION['user_name']))
{

  include("php/config.php");



  echo "<div class =' container justify-content-center align-items-center'>";
  echo "<table class='table table-bordered table-hover'>";
  echo "<thead>";
  echo "<tr><th>User Email</th><th>User Name</th><th>Full Name</th><th>Phone Number</th><th>Admin</th><th></th><th>Banned</th><th></th></tr>";
  echo "</thead>";
  echo "<tbody>";
  
  // class TableRows extends RecursiveIteratorIterator 
  // {
  //     function __construct($it) {
  //         parent::__construct($it, self::LEAVES_ONLY);
  //     }

  //     function current() {
  //       static $column = 0;
  //       static $row = [];
        
  //       // Collect row data
  //       $row[] = parent::current();
  //       $column++;

  //       // Reset column counter after each row
  //       if ($column === 6) {
  //           $column = 0;
  //           $email = $row[0];
  //           $buttons = "<td><a class='btn btn-primary' href='update.php?user_email=$email'>Update</a></td>";
  //           $buttons .= "<td><a class='btn btn-danger' href='delete.php?user_email=$email'>Delete</a></td>";
  //           $result = "<td></td>" . $buttons;
  //           $row = [];
  //           return $result;
  //       }

  //       return "<td>" . parent::current() . "</td>";
  //   }

  //     function beginChildren() {
  //         echo "<tr>";
  //     }

  //     function endChildren() {
  //         echo "</tr>" . "\n";
  //     }
  // }

  
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
    <title>Display Table</title>
</head>
<body>

<div class="text-center mt-5">
  <h1>User Information</h1>
</div>

<br>
<br>

<?php
      try {

          $stmt = $conn->prepare("SELECT user_email, user_name, full_name, ph_no , is_admin, ban FROM sign_up");
          $stmt->execute();

          // set the resulting array to associative
          // $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
          
          // foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
          //     echo $v;
          // }
          $users = $stmt->fetchAll();
          foreach($users as $user){
            echo "<tr>" ;
            echo    "<td>" . $user['user_email'] . "</td>";
            echo    "<td> " . $user['user_name'] . "</td>";
            echo    "<td> " . $user['full_name'] . "</td>";
            echo    "<td> " . $user['ph_no'] . "</td>";
            echo    "<td> " . $user['is_admin'] . "</td>";
            echo    '<td><a class="btn btn-primary text-light" href="php/admin_update.php?user_name='.$user['user_name'].'">UPDATE</a></td>';
            echo    "<td> " . $user['ban'] . "</td>";
            if($user['ban'] == 0)
            {
              echo    '<td><a class="btn btn-warning text-light" href="php/ban_user.php?user_name='.$user['user_name'].'">BAN</a></td>';
            }
            else
            {
              echo    '<td><a class="btn btn-warning text-light" href="php/ban_user.php?user_name='.$user['user_name'].'">UNBAN</a></td>';
            }
            
            echo    '<td><a class="btn btn-danger text-light" href="php/delete_user.php?user_name='.$user['user_name'].'">DELETE</a></td>';
            echo    "</tr>" ;
          }
      }
      catch(PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      echo "</tbody>";
      echo "</table>";

?>
</div>

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
    <div class="container alert alert-success" role="alert">
        <?php echo $_GET['success']; ?>
    </div>
<?php } ?>

<?php if(isset($_GET['warn'])){ ?>
    <div class="container alert alert-warning" role="alert">
        <?php echo $_GET['warn']; ?>
    </div>
<?php } ?>


<!-- <script>
  let a= document.querySelectorAll("#update") 
    a.forEach((b)=>{
      b.onclick =()=>{
        console.log(b.value)
      }
    })
</script> -->
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

