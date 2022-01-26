<?php 
require_once('functions.php');
payment();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Joto Dealers</title>
</head>
<body>

<h2>Sales Records</h2>

<div>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <div>
            <label for="product">Product Type: </label>
            <input type="text" id="product" name="product" required>
        </div>
        <div>
            <label for="units">Units Bought: </label>
            <input type="number" id="units" name="units" required>
        </div>
        <div>
            <button type="submit" name="submit">Pay</button>
        </div>
    </form>
</div>

</body>
</html>
