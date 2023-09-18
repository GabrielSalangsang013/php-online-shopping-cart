<?php
    $productID = $_GET['id'];
    $productQuantity = $_GET['quantity'];

    $con = mysqli_connect("localhost", "root", "", "dbsc");
    $sql = "CALL EditDataSecond('$productID', '$productQuantity')";
    $result = mysqli_query($con, $sql);
    if($result === TRUE) {
        echo "<script>
        alert('Updated Successfully');
        window.location.href='cart.php';
        </script>";
    }else {
        echo "Something is wrong";
    }

?>
