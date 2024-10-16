<?php
session_start();
// if (isset($_SESSION['user_name'])) 
// {
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
    <title>Index Page</title>
    <link rel="stylesheet" type="text/css" href="index.css" />
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
                        <a href="#" class="nav-link">Home</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#About" class="nav-link">About</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#Explore" class="nav-link">Explore</a>
                    </li>
                    <li class="navbar-item">
                        <a href="#Contact" class="nav-link">Contact</a>
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










<!-- FIRST TEXT -->


        <div class="d-flex container-fluid col-lg-12 justify-content-center align-items-center" id="back1">
            <div><h1 id="iu">India Unveiled</h1><p id="iup">Unseen, Unheared, Unforgettable</p>
            </div>
        </div>












<!-- CAROUSEL -->


        <div class="container-fluid text-center my-3">
            <div class="row mx-auto my-auto justify-content-center">
                <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="Images/10U.png" class="img-fluid">
                                    </div>
                                    <div class="overlay">Your Text Here</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="Images/3U.png" class="img-fluid">
                                    </div>
                                    <div class="overlay">Your Text Here</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="Images/8U.png" class="img-fluid">
                                    </div>
                                    <div class="overlay">Your Text Here</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="Images/6U.png" class="img-fluid">
                                    </div>
                                    <div class="overlay">Your Text Here</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="Images/7U.png" class="img-fluid">
                                    </div>
                                    <div class="overlay">Your Text Here</div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="Images/9U.png" class="img-fluid">
                                    </div>
                                    <div class="overlay">Your Text Here</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" id="carobutton1" aria-hidden="true"></span>
                    </a>
                    <a class="carousel-control-next bg-transparent w-aut" href="#recipeCarousel" role="button" data-bs-slide="next">
                        <span class="carousel-control-next-icon" id="carobutton2" aria-hidden="true"></span>
                    </a>
                </div>
            </div>		
        </div>
        <br>

























<!-- ABOUT US SECTION     -->


        <div id="About">
            <div class="heading">
            <h1>About US</h1>
        </div>
        <div class="container-fluid">
            <section class="about">
                <div class="about-image">
                    <img src="Images/stok-palace-ladakh.jpg">
                </div>
                <div class="about-content">
                    <p>India is replete with a plethora of destinations that are explored by many. No matter whether you go east, west, north, or south, you will find numerous places that are still untouched by commercialization. Hunder Dunes, Nakta Pahad, Sirumalai, Leshka Dam, and Khuri are some examples of some of the least explored places in India that you must add to your itinerary on your next vacation. To keep you glued and inspired. Over-shadowed and overt, their places will leave you stumped with their untouched beauty. Each destination is a story waiting to be discovered, with its own traditions, cuisines, and festivals that offer a glimpse into the soul of India. Our meticulously curated content provides in-depth insights, travel tips, and stunning visuals to inspire user next adventure.
                        Discover the enchanting, the mystical, and the sheer diversity that India has to offer, beyond the well-trodden paths. Explore and uncover the secrets that make India truly incredible. Also you can search for different underrated places and also find some beautiful handicrafts of the locals which can be bought by them as souvenirs.</p>
                </div>
            </section>
        </div>
        </div>
        <br>

        


























<!-- EXPLORE SECTION  -->



        <section class="container2" id="Explore">
            <div class="sec_header">
                <div>
                    <h2 class="title">Explore trending destinaitons</h2>
                    <p class="subtitle">
                        Explore your suitable and dream offbeat places around India. Here you
                        can find your right destination
                    </p>
                </div>
                <div class="view_all">
                    <a href="explore2.php"><button class="btn">Explore More</button></a>
                </div>
                <div class="view_all">
                    <a href="craftExplore.html"><button class="btn">Check Handicrafts</button></a>
                </div>
            </div>
            <div class="wrapper">
                <div class="card2">
                    <img src="Images/Mawlynnong.jpg" alt="">
                    <div class="info">
                        <h1>Mawlynnong, Meghalaya</h1>
                        <p>Mawlynnong in Meghalaya, is one of the must visit offbeat places in India. Blessed with the charm of North East India, Mawlynnong has been awarded as the cleanest village in Asia in 2003.</p>
                    </div>
                </div>
                <div class="card2">
                    <img src="Images/Ziro.jpg" alt="">
                    <div class="info">
                        <h1>Ziro Valley, Arunachal Pradesh</h1>
                        <p>One of the most beautiful places in Arunachal Pradesh, Ziro is blessed with beauty, bliss and incredible experiences.</p>
                    </div>
                </div>
                <div class="card2">
                    <img src="Images/Majuli.jpg" alt="">
                    <div class="info">
                        <h1>Majuli, Assam</h1>
                        <p>The largest river island in the world, Majuli is one of those places you must visit once in a lifetime. Located on the banks of Brahmaputra River.</p>
                    </div>
                </div>
                <div class="card2">
                    <img src="Images/Halebid.jpg" alt="">
                    <div class="info">
                        <h1>Halebid, Kerala</h1>
                        <p>Halebid in Karnataka is one of the ancient temple towns of South India. The town is untouched by tourist crowds, therefore a beautiful offbeat experience.</p>
                    </div>
                </div>
            </div>
        </section>



















<!-- CONTACT SECTION -->


        <div class="bg-5 text-white" id="Contact">
            <div class="t1">
            <h1>Contact Us</h1>
            <br>
            <h1>Contact - 9912345678</h1>
            <br>
            <h1>Email - indiaunveiled@gmail.com</h1>
            <br>
            <h1>Follow Us on - <a href=""><i class="fa-brands fa-facebook"></i></a> <a href=""><i class="fa-brands fa-instagram"></i></a> <a href=""><i class="fa-brands fa-x-twitter"></i></a></h1>
            </div>
        </div>














<!-- BACK TO TOP SECTION -->

        <div class="bg-6 text-black container-fluid" id="b2t">
            <div class="text-center">
                <a href="#"><i class="fa-solid fa-chevron-up"></i></h1></a><h1>
                <h2>Back to Top</h2>
            </div>

        </div>

        
    </body>









<!-- CAROUSEL SCRIPT -->

    <script>
        let items = document.querySelectorAll('.carousel .carousel-item')

            items.forEach((el) => {
                const minPerSlide = 4
                let next = el.nextElementSibling
                for (var i=1; i<minPerSlide; i++) {
                    if (!next) {
                // wrap carousel by using first child
                next = items[0]
            }
            let cloneChild = next.cloneNode(true)
            el.appendChild(cloneChild.children[0])
            next = next.nextElementSibling
            }
            })
    </script>











</body>
</html>

<?php 


// else
// {
//     header("Location: index.php");
//     exit;
// }
?>