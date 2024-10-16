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
    <link rel="stylesheet" href="LGS.css">
    <title>Login</title>

</head>
<body>


<!-- Navbar -->

    <nav class="navbar navbar-expand-lg justify-content-center fixed-top col-sm-12">
        <div class="containernav">
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
                    <a href="#" class="nav-link">Login</a>
                </li>
            </ul></div>
        </div>
    </nav>

    <?php if(isset($_GET['error'])){ ?>
                        
        <div class="alert alert-danger" role="alert">
            <?php echo $_GET['error']; ?>
                </div>
    <?php } ?>
                
    
    <?php if(isset($_GET['success'])){ ?>
        <div class="alert alert-success" role="alert">
            <?php echo $_GET['success']; ?>
        </div>
    <?php } ?>










    <div class="conatiner mt-3 textdiv">
        <h1 id="cyj">CONTINUE <br>YOUR <br>JOURNEY</h1>
    </div>
    <div class="conatiner mt-3 textdiv2">
        <h1 id="lgn">LOGIN<h1>
    </div>






















    <div class="container-fluid back1">
        <div class="card cardo3" id="card3">
            <div class="card-body"></div>
        </div>
        <div class="card" id="card1" onsubmit="return pass_check()">











<!-- SIGNUP FORM-->


            <form action="php/signup.php" id="form1" method="post">




                

                

                <!-- EMAIL ADDRESS INPUT  u_email  -->
                        
                <div class="mb-3">

                <label for="u_enamil" class="form-label">Email address</label>

                <input type="email" class="form-control" id="user_email" name="u_email" 
                
                value="<?php echo (isset($_GET['u_name']))?$_GET['u_name']:"" ?>"
                
                required>

                </div>





                <!-- USERNAME INPUT  u_name -->


                <div class="mb-3">

                    <label for="u_name" class="form-label">Create Username</label>

                    <input type="text" class="form-control" id="user_name" name="u_name" 

                    value="<?php echo (isset($_GET['u_name']))?$_GET['u_name']:"" ?>"
                    
                    required>

                </div>

                

                <!-- PASSWORD INPUT  u_pass -->


                <div class="mb-3">

                <label for="S_Password1" class="form-label">Password</label>

                <input type="password" class="form-control" id="myInput1" name="u_pass" required>

                <label for="Re-Password1" class="form-label">Re-Enter Password</label>

                <input type="password" class="form-control" id="myInput2" required>

                </div>



                <!-- SHOW PASSWORD CHECKBOX -->




                <div class="mb-3 form-check">

                <input type="checkbox" class="form-check-input" id="showPasswords">

                <label class="form-check-label" for="showPasswords">Show Password</label><br>

                </div>


                <!-- SUBMIT BUTTON -->



                <input type="submit" class="btn btn-secondary col-sm-4" id="loginbtn" value="Sign-up"><br><br>

                Already an User ?<a href="#" id="fp" onclick="loginform()"> &nbsp; Login</a>

            </form>
        </div>



















<!-- LOGIN FORM-->


        <div class="card" id="card2">


            <form id="form1" action="php/login.php" method="post">



                <!-- USERNAME INPUT -->
                <div class="mb-3">
                <label for="L_name" class="form-label">Username</label>
                <input type="text" class="form-control" id="InputEmail2" name="l_name" 

                value="<?php echo (isset($_GET['l_name']))?$_GET['l_name']:"" ?>"
                
                required>
                </div>




                <!-- PASSWORD INPUT -->
                <div class="mb-3">
                <label for="L_Password1" class="form-label">Password</label>
                <input type="password" class="form-control" id="myInput" name="l_pass" 

                
                
                required>
                </div>



                <!-- SHOW PASSWORD BUTTON -->
                <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" onclick="myFunction()">
                <label class="form-check-label" for="exampleCheck1">Show Password</label><br>
                <a href="#" id="fp">Forgot password?</a>
                </div>



                <!-- LOGIN / SUBMIT BUTTON -->

                <input type="submit" class="btn btn-secondary col-sm-4" id="loginbtn" value="Login"><br><br>







                <button type="submit" class="btn btn-basic col-sm-12" id="Glogin">Login with Google</button><br><br>

                <button type="submit" class="btn btn-basic col-sm-12" id="Fblogin">Login with Facebook</button><br><br>

                <a href="#" id="fp" onclick="signupform()">Create Account</a> <br>

            </form>
        </div>
    </div>

















<!-- TEXT ANIMATION SCRIPT -->
    <script>
        function signupform()
        {
            var cardo = document.getElementById("card3");
            cardo.classList.remove('cardo3');
            cardo.classList.add('cardo4');
            var txtch = document.getElementById('lgn');
            txtch.textContent = 'SIGN-UP';
            var txtch2 = document.getElementById('cyj');
            txtch2.innerHTML = 'EXPLORE <br> THE <br> UNEXPLORED';

        }
        function loginform()
        {
            var cardo = document.getElementById("card3");
            cardo.classList.remove('cardo4');
            cardo.classList.add('cardo3');
            var txtch = document.getElementById('lgn');
            txtch.textContent = 'LOGIN';
            var txtch2 = document.getElementById('cyj');
            txtch2.innerHTML = 'CONTINUE <br> YOUR <br> JOURNEY';
        }

    </script>




















<!-- SHOW PASSWORD SCRIPT -->

    <script>
        document.getElementById('showPasswords').addEventListener('change', function() {
        var password1 = document.getElementById('myInput1');
        var password2 = document.getElementById('myInput2');
        if (this.checked) {
            password1.type = 'text';
            password2.type = 'text';
        } else {
            password1.type = 'password';
            password2.type = 'password';
        }
        
    });
    </script>


















<!-- PASSWORD CHECK SCRIPT -->

    <script>

        function pass_check()
        {
            var pass1 = document.getElementById('myInput1').value;
            var pass2 = document.getElementById('myInput2').value;

            if (pass1 != pass2)
            {
                alert("Passwords dont match!");
                return false;
            }
            else
            {
                return true
            }
        }

    </script>
















    
<!-- SHOW PASSWORD SCRIPT -->


    <script>
            function myFunction() 
            {
              var x = document.getElementById("myInput");
              if (x.type === "password") {
                x.type = "text";
              } else {
                x.type = "password";
              }
            }
    </script>


















<!-- TEXT ANIMATION SCRIPT ON CLICK  -->

    <script>
        window.onload = function() {
            var textElement = document.getElementById('cyj');
            textElement.classList.remove('hide');
            textElement.classList.add('fade-in-text');
        };
    </script>




















</body>
</html>