<?php include('template/head.php') ?>

<?php include('template/header.php') ?>
    
<?php  if ( isset( $_SESSION["loginUSER"] ) ) { ?>
    <div class="flex-column d-flex justify-content-start align-items-center w-100">
        <div class="bg-dark text-white w-100 text-center py-1 flex-row d-flex justify-content-center align-items-center">
            <div><b>FREE shipping</b> on orders over <b>$49!</b>* <u>Details</u></div>
            <div class="mx-3 font-weight-light">|</div>
            <div>Up to 80% Off: Black Friday Sale <u>Shop Now</u></div>
        </div>
        <div>
            <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <a href="#"><img src="https://images.prismic.io/houzz/ZtI480aF0TcGJmxw_Dining_SL-Carousel.png?auto=format,compress" class="d-block w-100" alt="..."></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img src="https://images.prismic.io/houzz/ZtI5aUaF0TcGJmx1_Lighting_SL-Carousel.png?auto=format,compress" class="d-block w-100" alt="..."></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img src="https://images.prismic.io/houzz/Znm4dpbWFbowe0Iz__SL.png?auto=format,compress" class="d-block w-100" alt="..."></a>
                </div>
                <div class="carousel-item">
                    <a href="#"><img src="https://images.prismic.io/houzz/Znm4WpbWFbowe0Iw__SL.png?auto=format,compress" class="d-block w-100" alt="..."></a>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                <span class="carousel-control-next-icon " aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            </div>
        </div>
    </div>
<?php } else { ?>
        <!-- Hero Section -->
    <div class="flex-column d-flex justify-content-end">
        <div class="flex-row d-flex justify-content-start align-items-start">
            <video width="100%" height="100%" autoplay loop muted class="mb-5">
                <source 
                    src="media/Interior_video.mp4" 
                    type="video/mp4">
            </video>
            <div class="position-absolute mt-5 ml-4 w-75">
                <div class="w-75">
                    <div class="w-75 py-4 px-4 rounded-lg shadow-lg bg-white flex-column d-flex justify-content-start align-items-start">
                        <div><h3 class="font-weight-bold">Powerful software for construction and design</h3></div>
                        <div class="mt-1"><u>Group 9</u> has end-to-end tools for 3D renderings, estimates, proposals, invoicing, and project management.</div>
                        <div class="w-100 mt-4">
                            <form method="POST" action="signup.php">
                                <div class="form-group mb-3">
                                    <input type="text" class="form-control" placeholder="Your Email" name="username" id="username" 
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="form-group mb-3">
                                    <input disabled type="password" class="form-control" name="password" id="password" placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-dark text-white font-weight-bold w-100 py-2" >Create Free Account</button>
                            </form>
                        </div>
                        <div class="flex-column d-flex justify-content-start align-items-start w-100">
                            <div class="position-absolute mt-1 align-self-center bg-white px-4 text-center">or</div>
                            <div class="border-top pt-3 mt-3 mb-2 w-100 ">
                                <button class="btn btn-light text-dark border pr-5 font-weight-bold w-100 flex-row d-flex justify-content-center align-items-center">
                                    <img src="https://cdn-icons-png.flaticon.com/128/281/281764.png" 
                                        width="25" height="25" class="mr-5 my-1">
                                    <div class="mx-5 pr-4">Continue with Google</div>
                                </button>
                            </div>
                            <div class="text-secondary ml-2 mb-0"><small>By signing up, signing in or continuing, I agree to G-9's <a href="#">Terms of Use</a> and <a href="#">Privacy Policy.</a></small></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="my-5"></div>
        <div class="bg-dark w-100 position-absolute flex-row d-flex justify-content-between align-items-center p-5 text-white">
            <div class="flex-column d-flex justify-content-start align-items-start">
                <div class=""><h4>Easy, all-in-one software for</h4></div>
                <div class="h4 text-wrap w-100">
                    <u class="text-success">3D Floor Plans</u>, 
                    <u class="text-success">Project Management</u>, 
                    <u class="text-success">Estimates</u>, 
                    <u class="text-success">Takeoffs</u>, 
                    <u class="text-success">Selections</u>, 
                    <u class="text-success">Invoicing</u></div>
            </div>
            <a href="#" class="btn btn-light p-3 font-weight-bolder text-nowrap">Learn More About Interior - Group 9</a>
        </div>
    </div>
<?php } ?>

    <?php
        require ('controller/c_list_product_home.php');

        $c_product = new C_product();
        $list_product= $c_product->list_all_product();
    ?>
    <div class=".container my-5">  
        <h2 class="text-center mb-0">Shop top seller</h2>
        <div id="productCarousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner ">
                <?php 
                $itemsPerSlide = 5;
                $totalProducts = count($list_product);

                for ($i = 0; $i < $totalProducts; $i += $itemsPerSlide) {
                    echo '<div class="carousel-item ' . ($i === 0 ? 'active' : '') . '">
                            <div class="row pl-3">
                                <div class="pl-4 pr-5"></div>';

                    for ($j = $i; $j < $i + $itemsPerSlide && $j < $totalProducts; $j++) {
                        $img = substr($list_product[$j]['avatar'], 3);
                        echo '
                        <a href="#" class="card ml-4 shadow-sm my-4" style="width: 170px;">
                            <img src="' . $img . '" class="card-img-top p-3" alt="Product Image">
                            <div class="card-body pt-0 px-3 pb-3" style="height: 130px;>
                                <h6 class="card-title">' . $list_product[$j]['name'] . '</h6>
                                <p class="card-text text-danger">$' . $list_product[$j]['price'] . '</p>
                            </div>
                        </a>';
                    }
                    echo '</div>
                        </div>';
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#productCarousel" role="button" data-slide="prev">
                <span class=".carousel-control-prev-icon shadow rounded-circle" aria-hidden="true">
                    <img src="https://cdn-icons-png.flaticon.com/128/11839/11839308.png"
                        width="35" height="35">
                </span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productCarousel" role="button" data-slide="next">
                <span class=".carousel-control-next-icon shadow rounded-circle" aria-hidden="true">
                    <img src="https://cdn-icons-png.flaticon.com/128/11839/11839355.png"
                     width="35" height="35">
                </span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        </div>
    </div>

<!-- Main Content -->
<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <h2>About Us</h2>
            <p>We are dedicated to providing the best services to our customers. Our team is experienced and passionate about what we do.</p>
        </div>
        <div class="col-md-4">
            <h2>Our Services</h2>
            <p>We offer a variety of services to meet your needs, including web development, graphic design, and digital marketing.</p>
        </div>
        <div class="col-md-4">
            <h2>Contact Us</h2>
            <p>If you have any questions, feel free to reach out to us through our contact form or email.</p>
        </div>
    </div>
</div>

<?php include('template/footer.php') ?>