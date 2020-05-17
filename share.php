<!doctype html>
<html lang="en">
<?php require_once "html_head.php" ?>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <?php require_once "header.php" ?>        
            <div class="app-main">
                <?php require_once "sidebar.php" ?> 
                <?php require "fetch-event.php" ?>
                <div class="app-main__outer">
                    <div class="app-main__inner">
                            <div class="tab-content">
                                 <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header bg-happy-itmeo">Event List</div>
                                        <br>
                                        <form action="send_mail.php" method="POST">
                                            <input type="hidden" id="event_id" name="event_id" value="<?php if(!empty($_GET['event_id'])){ echo $_GET['event_id'];} ?>">
                                            <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Action</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                   
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                       
                                                        require_once "db.php";

                                                        $sqlQuery = "SELECT 
                                                            *
                                                            FROM
                                                                users where id !=".$_SESSION['user_id']."
                                                            ORDER BY id DESC";
                                                        
                                                        $result = mysqli_query($db, $sqlQuery);
                                                       
                                                        $userArray = array();
                                                        while ($row = mysqli_fetch_assoc($result)) {
                                                            array_push($userArray, $row);
                                                        }

                                                        mysqli_free_result($result);

                                                        mysqli_close($db);

                                                        
                                                        foreach ($userArray as $data) {
                                                    ?>
                                                            <tr>
                                                                <td><input type="checkbox" id="vehicle1" name="user[]" value="<?php if(!empty($data['id'])){ echo $data['id'];} ?>"></td>
                                                                <td><?php if(!empty($data['name'])){ echo $data['name'];} ?></td>
                                                                <td><?php if(!empty($data['email'])){ echo $data['email'];} ?></td>
                                                            </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                </tbody>
                                            </table>
                                            <center>
                                              <input type="submit" class="btn-wide btn btn-success" value="Send Notification">
                                            </center>
                                            <br>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="app-wrapper-footer">
                        <?php require_once "footer.php" ?>
                    </div>    
                </div>
        </div>
    </div>
</body>


<script>
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
</html>
