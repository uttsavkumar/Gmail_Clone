<?php
include "connect.php";

if(!isset($_SESSION['user'])){
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Draft </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php include 'header.php'?>

    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-lg-2 border border-muted border-left-0 border-top-0 border-bottom-0">
            <?php include 'side.php'?>
            </div>
            <div class="col-lg-10 px-3 py-5">
                <h6 class="lead">Draft Mails</h6><br>
                <table class="table">
                    <tr>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Time</th>
                    </tr>
                    
                <?php
                $id = $user['id'];
                $callingMail=  mysqli_query($connect,"select * from mails JOIN accounts ON mails.receiver_id = accounts.id where 
                sender_id = '$id' AND status = 1 ORDER BY mails.m_id DESC");
                while($row = mysqli_fetch_array($callingMail)){
      
                ?>
                    <tr>
                        <th><?= $row['subject']?></th>
                        <td><p><?= substr($row['content'],0,100)?></p></td>
                        <td><p><?= substr($row['content'],0,100)?></p></td>
                            <span class="small fw-bold"><td><?= date("d M Y ",strtotime($row['date']))?></span>
                           <span class="small text-muted"><?= date("h:i A ",strtotime($row['date']))?></span>
                         </td>
                            <td><a href="index.php?resend=<?= $row['m_id']?>"  class="btn btn-success btn-sm">Resend</a></td>
                    </tr>
                  <?php }?>

                </table>
            </div>
        </div>
    </div>
   <php?>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>