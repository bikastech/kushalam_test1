<?php
    require_once "db.php";

    $json = array();

     $egtShareEvenbSql ="SELECT group_concat(event_id) As event_id FROM shared_event where shared_to = '".$_SESSION['user_id']."'";
    $result = mysqli_query($db, $egtShareEvenbSql);
    $shareEvent =array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($shareEvent, $row['event_id']);
    }
    // print_r($shareEvent);
    // die;
    if(!empty($shareEvent[0])){
        $extraWhr = "OR e.id IN (".implode(',', $shareEvent).")";
    }else {
        $extraWhr ="";
    }
   
     $sqlQuery = "SELECT 
        e.*,
        u.name
        FROM
            tbl_events AS e
                INNER JOIN
            users AS u ON u.id = e.user_id
           
        WHERE
            e.user_id = '".$_SESSION['user_id']."'
            ".$extraWhr."

            AND status = 1
        ORDER BY e.id DESC";
  
    
    $result = mysqli_query($db, $sqlQuery) or die(mysqli_error($conn));
    $eventArray = array();
    while ($row = mysqli_fetch_assoc($result)) {
        array_push($eventArray, $row);
    }

    mysqli_free_result($result);

    if($_REQUEST['view'] =='Cal'){
        echo json_encode($eventArray);
        die;
    }
   
?>