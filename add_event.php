<!doctype html>
<html lang="en">
<?php require_once "html_head.php" ?>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            <?php require_once "header.php" ?>        
            <div class="app-main">
                <?php require_once "sidebar.php" ?> 
                <div class="app-main__outer">
                    <div class="app-main__inner">
                            <div class="tab-content">
                                <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                                    <div class="main-card mb-3 card">
                                        <div class="card-header bg-happy-itmeo">Add Event</div>
                                        <div class="response"></div>
                                        <div id='calendar1'></div>
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
</html>
