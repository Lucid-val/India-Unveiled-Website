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
    <link rel="stylesheet" href="admin_css.css">
    <title>admin_login</title>
</head>
<body>


<nav class="navbar navbar-expand-lg justify-content-center fixed-top col-sm-12">
        <div class="container-fluid">
            <a href="#" class="navbar-brand">
                <img src="Logos/Logo IU 2.png" alt="" id="logo">India Unveiled</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav ms-auto">
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
                <li class="navbar-item">
                    <a href="LGS.php" class="nav-link">Login</a>
                </li>
            </ul></div>
        </div>
        </div>
    </nav>


    <div class="text-center bg-1">
        <h1>Admin Login</h1>
        <br>
        <div class="container justify-content-center">
        <form action="php/display.php" method="post">
            <input type="text" placeholder="Admin Name" name="admin_name" class="form-control">
            <br>
            <input type="password" placeholder="Password" name="password" class="form-control">
            <br>
            <input type="submit" class="btn btn-secondary" id="loginbtn" value="Sign-up">
        </form>
        </div>
        <br>
        <br>

        <?php if(isset($_GET['error'])){ ?>
                        
            <div class="alert alert-danger" role="alert">
                <?php echo $_GET['error']; ?>
            </div>
        <?php } ?>
        

    </div>




    
    
</body>
</html>