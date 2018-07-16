<?php

    session_start();

    echo $_SESSION['register']['name'] . '<br>';
    echo $_SESSION['register']['email'] . '<br>';
    echo $_SESSION['register']['password'] . '<br>';
    echo $_SESSION['register']['img_name'] . '<br>';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>Learn SNS</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
</head>
<body style="margin-top: 60px">
    <div class="container">
        <div class="row">
            <img src="../user_profile_img/<?php echo $_SESSION['register']['img_name']; ?>"
        </div>
    </div>
    <script src="../assets/js/jquery-3.1.1.js"></script>
    <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>