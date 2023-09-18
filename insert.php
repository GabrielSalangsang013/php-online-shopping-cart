<?php 
    $productName = $_GET['name'];
    $productImage = $_GET['image'];
    $productPrice = $_GET['price'];
    $productID = $_GET['productid'];

    $con = mysqli_connect("localhost","root","","dbsc");
    $sql = "CALL SearchOrderCart('$productID')";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
    if($row !== null && $row['PRODUCT_ID'] == $productID) {
        $conn = new mysqli("localhost","root","","dbsc");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "CALL EditData('$productID')";
        mysqli_query($conn, $sql);
        $conn->close();

        echo "<script>
        window.location.href='cart.php';
        </script>";
    }else if($row == null) {
        $conn = new mysqli("localhost","root","","dbsc");
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        $sql = "CALL InsertData('$productID', '$productName', '$productPrice', '1', '$productImage')";
        mysqli_query($conn, $sql);
        $conn->close();

        echo "<script>
        window.location.href='cart.php';
        </script>";
    }
?>
