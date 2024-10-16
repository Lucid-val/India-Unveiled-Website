<?php
session_start();
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


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
     integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
     crossorigin=""></script>

    <title>Explore</title>
    <link rel="stylesheet" type="text/css" href="explore.css"/>
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






























<!-- MAP -->
    
    <div class="container-fluid row">
        <div id="map" class="col-sm-6">

        </div>        


























<!-- SEARCH BAR -->

        <div class="row sb col-sm-5">
            <div class="col-sm-12"><h1 >Search Your Destination</h1></div>
            <br>
            <div class="col-sm-1"><form action="" >
            <input type="search" placeholder="Search Here..." id="searchBar">
            <i class="fa fa-search"></i>
            </form>
            </div>
        </div>

        

























<!-- RHS DIV WITH place_state NAMES -->


        <div class="textdiv col-sm-6">

            <div class="content-frame">


                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl1"><div class="search-item" id="p1">Assam</div></a>
                    <div id="cl1" class="collapse">
                        <div class="wrapper">
                        <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Assam'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl2"><div class="search-item"  id="p2">Bihar</div></a>
                    <div id="cl2" class="collapse">
                        <div class="wrapper">
                        <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Bihar'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl16"><div class="search-item"  id="p3">D&H</div></a>
                    <div id="cl16" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='D&H'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl17"><div class="search-item" id="p4">Delhi</div></a>
                    <div id="cl17" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Delhi'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3  cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl3"><div class="search-item" id="p5">Haryana</div></a>
                    <div id="cl3" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Haryana'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl4"><div class="search-item" id="p6">Himachal Pradesh</div></a>
                    <div id="cl4" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Himachal Pradesh'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl5"><div class="search-item" id="p7">Jharkhand</div></a>
                    <div id="cl5" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Jharkhand'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl6"><div class="search-item" id="p8">Ladakh</div></a>
                    <div id="cl6" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Ladakh'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl7"><div class="search-item" id="p9">Manipur</div></a>
                    <div id="cl7" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Manipur'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl8"><div class="search-item" id="p10">Meghalaya</div></a>
                    <div id="cl8" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Meghalaya'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                    </div>
                </div>
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl9"><div class="search-item" id="p11">Mizoram</div></a>
                    <div id="cl9" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Mizoram'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl10"><div class="search-item" id="p12">Odisha</div></a>
                    <div id="cl10" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Odisha'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl11"><div class="search-item" id="p13">Rajasthan</div></a>
                    <div id="cl11" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Rajasthan'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl12"><div class="search-item" id="p14">Sikkim</div></a>
                    <div id="cl12" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Sikkim'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl13"><div class="search-item" id="p15">Tamil Nadu</div></a>
                    <div id="cl13" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Tamil Nadu'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>
                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl14"><div class="search-item" id="p16">Uttar Pradesh</div></a>
                    <div id="cl14" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='Uttar Pradesh'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

                <div class="container mt-3 cl1">
                    <a href="" class="link-light" data-bs-toggle="collapse" data-bs-target="#cl15"><div class="search-item" id="p17">West Bengal</div></a>
                    <div id="cl15" class="collapse">
                    <div class="wrapper">
                    <?php
                                include("php/config.php");
                                $stmt = $conn->prepare("SELECT * FROM place where `place_state`='West Bengal'");
                                $stmt->execute();
                                $users = $stmt->fetchAll();
                                foreach($users as $user){
                                    $_SERVER['place_name'] = $user['place_name'];
                                    echo '<div class="card2" data-bs-toggle="modal" data-bs-target="#exampleModal">';
                                    echo    '<img src= explore_images/'. $user['place_image'] .' alt="">';
                                    echo    '<div class="info">';
                                    echo        '<h1>'. $user['place_name'] .'</h1>';
                                    echo    '</div>';
                                    echo '</div> </a>';                  
                                }
                                
                            ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

























<!-- INDIA MAP LEAFLET JS -->



<script>

        var map = L.map('map').setView([23.5937, 80.9629], 5);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        map.eachLayer(function(layer){
            map.removeLayer(layer);
        });

        L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
            attribution: 'Map tiles by Carto, under CC BY 3.0. Data by OpenStreetMap, under ODbL.',
            maxZoom: 19
        }).addTo(map);

     </script>












