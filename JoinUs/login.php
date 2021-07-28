<?php
session_start();
ob_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" href="./image/favicon.png" />
    <title>Rise and Fit</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/93c73bfd5a.js" crossorigin="anonymous"></script>

    <!-- My Stylesheet -->
    <link rel="stylesheet" href="./css/login.css" type="text/css" />
    <link rel="stylesheet" href="./css/nav.css" type="text/css" />
    <link rel="stylesheet" href="./css/footer.css" type="text/css" />
    <link rel="stylesheet" href="./css/main.css" type="text/css" />


<body>

    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="../index.html" class="navbar-brand"><img src="./image/raflogo.jpg"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="../" class="nav-item nav-link">Home</a>
                    <a href="../Blog/" class="nav-item nav-link">Blog</a>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Programs
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="../Programs/Addiction Management/">Addiction Management</a>
                            <a class="dropdown-item" href="../Programs/Healthy Community/">Healthy Community</a>
                            <a class="dropdown-item" href="../Programs/On-Site Plans/">Onsite Plans </a>
                            <a class="dropdown-item" href="../Programs/Stress Management/">Stress Management</a>
                            <a class="dropdown-item" href="../Programs/Webinar And Workshop/">Webinars and Workshops</a>
                            <a class="dropdown-item" href="../Programs/Weight And Diet Management/">Weight and Diet
                                Management</a>
                        </div>
                    </li>

                    <a href="#" class="nav-item nav-link">Join us</a>
                    <a href="../AboutUs/" class="nav-item nav-link">About</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->

    <?php


    include 'dbconnect.php';
    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $emailquery = " select * from registration where email='$email' and status='active' ";
        $result = mysqli_query($conn, $emailquery);

        $emailcount = mysqli_num_rows($result);

        if ($emailcount) {

            $accountDetails = mysqli_fetch_assoc($result);

            $dbpassword = $accountDetails['password'];
            $passMatch = password_verify($password, $dbpassword);

            if ($passMatch) {
                $_SESSION['name'] = $accountDetails['name'];
                if (isset($_POST['rememberme'])) {

                    setcookie('emailcookie', $email, time() + 604800);
                    setcookie('passwordcookie', $password, time() + 604800);
                    header('location: welcome.php');
                } else {

                    header('location: welcome.php');
                }
            } else {
                echo "password incorrect";
            }
        } else {
            echo "email do not exist";
        }
    }
    ?>


    <!-- Login content start here -->
    <div class="bg-img">
        <!-- alert -->



        <!-- alert end -->
        <div class="content">
            <header>Login!</header>

            <?php
            if (isset($_SESSION['msg'])) {

                echo '<div class="alert alert-warning alert-dismissible fade show manWarn" style="     z-index: 1000;
                z-index: 1000;
    color: white;
    background-color: #229930;
    border-color: #368010;
    padding-right: 2rem;
    text-align: left; " role="alert">
                            <strong> </strong>' .  $_SESSION['msg'] .
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close" style="
    padding: .2rem 0.25rem;">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>';
            }
            ?>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="field">
                    <span class="fa fa-user"></span>
                    <input type="email" name="email" required placeholder="Email" value="<?php
                                                                                            if (isset($_COOKIE['emailcookie'])) {
                                                                                                echo $_COOKIE['emailcookie'];
                                                                                            }
                                                                                            ?>">
                </div>
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="pass-key" name="password" required placeholder="Password"
                        value="<?php
                                                                                                                    if (isset($_COOKIE['passwordcookie'])) {
                                                                                                                        echo $_COOKIE['passwordcookie'];
                                                                                                                    }
                                                                                                                    ?>">
                    <span class="formShow">SHOW</span>
                </div>

                <div class=" pass" style="color:white">
                    <input type="checkbox" name="rememberme"> Remember Me
                </div>

                <div class="pass">
                    <a href="./forgotpassword.php">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit" name="submit" value="LOGIN">
                </div>
            </form>

            <div class="signup">Don't have account?
                <a href="./signup.php">Signup Now</a>
            </div>
        </div>
    </div>

    <!-- Login content end here -->

    <!-- Footer Start -->

    <footer class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer1 d-flex wow bounceInLeft" data-wow-delay=".25s">
                    <div class="d-flex flex-wrap align-content-center"> <a href="#"><img src="./image/raflogo.jpg"
                                alt="logo" /></a>
                        <p>Let's take a step, invest your time and energy, yourself for the good of you and your family.
                            Come join
                            the way to a healthy life. Weaving fitness into your busy lifestyle!
                        </p>
                        <p>&copy;All rights reserved.<br> Design by <a href="http://riseandfit.com/"
                                target="_blank">Rise and
                                Fit</a>.</p>
                    </div>
                </div>
                <div class="col-md-6 footer2 wow bounceInUp" data-wow-delay=".25s" id="contact">
                    <div class="form-box">
                        <h4>CONTACT US</h4>
                        <table class="table table-responsive d-table">
                            <tr>
                                <td><input type="text" class="form-control pl-0" placeholder="NAME" /></td>
                                <td><input type="email" class="form-control pl-0" placeholder="EMAIL" /></td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control pl-0" placeholder="ADDRESS" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2"><input type="text" class="form-control pl-0" placeholder="MESSAGES" />
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2"></td>
                            </tr>
                            <tr>
                                <td colspan="2" class="text-center pl-0"><button type="submit"
                                        class="btn btn-dark">SEND</button></td>
                            </tr>
                        </table>
                    </div>
                </div>


                <div class="col-md-3 footer3 wow bounceInRight" data-wow-delay=".25s">
                    <h5>ADDRESS</h5>
                    <p>Couple Park
                        Rajpath Area, Raisina Hills, New Delhi, Delhi 110011.</p>
                    <h5>PHONE</h5>
                    <p>9068179706</p>
                    <h5>EMAIL</h5>
                    <p>riseandfitt@gmail.com</p>
                    <div class="social-links">
                        <ul class="sci">
                            <li><a href="https://www.facebook.com/Riseandfit"><img src="./image/facebook.png"
                                        alt="facebook"></a>
                            </li>
                            <li><a href="https://www.instagram.com/riseandfitt/"
                                    class="btn btn-secondary mr-1 ml-1 mb-2"><img src="./image/instalogo.png"
                                        alt="Instagram" /></a></li>
                            <li><a href="https://www.linkedin.com/company/riseandfit"
                                    class="btn btn-secondary mr-1 ml-1 mb-2"><img src="./image/linkedinlogo.png"
                                        alt="linkedin" /></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->

</body>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>

<!-- Navigation Bar Javascript -->
<script src="./js/nav.js"></script>

<script src="./js/login.js"></script>

<!-- Pop up Animation Javascript -->

<!--Scroll to Top Script-->


</html>