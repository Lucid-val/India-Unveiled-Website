<?php
include("php/config.php");
session_start();
//     $place_name = htmlspecialchars($_GET['place_name']);
//     echo '<h1>Information about ' . $place_name . '</h1>';
// } else {
//     echo '<h1>Place information not available.</h1>';
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
    <script src="https://kit.fontawesome.com/d7810fec34.js" crossorigin="anonymous"></script>
    <title>Place info</title>
    <link rel="stylesheet" type="text/css" href="place_info.css"/>
</head>
<body>










    <!-- NAVBAR -->
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">
                    <img src="Logos/Logo IU 2.png" alt="" id="logo">India Unveiled</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav justify-content-center">
                    <li class="navbar-item">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php" class="nav-link">About</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php" class="nav-link">Explore</a>
                    </li>
                    <li class="navbar-item">
                        <a href="index.php" class="nav-link">Contact</a>
                    </li>
                    <!-- <li class ="navbar-item">
                        <a href="php/logout.php">Logout</a>
                    </li> -->
                        <?php
                            if(isset($_SESSION['user_name'])&& $_SESSION['is_admin'] == 0)  {
                        ?>
                                <li class="nav-item dropdown">
                                <a href='#' class='nav-link dropdown-toggle' role ="button" data-bs-toggle="dropdown" ><img style='width : 40px; height : 40px; border-radius : 50%;' src="profiles/<?php echo $_SESSION['user_pic']; ?>"></a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                            <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
                                            
                                        </ul>
                                </li>
                        <?php
                            }
                            elseif(isset($_SESSION['user_name']) && $_SESSION['is_admin'] == 1) {
                                ?>
                                <li class="nav-item dropdown">
                                    <a href='#' class='nav-link dropdown-toggle' role ="button" data-bs-toggle="dropdown" ><img style='width : 40px; height : 40px; border-radius : 50%;' src="profiles/<?php echo $_SESSION['user_pic']; ?>"></a>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                                            <li><a class="dropdown-item" href="php/logout.php">Logout</a></li>
                                            <li><a class="dropdown-item" href="admin_redirect.php">Admin Panel</a></li>
                                            
                                        </ul>
                                </li>
                        <?php
                            }
                            else
                            {
                                ?>
                                <li class="navbar-item">
                                    <a href='LGS.php' class='nav-link'>Login</a>
                                </li>
                                <?php    
                            }
                        ?>
                               
                </ul>
            </div>

            </div>
        </nav>




<?php

$place_name =$_COOKIE['place'];
$sql = "SELECT * FROM `place` WHERE `place_name` = ?";
$stmt = $conn->prepare($sql);
$stmt->execute([$place_name]);

$place = $stmt->fetchAll();
$pname ='';
$pstate ='';
$pinfo ='';
$pimg ='';
foreach($place as $p)
{
    $pname = $p['place_name'];
    $pstate = $p['place_state'];
    $pinfo = $p['place_info'];
    $pimg = $p['place_image'];
}

// $sql2 = "SELECT * FROM place WHERE `user_name` = ?";
// $stmt2 = $conn->prepare($sql2);
// $stmt2->execute($_SESSION['user_name']);

// $user = $stmt2->fetchall();

// foreach($user as $u)
// {
//     $uname = $u['user_name'];
       
// }


$sql2 = "SELECT `like` FROM `feedback` WHERE `user_name` = ? AND `place_name` = ?";

$stmt2 = $conn->prepare($sql2);

$stmt2->execute([$_SESSION['user_name'],$place_name]);

$rc = $stmt2->fetchColumn();


// sum of likes of places

$like_sum_sql = "SELECT SUM(`like`) from `feedback` WHERE `place_name` = ?";

$stmt3 = $conn->prepare($like_sum_sql);

$stmt3->execute([$place_name]);

$likesum = $stmt3->fetchColumn();


// comment









?>

<div class = "container-fluid">
    <div class = "row">
    <div class = "col-sm-6 container-fluid" id = "imagediv">
        <img class ="expimg ms-5" src="explore_images/<?php echo $pimg ; ?>">
    </div>
    <div class = "col-sm-5 container-fluid" id = "infodiv">
        <h1 class = "pname"><?php echo $place_name;?></h1>
        <em id = "state_cap"><?php echo $pstate;?></em>
        <br>
        <br>
        <em style="font-size: 20px; text-decoration: underline;">Description</em>
        <br>
        
        <p class = "pinfo" style="font-size: 20px;"><?php echo $pinfo ;?></p>
        <br>
            <div>
                <div class= "row">
                    <em style="font-size: 30px;" class="col-4"><?php echo $likesum ?> Likes </em> 
                <div class = "col-4">
                   <?php
                    if($rc == 0)
                    {
                    ?>    
                    <a href="php/like.php"><i class="fa-regular fa-heart" style="color: #ff0000; font-size: 60px; text-decoration: none;"></i></a>
                    <?php
                    }
                    else
                    {
                    ?>    
                    <a href="php/like.php"><i class="fa-solid fa-heart" style="color: #ff0000; font-size: 60px; text-decoration: none;"></i></a>
                    <?php
                    }
                    ?>
                    <br>  
                </div>
                
                <!-- <div class = "col-2"></div>
                    <div class="col-2">
                    <?php// if(isset($_GET['error'])){ ?>         
                            <div class="container alert alert-danger" role="alert">
                                <?php// echo $_GET['error']; ?>
                                    </div>
                        <?php// } ?>
                                    
                        
                        <?php //if(isset($_GET['success'])){ ?>
                            <div class="container alert alert-success" role="alert">
                                <?php //echo $_GET['success']; ?>
                            </div>
                        <?php// } ?>

                    </div> -->
                </div>
            <div >
                <!-- comment div -->
                <em style="font-size: 30px;">Comments</em>
                <br>
                <br>
            <div class = "container-fluid col-sm-12" id="commentdiv">
                <!-- overflow-y : scroll; -->
                <?php
                        // loop thrugh all the comment from feedback table where place = cookie place
                    $comm_sql = "SELECT * FROM `feedback` WHERE `place_name` = ? AND `comment` IS NOT NULL";
                    $stmt4 = $conn->prepare($comm_sql);
                    $stmt4->execute([$place_name]);
                    $comm = $stmt4->fetchall();
                    foreach($comm as $c)
                    {
                        $uname = $c['user_name'];
                        $comment = $c['comment'];
                        echo "<div class='container'>";
                        echo    "<em style='text-decoration: underline; font-size: 20px;'>".$uname."</em>";
                        echo "<div class='card w-75'>";
                        echo    "<div class='card-body'><h4>".$comment."</h4></div>";
                        echo "</div>";
                        echo "</div>";
                        echo "<br>";
                    }
                ?>
                </div>

                <div>
                    <!-- responsible for giving the comment  -->
                </div>
            </div>
        </div>
        <br>
        <br>
        <form action="php/comment.php" method="post">
        <div class="row">
        <div class="col-sm-10">
            <textarea placeholder="Comment Here..." name="comment" class="form-control"></textarea>
        </div>
        <div class="col-sm-2">
            <input type="submit" value="post" name="but" class="form-control">
        </div>
        </div>
            
        </form>
        
        

    </div>
    </div>
    

</div>


















    


</body>
</html>




<?php

?>