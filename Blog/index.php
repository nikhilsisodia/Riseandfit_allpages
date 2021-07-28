
<?php
// //Making a database connection
include 'connection.php';

//Make a check whether something we get here on clicking submit in form    
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    //Check for duplicate and not added in database
    $dup = mysqli_query($conn, "select * from `emails` where email = '$email' ");
    if (mysqli_num_rows($dup) > 0) {
        echo "<script>alert('Already Subscribed')</script>";
    } else {

        //Inserting (emails of newsletter) into database
        $sql = "INSERT INTO `emails` ( `email`, `dt`) 
          VALUES ('$email', current_timestamp())";

        // echo $sql;
        echo "<script>alert('Added Successfully')</script>";

        if ($conn->query($sql) == true) {
            echo "<script>alert('Added Successfully')</script>";
            header("Location:index.php");
            exit;
        } else {
            echo "Error: $sql <br> $con->error";
        }
    }
}
?>

<!-- HTMl Code -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Page</title>
    <link rel="icon" href="./images/favicon.png">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap"
        rel="stylesheet" />
    <!--Bootstrap 4 link-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/93c73bfd5a.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
        integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!---Css -->
    <link rel="stylesheet" href="./css/nav.css">
    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="stylesheet" href="./css/animate.css">
    <link rel="stylesheet" href="./Blogs/css/Main Html Css/blog.css">
</head>

