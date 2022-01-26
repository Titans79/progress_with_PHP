<?php
require_once('database.php');


function payment(){

    global $conn;

    if(isset($_POST['submit'])){
        //receive form inputs
        $product = mysqli_real_escape_string($conn, $_POST['product']);
        $units = mysqli_real_escape_string($conn, $_POST['units']);

        //calculate sales;
        $sales = $units * price($product);

        //payment;
        $payment = $sales + vat($product, $sales) - discount($product, $sales);

        //send details to database

        $new_record = mysqli_query($conn, "INSERT INTO 
        products (product_type, units_bought, payment) 
        VALUES ('$product', '$units', '$payment')");

        //on successful save;
        if($new_record){
            echo '
                <script>
                    alert("Payment => Kshs. '.$payment.'");
                    window.location.href = "form.php";
                </script>
            ';
            exit();
            
        }else {
            echo '
                <script>
                    alert("Something went wrong!");
                    window.location.href = "form.php";
                </script>
            ';
            exit();
        }


    }
    
}


function price($product){

    $result = 0;

    if($product == 'A'){
        $result = 9400;
    } elseif($product == 'B'){
        $result = 8000;

    } else {
        echo '
        <script>
            alert("Invalid product!");
            window.location.href = "form.php";
        </script>
            ';
        exit();
    }

    return $result;

}



function vat($product, $sales){

    $result = 0;

    if($product == 'A'){
        $result = .16 * $sales;
    }

    return $result;

}


function discount($product, $sales){

    $result = 0;

    if($product == 'B' && $sales >= 45000){
        $result = .15 * $sales;
    }

    return $result;

}