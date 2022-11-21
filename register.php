<?php

use Model\DBTest;
require "./Model/DBTest.php";

if (isset($_POST["name"], $_POST["gender"], $_POST["birth"], $_POST["mail"], $_POST['phone'], $_POST['registration_id'])) {
    $bdd = DBTest::getInstance();

    $name = sanitize($_POST['name']);
    $firstname = ucfirst(trim(strstr($name, ' ', true)));
    $lastname = ucfirst(trim(strstr($name, ' ')));
    $gender = sanitize($_POST['gender']);
    $birthday = $_POST['birth'];
    $mail = trim($_POST['mail']);
    $phone = sanitize($_POST['phone']);
    $registration_id = sanitize($_POST['registration_id']);


    $request = $bdd->prepare("SELECT * FROM profil WHERE email = :email OR phone = :phone");
    $request->bindParam(":email", $mail);
    $request->bindParam(":phone", $phone);
    $state = $request->execute();

    echo $state . "<br><br>";

    if ($state) {
        $user = $request->fetch();
        //Checks if email or phone is not in use.
        if ($user['email'] === $mail || $user['phone'] === $phone) {
            header("Location: ../../?error=3");
        }
        //Check if the email address is valid.
        if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
            if (preg_match('#^0[6-7]{1}\d{8}$#', $phone)) {

                $message = "
                   <div class='flexColumn'>
                        <img src='img/logo-microsoft-scaled.jpg' alt='Microsoft' class='width_10'>
                        <h2>Thank you for filling out \"Contoso Event Registration\"</h2>
                        <button class='buttonResponses'>VIEW MY RESPONSES</button>
    
                        <div class='flexRow'>
                            <div class='width_5'>
                                <img src='img/img.png' alt='Microsoft'>
                            </div>
                            <div class='flexColumn width_90'>
                                <p class='size_20'>Easily create surveys, quizzes, and polls with <a class='green' href='https://forms.office.com/'>Microsoft Forms</a> </p>
                                <a class='size_20' href='#'>Create my own form</a>
                            </div>
                        </div>
                   </div>
                ";
                $headers = array(
                    "From" => $mail,
                    "X-Mailer" => "PHP/" . phpversion(),
                    "Mime-Version" => "1.0",
                    "Content-type" => "test/html; charset=utf-8"
                );
                $subject = "Thank you for filling out \"Contoso Event Registration\" ";

                mail($mail, $subject, $message, $headers);

                $request = $bdd->prepare("INSERT INTO profil 
                (firstname, lastname, gender, birthday, email, phone, registration_id)
                VALUES (:firstname, :lastname, :gender, :birthday, :email, :phone, :registration_id)");
                $request->bindValue(":firstname", $firstname);
                $request->bindValue(":lastname", $lastname);
                $request->bindValue(":gender", $gender);
                $request->bindValue(":birthday", $birthday);
                $request->bindValue(":email", $mail);
                $request->bindValue(":phone", $phone);
                $request->bindValue(":registration_id", $registration_id);

                $request->execute();

                header("Location: ../../?success=0");
            } else {
                header("Location: ../../?error=0");
            }
        } else {
            header("Location: ../../?error=1");
        }
    }
}
else {
    header("Location: ../../?error=2");
}


// Avoid XSS attacks
function sanitize($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = addslashes($data);
    return $data;
}