<body>


    <!-- Nav Bar Start -->
    <div class="navbar navbar-expand-lg bg-dark navbar-dark">
        <div class="container-fluid">
            <a href="../" class="navbar-brand"><img src="./images/raflogo.jpg"></a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav ml-auto">
                    <a href="../" class="nav-item nav-link">Home</a>
                    <a href="#" class="nav-item nav-link">Blogs</a>

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

                    <a href="../JoinUs/login.php" class="nav-item nav-link">Join us</a>
                    <a href="../AboutUs/" class="nav-item nav-link">About</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Nav Bar End -->

    <!--Header Portion Starts-->
    <div class="header">
        <h2 class="animation">
            <span >Blogs</span>
            
        </h2>
        <!-- Newsletter Subscription on header -->
        <form action="#" method="POST" autocomplete="off">
            <input class="inputClass" name="email" type="email" placeholder="Enter your Email here:)" required>
            <button class="headerBtn newsletter " type="submit" name="submit">Subscribe</button>
        </form>

    </div>
    <!--Header Portion Ends-->
    <!--BlogPost Portion Starts-->
    <div class="blog">
        <div class="blogPost">

            <?php
            include "pagination.php";
            //Traversing database of blog post and print it on screen
            $sql = 'SELECT * FROM `blogpost` ORDER BY id DESC LIMIT ' . $this_page_first_result . ',' .  $results_per_page;
            $query = mysqli_query($conn, $sql);
            while ($item = mysqli_fetch_array($query)) {

            ?>
            <div class="myBlogs">
                <!-- Displaying blog title dynamically -->
                <a href="./BlogPage/displayPost.php?id=<?php echo $item['id']; ?>">
                    <h1 style="color:black;text-decoration:none;"><?php echo $item['title']; ?></h1>
                </a>
                <!-- Displaying time of post of blog dynamically -->
                <h5><?php echo $item['dt']; ?></h5>
                <a href="./BlogPage/displayPost.php?id=<?php echo $item['id']; ?>">
                    <img src="./images/blogs/<?php echo $item['img_url'] ?>">
                </a>
                <!-- Displaying blog content one line dynamically -->
                <p class="blogDescription"><?php echo substr($item['content'], 0, 150); ?>...<br>
                </p>
                <!-- Redirecting to full description of blogpost dynamically -->
                <a class="headerLink" href="./BlogPage/displayPost.php?id=<?php echo $item['id']; ?>">Read more</a>
            </div>
            <br>
            <?php
            }
            // Display the page links below blogs
            for ($page = 1; $page <= $number_of_pages; $page++) {
                echo '<a class="page-link"  href="index.php?page=' . $page . '">' . $page . '</a> ';
            }

            ?>

        </div>
        <div class="blogFeature">
            <div class="description">
                <h2>Why Rise and fit?</h2>
                <h1 class="border"></h1>
                <img class="imgRAF" src="./images/Raf/raf.png" alt="riseandfit">
                <p class="RAFp">Let's take a step, invest your time and energy, yourself for the
                    good of yous and your family.Come join the way to a healthy life. Weaving fitness
                    into your busy lifestyle!
                </p>
            </div>
            <div class="FeaturePost">
                <h2>Popular Posts</h2>
                <h1 class="border"></h1>

                <div class="PopularPost1">
                    <div class="PopularPost-image"><img src="./images/Feature Post/feature1.jpg" alt="logo1">
                    </div>
                    <div class="PopularPost-heading"><a href="">Stress can Harm You!</a>
                    </div>
                </div>
                <div class="PopularPost2">
                    <div class="PopularPost-image"><img src="./images/Feature Post/feature2.jpg" alt="logo1">
                    </div>
                    <div class="PopularPost-heading"><a href="">Stress can Harm You!</a>
                    </div>
                </div>
                <div class="PopularPost3">
                    <div class="PopularPost-image"><img src="./images/Feature Post/feature3.jpg" alt="logo1">
                    </div>
                    <div class="PopularPost-heading"><a href="">Stress can Harm You!</a>
                    </div>
                </div>
                <div class="PopularPost4">
                    <div class="PopularPost-image"><img src="./images/Feature Post/feature4.jpg" alt="logo1">
                    </div>
                    <div class="PopularPost-heading"><a href="">Stress can Harm You!</a>
                    </div>
                </div>
                <div class="PopularPost5">
                    <div class="PopularPost-image"><img src="./images/Feature Post/feature5.jpg" alt="logo1">
                    </div>
                    <div class="PopularPost-heading"><a href="">Stress can Harm You!</a>
                    </div>
                </div>

            </div>
            <div class="advertise">
                <h2>Advertise</h2>
                <h1 class="border"></h1>

                <div class="ads">
                    <h5>Ad goes here.</h5>
                </div>
            </div>
            <div class="tags">
                <h2 class="tagName">Tags</h2>
                <div class="tagButton">
                    <button>Stress</button>
                    <button>Meditation</button>
                    <button>Workout</button>
                    <button>Yog Nidra</button>
                    <button>Chakras</button>
                    <button>Mind</button>
                </div>


            </div>
            <div class="instagram">
                <h2>Instagram Feed</h2>
                <h1 class="border"></h1>

                <img class="instaImage" src="./images/Instagram/insta1.jpg" alt="img1">
                <img class="instaImage" src="./images/Instagram/insta2.jpg" alt="img2">
                <img class="instaImage" src="./images/Instagram/insta3.jpg" alt="img3">
                <img class="instaImage" src="./images/Instagram/insta4.jpg" alt="img4">
            </div>
            <div class="followUs">
                <h2>Follow us</h2>
                <h1 class="border"></h1>

                <ul class="sci">
                    <li>
                        <a href="https://www.facebook.com/Riseandfit"><i class="fab fa-facebook-square"></i></a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/riseandfitt/"><i class="fab fa-instagram-square"></i></a>
                    </li>
                    <li>
                        <a href="https://www.linkedin.com/company/riseandfit"><i class="fab fa-linkedin"></i></a>
                    </li>

                </ul>

            </div>
            <div class="subscribe">
                <h2>Our Newsletter</h2>
                <h1 class="border"></h1>
                <!-- Newsletter email subscription in right hand side section in parallel to blogs -->
                <p>Enter your e-mail below and get notified on the latest blog posts.</p>
                <form action="#" method="POST" autocomplete="off">
                    <input class="inputClass1" type="email" name="email" placeholder="name@example.com" required>
                    <button class="headerBtn newsletter" name="submit" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer portion starts -->
    <footer class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-3 footer1 d-flex wow bounceInLeft" data-wow-delay=".25s">
                    <div class="d-flex flex-wrap align-content-center"> <a href="#"><img src="./images/raflogo.jpg"
                                alt="logo" /></a>
                        <p>Let's take a step, invest your time and energy, yourself for the good of you and your family.
                            Come join
                            the way to a healthy life. Weaving fitness into your busy lifestyle!
                        </p>
                        <p>&copy;All rights reserved.<br> Designed by <a href="http://riseandfit.com/" target="_blank"
                                style="color:rgba(255, 94, 98, 1);">Rise and Fit</a>.</p>
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
                        <ul class="nav nav-item">
                            <li><a href="https://www.facebook.com/Riseandfit        "
                                    class="btn btn-secondary mr-1 mb-2"><img src="./images/facebook.png"
                                        alt="facebook" /></a></li>
                            <li><a href="https://www.instagram.com/riseandfitt/     "
                                    class="btn btn-secondary mr-1 ml-1 mb-2"><img src="./images/instalogo.png"
                                        alt="Instagram" /></a></li>
                            <li><a href="https://www.linkedin.com/company/riseandfit"
                                    class="btn btn-secondary mr-1 ml-1 mb-2"><img src="./images/linkedinlogo.png"
                                        alt="linkedin" /></a></li>
                        </ul>
                    </div>
                </div>




            </div>
        </div>
    </footer>
    <!-- Footer portion ends -->

</body>
<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script></script>
<!--Navigation Bar Javascript-->
<script src="./js/nav.js"></script>
<!--Wow js footer-->
<script src="./js/wow.js"></script>

</html>