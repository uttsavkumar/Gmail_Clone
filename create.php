<?php
include "connect.php";

?>

                                            <!-- signup -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'?>

    <div class="container">
        <div class="row">
            <div class="col-8">

            </div>
            <div class="col-4">
                <div class="card mt-2 shadow-lg"> 
                    <div class="card-body">
                        <h2 class="h5 mb-3">Create Account</h2>
                        <hr>
                        <form action="" method="post">
                            <div class="mb-2">
                                <label for="">Full Name</label>
                                <input type="text" name="name"class=" shadow-none form-control">
                            </div>
                            <div class="mb-2">
                                <label for="">Date of Birth</label>
                                <input type="date" name="dob"class="form-control  shadow-none">
                            </div>
                           <div class="d-flex">
                           <div class="mb-2">
                                <label for="">contact</label>
                                <input type="text" name="contact"class="form-control  shadow-none">
                            </div>
    
                            <div class="mb-2 ms-3">
                                <label for="">Gender</label>
                                <select  name="gender"class="form-select  shadow-none">
                                    <option value="0">Choose Gender</option>
                                    <option value="m">Male</option>
                                    <option value="f">Female</option>
                                    <option value="o">Other</option>
                                </select>
                            </div>
                           </div>
                           
                            <div class="mb-2">
                                <label for="">Email</label>
                                <input type="email" name="email"class="form-control  shadow-none">
                            </div>
                            <div class="mb-4">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control  shadow-none">
                            </div>
                            <div class="">
                               
                                <input type="submit" name="create" class="btn btn-primary w-100  shadow-none">
                            </div>
                           <?php
                           if(isset($_POST['create'])){
                               $name =$_POST['name'];
                               $contact =$_POST['contact'];
                               $dob =$_POST['dob'];
                               $gender =$_POST['gender'];
                               $email =$_POST['email'];
                               $password =md5($_POST['password']);

                               $query = mysqli_query($connect,"insert into accounts(name,contact,gender,email,dob,password)
                               value('$name','$contact','$gender','$email','$dob','$password')");

                               if($query){
                                   $_SESSION['user'] = $email;
                                    echo"<script>window.open('login.php','_self')</script>";
                               }

                                    else{
                                        echo"<script>alert('failed')</script>";
                                    }
                               
                           }
                           ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>