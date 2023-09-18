<?php
    $productID = $_GET['id'];

    $con = mysqli_connect("localhost", "root", "", "dbsc");
    $sql = "CALL DeleteData('$productID')";
    $result = mysqli_query($con, $sql);
    if($result === TRUE) {
        echo "<script>
        alert('Deleted Successfully');
        window.location.href='cart.php';
        </script>";
    }else {
        echo "Something is wrong";
    }
?>