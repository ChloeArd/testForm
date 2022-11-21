<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel="stylesheet" href="index.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/fontawesome-free-6.2.1-web/css/all.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>

<?php
$return = "";
$id = "";

if (isset($_GET['success'])) {
    $id = "success";
    switch ($_GET['success']) {
        case '0':
            $return = "The form is valid and an email has been sent to validate the registration.";
            break;
    }
}
elseif (isset($_GET['error'])) {
    $id = "error";
    switch ($_GET['error']) {
        case '0':
            $return = "The phone is invalid";
            break;
        case '1':
            $return = "The email is invalid";
            break;
        case '2' :
            $return = "All fields are not filled";
            break;
        case '3' :
            $return = "Already used";
            break;
    }
}
?>

<div id='<?= $id?>' class='modal colorWhite'><?= $return?><button id='closeModal' class='buttonClassic'><i class='fas fa-times'></i></button></div>
    <main>
        <div class="container flexRow">
            <div class="left">
                <div class="flexCenter">
                    <img id="user" alt="user" src="img/149071.png">
                </div>
                <div class="flexCenter flexColumn containerText">
                    <h1>Let's get you set up</h1>
                    <p class="content">Itshould only take a couple of minutes to pair with your watch</p>
                    <i id="arrow" class="fas fa-circle-chevron-right"></i>
                </div>
            </div>
            <div class="right">
                <form method="post" action="register.php">
                    <div class="flexRow flexAlign">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" placeholder="Firstname Lastname" required>
                    </div>
                    <div class="flexRow flexAlign">
                        <label>Gender</label>
                        <input type="radio" id="male" name="gender" value="Male"><!-- ! -->
                        <label for="male" class="grey">Male</label>
                        <input type="radio" id="female" name="gender" value="Female"><!-- ! -->
                        <label for="female" class="grey">Female</label>
                    </div>
                    <div class="flexAlign flexRow">
                        <label for="birth">Date of birth</label>
                        <input type="date" id="birth" name="birth" required>
                    </div>
                    <div class="flexRow flexAlign">
                        <label for="mail">Email</label>
                        <input type="email" id="mail" name="mail" placeholder="user@mail.com" required>
                    </div>
                    <div class="flexRow flexAlign">
                        <label for="phone">Mobile</label>
                        <input type="tel" id="phone" name="phone" placeholder="06 00 00 00 00" required>
                    </div>
                    <div class="flexRow flexAlign">
                        <label for="registration">Registration ID</label>
                        <input type="text" id="registration" name="registration_id" placeholder="E70405-ERCO548 45" required>
                    </div>

                    <!-- faire membership ??? -->

                    <div class="g-recaptcha" data-sitekey="6LcdwiIjAAAAAOF4W6v-3lXlhkgJ4JvNZv7-QJ_U"></div>


                    <div class="flexRow flexAlign flexEnd">
                        <button id="cancel" type="reset">CANCEL</button>

                        <button id="submit" type="submit">SAVE</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.4.4/jquery.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script src="index.js"></script>
</body>
</html>