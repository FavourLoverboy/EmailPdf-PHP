<?php
    include('config/dblink.php');
    $collect = new Sam();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <base href="http://localhost/emailpdf/"/>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.js"></script> -->
        <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
        <title>Student Result Generation</title>
        <!-- Favicon -->
		<link rel="shortcut icon" type="image/jpg" href="assets/propic.png">
        <link rel="stylesheet" href="./styles/bootstrap.css">
        <link rel="stylesheet" href="./styles/stylesheet.css">
    </head>
    <body>

        

    <!-- ============ Carosuel Container ============ -->
    <!-- ============ Login Parent Container ============ -->
    <div class="carosuelContainer">

        <!-- ============ Login Box ============ -->
        <div class="inner-box">
            <div class="loginBox">
                <h2>EMAIL PDF</h2>

                <!-- ============ Main Login Box ============ -->
                <div class="mainLoginBox">

                    <!-- ============ Login Form ============ -->
                    <form action="login.php" method="POST">

                        <label for="name">Username:</label>
                        <input type="text" id="name" name="username">

                        <label for="word">Password:</label>
                        <input type="password" id="word" name="password">

                        <input type="submit" name="login" value="Login">
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- ============ Including Footer ============ -->
<?php include('includes/footer.php'); ?>

<!-- ============ PHP Connection For Login ============ -->
<?php
    session_start();
    if($_POST['login']){
        extract($_POST);
        $tblquery = "SELECT * FROM users WHERE username = :username && password = :password && status = :status";
        $tblvalue = array(
            ':username' => htmlspecialchars($username),
            ':password' => htmlspecialchars($password),
            ':status' => "Active"
        );
        $select = $collect->tbl_select($tblquery, $tblvalue);
        if($select){
            foreach($select as $data){
                extract($data);
                $_SESSION['userId'] = $id;
                $_SESSION['username'] = $username;
                $_SESSION['status'] = $status;
                $_SESSION['position'] = $position;

                if($_SESSION['position'] == 'Admin'){
                    header('Location: dashboard');
                    echo '<script> window.location="dashboard"; </script>';
                }else if($_SESSION['position'] == 'User'){
                    header('Location: dashboard');
                    echo '<script> window.location="dashboard"; </script>';
                }
            }
        }else{
            echo "<script>alert('Oops, look like your Username or password is not correct.');</script>";
        }
    }
?>

