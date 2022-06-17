<?php
    if($_SERVER['REQUEST_METHOD'] == "POST") {
        if(empty($_POST['name']) ||
        empty($_POST['email']) ||
        empty($_POST['phone']) ||
        empty($_POST['address']) || 
        empty($_POST['gender'])) {
            if(empty($_POST['name'])) {
                $name_error = "Please enter the name";
            }
            if(empty($_POST['email'])) {
                $email_error = "Please enter the email";
            }
            if(empty($_POST['phone'])) {
                $phone_error = "Please enter the phone";
            }
            if(empty($_POST['address'])) {
                $address_error = "Please enter the address";
            }
            if(empty($_POST['gender'])) {
                $gender_error = "Please enter the gender";
            }
        } else {
            session_start();
            $_SESSION['name'] = $_POST['name'];
    
            $_SESSION['email'] = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            if($_SESSION['email'] == false) {
                //$php_errormsg = "Invalid Email Address!";
                return false;
            } else {
                $_SESSION['email'] = $_POST['email'];
            }
    
            $_SESSION['phone'] = $_POST['phone'];
            $_SESSION['address'] = $_POST['address'];
    
            if($_POST['gender'] == "Other") {
                $_SESSION['gender'] = $_POST['othergender'];
            } else {
                $_SESSION['gender'] = $_POST['gender'];
            }
            header("Location: php/success.php");
            die();
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>PHP Exam</title>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" type="text/css" href="css/master.css">
    </head>

    <body>
        <div>
            <div>
                <h1>PHP Form</h1>
            </div>

            <form class="simple__form" method="POST" action="">
                <div>
                    <label for="name">Name</label>
                    <input type="text" minlength="1" maxlength="25" id="name" name="name" required>
                    <span class="error__msg"><?php if(isset($name_error)) echo $name_error; ?></span>
                </div>
                
                <div>
                    <label for="email">Email</label>
                    <input type="text" maxlength="256" id="email" name="email" required>
                    <span class="error__msg"><?php if(isset($email_error)) echo $email_error; ?></span>
                </div>

                <div>
                    <label for="phone">Phone</label>
                    <input type="number" id="phone" name="phone" required>
                    <span class="error__msg"><?php if(isset($phone_error)) echo $phone_error; ?></span>
                </div>
                
                <div>
                    <label for="address">Address</label>
                    <input type="text" id="address" name="address" required>
                    <span class="error__msg"><?php if(isset($address_error)) echo $address_error; ?></span>
                </div>
                
                <div class="form__gender__group">
                    <div>
                        <label for="gender">Gender</label>
                        <select id="gender" name="gender" required>
                            <option value=""></option>
                            <option value="Female">Female</option>
                            <option value="Male">Male</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div>
                        <input type="text" id="othergender" name="othergender" disabled>
                    </div>
                    <span class="error__msg"><?php if(isset($gender_error)) echo $gender_error; ?></span>
                    <script>
                        const gender = document.getElementById("gender");
                        const otherGender = document.getElementById("othergender");

                        gender.addEventListener("click", function(){
                            if(gender.value == "Other") {
                                otherGender.disabled = false;
                                otherGender.required = true;
                            } else {
                                otherGender.disabled = true;
                                otherGender.required = false;
                            }
                        });
                    </script>
                </div>
                <div>
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
        
    </body>
</html>