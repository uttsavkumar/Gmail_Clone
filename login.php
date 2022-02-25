<?php
include "connect.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-4 mx-auto">
                <div class="card shadow-lg">
                    <div class="card-body">
                        <h2 class="h4 text-center">Login Here</h2>
                        <hr>
                        <form action="" method="post">
                            <div class="mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control shadow-none" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="">Password</label>
                                <input type="password" class="form-control  shadow-none" name="password">

                            </div>
                            <div class="mb-3">
                                <input type="submit" name="login" value="Log In"class="btn text-white  shadow-none btn-primary w-100">
                            </div>
                           <a href="" class="text-muted small float-start text-decoration-none">Forget Password?</a>
                            <a href="create.php" class="text-muted small float-end text-decoration-none">Sign up?</a>
                        
                        </form>
                        <?php
                            if(isset($_POST['login'])){
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);

                                $check = mysqli_query($connect,"select *from accounts where email ='$email' AND password = '$password' ");
                                $count = mysqli_num_rows($check);

                                if($count > 0){
                                    $_SESSION['user'] = $email;
                                    header("location: index.php");
                                    die();
                                }
                                else{
                                    echo"<script>alert('email and password is incorrect')</script>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>