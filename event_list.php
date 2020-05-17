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
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Name</th>
                                                    <th>Start date</th>
                                                    <th>End Date</th>
                                                    <th>Created By</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    foreach ($eventArray as $data) {
                                                ?>
                                                        <tr>
                                                            <td><a href="share.php?event_id=<?php echo $data['id']; ?>" class="btn-wide btn btn-success">Share</a></td>
                                                            <td><?php if(!empty($data['title'])){ echo $data['title'];} ?></td>
                                                            <td><?php echo date("d-m-Y H:i", strtotime($data['start'])); ?></td>
                                                            <td><?php echo date("d-m-Y H:i", strtotime($data['end'])); ?></td>
                                                            <td><?php if(!empty($data['name'])){ echo $data['name'];} ?></td>
                                                            <td><?php if(!empty($data['status'])){ if($data['status'] == 1){ echo "Active"; }else {echo "Inavctive";}} ?></td>
                                                        </tr>
                                                <?php
                                                  }
                                                ?>
                                            </tbody>
                                        </table>
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
