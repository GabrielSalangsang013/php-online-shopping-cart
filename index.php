<?php
    /* 
    echo "<button>" . $_GET['username'] . "</button>";
    echo "<br>";
    echo "<button>" . $_GET['password'] . "</button>";
    echo "<button>Submit</button>"; 
    */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- GOOGLE ICON -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- END GOOGLE ICON -->

    <!-- CAROUSEL EFFECT -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.pkgd.js"></script>
    <!-- END CAROUSEL EFFECT -->
    
    
    <!-- FONT AWESOME ICONS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <!-- -->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="icon" href="img/others/carts.png">
    <title>Shopping Cart</title>
</head>
<body>
    <div class="grid-container">

        <header>
        
            <!-- NAVIGATION -->
            <div class="container-1">
                <div class="nav-container">
                    <div class="nav-container-1" style="float: left; padding: 0px 12px;">
                        <h3>ENGLISH</h3>
                    </div>
                    <div class="nav-container-1" style="float: right; ">
                        <span class="nav-container-2">
                            <h3>SIGN IN</h3>
                        </span>
                        <span class="nav-container-2">
                            <a href="cart.php"><h3>MY CART</h3></a>
                        </span>
                    </div>
                </div>
            </div>


            <!-- HEADER -->
            <div class="container-2">
                <div class="header-container">
                    <div class="header-container-1">
                        <div class="icon-container">
                            <img class="img-input" src="img/others/carts.png" alt="">
                        </div>

                        <div class="icon-container-text">
                            <a href="index.php"><h2>ONLINE CART</h2></a>
                        </div>
                    </div>

                    <div class="header-container-1">
                        <form action="search.php" class="form-search" autocomplete="off">
                            <button type="submit" style="width: 5%; height: 100%; float: left; background-color: transparent; outline: 0px; border: 0px; font-size: 20px;"><i class="fas fa-search"></i></button>
                            <input type="text" name="name" class="search-text" placeholder="Enter your search" style="width: 95%; padding-left: 20px;">
                        </form>
                    </div>
                </div>
            </div>

            <!-- MENU -->
            <div class="container-3">
                <div class="menu-container"> 
                    <div class="menu-container-mini menu-1">
                        <h2>FOOD ESSENTIALS</h2>
                    </div>

                    <div class="menu-container-mini menu-2">
                        <h2>CLOTHING ITEMS</h2>
                    </div>

                    <div class="menu-container-mini menu-1">
                        <h2>ELECTRONIC DEVICES</h2>
                    </div>
                </div>
            </div>

        </header>

        <main>
            <!-- BANNER -->
            <div class="container-4">
                <div class="carousel-container">
                    <div class="gallery js-flickity" data-flickity-options='{ "wrapAround": true }'>
                    <div class="gallery-cell">
                        <img src="img/banner/1.jpg" class="carousel-image" alt="">
                    </div>
                    <div class="gallery-cell">
                        <img src="img/banner/2.jpg" class="carousel-image" alt="">
                    </div>
                    <div class="gallery-cell">
                        <img src="img/banner/3.jpg" class="carousel-image" alt="">
                    </div>
                    </div>
                </div>
            </div>


            <!-- PRODUCTS CONTAINER -->
            <div class="container-5">
                <div class="products-container">

                    <!-- 
                        ! THIS CODE IS NOT WORKING
                    -->
                    <form action="insert.php" class="product-container" method="GET" onsubmit="pass(0)" style="display: none;">
                        <div class="product-container">
                            <div class="product-title-container">
                                <h3 class="givenProductName">Nestle Coffee-Mate Original 1.9 Kg</h3>
                                <input type="hidden" name="name" class="text-product-name">
                            </div>

                            <div class="product-image-container">
                                <img src="img/products/nestle-coffee-mate.jpg" class="product-image givenProductImage" alt="">
                                <input type="hidden" name="image" class="text-product-image">
                            </div>

                            <div class="product-container-price-button">
                                <div class="product-price">
                                    <h3 class="givenProductPrice">₱850.00</h3>
                                    <input type="hidden" name="price" class="text-product-price">
                                </div>

                                <div class="product-button">
                                    <input type="submit" class="product-btn" value="Add to Cart">
                                </div>
                            </div>
                        </div>
                    </form> 

                    <?php
                            $con = mysqli_connect("localhost","root","","dbsc");
                            if (mysqli_connect_errno()) {
                              echo "Failed to connect to MySQL: " . mysqli_connect_error();
                              exit();
                            }

                            if ($con -> connect_errno) {
                                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                exit();
                            }

                            $sql = "CALL ShowProducts()";
                            $result = mysqli_query($con, $sql);

                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<form action='insert.php' class='product-container' method='GET' target='_blank' onsubmit='pass(" . $row["PRODUCT_ID"] . ")'>";
                                echo    "<div class='product-title-container'>";
                                echo        "<h3 class='givenProductName'>" . $row["PRODUCT_NAME"] . "</h3>";
                                echo        "<input type='hidden' name='name' class='text-product-name' value='" . $row["PRODUCT_NAME"] . "'>";
                                echo    "</div>";
        
                                echo    "<div class='product-image-container'>";
                                echo        "<img src='img/products/". $row["PRODUCT_IMAGE"] . "' class='product-image givenProductImage' alt=''>";
                                echo        "<input type='hidden' name='image' class='text-product-image'>";
                                echo        "<input type='hidden' name='productid' class='text-product-id' value='" . $row["PRODUCT_ID"] . "'>";
                                echo    "</div>";
        
                                echo    "<div class='product-container-price-button'>";
                                echo        "<div class='product-price'>";
                                echo            "<h3 class='givenProductPrice'> ₱" . $row["PRODUCT_PRICE"] . ".00</h3>";
                                echo            "<input type='hidden' name='price' class='text-product-price' value='" .$row["PRODUCT_PRICE"] . "'>";
                                echo        "</div>";
        
                                echo        "<div class='product-button'>";
                                echo             "<input type='submit' class='product-btn' value='Add to Cart'>";
                                echo        "</div>";
                                echo    "</div>";
                                echo"</form>";
                            };
                            mysqli_free_result($result);
                            mysqli_close($con);
                    ?>


                    <script src="js/script.js"></script>
                </div>
            </div>
        </main>


        <footer>
            <div class="container-6">
                <div class="footer-container">
                    <div class="footer-container-small">
                        <h3>PAYMENT METHODS ONLY:</h3>
                        <br> 
                        <span class="atm-container-image">
                            <img src="img/others/visa.png" class="img-input" alt="">
                        </span>

                        <span class="atm-container-image">
                            <img src="img/others/mastercard.png" class="img-input" alt="">
                        </span>

                        <br>

                        <span class="atm-container-image">
                            <img src="img/others/discover.png" class="img-input" alt="">
                        </span>

                        <span class="atm-container-image">
                            <img src="img/others/american-express.png" class="img-input" alt="">
                        </span>
                    </div>
                    <div class="footer-container-small">
                        <h3>ABOUT US</h3>
                        <br>
                        <address>
                            Address: University of the Assumption <br>
                            Company: Mick & Gab Corp. <br>
                            Contact: +63-932-3294 <br>
                            <br>
                            All rights reserved 2021 <br>
                        </address>
                    </div>
                    <div class="footer-container-small">
                        <h3>SOCIAL MEDIA LINKS:</h3>
                        <br> 
                        <span class="social-container-image">
                            <i class="fab fa-facebook-f" style=" line-height: 2; display: inline-block; vertical-align: middle; font-size: 25px;"></i>
                        </span>
                        
                        <span class="social-container-image">
                            <i class="fab fa-twitter" style="line-height: 2; display: inline-block; vertical-align: middle; font-size: 25px;"></i>
                        </span>

                        <span class="social-container-image">
                            <i class="fab fa-instagram" style="line-height: 2; display: inline-block; vertical-align: middle; font-size: 25px;"></i>
                        </span>
                    </div>
                </div>
            </div>
        </footer>
</body>
</html>