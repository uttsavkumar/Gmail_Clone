<?php
if(isset($_SESSION['user'])){
    
    $log = $_SESSION['user'];
    $query  = mysqli_query($connect,"select * from accounts where email = '$log'");
    $user = mysqli_fetch_array($query);
    }
    ?>
<div class=" nav navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">
        <a href="index.php" class="navbar-brand">Gmail</a>

        <form action="index.php" class="d-flex">
            <div class="input-group">
            <input type="search" name="search" placeholder="Search your email" class="form-control" style="width: 400px; border:none;">
            <input type="submit" name="find" class="btn btn-dark"> 
            </div>
        </form>
        <ul class="navbar-nav">
            <?php
            if(isset( $_SESSION['user'])){?>

       
            <li class="nav-item"><a href="" class="nav-link text-capitalize"><?= $user['name']?></a></li>
            <li class="nav-item"><a href="logout.php" class="nav-link">Logout</a></li>
            <?php } else {?>
            <li class="nav-item"><a href="login.php" class="nav-link">Login</a></li>
            <li class="nav-item"><a href="create.php" class="nav-link">SignUp</a></li>
            
            <?php  }?>
        </ul>
    </div>
</div>