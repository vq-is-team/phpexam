<?php
    session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>SUCCESS</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="../css/master.css">
    </head>

    <body>
        <div>
            <h1 style="text-align:center">SUCCESS</h1>
            <div>
                <?php
                    echo "Name: " . $_SESSION['name'];
                    echo "</br>";
                    echo "Email: " . $_SESSION['email'];
                    echo "</br>";
                    echo "Phone: " . $_SESSION['phone'];
                    echo "</br>";
                    echo "Address: " . $_SESSION['address'];
                    echo "</br>";
                    echo "Gender: " . $_SESSION['gender'];
                ?>
            </div>
            <div  style="text-align:center">
                <a href="../index.php">RETURN</a>
            </div>
            
        </div>
        
    </body>
</html>