<!-- MARKER SCRIPTS -->



     <script>
        coords = [[26.9466, 94.1658], [25.1688, 93.0177],[25.879769, 91.4196],[25.001667, 85.446389],[25.598889, 85.184722],[25.004167, 85.416667],[24.835278, 83.53],[20.1829, 73.1521],[20.1798, 73.1605],[18.953975, 72.830217],[28.626111, 77.225],[28.514303, 77.178519],[28.511944, 77.260833],[30.6873, 77.0877],[30.7941, 76.9147],[28.4681, 76.8918],[32.0410, 76.8402],[32.0617, 77.2613],[31.5672, 77.3705],[31.70751797513719, 77.5692172739505],[23.3626, 85.4912],[23.575647502667547, 84.96130251896034],[22.2, 85.35],[34.2245, 77.2767],[34.575836, 77.494823],[34.282778, 76.774444],[34.1514, 77.5726],[24.8170, 93.9368],[25.2730, 94.0266],[25.0968, 94.3617],[25.30539444944638, 91.58511414227883],[25.452394278890978, 92.25653773327774],[25.26756091760074, 92.19753908117195],[25.23555179619614, 92.03491537301322],[23.7307, 92.7173],[23.4775, 93.3237],[23.6777, 92.6037],[19.9037, 84.1303],[19.8921, 86.0912],[20.491081100698576, 84.71867506561816],[24.6173, 73.6227],[26.9749, 73.4062],[24.5423, 73.6095],[27.2494, 76.1601],[27.1879, 88.6748],[27.1364, 88.3931],[27.0986, 88.3811],[11.4218, 76.8617],[10.1942, 77.9967],[11.0286, 79.8548],[10.3270, 76.9554],[25.3748, 78.7320],[24.9974, 80.4853],[25.2945, 79.8859],[26.1776, 89.4257],[27.0600, 88.0000],[27.043944625821986, 88.3782791883324],[20.2753, 73.0073]]

        places = ["Majuli, Assam","Haflong, Assam","Chandubi, Assam","Gridhhakuta Peak, Bihar","Kumhrar, Bihar","SonBhandar Caves, Bihar","Telhar Kund, Bihar","Dudhani, D&H","Kauncha, D&H","Swaminarayan, Mumbai","Agrasen Ki Baoli, Delhi","Jahaz Mahal, Delhi","Tughlaqabad, Delhi","Morni Hills, Haryana","Yadavindra Gardens, Haryana","Sultanpur Bird Sanctuary, Haryana","Barot, Himachal Pradesh","Malana, Himachal Pradesh","Shoja, Himachal Pradesh","Tirthan, Himachal Pradesh","Churni Falls ,Jharkhand","Nakta Pahad, Jharkhand","Saranda forest, Jharkhand","Basgo Monastery, Ladakh","Hundar Dunes, Ladakh","Lamayuru Monastery, Ladakh","Yarab Tso, Ladakh","Imphal, Manipur","Senapati, Manipur","Ukhrul, Manipur","Krem Chympe, Meghalaya","Lalong Park, Meghalaya","Leshka Dam, Meghalaya","Nongbareh Lyntiar, Meghalaya","Aizawl, Mizoram","Champai, Mizoram","Reiek, Mizoram","Daringbadi, Odisha","Konark, Odisha","Satokshia, Odisha","Badi Lake, Rajasthan","Khimsar, Rajasthan","Peepiliya, Rajasthan","Pratapgarh Fort, Rajasthan","Aritar, Sikkim","Singtam, Sikkim","Sumbuk, Sikkim","Kotagiri, Tamil Nadu","Sirumalai, Tamil Nadu","Tharangambadi, Tamil Nadu","Valparai, Tamil Nadu","Barua Sagar, Uttar Pradesh","Kalinjar, Uttar Pradesh","Mahoba, Uttar Pradesh","Shyamsing, West Bengal","Sandakphu, West Bengal","Tinchuley, West Bengal","Silvassa, D&H"]
        let l = coords.length;

        var p1 = document.querySelector('#p1');
        var p2 = document.querySelector('#p2');
        var p3 = document.querySelector('#p3');
        var p4 = document.querySelector('#p4');
        var p5 = document.querySelector('#p5');
        var p6 = document.querySelector('#p6');
        var p7 = document.querySelector('#p7');
        var p8 = document.querySelector('#p8');
        var p9 = document.querySelector('#p9');
        var p10 = document.querySelector('#p10');
        var p11 = document.querySelector('#p11');
        var p12 = document.querySelector('#p12');
        var p13 = document.querySelector('#p13');
        var p14 = document.querySelector('#p14');
        var p15 = document.querySelector('#p15');
        var p16 = document.querySelector('#p16');
        var p17 = document.querySelector('#p17');

        state = [p1,p2,p3,p4,p5,p6,p7,p8,p9,p10,p11,p12,p13,p14,p15,p16,p17]

        coords2 = [[26.2006, 92.9376],[25.9644, 85.2722],[20.1809, 73.0169],[28.7041, 77.1025],[29.0588, 76.0856],[32.1024, 77.5619],[23.6913, 85.2722],[34.2268, 77.5619],[24.6637, 93.9063],[25.4670, 91.3662],[23.1645, 92.9376],[20.2376, 84.2700],[27.0238, 74.2179],[27.3516, 88.3239],[11.1271, 78.6569],[26.5706, 80.0982],[26.9868, 87.8550]]
        let l2 = coords2.length;
        for (let i = 0; i < l ; i++)
        {
            var pop = L.popup({
                closeOnClick : true
            }).setContent(places[i]);

            var marker = L.marker(coords[i]).addTo(map).bindPopup(pop);

        }

        for (let i = 0; i<l2 ; i++)
        {
            state[i].addEventListener('mouseover',()=> {
                map.flyTo(coords2[i],8);
            });
            state[i].addEventListener('mouseleave',()=> {
                map.flyTo([23.5937, 80.9629], 5);
            });
        }
     </script>













<!-- SEARCHBAR SCRIPT WIP -->


<script>
        document.getElementById('searchBar').addEventListener('input', function() {
            var searchQuery = this.value.toLowerCase(); 
            var items = document.querySelectorAll('.search-item'); 
            
            items.forEach(function(item) {
                var itemText = item.textContent.toLowerCase(); 
                if (itemText.includes(searchQuery)) {
                    item.classList.remove('hidden'); 
                } else {
                    item.classList.add('hidden'); 
                }
            });
        });
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



















    </body>
    </html>