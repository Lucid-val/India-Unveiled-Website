<?php
session_start();
if (isset($_SESSION['user_name']) || isset($_SESSION['user_email']) || isset($_SESSION['full_name']) || isset($_SESSION['ph_no']) || isset($_SESSION['user_pic'])) 
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
    <script src="https://kit.fontawesome.com/d7810fec34.js" crossorigin="anonymous"></script>
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="profile.css" />
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



<div class = "bg1">
    <div class = "parea row">

        <div class = "content-frame col-sm-3">

            <ul class = "nav flex-column">
                <li class="navbar-item">
                    <a href="#" onclick="userinfo()" class="nav-link">User Information</a>
                </li>
                <li class="navbar-item">
                    <a href="#" class="nav-link" onclick="edit()">Edit Profile</a>
                </li>
                <li class="navbar-item">
                    <a href="#" class="nav-link" onclick="userlikes()">Your Likes</a>
                </li>
                <li class="navbar-item">
                    <a href="#" class="nav-link" onclick="userrevs()">Your Reviews</a>
                </li>
                <li class="navbar-item">
                    <a href='#' class='nav-link' onclick="reportbug()">Report a Bug</a>
                </li>
                
            </ul>

            
        </div>
    <div class="col-sm-1 lined"></div>





    <!-- EDIT INFORMATION -->


    <div class="epf container col-sm-8" id = "epf">

                <div class= "text-div align-content-center text-center">
                    <h1>Edit Information</h1>
                </div>
                <div class="text-div3 align-content-center text-center row">
                    
                <form action="php/update.php" class = "row" method="post" enctype="multipart/form-data"> 
                    
                    <div class = "col-sm-6"><h2>Profile Picture</h2> 
                    </div>
                    <br>
                    <div class = "col-sm-6" ><img src="profiles/<?php echo $_SESSION['user_pic']; ?>" class="img-fluid" style='width : 100px; height : 100px;'></div>
                    <div class = "col-sm-6"> 
                    </div>
                    <div class = "col-sm-6" ><input type="file" class="form-control" id="file" accept=".jpg, .jpeg, .png" name="image"></div>
                    <br>
                    <div class = "col-sm-6"><h2>Username</h2>
                    </div>
                    <br>
                    <div class = "col-sm-6"><input type="text" size="50" name = "up_name" style="border: none; padding: 10px; border-radius: 10px;"value= <?=$_SESSION['user_name']?>>
                    </div> 
                    <br>
                    <div class = "col-sm-6"><h2>Email</h2>
                    </div>
                    <br>
                    <div class = "col-sm-6"><input type="text" size="50" name = "up_email" style="border: none; padding: 10px; border-radius: 10px;"value= <?=$_SESSION['user_email']?>>
                    </div>
                    <br>
                    <div class = "col-sm-6"><h2>Full Name</h2>
                    </div>
                    <div class = "col-sm-6"><input type="text" size="50" name = "up_fname" style="border: none; padding: 10px; border-radius: 10px;" value= "<?=$_SESSION['full_name']?>">
                    </div>
                    <div class = "col-sm-6"><h2>Phone Number</h2>
                    </div>
                    <div class = "col-sm-6"><input type="text" size="50" name = "up_phno" style="border: none; padding: 10px; border-radius: 10px;"value= <?=$_SESSION['ph_no']?>>
                    </div>

                    <input type="submit" class = "btn btn-light col-sm-1 center">

                </form>

                
                </div>
        </div>







        <!-- USER INFORMATION  -->

    

        <div class ="pfp container col-sm-8 " id = "pfp">

            <img src="profiles/<?php echo $_SESSION['user_pic']; ?>" class="center" style='width : 200px; height : 200px;'>

            <div class= "text-div align-content-center text-center">
                <h1><?=$_SESSION['user_name']?></h1>
            </div>

            <div class="text-div2 align-content-center text-center row">
                <h1>User Information</h1>
                <div class = "col-sm-6"><h2>Username</h2>
                </div>
                <br>
                <div class = "col-sm-6"><h2><?=$_SESSION['user_name']?></h2>
                </div>
                <br>
                <div class = "col-sm-6"><h2>Email</h2>
                </div>
                <br>
                <div class = "col-sm-6"><h2><?=$_SESSION['user_email']?></h2>
                </div>
                <br>
                <div class = "col-sm-6"><h2>Full Name</h2>
                </div>
                <div class = "col-sm-6"><h2><?=$_SESSION['full_name']?></h2>
                </div>
                <div class = "col-sm-6"><h2>Phone Number</h2>
                </div>
                <div class = "col-sm-6"><h2><?=$_SESSION['ph_no']?></h2>
                </div>
                
            </div>
            
        </div>



        <!-- USER LIKES -->

        <?php

        $sql_likes = "SELECT f.*, p.place_image FROM feedback f INNER JOIN place p ON f.place_name = p.place_name WHERE f.like = 1 AND f.user_name = ?;";
        $stmt2 = $conn->prepare($sql_likes);
        $stmt2->execute([$_SESSION['user_name']]);
        $rc = $stmt2->rowCount();
        $likes = $stmt2->fetchAll();
        ?>





        

        <div class ="yls container col-sm-8 " id = "yls">
            <div class= "text-div align-content-center text-center">
                <h1>YOUR LIKES</h1>
                
            </div>
            <div class="text-div4 align-content-center text-center row">
                <?php
                if($rc == 0)
                {
                    echo "<div class='text-center'>";
                    echo "<h1> You haven't Liked on any place yet </h1>";
                    echo "</div>"; 
                }
                else
                {
                    echo "<div class='wrapper'>";
                    foreach($likes as $user){

                        echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                        echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                        echo    '<div class="info">';
                        echo        '<h1>'. $user['place_name'] .'</h1>';
                        echo    '</div>';
                        echo '</div> </a>';
                    } 
                    echo "</div>";   
                }

                ?>
            </div>
        </div>






        <!-- USER REVIEWS -->
        <?php
                // loop thrugh all the comment from feedback table where place = cookie place
            $comm_sql = "SELECT * from feedback WHERE user_name = ? AND `comment` IS NOT NULL;";
            $stmt3 = $conn->prepare($comm_sql);
            $stmt3->execute([$_SESSION['user_name']]);
            $rc_comm = $stmt3->rowCount();
            $comm = $stmt3->fetchall();
            
        ?>





        <div class ="yrv container col-sm-8 " id = "yrv">
            <div class= "text-div align-content-center text-center">
                <h1>YOUR REVIEWS</h1>
            </div>
            <div class="text-div4 row">
            <?php
            if($rc_comm == 0)
            {
                echo "<div class='align-content-center text-center'>";
                echo "<h1> You haven't Commented on any place yet </h1>";
                echo "</div>";
            }
            else
            {
                foreach($comm as $c)
                {
                    $uname = $c['user_name'];
                    $comment = $c['comment'];
                    $pname = $c['place_name'];
                    echo "<div class='container row'>";
                    echo "<h2>".$pname."</h2>";
                    echo "<div class='card h-50 col-sm-5'>";
                    echo "<div class='card-body'><h4>".$comment."</h4></div>";
                    echo "</div>";
                    echo "<div class='col-sm-2'>";
                    echo '<a class="btn btn-danger text-light" href="php/comment_del.php?place_name='.$pname.'"><i class="fa-solid fa-trash"></i></a>';
                    echo "</div>";
                    echo "</div>";
                }    
            }


            
            ?>
            <?php if(isset($_GET['warn'])){ ?>
                <div class="container col-4 alert alert-warning" role="alert">
                    <?php echo $_GET['warn']; ?>
                </div>
            <?php } ?>
            




            </div> 
        </div>




        <!-- REPORT BUG -->




        <div class ="rbg container col-sm-8 " id = "rbg">
            <!-- <img src="pfp.jpeg" alt="" class="center"> -->
            <div class= "text-div align-content-center text-center">
                <h1>REPORT A BUG</h1>
            </div>
            <div class="text-div4 align-content-center text-center ">
                <div class="mt-5">
                <form action="">
                    <textarea name="" id="" class="form-control" cols="1" rows="8" placeholder = "Write a Bug Report....."></textarea>
                    <br>
                    <input type="submit" class="btn btn-dark">
                </form>
                </div>
            </div>
        </div>





    </div>
