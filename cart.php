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
            <!-- PRODUCTS CONTAINER -->
            <div class="container-5">
                <div class="cart-container">
                    <div class="cart-container-title">
                        <h2>ONLINE CART</h2>
                    </div>

                    <div class="cart-container-all-title">
                        <div class="cart-container-all-title-piece">
                            <h4>Product Details</h4>
                        </div>
                        <div class="cart-container-all-title-piece del">
                        
                        </div>
                        <div class="cart-container-all-title-piece imp">
                            <h4>Quantity</h4>
                        </div>
                        <div class="cart-container-all-title-piece">
                            <h4>Price</h4>
                        </div>
                        <div class="cart-container-all-title-piece">
                            <h4>Total</h4>
                        </div>
                    </div>


                        <div class="cart-container-all-details" style="display: none">
                            <div class="cart-container-all-details-piece del">
                                <img src="img/products/555-sardines.jpg" style="width: 100%; max-width: 150px; height: auto;" alt="">
                            </div>
                            <div class="cart-container-all-details-piece imp">
                                <h4>Nestle Coffee-Mate Original 1.9 Kg</h4>
                            </div>

                            <div class="cart-container-all-details-piece">
                                <input type="number" name="" class="quantity" value="" min="1" style="max-width: 75px; height: 25px; padding: 10px;">
                                <br><br>
                                <form action="edit.php" method="GET">
                                    <input type="hidden" value="" name="id" class="idUpdate">
                                    <input type="hidden" value="" name="quantity" class="quantityUpdate">
                                    <input type="submit" value="remove" onsubmit="update()">
                                </form>
                            </div>

                            <div class="cart-container-all-details-piece">
                                <h4>₱500.00</h4>
                            </div>

                            <div class="cart-container-all-details-piece">
                                <h4>₱500.00</h4>
                            </div>
                        </div>

                    

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

                            $sql = "CALL ShowOrder()";
                            $result = mysqli_query($con, $sql);

                            while($row = mysqli_fetch_assoc($result)) {
                                echo    "<div class='cart-container-all-details'>";
                                echo    "<div class='cart-container-all-details-piece del'>";
                                echo        "<img src='img/products/" . $row["PRODUCT_IMAGE"] ."' style='width: 100%; max-height: 150px; max-width: 150px; height: auto;' alt=''>";
                                echo    "</div>";
                                echo    "<div class='cart-container-all-details-piece imp'>";
                                echo        "<h4>" . $row["PRODUCT_NAME"] ."</h4>";
                                echo    "</div>";
            
                                echo    "<div class='cart-container-all-details-piece'>";
                                echo        "<input type='number' class='quantity' value='" . $row["PRODUCT_QUANTITY"] ."' onchange='update(" . $row["PRODUCT_ID"] .")' min='1' style='max-width: 75px; height: 25px; padding: 10px;'>";
                                echo        "<br><br>";
                                echo        "<form action='edit.php' method='GET'>";
                                echo            "<input type='hidden' value='" . $row["PRODUCT_ID"] ."' name='id' class='idUpdate'>";
                                echo            "<input type='hidden' value='" . $row["PRODUCT_QUANTITY"] ."' data-hold-id='" . $row["PRODUCT_ID"] ."' name='quantity' class='quantityUpdate'>";
                                echo            "<input type='submit' class='updbtn' value='update'>";
                                echo        "</form>";
                                echo    "</div>";
            
                                echo    "<div class='cart-container-all-details-piece'>";
                                echo        "<h4>₱" . $row["PRODUCT_PRICE"] .".00</h4>";
                                echo    "</div>";
            
                                echo    "<div class='cart-container-all-details-piece'>";
                                echo        "<h4>₱" . $row["PRODUCT_PRICE"] * $row["PRODUCT_QUANTITY"] .".00</h4>";
                                echo        "<form action='delete.php' method='GET'>";
                                echo        "<br>";
                                echo            "<input type='hidden' value='" . $row["PRODUCT_ID"] ."' name='id' class='idUpdate'>";
                                echo            "<input type='submit' class='updbtn' value='remove'>";
                                echo        "</form>";
                                echo    "</div>";
                                echo    "</div>";
                            };
                            mysqli_free_result($result);
                            mysqli_close($con);
                    ?>


                    <script src="js/update.js"></script>
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