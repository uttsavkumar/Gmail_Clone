
<a href="#insert" data-bs-toggle="modal" class="btn btn-outline-danger btn-md ">Compose</a>
    <!-- modal for compose -->
<div class="modal fade" id="insert">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">Send Mail</div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" name="to" class="form-control" placeholder="To.">
                    </div>
                    <div class="mb-3">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="mb-3">
                        <textarea rows="5" name="content" class="form-control" placeholder="Write your Mail"></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="send" value="Send" class="btn btn-primary float-end ">
                        <input type="submit" value="Save" name="save" class="btn btn-success float-end me-2">
                    </div>
                </form>

                <?php
                if(isset($_POST['send']) || isset($_POST['save'])){
                    $sender_id = $user['id'];
                    //finding reciever id
                    $to = $_POST['to'];
                    $query = mysqli_query($connect,"select * from accounts where email = '$to'");
                    $receive = mysqli_fetch_array($query);

                    $receiver_id = $receive['id'];
                    $subject = $_POST['subject'];
                    $content = $_POST['content'];

                    $status = 0;
                    if(isset($_POST['save'])){
                        $status= 1;
                    }

                    $sendMail = mysqli_query($connect,"insert into mails(sender_id,subject,receiver_id,content,status) value
                    ('$sender_id','$subject','$receiver_id','$content','$status')");

                }
                ?>
            </div>
        </div>
    </div>
</div>
<div class="list-group list-group-fulsh mt-2 ">

    <a href="index.php" class="list-group-item list-group-item-action">Inbox <span class="badge bg-danger text-white float-end rounded-circle">
        <?php
        $log = $user['id'];
        $callingInbox = mysqli_query($connect,"select *from mails where receiver_id = '$log' AND status= 0");
         echo  $count = mysqli_num_rows($callingInbox);
        ?>
    </span></a>

    <a href="sent.php" class="list-group-item list-group-item-action">Sent Mail
    <span class="badge bg-danger text-white float-end rounded-circle">
        <?php
        $log = $user['id'];
        $callingInbox = mysqli_query($connect,"select *from mails where sender_id = '$log' AND status = 0");
         echo  $count = mysqli_num_rows($callingInbox);
        ?>
    </span></a>
    </a>
    <a href="draft.php" class="list-group-item list-group-item-action">Draft
    <span class="badge bg-danger text-white float-end rounded-circle">
        <?php
        $log = $user['id'];
        $callingInbox = mysqli_query($connect,"select *from mails where sender_id = '$log' AND status = 1");
         echo  $count = mysqli_num_rows($callingInbox);
        ?>
    </span>
    </a>
    <a href="bin.php" class="list-group-item list-group-item-action">Trash
        
    </a>
    <a href="" class="list-group-item list-group-item-action">Setting</a>
    <a href="logout.php" class="list-group-item list-group-item-action bg-danger text-white">Logout</a>
</div>