</div>





</body>



<script>



        var pfp = document.getElementById("pfp"); 
        var epf = document.getElementById("epf");
        var yls = document.getElementById("yls");
        var yrv = document.getElementById("yrv");
        var rbg = document.getElementById("rbg");


    function userinfo()
    {
        pfp.style.zIndex = 12;
        epf.style.zIndex = 8;
        yrv.style.zIndex = 8;
        yls.style.zIndex = 8;
        rbg.style.zIndex = 8;

    }
    function edit()
    {

        pfp.style.zIndex = 8;
        epf.style.zIndex = 12;
        yrv.style.zIndex = 8;
        yls.style.zIndex = 8;
        rbg.style.zIndex = 8;
    }
    function userlikes()
    {

        pfp.style.zIndex = 8;
        epf.style.zIndex = 8;
        yrv.style.zIndex = 8;
        yls.style.zIndex = 12;
        rbg.style.zIndex = 8;
    }
    function userrevs()
    {

        pfp.style.zIndex = 8;
        epf.style.zIndex = 8;
        yrv.style.zIndex = 12;
        yls.style.zIndex = 8;
        rbg.style.zIndex = 8;
    }
    function reportbug()
    {

        pfp.style.zIndex = 8;
        epf.style.zIndex = 8;
        yrv.style.zIndex = 8;
        yls.style.zIndex = 8;
        rbg.style.zIndex = 12;
    }


</script>

<script>
    let cards_click = document.querySelectorAll(".card2") 
    cards_click.forEach((b)=>{
        b.onclick =()=>{
            var url = "?place=" + encodeURIComponent(b.innerText);
            window.open(`place_info.php${url}`);
            document.cookie = `place=${b.innerText}`;
        }
    })
</script>





</html>


<?php

}
else
{
    header("Location: index.php");
    exit;
}
?>